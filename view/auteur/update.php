<div class="container">
    <h1 class="text-center mt-3">Update auteur</h1>
    <form action="<?= LienHelper::getLien('AuteurController','addValidPostForm'); ?>" method="POST" enctype="multipart/form-data" class="my-2">
        <input type="hidden" name="id" value="<?= $auteur->id ?>">
        <div class="row">
            <div class="mb-3 col">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= $auteur->nom ?>">
            </div>
            <div class="mb-3 col">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $auteur->prenom ?>">
            </div>
            <div class="mb-3 col">
                <label for="nom_de_plume" class="form-label">Nom de plume :</label>
                <input type="text" name="nom_de_plume" id="nom_de_plume" class="form-control" value="<?= $auteur->nom_de_plume ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="adresse" class="form-label">Adresse :</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="<?= $auteur->adresse ?>">
            </div>
            <div class="mb-3 col">
                <label for="ville" class="form-label">Ville :</label>
                <input type="text" name="ville" id="ville" class="form-control" value="<?= $auteur->ville ?>">
            </div>
            <div class="mb-3 col">
                <label for="code_postal" class="form-label">Code postal :</label>
                <input type="text" name="code_postal" id="code_postal" class="form-control" value="<?= $auteur->code_postal ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="mail" class="form-label">Mail :</label>
                <input type="text" name="mail" id="mail" class="form-control" value="<?= $auteur->mail ?>">
            </div>
            <div class="mb-3 col">
                <label for="numero" class="form-label">Numéro :</label>
                <input type="text" name="numero" id="numero" class="form-control" value="<?= $auteur->numero ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col text-center">
                <label for="photo_actuelle" class="form-label">Photo actuelle :</label><br>
                <img src="<?= $auteur->getSrcPhoto(); ?>" alt="" id="photo_actuelle" width="250" height="250">
            </div>
            <div class="mb-3 col">
                <label for="photo" class="form-label">Photo :</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="btn_add_auteur" class="btn btn-success" value="Ajouter">
        </div>
    </form>
</div>