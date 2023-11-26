<?php

namespace models;

class Eixo extends Model {
    protected $table = "eixos";
    protected $fields = ["id","titulo","banner"];

    function allforEixo($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);  
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

    function allEixo() {
        $sql = "SELECT * FROM {$this->table}";        
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }
        }

        //print_r($dados);
        //die();
    
        return $dados;
    }

    function eixoByPost($postId) {
        $sql = "SELECT eixos.titulo
        FROM eixos
        JOIN post_eixo ON eixos.id = post_eixo.eixo_id WHERE post_eixo.post_id = ?";
               
    
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

    function postsByEixo($eixoId) {
        $sql = "SELECT posts.*
        FROM posts
        JOIN post_eixo ON posts.id = post_eixo.post_id WHERE post_eixo.eixo_id = ?";
               
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $eixoId);  
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

    function savePostInEixo($eixoid, $postid){
        $sql = "INSERT INTO post_eixo (eixo_id, post_id)
        VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $eixoid, $postid);
        $stmt->execute();
    }

}