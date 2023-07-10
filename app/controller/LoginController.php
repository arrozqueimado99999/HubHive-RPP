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
        $send['data'] = $result;
        $result = preg_replace('/\s*\[\s*["a-z]+\([0-9]+\)\]\s*/', '', print_r($send['data'], true));
    
        if($result != null){
            $_SESSION = $send['data'];
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

    /*
    function login(){
        $user = new Usuario;

        if(isset($_POST["email"]) && isset($_POST["senha"])){
            $email = $_POST["email"];
            $senha =  $_POST["senha"];

            if (isset($_SESSION['user'])){
                #se encontrar salva na sessao
                $send['data'] = $user->findLogin($email, $senha);
                render('feed', $send);
            } else {
                #caso contrario, manda para o login novamente
                render("login");
            }

        }
    }

    function sucess($email, $senha){

        $email = $_POST["email"];
        $senha =  $_POST["senha"];
        $user = $model->findLogin($email, $senha);
    
        if ($user != null){
            #se encontrar salva na sessao
            $_SESSION['user'] = $user;
            $send['user'] = $_SESSION['user'];
            render("feed", $send);
        } else {
            #caso contrario, manda para o login novamente
            $send = ["msg"=>"Login ou senha inválida"];
            render("login", $send);
        }
    }

    function create(){

        $model = new Usuario();
        $model->save($_POST["nome"], $_POST["email"],  $_POST["senha"]);
    }   */
}