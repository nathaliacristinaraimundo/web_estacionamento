
<?php 

var_dump($_POST);

if(count($_POST)>0){
    echo '<br>' . $_POST['numero'];
    echo '<br>' . $_POST['Endereco'];
    echo '<br>' . $_POST['Capacidade'];

    $conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");
    $sql = "insert into patio values (?,?,?)";
    $comando = $conexao->prepare($sql);
    $sucesso = $comando->execute([
        $_POST['numero'],
        $_POST['Endereco'],
        $_POST['Capacidade']


        ]);
    $mensagem = '';
    if ($sucesso)
    {
        $mensagem = "Pátio cadastrado!";
    }
    else
    {
        // se deu erro, a mensagem não será tão amigável :(
        $mensagem = "Erro: " . $comando->errorInfo()[2];
    }
    setcookie('mensagem', $mensagem);


    header('Location:patio.php');
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
			<h2>Cadastro do patio</h2>
    		<form action="cad_patio.php" method="post">
        <p>
            <label for="inumero">Numero:</label><br>
            <input type="number" id="inumero" name="numero">
        </p>
        <p>
            <label for="iendereco">Endereço:</label><br>
            <input type="text" id="iendereco" name="Endereco">
        </p>
        <p>
            <label for="iddn">Capacidade:</label><br>
            <input type="number" id="icap" name="Capacidade">
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