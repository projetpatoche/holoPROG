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
        $requete="SELECT * FROM solution_exo WHERE id_eleve=".$idEleve.";";
        $query=$this->db->query($requete);
        $data=$query->result();

        //Calcul moyenne de classe par exercice
        $requete = "SELECT id_classe FROM eleve WHERE id_eleve=".$idEleve.";";
        $classeEleve=$this->db->query($requete)->row();
        $requete="SELECT AVG(se.moyenne_exo) as moyenne_classe_exo FROM solution_exo se, eleve
                  WHERE se.id_eleve=".$idEleve." AND eleve.id_classe=".$classeEleve->id_classe." GROUP BY eleve.id_classe;";
        $moyenne = $this->db->query($requete)->row()->moyenne_classe_exo;
        $datas['donnee']=$data;
        $datas['moyenne']=$moyenne;

        return $datas;
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

    public function aFaitUnExo($id){
        $requete = "SELECT * FROM solution_exo WHERE id_eleve=".$id.";";
        $res = $this->db->query($requete)->row();
        if(isset($res->id_eleve)) return true;
        else return false;
    }


}