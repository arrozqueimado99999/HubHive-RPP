<?php

use models\Posts;
use models\Model;

class HomeController{
    function index(){
        $send = [];
        $posts = new Posts;
        $model = new Model;
        
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['projetosByUser'] = $model->projetosByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allCateg'] = $model->allCateg();
                
        render("home", $send); 
    }
}
