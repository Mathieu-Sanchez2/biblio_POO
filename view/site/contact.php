<div class="container">
    <h1 class="text-center mt-3">Contact du site web de la bibliotheque</h1>
    <p class="mt-3">Lorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectet Lorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectet</p>
    <form method="POST" action="<?= LienHelper::getLien('SiteController', 'contactValidPostForm'); ?>" class="my-3">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="nom" class="form-label">Votre nom :</label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Votre prénom :</label>
                    <input type="text" name="prenom" class="form-control" id="prenom">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="objet" class="form-label">Objet</label>
            <input type="text" name="objet" class="form-control" id="objet">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Objet</label>
            <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="btn_contact">Nous contacter</button>
        </div>
    </form>
</div>