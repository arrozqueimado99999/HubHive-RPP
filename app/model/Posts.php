<?php

namespace models;

class Posts extends Model {
    protected $table = "posts";
    protected $fields = ["id","projeto_id","titulo","texto", "anexo"];

    function selectAll(){
        $sql = "SELECT * FROM posts";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                return $row;
    }

    function newPost(){
        $characters = '0123456789';
        $postId = '';
    
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $postId .= $characters[$randomIndex];
        }

        
    }
}
