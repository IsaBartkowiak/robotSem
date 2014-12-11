<?php 
class Database {
	private $server;
	private $user;
	private $password;
	private $dbname;
	private $db;

	
	public function __construct()  {
		$this->$server = 'localhost';
		$this->$user = 'root';
		$this->$password = 'root';
		$this->$dbname = 'seminaires';
		$this->$db = new PDO("mysql:host='$server';dbname='$dbname', '$user', '$password'");
	}

 }