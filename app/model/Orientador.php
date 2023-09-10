<?php

namespace models;

class Orientador extends Model
{
    protected $table = "orientadores";
    protected $fields = ["id", "usuario_id"];

    function seOrient($usuario_id)
    {
        $sql = "SELECT * FROM orientadores "
            . "WHERE usuario_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function allOrient(){
        $sql = "SELECT * FROM usuarios INNER JOIN orientadores ON usuarios.id = orientadores.usuario_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $dados = array();

        if ($result->num_rows > 0) {
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }
        } else {
            return $dados[] = "";
        }

        return $dados;
    }

    function orientByProjeto($projetoid){
        $sql = "SELECT usuarios.id, usuarios.nome, usuarios.foto_perfil
        FROM usuarios
        JOIN orientadores ON usuarios.id = orientadores.usuario_id
        JOIN projetos ON orientadores.id = projetos.orient_id
        WHERE projetos.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $projetoid);
        $stmt->execute();

        $result = $stmt->get_result();
        $dados = array();

        if ($result->num_rows > 0) {
            while ($linha = mysqli_fetch_assoc($result)) {
                $dados[] = $linha;
            }
        } else {
            return $dados[] = "";
        }

        return $dados;
    }
}
