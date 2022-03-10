<h1>Index livre</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Resumé</th>
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
            <td><a href="index.php?controller=LivreController&methode=update&id=<?= $livre->id ?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="index.php?controller=LivreController&methode=delete&id=<?= $livre->id ?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>