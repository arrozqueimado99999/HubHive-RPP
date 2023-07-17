<?php

namespace models;

class Categorias extends Model {
    protected $table = "categorias";
    protected $fields = ["id","titulo"];

    function allCateg() {
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
        }

        //print_r($dados);
        //die();
    
        return $dados;
    }   

}