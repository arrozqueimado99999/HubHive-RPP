<?php
include 'head.php';
include 'header.php';
?>

<article class="perfil">

    <nav class="profile_nav">
        <img id="profilefoto" src="<?= $asset = $_SESSION['user']['foto_perfil'];
                                    assets($asset) ?>" alt="perfil foto">
        <h1><?= $_SESSION['user']['nome'] ?></h1>
        <p>@<?= $_SESSION['user']['usuario'] ?></p>

        <div class="btn_div">
            <button class="btn_library" onclick="openModal('myModal')">Editar perfil</button>
        </div>

        <div id="myModal" class="modal">
            <article class="modal-content" id="contentModal">
                <div class="nav">
                    <h3>Editar perfil</h3>
                    <span class="close" onclick="closeModal('myModal')">&times;</span>
                </div>

                <section>
                    <form class="form_newproject" method="POST" action="<?= route('perfil/profilePic') ?>" enctype="multipart/form-data">
                        <label id="imagemAdd" class="send" for="file">
                            <div id="imgchange">
                            </div>

                            <div id="formimg">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>Faça o upload de um arquivo</span>
                                </div>
                            </div>
                            <input type="file" required name="file" id="file">
                        </label>

                        <div class="letsgo" id="cu">
                            <input type="submit" class="btn_library" value="Salvar informações">
                        </div>
                    </form>
                </section>
            </article>
        </div>
    </nav>

    <div class="perfil_info">
        <nav class="nav_library">
            <button onclick="openModalLadoById('btnCriarNovo','modalOptCriarNovo')" id="btnCriarNovo" class="btn_library">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="modalOpt" id="modalOptCriarNovo">
                <button onclick="openModal('newColecaoModal')" class="opt">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.993.993 0 0 0-.294-.708ZM6.414 4h11.172l.999.999H5.415L6.414 4ZM4 19V6.999h16L20.002 19H4Z"></path>
                        <path d="M15 12H9v-2H7v4h10v-4h-2v2Z"></path>
                    </svg>
                    <h3>Coleção</h3>
                </button>

                <button onclick="openModal('newprojectModal')" class="opt">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 8h14M5 8a2 2 0 1 1 0-4h14a2 2 0 0 1 0 4M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8m-9 4h4"></path>
                    </svg>
                    <h3>Projeto</h3>
                </button>
            </div>
        </nav>

        <div class="perfil_conteudo">
    <?php
    if (isset($projetosByOrient) && $projetosByOrient !== "") {
        ?>
        <p>Projetos orientados</p>
        <div class="projects">
            <?php
            foreach ($projetosByOrient as $projorient) {
                ?>
                <a class="card" href="<?= route("projeto/?project={$projorient['id']}") ?>">
                    <div>
                        <img src="<?= $projorient['banner'] ?>" alt="<?= $projorient['banner']; ?>">
                    </div>
                    <div class="text">
                        <h3><?= $projorient['titulo']; ?></h3>
                        <p id="descricao"><?= $projorient['descricao'] ?></p>
                        <p class="criadoem"><?= "Criado em " . $projorient['data_postagem'] ?></p>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

    <div class="projects">
        <?php
        if ($colecoesByUser !== "") {
            foreach ($colecoesByUser as $cole) {
                ?>
                <a class="cardcole" style="background: url('<?=assets("imgs/colecao_fundo2.jpg")?>');" href="<?= route("colecao/?colection={$cole['id']}") ?>">
                <div class="escuro">
                            <h3><?= $cole['nome']; ?></h3>
                            <p class="criadoem"><?= "Criado em " . $cole['data_criacao'] ?></p>
                </div>    
                </a>
                <?php
            }
        }
        ?>

        <?php
        if ($projetosByUser !== "") {
            foreach ($projetosByUser as $proj) {
                ?>
                <a class="card" href="<?= route("projeto/?project={$proj['id']}") ?>">
                    <div>
                        <img src="<?= $proj['banner'] ?>" alt="<?= $proj['banner']; ?>">
                    </div>
                    <div class="text">
                        <h3><?= $proj['titulo']; ?></h3>
                        <p id="descricao"><?= $proj['descricao'] ?></p>
                    </div>
                </a>
                <?php
            }
        } else {
            include 'errorsview/noprojects.php';
        }
        ?>
    </div>
</div>

</article>

<?php
include 'foot.php';
?>