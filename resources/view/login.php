<div class="container">
    <form method="post" action="/login">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Логин</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <?php 
        if ($error) {
        ?>
        <div id="emailHelp" class="form-text"><?= $error ?></div>
        <?php } ?>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>