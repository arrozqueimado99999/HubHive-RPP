<?php

use models\Posts;
use models\Model;
use models\Projeto;
use models\Usuario;

class PesquisaController{
    function index(){
        $q = $_GET['q'];
        $send = [];
        $posts = new Posts;
        $proj = new Projeto;
        $model = new Model;
        $user = new Usuario;
        
        $send['colecoesByUser'] = $model->colecoesByUser();
        $send['projetosByUser'] = $model->projetosByUser();
        $send['allPosts'] = $posts->allPosts();
        $send['allCateg'] = $model->allCateg();
        $send['search']  = $q;

        if ($q !== null) {
            $findProjTitulo = $proj->findbyTitulo($q);
            $findProjDesc = $proj->findbyDesc($q);
            $findUser = $user->findbyUserandNome($q);
        
            if (!empty($findProjTitulo)) {
                $send['findProjTitulo'] = $findProjTitulo;
            }
        
            if (!empty($findProjDesc)) {
                $send['findProjDesc'] = $findProjDesc;
            }

            if (!empty($findUser)) {
                $send['findUsers'] = $findUser;
            }
        }        

                
        render("pesquisa", $send); 
    }
}
