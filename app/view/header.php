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