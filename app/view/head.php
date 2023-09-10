<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HubHive: Desenvolva suas ideias</title>
    <link rel="icon" type="image/x-icon" href="<?= assets('imgs/hubhive_vazado.svg') ?>">
    <link rel="stylesheet" href="<?= assets('css/library-style.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/style.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/newpost.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/errorsStyle.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/project.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/perfil.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/header.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/animations.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/variables.css') ?>">
    <link rel="shortcut icon" href="<?= assets('imgs/hubhive.ico') ?>">

    <?php
    $caminho_pasta_css = 'public/css/';

    // Lista todos os arquivos da pasta com extensão .css
    $arquivos_css = glob($caminho_pasta_css . '*.css');

    // Loop para inserir os arquivos CSS como tags <link>
    foreach ($arquivos_css as $arquivo_css) { 
       echo '<link rel="stylesheet" href="'.$arquivo_css.'">';     
    }
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>