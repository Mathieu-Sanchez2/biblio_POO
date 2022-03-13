<div class="container">
<h1 class="text-center mt-3">Ajouter un livre</h1>
    <form action="<?= LienHelper::getLien('LivreController', 'addValidPostForm'); ?>" method="POST" enctype="multipart/form-data">
    <hr>
    <div class="row">
        <div class="col my-2">
        <input type="hidden" name="etat" value="1">
            <label for="categories" class="form-label">Liste des catégories :</label><br>
            <select class="liste-categories form-control my-2" name="categorie[]" id="categories" multiple>
                <?php foreach($categories as $categorie) : ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col my-2">
            <label for="auteurs" class="form-label">Ecrit par :</label><br>
            <select class="liste-auteurs form-control" name="auteur[]" id="auteurs" multiple>
                <?php foreach($auteurs as $auteur) : ?>
                    <option value="<?= $auteur->id ?>"><?= $auteur->nom . ' ' . $auteur->prenom ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col my-2">
            <label for="editeurs" class="form-label">Edité par :</label><br>
            <select class="liste-editeurs form-control" name="editeur[]" id="editeurs" multiple>
                <?php foreach($editeurs as $editeur) : ?>
                    <option value="<?= $editeur->id ?>"><?= $editeur->denomination; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <input type="hidden" name="disponibilite" value="0">
        <div class="mb-3 col">
            <label for="num_ISBN" class="form-label">N°ISBN :</label>
            <input type="text" name="num_ISBN" class="form-control" id="num_ISBN">
        </div>
        <div class="mb-3 col">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" id="titre">
        </div>
        <div class="mb-3 col">
            <label for="prix" class="form-label">Prix :</label>
            <input type="text" name="prix" class="form-control" id="prix">
        </div>
        <div class="mb-3 col">
            <label for="nb_pages" class="form-label">Nombres de pages :</label>
            <input type="text" name="nb_pages" class="form-control" id="nb_pages">
        </div>
        <div class="mb-3 col">
            <label for="date_achat" class="form-label">Date achat :</label>
            <input type="date" name="date_achat" class="form-control" id="date_achat">
        </div>
    </div>
    <div class="mb-3">
        <label for="illustration" class="form-label">Illustration : </label>
        <input type="file" name="illustration" class="form-control" id="illustration">
    </div>
    <div class="mb-3">
        <label for="resume" class="form-label">Résumé :</label>
        <textarea name="resume" id="" cols="30" rows="10" id="resume" class="form-control"></textarea>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary my-2" name="btn_add_livre" value="Ajouter">
    </div>
    </form>
</div>


    <!-- jQuery (seulement pour select2 :s) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JS select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.liste-categories').select2();
        $('.liste-auteurs').select2();
        $('.liste-editeurs').select2();
    </script>

