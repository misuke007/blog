<?php

	class AdminRepository extends QueryBuilder{

		public $model;
		


		public function __construct($model){

			parent::__construct($model);
		}



		public function findPassword($key){

			$this->where($this->model->getAdresseEmail(),$key);
			return  $this->getResult($find = "single");


		}

		
	}


?>