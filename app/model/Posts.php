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

    function newPost($projectId, $legenda){
        $characters = '0123456789';
        $postId = '';
    
        for ($i = 0; $i < 5; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $postId .= $characters[$randomIndex];
        }

        $user = $_SESSION['usuario'];
        $dirPath = 'app/users/' . $user . "/"."projectDocs/" . $projectId ;

            if (isset($_FILES['postAnexo'])) {
                $anexo = $_FILES['postAnexo']['name'];
                $caminhoArquivo = $dirPath . "/". $anexo;
                
                if (move_uploaded_file($_FILES['postAnexo']['tmp_name'], $caminhoArquivo)) {
                    $sql = "INSERT INTO posts (id, projeto_id, legenda, anexo)
                    VALUES (?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("iiss", $postId, $projectId, $legenda, $anexo);
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
