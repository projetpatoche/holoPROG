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


        $requete = "SELECT id_classe FROM eleve WHERE id_eleve=".$idEleve.";";
        $classeEleve=$this->db->query($requete)->row();


        $requete="SELECT * ,(SELECT AVG(se.moyenne_exo) FROM solution_exo se, eleve WHERE eleve.id_classe=".$classeEleve->id_classe."
        and eleve.id_eleve=se.id_eleve and se.id_exercice=sa.id_exercice and nb_essais > 0)
        as moyenne_exo_classe FROM solution_exo sa WHERE id_eleve=".$idEleve." and moyenne_exo != 'null' GROUP BY id_exercice;";
        $query=$this->db->query($requete);

        $data=$query->result();


        $datas['donnee']=$data;
        return $datas;
    }

    public function insertMoyenne($idEleve){
        $requete="SELECT AVG(se.moyenne_exo) as moyenne_classe_exo FROM solution_exo se, eleve
                  WHERE se.id_eleve=".$idEleve." and nb_essais > 0";
        $moyenne = $this->db->query($requete)->row()->moyenne_classe_exo;
        $this->db->set('moyenne_eleve', $moyenne);
        $this->db->where('id_eleve',$this->session->userdata('id_eleve'));
        $this->db->update("eleve");
    }

    public function aFaitUnExo($id){
        $requete = "SELECT * FROM solution_exo WHERE id_eleve=".$id." and nb_essais > 0 ;";
        $res = $this->db->query($requete)->row();
        if(isset($res->id_eleve)) return true;
        else return false;
    }


}