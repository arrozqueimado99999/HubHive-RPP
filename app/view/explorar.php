<?php
include 'head.php';
include 'header.php';

?>

<nav class="welcome">
    <form for="search" action="<?= route('pesquisa/?q=') ?>" method="get" class="search">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"></path>
        </svg>
        <input id="search" name="q" type="text" placeholder="Pesquisar">
    </form>
</nav>

<article class="pesquisaResult column">
    <h3 class="ttl">Artigos em alta</h3>
    <div class="projects_5">
        <?php
        foreach ($allArtigo as $a): ?>
            <span onclick="openModal('<?= 'ArtigoModal'.$a['id']?>')" class="artigoDivBig">
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

<div class="gridEixos">
<?php
    foreach ($allEixo as $eixo): ?>
        <a href="<?=route('eixo?='.$eixo['id'])?>" class="eixoDivBig" style="background-image: url(<?=assets($eixo['banner'])?>);">
            <span class="overlay"></span>    
            <h3 class="ttlEixo"><?=$eixo['titulo']?></h3>
            <div class="navEixo"></div>
        </a>
    <?php 
    endforeach;
    ?>
</div>

<?php
include 'foot.php';
?>