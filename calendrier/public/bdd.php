<?php 
class Database {
	protected $server;
	protected $user;
	protected $password;
	protected $dbname;
	protected $bd;
	public function __construct()  {
		$this->server = 'localhost';
		$this->user = 'root';
		$this->password = 'root';
		$this->dbname = 'seminaires';
		try
		{
		$this->bd = new PDO("mysql:host=$this->server;dbname=$this->dbname", "$this->user", "$this->password");
		}
		catch(Exception $e)
		{
        die('Erreur : '.$e->getMessage());
		}
	}
	public function setNames() {
		$this->bd->query("SET NAMES 'utf8'");
	}
	public function seminaireParDate($dtdebut,$dtfin) {
		$select = $this->bd->prepare("SELECT * FROM seminaire WHERE date BETWEEN '$dtdebut' AND '$dtfin' ORDER BY date ASC");
		$select->execute();
		$select->setFetchMode(PDO::FETCH_OBJ);
		$donnees = array();
		for ( $i = 0; $ligne = $select->fetch(); $i++ ){
				$donnees[$i]['date'] = date("d", strtotime($ligne->date));
				$donnees[$i]['titre'] = $ligne->titre;
				$donnees[$i]['orateur'] = $ligne->orateur;
				$donnees[$i]['lieu'] = $ligne->lieu;
				$donnees[$i]['lien'] = $ligne->lien;
			}
		return $donnees;

	}
	public function listerSeminairesCal() {
		$reponse = $this->bd->prepare("SELECT * FROM seminaire");
		$reponse->execute();
		while ($donnees = $reponse->fetch())
		{
			?>

'<?php echo date("m-d-Y", strtotime($donnees['date'])); ?>' : '<span><h2>Titre : <?php echo $donnees['titre']; ?></h2><p>Orateur : <?php echo $donnees['orateur']; ?></p><p>Lieu : <?php echo $donnees['lieu']; ?></p><img src="assets/images/logo-<?php echo $donnees['labo']; ?>.png"/></span>',<?php
		}
	}
	public function ajouterAbonne($mail) {
	$this->bd->query("INSERT INTO newsletter (mail) VALUES ('$mail')");
	}
 }
 ?>