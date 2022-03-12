<div class="container">
<h1 class="text-center mt-3">Add livre</h1>
    <form action="index.php?controller=LivreController&methode=addValidPostForm" method="POST" enctype="multipart/form-data">
    <div class="row">
        <input type="hidden" name="disponibilite" value="0">
        <div class="mb-3 col">
            <label for="num_isbn" class="form-label">N°ISBN</label>
            <input type="text" name="num_ISBN" class="form-control" id="num_isbn">
        </div>
        <div class="mb-3 col">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre">
        </div>
        <div class="mb-3 col">
            <label for="prix" class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control" id="prix">
        </div>
        <div class="mb-3 col">
            <label for="nb_pages" class="form-label">Nombres de pages</label>
            <input type="text" name="nb_pages" class="form-control" id="nb_pages">
        </div>
        <div class="mb-3 col">
            <label for="date_achat" class="form-label">Date achat</label>
            <input type="date" name="date_achat" class="form-control" id="date_achat">
        </div>
    </div>
    <div class="mb-3">
        <label for="illustration" class="form-label">Illustration : </label>
        <input type="file" name="illustration" class="form-control" id="illustration">
    </div>
    <div class="mb-3">
        <label for="resume" class="form-label">Résumé</label>
        <textarea name="resume" id="" cols="30" rows="10" id="resume" class="form-control"></textarea>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-success" name="btn_add_livre" value="Ajouter">
    </div>
    </form>
</div>