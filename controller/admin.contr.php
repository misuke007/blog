<?php

require('../model/db.class.php');
require('../model/admin.class.php');
require('../model/repository/queryBuilder.php');
require('../model/repository/AdminRepository.php');

if (isset($_POST['submit'])) {
	
	$mail = $_POST['mail'];
	$password = $_POST['mdp'];
	$confirm_password = $_POST['mdp1'];

	if(!empty($mail) && !empty ($password)&&!empty ($confirm_password)){


		if (strpos($mail, "gmail") && strpos($mail, "com")) {

			if ($confirm_password === $password) {
						
				if (strlen($password) < 7 ) {
					
						echo $message = "mot de passe trop court";

						} else{

							$mdpCrypte = password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);

							$admin = new Admin();
							$admin->insert(["adresse_email"=>$mail,"mot_de_passe"=>$mdpCrypte]);
							header('Location:../view/loginAdmin.php');
							
							}
						
				} else{

					echo $message = "Erreur de confirmation mot de passe!!!";
				}
				
			
		} else{

			echo $message = "Votre email est invalide";
		}


	} else{

		echo $message = "Veuillez remplir tous les champs";
	}


}

if (isset($_POST['submitLog'])) {

	$mail = $_POST['mail'];
	$mot_de_passe = $_POST['mdp'];
	
	if (!empty($mot_de_passe)) {

		$admin = new Admin();
		$allAdmin = $admin->selectAll();
		$mail_valid = null;

		foreach ($allAdmin as $mailAdmin ) {
			#	
			if ($mail == $mailAdmin['adresse_email']) {
					$mail_valid = $mail;
				}	
		}

		if ($mail_valid != null ) {
			  $mail_valid;

			  $repoAdmin = new AdminRepository($admin);
			   $resul = $repoAdmin->findPassword($mail_valid);

				$compar_pass = password_verify($mot_de_passe, $resul['mot_de_passe']);

				if($compar_pass){


  					setcookie('adresseMail' , $mail_valid , time()+3600 , '/');
					header('Location:../view/accueilAdmin.php');
						
				}else{

						echo $message = "Votre mot de passe est incorrecte";

						
				}

			   



		}else{

			echo $message = " Votre adresse email est invalide " ;
		}


	} else{
		echo $message = "Veuillez Entrer votre mot de passe";
	}
}



?>