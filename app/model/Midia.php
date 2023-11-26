<?php

namespace models;

//phpinfo();

class Midia extends Model
{

    function profilePic($id)
    {
        $model = new Usuario;
        $usuario = $model->findById($id);
        $usuario = $usuario['usuario'];

        if (isset($_FILES['file'])) {
            //print_r($_FILES);
            $arquivo = $_FILES['file']['name'];
            $caminho = 'app/users/' . $usuario . '/' . 'profilePic/';
            $caminhoArquivo = $caminho . $arquivo;
            //print_r($caminhoArquivo);
            //die();

            if (move_uploaded_file($_FILES['file']['tmp_name'], $caminhoArquivo)) {
                // Inserindo o caminho do arquivo no banco de dados
                $sql = "UPDATE usuarios SET foto_perfil = '$caminhoArquivo' WHERE id = $id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    redirect('biblioteca');
                } else {
                    redirect('feed');
                }

                return $caminhoArquivo;
            }
        } else {
            echo 'erro';
        }
    }

    function setDefaultProfilePic($id)
    {
        $sql = "UPDATE usuarios SET foto_perfil = DEFAULT WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    
    function convertPDFtoImage($pdfPath, $outputImagePath){
        try {
            if (!file_exists($pdfPath)) {
                throw new Exception('O arquivo PDF não existe.');
            }
    
            $imagick = new \Imagick();
    
            $imagick->setResolution(300, 300);
    
            $imagick->readImage($pdfPath);
    
            $imagick = $imagick->flattenImages();
    
            $imagick->setImageFormat('png');
    
            $imagick->writeImage($outputImagePath);
    
            $imagick->clear();
            $imagick->destroy();
    
            return ('Conversão bem-sucedida!');
        } catch (\ImagickException $e) {
            echo 'Erro ao escrever a imagem: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }


}
