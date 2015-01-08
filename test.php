<?php 
set_time_limit(9999);
for ($i = 1; $i <= 99; $i++) {
$lien = 'http://jeremybeccavin.com/traitement_formulaire.php';
$postfields = array(
			'nom' => 'Salut',
		   'email' => 'coucoujeremy@cossucoujeremy.com',
		   'objet' => 'Coucou jérémy ça va ?',
		   'message' => 'Ça va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça vaÇa va Jéremy ?Ça va',
		   'envoi' => 'envoyer'
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $lien);
curl_setopt($curl, CURLOPT_COOKIESESSION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);

$return = curl_exec($curl);
curl_close($curl);
sleep(1);
}
?>