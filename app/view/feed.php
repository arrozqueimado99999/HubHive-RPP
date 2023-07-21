<?php
include 'head.php';
include 'header.php';
?>

<head>
    <link rel="stylesheet" href="<?= assets('css/feed.css') ?>">
</head>

<nav class="welcome">
    <div id="carddivscroll">
    <?php
    foreach ($allCateg as $categ) : ?>
            <a href="<?= route("pesquisa/?categ={$categ['id']}") ?>" class="cardForuns">
                <h2><?= $categ['titulo'] ?></h2>
            </a>
    <?php
    endforeach; ?>
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