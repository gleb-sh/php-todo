<div class="container">
<h1>Cписок задач</h1>

<?php

if (count($list) !== 0) {

    ?>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="<?= $pag['status'] ?>" type="button" class="btn btn-primary">По статусу</a>
        <a href="<?= $pag['name'] ?>" type="button" class="btn btn-primary">По имени</a>
        <a href="<?= $pag['email'] ?>" type="button" class="btn btn-primary">По email</a>
    </div>

    <?php
    foreach ($list as $item) {
    ?>
    <div class="card" style="max-width: 700px;">
        <div class="card-header bg-transparent ">
            <a href="mailto:<?= htmlspecialchars($item['email']) ?>"><?= htmlspecialchars($item['email']) ?></a>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($item['user_name']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($item['about'])  ?></p>
        </div>
        <div class="card-footer bg-transparent">
            <?php if ($item['status'] === 1) { ?>
                <div class="btn btn-primary">Выполняется</div>
            <?php } else { ?>
                <div class="btn btn-success">Выполнено ✔</div>
            <?php } ?>
        <?php if ($isUser) { ?>
            <?php if ($item['status'] === 1) { ?>
                <a href="update/<?= $item['id'] ?>" class="btn btn-dark">Редактировать</a>
                <div data-href="ready" data-id="<?= $item['id'] ?>" class="btn btn-success">✔</div>
            <?php } ?>
        <?php } ?>
        </div>
    </div>
    <?php
    }
    
} else {
    ?>
    <div class="card">
        <div class="card-header">
            Упс!
        </div>
        <div class="card-body">
            <h5 class="card-title">В списке нет ни одной задачи</h5>
            <p class="card-text">Нужно добавить новые задачи</p>
            <a href="/create" class="btn btn-primary">Создать задачу</a>
        </div>
    </div>
    <?php
}

?>

    <div class="btn-group" role="group" aria-label="Basic example">
        <?php if (isset($pag['back'])) { ?>
            <a href="<?= $pag['back'] ?>" type="button" class="btn btn-primary">Назад</a>
        <?php } ?>
        <?php if (isset($pag['next'])) { ?>
            <a href="<?= $pag['next'] ?>" type="button" class="btn btn-primary">Далее</a>
        <?php } ?>
    </div>

</div>

