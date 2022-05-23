<?php
require('categorie.contr.php');
require('../model/article.class.php');
require ('../model/slug.class.php');

		$article = new Article();

		if (isset($_GET['id'])) {

			$id = $_GET['id'];
			$oneArticle = $article->selectOne($id);


				if (isset($_POST['submit'])) {
					
					$titre = $_POST['titre'];
					$contenu = $_POST['contenu'];
					$auteur = $_POST['auteur'];
					$categorie = $_POST['categorie'];
					$photo = $_FILES['photo'];
					$slug_titre = Slug:: slugger($titre);
					$date = date('y-m-d');

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


					$article->update(["titre"=>$titre,"slug"=>$slug_titre,"contenu"=>$contenu,"auteur"=>$auteur,"photo"=>$new_file_name,"date_de_publication"=>$date,"categorie_id"=>$categorie],$id);

					header('Location:../view/listeArticleAdmin.php');



					
				}
		}else{

			header('Location:../view/listeArticleAdmin.php');
		}
		




	

?>