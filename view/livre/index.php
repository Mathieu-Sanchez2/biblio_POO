<div class="container">
  <div class="d-flex justify-content-between my-2">
    <h1 class="text-center">Index livre</h1>
    <div class="my-auto">
      <a href="<?= LienHelper::getLien('LivreController', 'add'); ?>" class="btn btn-success">Ajouter un livre</a>
    </div>
  </div>
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