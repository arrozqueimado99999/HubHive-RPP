    <header>
        <div>
            <a class="link_home" href="<?= route('home') ?>">
                <img src="<?= assets('imgs/hubhive-logo-icon.svg') ?>" height="32px" fill="currentColor" alt="hubhivelogo">
            </a>
            <ul class="ulGap">
                <li>
                    <a class="link" href="<?= route('home') ?>">
                        Página Inicial
                    </a>
                </li>
                <li>
                    <a class="link" href="<?= route('explorar') ?>">
                        Explorar
                    </a>
                </li>
            </ul>
        </div>

        <div class="headerlastnav">
            <button id="changeuimode">
                <svg xmlns="http://www.w3.org/2000/svg" height="18px" width="18 px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                </svg>

            </button>
            <button id="newprojeto" onclick="openModal('modali')">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
                </svg>
                Criar
            </button>

            <button id="openModalProfile" class="profile" onclick="openModalProfile()">
                <img src="<?= $_SESSION['user']['foto_perfil'] ?>" alt="não tem" class="profileImg">
                <p><?= $_SESSION['user']['usuario'] ?></p>
            </button>

            <div id="modalProfile">
                <a href="<?= route('perfil') ?>" id="btnBiblioteca" class="btnsProfileOpt">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 10.8a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2ZM3.6 21.6a8.4 8.4 0 0 1 16.8 0H3.6Z" clip-rule="evenodd"></path>
                    </svg>
                    <p>Perfil</p>
                </a>
                <a href="<?= route('biblioteca') ?>" id="btnBiblioteca" class="btnsProfileOpt">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.4 3.6a1.2 1.2 0 1 0 0 2.4h7.2a1.2 1.2 0 1 0 0-2.4H8.4ZM4.8 8.4A1.2 1.2 0 0 1 6 7.2h12a1.2 1.2 0 1 1 0 2.4H6a1.2 1.2 0 0 1-1.2-1.2Zm-2.4 4.8a2.4 2.4 0 0 1 2.4-2.4h14.4a2.4 2.4 0 0 1 2.4 2.4V18a2.4 2.4 0 0 1-2.4 2.4H4.8A2.4 2.4 0 0 1 2.4 18v-4.8Z"></path>
                    </svg>
                    <p>Biblioteca</p>
                </a>
                <a href="<?= route('configuracao') ?>" id="btnConfig" class="btnsProfileOpt">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M19.5 12c0 .34-.03.66-.07.98l2.11 1.65c.19.15.24.42.12.64l-2 3.46c-.12.22-.38.31-.61.22l-2.49-1c-.52.39-1.08.73-1.69.98l-.38 2.65c-.03.24-.24.42-.49.42h-4c-.25 0-.46-.18-.49-.42l-.38-2.65c-.61-.25-1.17-.58-1.69-.98l-2.49 1c-.22.08-.49 0-.61-.22l-2-3.46a.505.505 0 0 1 .12-.64l2.11-1.65A7.93 7.93 0 0 1 4.5 12c0-.33.03-.66.07-.98L2.46 9.37a.493.493 0 0 1-.12-.64l2-3.46c.12-.22.38-.31.61-.22l2.49 1c.52-.39 1.08-.73 1.69-.98l.38-2.65c.03-.24.24-.42.49-.42h4c.25 0 .46.18.49.42l.38 2.65c.61.25 1.17.58 1.69.98l2.49-1c.22-.08.49 0 .61.22l2 3.46c.12.22.07.49-.12.64l-2.11 1.65c.04.32.07.64.07.98Zm-11 0c0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5-3.5 1.57-3.5 3.5Z" clip-rule="evenodd"></path>
                    </svg>
                    <p>Configurações</p>
                </a>
                <a id="btnExit" href="<?= route('home/exit') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="17" height="17" viewBox="0 0 500 500">
                        <path fill-rule="evenodd" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                    <p>Sair</p>
                </a>
            </div>
        </div>



    </header>