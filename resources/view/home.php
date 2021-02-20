<div class="container">

<?php

if (count($list) !== 0) {

    foreach ($list as $item) {
    ?>
    <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header bg-transparent border-success"><?= htmlspecialchars($item['user_name']) ?></div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"><?php htmlspecialchars($item['about'])  ?></p>
        </div>
        <div class="card-footer bg-transparent border-success"><a href="mailto:<?= htmlspecialchars($item['email']) ?>"><?= htmlspecialchars($item['email']) ?></a></div>
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