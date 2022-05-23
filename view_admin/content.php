
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 " id="content">
          




          <div id="table">
            
          </div>

    <!-- Modal voir article-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Article n° <span id="numArticle">90</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-center">
          <div class="imgArticle">
             <img src="" id="imageArticle">
          </div>
        </div>
        <div class="row">
          <h4 class="ml-2 mt-2" id="articleTitre">kaka be maloto</h4>
          
        </div>
        <div class="row">
          <p class=" ml-1 mt-4"><i class="fa fa-calendar" aria-hidden="true"></i>
              <span class="ml-1" id="date">qsdfsdgsdgsdgsdg</span>
          </p>
          <p class="ml-5 mt-4"><i class="fa fa-user" aria-hidden="true"></i>
               <span class="ml-1" id="auteur">qsdfsdgsdgsdgsdg</span>
          </p>
          
        </div>

        <div class="row">

          <p  id="textArticle"></p>
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #0C515A;">Close</button>
      </div>
    </div>
  </div>
</div>      


<!-- Modal update -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mise à jour d'un article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype ="multipart/form-data" id="formUpdate">
        <div class="row">
          <label class="col-2">Titre : </label>
          <div class="col-10">
            <input type="hidden" id="idArticle" name="idUpdateArticle">
            <input type="text" name="titre" class="form-control" id="titre">
           
          </div>
          <label class="col-2">Auteur :</label>
          <div class="col-10">
             <input type="text" name="auteur" class="form-control" id="auteur">
          </div>
          <label class="col-2">Date:</label>
          <div class="col-10">
              <input type="date" name="date" class="form-control" id="date">
          </div>
          <label class="col-2">Contenu : </label>
          <div class="col-10">
            <textarea class="form-control" name="contenu" id="contenu"></textarea>
          </div>

          <label class="col-2">Photo : </label>
          <div class="col-10">
            <label for="file" class="d-flex">
            
            <div class="photo">
            <i class="fa fa-camera-retro"></i>

            <p>Choisir une photo...</p> 
              </div>
                
          </label>
             <input type="file" name="file" class="form-control" id="photo" id="file" style="display: none">
          </div>

          <label class="col-2">Categories</label>
          <div class="col-10">
            <select class="form-control" name="option" id="select">
                <?php foreach($result as $value) { ?>

                <option value=<?=$value['id_categorie']?>><?=$value['nom_categorie']?></option>

              <?php } ?>  
            </select>
            
          </div>

        </div>
       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

      </div>