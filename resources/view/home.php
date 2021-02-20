<div class="container">
<h1>Cписок задач</h1>
<?php

if (count($list) !== 0) {

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
        <?php if ($isUser) { ?>
        <div class="card-footer bg-transparent">
            <a href="update/<?= $item['id'] ?>" class="btn btn-dark">Редактировать</a>
            <?php if ($item['status'] === 1) { ?>
                <div class="btn btn-primary">Выполняется</div>
                <div data-href="ready" data-id="<?= $item['id'] ?>" class="btn btn-success">✔</div>
            <?php } else { ?>
                <div class="btn btn-success">Выполнено ✔</div>
            <?php } ?>
        </div>
        <?php } ?>
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
            <a href="create" class="btn btn-primary">Создать задачу</a>
        </div>
    </div>
    <?php
}

?>

</div>