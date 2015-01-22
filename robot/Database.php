<?php 
 class Database {

    private $server = 'localhost';
    private $user= 'root';
    private $pword='root';
    private $dbname='seminaires';
    private $pdo = NULL;


    //************ connexion directe avec pdo ********* //

     public function __construct()
    {

             try
            {
              $pdo = new PDO('mysql:host='.$this->server.';dbname='.$this->dbname.';charset=utf8', $this->user, $this->pword); 
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

            //En cas de présence d'apostrophe dans le titre (pour requete SQL)
            if(preg_match("/'/i", $titre)){
                $titre = str_replace("'", "\'", $titre);
            }


            $test = $this->pdo->prepare("SELECT titre FROM seminaire WHERE titre = '$titre' AND date = '$date'");
            $test->execute();
            $row = $test->fetch(PDO::FETCH_ASSOC);

               
                if(empty($row)){
                     $stmt = $this->pdo->exec("INSERT INTO seminaire (titre, date, orateur, lieu, labo, lien) VALUES ('$titre','$date','$orateur','$lieu','$labo','$lien')");
                }
            
            $x++;    
            }
    }
    



} //fin class
?>