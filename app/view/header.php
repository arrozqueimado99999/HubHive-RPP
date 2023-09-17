    <header>
        <div>
            <a class="link_home" onmouseenter="alert('block','fudeu de vez meu amigo')" href="<?= route('home') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 581.1 581.1"><defs><style>.cls-1{fill: currentColor;}</style></defs><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><path class="cls-1" d="M306.15,201.44H275a75.94,75.94,0,0,0-45.1,14.79h121.4A75.94,75.94,0,0,0,306.15,201.44Z"/><path class="cls-1" d="M503.85,0H77.26A77.26,77.26,0,0,0,0,77.26V503.85A77.26,77.26,0,0,0,77.26,581.1H503.85a77.26,77.26,0,0,0,77.25-77.25V77.26A77.26,77.26,0,0,0,503.85,0ZM405.72,490h-99.1V457.88h80.54l87.32-151.26H106.62L194,457.88h80.53V490H175.39L60.22,290.55,175.39,91.08h99.09v32.15H194L106.62,274.48h70.59A97.92,97.92,0,0,1,274.32,180l16.23-51.71L306.78,180a97.91,97.91,0,0,1,97.11,94.45h70.59L387.16,123.23H306.62V91.08h99.1L520.88,290.55Z"/><path class="cls-1" d="M364.49,228.6H216.61a76.5,76.5,0,0,0-8.36,12.09H372.86A77.23,77.23,0,0,0,364.49,228.6Z"/><path class="cls-1" d="M200.21,262.12a76.08,76.08,0,0,0-1.57,12.36H382.46a76.08,76.08,0,0,0-1.57-12.36Z"/></g></g></svg>            </a>
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
            <span id="changeuimode">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 2.4a1.2 1.2 0 0 1 1.2 1.2v1.2a1.2 1.2 0 1 1-2.4 0V3.6A1.2 1.2 0 0 1 12 2.4Zm4.8 9.6a4.8 4.8 0 1 1-9.6 0 4.8 4.8 0 0 1 9.6 0Zm-.557 5.94.849.848a1.2 1.2 0 0 0 1.696-1.696l-.848-.849a1.2 1.2 0 0 0-1.697 1.697Zm2.544-12.728a1.2 1.2 0 0 1 0 1.696l-.847.849a1.2 1.2 0 1 1-1.697-1.697l.849-.848a1.2 1.2 0 0 1 1.696 0ZM20.4 13.2a1.2 1.2 0 1 0 0-2.4h-1.2a1.2 1.2 0 0 0 0 2.4h1.2ZM12 18a1.2 1.2 0 0 1 1.2 1.2v1.2a1.2 1.2 0 1 1-2.4 0v-1.2A1.2 1.2 0 0 1 12 18ZM6.06 7.757A1.2 1.2 0 1 0 7.758 6.06l-.85-.848a1.2 1.2 0 0 0-1.696 1.696l.848.849ZM7.757 17.94l-.849.848a1.2 1.2 0 0 1-1.696-1.696l.848-.849a1.2 1.2 0 0 1 1.697 1.697ZM4.8 13.2a1.2 1.2 0 1 0 0-2.4H3.6a1.2 1.2 0 0 0 0 2.4h1.2Z" clip-rule="evenodd"></path>
                </svg>
            </span>
            <span id="btnCriarNovo" onclick="openModalLadoById('btnCriarNovo','modalOptCriarNovo')">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
                </svg>
                Criar
            </span>

            <span id="openModalProfile" class="profile" onclick="openModalProfile()">
                <img src="<?=route($_SESSION['user']['foto_perfil']) ?>" alt="não tem" class="profileImg">
                <p><?= $_SESSION['user']['usuario'] ?></p>
            </span>

            <div id="modalProfile" class="modalOpt">
                <a href="<?= route('perfil') ?>" id="btnBiblioteca" class="btnsProfileOpt">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 10.8a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2ZM3.6 21.6a8.4 8.4 0 0 1 16.8 0H3.6Z" clip-rule="evenodd"></path>
                    </svg>
                    <p>Perfil</p>
                </a>
                <a href="<?= route('configuracao') ?>" id="btnConfig" class="btnsProfileOpt">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M19.5 12c0 .34-.03.66-.07.98l2.11 1.65c.19.15.24.42.12.64l-2 3.46c-.12.22-.38.31-.61.22l-2.49-1c-.52.39-1.08.73-1.69.98l-.38 2.65c-.03.24-.24.42-.49.42h-4c-.25 0-.46-.18-.49-.42l-.38-2.65c-.61-.25-1.17-.58-1.69-.98l-2.49 1c-.22.08-.49 0-.61-.22l-2-3.46a.505.505 0 0 1 .12-.64l2.11-1.65A7.93 7.93 0 0 1 4.5 12c0-.33.03-.66.07-.98L2.46 9.37a.493.493 0 0 1-.12-.64l2-3.46c.12-.22.38-.31.61-.22l2.49 1c.52-.39 1.08-.73 1.69-.98l.38-2.65c.03-.24.24-.42.49-.42h4c.25 0 .46.18.49.42l.38 2.65c.61.25 1.17.58 1.69.98l2.49-1c.22-.08.49 0 .61.22l2 3.46c.12.22.07.49-.12.64l-2.11 1.65c.04.32.07.64.07.98Zm-11 0c0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5-3.5 1.57-3.5 3.5Z" clip-rule="evenodd"></path>
                    </svg>
                    <p>Configurações</p>
                </a>
                <a id="btnExit" href="<?= route('login/exit') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="17" height="17" viewBox="0 0 500 500">
                        <path fill-rule="evenodd" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                    <p>Sair</p>
                </a>
            </div>
        </div>



    </header>