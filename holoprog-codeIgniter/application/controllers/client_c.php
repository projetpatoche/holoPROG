<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('eleve_m');
        $this->load->model('exo_m');
        //$this->user = ($this->sitemodel->is_logged()) ? $this->sitemodel->get_user($this->session->userdata('lastname')) : false;
    }
    public function index()
    {
        $id= $this->session->userdata('identifiant');
        if($this->session->userdata('droit')!=1){
            redirect('user_c');
        }

        $data = $this->eleve_m->donneeEleve($id);//donnees de l'eleve
        $this->session->set_userdata($data);//enregistre les donnees sur l'ordi

        $exo = $this->exo_m->nbExo();

        //regarde le nombre d'exo puis verifie que l'eleve a a chaque fois
        //le champs correspondant

        if($exo != null):
            foreach ($exo as $r):
                $id_exo=$r->id_exercice;
                $this->exo_m->verifCreationEssais($id_exo);
            endforeach;
        endif;


        $donnee['titre']='statistique';

        $this->load->view('clients/client_index',$donnee);
    }
    public function Exo($id)
    {
        $donnee['titre']='Exercice numéro 1';
        $this->load->view('clients/client_head');
        $this->load->view('clients/client_menu');
        $this->load->view('clients/exo_1',$donnee);
        $this->load->view('clients/client_foot');
    }

    public function correctionExo($id)
    {

        $this->exo_m->essaisExoAugmente($id);
        $data = $this->exo_m->correctionExo($id);
        $erreur = $this->exo_m->erreurExo($id);
        for ($i = 0; $i < $data['taille_exo']; $i++) { //la boucle sert a recuperer les entree quelle que soit la taille de l'exo
            $donnee[$i] = $_POST[$i];
        }

        $nbreussi = 0;   // variable pour voir combien l'eleve a reussi de champs

        $solution = explode('-', $data['correction_exercice']);
        $nberreur = explode('-', $erreur['erreur_exo']);

        $nberreurtotal = 0;
        for ($i = 0; $i < $data['taille_exo']; $i++) { //la boucle sert a recuperer les entree quelle que soit la taille de l'exo
            if ($donnee[$i] == $solution[$i]) {
                $nbreussi = $nbreussi + 1;
            } else {
                $nberreur[$i] = $nberreur[$i] + 1;
            }
            $nberreurtotal += $nberreur[$i];
        }

        $moyenne_exo = 20 - 20 * $nberreurtotal / ($erreur['nb_essais'] * $data['taille_exo']);

        if ($nbreussi == $data['taille_exo']) { //si la personne a tout juste
            if ($erreur['exo_fait'] != 1) {          //empeche le recalcule de la moyenne si l'eleve a deja fini l'exo
                $this->exo_m->validationExo($id);
                $this->exo_m->InsertMoyenneExo($id, $moyenne_exo);
                $this->eleve_m->CalculMoyenneGeneral();
            }
            redirect('client_c/index');
        } else {
            $erreurfinal = $nberreur[0]; //sinon reinsere les erreurs dans un string puis dans la table
            for ($i = 1; $i < $data['taille_exo']; $i++) {
                $erreurfinal = $erreurfinal . "-" . $nberreur[$i];
            }
            if ($erreur['exo_fait'] != 1) {
                $this->exo_m->InsertMoyenneExo($id, $moyenne_exo);
                $this->exo_m->inscritErreurExo($erreurfinal, $id);
                $this->eleve_m->CalculMoyenneGeneral();
            }
        }
    }

    public function voirEleveFromProf($idEleve,$idClasse){
        $this->load->view('prof/prof_head');
        $this->load->view('prof/prof_header_de_page');
        //LIste des classes du prof
        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_liste_classes', $data);

        //Contenu d'une classe
        $data['classe'] = $this->prof_m->getAClasse($idClasse);

        //Statisitque de cette classe
        $data['stats'] = $this->classe_m->getStatProf($idClasse);

        //Details sur l'élève sélectionné
        $data['detailsEleve'] = $this->eleve_m->getDetailsEleveForProf($idEleve);
        $this->load->view('prof/prof_classe', $data);
        $this->load->view('prof/prof_foot');
    }
}
