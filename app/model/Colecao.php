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
        $sql = "INSERT INTO colecoes_posts (colecao_id, post_id)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $colecaoid, $postid);
        $stmt->execute();
    }

    function createColecao($nome){
        $date = now();
        $iduser = $_SESSION['user']['id'];
        $user = $_SESSION['user']['usuario'];

        $characters = '0123456789';
        $colecaoId = '';
    
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $colecaoId .= $characters[$randomIndex];
        }

        $dirPath = 'app/users/' . $user . "/"."colecaoDocs/" . $colecaoId ;
        mkdir($dirPath, 0777, true);

        $sql = "INSERT INTO colecoes (id, nome, data_criacao, usuario_id)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issi", $colecaoId, $nome, $date, $iduser);
        $stmt->execute();
    }

    function deleteColecao($nome){
        $date = now();
        $iduser = $_SESSION['user']['id'];

        $sql = "DELETE FROM colecoes (nome, data_criacao, usuario_id)
        VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $date, $iduser);
        $stmt->execute();
    }
    
    function colecoesByUser(){
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM {$this->table} WHERE usuario_id = $id";        
        
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
}
