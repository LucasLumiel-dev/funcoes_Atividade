<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    
    <form action="" method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="produto<?php echo $i; ?>">Nome do Produto <?php echo $i; ?>:</label>
            <input type="text" name="produtos[<?php echo $i; ?>][nome]" required>
            
            <label for="preco<?php echo $i; ?>">Preço do Produto <?php echo $i; ?>:</label>
            <input type="number" name="produtos[<?php echo $i; ?>][preco]" step="0.01" required>
            
            <br><br>
        <?php endfor; ?>
        
        <input type="submit" value="Cadastrar Produtos">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Função para contar os produtos com preço inferior a R$50,00
        function contarProdutosAbaixo50($produtos) {
            $contagem = 0;
            foreach ($produtos as $produto) {
                if ($produto['preco'] < 50) {
                    $contagem++;
                }
            }
            return $contagem;
        }

        // Função para listar os produtos com preço entre R$50,00 e R$100,00
        function listarProdutosEntre50e100($produtos) {
            $produtosEntre50e100 = [];
            foreach ($produtos as $produto) {
                if ($produto['preco'] >= 50 && $produto['preco'] <= 100) {
                    $produtosEntre50e100[] = $produto['nome'];
                }
            }
            return $produtosEntre50e100;
        }

        // Função para calcular a média dos preços dos produtos com preço superior a R$100,00
        function calcularMediaAcima100($produtos) {
            $soma = 0;
            $contagem = 0;
            foreach ($produtos as $produto) {
                if ($produto['preco'] > 100) {
                    $soma += $produto['preco'];
                    $contagem++;
                }
            }
            if ($contagem > 0) {
                return $soma / $contagem;
            } else {
                return 0;
            }
        }

        // Captura os dados do formulário
        $produtos = $_POST['produtos'];

        // Exibe a quantidade de produtos com preço inferior a R$50,00
        $quantidadeAbaixo50 = contarProdutosAbaixo50($produtos);
        echo "<h2>Quantidade de produtos com preço inferior a R$50,00: $quantidadeAbaixo50</h2>";

        // Exibe os produtos com preço entre R$50,00 e R$100,00
        $produtosEntre50e100 = listarProdutosEntre50e100($produtos);
        echo "<h2>Produtos com preço entre R$50,00 e R$100,00:</h2>";
        if (!empty($produtosEntre50e100)) {
            echo "<ul>";
            foreach ($produtosEntre50e100 as $produto) {
                echo "<li>$produto</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum produto encontrado nessa faixa de preço.</p>";
        }

        // Exibe a média dos preços dos produtos com preço superior a R$100,00
        $mediaAcima100 = calcularMediaAcima100($produtos);
        if ($mediaAcima100 > 0) {
            echo "<h2>Média dos preços dos produtos com preço superior a R$100,00: R$" . number_format($mediaAcima100, 2, ',', '.') . "</h2>";
        } else {
            echo "<h2>Nenhum produto com preço superior a R$100,00</h2>";
        }
    }
    ?>
</body>
</html>
