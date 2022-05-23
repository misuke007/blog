<?php
require('../controller/updateArticle.contr.php');
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<h1>MAJ</h1>

<form method="POST" enctype="multipart/form-data">

	<input type="text" name="titre" value="<?=$oneArticle['titre']?>">
	<input type="text" name="contenu" value="<?=$oneArticle['contenu']?>">
	<input type="text" name="auteur" value="<?=$oneArticle['auteur']?>">
	<input type="file" name="photo">
	<select name="categorie">

		<?php foreach($result as $value) { ?>

			<option value=<?=$value['id_categorie']?>><?=$value['nom_categorie']?></option>

		<?php } ?>	

	</select>

	<button type="submit" name="submit">Envoyer</button>
	
</form>

</body>
</html>