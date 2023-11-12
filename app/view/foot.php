    <div class="modalOpt" id="modalOptCriarNovo">
        <button onclick="openModal('newPostModal')" class="opt">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 5V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v1a3 3 0 0 0-3 3v11a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3ZM8 4h8v4H8V4Zm11 15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7a1 1 0 0 1 1 1v11Z"></path>
                </svg>
                <h3>Postagem</h3>
        </button>

        <button onclick="openModal('newColecaoModal')" class="opt">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 11a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h14Z"></path>
                <path d="M19 11V9a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2"></path>
                <path d="M17 7V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2"></path>
            </svg>
            <h3>Coleção</h3>
        </button>
    </div>
    
    <div class="modal" id="newPostModal">
        <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
            <div class="nav">
                <h3>Nova postagem</h3>
                <button class="close" onclick="closeModal('newPostModal')">
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
                                    <div class="fileExtDiv">
                                        <span class="fileExtInput">.jpeg, .png, .gif, .mp4, .pdf</span>
                                    </div>
                            </div>
                        </label>
                        <input type="file" required name="postanexo" id="postanexo">

                        <div id="inputsforPost">
                            <div class="row">
                                <span id="btnProjectSelect" onclick="openModalLadoById('btnProjectSelect','modalProjetostoSelect')" name="categ" class="btnDivSelect">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.8 4.8a2.4 2.4 0 0 0-2.4 2.4v9.6a2.4 2.4 0 0 0 2.4 2.4h14.4a2.4 2.4 0 0 0 2.4-2.4V9.6a2.4 2.4 0 0 0-2.4-2.4h-6l-2.4-2.4h-6Zm8.4 6a1.2 1.2 0 0 0-2.4 0V12H9.6a1.2 1.2 0 0 0 0 2.4h1.2v1.2a1.2 1.2 0 0 0 2.4 0v-1.2h1.2a1.2 1.2 0 0 0 0-2.4h-1.2v-1.2Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p id="projetoEscolhido">Adicionar na coleção</p>
                                </span>

                                <span id="tirarCole" onclick="limpar()" class="btnCircle">
                                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </div>

                            <input type="text" id="inputprojeto" class="inputhide" name="projetotopost">

                            <div class="modalOptBig" id="modalProjetostoSelect">
                                <div>
                                    <?php
                                    if ($colecoesByUser != "") {
                                        foreach ($colecoesByUser as $cole) :
                                            ?>
                                            <div class="colecaoButtonSave" id="<?= $cole['id'] ?>" onclick="addProjetoInLabel(<?= $cole['id'] . ', \'modalProjetostoSelect\''; ?>)">
                                                <div class="molduraColecao">
                                                    <?php if (!empty($cole['postsInColecao']['0']['anexo'])):?>
                                                        <img src="<?= route($cole['postsInColecao']['0']['anexo']) ?>" alt="empty">
                                                        <?php else:?>
                                                        <img src="<?= assets('imgs/png_background.png') ?>" alt="empty">                                            
                                                    <?php endif?>
                                                </div>
                                                <div>
                                                    <p id="<?= "projeto" . $cole['id'] ?>"><?= $cole['nome'] ?></p>
                                                </div>
                                            </div>
                                    <?php
                                        endforeach;
                                    } else {
                                        print("<p>Você não possui coleções criadas</p>");
                                    } ?>
                                </div>
                            </div>
                            <input placeholder="Digite alguma coisa" type="text" class="inputsNewProjeto" name="legendaPost" id="legendaPost">
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
</body>

<div class="loader">

<div class="dot-spinner">
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
<div class="dot-spinner__dot"></div>
</div>

</div>



<?php

$caminho_pasta_js = './public/scripts/';

// Lista todos os arquivos da pasta com extensão .css
$arquivosjs = glob($caminho_pasta_js . '*.js');

// Loop para inserir os arquivos CSS como tags <link>
foreach ($arquivosjs as $arquivojs) {
    $arquivojs = str_replace("./public/", "", $arquivojs);
    print('<script src="' . assets($arquivojs) . '"></script>');
} ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-javascript.min.js"></script>