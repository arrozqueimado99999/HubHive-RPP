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
        <?php
        $fileExtension = pathinfo($send['0']['anexo'], PATHINFO_EXTENSION);
        $filePDF = ['pdf'];
        $fileIMG = ['jpg', 'jpeg', 'png'];
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
                        <?php
                        if ($_SESSION['acesso'] == "sim") : ?>
                            <a href="<?= route("post/deletePost/?post={$send['0']['id']}") ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="currentColor" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                                <p>Apagar</p>
                            </a>
                        <?php endif ?>

                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="currentColor" viewBox="0 0 640 512">
                                <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                            </svg>
                            <p>Copiar link</p>
                        </a>
                    </div>
                    <button onclick="openModalLado()" id="openModalOptPost" class="btn_post_act">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 440 440">
                            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </button>
                </div>
                <div class="row">
                    <div id="modalSavePost">
                        <p>Salvar em</p>
                        <?php
                    foreach ($colecao as $cole) : ?>
                            <form action="<?=route("post/saveinColecao/?post={$send['0']['id']}")?> class="savePostInColecao">
                                <button class="colecaoButtonSave" name="colecaoid" value="<?=$cole['id']?>">
                                <div>
                                    <h3><?=$cole['nome']?></h3>
                                </div>
                                </button>
                            </form>
                            <?php endforeach ?>
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
            </div>

            <a href="<?= route("projeto/?project={$send['0']['projeto_id']}") ?>" class="projectLink">
                <p><?= $send['projectByPost']['0']['titulo'] ?></p>
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
            $fileIMG = ['jpg', 'jpeg', 'png'];
            $fileVIDEO = ['mp4'];
            foreach ($allPosts as $post) :
                $fileExtension = pathinfo($post['anexo'], PATHINFO_EXTENSION);

                if (in_array($fileExtension, $fileIMG)) { ?>
                    <div class="post">
                        <a href="<?= route("post/?post={$post['id']}") ?>">
                            <img src="<?=route( $post['anexo'] )?>" alt="não tem">
                        </a>
                    </div>
                <?php
                } elseif (in_array($fileExtension, $fileVIDEO)) { ?>
                    <div class="post">
                        <a href="<?= route("post/?post={$post['id']}") ?>" class="video_post">
                            <video preload="auto" loop muted autoplay>
                                <source type="video/mp4" src="<?= route($post['anexo']) ?>">
                                Erro ao reproduzir o vídeo
                            </video>
                        </a>
                    </div>
            <?php
                }
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

<?php
include 'foot.php';
?>