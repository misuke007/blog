<?php
require('categorie.contr.php');
require('../model/article.class.php');
require ('../model/repository/querybuilder.php');
require ('../model/repository/ArticleRepository.php');
require ('../model/repository/CategorieRepository.php');
require('../model/slug.class.php');

$article = new Article();
$repo = new ArticleRepository($article);
$repoCategorie = new CategorieRepository($categorie);







//insertion article

if(isset($_POST['submit'])){

	$titre = $_POST['titre'];
	$contenu = $_POST['contenu'];
	$auteur = $_POST['auteur'];
	$photo = $_FILES['photo'];
	$option = $_POST['option'];

	$date = date('y-m-d');



	$slug_titre = Slug:: slugger($titre);

	$upload_dir = "../public/stockage_img/";

			$current_file_name = $_FILES['photo']['name'];
			$file_extension = strtolower(pathinfo($current_file_name, PATHINFO_EXTENSION));
			$new_file_name = 'FILE-'.time().".".$file_extension;
			$file_dir = $upload_dir.$new_file_name;
			
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $file_dir)){

				echo "file uploaded";
	
			}else{

				echo "upload fail";

			}



	 $article->insert(["titre"=>$titre,"slug"=>$slug_titre,"contenu"=>$contenu,"auteur"=>$auteur,"photo"=>$new_file_name,"date_de_publication"=>$date,"categorie_id"=>$option]);

}
     //fin insertion article
		
		//liste des articles
		
		if(isset($_POST['readArticle'])){

			$listeArticle = $article->selectAll();

			$table = "

				<table class='table table-hover table-dark'>
					<tr>
					  <thead>
					  	<th>Id<th>
					  	<th>Titre<th>
					  	<th>Auteur<th>
					  	<th>Date de publication<th>
					  	<th>Action<th>
					  </thead>
					</tr>
					<tbody>


			";

			foreach ($listeArticle as $listArticle ) {
					
					$table.= "

							<tr>
								<td>".$listArticle['id_article']."<td>
								<td>".$listArticle['titre']."<td>
								<td>".$listArticle['auteur']."<td>
								<td>".$listArticle['date_de_publication']."<td>
								<td><button  class='btn btn-success' data-toggle='modal' data-target='#exampleModalLong' onclick='viewArticle(".$listArticle['id_article'].")'>Voir</button></td>
								<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='recup(".$listArticle['id_article'].")'>Update</button></td>
								<td><button class ='btn btn-danger' onclick='suppr(".$listArticle['id_article'].")'>Supprimer</button><td>

							</tr>



							";
			}


			$table.= "</tbody></table>";
			echo $table;




		}

		// fin liste des article

		//Delete article
		if(isset($_POST['idArticle'])){

		 $id = $_POST['idArticle'];
		 $article->delete($id);

		 echo "Suppression avec succès";
		}
		//fin delete article

		//update article

			if (isset($_POST['idUpdate'])) {
				
				$idUpdate = $_POST['idUpdate'];
				$resultat = $article->selectOne($idUpdate);
				echo json_encode($resultat);
			}

			if (isset($_POST['idUpdateArticle'])) {
				
				$id = $_POST['idUpdateArticle'];
				$titre = $_POST['titre'];
				$auteur = $_POST['auteur'];
				$date = $_POST['date'];
				$contenu = $_POST['contenu'];
				$photo = $_FILES['file'];
				$slug_titre = Slug:: slugger($titre);
				$id_categorie = $_POST['option'];

				$upload_dir = "../public/stockage_img/";

			$current_file_name = $_FILES['file']['name'];
			$file_extension = strtolower(pathinfo($current_file_name, PATHINFO_EXTENSION));
			$new_file_name = 'FILE-'.time().".".$file_extension;
			$file_dir = $upload_dir.$new_file_name;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file_dir)){

				echo "file uploaded";
	
			}else{

				echo "upload fail";

			}

	       $article->update(["titre"=>$titre,"slug"=>$slug_titre,"contenu"=>$contenu,"auteur"=>$auteur,"photo"=>$new_file_name,"date_de_publication"=>$date,"categorie_id"=>$id_categorie],$id);

				echo "Mise à jour réussi";
			}
		//fin update

		//findOne avec slug

			if (isset($_GET['slug'])) {
				
				$slug = $_GET['slug'];

				$result = $repo->find_with_slug($slug);

				 $nombre_de_vu = $result['nombre_de_vu'] + 1;

				 $article->viewNumber($nombre_de_vu,$slug);



			}

		//fin findOne avec slug

			//recherche article

			if(isset($_POST['search'])){

				$recherche = $_POST['search'];
				$resultat_recherche = $repo->find_where($recherche);

				$nbr_resultat = count($resultat_recherche);

				
			

				$message = '';

				if ($nbr_resultat == 0 || $nbr_resultat == 1) {
				 $message =  "Vous avez"." ".$nbr_resultat." resultat ";
				} else{
					$message =  "Vous avez"." ".$nbr_resultat." resultats ";
				}


				$table = "

				<table class='table table-hover table-dark'>
					<tr>
					  <thead>
					  	<th>Id<th>
					  	<th>Titre<th>
					  	<th>Auteur<th>
					  	<th>Date de publication<th>
					  	<th>Action<th>
					  </thead>
					</tr>
					<tbody>


			";

			foreach ($resultat_recherche as $listArticle ) {
					
					$table.= "

							<tr>
								<td>".$listArticle['id_article']."<td>
								<td>".$listArticle['titre']."<td>
								<td>".$listArticle['auteur']."<td>
								<td>".$listArticle['date_de_publication']."<td>
								<td><button class='btn btn-success' data-toggle='modal' data-target='#exampleModalLong' onclick='viewArticle(".$listArticle['id_article'].")'>Voir</button></td>
								<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='recup(".$listArticle['id_article'].")'>Update</button></td>
								<td><button class ='btn btn-danger' onclick='suppr(".$listArticle['id_article'].")'>Supprimer</button><td>

							</tr>



							";
			}


			$table.= "</tbody></table>";
			
			$reponse = ["table"=>$table,"message"=>$message];

			echo  json_encode($reponse);


				


			}

			//fin recherche article


			//Affichage par categorie

					if (isset($_GET['affichparCat'])) {
						

							$id_categorie = $_GET['affichparCat'];
							$resulat_affich_par_cat = $repo->find_with_categorie($id_categorie);

							$nbrResult_par_cat = count($resulat_affich_par_cat);

							 $nbrResult_par_cat;
							header('location:../view_admin/inde.php?resultCat='.$nbrResult_par_cat);


						}

			//fin affichage par categorie

					if(isset($_POST['item'])){

						$id_categorie = $_POST['item']; 
						$resultArticleByCat = $repo->find_with_categorie($id_categorie);

						$table = "

							<table class='table table-hover table-dark'>
					<tr>
					  <thead>
					  	<th>Id<th>
					  	<th>Titre<th>
					  	<th>Auteur<th>
					  	<th>Date de publication<th>
					  	<th>Action<th>
					  </thead>
					</tr>
					<tbody>


						";
						foreach ($resultArticleByCat as $listArticle ) {
					
							$table.= "

							<tr>
								<td>".$listArticle['id_article']."<td>
								<td>".$listArticle['titre']."<td>
								<td>".$listArticle['auteur']."<td>
								<td>".$listArticle['date_de_publication']."<td>
								<td><button class='btn btn-success' data-toggle='modal' data-target='#exampleModalLong' onclick='viewArticle(".$listArticle['id_article'].")'>Voir</button></td>
								<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='recup(".$listArticle['id_article'].")'>Update</button></td>
								<td><button class ='btn btn-danger' onclick='suppr(".$listArticle['id_article'].")'>Supprimer</button><td>
								

							</tr>";

						      }

						      $table.= "</tbody></table>";
							  echo $table;

					   
					}

					//view Article in modal

					if(isset($_POST['articleId'])){

						$articleId = $_POST['articleId'];
						$resultat = $article->selectOne($articleId);
						echo json_encode($resultat); 	
						
					}	


?>



