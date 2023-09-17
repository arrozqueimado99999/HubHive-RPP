<?php

use models\Colecao;
use models\Posts;
use models\Projeto; 
use models\Usuario;

class ColecaoController{
    function index($colection = null){

        $send = [];
        $colecao = new Colecao;
        $posts = new Posts;
        $send = [];
        $send = $colecao->findById($colection);
        $send['colecoesByUser'] = $colecao->colecoesByUser($_SESSION['user']['id']);
        $send['postsByColecao'] = $posts->postsByColecao($colection);
        
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
