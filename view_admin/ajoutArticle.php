<?php
require('../controller/article.contr.php');
 
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">

	<input type="text" name="titre">
	<input type="text" name="contenu">
	<input type="text" name="auteur">
	<input type="file" name="photo">
	<select name="option">

		<?php foreach($result as $value) { ?>

			<option value=<?=$value['id_categorie']?>><?=$value['nom_categorie']?></option>

		<?php } ?>	

	</select>

	<button type="submit" name="submit">Envoyer</button>
	
</form>

</body>
</html>