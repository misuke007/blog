<?php

	class Db {

		public $column;
		public $table;
		public $db;
		public $id;

		public function __construct(){


			try{

					$this->db = new PDO('mysql:dbname=projet_blog;host:127.0.0.1','root',null);
			   	} catch(PDOException $error){

			   		echo $error->getMessage();

			   	}



		}

		public function selectAll(){

			$requete = $this->db->query("SELECT * FROM $this->table");
			$result = $requete->fetchAll();

			return $result;
		}

		public function insert($data){

			$attr = '';
			$array = [];
			$nbr_interrogation ='';

			foreach ($this->column as $value ) {
					
					$attr = $attr.",".$value;
					$nbr_interrogation = $nbr_interrogation.","."?"; 
				}

				$attr = substr($attr,1);
				$nbr_interrogation = substr($nbr_interrogation,1);
				for ($i=0; $i < count($this->column); $i++) { 
					
					array_push($array, $data[$this->column[$i]]);
				}	
				

				 $requete = "INSERT INTO $this->table ($attr) VALUES($nbr_interrogation)";
				 $statement  = $this->db->prepare($requete);
				 $statement->execute($array);


		}

		public function delete($id){

			 $requete = "DELETE FROM `$this->table` WHERE `$this->id` = $id ";
			 $stm = $this->db->prepare($requete);
			 $stm->execute();
		}

		public function selectOne($id){

			$req = $this->db->query("SELECT * FROM `$this->table` WHERE $this->id = $id");
			$result = $req->fetch();

			return $result;
			

		}

		public function update($data,$id){

			$attr = '';
			$array = [];

			foreach ($this->column as $columns ) {
				
				$attr = $attr.' , '.$columns.' = '.'?';
				
			}

			$attr = substr($attr,2);

			for ($i=0; $i < count($this->column) ; $i++) { 
				array_push($array, $data[$this->column[$i]]);
			}

			  $req = "UPDATE `$this->table` SET $attr WHERE $this->id =$id";
		 	  $stm = $this->db->prepare($req);
		 	  $stm->execute($array);


			





		}

		public function queryExec($query){

			$req = $this->db->query("$query");
			$result = $req->fetch();

			return $result;

			

		}


		public function queryExecAll($query){

			$req = $this->db->query("$query");
			$result = $req->fetchAll();

			return $result;

			

		}

		public function viewNumber($nombre,$slug){

			$req = "UPDATE $this->table SET `nombre_de_vu` = ? WHERE `slug`= '$slug'";
			 $statement  = $this->db->prepare($req);
			 $statement->execute(array($nombre));
		}


		
	}


?>
