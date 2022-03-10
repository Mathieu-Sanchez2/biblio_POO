<div class="container">
<h1 class="text-center">index Role</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Libelle</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($roles as $role) : ?>
        <tr>
            <td><?= $role->id ?></td>
            <td><?= $role->libelle ?></td>
            <td><a href="http://localhost/biblio_POO/index.php?controller=RoleController&methode=update&id=<?= $role->id ?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="http://localhost/biblio_POO/index.php?controller=RoleController&methode=delete&id=<?= $role->id ?> " class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>