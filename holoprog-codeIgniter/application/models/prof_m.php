<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prof_m extends CI_Model {
    public function donneeProf($id)
    {
        $requete="SELECT *
		FROM professeur
		WHERE identifiant=\"".$id."\"";
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






    public function getClasses($id){
        $requete="SELECT * FROM classe WHERE id_professeur=".$id.";";
        $query=$this->db->query($requete);
        return $query->result();
    }
	
	public function getAClasse($id)
    {
        $requete="SELECT e.nom_eleve,e.prenom_eleve, e.date_de_naissance, e.moyenne_eleve
		FROM eleve e INNER JOIN classe c ON c.id_classe=e.id_classe
		WHERE c.id_classe=".$id.";";
		$query=$this->db->query($requete);
		return $query->result();
	}

}