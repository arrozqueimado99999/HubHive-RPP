<?php

namespace models;

class Colecao extends Model {
    protected $table = "colecoes";
    protected $fields = ["id","nome","email","senha"];

    function findById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->get_result();    
        $dados = array();
        
        if (mysqli_num_rows($result) > 0) {
            // Loop para percorrer os resultados e armazenar os valores em um array
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }                
        } else {
            return $dados[] = "";
        }
        
        return $dados;
        //print_r($dados);
        //die();

    }

    function savePostInColecao($colecaoid, $postid){
        $sql = "INSERT INTO post_colecao (colecao_id, post_id)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $colecaoid, $postid);
        $stmt->execute();
    }

    function createColecao($nome){
        $date = now();
        $iduser = $_SESSION['user']['id'];

        $characters = '0123456789';
        $colecaoId = '';
    
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $colecaoId .= $characters[$randomIndex];
        }

        $sql = "INSERT INTO colecoes (id, nome, data_criacao, usuario_id)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issi", $colecaoId, $nome, $date, $iduser);
        $stmt->execute();
    }

    function deleteColecao($id){
        $iduser = $_SESSION['user']['id'];

        $sql = "DELETE FROM colecoes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    
    function colecoesByUser(){
        $post = new Posts;
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM {$this->table} WHERE usuario_id = $id";        
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->get_result();    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            // Loop para percorrer os resultados e armazenar os valores em um array
            while ($linha = mysqli_fetch_assoc($result)) {
                $id = $linha['id'];
                $linha['postsInColecao'] = $post->selecttocolecaodiv($id);
                $dados[] = $linha;
            }         
        } else {
            return [];
        }
    
        return $dados;
    }    
}
