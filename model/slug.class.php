<?php
	
	class Slug {

		public static function slugger($string){

				$slug = preg_replace('/[^A-Za-z0-9]+/', '-', $string);

				return strtolower($slug)."-".uniqid();

		}
	}

?>