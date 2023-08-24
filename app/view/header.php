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

        <div class="headerlastnav">
            <button id="changeuimode">
            <svg xmlns="http://www.w3.org/2000/svg" height="18px" width="18 px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>

            </button>
            <button id="newprojeto" onclick="openModal('modali')">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
                </svg>
                Criar
            </button>

            <button id="openModalProfile" class="profile" onclick="openModalProfile()">
                <img src="<?=$_SESSION['user']['foto_perfil']?>" alt="não tem" class="profileImg">
                <p><?=$_SESSION['user']['usuario']?></p>
            </button>

            <div id="modalProfile">
                gbwrbarbrbrbreb
            </div>
        </div>


    
    </header>