<?php

use models\Categorias;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Posts;

class BibliotecaController{
    function index(){
        $send = [];
        //print_r($_SESSION);

        $user = new Usuario();
        $categ = new Categorias();
        $projects = new Projeto();

        $update = $user->findById($_SESSION['id']);
        $allcateg = $categ->allCateg();
        $allProj = $projects->projectsByUser($_SESSION['id']);

        $send['projetosByUser'] = $allProj;
        $send['allCategorias'] = $allcateg;
        $_SESSION = $update;       
                
        render("biblioteca", $send); 
    }

    function profilePic() {
        $model = new Midia();
        $upload = $model->profilePic($_SESSION['id']);

        redirect('biblioteca');
    }    

    function newProject(){
        if(isset($_POST["titulo"]) && isset($_POST["descricao"])){
            $titulo = $_POST["titulo"];
            $descricao =  $_POST["descricao"];
            $categ = $_POST["categ"];
        }else{
            $titulo = "";
            $descricao =  "";
            $categ = "";
        }

        $model = new Projeto();
        $upload = $model->createProject($titulo, $descricao, $categ);
        //var_dump($upload);
        //var_dump($_POST);
        //die();

        redirect('biblioteca');
    }
}
