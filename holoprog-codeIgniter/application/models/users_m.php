<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
    public function add_user($donnees)
    {
        $sql = "INSERT membres VALUES (NULL,\"".$donnees['login']."\",\"".$donnees['email']."\",
        \"".$donnees['pass']."\",1,0) ;";
        $this->db->query($sql);
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
   
  
}