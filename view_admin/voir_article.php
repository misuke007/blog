<?php
require('../controller/article.contr.php');
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<center><h1>Voir article</h1></center>

	<h1><?=$result['titre']?></h1>
	<h3><?=$result['contenu']?></h3>
	<p>Date de publication : <?=$result['date_de_publication']?></p>


</body>
</html>