<?php

use models\Usuario;
use models\Projeto;
use models\Posts;

class FeedController{
    function index(){
        $send = [];
        $id = $_SESSION['id'];

        $model = new Usuario;
        $projects = new Projeto();

        $send = $model->findById($id);
        $allProj = $projects->projectsByUser($_SESSION['id']);

        $send['projetosByUser'] = $allProj;
                
        render("feed", $send); 
    }

    function newPost(){
        if(isset($_POST["projectToPost"]) && isset($_POST["legendaPost"])){
            $projectTo = $_POST["projectToPost"];
            $legenda =  $_POST["legendaPost"];
        }else{
            $projectTo = "";
            $legenda =  "";
        } 

        $model = new Posts();
        $upload = $model->newPost($projectTo, $legenda);

        redirect('feed');
    }
}
