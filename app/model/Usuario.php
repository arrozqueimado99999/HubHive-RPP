<?php

namespace models;

class Usuario extends Model {
    protected $table = "usuarios";
    protected $fields = ["id", "usuario", "nome","email","senha", "foto_perfil"];

    const COMUM_USER = 1;
    const ORIENT_USER = 5;

    public static $userTypes = [Usuario::COMUM_USER=>"Usuário comum",
                                Usuario::ORIENT_USER=>"Orientador"];
                                
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
        $sql = "INSERT INTO {$this->table} "
                ." (nome, usuario, email, senha) VALUES(?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $usuario, $email, $senha);
        $stmt->execute();

        //cria um diretorio para cada usuario cadastrado
        $dirPath = 'app/users/' . $usuario;
        $dirProf = 'app/users/' . $usuario . "/profilePic";
        $dirCole = 'app/users/' . $usuario . "/UserPosts";
        $dirProj = 'app/users/' . $usuario . "/projectDocs";
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

