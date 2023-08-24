<?php

use models\Posts;
use models\Projeto;
use models\Secao;
use models\Usuario;

class ProjetoController{
    function index($project = null){
        $projeto = new Projeto;
        $posts = new Posts;
        $send = [];
        $send = $projeto->findById($project);
        $send['projetosByUser'] = $projeto->projectsByUser($_SESSION['user']['id']);
        $send['postsInfo'] = $posts->postsByProjectId($project);
        
        //print_r($send);
        
        render("projeto", $send); 
    }
    
    function deleteProjeto(){
        $projeto = new Projeto;

        $deleteProj = $projeto->deleteProject($_GET['project']);
        redirect("biblioteca"); 
    }


}
