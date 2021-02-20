<div class="container">
    <h2>Новая задача</h2>
    <form method="post" action="/create">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Имя пользователя</label>
            <input value="<?= $data['user_name'] ?>" required type="text" name="user_name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-floating">
            <textarea name="about" class="form-control" id="floatingTextarea2" style="height: 100px"><?= $data['about'] ?></textarea>
            <label required for="floatingTextarea2">Текст задачи</label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input value="<?= $data['email'] ?>" required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php 
            if ($error) {
            ?>
            <div id="emailHelp" class="form-text"><?= $error ?></div>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>