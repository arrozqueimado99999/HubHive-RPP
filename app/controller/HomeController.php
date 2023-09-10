<?php

use models\Categorias;
use models\Posts;
use models\Model;
use models\Orientador;

class HomeController{
    function index(){
        $send = [];
        $posts = new Posts;
        $model = new Model;
        $orient = new Orientador;
        $categ = new Categorias;

        $send['allOrient'] =  $orient->allOrient();
        $send['allCategorias'] =  $categ->allCateg();          
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['projetosByUser'] = $model->projetosByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allCateg'] = $model->allCateg();
                
        render("home", $send); 
    }
}
