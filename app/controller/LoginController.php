<?php


use models\Usuario;

class LoginController{
    function index(){
        render("login");
    }

    function login(){
        $send = [];
        $model = new Usuario;
    
        if(isset($_POST["email"]) && isset($_POST["senha"])){
            $email = $_POST["email"];
            $senha =  $_POST["senha"];
        }else{
            $email = "";
            $senha =  "";
        }
        
        $result = $model->findLogin($email, hash('sha256', $senha));
        $send['user'] = $result;
        
        if($result != null){
            session_start();
            $_SESSION = $send;
            redirect("home"); 
        } else {
            $send = ["msg"=>"Login ou senha incorretos"];
            render("login", $send);
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

    function exit(){
        session_destroy();
        redirect("login");    
    }
}