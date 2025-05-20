<h1>Produtos cadastrados</h1>

<table class="produtos">
    <tr>
        <th>Nome:</th>
        <th>Preço:</th>
        <th>Estoque:</th>
        <th></th>
    </tr>
    <?php
        foreach($dados as $dado){
            extract($dado);
            echo "<tr>";
                echo "<td>$nomeProduto</td>";
                echo "<td>$precoProduto</td>";
                echo "<td>$estoqueProduto</td>";
                echo "<td><a href='produto/$idProduto'><button class='btn-acessar'>Acessar Produto</button></a></td>";
                echo "<td><a href='produto/delete/$idProduto'><button class='btn-excluir'>Excluir Produto</button></a></td>";


                
            echo "</tr>";
        }
    ?>
</table>
<br>
<a href="produto/cadastro"><button class="btn-cadastrar">Cadastrar produto</button></a>



