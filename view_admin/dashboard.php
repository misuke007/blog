
<div class="col-12 col-sm-12 col-md-2 col-lg-2 dashboard ">

		<h4 class="ml-4 mt-3 text-center"><i class="fa fa-cogs parametre" aria-hidden="true"></i>
</h4>

		<h5 class="text-center mt-5 accueil"><a href="inde.php" class="text-center" id="accueil"><i class="fa fa-home" aria-hidden="true"></i>
Accueil</a></h5>
		<hr class="col-11">
		<h5 class="text-center ajoutArtic"><a href="#" class="text-center" id="ajoutArticle"><i class="fa fa-plus-circle" aria-hidden="true"></i>
Ajouter article</a></h5>
		<hr class="col-11">
		<h5 class="text-center ajoutC"><a href="#" class="text-center" id="ajoutCategorie"><i class="fa fa-plus-circle" aria-hidden="true"></i>
Ajouter categorie</a></h5>
		<hr class="col-11">
<h5 class="text-center mt-3 choisir">Choisir categorie</h5>
	<ul>
		<?php foreach ($result as $res) { ?>
			<li><a href="#" id="listCat" cat = "<?=$res['id_categorie']?>"><i class="fa fa-list-alt"></i>
			<?=$res['nom_categorie']?></a>

		    </li>
		<?php } ?>	
	</ul>
	

<hr class="col-11">


	</div>


	<div class="col-12 col-sm-12 col-md-10 col-lg-10 contenu">
		<div class="row">
			<div class="navbar navbar-expand-lg col-12 col-sm-12 col-md-12 col-lg-12">

				<div class="col-md-8">

						<form action="" id="formSearch">
						<input type="search" name="search" placeholder="Rechercher" class="input" id="search">
						<button type="submit" name="submitSearch" class="btnSearch"><i class="fa fa-search" aria-hidden="true"></i>
						</button>
						</form>
						
					
				</div>

				<div class="col-md-4 d-flex mt-1 liste">

					<a href=""><i class="fa fa-comments mt-2"></i> Message</a>
					<a href=""><i class="fa fa-bell ml-3 mt-2"></i> Notification</a>

					<p class=" ml-5 mt-3">Misuketiana</p>
					<div class="pdp ml-3 mt-2"></div>					
				</div>
				
			</div>
			
		</div>

		<div class="row d-flex justify-content-center align-items-center" >




