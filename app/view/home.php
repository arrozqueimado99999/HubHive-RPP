<?php
include 'head.php';
include 'header.php';

//var_dump($_SESSION);
//var_dump($artigosRecomend);
?>

<article id="postsSCROLL">
    
    <nav class="welcome">
        <form for="search" action="<?= route('pesquisa/?q=') ?>" method="get" class="search">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"></path>
            </svg>
            <input id="search" name="q" type="text" placeholder="Pesquisar">
        </form>
        <div id="carddivscroll">
            <?php
            foreach ($allEixo as $eixo) : ?>
                <a href="<?= route("eixo?eixo={$eixo['id']}") ?>" class="cardForuns">
                    <p><?= $eixo['titulo'] ?></p>
                </a>
            <?php
            endforeach; ?>
        </div>
    </nav>
    
    <div class="posts" id="allPosts">
        <?php
        if ($allPosts !== "") {
            foreach ($allPosts as $post) { ?>
                    <div class="post">
                        <a href="<?= route("post/?post={$post['id']}") ?>">
                        <div class="infoByPost">
                            <p><?=$post['legenda']?></p>
                        </div>
                            <img src="<?= route($post['anexo']) ?>" alt="não tem">
                        </a>
                    </div>
                <?php }
            } else { ?>
            <div>
                <h3>Não há nenhuma postagem ainda</h3>
            </div>
        <?php
        }
        ?>
    </div>

    <button id="btnShowArtigos" onmouseenter="toggleScroll()" class="btnCirculo">
        <svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="m19 9 1.25-2.75L23 5l-2.75-1.25L19 1l-1.25 2.75L15 5l2.75 1.25L19 9Z"></path>
        <path d="m19 15-1.25 2.75L15 19l2.75 1.25L19 23l1.25-2.75L23 19l-2.75-1.25L19 15Z"></path>
        <path d="M11.5 9.5 9 4 6.5 9.5 1 12l5.5 2.5L9 20l2.5-5.5L17 12l-5.5-2.5Zm-1.51 3.49L9 15.17l-.99-2.18L5.83 12l2.18-.99L9 8.83l.99 2.18 2.18.99-2.18.99Z"></path>
        </svg>
    </button>
    
    <div id="divArtigosRecomend" onmouseleave="toggleScroll()" class="divArtigosRecomend">
        <?php
        $fileCodes = array('.css', '.html', '.xml', '.js', '.php', '.txt');
        foreach ($artigosRecomend as $a): ?>
            <span onclick="openModal('<?= 'ArtigoModal'.$a['id']?>')" class="artigoDiv">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24px" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                <p class="tituloArtigo"><?=$a['legenda']?></p>
            </span>
    
            <div class="modal" id="<?= 'ArtigoModal'.$a['id']?>">
            <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
                <div class="nav">
                    <h3><?=$a['legenda']?></h3>
                    <button class="close" onclick="closeModal('<?= 'ArtigoModal'.$a['id']?>')">
                        <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
    
                <iframe src="<?=$a['anexo']?>" width="100%" height="500px"></iframe>
            </article>
        </div>
        <?php endforeach ?>
    </div>
</article>

<?php
include 'foot.php';
?>