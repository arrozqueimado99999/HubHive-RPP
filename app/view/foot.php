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

        <button onclick="openModal('newArtigoModal')" class="opt">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z"></path>
            </svg>
            <h3>Artigo</h3>
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
                                        <span class="fileExtInput">.jpeg, .png, .gif, .mp4</span>
                                    </div>
                            </div>
                        </label>
                        <input type="file" required name="postanexo" id="postanexo">

                        <div id="inputsforPost">
                            <input placeholder="Digite alguma coisa" type="text" class="inputsNewProjeto" name="legendaPost" id="legendaPost">
                            <div class="row">
                                <span id="btnEixoSelect" onclick="openModalLadoById('btnEixoSelect','modalEixostoSelect')" name="eixotopost" class="btnDivSelect">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5 19.72h-12V7.5h7v-2h-7c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h-2v7.22Z"></path>
                                    <path d="M18.5 2.5h-2v3h-3c.01.01 0 2 0 2h3v2.99c.01.01 2 0 2 0V7.5h3v-2h-3v-3Z"></path>
                                    <path d="M14.5 9.5h-8v2h8v-2Z"></path>
                                    <path d="M6.5 12.5v2h8v-2h-8Z"></path>
                                    <path d="M14.5 15.5h-8v2h8v-2Z"></path>
                                    </svg>
                                    <p id="eixoEscolhido">Adicionar ao eixo</p>
                                </span>

                                <span id="btnProjectSelect" onclick="openModalLadoById('btnProjectSelect','modalProjetostoSelect')" name="categ" class="btnDivSelect">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.8 4.8a2.4 2.4 0 0 0-2.4 2.4v9.6a2.4 2.4 0 0 0 2.4 2.4h14.4a2.4 2.4 0 0 0 2.4-2.4V9.6a2.4 2.4 0 0 0-2.4-2.4h-6l-2.4-2.4h-6Zm8.4 6a1.2 1.2 0 0 0-2.4 0V12H9.6a1.2 1.2 0 0 0 0 2.4h1.2v1.2a1.2 1.2 0 0 0 2.4 0v-1.2h1.2a1.2 1.2 0 0 0 0-2.4h-1.2v-1.2Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p id="projetoEscolhido">Salvar na coleção</p>
                                </span>

                                <span id="tirarCole" onclick="limparColecao()" class="btnCircle">
                                    <svg width="22" he3ight="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </div>

                            <input type="text" id="inputeixo" class="inputhide" name="eixotopost">
                            <input type="text" id="inputtags" class="inputhide" name="tagstopost">
                            <input type="text" id="inputprojeto" class="inputhide" name="projetotopost">

                            <div class="modalOptBig" id="modalEixostoSelect">
                                <div class="column">
                                    <?php
                                    foreach ($allEixo as $eixo) { ?>
                                        <div class="opt" id="<?=$eixo['id']?>" onclick="addEixoInLabel('<?= $eixo['id']?>', 'modalEixostoSelect')">
                                            <p id="<?='eixo' . $eixo['id']?>"><?=$eixo['titulo']?></p> 
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

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
                            <span class="inputTagDiv">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 14.004h-4.3l.73-4H20a1 1 0 0 0 0-2h-3.21l.69-3.81a1 1 0 0 0-.84-1.19 1 1 0 0 0-1.22.82l-.75 4.18h-3.88l.69-3.81a1 1 0 0 0-.84-1.19 1 1 0 0 0-1.22.82l-.75 4.18H4a1 1 0 0 0 0 2h4.3l-.73 4H4a1 1 0 1 0 0 2h3.21l-.69 3.81a1 1 0 0 0 .84 1.19 1 1 0 0 0 1.22-.82l.75-4.18h3.88l-.69 3.81a1 1 0 0 0 .84 1.19 1 1 0 0 0 1.22-.82l.75-4.18H20a1 1 0 0 0 0-2Zm-10.3 0 .73-4h3.87l-.73 4H9.7Z"></path>
                                </svg>
                                <input placeholder="Digite uma tag" id="inputDigitarTag" class="inputTransparente" type="text">
                                <input  type="text" class="inputhide" name="tagsToPost" id="inputTagsToPost">
                                <span id="btnAddTag" class="btnAddTag">
                                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m19.78 12.38-4-5a1 1 0 0 0-1.56 1.24l2.7 3.38H8a1 1 0 0 1-1-1V6a1 1 0 0 0-2 0v5a3 3 0 0 0 3 3h8.92l-2.7 3.38A1 1 0 0 0 15 19a1 1 0 0 0 .78-.38l4-5a1 1 0 0 0 0-1.24Z"></path>
                                    </svg>
                                </span>
                            </span>
                            <div class="tagsListInPost" id="tagsListInPost">
                            </div>
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

    <div class="modal" id="newArtigoModal">
        <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
            <div class="nav">
                <h3>Novo artigo</h3>
                <button class="close" onclick="closeModal('newArtigoModal')">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <section>
                <form id="formNewArtigo" class="form_newproject" action="<?= route('post/createArtigo') ?>" method="POST" enctype="multipart/form-data">
                    <div id="gridnewpost">
                        <label for="artigoInput" class="drop anexo">
                            <div>
                                <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 10v6H9v-6H5l7-7 7 7h-4Zm4 10v-2H5v2h14Z" clip-rule="evenodd"></path>
                                </svg>
                                <h3>Arraste aqui</h3>
                                <div class="fileExtDiv">
                                    <span class="fileExtInput">.pdf, .docx</span>
                                </div>
                            </div>
                        </label>
                        <input type="file" class="inputhide" required name="artigoInput" id="artigoInput">

                        <div id="inputsforArtigo">
                            <input placeholder="Título do artigo" type="text" class="inputsNewProjeto" name="legendaArtigo" id="legendaArtigo">

                            <input type="text" id="inputeixo" value="8" class="inputhide" name="eixoToArtigo">

                            <div class="modalOptBig" id="modalEixostoSelect">
                                <div class="column">
                                    <?php
                                    foreach ($allEixo as $eixo) { ?>
                                        <div class="opt" id="<?=$eixo['id']?>" onclick="addEixoInLabel('<?= $eixo['id']?>', 'modalEixostoSelect')">
                                            <p id="<?='eixo' . $eixo['id']?>"><?=$eixo['titulo']?></p> 
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="tagsListInPost" id="tagsListInPost">
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <div class="row_end">
                <button id="submitFormNewPost" form="formNewArtigo">
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