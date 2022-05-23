<?php

	 class Article extends Db{

	 	public $table;
	 	public $column;
	 	public $foreign_key;
	 	public $id;
	 	public $slug;
	 	public $titre;
	 	public $categorie_id;

	 	public function __construct(){

	 		$this->table = "article";
	 		$this->slug = "slug";
	 		$this->titre = "titre";
	 		$this->categorie_id = "categorie_id";
	 		$this->id = "id_article";
	 		$this->foreign_key = "categorie_id";
	 		$this->column = ["titre","slug","contenu","auteur","photo","date_de_publication","categorie_id"];
	 		parent::__construct();


	 	}

	 	public function getTable(){

	 		return $this->table;
	 	}

	 	public function getForeignKey(){

	 		return $this->foreign_key;
	 	}

	 	public function getSlug(){

	 		return $this->slug;
	 	}

	 	public function getTitre(){

	 		return $this->titre;
	 	}

	 	public function getCategorieId(){

	 		return $this->categorie_id;
	 	}
	 }


?>