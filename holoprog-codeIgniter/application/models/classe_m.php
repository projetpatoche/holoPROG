<?php

class Classe_m extends CI_Model {

    public function getClasses(){
        $requete = "SELECT id_classe,nom_classe FROM classe;";
        $query = $this->db->query($requete);
        return $query->result();
    }

    public function getStatProf($id){


        //Calcul de la moyenne de classe
        $requete ="SELECT AVG(moyenne_eleve) as moyenne FROM eleve where id_classe=".$id." GROUP BY id_classe;";
        $query=$this->db->query($requete);
        $donnee['moyenne_classe']=$query->row()->moyenne;

        //Recuperation de la moyenne des meilleurs et pire élèves
        $requete="SELECT nom_eleve,moyenne_eleve FROM eleve  WHERE moyenne_eleve IN (SELECT MAX(moyenne_eleve)
                  from eleve WHERE id_classe=".$id.") AND id_classe=".$id." ;";
        $requete2="SELECT nom_eleve,moyenne_eleve FROM eleve  WHERE moyenne_eleve IN (SELECT MIN(moyenne_eleve)
                  from eleve WHERE id_classe=".$id.") AND id_classe=".$id." ;";
        $query=$this->db->query($requete);
        $donnee['best']=$query->row();
        $query=$this->db->query($requete2);
        $donnee['worst']=$query->row();



        //Quartiles et médiane
        $requete="SELECT id_eleve,nom_eleve, prenom_eleve, moyenne_eleve
		FROM eleve
		WHERE id_classe=".$id." AND moyenne_eleve IS NOT NULL ORDER BY moyenne_eleve;";
        $query=$this->db->query($requete);
        $donnee['affichageDetails']=$query->result();
        if(sizeof($donnee['affichageDetails'])==0) return null;

        $i=0;
        $quartile1 = array();
        $mediane = array();
        $quartile3 = array();
        $quart =  (int)sizeof($donnee['affichageDetails'])/4;
        if(sizeof($donnee['affichageDetails'])>=4) {

            foreach ($donnee['affichageDetails'] as $line) {
                if ($line->moyenne_eleve < $donnee['affichageDetails'][$quart]->moyenne_eleve) {//premier quart
                    array_push($quartile1, $line);
                } else if ($line->moyenne_eleve >= $donnee['affichageDetails'][$quart]->moyenne_eleve &&
                    $line->moyenne_eleve < $donnee['affichageDetails'][$quart*3]->moyenne_eleve
                ) {//entre le premier et 3 eme quart
                    array_push($mediane, $line);
                } else {//3eme quart
                    array_push($quartile3, $line);
                }
                $i++;
            }
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