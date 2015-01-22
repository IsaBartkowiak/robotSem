<?php 

class RobotSeminaire {

    public $seminaire = array();
    public $i = 0;


    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $this->seminaire[$i]['titre']
    $this->seminaire[$i]['date']
    $this->seminaire[$i]['orateur']
    $this->seminaire[$i]['lieu']
    $this->seminaire[$i]['labo']
    ------------------------------------------------------*/
    public function setSemLof($html) {


                // EXTRACTION DES DONNEES
                foreach($html->find('div.resume') as $e){

               
                // INIT (valeur pas défaut)
                $this->seminaire[$this->i]['lien'] = "http://www.lof.cnrs.fr/spip.php?rubrique84";
                $this->seminaire[$this->i]['orateur'] = "";
                $this->seminaire[$this->i]['lieu'] = "LOF, Pessac";
               


                // TITRE
                foreach($e->find('h3 a') as $titre){
                $this->seminaire[$this->i]['titre']=$titre->innertext;
                }

                // ORATEUR 
                foreach($e->find('p.soustitre') as $orlieu){

                        $orlieu = $orlieu->plaintext; 
                        $orlieu= explode(",", $orlieu, 2);
                        $this->seminaire[$this->i]['orateur']=$orlieu[0];
                        
                }
               


                //DATE 
                foreach($e->find('p p') as $p){ 

                    $val= $p->plaintext;
                    if($val != "Lire la suite"){  //On exclut les cellules contenant "lire la suite"
                    $val = $this->lof_formatDate($val);
                    $this->seminaire[$this->i]['date']=$this->format_date($val);
                    }   
                }

                //LIEN
                foreach($e->find('p.suite a') as $lien){
                            $this->seminaire[$this->i]['lien']='http://www.lof.cnrs.fr/';
                            $this->seminaire[$this->i]['lien'].=$lien->href;
                 }

                 

                // LABO pour l'affichage des images en fonction du labo 
                 $this->seminaire[$this->i]['labo']='lof';

              
              
              $this->i++; 

            }

            //DEBUG
            //print_r($this->seminaire);

} 

    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $this->seminaire[$i]['titre']
    $this->seminaire[$i]['date']
    $this->seminaire[$i]['orateur']
    $this->seminaire[$i]['lieu']
    $this->seminaire[$i]['lien']
    $this->seminaire[$i]['labo']
    ------------------------------------------------------*/
    public function setSemCenbg($html){


         

            foreach($html->find('ul.spip li') as $e){

                    
                  //INIT ( valeur par défaut )
                    $this->seminaire[$this->i]['lien'] = "";
                    $this->seminaire[$this->i]['lieu'] = "CENBG";

                  //TITRE
                   foreach($e->find('strong') as $titre){
                    $this->seminaire[$this->i]['titre']=$titre->plaintext;
                    }

                    if (empty($this->seminaire [$this->i]['titre'])){
                        $this->seminaire [$this->i]['titre']='cafe labo';
                    }

                  //ORATEUR
                   foreach($e->find('i') as $orateur){
                    if (!array_key_exists('orateur', $this->seminaire[$this->i])){
                        $this->seminaire [$this->i]['orateur']= utf8_encode($orateur->innertext);
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
                        $this->seminaire[$this->i]['date']=$this->format_date($dt);  
                    } 
                   
                    if (array_key_exists(1, $dtlieu)){     
                        $dtlieu[1] = preg_replace("/<br>/","", $dtlieu[1]);//lieu
                        $dtlieu[1]= str_replace("</li>","", $dtlieu[1]);
                        $dtlieu[1] = preg_replace("/<\/font>/","", $dtlieu[1]);

                       $this->seminaire [$this->i]['lieu']=$dtlieu[1];  
                    } 


                     //LIEN
                    foreach($e->find('strong a') as $lien){
                        $this->seminaire [$this->i]['lien']=$lien->href;
                    }

                    // LABO pour l'affichage des images en fonction du labo 
                    $this->seminaire [$this->i]['labo']='cenbg';


              
               $this->i++;     
            }
           
    }

    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $this->seminaire[$i]['titre']
    $this->seminaire[$i]['date']
    $this->seminaire[$i]['orateur']
    $this->seminaire[$i]['lieu']
    $this->seminaire[$i]['labo']
    ------------------------------------------------------*/

    public function setSemCrpp($html){

        

        foreach($html->find('font') as $e){
                        
                foreach($e->find('a') as $lien){
                    $link=$lien->href;
                }
        }

        $collection = $html->find('font');
        foreach($collection as $e) {
            
            if(isset($e->face) && !strpos($e,'Calendrier') && !empty($e->find('font'))) { 
            
                    //TITRE
                    foreach ($e->find('i') as $t){
                            $titre = $t->innertext;
                    }

                    //ORATEUR
                    foreach ($e->find('font') as $o){
                         $orateur = $o->innertext;
                    }

                    //DATE + LIEU + TYPE
                    $element= $e->plaintext;
                    $element = explode(',', $element, 6);

                    $date = $this->format_date($element[0]);

                    $this->seminaire[$this->i]['date']= trim($date);
                        if($element[3]==" "){
                            $this->seminaire[$this->i]['titre']=$titre; 
                        }else{
                            $this->seminaire[$this->i]['titre']=$element[3].': '.$titre;  //type + titre 
                        }



                    $this->seminaire [$this->i]['orateur']=$orateur;
                    $this->seminaire [$this->i]['lien']= 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite';
                    $this->seminaire [$this->i]['lieu']=$element[2];
                    $this->seminaire [$this->i]['labo']='CRPP';
                    $this->i++;  
            }//fin if
        }
            //DEBUG
            //print_r($this->seminaire);
    }


    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO OBS-U
    retourne une tableau 2D associatif de la forme 
    $this->seminaire[$i]['titre']
    $this->seminaire[$i]['date']
    $this->seminaire[$i]['orateur']
    $this->seminaire[$i]['lieu']
    $this->seminaire[$i]['lien']
    $this->seminaire[$i]['labo']
    ------------------------------------------------------*/
    public function setSemObsu($html){

  
        $collection = $html->find('a');
        foreach($collection as $e) {
            if(isset($e->title)) { 

                // DATE
                $date  = $e->title;
                $date = strstr($date, '201');
                $date = strstr($date, ' ', true);
                
                //TITRE
                
                $titre = $e->title;
                $titre2 = $e->title;
                $titre = strstr($titre, '201', true);


                //ORATEUR 
                if(preg_match("/par/i", $titre)){
                    $titre = strstr($titre, "par", false);
                    $titre2 = strstr($titre2, "par", true);

                }


                $titre = str_replace('Salle', '', $titre);
                $titre = str_replace('Bouguer', '', $titre);
                $titre = substr($titre, 0, -5);
                $el = explode(' ', $titre, 4);
                $tit = strstr($el[3], ")", false);
                $tit = str_replace(',', '', $tit);
                 $tit = str_replace(')', '', $tit);
                 $tit = str_replace('(', '', $tit);
                $orateur = $titre;
                $orateur = str_replace('par', '', $orateur);

                //affectation au tableau
                $this->seminaire [$this->i]['date']=$date;
                $this->seminaire [$this->i]['titre']= $titre2;
                $this->seminaire [$this->i]['orateur']=$orateur;
                $this->seminaire [$this->i]['lien']= 'http://www.obs.u-bordeaux1.fr'.$e->href;
                $this->seminaire [$this->i]['lieu']='Salle Bouguer';
                $this->seminaire [$this->i]['labo']='Obs-U';
                $this->i++; 
            }
        } //fin foreach



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
    suppresion des espaces et ajout des années
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
    retourne la date sous la forme YYYY-MM-JJ
     ------------------------------------------------------*/
    private function format_date($dt){ 
    
            $dt = preg_replace("/é/i","e", $dt);
            $mois = ['Janvier'=>'jan', 'Fevrier'=>'feb', 'Février'=>'feb', 'Mars'=>'mar', 'Avril'=>'apr', 'Mai'=>'may', 'Juin'=>'Jun', 'Juillet'=>'Jul', 'Août'=>'aug', 'Aout'=>'aug', 'Septembre'=>'sep','Octobre'=>'oct', 'Novembre'=>'nov', 'Decembre'=>'dec', 'Décembre'=>'dec'];
            foreach($mois as $key=>$e){
              if (empty($dt)){
                $dt = '12 Décembre 2014';
            }
            $dt =preg_replace("/".$key."/i",$e, $dt);
            }
            
            $dt = trim($dt);
         
            $format = 'j M Y';
            $date = DateTime::createFromFormat($format, $dt);
            
            return $date->format('Y-m-d');
    }

  


} //fin class
?>