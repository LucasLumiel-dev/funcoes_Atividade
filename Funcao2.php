<!DOCTYPE html>
<html>
<head>
	<title>Exercício 02: Dados de Alunos</title>
</head>
<body>
	<h1>Exercício 02: Dados de Alunos</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<?php for ($i = 0; $i < 10; $i++) { ?>
			<label for="nome-<?php echo $i; ?>">Nome do Aluno <?php echo $i + 1; ?>:</label>
			<input type="text" id="nome-<?php echo $i; ?>" name="nomes[]" required><br>
			<label for="nota-<?php echo $i; ?>">Nota do Aluno <?php echo $i + 1; ?>:</label>
			<input type="number" id="nota-<?php echo $i; ?>" name="notas[]" required><br><br>
		<?php } ?>
		<input type="submit" value="Enviar">
	</form>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nomes = $_POST['nomes'];
		$notas = $_POST['notas'];
		
		// Função para calcular a média da classe
		function calcularMedia($notas) {
			$soma = 0;
			foreach ($notas as $nota) {
				$soma += $nota;
			}
			return $soma / count($notas);
		}
		
		// Função para encontrar o aluno com a maior nota
		function encontrarMaiorNota($nomes, $notas) {
			$maiorNota = 0;
			$alunoMaiorNota = '';
			foreach ($notas as $indice => $nota) {
				if ($nota > $maiorNota) {
					$maiorNota = $nota;
					$alunoMaiorNota = $nomes[$indice];
				}
			}
			return array($alunoMaiorNota, $maiorNota);
		}
		
		// Calcular e exibir os resultados
		echo "<h2>Resultados:</h2>";
		echo "<p>Média da classe: " . calcularMedia($notas) . "</p>";
		$alunoMaiorNota = encontrarMaiorNota($nomes, $notas);
		echo "<p>Aluno com a maior nota: " . $alunoMaiorNota[0] . " com nota " . $alunoMaiorNota[1] . "</p>";
	}
	?>
</body>
</html>