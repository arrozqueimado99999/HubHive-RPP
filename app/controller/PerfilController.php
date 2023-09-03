<?php

use models\Categorias;
use models\Colecao;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Orientador;
use models\Posts;

class PerfilController{
    function index(){
        $send = [];

        $user = new Usuario();
        $categ = new Categorias();
        $projects = new Projeto();
        $cole = new Colecao();
        $orient = new Orientador();

        $allcateg = $categ->allCateg();
        $allOrient = $orient->allOrient();

        if ($_SESSION['tipo'] == Usuario::ORIENT_USER){
            $allProj = $projects->projectsByOrient($_SESSION['user']['id']);
            $send['projetosByOrient'] = $allProj;            
        }
        
        $allProj = $projects->projectsByUser($_SESSION['user']['id']);
        $allCole = $cole->colecoesByUser();
        $send['projetosByUser'] = $allProj;
        $send['colecoesByUser'] = $allCole;
        $send['allOrient'] = $allOrient;
        $send['allCategorias'] = $allcateg;   
        //$_SESSION['user'] = $update;
                
        render("perfil", $send); 
    }

    function profilePic() {
        $model = new Midia();
        $upload = $model->profilePic($_SESSION['user']['id']);

        redirect('perfil');
    }    

    function newProject(){
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";
        $categ = isset($_POST["categ"]) ? $_POST["categ"] : "";
        $orient = isset($_POST["orient"]) ? $_POST["orient"] : "";

        //var_dump($_POST);
        //die();
        $model = new Projeto();
        $upload = $model->createProject($titulo, $descricao, $categ, $orient);
        redirect('perfil');
    }

    function newColecao(){
        $nome = isset($_POST["colecao_nome"]) ? $_POST["colecao_nome"] : "";

        $model = new Colecao();
        $upload = $model->createColecao($nome);
        redirect('perfil');
    }
}
