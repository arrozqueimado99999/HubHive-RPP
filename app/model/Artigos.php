<?php

namespace models;

class Artigos extends Model {
    protected $table = "artigos";
    protected $fields = ["id","titulo","usuario_id","eixo_id","anexo"];

    function allArtigos(){
        $sql = "SELECT * FROM {$this->table}";        
    
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

    function artigosByEixo($ideixo){
        $sql = "SELECT * FROM artigos WHERE eixo_id = ?";              
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ideixo);
        $stmt->execute();
    
        $result = $stmt->get_result();    
        $dados = array();
    
        if (mysqli_num_rows($result) > 0) {
            // Loop para percorrer os resultados e armazenar os valores em um array
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }                
        } else {
            $dados[] = "";
        }
        
        return $dados;
    }

    function select3artigos(){
        $sql = "SELECT * FROM artigos ORDER BY RAND() LIMIT 3";              
    
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
            $dados;
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
        //$sql = "SELECT anexo FROM posts WHERE id = ? ORDER BY RAND() LIMIT 3";          
    
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

    function createArtigo($legenda = null, $eixoId){
        $midia = new Midia;
        $characters = '0123456789';
        $artigoId = '';

        for ($i = 0; $i < 5; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $artigoId .= $characters[$randomIndex];
        }

        $dirPath = 'app/artigos/' . $artigoId;
        mkdir($dirPath, 0777, true);

        if (isset($_FILES['artigoInput'])) {
            $anexo = $_FILES['artigoInput']['name'];
            $caminhoArquivo = $dirPath . "/" . $anexo;

            if (move_uploaded_file($_FILES['artigoInput']['tmp_name'], $caminhoArquivo)) {
                $sql = "INSERT INTO artigos (id, legenda, anexo, eixo_id)
                        VALUES (?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("issi", $artigoId, $legenda, $caminhoArquivo, $eixoId);
                $stmt->execute();

            }
        }

        return $artigoId;
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
