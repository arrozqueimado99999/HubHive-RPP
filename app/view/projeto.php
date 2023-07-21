<?php
include 'head.php';
include 'header.php';

//var_dump($send);
?>

<article id="mainProject">
    <div class="navAllProjects">
    <a id="voltarPag" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
        </svg>
    </a>
    </div>
    <div class="project">
        <div class="projectbannerimg">
            <img src="<?= route($send['0']['banner']) ?>" alt="">
        </div>

        <div class="projectInfo">
            <h2 id="projectTittle"><?= $send['0']['titulo']?></h2>
            <p><?= $send['0']['descricao'] ?></p>
        </div>

        <div>
            <div class="postsbyproject">
                <?php
                if ($postsInfo !== "") {
                    foreach ($postsInfo as $post) : ?>
                        <a href="<?= route("post/?post={$post['id']}")?>" class="postagemproject">
                            <img src="<?= route($post['anexo']) ?>" alt="<?= $post['anexo'] ?>">
                            <div class="postInfo">
                                <h3><?= $post['legenda'] ?></h3>
                            </div>
                        </a>
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
        </div>

    </div>
</article>