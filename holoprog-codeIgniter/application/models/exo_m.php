<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exo_m extends CI_Model {
    public function nbExo()
    {
        $requete="SELECT id_exercice
		FROM exercice";
        $query=$this->db->query($requete);

		return $query->result();
	}
	public function verifCreationEssais($id_exercice)
	{
	//verifie si l'eleve a bien ce champ solution exo
	$requete="SELECT id_exercice,id_eleve
		FROM solution_exo
		where id_exercice=\"".$id_exercice."\"
		and id_eleve=\"".$this->session->userdata('id_eleve')."\"";
        $query=$this->db->query($requete);
		if($query->num_rows() == 0) //si il n'a pas il le cree
		{
		
			$requete="SELECT taille_exo
			from exercice 
			where id_exercice=\"".$id_exercice."\"";
			$exo=$this->db->query($requete);
			$row = $exo->row_array();
			$erreur="0";
			for($i=1;$i<$row['taille_exo'];$i++){ //calcul la taille de l'exercice et 
			$erreur=$erreur."-0";				//cree une varchar adapte
			}
			
			$requete="insert into solution_exo 
			values(\"".$id_exercice."\",\"".$this->session->userdata('id_eleve')."\",\"".$erreur."\", 0)";
			$query=$this->db->query($requete); //cree le champs
		}
	}
	
	public function solutionExo($id)
	{
	$requete="SELECT correction_exercice
			from exercice 
			where id_exercice=\"".$id."\"";
			$exo=$this->db->query($requete);
			$row = $exo->row_array();
	return $row;
	}
	
	public function essaisExoAugmente($id)
	{
	//augmente le nombre d'essais d'un eleve pour l'exo en id
	$requete="SELECT nb_essais
		FROM solution_exo
		where id_exercice=\"".$id."\"
		and id_eleve=\"".$this->session->userdata('id_eleve')."\"";	
	$exo=$this->db->query($requete);
	$row = $exo->row_array();
	$nb_essais = $row['nb_essais']+1;
	
	$requete="Update solution_exo set nb_essais=\"".$nb_essais."\" 
		where id_exercice=\"".$id."\"
		and id_eleve=\"".$this->session->userdata('id_eleve')."\"";
	$this->db->query($requete);
	}


    
}