<html>
	<head>
		<title>Alterar produto</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados!! Erro: ' . mysqli_connect_error());
			
			// get fields
			$codigo = (int)$_POST['codigo'];
			$descricao = $_POST['descricao'];
			$fornecedor = $_POST['fornecedor'];
			$valor = (float)$_POST['valor'];
			$data = $_POST['data'];
			$status = $_POST['status'];
			
			// update
			$query = "UPDATE reposicao SET descricao='$descricao', fornecedor='$fornecedor', valor=$valor, data='$data', status='$status' WHERE codigo=$codigo;";
			if (!mysqli_query($con, $query))
				die('Falha ao alterar cadastro! Erro: ' . mysqli_error($con));
			echo "Produto alterado com sucesso!!";
			
			// close
			mysqli_close($con);
		?>
		<hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>