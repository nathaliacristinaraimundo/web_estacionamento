<?php 

var_dump($_POST);

if(count($_POST)>0){
    echo '<br>' . $_POST['modelo'];
    echo '<br>' . $_POST['descricao'];
    

    $conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");
    $sql = "insert into Modelo values (?,?)";
    $comando = $conexao->prepare($sql);
    $sucesso = $comando->execute([
        $_POST['modelo'],
        $_POST['descricao'],
       


        ]);
    $mensagem = '';
    if ($sucesso)
    {
        $mensagem = "Modelo cadastrado!";
    }
    else
    {
        // se deu erro, a mensagem não será tão amigável :(
        $mensagem = "Erro: " . $comando->errorInfo()[2];
    }
    setcookie('mensagem', $mensagem);


    header('Location:modelos.php');
}

 ?>
<DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Clientes - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
        <nav>
            <ul id="menu">
                <li><a href="estacionados.php">Estacionados</a></li>
                <li><a href="patio.php">Pátios</a></li>
                <li class="ativo"><a href="clientes.php">Clientes</a></li>
                <li><a href="veiculos.php">Veículos</a></li>
                <li><a href="modelos.php">Modelos</a></li>
            </ul>
        </nav>
	</header>
	<div id="container">
            <?php if(!empty($mensagem)): ?>
                <div id="mensagem">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>
		<main>
			<h2>Cadastro dos modelos</h2>
    		<form action="cad_modelos.php" method="post">
        <p>
            <label for="imodelo">Código do modelo:</label><br>
            <input type="number" id="imodelo" name="modelo">
        </p>
        <p>
            <label for="idescricao">Descrição:</label><br>
            <input type="text" id="idescricao" name="descricao">
        </p>
    
        	<button type="submit">Enviar</button>
        </p>



			
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>