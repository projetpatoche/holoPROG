<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
    public function add_user($donnees, $data)
    {
        $this->db->insert("connexion", $donnees);
        $ide="SELECT identifiant FROM connexion WHERE login=\"".$donnees['login']."\"";
        $query=$this->db->query($ide)->row()->identifiant;
        print_r($query);

        //$identifiant=$query[0];
        $sql = "INSERT INTO eleve (nom_eleve, prenom_eleve, identifiant)
                VALUES(\"".$data['nom_eleve']."\",\"".$data['prenom_eleve']."\",\"".$query."\")";
        $query=$this->db->query($sql);
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