<h1 class="text-center">Formulaire de connexion a l'administration</h1>
<form action="<?= LienHelper::getLien('AdminController', 'checkLoginPostForm'); ?>" method="post">
    <div class="mb-3">
        <label for="mail" class="form-label">Mail :</label>
        <input type="text" name="mail" class="form-control" id="mail">
    </div>
    <div class="mb-3">
        <label for="mot_de_passe" class="form-label">Mot de passe :</label>
        <input type="text" name="mot_de_passe" class="form-control" id="mot_de_passe">
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Connexion" name="btn_connect">
    </div>
</form>