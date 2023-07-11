<?php
include 'head.php';
include 'header.php';
?>

<head>
    <link rel="stylesheet" href="<?= assets('css/feed.css') ?>">
</head>

<nav class="welcome">
    <h2>Bem vindo de volta, <?= _v($send, 'nome') ?></h2>
</nav>

<div class="posts">
</div>

<div class="modal" id="modali">
    <article class="modal-content" id="createPost" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
        <div class="nav">
            <h3>Criar postagem</h3>
            <span class="close" onclick="closeModal('modali')">&times;</span>
        </div>
        <section>
            <form class="form_newproject" action="<?= route('feed/newPost') ?>" method="post" enctype="multipart/form-data">
                <select name="projectToPost" id="projectToPost">
                    <option style="display: none;" selected disabled>Escolha um projeto</option>
                    <?php
                    foreach ($projetosByUser as $userProj) : ?>
                        <option value="<?=$userProj['id']?>">
                                <h3><?= $userProj['titulo']; ?></h3>
                        </option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input required placeholder="Digite alguma coisa" type="text" name="legendaPost" id="legendaPost">
                <div for="postAnexo" id="dropArea" class="drop anexo">
                    <input type="file" name="postAnexo" id="postAnexo">
                </div>
                <button class="btn">Postar</button>
            </form>
        </section>
    </article>
</div>

<?php
include 'paginacao.php';
include 'footer.php';
?>