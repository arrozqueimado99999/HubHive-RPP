<?php

use models\Categorias;
use models\Colecao;
use models\Usuario;
use models\Projeto;
use models\Midia;
use models\Model;
use models\Posts;

class PostController{
    function index($post = null){
        $send = [];
        $allPost = null;
        $id = $_SESSION['user']['id'];

        $posts = new Posts();
        $model = new Model();
        $cole = new Colecao();
        $acesspost = $model->acessPost($id, $post);
        if ($acesspost == "arroz"){
            $_SESSION['acesso'] = "sim";
        } else {
            $_SESSION['acesso'] = "não";            
        }
        $count = $posts->countLikes($post);
        //print_r($r);
        //die();
        
        if($post != null){
            $send = $posts->allForPost($post);            
            $send['projectByPost'] = $posts->projectsByPostId($post);
        }

        $securtiu = $posts->testSeCurtiu($post);
        $allPosts = $posts->selectAllExcept($post);
        $allCole = $cole->colecoesByUser($id);
        $send['securtiu'] = $securtiu;
        $send['allPosts'] = $allPosts;
        $send['curtidas'] = $count;
        $send['colecao'] = $allCole;

        //var_dump($send[0]);
        //die();
                
        render("post", $send); 
    }

    function like(){
        $postid = $_GET['post'];
        $posts = new Posts();
        $likes = $posts->addLike($postid);
        redirect('post/?post=' . $postid);
    }

    function deletePost(){
        $postid = $_GET['post'];
        $posts = new Posts();
        $deletepost = $posts->deletePost($postid);
        redirect('home');
    }

    function saveinColecao($post = null){
        $colecaoid = $_POST['colecaoid'];

        
    }
}

