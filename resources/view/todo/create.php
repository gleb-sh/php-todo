<div class="container">
    <h2><?php if ($isRewrite) { ?> Редактирование <?php } else { ?> Новая задача<?php } ?></h2>
    <form method="post" <?php if ($isRewrite) { ?> action="/update/<?= $data['id']?>" <?php } else { ?>  action="/create" <?php } ?>>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Имя пользователя</label>
            <input value="<?= $data['user_name'] ?>" <?php if ($isRewrite) { echo 'disabled'; } ?> required type="text" name="user_name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-floating">
            <textarea name="about" class="form-control" id="floatingTextarea2" style="height: 100px"><?= $data['about'] ?></textarea>
            <label required for="floatingTextarea2">Текст задачи</label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input value="<?= $data['email'] ?>" <?php if ($isRewrite) { echo 'disabled'; } ?> required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php 
            if ($error) {
            ?>
            <div id="emailHelp" class="form-text"><?= $error ?></div>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="/" type="button" class="btn btn-warning">Вернуться на главную</a>
    </form>
</div>