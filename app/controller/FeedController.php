<?php

use models\Usuario;
use models\Projeto;
use models\Posts;
use models\Categorias;

class FeedController{
    function index(){
        $send = [];
        $id = $_SESSION['user']['id'];

        $model = new Usuario;
        $projects = new Projeto();
        $posts = new Posts();
        $categ = new Categorias();

        $send = $model->findById($id);
        $allProj = $projects->projectsByUser($id);
        $allPosts = $posts->selectAll();
        $allCateg = $categ->allCateg();
        

        $send['projetosByUser'] = $allProj;
        $send['allPosts'] = $allPosts;
        $send['allCateg'] = $allCateg;
                
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
        //var_dump($upload);
        //die();

        redirect('feed');
    }

    function exit(){
        session_destroy();
        redirect("login");    
    }
}
