<?php 
include('RobotSeminaire.php');
include('Admin-database.php');
include('simple_html_dom.php');
/******************************/
/* Controlleur Administration */ 
/******************************/
class AdminController {
	private $loginpost;
	private $passwordpost;
	private $identifiantspost = [];
	private $admin = [];
	private $contributeur = [];
	private $statut;
	private $database;

	public function __construct() {

		$this->database = new AdminDatabase();
		/*

		$this->loginpost = $_POST['login'];
		$this->passwordpost = $_POST['password'];
		$this->identifiantspost = ['login' => $this->loginpost, 'password' => $this->passwordpost];
		// Mot de passe et login autorisés
		$this->admin = ['login' => 'admin', 'password' => 'passwordadmin'];
		$this->contributeur = ['login' => 'contributeur', 'password' => 'passwordcontributeur'];
		if (isset($_GET['deconnexion'])) {
			$this->deconnexion();
		}
		elseif ($this->identifiantspost['login'] == $this->admin['login'] && $this->identifiantspost['password']==$this->admin['password'] OR $_SESSION['nom'] == 'Simon Villain-Guillot' OR $_COOKIE['nom']=='Simon Villain-Guillot' && $_COOKIE['password']==$this->admin['password']) {
			$this->statut='admin';
		}
		elseif ($this->identifiantspost['login'] == $this->contributeur['login'] && $this->identifiantspost['password']==$this->contributeur['password'] OR $_SESSION['nom'] == 'Contributeur' OR $_COOKIE['nom']=='Contributeur' && $_COOKIE['password']==$this->contributeur['password']) {
			$this->statut='contributeur';
		}
		else {
			$this->statut='login';
		}
		*/

	}

	public function adminAction() {
			if ($this->statut=='admin') {
				// Session admin
				$_SESSION['nom'] = 'Simon Villain-Guillot';
				setcookie('nom', 'Simon Villain-Guillot', time() + 30*24*3600, null, null, false, true);
				setcookie('password', $this->admin['password'], time() + 30*24*3600, null, null, false, true);
				include '../vues/admin/admin.php';
			}
			
			elseif ($this->statut=='contributeur') {
				//ADMINISTRATION CONTRIBUTEUR
				$_SESSION['nom'] = 'Contributeur';
				setcookie('nom', 'Contributeur', time() + 30*24*3600, null, null, false, true);
				setcookie('password', $this->admin['passwordcontributeur'], time() + 30*24*3600, null, null, false, true);
				include '../vues/admin/contributeur.php';
			}
			// Si mauvais mot de passe ou login, retour au login
			else {
				include '../vues/admin/login.php';
			}
		}
	private function deconnexion() {
			setcookie('nom', NULL, -1);
			setcookie('password', NULL, -1);
			unset($_SESSION['nom']);
			unset($_SESSION['password']);
			unset($_COOKIE['nom']);
			unset($_COOKIE['password']);
			session_destroy();
			if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
			}
			$this->statut='deconnexion';
			header('Location: ./');
	}

	public function syncroSeminaire() {

		$dataLof= file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
		$dataCenbg = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2015-');
		$dataCrpp = file_get_html('http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite');
		$dataObsu = file_get_html('http://www.obs.u-bordeaux1.fr/seminaires/liste_seminaires.php');

		// INIT 
		$extraction = new RobotSeminaire();

		// RECUPERATION DES DONNEES
		$seminairesLof = $extraction->setSemLof($dataLof);
		$seminairesCenbg = $extraction->setSemCenbg($dataCenbg);
		$seminairesCrpp = $extraction->setSemCrpp($dataCrpp);
		$seminairesObsu = $extraction->setSemObsu($dataObsu);

		//INSERTION DANS BD
		$insertionsId = $this->database->insertSeminaire($extraction->seminaire);
		if (!empty($insertionsId)){
			return $insertionsId;
		}
	}

	public function listerSemSync ($insertId){

		$donnees = $this->database->getSemSync($insertId);
		$res = array();
		
		while ($ligne= $donnees->fetch()){
           	array_push($res, $ligne);
        }

        return $res;

	}

}
?>