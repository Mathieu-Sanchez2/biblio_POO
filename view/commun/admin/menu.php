<ul class="nav nav-tabs">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Livre</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= LienHelper::getLien('LivreController', 'index') ?>">Index</a></li>
      <li><a class="dropdown-item" href="<?= LienHelper::getLien('LivreController', 'add') ?>">Ajouter un livre</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Role</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= LienHelper::getLien('RoleController', 'index') ?>">Index</a></li>
      <li><a class="dropdown-item" href="<?= LienHelper::getLien('RoleController', 'add') ?>">Ajouter un role</a></li>
    </ul>
  </li>
</ul>