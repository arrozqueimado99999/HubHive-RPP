<?php

use models\Usuario;

class FeedController{
    function index(){
        $id = $_SESSION['id'];

        $model = new Usuario;
        $send = [];
        $send = $model->findById($id);

        //print_r($send);
                
        render("feed", $send); 
    }

    function exit(){
        session_destroy();
        redirect("login");    
    }
}
