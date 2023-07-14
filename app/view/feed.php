<?php
include 'head.php';
include 'header.php';
?>

<head>
    <link rel="stylesheet" href="<?= assets('css/feed.css') ?>">
</head>

<nav class="welcome">
    <div id="carddivscroll">
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
        <a href="#" class="cardForuns">
            <h2>PROGRAMAÇÃO WEB</h2>
        </a>
    </div>
</nav>

<div class="posts">
    <?php
    if ($allPosts !== "") {
        foreach ($allPosts as $post) : ?>
            <div class="post">
                <a href="<?= route("post/?post={$post['id']}") ?>">
                    <img src="<?= $post['anexo'] ?>" alt="não tem">
                </a>
            </div>
        <?php
        endforeach;
    } else { ?>
        <div>
            <h3>Não há nenhuma postagem ainda</h3>
        </div>
    <?php
    }
    ?>
</div>