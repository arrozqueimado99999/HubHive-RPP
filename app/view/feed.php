<?php
include 'head.php';
include 'header.php';
?>

<head>
    <link rel="stylesheet" href="<?=assets('css/feed.css')?>">
</head>

<nav class="welcome">
    <h2>Bem vindo de volta, <?=_v($send, 'nome')?></h2>
</nav>

<div class="posts">
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
    <a href="<?=route('')?>" class="post"></a>
</div>

<?php
include 'paginacao.php';
include 'footer.php';
?>