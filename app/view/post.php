<?php

include 'head.php';
include 'header.php';

//var_dump($send);
?>

<article class="postDiv">
    <a id="voltarPag" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
        </svg>
    </a>
    <div class="postagem">
        <?php
        $fileExtension = pathinfo($send['0']['anexo'], PATHINFO_EXTENSION);
        $filePDF = ['pdf'];
        $fileIMG = ['jpg', 'jpeg', 'png', 'gif'];
        $fileVIDEO = ['mp4'];

        if (in_array($fileExtension, $fileIMG)) { ?>
            <img id="imgpost" src="<?= route($send['0']['anexo']) ?>" alt="<?= $send['0']['anexo'] ?>">
        <?php } elseif (in_array($fileExtension, $fileVIDEO)) {
        ?>
            <video preload="auto" loop autoplay>
                <source type="video/mp4" src="<?= route($send['0']['anexo']) ?>">
                Erro ao reproduzir o vídeo
            </video>
        <?php
        } ?>

        <div class="postInfo">
            <div class="info1post">
                <div class="row_btwn">
                    <h3><?= $send['0']['legenda'] ?></h3>
                    <div id="modalOptPost">
                        <span class="opt" onclick="downloadFile('<?= route($send[0]['anexo']) ?>')">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 16v1a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-1"></path>
                                <path d="m16 12-4 4-4-4"></path>
                                <path d="M12 16V4"></path>
                            </svg>
                            <p>Baixar</p>
                        </span>

                        <span class="opt" onclick="copyURLToClipboard()">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="currentColor" viewBox="0 0 640 512">
                                <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                            </svg>
                            <p>Copiar link</p>
                        </span>

                        <?php
                        if ($_SESSION['acesso'] == "0101_LIB") : ?>
                            <a href="<?= route("post/deletePost/?post={$send['0']['id']}") ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="currentColor" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                                <p>Apagar</p>
                            </a>
                        <?php endif ?>

                    </div>
                    <span onclick="openModalLado()" id="openModalOptPost" class="btn_post_act">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="18px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>                    </span>
                </div>
                <div class="row">
                    <div id="modalSavePost">
                        <nav class="navNormal">
                        <button onclick="openModal('newColecaoModal')" class="opt">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.993.993 0 0 0-.294-.708ZM6.414 4h11.172l.999.999H5.415L6.414 4ZM4 19V6.999h16L20.002 19H4Z"></path>
                                <path d="M15 12H9v-2H7v4h10v-4h-2v2Z"></path>
                            </svg>
                            <h3>Nova coleção</h3>
                        </button>
                        </nav>
                        <?php
                        if ($allCole != "") {
                            foreach ($allCole as $cole) : ?>
                                <form action="<?= route("post/saveinColecao/?post={$send['0']['id']}") ?>" method="post" class="savePostInColecao">
                                    <input type="text" value="<?= $send['0']['id'] ?>" name="postToSave" class="inputhide">
                                    <input type="text" value="<?= $cole['id'] ?>" name="colecaoToSave" class="inputhide">
                                    <button class="colecaoButtonSave" name="colecaoid">
                                        <div class="molduraColecao">
                                            <?php if (!empty($cole['postsInColecao']['0']['anexo'])):?>
                                                <img src="<?= route($cole['postsInColecao']['0']['anexo']) ?>" alt="empty">
                                                <?php else:?>
                                                <img src="<?= assets('imgs/png_background.png') ?>" alt="empty">                                            
                                            <?php endif?>
                                        </div>
                                        <div>
                                            <h3><?= $cole['nome'] ?></h3>
                                        </div>
                                    </button>
                                </form>
                        <?php
                            endforeach;
                        } else {
                            print("<p>Você não possui nenhuma coleção ainda</p>");
                        } ?>
                    </div>
                    <button onclick="openModalSavePost()" class="btn_post_act" id="saveBtn">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 2.25h-9A2.25 2.25 0 0 0 5.25 4.5v17.25l6.75-6 6.75 6V4.5a2.25 2.25 0 0 0-2.25-2.25Z"></path>
                        </svg>
                    </button>

                    
                    <a data-value="<?= $send['securtiu'] ?>" href="<?= route("post/like/?post={$send['0']['id']}") ?>" class="btn_post_act" id="likeBtn">
                    <div id="hu">
                        </div>
                        <h3><?= $send['curtidas'] ?></h3>
                    </a>
                </div>

                <section class="tagsListInPost">
                    <a href="" class="eixoBtn">
                        <h3><?=$send['eixoByPost']['0']['titulo']?></h3>
                    </a>
                    <?php
                    if ($tagsByPost !== ""):
                    foreach ($tagsByPost as $tag): ?>
                        <a href="" class="tagBtn">
                            <h3><?=$tag['titulo']?></h3>
                        </a>
                    <?php
                    endforeach;
                    endif;
                    ?>

                </section>
            </div>
        </div>
    </div>
</article>

<article class="recomend">
    <h3>Você tambêm pode gostar</h3>
    <div class="postsRecomend">
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
</article>

<section class="eixosList">
    <?php
    foreach ($allEixo as $eixo): ?>
        <a href="<?=route('eixo?='.$eixo['id'])?>" class="eixoDivExplore" style="background-image: url(<?=$eixo['banner']?>);">
            <h3><?=$eixo['titulo']?></h3>
        </a>
    <?php 
    endforeach;
    ?>
</section>

<?php
include 'foot.php';
?>