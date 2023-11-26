<?php

use models\Artigos;
use models\Colecao;
use models\Eixo;
use models\Model;
use models\Posts;
use models\Tag;

class PostController{
    function __construct()
    {
        if (!isset($_SESSION["user"])){
            redirect("access");
            die();
        }    
    }
    function index($post = null){
        
        $send = [];
        $colecao = new Colecao;
        $posts = new Posts;
        $model = new Model();        
        $tag = new Tag;        
        $eixo = new Eixo;

        if($posts->allForPost($post) == ""){
            redirect("nopost");
            die();           
        } 
        $send['colecoesByUser'] = $colecao->colecoesByUser($_SESSION['user']['id']);

        
        $accesspost = $model->accessPost($post);
        if ($accesspost == Posts::ACCESS_TRUE){
            $_SESSION['acesso'] = "0101_LIB";
        } else {
            $_SESSION['acesso'] = "1010_NLIB";            
        } 
        
        if($post != null){
            $send = $posts->allForPost($post);            
        }        

        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['allEixo'] =  $model->allEixo();   
        $send['allCole'] = $model->colecoesByUser(); 
        $send['securtiu'] = $posts->testSeCurtiu($post);
        $send['curtidas'] = $posts->countLikes($post);
        $send['allPosts'] = $posts->selectAllExcept($post);
        $send['eixoByPost'] = $eixo->eixoByPost($post);
        $send['tagsByPost'] = $tag->tagsByPost($post);

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
            $colecao = $_POST["projetotopost"];
            $eixo = $_POST["eixotopost"];
            $legenda =  $_POST["legendaPost"];
            $tags =  $_POST["tagsToPost"];
        }else{
            $colecao = "";
            $eixo = "";
            $legenda =  "";
            $tags =  "";
        } 

        //var_dump($_POST);
        //die();

        $model = new Posts();
        $cole = new Colecao();
        $postId = $model->createPost($legenda,$colecao, $eixo, $tags);

        redirect('post/?post=' . $postId);
    }

    function createArtigo(){
        if(isset($_POST["legendaArtigo"]) && isset($_POST["eixoToArtigo"])){
            $legenda =  $_POST["legendaArtigo"];
            $eixoToArtigo =  $_POST["eixoToArtigo"];
        }else{
            $legenda = "";
            $eixoToArtigo = "";
        } 

        $model = new Artigos();
        $artigoId = $model->createArtigo($legenda, $eixoToArtigo);

        redirect('home');
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

