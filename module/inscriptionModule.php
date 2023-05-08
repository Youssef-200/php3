<?php
include('../PDO1/migrate.php');
class inscriptionmodule{    
           
     
       private $nom;
       private $prenom;
       private $email;
       private $naissance;
       private $dip;
       private $niveau;
       private $etab;
       private $photo;
       private $cv;
       private $log;
       private $mdp;
       private $conn;
        /**
     * __construct
     *
     * @param  string $nom
     * @param  string $prenom
     * @param  string $email
     * @param  string $naissance
     * @param  string $dip
     * @param  string $niveau
     * @param  string $etab
     * @param  string $photo
     * @param  string $cv
     * @param  string $log
     * @param  string $mdp
     * @return void
     */

    function __construct($nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$photo,$cv,$log,$mdp){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->naissance=$naissance;
        $this->dip=$diplome;
        $this->niveau=$niveau;
        $this->etab=$etablissement;
        $this->photo=$photo;
        $this->cv=$cv;
        $this->log=$log;
        $this->mdp=$mdp;
        $this->conn=new PDO1("concours");

    }
    function insert($table){
        $this->conn->Insert($table,'nom,prenom,email,naissance,diplome,niveau,etbalissement,photo,cv,log,mdp','"'.$this->nom.'","'.$this->prenom.'","'.$this->email.'","'.$this->naissance.'","'.$this->dip.'","'.$this->niveau.'","'.$this->etab.'","'.$this->photo.'","'.$this->cv.'","'.$this->log.'","'.$this->mdp.'"');
    }

    function rename_uplod($file,$nom,$prenom){

        $infosfichier = pathinfo($file);
    
        $extension_upload = $infosfichier['extension'];
        
        $new_nom = ($extension_upload == 'pdf') ? $nom.' '.$prenom.'.pdf' : $nom.' '.$prenom.'.jpg';
    
        return $new_nom;
    
    }

    

}

?>