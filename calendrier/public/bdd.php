<?php 
class Database {
	private $server;
	private $user;
	private $password;
	private $dbname;
	private $db;

	public function listerSeminairesCal() {
		$bd->query("SET NAMES 'utf8'");
		$statement=$bd->prepare("SELECT *, DATE_FORMAT(date, '%m-%d-%Y') AS date FROM seminaire");
		$statement->execute();
		$results=$statement->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($results);
	}
	public function listerSeminairesLs($debut,$fin) {
		$bd->query("SET NAMES 'utf8'");
        $select = $bd->query("SELECT * FROM seminaire WHERE date BETWEEN '$debut' AND '$fin' ORDER BY date ASC");
		$select->setFetchMode(PDO::FETCH_OBJ);

		while( $ligne = $select->fetch() ){
	
 			echo '<h2>'.$ligne->titre.'</h2>';
 			echo "<p>Date: ".$ligne->date."</p>";
 			echo "<p>".$ligne->orateur."</p>";
 			echo "<p>".$ligne->lieu."</p>";
 			echo "<p>".$ligne->lien."</p>";
		}
	}
	public function __construct()  {
		$this->$server = 'localhost';
		$this->$user = 'root';
		$this->$password = '';
		$this->$dbname = 'seminaire';
		$this->$db = new PDO("mysql:host='$server';dbname='$dbname', '$user', '$password'");
	}

 }