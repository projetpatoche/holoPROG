<?php

class Classe_m extends CI_Model {

    public function getStatProf($id){


        //Calcul de la moyenne de classe
        $requete ="SELECT AVG(moyenne_eleve) as moyenne FROM eleve where id_classe=".$id." GROUP BY id_classe;";
        $query=$this->db->query($requete);
        $donnee['moyenne_classe']=$query->row()->moyenne;

        //Recuperation de la moyenne des meilleurs et pire élèves
        $requete="SELECT nom_eleve,moyenne_eleve FROM ELEVE  WHERE moyenne_eleve IN (SELECT MAX(moyenne_eleve) from eleve) ;";
        $requete2="SELECT nom_eleve,moyenne_eleve FROM ELEVE  WHERE moyenne_eleve IN (SELECT MIN(moyenne_eleve) from eleve) ;";
        $query=$this->db->query($requete);
        $donnee['best']=$query->row();
        $query=$this->db->query($requete2);
        $donnee['worst']=$query->row();



        //Quartiles et médiane
        $requete="SELECT id_eleve,nom_eleve, prenom_eleve, moyenne_eleve
		FROM eleve
		WHERE id_classe=".$id." ORDER BY moyenne_eleve;";
        $query=$this->db->query($requete);
        $donnee['affichageDetails']=$query->result();

        $i=0;
        $quartile1 = array();
        $mediane = array();
        $quartile3 = array();
        foreach($donnee['affichageDetails'] as $line){
            if($i<(int)sizeof($donnee['affichageDetails'])/4){//premier quart
                array_push($quartile1, $line);
            }
            else if($i>=(int)sizeof($donnee['affichageDetails'])/4 && $i<(int)3*(sizeof($donnee['affichageDetails'])/4) ){//entre le premier et 3 eme quart
                array_push($mediane, $line);
            }
            else{//3eme quart
                array_push($quartile3, $line);
            }
            $i++;
        }
        $donnee['quartile1']=$quartile1;
        $donnee['mediane']=$mediane;
        $donnee['quartile3']=$quartile3;

        return $donnee;
    }


}
/**
 * Created by PhpStorm.
 * User: William
 * Date: 26/11/2014
 * Time: 12:34
 */ 