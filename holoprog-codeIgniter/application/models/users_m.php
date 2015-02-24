<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
    public function add_user($donnees, $data)
    {
        $this->db->insert("connexion", $donnees);
        $ide="SELECT identifiant FROM connexion WHERE login=\"".$donnees['login']."\"";
        $query=$this->db->query($ide)->row()->identifiant;


        //$identifiant=$query[0];
        $sql = "INSERT INTO eleve (nom_eleve, prenom_eleve,id_classe,date_de_naissance,identifiant)
                VALUES(\"".$data['nom_eleve']."\",\"".$data['prenom_eleve']."\",".$data['id_classe'].",\"".$data['date_de_naissance']."\",\"".$query."\")";
        $query=$this->db->query($sql);

        $requete = "UPDATE classe SET nbr_eleve=nbr_eleve+1 WHERE id_classe=".$data['id_classe'].";";
        $this->db->query($requete);
        //$this->db->insert("eleve", $data);
    }

    public function verif_connexion($donnees,&$donnees_resultat)
    {
        $sql = "SELECT identifiant, droit, login from connexion WHERE login=\"".$donnees['login']."\"
        and pass=\"".$donnees['pass']."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $donnees_resultat=$row[0];
            return true;
        }
        else
            return false;
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

    public function test_login($login)
    {
        $sql = "SELECT login  from connexion WHERE login=\"".$login."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }
   
  
}