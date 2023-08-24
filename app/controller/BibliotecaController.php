<?php

use models\Categorias;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Posts;

class BibliotecaController{
    function index(){
        $send = [];

        $user = new Usuario();
        $categ = new Categorias();
        $projects = new Projeto();

        //$update = $user->findById($_SESSION['user']['id']);
        $allcateg = $categ->allCateg();

        if ($_SESSION['tipo'] == Usuario::COMUM_USER){
            $allProj = $projects->projectsByUser($_SESSION['user']['id']);
            $send['projetosByUser'] = $allProj;
        } else {
            $allProj = $projects->projectsByOrient($_SESSION['user']['id']);
            $send['projetosByUser'] = $allProj;            
        }

        $send['allCategorias'] = $allcateg;   
        //$_SESSION['user'] = $update;
                
        render("biblioteca", $send); 
    }

    function profilePic() {
        $model = new Midia();
        $upload = $model->profilePic($_SESSION['user']['id']);

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

        //var_dump($_FILES['inputbanner']['full_path']);
        $model = new Projeto();
        $upload = $model->createProject($titulo, $descricao, $categ);
        //var_dump($_FILES);
        //die();

        redirect('biblioteca');
    }
}
