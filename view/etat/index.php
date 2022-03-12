<div class="container">
  <h1 class="text-center mt-3">Index état</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Libelle</th>
        <th scope="col">Nom de livre avec l'état</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($etats as $etat) : ?>
          <tr>
              <td><?= $etat->id  ?></td>
              <td><?= $etat->libelle  ?></td>
              <td><?= $etat->getNombreLivres();  ?></td>
              <td><a href="<?= LienHelper::getLien('EtatController', 'single', $etat->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('EtatController', 'update', $etat->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('EtatController', 'delete', $etat->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>