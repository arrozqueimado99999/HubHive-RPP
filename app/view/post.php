<?php

include 'head.php';
include 'header.php';
?>

<article class="postDiv">
    <a id="voltarPag" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
        </svg>
    </a>
    <div class="postagem">
        <img src="<?=route($send['0']['anexo'])?>" alt="<?=$send['0']['anexo']?>">
        <div class="postInfo">
            <h3><?= $send['0']['legenda'] ?></h3>
            <a href="<?=route("projeto/?project={$send['0']['projeto_id']}")?>" class="projectLink">
            <p><?=$send['projectByPost']['0']['titulo']?></p>
            <div class="svgLink">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.752 6.352a1.2 1.2 0 0 1 1.696 0l4.8 4.8a1.2 1.2 0 0 1 0 1.696l-4.8 4.8a1.2 1.2 0 0 1-1.696-1.696l2.751-2.752H3.6a1.2 1.2 0 1 1 0-2.4h13.903l-2.751-2.752a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </a>
        </div>
    </div>
</article>

<article class="recomend">
    <h3>Você tambêm pode gostar</h3>
<div class="postsRecomend">
    <?php
    if ($allPosts !== "") {
        foreach ($allPosts as $post) : ?>
            <div class="post">
                <a href="<?= route("post/?post={$post['id']}") ?>">
                    <img src="<?=route($post['anexo'])?>" alt="não tem">
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
</article>