<?php
include 'head.php';
include 'header.php';

//var_dump($_SESSION);
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
                <h2><?= $categ['titulo'] ?></h2>
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
    <h2>Mostrando resultados para "<span style="color: var(--purple);"><?php echo $send['search']; ?></span>"</h2>
</div>

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
    <h3>Usuários</h3>
    <div class="projects_5">
    <?php
        if (isset($findUsers)) {
            foreach ($findUsers as $user) {
                ?>
                <div class="cardUser">
                    <div class="infoCardUser">
                        <img src="<?=route($user['foto_perfil'])?>" alt="" class="imguser">
                        <p class="nomeuser"><?=$user['nome']?></p>
                        <p class="username"><?=$user['usuario']?></p>
                </div>

                <div class="nav">
                    <a href="<?=route('perfil?u='.$user['id'])?>">
                    Ver perfil
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 17a1 1 0 0 1-.71-1.71L13.1 12 9.92 8.69a1 1 0 1 1 1.42-1.41l3.86 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-.7.32Z"></path>
                    </svg>
                </a>
                </div>
                    
                </div>
                <?php
            }
        }
    }
    ?>
</article>

<?php
include 'foot.php';
?>