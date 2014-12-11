<?php 

class RobotSeminaire {


    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $seminaire[$i]['titre']
    $seminaire[$i]['date']
    $seminaire[$i]['orateur']
    $seminaire[$i]['lieu']
    $seminaire[$i]['labo']
    ------------------------------------------------------*/
    public function setSemLof($html) {


                $i = 0;
                // EXTRACTION DES DONNEES
                foreach($html->find('div.resume') as $e){

               
                // INIT (valeur pas défaut)
                $seminaire[$i]['lien'] = "";
                $seminaire[$i]['orateur'] = "";
                $seminaire[$i]['lieu'] = "LOF, Pessac";
               


                // TITRE
                foreach($e->find('h3 a') as $titre){
                $seminaire[$i]['titre']=$titre->innertext;
                }

                // ORATEUR 
                foreach($e->find('p.soustitre') as $orlieu){

                        $orlieu = $orlieu->plaintext; 
                        $orlieu= explode(",", $orlieu, 2);
                        $seminaire[$i]['orateur']=$orlieu[0];
                        
                }
               


                //DATE 
                foreach($e->find('p p') as $p){ 

                    $val= $p->plaintext;
                    if($val != "Lire la suite"){  //On exclut les cellules contenant "lire la suite"
                    $val = $this->lof_formatDate($val);
                    $seminaire[$i]['date']=$this->format_date($val);
                    }   
                }

                //LIEN
                foreach($e->find('p.suite a') as $lien){
                            $seminaire[$i]['lien']='http://www.lof.cnrs.fr/';
                            $seminaire[$i]['lien'].=$lien->href;
                 }

                 

                // LABO pour l'affichage des images en fonction du labo 
                 $seminaire[$i]['labo']='lof';

              
              
              $i++; 

            }

            return  $seminaire;

} 

    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $seminaire[$i]['titre']
    $seminaire[$i]['date']
    $seminaire[$i]['orateur']
    $seminaire[$i]['lieu']
    $seminaire[$i]['lien']
    $seminaire[$i]['labo']
    ------------------------------------------------------*/
    public function setSemCenbg($html){


            $i = 0;

            foreach($html->find('ul.spip li') as $e){

                    
                  //INIT ( valeur par défaut )
                    $seminaire[$i]['lien'] = "";
                    $seminaire[$i]['lieu'] = "CENBG";

                  //TITRE
                   foreach($e->find('strong') as $titre){
                    $seminaire[$i]['titre']=utf8_encode($titre->plaintext);
                    }

                    if (empty($seminaire [$i]['titre'])){
                        $seminaire [$i]['titre']='cafe labo';
                    }

                  //ORATEUR
                   foreach($e->find('i') as $orateur){
                    if (!array_key_exists('orateur', $seminaire[$i])){
                        $seminaire [$i]['orateur']= utf8_encode($orateur->innertext);
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
                        $seminaire[$i]['date']=$this->format_date($dt);  
                    } 
                   
                    if (array_key_exists(1, $dtlieu)){     
                        $dtlieu[1] = preg_replace("/<br>/","", $dtlieu[1]);//lieu
                        $dtlieu[1]= str_replace("</li>","", $dtlieu[1]);
                        $dtlieu[1] = preg_replace("/<\/font>/","", $dtlieu[1]);

                       $seminaire [$i]['lieu']=$dtlieu[1];  
                    } 


                     //LIEN
                    foreach($e->find('strong a') as $lien){
                        $seminaire [$i]['lien']=$lien->href;
                    }

                    // LABO pour l'affichage des images en fonction du labo 
                    $seminaire [$i]['labo']='cenbg';


               $i++;     
            }

        return  $seminaire;
           
    }

    /*------------------------------------------------------
    EXTRACTION DES DONNEES DU LABO LOF 
    retourne une tableau 2D associatif de la forme 
    $seminaire[$i]['titre']
    $seminaire[$i]['date']
    $seminaire[$i]['orateur']
    $seminaire[$i]['lieu']
    $seminaire[$i]['labo']
    ------------------------------------------------------*/

    public function setSemCrpp($html){

        

        foreach($html->find('font') as $e){
                        
                foreach($e->find('a') as $lien){
                    $link=$lien->href;
                }
        }

        $y=0;
        $collection = $html->find('font');
        foreach($collection as $e) {

            if(isset($e->face) && !strpos($e,'Calendrier')) { 
                    $pattern = '#<a[^<]*>[^<]*</a>#im';
                    $e = preg_replace($pattern, '', $e);
                    $e = strip_tags($e);
                    $date = strstr($e, ',', true);// date OK
                    $heur = strstr($e, ',');
                    $heur = preg_replace('/,/', '', $heur, 1);
                    $heure = strstr($heur, ',', true); // HEURE OK
                    $lie = strstr($heur, ',');
                    $lie = preg_replace('/,/', '', $lie, 1);
                    $lieu = strstr($lie, ',', true);// LIEU OK
                    $orateu = strstr($lie, ',');
                    $orateu = preg_replace('/,/', '', $orateu, 1);
                    $orate = strstr($orateu, ',');
                    $orate = preg_replace('/,/', '', $orate, 1);

                    if (strpos($orate,'(')){
                    $orat = strstr($orate, ')', true); 
                    }
                    else {
                    $orat = strstr($orate, ',', true); 
                    }
                    $orateu = str_replace('(','', $orat);
                    $orateur = str_replace(')','', $orateu); // ORATEUR OK 
                    if (strpos($orate,'(')){
                    $suj = strstr($orate, ')'); 
                    }
                    else {
                    $suj = strstr($orate, ','); 
                    }
                    
                   
                    $suj = str_replace(')', '', $suj);
                    $suj = str_replace(',', '', $suj);
                    $sujet = preg_replace('/,/', '', $suj, 1); // SUJET OK
                    echo 'DATE : '.$this->format_date($date).'<br> HEURE : '.$heure.'<br> LIEU : '. $lieu.'<br> ORATEUR : '.$orateur.'<br> SUJET : '.$sujet.'<br> Lien : '.$link.'<br><br>';
                    

                    $seminaire [$y]['date']=$this->format_date($date);
                    $seminaire [$y]['titre']=utf8_encode($sujet);
                    $seminaire [$y]['orateur']=utf8_encode($orateur);
                    $seminaire [$y]['lien']= 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite';
                    $seminaire [$y]['lieu']=$lieu;
                    $seminaire [$y]['labo']='CRPP';
                     $y= $y+1;  
                 }
                  
            }

            print_r($seminaire);
            return $seminaire;


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


} //fin class
?>