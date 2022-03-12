<div class="container">
    <h1 class="text-center mt-3">Update livre</h1>
    <form action="index.php?controller=LivreController&methode=updateValidForm" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $livre->id ?>">
        <div class="mb-3">
            <label for="num_isbn" class="form-label">N°ISBN</label>
            <input type="text" name="num_ISBN" class="form-control" id="num_isbn" value="<?= $livre->num_ISBN ?>">
        </div>
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" value="<?= $livre->titre ?>">
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Résumer</label>
            <input type="text" name="resume" class="form-control" id="resume" value="<?= $livre->resume ?>">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control" id="prix" value="<?= $livre->prix ?>">
        </div>
        <div class="mb-3">
            <label for="nb_pages" class="form-label">Nombres de pages</label>
            <input type="text" name="nb_pages" class="form-control" id="nb_pages" value="<?= $livre->nb_pages ?>">
        </div>
        <div class="mb-3">
            <input type="hidden" name="disponibilite" class="form-control" id="disponibilite" value="<?= $livre->disponibilite ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="date_achat" class="form-label">Date achat</label>
            <input type="date" name="date_achat" class="form-control" id="date_achat" value="<?= $livre->date_achat ?>">
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" name="btn_update_livre" value="Modifier">
        </div>
    </form>
</div>