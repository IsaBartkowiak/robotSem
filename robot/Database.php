<?php 
 class Database {

    private $server = 'localhost';
    private $user= 'root';
    private $pword='';
    private $dbname='seminaire';
    private $pdo = NULL;


    //************ connexion directe avec pdo ********* //

     public function __construct()
    {

             try
            {
              $pdo = new PDO('mysql:host='.$this->server.';dbname='.$this->dbname, $this->user, $this->pword); 
                $pdo->query("SET NAMES 'utf8'");
              $this->pdo = $pdo;  
            }
            catch (Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
        

    }


    //************* Insertion des séminaires **************** //


    public function insertSeminaire($seminaire){ 

          
         
            $x=0;

            foreach ($seminaire as $key=>$values){
            $titre = $seminaire[$x]['titre'];
            $date = $seminaire[$x]['date'];
            $orateur = $seminaire[$x]['orateur'];
            $lieu = $seminaire[$x]['lieu'];
            $labo = $seminaire[$x]['labo'];
            $lien = $seminaire[$x]['lien'];

            $stmt = $this->pdo->exec("INSERT INTO seminaire (titre, date, orateur, lieu, labo, lien) 
            SELECT * FROM (SELECT '$titre','$date','$orateur','$lieu','$labo','$lien') AS tmp
            WHERE NOT EXISTS (
            SELECT titre FROM seminaire WHERE titre = '$titre'
            )");

         
            
            $x++;    
            }
    }
    



} //fin class
?>