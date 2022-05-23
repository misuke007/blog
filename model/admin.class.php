<?php
	
	class Admin extends Db{

		public $column;
		public $adresse_email;
		public $table;

		public function __construct(){

			$this->table = "admin";
			$this->adresse_email = "adresse_email";
			$this->column = ["adresse_email","mot_de_passe"];
			parent::__construct();
		}

		public function getAdresseEmail(){

			return $this->adresse_email;
		}

		public function getTable(){

			return $this->table;
		}
	}


?>