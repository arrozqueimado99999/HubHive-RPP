<?php

use models\Usuario;
use models\Categorias;
use models\Colecao;
use models\Eixo;

class MainController{
    protected $id = $_SESSION['user']['id'];

    function index(){
        $send = [];

        $model = new Usuario;
                
        render("home"); 
    }

    function allCateg(){
        $categ = new Eixo;
        $categorias = $categ->allCateg();

        return $categorias;
    }

    function colecoesByUser(){
        $cole = new Colecao;
        $colecoes = $cole->colecoesByUser($this->id);

        return $colecoes;
    }
}
