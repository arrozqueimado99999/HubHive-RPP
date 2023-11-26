<?php

namespace models;

class Posts extends Model {
    protected $table = "posts";
    protected $fields = ["id","usuario_id","colecao_id","titulo","texto", "anexo"];

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

    function postsByUser($iduser){
        $sql = "SELECT * FROM posts
        WHERE usuario_id = ?";
               
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $iduser);
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
        JOIN post_colecao ON posts.id = post_colecao.post_id
        WHERE post_colecao.colecao_id = ?";
               
    
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

    function selectPostsByTag($q){
        $sql = "SELECT *
        FROM posts JOIN post_tag JOIN
        post_tag.post_id = tags.id";               
    
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

    function selectByPesquisa($q){
        $sql = "SELECT *
        FROM posts
        WHERE CONCAT(legenda, anexo) LIKE '%$q%'";                
    
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

    function selecttocolecaodiv($id){
        $sql = "SELECT p.anexo
        FROM posts AS p
        JOIN post_colecao AS pc ON p.id = pc.post_id
        WHERE pc.colecao_id = ?
        ORDER BY p.id DESC
        LIMIT 3";          
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
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

    function countPostsInEixo($eixoId) {
        $sql = "SELECT COUNT(post_id) AS count_posts FROM post_eixo WHERE eixo_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$eixoId);      
        $stmt->execute();
    
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();        
        return $row['count_posts'];
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

    function createPost($legenda = null, $colecaoid, $eixoid, $tags){
        $userId = $_SESSION['user']['id'];
        $characters = '0123456789';
        $postId = '';
    
        for ($i = 0; $i < 5; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $postId .= $characters[$randomIndex];
        }
    
        $dirPath = 'app/users/' . $userId . "/"."UserPosts";
    
        if (isset($_FILES['postanexo'])) {
            $anexo = $_FILES['postanexo']['name'];
            $caminhoArquivo = $dirPath . "/". $anexo;
    
            if (move_uploaded_file($_FILES['postanexo']['tmp_name'], $caminhoArquivo)) {            
                $sql = "INSERT INTO posts (id, legenda, usuario_id, anexo)
                        VALUES (?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("isis", $postId, $legenda, $userId, $caminhoArquivo);
                $stmt->execute();                
            }
        }
        
        if ($colecaoid !== "") {
            $colecao = new Colecao();
            $colecao->savePostInColecao($colecaoid, $postId);
        }

        if ($eixoid !== "") {
            $eixo = new Eixo();
            $eixo->savePostInEixo($eixoid, $postId);
        }

        if ($tags !== "") {
            $tag = new Tag();
            $parts = $tag->stringToArray($tags);
        
            foreach ($parts as $part) {
                $newtagid = $tag->createTag($part);
                $tag->saveTagIntoPost($newtagid, $postId);
            }
        }        

        return $postId;
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
