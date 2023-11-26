<?php

use models\Artigos;
use models\Posts;
use models\Model;
use models\Usuario;

class ExplorarController{
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
        $user = new Usuario;
        $artigo = new Artigos;
        
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allEixo'] = $model->allEixo();
        $send['allArtigo'] = $artigo->allArtigos();
                
        render("explorar", $send); 
    }
}
