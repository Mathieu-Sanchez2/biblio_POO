<div class="container">
  <h1 class="text-center mt-3">index Role</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Libelle</th>
        <th scope="col">Nombre d'utilisateur(s) avec le role</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role) : ?>
          <tr>
              <td><?= $role->id ?></td>
              <td><?= $role->libelle ?></td>
              <td><?= $role->getNombreUtilisateurs(); ?></td>
              <td><a href="<?= LienHelper::getLien('RoleController','single', $role->id); ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('RoleController','update', $role->id); ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('RoleController','delete', $role->id); ?> " class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>