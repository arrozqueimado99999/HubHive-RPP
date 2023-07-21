<?php

use models\Categorias;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Posts;

class PostController{
    function index($post = null){
        $send = [];
        $allPost = null;

        $posts = new Posts();
        
        if($post != null){
            $send = $posts->allForPost($post);
            $send['projectByPost'] = $posts->projectsByPostId($post);
        }

        $allPosts = $posts->selectAllExcept($post);
        $send['allPosts'] = $allPosts;

        //var_dump($send[0]);
        //die();
                
        render("post", $send); 
    }
}
