<?php
	require('../controller/article.contr.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="POST">

		<input type="search" name="search">
		<input type="submit" name="submitSearch">
		
	</form>

	<table border="1">

		<thead>
			<th>Id</th>
			<th>Titre</th>
			<th>Contenu</th>
		</thead>

		<?php foreach($resultat as $res) { ?>

				<tr>
					<td><?=$res['id_article']?></td>
					<td><?=$res['titre']?></td>
					<td><?=$res['contenu']?></td>
					<td><a href="../controller/article.contr.php?id=<?=$res['id_article']?>">Delete</a></td>
					<td><a href="maj_article.php?id=<?=$res['id_article']?>">Modifier</a></td>
					<td><a href="voir_article.php?slug=<?=$res['slug']?>">Voir</a></td>
				</tr>

		<?php } ?>
		
	</table>

<form method="POST">


		<?php foreach($result as $value) { ?>

			<a href="../controller/article.contr.php?affichparCat=<?=$value['id_categorie']?>"><?=$value['nom_categorie']?></a>

		<?php } ?>	



</select>




</body>
</html>
