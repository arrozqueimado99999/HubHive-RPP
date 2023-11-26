<?php
include 'head.php';
include 'header.php';

?>

<nav class="welcome">
    <form for="search" action="<?= route('pesquisa/?q=') ?>" method="get" class="search">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"></path>
        </svg>
        <input id="search" name="q" type="text" placeholder="Pesquisar" value="<?=$send['search']?>">
    </form>


    <div id="carddivscroll">
        <?php
        foreach ($allCateg as $categ) : ?>
            <a href="<?= route("pesquisa/?categ={$categ['id']}") ?>" class="cardForuns">
                <p><?= $categ['titulo'] ?></p>
            </a>
        <?php
        endforeach; ?>
    </div>
</nav>

<div class="pad flex_start">
    <a id="voltarPag" href="<?=route('home')?>">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.248 17.648a1.2 1.2 0 0 1-1.696 0l-4.8-4.8a1.2 1.2 0 0 1 0-1.696l4.8-4.8a1.2 1.2 0 0 1 1.696 1.696L6.497 10.8H20.4a1.2 1.2 0 1 1 0 2.4H6.497l2.751 2.752a1.2 1.2 0 0 1 0 1.696Z" clip-rule="evenodd"></path>
        </svg>
    </a>
    <h2 class="ttl">Mostrando resultados para "<span style="color: var(--purple);"><?php echo $send['search']; ?></span>"</h2>
</div>

<section class="welcome">
    <a class="btnResultados" target="_blank" href="https://scholar.google.com.br/scholar?hl=pt-BR&as_sdt=0%2C5&q=<?=$send['search']?>">
        <p>Resultados no</p>
        <img src="<?=assets('imgs/Google_Scholar_logo.png')?>" alt="not_found">
    </a>

    <a class="btnResultados" target="_blank" href="<?= "https://search.scielo.org/?q=" . $send['search'] . "&lang=pt"?>">
        <p>Resultados no</p>
        <img src="<?=assets('imgs/SciELO_logo.png')?>" alt="not_found">
    </a>

    <a class="btnResultados" target="_blank" href="<?= "http://bdtd.ibict.br/vufind/Search/Results?lookfor=" . $send['search'] . "&type=AllFields"?>">
        <p>Resultados na</p>
        <img src="<?=assets('imgs/BDTD15.png')?>" alt="not_found">
    </a>

    <a class="btnResultados" target="_blank" href="<?= "https://eric.ed.gov/?q=" . $send['search']?>">
        <p>Resultados no</p>
        <img src="<?=assets('imgs/eric_results.png')?>" alt="not_found">
    </a>
</section>

<article class="pesquisaResult column">
    <?php
    if (isset($findProjTitulo) or isset($findProjDesc)) {?>
    <h3>Projetos</h3>
    <div class="projects_5">
    <?php
        if (isset($findProjTitulo)) {
            foreach ($findProjTitulo as $findbyTitulo) {
                ?>
                <a class="card" href="<?= route("projeto/?project={$findbyTitulo['id']}") ?>">
                    <div>
                        <img src="<?= route($findbyTitulo['banner']) ?>" alt="<?=$findbyTitulo['banner']?>">
                    </div>
                    <div class="text">
                        <h3><?=$findbyTitulo['titulo'] ?></h3>
                        <p>Contém no título</p>
                    </div>
                </a>
                <?php
            }
        }
    ?>
    <?php
        if (isset($findProjDesc)) {
            foreach ($findProjDesc as $findbyDesc) {
                ?>
                <a class="card" href="<?= route("projeto/?project={$findbyDesc['id']}") ?>">
                    <div>
                        <img src="<?= route($findbyDesc['banner'] )?>" alt="<?= $findbyDesc['banner']?>">
                    </div>
                    <div class="text">
                        <h3><?= $findbyDesc['titulo']?></h3>
                        <p>Contém na descrição</p>
                    </div>
                </a>
                <?php
            } 
        }
    }?>
</article>


<article class="pesquisaResult column">
    <?php
    if (isset($findUsers)) {?>
    <h2 class="ttl">Usuários</h2>
    <div class="projects_5">
    <?php
        if (isset($findUsers)) {
            foreach ($findUsers as $user) { ?>
                <a class="cardUser" href="<?=route('perfil?u='.$user['id'])?>">
                    <div class="infoCardUser">
                        <img src="<?=route($user['foto_perfil'])?>" alt="" class="imguser">
                        <p class="nomeuser"><?=$user['nome']?></p>
                        <p class="username">@<?=$user['usuario']?></p>
                    </div>
                </a>
                <?php
            }
        }
    }
    ?>
    </div>
</article>

<div class="posts" id="allPosts">
        <?php
        if ($postsByPesquisa !== "") {
            foreach ($postsByPesquisa as $post) { ?>
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

<?php
include 'foot.php';
?>