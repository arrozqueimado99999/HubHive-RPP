<?php

use models\Posts;
use models\Projeto;
use models\Usuario;

class ProjetoController{
    function index($project = null){
        $projeto = new Projeto;
        $posts = new Posts;
        $send = [];
        $send = $projeto->findById($project);
        $send['postsInfo'] = $posts->postsByProjectId($project);

        //print_r($send);
                
        render("projeto", $send); 
    }
}
