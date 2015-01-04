<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prof_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('prof_m');
        $this->load->model('classe_m');
    }
    public function index()
    {
        $this->load->view('prof/prof_head');

        //identifiant de la table connexion
		$data = $this->prof_m->donneeProf($this->session->userdata('identifiant'));
        //on détermine l'id du prof grâce à $data
		$this->session->set_userdata($data);

        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);
        $this->load->view('prof/prof_foot');


    }

	
	public function voirClasse($idClasse)
	{
        $this->load->view('prof/prof_head');

        //identifiant de la table connexion
        $data = $this->prof_m->donneeProf($this->session->userdata('identifiant'));
        //on détermine l'id du prof grâce à $data
        $this->session->set_userdata($data);


        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);


		$data['classe'] = $this->prof_m->getAClasse($idClasse);

        $data['ecarttype'] = $this->prof_m->ecartType($idClasse);
        $data['stats'] = $this->classe_m->getStatProf($idClasse);


        $this->load->view('prof/prof_classe', $data);

        $this->load->view('prof/prof_foot');
    }
}