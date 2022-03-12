<div class="d-flex justify-content-between">
  <ul class="nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Location</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('LocationController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('LocationController', 'add') ?>">Créer une location</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Livre</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('LivreController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('LivreController', 'add') ?>">Ajouter un livre</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Categorie</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('CategorieController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('CategorieController', 'add') ?>">Ajouter une catégorie</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Usager</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('UsagerController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('UsagerController', 'add') ?>">Créer un usager</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Utilisateur</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('UtilisateurController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('UtilisateurController', 'add') ?>">Créer un utilisateur</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Role</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('RoleController', 'index') ?>">Liste</a></li>
        <li><a class="dropdown-item" href="<?= LienHelper::getLien('RoleController', 'add') ?>">Créer un role</a></li>
      </ul>
    </li>
  </ul>
  <div class="btn_deco my-2 mx-2">
    <a href="<?= LienHelper::getLien('AdminController', 'logout') ?>" class="btn btn-sm btn-dark">Déconnexion</a>
  </div>
</div>
