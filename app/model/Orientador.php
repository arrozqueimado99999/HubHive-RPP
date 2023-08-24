<?php

namespace models;

class Orientador extends Model {
    protected $table = "orientadores";
    protected $fields = ["id", "usuario_id"];                                

    function seOrient($usuario_id) {
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
}

