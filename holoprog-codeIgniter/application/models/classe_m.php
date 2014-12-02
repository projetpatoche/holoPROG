<?php

class Classe_m extends CI_Model {

    public function getStatProf($id){
        //récupération moyenne de classe + id du pire et meilleur élève
        $requete="SELECT best_eleve,worst_eleve, moyenne_classe
		FROM classe
		WHERE id_classe=".$id.";";
        $query=$this->db->query($requete);
        $data=$query->row();
        $donnee['moyenne_classe']=$data->moyenne_classe;

        //Recuperation de la moyenne des meilleurs et pire élèves
        $requete="SELECT moyenne_eleve, nom_eleve from eleve where id_eleve=".$data->best_eleve.";";
        $requete2="SELECT moyenne_eleve, nom_eleve from eleve where id_eleve=".$data->worst_eleve.";";

        $query=$this->db->query($requete);
        $donnee['best']=$query->row();

        $query=$this->db->query($requete2);
        $donnee['worst']=$query->row();

        //QUartiles et médiane
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


        //Récuperer note
        //Les sort croissant
        //Récup médiane quartiles
        //Classé élèves
        return $donnee;
    }


}
/**
 * Created by PhpStorm.
 * User: William
 * Date: 26/11/2014
 * Time: 12:34
 */ 