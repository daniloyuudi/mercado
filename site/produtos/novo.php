<html>
	<head>
		<title>Novo produto</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados! Erro: ' . mysqli_connect_error());
			
			// get form fields
			$codigo = $_POST['codigo'];
			$nome = $_POST['nome'];
			$fornecedor = $_POST['fornecedor'];
			$preco = $_POST['preco'];
			$categoria = $_POST['categoria'];
			$fotoName = $_FILES['foto']['name'];
			$fotoTempName = $_FILES['foto']['tmp_name'];
			move_uploaded_file($fotoTempName, "../fotos/$fotoName");
			
			// record on db
			$query = "INSERT INTO produtos (codigo, nome, fornecedor, preco, categoria, foto) VALUES
			('$codigo', '$nome', '$fornecedor', $preco, '$categoria', '$fotoName');";
			if (!mysqli_query($con, $query))
				die('Erro ao registrar produto no banco de dados!! Erro: '
			. mysqli_error($con));
			echo "Produto cadastrado com sucesso!";
			
			// close db
			mysqli_close($con);
		?>
		<hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>