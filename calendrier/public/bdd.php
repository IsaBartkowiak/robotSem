<?php 
class Database {
	private $server;
	private $user;
	private $password;
	private $dbname;
	private $bd;
	public function __construct()  {
		$this->server = 'localhost';
		$this->user = 'root';
		$this->password = '';
		$this->dbname = 'seminaire';
		try
		{
		$this->bd = new PDO("mysql:host=$this->server;dbname=$this->dbname", "$this->user", "$this->password");
		}
		catch(Exception $e)
		{
        die('Erreur : '.$e->getMessage());
		}
	}
	public function listerSeminairesCal() {
		$reponse = $this->bd->prepare("SELECT * FROM seminaire");
		$reponse->execute();
		while ($donnees = $reponse->fetch())
		{
			?>

'<?php echo date("m-d-Y", strtotime($donnees['date'])); ?>' : '<span>Titre : <?php echo $donnees['titre']; ?><br>Orateur : <?php echo $donnees['orateur']; ?></span>',<?php
		}
	}
	public function listerSeminairesLs($debut,$fin) {
		$this->bd->query("SET NAMES 'utf8'");
        $select = $this->bd->query("SELECT * FROM seminaire WHERE date BETWEEN '$debut' AND '$fin' ORDER BY date ASC");
		$select->setFetchMode(PDO::FETCH_OBJ);
		while( $ligne = $select->fetch() ){
	
 			echo '<h2>'.$ligne->titre.'</h2>';
 			echo "<p>Date: ".$ligne->date."</p>";
 			echo "<p>".$ligne->orateur."</p>";
 			echo "<p>".$ligne->lieu."</p>";
 			echo "<p>".$ligne->lien."</p>";
		}
	}
 }
 ?>