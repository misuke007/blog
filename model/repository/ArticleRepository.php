<?php

	class ArticleRepository extends QueryBuilder{

		public $model;
		


		public function __construct($model){

			parent::__construct($model);
		}

		public function find_with_slug($slug){

			$find = "single";

			$var = $slug;
			$this->findOne_with_slug($var);
		    return $this->getResult($find = "single");

		}


		public function find_where($value){

			$rech = $value;

			
			$this->like($this->model->getTitre(),$rech);
			return  $this->getResult($find = "all");

		}

		public function find_with_categorie($valeur){

			$id = $valeur;
			$this->where($this->model->getCategorieId(),$id);
			return  $this->getResult($find = "all");
		}

		public function findWithCategorie($categorie){

			$categoryName = $categorie;
			$this->where($this->model->getNomCategorie(),$categoryName);
			return  $this->getResult($find = "all");

		}


	}


?>