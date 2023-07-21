<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HubHive: Desenvolva suas ideias</title>
    <?php
    $caminho_pasta_css = 'public/css/';

    // Lista todos os arquivos da pasta com extensão .css
    $arquivos_css = glob($caminho_pasta_css . '*.css');

    // Loop para inserir os arquivos CSS como tags <link>
    foreach ($arquivos_css as $arquivo_css) {
        echo '<link rel="stylesheet" href="' . $arquivo_css . '">';
    }?>
    <link rel="shortcut icon" href="<?=assets('imgs/hubhive.ico')?>>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    