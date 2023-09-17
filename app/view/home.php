<?php
include 'head.php';
include 'header.php';

//var_dump($_SESSION);
?>

<nav class="welcome">
    <form for="search" action="<?= route('pesquisa/?q=') ?>" method="get" class="search">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"></path>
        </svg>
        <input id="search" name="q" type="text" placeholder="Pesquisar">
    </form>
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
        foreach ($allPosts as $post) { ?>
                <div class="post">
                    <a href="<?= route("post/?post={$post['id']}") ?>">
                        <img src="<?= route($post['anexo']) ?>" alt="não tem">
                    </a>
                </div>
            <?php }
        } else { ?>
        <div>
            <h3>Não há nenhuma postagem ainda</h3>
        </div>
    <?php
    }
    ?>
</div>

<?php
include 'foot.php';
?>