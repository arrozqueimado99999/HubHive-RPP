<?php

use models\Colecao;
use models\Posts;
use models\Projeto; 
use models\Usuario;

class ColecaoController{
    function index($colection = null){
        $projeto = new Projeto;
        $colecao = new Colecao;
        $posts = new Posts;
        $send = [];
        $send = $colecao->findById($colection);
        $send['postsByColecao'] = $posts->postsByColecao($colection);
        $send['projetosInColecao'] = $projeto->projectsByUser($_SESSION['user']['id']);
        
        //print_r($send);
        
        render("colecao", $send); 
    }
    
    function deleteColecao(){
        $colecao = new Colecao;

        $colection = $_GET['colection'];

        $deleteCole= $colecao->deleteColecao($colection);
        redirect("perfil"); 
    }


}
