<?php

use models\Artigos;
use models\Eixo;
use models\Posts;
use models\Model;
use models\Orientador;

class HomeController{
    function __construct()
    {
        if (!isset($_SESSION["user"])){
            redirect("access");
            die();
        }    
    }
    function index(){
        $send = [];
        $posts = new Posts;
        $model = new Model;
        $categ = new Eixo;
        $artigo = new Artigos;

        $send['allEixo'] =  $model->allEixo();          
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['artigosRecomend'] = $artigo->select3artigos();
                
        render("home", $send); 
    }
}
