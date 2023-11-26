<?php

use models\Eixo;

class EixoController{
    function __construct()
    {
        if (!isset($_SESSION["user"])){
            redirect("access");
            die();
        }    
    }
    function index($eixo = null){

        $send = [];
        $eixos = new Eixo;
        $send['allEixo'] = $eixos->allEixo($eixo);
        $send['eixoinfo'] = $eixos->allforEixo($eixo);
        $send['postsByEixo'] = $eixos->postsByEixo($eixo);
        
        //print_r($send);
        
        render("eixo", $send); 
    }

}
