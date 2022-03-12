<div class="container">
  <h1 class="text-center mt-3">Index catégorie</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Libelle</th>
        <th scope="col">Nombre de livres avec la catégorie</th>
        <th scope="col">Fiche</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($categories as $categorie) : ?>
          <tr>
              <td><?= $categorie->id  ?></td>
              <td><?= $categorie->libelle  ?></td>
              <td><?= $categorie->getNombreLivres();  ?></td>
              <td><a href="<?= LienHelper::getLien('CategorieController', 'single', $categorie->id) ?>" class="btn btn-primary">Fiche</a></td>
              <td><a href="<?= LienHelper::getLien('CategorieController', 'update', $categorie->id) ?>" class="btn btn-warning">Modifier</a></td>
              <td><a href="<?= LienHelper::getLien('CategorieController', 'delete', $categorie->id) ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>