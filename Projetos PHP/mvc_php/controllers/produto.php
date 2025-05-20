<?php
$subRota = $caminho[1] ?? null; 

switch($subRota){
    case '':
        require_once './models/produto.php';
        $produto = new Produto;
        $dados = $produto->queryAll();
        require './views/produtos/consultaProdutos.php';
        break;
    
    case 'cadastro':
        require './models/produto.php';
        $produto = new Produto;
        $dados = $produto->queryAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            if (!empty($nomeProduto) && !empty($precoProduto) && !empty($estoqueProduto)) {
                $produto->inserirProduto([':nomeProduto' => $nomeProduto, ':precoProduto' => $precoProduto, ':estoqueProduto' => $estoqueProduto]);
                header("Location: /mvc_php/produto");
                exit;
            } else {
                $erro = "Preencha todos os campos.";
            }
        }

        require './views/produtos/cadastroProduto.php';
        break;

        case 'delete':
            echo "eae";
    
    
            if (preg_match('/^([0-9]+)$/', $caminho[2], $matches)) {
                $id = $matches[0];
                echo "ola";
                require './models/produto.php';
                $produto = new Produto;
                $produto->excluirProduto([':idProduto' => $id]);
                
    
                header("Location: /mvc_php/produto");
                exit;
            }
    
            
    
        default:
        if(preg_match('/^produto\/([0-9]+)$/', $url, $matches)) {
            $id = $matches[1];
    
            require './models/produto.php';
            $produto = new Produto;
            $dados = $produto->queryOne([":idProduto" => $id]);
            require './views/produtos/consultaProduto.php';
        }
            break;

        

}
        





?>