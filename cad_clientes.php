
<?php 

var_dump($_POST);

if(count($_POST)>0){
    echo '<br>' . $_POST['CPF'];
    echo '<br>' . $_POST['Nome'];
    echo '<br>' . $_POST['Data_de_nascimento'];

    $conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");
    $sql = "insert into Cliente values (?,?,?)";
    $comando = $conexao->prepare($sql);
    $sucesso = $comando->execute([
        $_POST['CPF'],
        $_POST['Nome'],
        $_POST['Data_de_nascimento']


        ]);
    $mensagem = '';
    if ($sucesso)
    {
        $mensagem = "Cliente cadastrado!";
    }
    else
    {
        // se deu erro, a mensagem não será tão amigável :(
        $mensagem = "Erro: " . $comando->errorInfo()[2];
    }
    setcookie('mensagem', $mensagem);


    header('Location:clientes.php');
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
			<h2>Cadastro do clientes</h2>
    		<form action="cad_clientes.php" method="post">
        <p>
            <label for="icpf">CPF:</label><br>
            <input type="number" id="icpf" name="CPF">
        </p>
        <p>
            <label for="inome">Nome:</label><br>
            <input type="text" id="inome" name="Nome">
        </p>
        <p>
            <label for="iddn">Data de nascimento:</label><br>
            <input type="date" id="iddn" name="Data_de_nascimento">
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