<?php
include 'head.php';
include 'header.php';

//var_dump($send);
?>


<article class="colecao">
    <div class="colecao_header_div">
        <div class="colecao_header">
            <div>
                <a class="btnInTop" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="titulo_colecao">
                    <h2 id="colecaoTittle"><?= $send['0']['nome'] ?></h2>
                    <p id="dataCriacaoProject">Criado em <?= $send['0']['data_criacao'] ?></p>
                </div>
            </div>
        </div>        
    </div>

    <div class="posts">
    <?php
    if ($postsByColecao !== "") {
        $fileIMG = ['jpg', 'jpeg', 'png'];
        $fileVIDEO = ['mp4'];
        foreach ($postsByColecao as $post) :
            $fileExtension = pathinfo($post['anexo'], PATHINFO_EXTENSION);

            if (in_array($fileExtension, $fileIMG)) { ?>
                <div class="post">
                    <a href="<?= route("post/?post={$post['id']}") ?>">
                        <img src="<?= route($post['anexo']) ?>" alt="não tem">
                    </a>
                </div>
            <?php
            } elseif (in_array($fileExtension, $fileVIDEO)) { ?>
                <div class="post">
                    <a href="<?= route("post/?post={$post['id']}") ?>" class="video_post">
                        <video preload="auto" loop muted autoplay>
                            <source type="video/mp4" src="<?= route($post['anexo']) ?>">
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

    </div>
</article>

<?php
include 'foot.php';
?>