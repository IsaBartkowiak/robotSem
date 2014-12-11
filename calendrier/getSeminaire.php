<?php

 try
{
  $pdo = new PDO('mysql:host=localhost;dbname=seminaire', 'root', "");   

}
catch (Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$pdo->query("SET NAMES 'utf8'");
$pdo->query("SELECT DATE_FORMAT(date, '%m/%d/%Y') FROM seminaire");
$statement=$pdo->prepare("SELECT *, DATE_FORMAT(date, '%m-%d-%Y') AS date FROM seminaire");

$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);

?>
