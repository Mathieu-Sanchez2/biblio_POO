<div class="container">
<h1 class="text-center mt-3">Modifier un role</h1>
    <form action="index.php?controller=RoleController&methode=updateValidPostForm" method="post">
        <input type="hidden" name="id" value="<?= $role->id ?>">
        <div class="mb-3">
            <label for="libelle" class="form-label">libelle</label>
            <input type="text" class="form-control" name="libelle" id="libelle" value="<?= $role->libelle ?>">
        </div>
        <div class="text-center">
            <input type="submit" name="btn_update_role" value="Modifier" class="btn btn-primary">
        </div>
    </form>
</div>