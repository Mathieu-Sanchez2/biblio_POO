<div class="container">
  <h1 class="text-center mt-3">Index usager</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Adresse mail</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($usagers as $usager) : ?>
          <tr>
              <td><?= $usager->id  ?></td>
              <td><?= $usager->nom  ?></td>
              <td><?= $usager->prenom  ?></td>
              <td><?= $usager->adresse . ', ' . $usager->code_postal . ' ' . $usager->ville  ?></td>
              <td><?= $usager->mail  ?></td>
              <td><a href="<?= LienHelper::getLien('usagerController', 'single', $usager->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('usagerController', 'update', $usager->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('usagerController', 'delete', $usager->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>