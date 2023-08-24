<?php

namespace models;

use mysqli;

class Model{
    protected $conn;

    protected $table = null;
    protected $fields = [];
    
    public function __construct() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hubhive";

        global $conn;
        $conn = new mysqli($server, $username, $password, $dbname);
        $this->conn = $conn;

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }      
    }

    public function acessPost($id, $postid){
        $sql = "SELECT posts.*
        FROM posts
        INNER JOIN projetos ON posts.projeto_id = projetos.id
        INNER JOIN usuarios ON projetos.usuario_id = usuarios.id
        WHERE usuarios.id = ? AND posts.id = ?"; 

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $id, $postid);
        $stmt->execute();

        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;


            if ($result > 0){
                return "arroz";
            } else {
                return "nadacomnada";
            }
    }
}