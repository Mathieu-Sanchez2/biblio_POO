<div class="container">
  <h1 class="text-center mt-3">Index livre</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Resumé</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($livres as $livre) : ?>
          <tr>
              <td><?= $livre->id  ?></td>
              <td><?= $livre->titre  ?></td>
              <td><?= substr($livre->resume,0, 75)  ?></td>
              <td><a href="<?= LienHelper::getLien('LivreController', 'single', $livre->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('LivreController', 'update', $livre->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('LivreController', 'delete', $livre->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>