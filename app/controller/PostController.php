<?php

use models\Colecao;
use models\Model;
use models\Posts;

class PostController{
    function index($post = null){
        $send = [];
        
        $model = new Model();        
        $posts = new Posts();
        
        $accesspost = $model->accessPost($post);
        if ($accesspost == Posts::ACCESS_TRUE){
            $_SESSION['acesso'] = "0101_LIB";
        } else {
            $_SESSION['acesso'] = "1010_NLIB";            
        }        
        
        if($post != null){
            $send = $posts->allForPost($post);            
            $send['projectByPost'] = $posts->projectsByPostId($post);
        }        

        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['projetosByUser'] = $model->projetosByUser();
        $send['allCateg'] = $model->allCateg(); 
        $send['allCole'] = $model->colecoesByUser(); 
        $send['securtiu'] = $posts->testSeCurtiu($post);
        $send['curtidas'] = $posts->countLikes($post);
        $send['allPosts'] = $posts->selectAllExcept($post);

        render("post", $send); 
    }

    function like(){
        $postid = $_GET['post'];
        $posts = new Posts();
        $likes = $posts->addLike($postid);
        redirect('post/?post=' . $postid);
    }

    function createPost(){
        if(isset($_POST["projetotopost"]) && isset($_POST["legendaPost"])){
            $projeto = $_POST["projetotopost"];
            $legenda =  $_POST["legendaPost"];
        }else{
            $projeto = "";
            $legenda =  "";
        } 

        $model = new Posts();
        $postId = $model->createPost($projeto, $legenda);

        redirect('post/?post=' . $postId);
    }

    function deletePost(){
        $postid = $_GET['post'];
        $posts = new Posts();
        $posts->deletePost($postid);
        redirect('home');
    }

    function saveinColecao(){
        $colecao = new Colecao;
        if(isset($_POST["colecaoToSave"]) && isset($_POST["postToSave"])){
            $cole = $_POST["colecaoToSave"];
            $topost = $_POST["postToSave"];
        }else{
            $cole = "";
            $topost = "";
        } 

        $colecao->savePostInColecao($cole, $topost);
        
        redirect("home");
        //redirect("post/?post=". $topost);
    }
}

