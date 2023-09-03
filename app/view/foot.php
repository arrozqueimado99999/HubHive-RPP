<div class="modal" id="modali">
    <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
        <div class="nav">
            <h3>Nova postagem</h3>
            <button class="close" onclick="closeModal('modali')">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <section>
            <form id="formNewPost" class="form_newproject" action="<?= route('post/createPost') ?>" method="POST" enctype="multipart/form-data">
                <div id="gridnewpost">
                    <label id="droparea" for="postanexo" class="drop anexo">
                        <div id="formpost">
                            <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15 10v6H9v-6H5l7-7 7 7h-4Zm4 10v-2H5v2h14Z" clip-rule="evenodd"></path>
                            </svg>
                                <h3>Arraste aqui</h3>
                                <p>Documentos até 20Mb</p>
                        </div>
                    </label>
                    <input type="file" required name="postanexo" id="postanexo">

                    <div id="inputsforPost">
                        <span id="btnProjectSelect" onclick="openModalLadoById('btnProjectSelect','modalProjetostoSelect')" name="categ" class="btn_dark">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.8 4.8a2.4 2.4 0 0 0-2.4 2.4v9.6a2.4 2.4 0 0 0 2.4 2.4h14.4a2.4 2.4 0 0 0 2.4-2.4V9.6a2.4 2.4 0 0 0-2.4-2.4h-6l-2.4-2.4h-6Zm8.4 6a1.2 1.2 0 0 0-2.4 0V12H9.6a1.2 1.2 0 0 0 0 2.4h1.2v1.2a1.2 1.2 0 0 0 2.4 0v-1.2h1.2a1.2 1.2 0 0 0 0-2.4h-1.2v-1.2Z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 id="projetoEscolhido">Onde postar</h3>
                        </span>

                        <input type="text" required id="inputprojeto" class="inputhide" name="projetotopost">


                        <!--<div class="modalOptBig" id="modalProjetostoSelect">
                            <?php
                            if ($projetosByUser != "") {
                                foreach ($projetosByUser as $userProj) : ?>
                                    <span class="opt card_projeto" id="<?= $userProj['id'] ?>" onclick="addProjetoInLabel(<?= $userProj['id'] ?>)">
                                        <div>
                                            <img src="<?= $userProj['banner'] ?>" alt="<?= $userProj['banner']; ?>">
                                        </div>
                                        <div class="text">
                                            <h3 id="<?= "projeto" . $userProj['id'] ?>"><?= $userProj['titulo']; ?></h3>
                                            <p id="descricao"><?= $userProj['descricao'] ?></p>
                                        </div>
                                    </span>
                            <?php
                                endforeach;
                            } else {
                                print("<p>Você não possui projetos ainda</p>");
                            } ?>
                        </div>--->


                        <div class="modalOptBig" id="modalProjetostoSelect">
                            <nav class="navNormal">
                                <button onclick="openModal('newprojectModal')" class="opt">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 8h14M5 8a2 2 0 1 1 0-4h14a2 2 0 0 1 0 4M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8m-9 4h4"></path>
                                    </svg>
                                    <h3>Novo Projeto</h3>
                                </button>
                            </nav>
                            <?php
                            if ($projetosByUser != "") {
                                foreach ($projetosByUser as $userProj) : 
                                    $backgroundStyle = route($userProj['banner']);
                                    ?>
                                    <div style="background: url('<?=$backgroundStyle?>');" class="opt_projeto" id="<?= $userProj['id'] ?>" onclick="addProjetoInLabel(<?= $userProj['id'] ?>)">
                                        <div class="escuro">
                                                <h3 id="<?= "projeto" . $userProj['id'] ?>"><?= $userProj['titulo']; ?></h3>
                                                <p><?="Criado em " . $userProj['data_postagem']?></p>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            } else {
                                print("<p>Você não possui projetos ainda</p>");
                            } ?>
                        </div>
                        <input required placeholder="Digite alguma coisa" type="text" class="inputsNewProjeto" name="legendaPost" id="legendaPost">
                    </div>
                </div>
            </form>
        </section>
        <div class="row_end">
            <button id="submitFormNewPost" form="formNewPost">
                <svg width="26" height="26" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M20.048 6.352a1.2 1.2 0 0 1 0 1.696l-9.6 9.6a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 1.696-1.696L9.6 15.103l8.752-8.751a1.2 1.2 0 0 1 1.696 0Z" clip-rule="evenodd"></path>
                </svg>
                <p>Concluir</p>
            </button>
        </div>
    </article>
</div>

            <div id="newColecaoModal" class="modal">
                <div id="modalcontentnewcolecao" class="modal-content">
                    <div class="nav">
                        <div class="flex gap">
                            <h3>Nova coleção</h3>
                        </div>

                        <button class="close" onclick="closeModal('newColecaoModal')">
                            <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <section>
                        <form class="form_newcolecao" id="form_newcolecao" action="<?= route('perfil/newColecao') ?>" method="post">
                            <div class="grid_newproject">
                                <div class="flex_column">
                                    <input type="text" placeholder="Nome da coleção" id="inputNomeColecao" name="colecao_nome" class="inputsNewProjeto">
                                </div>
                            </div>
                            <div class="row_end">
                                <button id="submitFormNewColecao" disabled form="form_newcolecao">
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

            <div id="newprojectModal" class="modal">
                <div id="modalcontentnewproject" class="modal-content">
                    <nav class="nav">
                        <h3>Novo projeto</h3>
                        <button class="close" onclick="closeModal('newprojectModal')">
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
            
</body>
<?php

$caminho_pasta_js = './public/scripts/';

// Lista todos os arquivos da pasta com extensão .css
$arquivosjs = glob($caminho_pasta_js . '*.js');

// Loop para inserir os arquivos CSS como tags <link>
foreach ($arquivosjs as $arquivojs) {
    $arquivojs = str_replace("./public/", "", $arquivojs);
    print('<script src="' . assets($arquivojs) . '"></script>');
} ?>