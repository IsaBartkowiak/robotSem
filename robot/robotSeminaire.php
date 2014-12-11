<?php 

class RobotSeminaire {

   private $seminaire = array();
   private $i = 0;

//*********************************************************EXTRACTION=**************************************************************//
//*********************************************************************************************************************************//

    /*------------------------------------------------------
    Extraction des données du labo LOF + insertion BDD
    ------------------------------------------------------*/
    public function extract_lof($html) {
            
          

            // EXTRACTION DES DONNEES
            foreach($html->find('div.resume') as $e){

//

                // TITRE
                foreach($e->find('h3 a') as $titre){
                echo '<span>Sujet: '.$titre->innertext.'</span><br>';
                $this->seminaire[$this->i]['titre']=$titre->innertext;
                }

                // ORATEUR ET LIEU 
                foreach($e->find('p.soustitre') as $orlieu){

                        $orlieu = $orlieu->plaintext; 
                        $orlieu= explode(",", $orlieu, 2);
                        echo "<span> orateur : ".$orlieu[0]."</span><br>";
                        echo "<span> lieu : ".$orlieu[1]."</span><br>";
                        $this->seminaire [$this->i]['orateur']=$orlieu[0];
                        $this->seminaire [$this->i]['lieu']=$orlieu[1];
                        
                }
                if (empty($this->seminaire [$this->i]['orateur'])){
                         $this->seminaire [$this->i]['orateur']='none';
                        }

                if (empty($this->seminaire [$this->i]['lieu'])){
                         $this->seminaire [$this->i]['lieu']='Non renseigné';
                }

                //DATE 
                foreach($e->find('p p') as $p){ 

                    $val= $p->plaintext;
                    if($val != "Lire la suite"){  //On exclut les cellules contenant "lire la suite"
                    $val = $this->lof_formatDate($val);
                    echo '<span class="fuck">'.$this->format_date($val)."</span><br>"; //fonction de formatage
                    $this->seminaire[$this->i]['date']=$this->format_date($val);
                    }   
                }

                //LIEN
                foreach($e->find('p.suite a') as $lien){
                    echo "<span> lien : http://www.lof.cnrs.fr/".$lien->href."</span><br>";
                            $this->seminaire [$this->i]['lien']='http://www.lof.cnrs.fr/';
                            $this->seminaire [$this->i]['lien'].=$lien->href;
                 }

                 if (empty($this->seminaire [$this->i]['lien'])){
                $this->seminaire [$this->i]['lien']='none';
                }

                // LABO pour l'affichage des images en fonction du labo 
                 $this->seminaire [$this->i]['labo']='lof';

                echo "<br>";
              
              $this->i++; 

            }

           
             $this->insert($this->seminaire);
            print_r($this->seminaire);
} 


    public function extract_cenbg($html){


            

            foreach($html->find('ul.spip li') as $e){

                echo $this->i;


                  //TITRE
                   foreach($e->find('strong') as $titre){
                    echo '<span>titre: '.$titre->plaintext.'</span><br>';
                    $this->seminaire[$this->i]['titre']=$titre->plaintext;
                    }

                    if (empty($this->seminaire [$this->i]['titre'])){
                        $this->seminaire [$this->i]['titre']='cafe labo';
                    }

                  //ORATEUR
                   foreach($e->find('i') as $orateur){
                    if (!array_key_exists('orateur', $this->seminaire[$this->i])){
                        $this->seminaire [$this->i]['orateur']= utf8_encode($orateur->innertext);
                        
                    echo '<span>orateur: '.$test = utf8_encode($orateur->innertext).'</span><br>';
                    }
                    }

                  //DATE
                    $element= $e; 
                    $element= explode('</strong>', $element, 3);
                    

                    if (!array_key_exists(1, $element)){ // dans le cas ou les séminaires se trouve dans des balises <font> avec <strong>
                        $el = $e;
                        $el= explode('<br>', $el, 2);
                        $dtlieu = $el[1];
                    }else{

                        $dtlieu = $element[1];
                    }

                    if (array_key_exists(2, $element)){  // dans le cas ou les séminaires se trouve dans des balises <font> avec <strong>
                        $dtlieu = $element[2];
                    }
                    
                    $dtlieu = preg_replace("/<br>/","", $dtlieu);    // on enlève les <br> dans la chaîne     
                    $dtlieu = explode('en ', $dtlieu, 2);            // segmenter pour avoir lieu et date
                  
                    if ((array_key_exists(0, $dtlieu)) && (!empty($dtlieu[0]))){ //date


                        $dt= $this->formatJour($dtlieu[0]);                                  
                        echo $this->format_date($dt).'<br>'; 
                        $this->seminaire[$this->i]['date']=$this->format_date($dt);  
                    } 
                   
                    if (array_key_exists(1, $dtlieu)){     
                        $dtlieu[1] = preg_replace("/<br>/","", $dtlieu[1]);//lieu
                        $dtlieu[1]= str_replace("</li>","", $dtlieu[1]);
                        $dtlieu[1] = preg_replace("/<\/font>/","", $dtlieu[1]);
                       
                        echo '<span>lieu: '.$dtlieu[1].'</span><br>'; 
                       $this->seminaire [$this->i]['lieu']=$dtlieu[1];  
                    } 


                     //LIEN
                    foreach($e->find('strong a') as $lien){
                        echo "<span> lien: ".$lien->href."</span><br>";
                        $this->seminaire [$this->i]['lien']=$lien->href;
                    }
                    if (empty($this->seminaire [$this->i]['lien'])){
                        $this->seminaire [$this->i]['lien']='none';
                    }

                    // LABO pour l'affichage des images en fonction du labo 
                    $this->seminaire [$this->i]['labo']='cenbg';

                    echo "<br>";

               $this->i++;     
            }
           

             print_r($this->seminaire);
            $this->insert($this->seminaire);
    }


//********************************************************FONCTIONS ANNEXES******************************************************//
//******************************************************************************************************************************//


