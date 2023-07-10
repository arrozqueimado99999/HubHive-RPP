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



        $userid = $_SESSION['id'];
        $user = $_SESSION['usuario'];
        $dirPath = 'app/users/' . $user . "/"."projectDocs/" . $projectId ;
        mkdir($dirPath, 0777, true);

            if (isset($_FILES['inputbanner'])) {
                $arquivo = $_FILES['inputbanner']['name'];
                $caminhoArquivo = $dirPath . "/". $arquivo;
                
                if (move_uploaded_file($_FILES['inputbanner']['tmp_name'], $caminhoArquivo)) {
                    $sql = "INSERT INTO projetos (id, titulo, descricao, categoria_id, usuario_id, banner)
                    VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("issiis", $projectId, $titulo, $descricao, $categ,  $userid, $caminhoArquivo);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        redirect('biblioteca');
                    } else {
                        redirect('feed');
                }

                }
            } else{
            echo ("fudeu");
            print_r($_FILES);
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

    /*function pag(){
        $regPag = 30; // Número de registros exibidos por página
        
        $totalRegistros = 100; // Número total de registros
        
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina); // Cálculo do número total de páginas
        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página atual obtida por meio de parâmetro GET
        $registroInicial = ($paginaAtual - 1) * $registrosPorPagina; // Registro inicial para a consulta
        $registroFinal = $registroInicial + $registrosPorPagina - 1; // Registro final para a consulta
        
        // Executar a consulta no banco de dados usando LIMIT para obter apenas os registros da página atual
        $sql = "SELECT * FROM usuarios LIMIT $registroInicial, $registrosPorPagina";
        $resultado = mysqli_query($sql);
    
        // Iterar sobre os resultados e exibir os registros
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Exibir os dados do registro
        }
    
        // Exibir os links de páginação
        for ($pagina = 1; $pagina <= $totalPaginas; $pagina++) {
            echo "<a href='?pagina=$pagina'>$pagina</a> ";
        }
    }*/
}

?>
