<!DOCTYPE html>
<html>
<head>
	<title>Exercício 03: Contagem de Números</title>
</head>
<body>
	<h1>Exercício 03: Contagem de Números</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<?php for ($i = 0; $i < 10; $i++) { ?>
			<label for="numero-<?php echo $i; ?>">Número <?php echo $i + 1; ?>:</label>
			<input type="number" id="numero-<?php echo $i; ?>" name="numeros[]" required><br><br>
		<?php } ?>
		<input type="submit" value="Enviar">
	</form>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$numeros = $_POST['numeros'];
		
		// Função para contar números negativos
		function contarNegativos($numeros) {
			$quantidade = 0;
			foreach ($numeros as $numero) {
				if ($numero < 0) {
					$quantidade++;
				}
			}
			return $quantidade;
		}
		
		// Função para contar números positivos
		function contarPositivos($numeros) {
			$quantidade = 0;
			foreach ($numeros as $numero) {
				if ($numero > 0) {
					$quantidade++;
				}
			}
			return $quantidade;
		}
		
		// Função para contar números pares
		function contarPares($numeros) {
			$quantidade = 0;
			foreach ($numeros as $numero) {
				if ($numero % 2 == 0) {
					$quantidade++;
				}
			}
			return $quantidade;
		}
		
		// Função para contar números ímpares
		function contarImpares($numeros) {
			$quantidade = 0;
			foreach ($numeros as $numero) {
				if ($numero % 2 != 0) {
					$quantidade++;
				}
			}
			return $quantidade;
		}
		
		// Calcular e exibir os resultados
		echo "<h2>Resultados:</h2>";
		echo "<p>Quantidade de números negativos: " . contarNegativos($numeros) . "</p>";
		echo "<p>Quantidade de números positivos: " . contarPositivos($numeros) . "</p>";
		echo "<p>Quantidade de números pares: " . contarPares($numeros) . "</p>";
		echo "<p>Quantidade de números ímpares: " . contarImpares($numeros) . "</p>";
	}
	?>
</body>
</html>