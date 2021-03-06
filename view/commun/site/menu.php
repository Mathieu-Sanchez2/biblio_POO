<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= LienHelper::getLien('SiteController', 'index') ?>">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?= LienHelper::getLien('SiteController', 'index') ?>">Accueil</a>
        <a class="nav-link" href="<?= LienHelper::getLien('SiteController', 'livres') ?>">Liste des livres</a>
        <a class="nav-link" href="<?= LienHelper::getLien('SiteController', 'contact') ?>">Contact</a>
      </div>
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?= LienHelper::getLien('AdminController', 'login') ?>">Administration</a>
      </div>
    </div>
  </div>
</nav>
<main class="flex-shrink-0">