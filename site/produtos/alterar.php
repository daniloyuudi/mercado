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
			$codigo = $_POST['codigo'];
			$nome = $_POST['nome'];
			$fornecedor = $_POST['fornecedor'];
			$preco = $_POST['preco'];
			$categoria = $_POST['categoria'];
			$fotoName = $_FILES['foto']['name'];
			$fotoTempName = $_FILES['foto']['tmp_name'];
			move_uploaded_file($fotoTempName, "../fotos/$fotoName");
			
			// update
			$query = "UPDATE produtos SET nome='$nome', fornecedor='$fornecedor', preco=$preco, categoria='$categoria', foto='$fotoName' WHERE codigo='$codigo';";
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