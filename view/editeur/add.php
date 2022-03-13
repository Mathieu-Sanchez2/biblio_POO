<div class="container">
    <h1 class="text-center mt-3">Add éditeur</h1>
    <form action="<?= LienHelper::getLien('EditeurController','addValidPostForm'); ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3 col">
                <label for="denomination" class="form-label">Dénomination :</label>
                <input type="text" name="denomination" id="denomination" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="siret" class="form-label">N° SIRET :</label>
                <input type="text" name="siret" id="siret" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="adresse" class="form-label">Adresse :</label>
                <input type="text" name="adresse" id="adresse" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="ville" class="form-label">Ville :</label>
                <input type="text" name="ville" id="ville" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="code_postal" class="form-label">Code postal :</label>
                <input type="text" name="code_postal" id="code_postal" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="mail" class="form-label">Mail :</label>
                <input type="text" name="mail" id="mail" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="numero_tel" class="form-label">Numéro :</label>
                <input type="text" name="numero_tel" id="numero_tel" class="form-control">
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="btn_add_editeur" class="btn btn-success" value="Ajouter">
        </div>
    </form>
</div>