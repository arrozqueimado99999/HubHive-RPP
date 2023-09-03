<?php

use models\Usuario;
use models\Projeto;
use models\Posts;
use models\Categorias;
use models\Colecao;

class MainController{
    protected $id = $_SESSION['user']['id'];

    function index(){
        $send = [];

        $model = new Usuario;
                
        render("home"); 
    }

    function allCateg(){
        $categ = new Categorias;
        $categorias = $categ->allCateg();

        return $categorias;
    }

    function projectsByUser(){
        $proj = new Projeto;
        $projetos = $proj->projectsByUser($this->id);

        return $projetos;
    }

    function colecoesByUser(){
        $cole = new Colecao;
        $colecoes = $cole->colecoesByUser($this->id);

        return $colecoes;
    }

    


}
