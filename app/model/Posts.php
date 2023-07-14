<?php

namespace models;

class Posts extends Model {
    protected $table = "posts";
    protected $fields = ["id","projeto_id","titulo","texto", "anexo"];

    function selectAll(){
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

    function newPost($projectId, $legenda){
        $characters = '0123456789';
        $postId = '';
    
        for ($i = 0; $i < 5; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $postId .= $characters[$randomIndex];
        }

        $user = $_SESSION['usuario'];
        $dirPath = 'app/users/' . $user . "/"."projectDocs/" . $projectId ;

            if (isset($_FILES['postanexo'])) {
                $anexo = $_FILES['postanexo']['name'];
                $caminhoArquivo = $dirPath . "/". $anexo;
                
                if (move_uploaded_file($_FILES['postanexo']['tmp_name'], $caminhoArquivo)) {
                    $sql = "INSERT INTO posts (id, projeto_id, legenda, anexo)
                    VALUES (?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("iiss", $postId, $projectId, $legenda, $caminhoArquivo);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        redirect('feed');
                    } else {
                        redirect('biblio');
                }

                }
            } else{
            echo ("fudeu");
            print_r($_FILES);
        }

        
    }
}
