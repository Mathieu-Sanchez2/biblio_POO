<div class="container">
  <h1 class="text-center mt-3">Index auteur</h1>
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
      <?php foreach($auteurs as $auteur) : ?>
          <tr>
              <td><?= $auteur->id  ?></td>
              <td><?= $auteur->nom  ?></td>
              <td><?= $auteur->prenom  ?></td>
              <td><?= $auteur->adresse . ', ' . $auteur->code_postal . ' ' . $auteur->ville  ?></td>
              <td><?= $auteur->mail  ?></td>
              <td><a href="<?= LienHelper::getLien('AuteurController', 'single', $auteur->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('AuteurController', 'update', $auteur->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('AuteurController', 'delete', $auteur->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>