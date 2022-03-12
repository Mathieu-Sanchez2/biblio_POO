<div class="container">
    <h1 class="text-center">Fiche d'un livre du site web de la bibliotheque</h1>
    <div class="p-2 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"><?= $livre->titre; ?></h1>
            <p class="col-md-8 fs-4"><?= $livre->resume; ?></p>
            <a class="btn btn-primary btn-lg" href="<?= LienHelper::getLien('SiteController', 'livres'); ?>">Retour</a>
        </div>
    </div>
</div>