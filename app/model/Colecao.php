<?php

namespace models;

class Colecao extends Model {
    protected $table = "colecoes";
    protected $fields = ["id","nome","email","senha"];

    function savePostInColecao($colecaoid, $postid){
        $sql = "INSERT INTO colecao_post (colecao_id, post_id)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $colecaoid, $postid);
        $stmt->execute();
    }
    
    function colecoesByUser($id){
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
