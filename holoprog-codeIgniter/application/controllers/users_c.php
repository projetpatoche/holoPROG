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
        $this->load->view('users_index',$donnees);
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
        // fin d'ajout et redirection
        $this->load->view('users_index',$donnees);
    }

    public function aff_deconnexion(){
        if( $this->session->userdata('droit')==2){
            redirect('prof_c');
        }
        if( $this->session->userdata('droit')==1){
            redirect('client_c');
        }
        print_r($this->session->all_userdata());
        $donnees['titre']="deconnexion";
        $this->load->view('users_index',$donnees);
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('users_c');exit;
    }
   
}
