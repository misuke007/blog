<?php
require('../controller/article.contr.php');

?> 
	<div class="d-flex justify-content-center mt-5">
		<div class="ajout col-md-12">
		<div class="row">	
		<h5 class="col-md-10">Ajouter un article</h5>
		<i class="fa fa-plus col-md-2" aria-hidden="true"></i>

		</div>
		<hr>

		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<label  class="col-md-2 form-control-label">Titre </label>
				<div class="col-md-10">
						<input type="text" name="titre" id="popo" class="form-control" placeholder="Entrez le nom du produit">
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 form-control-label">Contenu </label>
				<div class="col-md-10">
						<textarea class="form-control" name="contenu" placeholder="Contenu de votre article" rows="7"></textarea>
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 form-control-label">Auteur </label>
				<div class="col-md-10">
						<input type="text" name="auteur" class="form-control" placeholder="Entrez le nom du produit">
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 form-control-label">Photo </label>
				<div class="col-md-10">
					
					

					<label for="file" class="d-flex">
						
						<div class="photo">
						<i class="fa fa-camera-retro"></i>

						<p>Choisir une photo...</p>	
					    </div>
					    	
					</label>
						<input type="file" name="photo" class="form-control" placeholder="Entrez le nom du produit" id="file" style="display: none">
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 form-control-label">Categorie </label>
				<div class="col-md-10">
						<select class="form-control" name="option">
  							<?php foreach($result as $value) { ?>

								<option value=<?=$value['id_categorie']?>><?=$value['nom_categorie']?></option>

							<?php } ?>	
						</select>
				</div>
			</div>
			<div class="row">
					<div class="col-md-12">
						<center><button type="submit" name="submit" class=" mt-3">Ajouter</button ></center> 
					</div>
				</div>
			
		</form>

			
		</div>

		
	</div>

