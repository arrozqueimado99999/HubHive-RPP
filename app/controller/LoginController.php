<?php


use models\Usuario;
use models\Orientador;

class LoginController{
    function index(){
        render("login");
    }

    function login(){
        $send = [];
        $model = new Usuario;
        $orient = new Orientador;
    
        if(isset($_POST["email"]) && isset($_POST["senha"])){
            $email = $_POST["email"];
            $senha =  $_POST["senha"];
        }else{
            $email = "";
            $senha =  "";
        }
        
        $result = $model->findLogin($email, hash('sha256', $senha));
        $send['user'] = $result;
        $orientador = $orient->seOrient($send['user']['id']);

        if ($orientador){
            $send['tipo'] = Usuario::ORIENT_USER;
        } else {
            $send['tipo'] = Usuario::COMUM_USER;
        }
    
        if($result != null){
            $_SESSION = $send;
            redirect("feed"); 
        } else {
            redirect("login");
        }
    }

    function create(){
        $send = [];
        $model = new Usuario;
    
        if (isset($_POST["senha"]) && isset($_POST["email"]) && isset($_POST["senha"])){
            $nome = $_POST["nome"];
            $usuario = $_POST["usuario"];
            $email = $_POST["email"];
            $senha =  $_POST["senha"];
        }else{
            $nome = "";
            $usuario = "";
            $email = "";
            $senha =  "";
        }

        $result = $model->createUser($nome, $usuario, $email, hash('sha256', $senha));
        $send['data'] = $result;  
        $result = preg_replace('/\s*\[\s*["a-z]+\([0-9]+\)\]\s*/', '', print_r($send['data'], true));
    
        if($result != null){
            $_SESSION = $send['data'];
            redirect("login"); 
        } else {
            redirect("login?new");
        }
    }
}