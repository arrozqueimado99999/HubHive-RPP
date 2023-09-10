<?php

use models\Orientador;
use models\Posts;
use models\Projeto; 
use models\Usuario;

class ProjetoController{
    function index($project = null){
        $projeto = new Projeto;
        $orient = new Orientador;
        $posts = new Posts;
        $send = [];
        $send = $projeto->findById($project);
        $send['projetosByUser'] = $projeto->projectsByUser($_SESSION['user']['id']);
        $send['postsInfo'] = $posts->postsByProjectId($project);

        if ($orient->orientByProjeto($project)){
            $send['orientador'] = $orient->orientByProjeto($project);
        }
        
        //print_r($send);
        
        render("projeto", $send); 
    }
    
    function deleteProjeto(){
        $projeto = new Projeto;

        $project = $_GET['project'];

        $deleteProj = $projeto->deleteProject($project);
        redirect("perfil"); 
    }


}
