<?php

require('../model/db.class.php');
require('../model/categorie.class.php');
$categorie = new Categorie();
$result = $categorie->selectAll();

if(isset($_POST['sub'])){

	$categorie->insert(["nom_categorie"=>$_POST['categorie']]);

}



?>



