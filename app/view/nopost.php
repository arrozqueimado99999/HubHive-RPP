<?php
include 'head.php';
include 'header.php';
?>
<div class="nopostDiv">
    <div id="texto_init" class="columnr">
        <img id="bee" src="<?= assets('imgs/hubhive_bee8.png') ?>" alt="hubhive_bee">
        <h1 class="tittle">Postagem não encontrada</h1>
        <p>Parece que essa postagem ainda não existe</p>
        <a class="btn_glow" href="<?= route('home') ?>" id="btn_start">Voltar à página inicial </a>
    </div>
</div>