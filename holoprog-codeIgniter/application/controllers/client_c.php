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
        $donnee['titre']='Exo 1';
        $this->load->view('clients/exo_1',$donnee);
    }

    public function correctionExo($id)
    {
        $this->exo_m->essaisExoAugmente($id);
        $donnee['un']=$_POST['1'];
        $donnee['deux']=$_POST['2'];
        $donnee['trois']=$_POST['3'];
        $donnee['quatre']=$_POST['4'];
        $donnee['cinq']=$_POST['5'];

        $data = $this->exo_m->solutionExo($id);

        $solution=explode('-',$data['correction_exercice']);
        if($donnee['un']==$solution[0]&&$donnee['deux']==$solution[1]
            &&$donnee['trois']==$solution[2]&&$donnee['quatre']==$solution[3]
            &&$donnee['cinq']==$solution[4]){
            echo "bravo";
        }

    }
}
