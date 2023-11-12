<?php
include 'head.php';
include 'header.php';
?>
<div class="divnoaccess">
    <div id="texto_init" class="columnr">
        <img id="bee" src="<?= assets('imgs/hubhive_bee9.png') ?>" alt="hubhive_bee">
        <h1 class="tittle">Nada pra ver por aqui</h1>
        <p>Faça o login para aproveitar todas as funcionalidades</p>
        <a class="btn_glow" href="<?= route('login?new') ?>" id="btn_start">Entrar </a>
    </div>
</div>