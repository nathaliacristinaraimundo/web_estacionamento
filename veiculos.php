<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM veiculo";
	$resultado = $conexao->query($sql);

	$veiculos = $resultado->fetchAll();

	/*[
		[
			'cpf'=>'04080660608',
			'nome'=>'Livão',
			'dtNasc'=>'28/11/00'
		],
		[
			'cpf'=>'15107352604',
			'nome'=>'Livinha',
			'dtNasc'=>'14/01/02'
		]
	];*/
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Modelos - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
	</header>
	<div id="container">
		<main>
			<h2>Veículos </h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Codigo Modelo</th>
							<th>Cliente</th>
							<th>Cor</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($veiculos as $veiculo): ?>
						<tr>
							<td><?= $veiculo['placa'] ?></td>
							<td><?= $veiculo['modelo_codmod'] ?></td>
							<td><?= $veiculo['cliente_cpf'] ?></td>
							<td><?= $veiculo['cor'] ?></td>


							
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>
