<html>
	<head>
		<title>Excluir reposição</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Erro ao conectar ao banco de dados! Erro: ' . mysqli_connect_error());
			
			// delete from db
			$codigo = $_GET['codigo'];
			if (!mysqli_query($con, "DELETE FROM reposicao WHERE codigo='$codigo';"))
				die('Erro ao remover ordem do banco de dados! Erro: ' . mysqli_error($con));
			echo "Ordem removida com sucesso!!";
			
			// close
			mysqli_close($con);
		?> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>