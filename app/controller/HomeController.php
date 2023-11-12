<?php

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

        $send['allCategorias'] =  $categ->allCateg();          
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allCateg'] = $model->allCateg();
                
        render("home", $send); 
    }
}
