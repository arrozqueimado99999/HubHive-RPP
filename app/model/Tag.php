<?php

namespace models;

class Tag extends Model {
    protected $table = "tags";
    protected $fields = ["id","titulo"];

    function allTag() {
        $sql = "SELECT * FROM {$this->table}";        
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            // Loop para percorrer os resultados e armazenar os valores em um array
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }
        }

        //print_r($dados);
        //die();
    
        return $dados;
    }

    function tagsByPost($postId) {
        $sql = "SELECT tags.titulo
        FROM tags
        JOIN post_tag ON tags.id = post_tag.tag_id WHERE post_tag.post_id = ?";
               
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $postId);  
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }
        }
    
        return $dados;
    }

    function stringToArray($inputString) {
        $inputString = trim($inputString);
        $parts = explode(', ', $inputString);
        return $parts;
    }

    function createTag($titulo){
        $characters = '0123456789';
        $tagId = '';
    
        for ($i = 0; $i < 4; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $tagId .= $characters[$randomIndex];
        }

        $sql = "INSERT INTO tags (id, titulo)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $tagId, $titulo);
        $stmt->execute();

        return $tagId;
    }

    function saveTagIntoPost($tagId, $postid){
        $sql = "INSERT INTO post_tag (post_id, tag_id)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $postid, $tagId);
        $stmt->execute();

    }

}