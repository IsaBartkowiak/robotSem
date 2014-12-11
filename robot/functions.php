<?php 



function format_jour ($dt){

    if(preg_match("/,/i", $dt)){
        
        $dt = strstr($dt, ",", true);
    }

    if(preg_match("/à/i", $dt)){
        $dt = strstr($dt, "à", true);
    }
    
    $dt = preg_replace("/le/i","", $dt);
    $dt = preg_replace("/lundi/i","", $dt);
    $dt = preg_replace("/mardi/i","", $dt);
    $dt = preg_replace("/mercredi/i","", $dt);
    $dt = preg_replace("/jeudi/i","", $dt);
    $dt = preg_replace("/vendredi/i","", $dt);

    return $dt;


}

function lof_formatDate ($var){

    $var= format_jour ($var);
    

    $var= str_replace("Lire la suite","", $var);

   

    if(!preg_match("/2015/i", $var)){
        $var .= " 2015";
    }

      return $var;
}
?>
