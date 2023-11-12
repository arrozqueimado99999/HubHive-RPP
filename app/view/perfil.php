<?php
include 'head.php';
include 'header.php';
?>

<div class="perfil">

    <nav class="profile_nav">
        <div class="profileimgdiv">
            <img id="profilefoto" src="<?php
            $asset = $_SESSION['user']['foto_perfil'];
            print(route($asset))?>"
            alt="perfil foto">
            <button class="btnmudarperfil">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m21 7.191-4.19-4.19a1.49 1.49 0 0 0-2.12 0l-2.474 2.465-8.775 8.785A1.49 1.49 0 0 0 3 15.31v4.19A1.5 1.5 0 0 0 4.5 21h4.19a1.493 1.493 0 0 0 1.06-.44L21 9.31a1.51 1.51 0 0 0 0-2.119Zm-16.19 7.81L13.5 6.31l1.566 1.566-8.691 8.69-1.566-1.565ZM4.5 16.81l2.69 2.69H4.5v-2.69ZM9 19.19l-1.566-1.565 8.691-8.691 1.566 1.566L9 19.19Z"></path>
                </svg>
            </button>
        </div>

        <h1><?= $_SESSION['user']['nome'] ?></h1>
        <p>@<?= $_SESSION['user']['usuario'] ?></p>

        <div class="btn_div">
            <button class="cardForuns" onclick="openModal('myModal')">Editar perfil</button>
        </div>
        <div id="myModal" class="modal">
            <article class="modal-content" id="contentModal">
                <div class="nav">
                    <h3>Editar perfil</h3>
                    <span class="close" onclick="closeModal('myModal')">&times;</span>
                </div>

                <section class="secform">
                    <form class="form_editprofile" id="form_editprofile" method="POST" action="<?= route('perfil/editProfile') ?>" enctype="multipart/form-data">
                        <div class="formDivGrid">
                            <div class="imgNavEditDiv">                                
                                <label class="imgedit" for="profileEditImg">
                                    <div id="imgchange">
                                        <img src="<?=route($_SESSION['user']['foto_perfil'])?>" alt="">
                                    </div>
                                    <input type="file" class="hide" name="profileEditImg" id="profileEditImg">
                                </label>
                            </div>

                            <div class="inputsEditProfile">
                                <div class="inputandlabel">
                                    <label for="EditProfnome">Nome</label>
                                    <input type="text" value="<?=$_SESSION['user']['nome']?>" name="EditProfnome" id="EditProfnome">
                                </div>
                                <div class="inputandlabel">
                                    <label for="EditProfuser">Usuário</label>
                                    <input type="text" value="<?=$_SESSION['user']['usuario']?>" name="EditProfuser" id="EditProfuser">
                                </div>
                                <div class="inputandlabel">
                                    <label for="EditProfemail">E-mail</label>
                                    <input type="text" value="<?=$_SESSION['user']['email']?>" name="EditProfemail" id="EditProfemail">
                                </div>
                            </div>
                        </div>    

                        <div class="row_end">
                            <button disabled id="btnEditProfile">
                                Salvar
                            </button>
                        </div>
                    </form>
                </section>
            </article>
        </div>
    </nav>

    <div class="project">
        <nav class="nav_library">
            <button class="cardForuns">
                Todos
            </button>

            <button class="cardForuns">
                Curtidos por mim
            </button>
        </nav>

        <div class="perfil_conteudo">
            <?php
            if (!empty($colecoesByUser)) {
            ?>
                <div class="projects">
                    <?php
                    foreach ($colecoesByUser as $cole) {
                    ?>                    
                        <div class="colecaoDiv" href="<?= route("colecao/?colection={$cole['id']}") ?>">
                            <div class="postsInColecao">
                                <form id="formDeleteCole<?=$cole['id']?>" class="hide" action="<?=route("perfil/deleteColecao/?id={$cole['id']}")?>" method="post"></form>
                                <div class="divBtnsColecao">
                                    <button class="btnOptColecaoDiv">
                                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2.4a6 6 0 0 0-6 6v2.4a2.4 2.4 0 0 0-2.4 2.4v6A2.4 2.4 0 0 0 6 21.6h12a2.4 2.4 0 0 0 2.4-2.4v-6a2.4 2.4 0 0 0-2.4-2.4H8.4V8.4a3.6 3.6 0 0 1 7.086-.9 1.2 1.2 0 0 0 2.324-.6A6.002 6.002 0 0 0 12 2.4Z"></path>
                                        </svg>
                                    </button>
                                    <button class="btnOptColecaoDiv" form="formDeleteCole<?=$cole['id']?>">
                                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 11v6m4-6v6M4 7h16m-1 0-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7h14Zm-4 0V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3h6Z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <?php
                                if ($cole!=="") :?>
                                    <div class="divimg">
                                        <?php if (!empty($cole['postsInColecao']['0']['anexo'])):?>
                                            <img src="<?= route($cole['postsInColecao']['0']['anexo']) ?>" alt="empty">
                                            <?php else:?>
                                            <img src="<?= assets('imgs/png_background.png') ?>" alt="empty">                                            
                                        <?php endif?>
                                    </div>
                                    <div class="divimg">
                                        <?php if (!empty($cole['postsInColecao']['1']['anexo'])):?>
                                            <img src="<?= route($cole['postsInColecao']['1']['anexo']) ?>" alt="empty">
                                            <?php else:?>
                                            <img src="<?= assets('imgs/png_background.png') ?>" alt="empty">                                            
                                        <?php endif?>
                                    </div>
                                    <div class="divimg">
                                        <?php if (!empty($cole['postsInColecao']['2']['anexo'])):?>
                                            <img src="<?= route($cole['postsInColecao']['2']['anexo']) ?>" alt="empty">
                                            <?php else:?>
                                            <img src="<?= assets('imgs/png_background.png') ?>" alt="empty">                                            
                                        <?php endif?>
                                    </div>
                                    <?php endif ?>
                            </div>
                            <a class="nav_colecao" href="<?= route("colecao/?colection={$cole['id']}") ?>">
                                <h3><?= $cole['nome']; ?></h3>
                                <p class="criadoem"><?= "Criado em " . $cole['data_criacao'] ?></p>
                                <div class="opt gvgv">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14.752 6.352a1.2 1.2 0 0 1 1.696 0l4.8 4.8a1.2 1.2 0 0 1 0 1.696l-4.8 4.8a1.2 1.2 0 0 1-1.696-1.696l2.751-2.752H3.6a1.2 1.2 0 1 1 0-2.4h13.903l-2.751-2.752a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
                include 'errorsview/noprojects.php';
            }
            ?>

        </div>
    </div>
</div>
</div>

</article>

<?php
include 'foot.php';
?>