<?php

require './models/database.php';

Class Usuario{
    private $conexao;

    public function __construct(){
        $this->conexao = new Database;
    }

    public function queryOne(array $parameters = []){
        $resultado = $this->conexao->executeQuery("SELECT * FROM usuarios WHERE idUsuario = :idUsuario", $parameters);
        $dados = $resultado->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function atualizaCadastro(array $parameters = [], array $FILE = []){
        //Cria as variaveis de configuração e validação
        $_UP["pasta"] = 'photos/';
        $_UP["tamanho"] = 1024 * 1024 * 2; 
        $_UP["extensoes"] = array('jpeg','jpg','png','gif');
        $_UP["renomeia"] = false;
        $_UP["erros"][0] = "Não houve erro";
        $_UP["erros"][1] = "O arquivo no upload é maior do que o limite do PHP"; 
        $_UP["erros"][2] = "O arquivo ultrapassa o limite de tamanho especificado no HTML"; 
        $_UP["erros"][3] = "O upload do arquivo foi feito parcialmente"; 
        $_UP["erros"][4] = "Não foi feito o upload do arquivo";
    
        if ($FILE["fotoUsuario"]["error"] != 0) {
            die("Não foi possivel fazer o upload,erro: ".$_UP["erros"][$FILE["fotoUsuario"]["error"]]);
            exit;
        }
        $ext = explode('.', $FILE["fotoUsuario"]["name"]);
        $exten = end($ext);
        $extensao = strtolower($exten);/*vai deixar a "exten" minusculo*/
        if (array_search($extensao, $_UP["extensoes"]) === false) {
            echo "Por Favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
            exit;
        }
        if ($_UP["tamanho"] < $FILE["fotoUsuario"]["size"]) {
            echo "O arquivo enviado é muito grande, envie arquivos de até 2 MB";
            exit;
        }
        //renomeia a imagem
        if ($_UP["renomeia"] == true) {
            $fotoUsuario = time().'.jpg';
        }else{
            $fotoUsuario = $FILE["fotoUsuario"]["name"];
        }
        if (move_uploaded_file($FILE["fotoUsuario"]["tmp_name"],$_UP["pasta"].$fotoUsuario)) {
            $parameters[':fotoUsuario'] = $fotoUsuario; 
            $sql = "UPDATE usuarios SET nomeUsuario = :nomeUsuario, fotoUsuario = :fotoUsuario, emailUsuario = :emailUsuario, senhaUsuario = :senhaUsuario WHERE idUsuario = 1";
            $resultado = $this->conexao->executeQuery($sql, $parameters);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            
        }else{
            echo "Não foi possivel enviar o arquivo, tente novamente";
        }
        
    }

}