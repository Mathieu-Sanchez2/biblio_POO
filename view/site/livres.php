<div class="container">
    <h1 class="text-center mt-3">Liste des livres du site web de la bibliotheque</h1>
    <div class="row mt-3">
        <?php foreach ($livres as $livre) : ?>
            <div class="card" style="width: 18rem;margin: 5px;">
                <img src="<?= $livre->getSrcIllustration(); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $livre->titre; ?></h5>
                    <p class="card-text"><?= substr($livre->resume, 0, 75); ?></p>
                    <a href="<?= LienHelper::getLien('SiteController', 'single', $livre->id); ?>" class="btn btn-primary">Voir le livre</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>