<?php

namespace models;

use mysqli;

class Model {
    protected $conn;

    protected $table = null;
    protected $fields = [];
    protected $id;

    public function __construct() {

        $this->id = $_SESSION['user']['id'];

        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hubhive";

        $this->conn = new mysqli($server, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function projetosByUser() {
        $projeto = new Projeto();
        $projetos = $projeto->projectsByUser($this->id);
        return $projetos;
    }

    public function allCateg() {
        $categ = new Categorias();
        $categorias = $categ->allCateg();
        return $categorias;
    }

    public function colecoesByUser() {
        $cole = new Colecao();
        $colecoes = $cole->colecoesByUser($this->id);
        return $colecoes;
    }

    public function accessPost($postid) {
        $sql = "SELECT COUNT(posts.id)
        FROM posts
        INNER JOIN projetos ON posts.projeto_id = projetos.id
        INNER JOIN usuarios ON projetos.usuario_id = usuarios.id
        WHERE usuarios.id = ? AND posts.id = ?";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $this->id, $postid);
        $stmt->execute();
        $stmt->bind_result($count);
    
        $stmt->fetch();
    
        $stmt->close();
    
        if ($count > 0) {
            return Posts::ACCESS_TRUE;
        } else {
            return Posts::ACCESS_FALSE;
        }
    }
    
}
