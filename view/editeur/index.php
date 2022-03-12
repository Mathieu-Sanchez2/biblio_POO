<div class="container">
  <h1 class="text-center mt-3">Index éditeur</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Dénomination</th>
        <th scope="col">N° SIRET</th>
        <th scope="col">Adresse</th>
        <th scope="col">Adresse mail</th>
        <th scope="col">Numéro de téléphone</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($editeurs as $editeur) : ?>
          <tr>
              <td><?= $editeur->id  ?></td>
              <td><?= $editeur->denomination  ?></td>
              <td><?= $editeur->siret  ?></td>
              <td><?= $editeur->adresse . ', ' . $editeur->code_postal . ' ' . $editeur->ville  ?></td>
              <td><?= $editeur->mail  ?></td>
              <td><?= $editeur->numero_tel  ?></td>
              <td><a href="<?= LienHelper::getLien('EditeurController', 'single', $editeur->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('EditeurController', 'update', $editeur->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('EditeurController', 'delete', $editeur->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>