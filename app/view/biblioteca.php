<?php

include 'head.php';
include 'header.php';

//print_r($_SESSION);
?>

<div class="profile_nav">
        <img id="profilefoto" src="<?=
        $asset = $_SESSION['foto_perfil'];
        assets($asset)?>" alt="perfil foto">
        <h1><?=$_SESSION['nome']?></h1>
        <p>@<?=$_SESSION['usuario']?></p>

        <div class="btn_div">
            <button class="btn_library" onclick="openModal('myModal')">Editar perfil</button>
            <a id="btn_exit" href="<?=route('feed/exit')?>">
                <svg width="26" height="26" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 3h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H5a2 2 0 0 1-2-2v-4h2v4h14V5H5v4H3V5a2 2 0 0 1 2-2Zm6.5 14-1.41-1.41L12.67 13H3v-2h9.67l-2.58-2.59L11.5 7l5 5-5 5Z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>

        <div id="myModal" class="modal">
            <article class="modal-content" id="contentModal">
                <div class="nav">
                        <h3>Editar perfil</h3>
                        <span class="close" onclick="closeModal('myModal')">&times;</span>
                </div>

                <section>                    
                    <form class="form_newproject" method="POST" action="<?=route('biblioteca/profilePic')?>" enctype="multipart/form-data">
                        <label id="imagemAdd" class="send" for="file">
                            <div id="imgchange">
                            </div>

                            <div id="formimg">
                                <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                                    </div>
                                    <div class="text">
                                        <span>Faça o upload de um arquivo</span>                                    
                                    </div>
                            </div>
                            <input type="file" required name="file" id="file">
                        </label>                        
                        
                        <div class="letsgo">
                            <input type="submit" class="btn_library" value="Salvar informações">
                        </div>
                    </form>
                </section>
            </article>
        </div>
</div>

<nav class="nav_library">
    <button onclick="openModal('newprojectModal')" class="btn_library">
        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 6a1.2 1.2 0 0 1 1.2 1.2v3.6h3.6a1.2 1.2 0 1 1 0 2.4h-3.6v3.6a1.2 1.2 0 1 1-2.4 0v-3.6H7.2a1.2 1.2 0 1 1 0-2.4h3.6V7.2A1.2 1.2 0 0 1 12 6Z" clip-rule="evenodd"></path>
        </svg>
        <p>Novo projeto</p>
    </button>

        <div id="newprojectModal" class="modal">
            <article id="modalcontentnewproject" class="modal-content">
                <div class="nav">
                    <h3>Novo projeto</h3>
                    <span class="close" onclick="closeModal('newprojectModal')">&times;</span>
                </div>

                <section>
                    <form class="form_newproject" action="<?=route('biblioteca/newProject')?>" method="post" enctype="multipart/form-data">
                        <label id="bannerAdd" class="send" for="inputbanner">
                                <div id="bannerimgchange">
                                </div>

                                <div id="formbanner">
                                    <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                                        </div>
                                        <div class="text">
                                            <span>Dimensões recomendadas: 400x1080</span>                                    
                                        </div>
                                </div>
                                <input type="file" required name="inputbanner" id="inputbanner">
                            </label> 

                        <div class="grid_newproject">
                            <div class="flex_column">
                                <input type="text" placeholder="Titulo" id="inputTitulo" name="titulo" class="search">
                                <textarea type="text" cols="30" rows="5" placeholder="Descrição" id="inputTitulo" name="descricao" class="search"></textarea>
                            </div>

                            <div class="flex_column">
                            <select class="add_orient_categ" name="categ" id="btnAddOrient">
                                <?php
                                foreach ($allCategorias as $categ) : ?>
                                    <option class="card" value="<?=$categ['id'];?>">
                                    <div class="text">
                                        <?=$categ['nome'];?>
                                    </div>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>

                            <button id="btnAddCateg" class="add_orient_categ">
                                <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.6 10.8a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Zm0 2.4a7.2 7.2 0 0 1 7.2 7.2H2.4a7.2 7.2 0 0 1 7.2-7.2Zm9.6-4.8a1.2 1.2 0 1 0-2.4 0v1.2h-1.2a1.2 1.2 0 1 0 0 2.4h1.2v1.2a1.2 1.2 0 1 0 2.4 0V12h1.2a1.2 1.2 0 0 0 0-2.4h-1.2V8.4Z"></path>
                                </svg>
                                <h3>Adicionar orientador</h3>
                            </button>
                            </div>

                        </div>

                        <div class="letsgo">
                            <input type="submit" class="btn_library" value="Começar projeto">
                        </div>
                
                    </form>
                </section>
            </article>
        </div>
</nav>

<div class="projects">
    <?php
    if($projetosByUser !== ""){
        foreach ($projetosByUser as $proj) : ?>
        <a class="card" href="#">
            <div>
                <img src="<?=$proj['banner']?>" alt="<?=$proj['id'];?>">
            </div>
            <div class="text">
               <h3><?=$proj['titulo'];?></h3> 
               <p><?=$proj['descricao']?></p>
            </div>
        </a>
        <?php
        endforeach;
        } else{?>
        <div>
            <h3>Voce não possui projetos ainda</h3>
        </div>
        <?php
        }?>
</div>

</body>
</html>
