<?php
include '../conexao.php';

// Filtros
$filtroCliente = $_GET['cliente'] ?? '';
$filtroData = $_GET['data'] ?? '';

// Monta a consulta
$sql = "SELECT * FROM vendas WHERE 1";
$params = [];

if ($filtroCliente) {
    $sql .= " AND idCliente = :cliente";
    $params[':cliente'] = $filtroCliente;
}

if ($filtroData) {
    $sql .= " AND DATE(dataVenda) = :data";
    $params[':data'] = $filtroData;
}

$sql .= " ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute($params);
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Vendas</title>
    <link rel="shortcut icon" type="imagex/png" href="../assets/img/ico.svg">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>

    <div class="voltar">
        <a href="../venda.php">← Voltar para Vendas</a>
    </div>

    <h2>📋 Histórico de Vendas</h2>

    <div class="filtro">
        <form method="GET">
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente">
                <option value="">Todos</option>
                <?php
                $clientes = $db->query("SELECT id, nome FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($clientes as $c) {
                    $selected = ($filtroCliente == $c['id']) ? 'selected' : '';
                    echo "<option value='{$c['id']}' $selected>{$c['nome']}</option>";
                }
                ?>
            </select>

            <label for="data">Data:</label>
            <input type="date" name="data" id="data" value="<?= htmlspecialchars($filtroData) ?>">

            <button type="submit">🔍 Filtrar</button>
            <a href="vendaHistorico.php" style="text-decoration:none;">
                <button type="button">❌ Limpar Filtros</button>
            </a>
        </form>
    </div>

    <?php if (empty($vendas)) : ?>
        <p>Nenhuma venda encontrada com os filtros aplicados.</p>
    <?php else : ?>
        <?php foreach ($vendas as $venda) : ?>
            <div class="venda">
                <h3>Venda #<?= $venda['id'] ?> - Data: <?= $venda['dataVenda'] ?></h3>

                <?php
                // Dados do cliente
                $cliente = $db->prepare("SELECT nome, email FROM clientes WHERE id = :id");
                $cliente->execute([':id' => $venda['idCliente']]);
                $cliente = $cliente->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="cliente"><strong>Cliente:</strong> <?= $cliente['nome'] ?> (<?= $cliente['email'] ?>)</div>

                <?php

                // Produtos vendidos

                $produtosVendidos = $db->prepare("SELECT idProduto, quantidade FROM produtosvendidos WHERE idVenda = :idVenda");
                $produtosVendidos->execute([':idVenda' => $venda['id']]);
                $produtosVendidos = $produtosVendidos->fetchAll(PDO::FETCH_ASSOC);

                // Buscar detalhes de cada produto
                
                $produtos = [];
                foreach ($produtosVendidos as $produtoVendido) {
                    $stmtProduto = $db->prepare("SELECT nome_produto, preco FROM produto WHERE id_produto = :idProduto");
                    $stmtProduto->execute([':idProduto' => $produtoVendido['idProduto']]);
                    $produtoDetalhado = $stmtProduto->fetch(PDO::FETCH_ASSOC);

                    // Adiciona detalhes ao produto vendido
                    $produtos[] = [
                        'nome_produto' => $produtoDetalhado['nome_produto'],
                        'preco' => $produtoDetalhado['preco'],
                        'quantidade' => $produtoVendido['quantidade']
                    ];
                }
                ?>

                <div class="produtos">
                    <table>
                        <tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Subtotal</th></tr>
                        <?php
                        $total = 0;
                        foreach ($produtos as $produto) :
                            $subtotal = $produto['preco'] * $produto['quantidade'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?= $produto['nome_produto'] ?></td>
                                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                                <td><?= $produto['quantidade'] ?></td>
                                <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr><td colspan="3"><strong>Total da Venda:</strong></td><td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td></tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
