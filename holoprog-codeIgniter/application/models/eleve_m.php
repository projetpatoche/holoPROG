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

    public function CalculMoyenneGeneral(){
        $data = $this->eleve_m->DonneeExoTest();
        $moyennetotal=0;
        $nbmoy=0;
        foreach($data as $d){
            $moyennetotal=$moyennetotal+$d->moyenne_exo;
            $nbmoy++;
        }
        $moyennetotal=$moyennetotal/$nbmoy;
        $this->eleve_m->insertMoyenne($moyennetotal);
    }

    public function DonneeExoTest(){
        $this->db->where('nb_essais >',0);
        $this->db->where('id_eleve',$this->session->userdata('id_eleve'));
        $data= $this->db->get("solution_exo");
        return $data->result();
    }

    public function insertMoyenne($moyenne){
        $this->db->set('moyenne_eleve', $moyenne);
        $this->db->where('id_eleve',$this->session->userdata('id_eleve'));
        $this->db->update("eleve");
    }


}