<?php

use models\Posts;
use models\Model;
use models\Usuario;

class PesquisaController{
    function __construct()
    {
        if (!isset($_SESSION["user"])){
            redirect("access");
            die();
        }    
    }
    function index(){
        $q = $_GET['q'];
        $send = [];
        $posts = new Posts;
        $model = new Model;
        $user = new Usuario;
        
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allCateg'] = $model->allEixo();
        $send['search']  = $q;
        $send['postsByPesquisa'] = $posts->selectByPesquisa($q);

        if ($q !== null) {
            $findUser = $user->findbyUserandNome($q);

            if (!empty($findUser)) {
                $send['findUsers'] = $findUser;
            }
        }        

                
        render("pesquisa", $send); 
    }
}
