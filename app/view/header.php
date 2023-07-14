    <header>
        <div>
            <a class="link_home" href="<?= route('') ?>">
                <img src="<?= assets('imgs/hubhive-logo.svg') ?>" height="26px" fill="currentColor" alt="hubhivelogo">
            </a>
            <ul>
                <li>
                    <a class="link" href="<?= route('feed') ?>">
                        Explorar
                    </a>
                </li>
                <li>
                    <a class="link" href="<?= route('biblioteca') ?>">
                        Minha Biblioteca
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <input class="search" name="pesquisa" type="text" placeholder="Pesquisar">

            <button id="newprojeto" onclick="openModal('modali')">
                <svg width="40" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5.25v13.5"></path>
                    <path d="M18.75 12H5.25"></path>
                </svg>
                Criar
            </button>

            <div class="profile">
            </div>
        </div>
    </header>

    <div class="modal" id="modali">
    <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
        <div class="nav">
            <h3>Criar postagem</h3>
            <span class="close" onclick="closeModal('modali')">&times;</span>
        </div>
        <section>
            <form id="formNewPost" class="form_newproject" action="<?= route('feed/newPost') ?>" method="POST" enctype="multipart/form-data">
                <div id="gridnewpost">
                    <div id="dropArea" class="drop anexo">
                        <input type="file" name="postanexo" id="postanexo">
                    </div>

                    <div id="inputsforPost">
                        <select name="projectToPost" id="projectToPost">
                            <option style="display: none;" selected disabled>Escolha um projeto</option>
                            <?php
                            foreach ($projetosByUser as $userProj) : ?>
                                <option value="<?= $userProj['id'] ?>">
                                    <h3><?= $userProj['titulo']; ?></h3>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <input required placeholder="Digite alguma coisa" type="text" name="legendaPost" id="legendaPost">
                        <a onclick="criarLink()" id="linklistBtn" class="btn">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
                            </svg>
                            Adicionar URL externa
                        </a>
                        <div id="linklist" class="linklist">

                        </div>
                        <div id="btnNewPost">
                            <button class="btn">Postar</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </article>
</div>