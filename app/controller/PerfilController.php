<?php

use models\Categorias;
use models\Colecao;
use models\Eixo;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Orientador;
use models\Posts;

class PerfilController{
    function __construct()
    {
        if (!isset($_SESSION["user"])){
            redirect("access");
            die();
        }    
    }
    function index(){
        $send = [];

        $user = new Usuario();
        $categ = new Eixo();
        $post = new Posts();
        $cole = new Colecao();

        $send['colecoesByUser'] = $cole->colecoesByUser();
        $send['allCategorias'] = $categ->allCateg();
        //$_SESSION['user'] = $update;
                
        render("perfil", $send); 
    }

    function editProfile() {
        $model = new Usuario();
        $id = $_SESSION['user']['id'];
        $nome = isset($_POST["EditProfnome"]) ? $_POST["EditProfnome"] : "";
        $user = isset($_POST["EditProfuser"]) ? $_POST["EditProfuser"] : "";
        $email = isset($_POST["EditProfemail"]) ? $_POST["EditProfemail"] : "";
        
        $query = $model->editUser($id, $nome, $user, $email);
        redirect('perfil');
    }

    function newColecao(){
        $nome = isset($_POST["colecao_nome"]) ? $_POST["colecao_nome"] : "";

        $model = new Colecao();
        $upload = $model->createColecao($nome);
        redirect('perfil');
    }

    function deleteColecao($id){
        $model = new Colecao();
        $q = $model->deleteColecao($id);
        redirect('perfil');
    }
}
