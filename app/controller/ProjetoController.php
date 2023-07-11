<?php

use models\Usuario;

class ProjetoController{
    function index($id = null){
        $model = new Usuario;
        $send = [];
        $send = $model->findById($id);

        //print_r($send);
                
        render("projeto", $send); 
    }
}
