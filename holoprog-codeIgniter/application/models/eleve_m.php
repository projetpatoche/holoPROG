<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eleve_m extends CI_Model {
    public function donneeEleve($id)
    {
        $requete="SELECT *
		FROM eleve
		WHERE identifiant=\"".$id."\"
		limit 1";
		 $query=$this->db->query($requete);
        $row = $query->row_array();
		
		return $row;
	}

    function EST_connecter()
    {
         return $this->session->userdata('login') &&  $this->session->userdata('droit') ;
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect();exit;
    }

    public function getDetailsEleveForProf($idEleve){
        $requete="SELECT * FROM Eleve WHERE id_eleve=".$idEleve.";";
        $query=$this->db->query($requete);
        $data=$query->row();
        return $data;
    }


    
}