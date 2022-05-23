<?php

	class Categorie extends Db{

		public $column;
		public $primary_key;
		public $table;
		public $nom_categorie;

		public function __construct(){

			$this->table = "categorie";
			$this->primary_key = "id_categorie";
			$this->nom_categorie = "nom_categorie";
			$this->column = ["nom_categorie"];
			parent::__construct();
		}

		public function getTable(){

			return $this->table;
		}
		public function getPrimaryKey(){

			return $this->primary_key;
		}

		public function getNomCategorie(){

			return $this->nom_categorie;
		}
	}

?>