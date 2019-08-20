<html>
	<head>
		<title>Excluir venda</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados!! Erro: ' . mysqli_connect_error());
			
			// delete
			$codigo = $_GET['codigo'];
			if (!mysqli_query($con, "DELETE FROM caixa WHERE codigo=$codigo;"))
				die('Falha ao deletar venda!! Erro: ' . mysqli_error($con));
			echo "Venda excluída com sucesso!!";
			
			// close db
			mysqli_close($con);
		?>
		<hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>