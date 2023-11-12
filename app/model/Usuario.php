<?php

namespace models;

class Usuario extends Model {
    protected $table = "usuarios";
    protected $fields = ["id", "usuario", "nome","email","senha", "foto_perfil"];
                                
    ///////////////PARA PESQUISAS/////////////////////
    public function findbyUserandNome($u){
        $sql = "SELECT id, nome, usuario, foto_perfil FROM {$this->table} WHERE nome LIKE '%$u%' OR usuario LIKE '%$u%'";        

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
    ////////////////////////////////////////////////////

    public function findLogin($email, $senha){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE email = ? and senha = ?";        

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        unset ($row['senha']);

        if ($row != '') {
        return $row;
    } else {
        return '';
    }
    }

    function createUser($nome, $usuario, $email, $senha){
        $characters = '0123456789';
        $id = '';
    
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $id .= $characters[$randomIndex];
        }

        $sql = "INSERT INTO {$this->table} "
                ." (id, nome, usuario, email, senha) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $id, $nome, $usuario, $email, $senha);
        $stmt->execute();

        //cria um diretorio para cada usuario cadastrado
        $dirPath = 'app/users/' . $id;
        $dirProf = 'app/users/' . $id . "/profilePic";
        $dirCole = 'app/users/' . $id . "/UserPosts";
        $dirProj = 'app/users/' . $id . "/projectDocs";
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
            mkdir($dirProf, 0777, true);
            mkdir($dirCole, 0777, true);
            mkdir($dirProj, 0777, true);
        }
        
        if($stmt == false){
            redirect('login?new');
            return false;
        }else{
            redirect('login');
            return true;
        }
    }

    function editUser($id, $nome, $usuario, $email) {
        $sql = "UPDATE {$this->table} SET foto_perfil = ?  WHERE id = ? ";
        if (isset($_FILES['profileEditImg'])) {
            //print_r($_FILES);
            $arquivo = $_FILES['profileEditImg']['name'];
            $caminho = 'app/users/' . $id . '/' . 'profilePic/';
            $caminhoArquivo = $caminho . $arquivo;
            //print_r($caminhoArquivo);
            //die();

            if (move_uploaded_file($_FILES['profileEditImg']['tmp_name'], $caminhoArquivo)) {
                // Inserindo o caminho do arquivo no banco de dados
                $sql = "UPDATE usuarios SET foto_perfil = '$caminhoArquivo' WHERE id = $id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
            }
        }

        $sql = "UPDATE {$this->table} SET nome = ?, usuario = ?, email = ? WHERE id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nome, $usuario, $email, $id);
        $stmt->execute();

    
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    function findById($id){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE id = ? ";        

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        unset ($row['senha']);
        return $row;
    }
}

