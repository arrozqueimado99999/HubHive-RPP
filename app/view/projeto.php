<?php
include 'head.php';
include 'header.php';

//var_dump($send);
?>

<div id="editprojectModal" class="modal">
    <div id="modalcontenteditproject" class="modal-content">
        <nav class="nav">
            <h3>Editar projeto</h3>
            <button class="close" onclick="closeModal('editprojectModal')">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </nav>

        <section>
            <form class="form_newproject" id="form_newproject" action="<?= route('perfil/newProject') ?>" method="post" enctype="multipart/form-data">
                <label id="bannerAdd" class="send" for="inputbanner">
                    <div id="bannerimgchange">
                    </div>

                    <div id="formbanner">
                        <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M15 10v6H9v-6H5l7-7 7 7h-4Zm4 10v-2H5v2h14Z" clip-rule="evenodd"></path>
                        </svg>
                        <h3>Adicionar banner</h3>
                        <p>Imagens jpg, jpeg ou png até 5Mb</p>
                    </div>
                    <input type="file" name="inputbanner" id="inputbanner">
                </label>

                <div class="grid_newproject">
                    <div class="row_start">
                        <span id="btnAddCateg" onclick="openModalLadoById('btnAddCateg','modalCateg')" name="categ" class="btn_dark">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 3.6A2.4 2.4 0 0 0 3.6 6v2.4A2.4 2.4 0 0 0 6 10.8h2.4a2.4 2.4 0 0 0 2.4-2.4V6a2.4 2.4 0 0 0-2.4-2.4H6Zm0 9.6a2.4 2.4 0 0 0-2.4 2.4V18A2.4 2.4 0 0 0 6 20.4h2.4a2.4 2.4 0 0 0 2.4-2.4v-2.4a2.4 2.4 0 0 0-2.4-2.4H6ZM13.2 6a2.4 2.4 0 0 1 2.4-2.4H18A2.4 2.4 0 0 1 20.4 6v2.4a2.4 2.4 0 0 1-2.4 2.4h-2.4a2.4 2.4 0 0 1-2.4-2.4V6Zm3.6 7.2a1.2 1.2 0 0 1 1.2 1.2v1.2h1.2a1.2 1.2 0 1 1 0 2.4H18v1.2a1.2 1.2 0 1 1-2.4 0V18h-1.2a1.2 1.2 0 0 1 0-2.4h1.2v-1.2a1.2 1.2 0 0 1 1.2-1.2Z"></path>
                            </svg>
                            <h3 id="categoriaEscolhida">Categoria</h3>
                        </span>

                        <input type="text" id="inputCategoria" name="categ">
                        <input type="text" id="inputOrient" name="orient">

                        <span id="btnAddOrient" onclick="openModalLadoById('btnAddOrient','modalOrient')" class="btn_dark">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.6 19.2s-1.2 0-1.2-1.2 1.2-4.8 7.2-4.8 7.2 3.6 7.2 4.8c0 1.2-1.2 1.2-1.2 1.2h-12Zm6-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z"></path>
                                <path fill-rule="evenodd" d="M18.6 8.4a.6.6 0 0 1 .6.6v1.8H21a.6.6 0 1 1 0 1.2h-1.8v1.8a.6.6 0 1 1-1.2 0V12h-1.8a.6.6 0 1 1 0-1.2H18V9a.6.6 0 0 1 .6-.6Z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 id="orientadorEscolhido">Orientador</h3>
                        </span>
                    </div>

                    <div class="flex_column">
                        <input type="text" placeholder="Titulo" id="inputTitulo" name="titulo" class="inputsNewProjeto">
                        <textarea type="text" cols="30" rows="5" placeholder="Descrição" id="inputDesc" name="descricao" class="inputsNewProjeto"></textarea>
                    </div>
                    <div class="modalOpt" id="modalCateg">
                        <?php
                        foreach ($allCategorias as $categ) : ?>
                            <span onclick="addCategInLabel('<?= $categ['id'] ?>')" class="opt" id="<?= $categ['id']; ?>" value="<?= $categ['id']; ?>">
                                <p><?= $categ['titulo']; ?></p>
                            </span>
                        <?php
                        endforeach;
                        ?>
                    </div>

                    <div class="modalOpt" id="modalOrient">
                        <?php
                        foreach ($allOrient as $orient) : ?>
                            <span onclick="addOrientInLabel('<?= $orient['id'] ?>')" class="opt" id="<?= $orient['id']; ?>">
                                <img src="<?= route($orient['foto_perfil']) ?>" alt="">
                                <div class="column">
                                    <h3 id="<?= "nome" . $orient['id'] ?>"><?= $orient['nome']; ?></h3>
                                    <p><?= $orient['usuario']; ?></p>
                                </div>
                            </span>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="row_end">
                    <button id="submitFormNewProjeto" disabled form="form_newproject">
                        <svg width="26" height="26" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M20.048 6.352a1.2 1.2 0 0 1 0 1.696l-9.6 9.6a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 1.696-1.696L9.6 15.103l8.752-8.751a1.2 1.2 0 0 1 1.696 0Z" clip-rule="evenodd"></path>
                        </svg>
                        Concluir
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>

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

        <div id="modalOptProjeto" class="modalOpt">
                <a class="opt" href="<?= route("projeto/deleteProjeto/?project={$send['0']['id']}") ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" fill="currentColor" viewBox="0 0 448 512">
                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                    </svg>
                    <p>Apagar</p>
                </a>
        </div>

        <div class="projectPostsInfo">
            <div class="dadosProject">
                <h2 id="projectTittle"><?= $send['0']['titulo'] ?></h2>
                <p><?= $send['0']['descricao'] ?></p>
                <p id="dataCriacaoProject">Criado em <?= $send['0']['data_postagem'] ?></p>
            </div>
            <div>
                <button class="btnCirculo" onclick="openModalLadoById('openModalOptPost','modalOptProjeto')" id="openModalOptPost">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.2 12a2.4 2.4 0 1 1-4.8 0 2.4 2.4 0 0 1 4.8 0Zm7.2 0a2.4 2.4 0 1 1-4.8 0 2.4 2.4 0 0 1 4.8 0Zm4.8 2.4a2.4 2.4 0 1 0 0-4.8 2.4 2.4 0 0 0 0 4.8Z"></path>
                    </svg>
                </button>
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