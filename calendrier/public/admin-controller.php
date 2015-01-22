<?php 
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

	public function adminAction() {
			if ($this->statut=='admin') {
				// Session admin
				$_SESSION['nom'] = 'Simon Villain-Guillot';
				setcookie('nom', 'Simon Villain-Guillot', time() + 30*24*3600, null, null, false, true);
				setcookie('password', $this->admin['password'], time() + 30*24*3600, null, null, false, true);
				include '../vues/admin/admin.php';
					if (isset($_GET['action'])) {
						    switch ($_GET['action']) {
						        case "syncro":
						            include '../vues/admin/onglets/content-syncro.php';
						            break;
						        case "ajouter":
						            include '../vues/admin/onglets/content-ajouter.php';
						            break;
						        case "editer":
						            include '../vues/admin/onglets/content-editer.php';
						            break;
						        case "editerp":
						            include '../vues/admin/onglets/content-editerp.php';
						            break;
						   	 }
						} else {
					    	include 'content-index.php';
						}
				include '../vues/admin/admin-footer.php';

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
	public function __construct() {
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

	}
}
?>