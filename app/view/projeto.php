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
        <div class="secoesByProject">
            <button class="btnTranslucido" onclick="criarSecao()">
                <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.6 17.52a6 6 0 1 0-5.97-6.6H7.2a1.8 1.8 0 0 0-1.8-1.8H4.2a1.8 1.8 0 0 0-1.8 1.8v1.2a1.8 1.8 0 0 0 1.8 1.8h1.2a1.8 1.8 0 0 0 1.8-1.8h2.43a6 6 0 0 0 5.97 5.4Zm.6-9v2.4h2.4a.6.6 0 1 1 0 1.2h-2.4v2.4a.6.6 0 1 1-1.2 0v-2.4h-2.4a.6.6 0 1 1 0-1.2H15v-2.4a.6.6 0 1 1 1.2 0Z"></path>
                </svg>
                <h3>Adicionar seção</h3>
            </button>

            <div id="inputaddsecao">
                <form id="formNewSecao" action="<?= route("projeto/addSecao/?project={$send['0']['id']}") ?>" method="post"></form>
            </div>

        </div>
    </div>
    <div class="project">
        <div class="projectbannerimg">
            <img src="<?= route($send['0']['banner']) ?>" alt="">
        </div>

        <button class="optionsProject" onclick="openModalLado('left')" id="openModalOptPost" class="btn_post_act">
            <svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 7.2a2.4 2.4 0 1 1 0-4.8 2.4 2.4 0 0 1 0 4.8Zm0 7.2a2.4 2.4 0 1 1 0-4.8 2.4 2.4 0 0 1 0 4.8Zm0 7.2a2.4 2.4 0 1 1 0-4.8 2.4 2.4 0 0 1 0 4.8Z"></path>
            </svg>
        </button>

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
            <a class="btn" href="<?= route("projeto/deleteProjeto/?project={$send['0']['id']}") ?>">Apagar projeto</a>
        </div>

        <div class="projectPostsInfo">
            <div class="dadosProject">
                <h2 id="projectTittle"><?= $send['0']['titulo'] ?></h2>
                <p><?= $send['0']['descricao'] ?></p>
                <p id="dataCriacaoProject">Criado em <?= $send['0']['data_postagem'] ?></p>
            </div>
            <div class="orientProj">

            </div>
        </div>

        <div>
            <div class="postsbyproject">
                <?php
                if ($postsInfo !== "") {
                    foreach ($postsInfo as $post) :
                        $fileExtension = pathinfo($post['anexo'], PATHINFO_EXTENSION);
                        $filePDF = ['pdf'];
                        $fileIMG = ['jpg', 'jpeg', 'png'];


                        if (in_array($fileExtension, $fileIMG)) {
                ?>
                            <a href="<?= route("post/?post={$post['id']}") ?>" class="postagemproject">
                                <img src="<?= route($post['anexo']) ?>" alt="<?= $post['anexo'] ?>">
                                <div class="postInfo">
                                    <h3><?= $post['legenda'] ?></h3>
                                </div>
                            </a>
                        <?php } elseif (in_array($fileExtension, $filePDF)) { ?>
                            <a href="<?= route("post/?post={$post['id']}") ?>" class="postagemproject">
                                <object data="<?= route($post['anexo']) ?>" type="application/pdf">
                                    <p>Seu navegador não tem um plugin pra PDF</p>
                                </object>
                                <div class="postInfo">
                                    <h3><?= $post['legenda'] ?></h3>
                                </div>
                            </a>
                <?php
                        }
                    endforeach;
                } else {
                    include 'errorsview/noposts.php';
                }
                ?>
            </div>
        </div>

    </div>
</article>

<?php
include 'foot.php';
?>