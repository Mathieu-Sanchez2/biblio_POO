<div class="container">
  <h1 class="text-center mt-3">Index utilisateur</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Role(s)</th>
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
      <?php foreach($utilisateurs as $utilisateur) : ?>
          <tr>
              <td><?= $utilisateur->id  ?></td>
              <td><?= $utilisateur->getListeRole(); ?></td>
              <td><?= $utilisateur->nom  ?></td>
              <td><?= $utilisateur->prenom  ?></td>
              <td><?= $utilisateur->adresse . ', ' . $utilisateur->code_postal . ' ' . $utilisateur->ville  ?></td>
              <td><?= $utilisateur->mail  ?></td>
              <td><a href="<?= LienHelper::getLien('UtilisateurController', 'single', $utilisateur->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('UtilisateurController', 'update', $utilisateur->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('UtilisateurController', 'delete', $utilisateur->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>