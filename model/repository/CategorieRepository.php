<?php
	class CategorieRepository extends  QueryBuilder {

		public $model;

		public function __construct($model){
			parent::__construct($model);

		}

		public function findWithName($categorieName){

			$name = $categorieName;
			$this->where($this->model->getNomCategorie(),$name);
			return  $this->getResult($find = "all");

		}


		


	}


?>