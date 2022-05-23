<?php

	class QueryBuilder{

		public $model;
		public $requeteBase;

		public function __construct($model){

			$this->model = $model;
			$table = $model->getTable();
			$this->requeteBase = "SELECT * FROM $table";

		}

		public function getResult($find){

			if($find != "single"){

			  return $this->model->queryExecAll($this->requeteBase);
			} else{

					return $this->model->queryExec($this->requeteBase);
			}

		
			// return $this->requeteBase;
		}

		public function innerJoin($table){

			$model_1 = $this->model->getTable();
			$model_2 = $table->getTable();

			$this->requeteBase = $this->requeteBase." INNER JOIN $model_2 ON ".$model_1.".".$this->model->getForeignKey()." = ".$model_2.".".$table->getPrimaryKey();

		}

		public function findOne_with_slug($slug){

			 $this->requeteBase = $this->requeteBase." WHERE ".$this->model->getSlug()." = "."'".$slug."'";


		}

		public function where($col,$val){

			 $this->requeteBase = $this->requeteBase." WHERE "."`".$col."`"." = "."'".$val."'";

		}

		public function like($col,$value){

		 $this->requeteBase = $this->requeteBase." WHERE "."`".$col."`"." LIKE "."'"."%".$value."%"."'";
		}

	}


?>