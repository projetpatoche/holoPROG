<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
        //$this->user = ($this->sitemodel->is_logged()) ? $this->sitemodel->get_user($this->session->userdata('lastname')) : false;
    }
    public function index()
    {
        if( $this->session->userdata('droit')==2){
            redirect('prof_c');
        }
        if( $this->session->userdata('droit')==1){
			redirect('client_c');
        }
        $donnees['titre']="connexion";
        $this->load->view('users_head');
        $this->load->view('users_menu');
        $this->load->view('users_index',$donnees);
        $this->load->view('users_foot');
    }


   
    public function aff_connexion()
    {
        if ($this->users_m->EST_connecter()){
            redirect('users_c/aff_deconnexion');
        }
        $this->form_validation->set_rules('login','login','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');
        /* rappeler la vue à la fin de la méthode */
        if($this->form_validation->run()){
            $donnees= array(
                'login'=>$this->input->post('login'),
                'pass'=>$this->input->post('pass')
            );
            $donnees_session=array();
            if($this->users_m->verif_connexion($donnees,$donnees_session))                          // and valide ==1
            {
                $this->session->set_userdata($donnees_session);
                redirect('users_c/aff_connexion');
            }
            else{
                $donnees['erreur']="mot de passe ou login incorrect";
                $donnees['titre']="connexion";
            }
        }
        $donnees['titre']="connexion";
        // fin d'ajout et redirection$this->load->view('users_head');
        $this->load->view('users_head');
        $this->load->view('users_menu');
        $this->load->view('users_index',$donnees);
        $this->load->view('users_foot');
    }

    public function aff_deconnexion(){
        if( $this->session->userdata('droit')==2){
            redirect('prof_c');
        }
        if( $this->session->userdata('droit')==1){
            redirect('client_c');
        }

        $donnees['titre']="deconnexion";
        $this->load->view('users_index',$donnees);
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('users_c');exit;
    }

    public function inscriptionUsers(){
        $data['classes'] = $this->classe_m->getClasses();

        $this->load->view('users_head');
        $this->load->view('users_menu');
        $this->load->view('users_inscription', $data);
        $this->load->view('users_foot');

    }

    public function inscription()
    {

        //PENSER A INCREMENTER LE NOMBRE D'ELEVE DANS LA CLASSE
        $donnees['login']=$_POST['login_utilisateur'];
        $donnees['pass']=$_POST['password_utilisateur'];

        $this->form_validation->set_rules('login_utilisateur','login','trim|required');
        $this->form_validation->set_rules('password_utilisateur','Mot de passe','trim|required|matches[password_utilisateur2]');
        $this->form_validation->set_rules('password_utilisateur2','Vérifier mot de passe','trim|required');
        $this->form_validation->set_rules('naissance_utilisateur','Vérifier date de naissance','trim|required');

        $data['nom_eleve']=$_POST['nom_utilisateur'];
        $data['prenom_eleve']=$_POST['prenom_utilisateur'];
        $data['id_classe'] = $_POST['idclasse'];
        $data['date_de_naissance'] = $_POST['naissance_utilisateur'];


        /* rappeler la vue à la fin de la méthode */
       if($this->form_validation->run()){
                if(! $this->users_m->test_login($this->input->post('login'))){
                    $donnees['droit']=1;

                    $this->users_m->add_user($donnees, $data);
                    // fin d'ajout et redirection
                    redirect(base_url());
                }
                else{
                    $donnees['erreur']="ce login existe déjà";
                }

            }


        $donnees['titre']="inscription";
        $this->load->view('users_inscription',$donnees);
    }
   
}
