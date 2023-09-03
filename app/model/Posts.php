<?php

namespace models;

class Posts extends Model {
    protected $table = "posts";
    protected $fields = ["id","projeto_id","titulo","texto", "anexo"];

    const ACCESS_TRUE = 8;
    const ACCESS_FALSE = 88;

    public static $access = [Posts::ACCESS_TRUE=>"0101_LIB",
                                Posts::ACCESS_FALSE=>"1010_NLIB"];

    function allPosts(){
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
        } else {
            return $dados[] = "";
        }
        
        return $dados;
    }

    function postsByColecao($idcolecao){
        $sql = "SELECT posts.*
        FROM posts
        JOIN colecoes_posts ON posts.id = colecoes_posts.post_id
        WHERE colecoes_posts.colecao_id = ?";
               
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idcolecao);
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
    }

    function selectAllExcept($id){
        $sql = "SELECT * FROM posts
        WHERE id <> $id;
        ";        
    
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
    }

    function projectsByPostId($id){
        $sql = "SELECT projetos.*
        FROM projetos
        JOIN posts ON projetos.id = posts.projeto_id
        WHERE posts.id = $id";    
    
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

    function postsBySecao($secaoid){
        $sql = "SELECT * FROM posts WHERE secao_id = $secaoid";    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->get_result();    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }                
        } else {
            return $dados[] = "";
        }
        
        return $dados;
    }

    function addLike($postid) {
        // Testa se o usuário já curtiu o post
        $usuario = $_SESSION['user']['id'];
        $sql = "SELECT * FROM curtidas WHERE usuario_id = ? AND post_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $usuario, $postid);
        $stmt->execute();
        
        $result = $stmt->get_result();
    
        if (mysqli_num_rows($result) == 0) {
            // Se o usuário não curtiu ainda, insere a curtida na tabela
            $sql = "INSERT INTO curtidas (usuario_id, post_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $usuario, $postid);
            $stmt->execute();
        } else {
            $sql = "DELETE FROM curtidas WHERE usuario_id = ? AND post_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $usuario, $postid);
            $stmt->execute();
        }
    }
    

    function countLikes($postid) {
        $sql = "SELECT COUNT(post_id) AS count_curtidas FROM curtidas  WHERE post_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$postid);      
        $stmt->execute();
    
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();        
        return $row['count_curtidas'];
    }
    
    function testSeCurtiu($postid){
        $sql = "SELECT * FROM curtidas  WHERE post_id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $user = $_SESSION['user']['id'];
        $stmt->bind_param("ii",$postid, $user);
        
        $stmt->execute();
        $result = $stmt->get_result();    

        if (mysqli_num_rows($result) > 0) {
            return 1;      
        } else {
            return 0;
        }
    }

    function testSeSalvou($projeto, $postid){
        $sql = "SELECT * FROM posts_externos WHERE peojwto_id = ? AND post_id = ?";
        $stmt = $this->conn->prepare($sql);
        $user = $_SESSION['user']['id'];
        $stmt->bind_param("ii",$projeto, $postid);
        
        $stmt->execute();
        $result = $stmt->get_result();    

        if (mysqli_num_rows($result) > 0) {
            return 1;      
        } else {
            return 0;
        }
    }

    function postsByProjectId($id){
        $sql = "SELECT posts.*
        FROM posts
        JOIN projetos ON posts.projeto_id = projetos.id
        WHERE posts.projeto_id = $id";    
    
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

    function allForPost($postId){
        $sql = "SELECT * FROM {$this->table} WHERE id = $postId";        
    
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
    }

    function createPost($projetoId, $legenda){
        $characters = '0123456789';
        $postId = '';
    
        for ($i = 0; $i < 5; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $postId .= $characters[$randomIndex];
        }

        $user = $_SESSION['user']['usuario'];
        $dirPath = 'app/users/' . $user . "/"."projectDocs/" . $projetoId ;

            if (isset($_FILES['postanexo'])) {
                $anexo = $_FILES['postanexo']['name'];
                $caminhoArquivo = $dirPath . "/". $anexo;
                
                if (move_uploaded_file($_FILES['postanexo']['tmp_name'], $caminhoArquivo)) {
                    $sql = "INSERT INTO posts (id, legenda, projeto_id, anexo)
                            VALUES (?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("isis", $postId, $legenda, $projetoId, $caminhoArquivo);
                    $stmt->execute();

                }
                return $postId;
            }        
    }

    function deletePost($postid){
        $sql = "DELETE FROM curtidas WHERE post_id = $postid"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM {$this->table} WHERE id = $postid"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
