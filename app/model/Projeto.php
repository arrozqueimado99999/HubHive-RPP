<?php

namespace models;

class Projeto extends Model {
    protected $table = "projetos";
    protected $fields = ["id","nome","email","senha"];

    function random(){
        $sql = "SELECT *;
        FROM {$this->table}
        ORDER BY RAND()
        LIMIT 1;";

    }

    function createProject($titulo, $descricao, $categ){ 
        //gera uma id aleatoria pra o projeto  
        $characters = '0123456789';
        $projectId = '';
    
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $projectId .= $characters[$randomIndex];
        }

        //__________________________________________________
        $date = now();
        $titulo = ucfirst($titulo);
        //__________________________________________________

        $userid = $_SESSION['id'];
        $user = $_SESSION['usuario'];
        $dirPath = 'app/users/' . $user . "/"."projectDocs/" . $projectId ;
        mkdir($dirPath, 0777, true);

            if ($_FILES['inputbanner']['full_path'] !== "") {
                $arquivo = $_FILES['inputbanner']['name'];
                $caminhoArquivo = $dirPath . "/". $arquivo;
                
                if (move_uploaded_file($_FILES['inputbanner']['tmp_name'], $caminhoArquivo)) {
                    $sql = "INSERT INTO projetos (id, titulo, descricao, categoria_id, usuario_id, banner, data_postagem)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("issiiss", $projectId, $titulo, $descricao, $categ,  $userid, $caminhoArquivo, $date);
                    $stmt->execute();
                }

            } elseif ($_FILES['inputbanner']['full_path'] == ""){
            
            $arquivo = array('fundo1.jpg', 'fundo2.jpg','fundo3.jpg');
            $rand = array_rand($arquivo);
            $tt = $arquivo[$rand];
            $caminhoArquivo = "public/imgs/". $tt;

                $sql = "INSERT INTO projetos (id, titulo, descricao, categoria_id, usuario_id, banner, data_postagem)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("issiiss", $projectId, $titulo, $descricao, $categ,  $userid, $caminhoArquivo, $date);
                $stmt->execute();
        }
    } 

    function deleteProject($id){
        $sqlPosts = "DELETE posts FROM posts
             JOIN projetos ON posts.projeto_id = projetos.id
             WHERE posts.projeto_id = ?";

        $stmt1 = $this->conn->prepare($sqlPosts);
        $stmt1->bind_param("i", $id);
        $stmt1->execute();

        $sqlProject = "DELETE FROM projetos WHERE id = ?";
        $stmt2 = $this->conn->prepare($sqlProject);
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        
        $user = $_SESSION['usuario'];
        $dirPath = 'app/users/' . $user . "/projectDocs/" . $id;

        if (is_dir($dirPath)) {    
        // Apaga todos os arquivos e subdiretórios do diretório
        $files = glob($dirPath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        rmdir($dirPath);
    }
        
        
        if ($stmt1->affected_rows > 0 && $stmt2->affected_rows > 0) {
            redirect('biblioteca');
        } else {
            redirect('feed');
        }
    }
    
    function projectsByUser($id){
        $sql = "SELECT * FROM {$this->table} WHERE usuario_id = $id";        
        
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

    function projectsByOrient($id){
        $sql = "SELECT projetos.*
        FROM projetos
        INNER JOIN orientadores ON projetos.orient_id = orientadores.id
        INNER JOIN usuarios ON orientadores.usuario_id = usuarios.id
        WHERE usuarios.id = ?";               

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

    function findById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";        
        
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
    
    function deleteDirectory($id) {
        // Obtém o nome do usuário a partir da sessão ou de outra fonte confiável
        $user = $_SESSION['usuario'];
    
        // Define o caminho do diretório a ser apagado
        $dirPath = 'app/users/' . $user . '/projectDocs/' . $id;
    
        if (!is_dir($dirPath)) {
            return false; // Verifica se o diretório é válido
        }
    
        // Apaga todos os arquivos e subdiretórios do diretório
        $files = glob($dirPath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } elseif (is_dir($file)) {
                rmdir($file); // Chamada corrigida aqui
            }
        }
    
        // Remove o diretório principal
        return rmdir($dirPath);
    }       
}
?>
