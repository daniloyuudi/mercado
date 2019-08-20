<html>
	<head>
		<title>Nova ordem de reposição</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados! Erro: ' . mysqli_connect_error());
			
			// get form fields
			$fornecedor = $_POST['fornecedor'];
			$valor = $_POST['valor'];
			$descricao = $_POST['descricao'];
			$data = $_POST['data'];
			$status = $_POST['status'];
			
			// record on db
			$query = "INSERT INTO reposicao (fornecedor, valor, descricao, data, status) VALUES ('$fornecedor', $valor, '$descricao', '$data', '$status');";
			if (!mysqli_query($con, $query))
				die('Erro ao registrar ordem no banco de dados!! Erro: '
			. mysqli_error($con));
			echo "Ordem cadastrada com sucesso!";
			
			// close db
			mysqli_close($con);
		?>
		<hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>