    /*------------------------------------------------------
    Fonction qui supprime les "Le" "le", les jours
     et tout ce qui se trouve après une virgule ou un "à" 
     ------------------------------------------------------*/
    private function formatJour($dt){

        if(preg_match("/,/i", $dt)){
            
            $dt = strstr($dt, ",", true);
        }

        if(preg_match("/à/i", $dt)){
            $dt = strstr($dt, "à", true);
        }
        
        $dt = preg_replace("/le /i","", $dt);
        $dt = preg_replace("/lundi/i","", $dt);
        $dt = preg_replace("/mardi/i","", $dt);
        $dt = preg_replace("/mercredi/i","", $dt);
        $dt = preg_replace("/jeudi/i","", $dt);
        $dt = preg_replace("/vendredi/i","", $dt);

        return $dt;
    }

    /*------------------------------------------------------
    Fonction spéciale pour le formatage des dates du labo lof
     ------------------------------------------------------*/

    private function lof_formatDate($var){

        $var= $this->formatJour($var);
        $var= str_replace("Lire la suite","", $var);

        if(!preg_match("/2015/i", $var) && !preg_match("/2014/i", $var)){
            $var .= " 2014";
        }
        return $var;
    } 

    

    /*------------------------------------------------------
    Fonction de formatage de date pour la BDD
    passe de 26 janvier 2015 à 2015-01-26 (YYYY-MM-JJ)
     ------------------------------------------------------*/
    private function format_date($dt){ 
    
            $dt = preg_replace("/é/i","e", $dt);
            $mois = ['Janvier'=>'jan', 'Fevrier'=>'feb', 'Mars'=>'mar', 'Avril'=>'apr', 'Mai'=>'may', 'Juin'=>'Jun', 'Juillet'=>'Jul', 'Août'=>'aug', 'Septembre'=>'sep','Octobre'=>'oct', 'Novembre'=>'nov', 'Decembre'=>'dec'];
            foreach($mois as $key=>$e){
            $dt =preg_replace("/".$key."/i",$e, $dt);
            }
            
            $dt = trim($dt);

            if (empty($dt)){
                $dt = '2014-12-12';
            }

         
            $format = 'j M Y';
            $date = DateTime::createFromFormat($format, $dt);
            return $date->format('Y-m-d');
    }

    private function insert($seminaire){ 

            try
            {
              $pdo = new PDO('mysql:host=localhost;dbname=seminaire', 'root', "");   

            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $pdo->query("SET NAMES 'utf8'");

            $x=0;
            foreach ($seminaire as $key=>$values){
            $titre = $seminaire[$x]['titre'];
            $date = $seminaire[$x]['date'];
            $orateur = $seminaire[$x]['orateur'];
            $lieu = $seminaire[$x]['lieu'];
            $labo = $seminaire[$x]['labo'];
            $lien = $seminaire[$x]['lien'];

            $stmt = $pdo->prepare("INSERT INTO seminaire (titre, date, orateur, lieu, labo, lien) 
            SELECT * FROM (SELECT '$titre','$date','$orateur','$lieu','$labo','$lien') AS tmp
            WHERE NOT EXISTS (
            SELECT titre FROM seminaire WHERE titre = '$titre'
            )");


            $stmt->execute();
            $x++;

            }



    }
    



} //fin class
?>