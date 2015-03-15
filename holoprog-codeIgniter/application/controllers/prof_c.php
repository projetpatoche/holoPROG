<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prof_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('prof_m');
        $this->load->model('classe_m');
    }
    public function index()
    {
        $this->load->view('prof/prof_head');

        //identifiant de la table connexion
        if($this->session->userdata('id_professeur')==null){
        $data = $this->prof_m->donneeProf($this->session->userdata('identifiant'));
        //on détermine l'id du prof grâce à $data
        $this->session->set_userdata($data);
        }
        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);
        $this->load->view('prof/prof_accueil');
        $this->load->view('prof/prof_foot');

    }

	
	public function voirClasse($idClasse)
	{
        $this->load->view('prof/prof_head');

        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);


		$data['classe'] = $this->prof_m->getAClasse($idClasse);

        $data['ecarttype'] = $this->prof_m->ecartType($idClasse);
        $data['stats'] = $this->classe_m->getStatProf($idClasse);


        $this->load->view('prof/prof_classe', $data);

        $this->load->view('prof/prof_foot');
    }

    public function apropos(){

        $donnees['titre']="connexion";
        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_head');
        $this->load->view('prof/prof_menu', $data);
        $this->load->view('users_apropos');
        $this->load->view('prof/prof_foot');
    }
    
     public function ajoutExercice(){
        $this->load->view('prof/prof_head');

        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);
        $this->load->view('prof/prof_ajout');
        $this->load->view('prof/prof_foot');
    }

    public function ajoutImage(){
        $auto_int = $this->exo_m->autoIntExercice();
        mkdir ("img/exercice/".$auto_int['auto_increment']);
        $this->load->view('prof/prof_head');
        $url = dirname(dirname(dirname(__FILE__)))."/img/exercice/".$auto_int['auto_increment']."/".$_FILES['icone']['name'];
        $url = str_replace( "\\","/" , $url);
        $urlenonce = dirname(dirname(dirname(__FILE__)))."/img/exercice/".$auto_int['auto_increment']."/".$_FILES['enonce']['name'];
        $urlenonce = str_replace( "\\","/" , $urlenonce);
        $urlenonceBDD="../../../img/exercice/".$auto_int['auto_increment']."/".$_FILES['enonce']['name'];
        $fn = @imagecreatefromjpeg( $_FILES['enonce']['tmp_name'] );
        imagejpeg($fn, $urlenonce);

        $fn = @imagecreatefromjpeg( $_FILES['icone']['tmp_name'] );
        $nbSelect=$_POST['nbSelect'];
        $x = imagesx($fn);
        $y = imagesy($fn)/$nbSelect;
        $result="";
        for($i=1;$i<=$nbSelect;$i++){
            $number=$_POST[($i)];
            if($i!=$nbSelect)
                $result =$result . $number . '-';
            else
                $result = $result . $number;
        }
        $this->exo_m->insertExercice($result,$nbSelect,$_POST['difficulte'],$urlenonceBDD);

        /*
        decoupage de l'image
        */

        for($i=0;$i<$nbSelect;$i++){
            $im = @imagecreatetruecolor( $x, $y );
            $true = imagecopyresized( $im, $fn, 0, 0, 0, $i * $y, $x, $y, $x, $y );
            $url= dirname(dirname(dirname(__FILE__)))."/img/exercice/".$auto_int['auto_increment']."/".$i.".jpeg";
            $urlBDD="../../../img/exercice/".$auto_int['auto_increment']."/".$i.".jpeg";
            imagejpeg($im, $url);// enregistrement de l'image

            $proposition=$_POST[(($i+1)*100)+1]."__".$_POST[(($i+1)*100)+2]."__".$_POST[(($i+1)*100)+3];
            $this->exo_m->insertProposition($proposition,$urlBDD);
        }

        $data['listeClasses']=$this->prof_m->getClasses($this->session->userdata('id_professeur'));
        $this->load->view('prof/prof_menu',$data);
        $this->load->view('prof/prof_foot');
    }


}
