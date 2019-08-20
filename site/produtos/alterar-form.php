<html>
	<head>
		<title>Alterar produto</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Alterar produto</h2>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados!!! Erro: ' . mysqli_connect_error());
			
			// get all values
			$codigo = $_GET['codigo'];
			$res = mysqli_query($con, "SELECT * FROM produtos WHERE codigo='$codigo';");
			if (!$res)
				die('Erro: ' . mysqli_error($con));
			$row = mysqli_fetch_assoc($res);
			$nome = $row['nome'];
			$fornecedor = $row['fornecedor'];
			$preco = $row['preco'];
			$categoria = $row['categoria'];
		?>
		
		<form action='alterar.php' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='codigo' value='<?php echo $codigo; ?>'>
			Nome:<input type='text' name='nome' value='<?php echo $nome; ?>' maxlength=20 required> <br>
			Fornecedor:<input type='text' name='fornecedor' value='<?php echo $fornecedor ?>'maxlength=20> <br>
			Preço:<input type='number' name='preco' value=<?php echo $preco; ?> min=0 max=999.99 step=0.01 required> <br>
			Categoria:<input type='text' name='categoria' value='<?php echo $categoria; ?>' maxlength=20> <br>
			Foto:<input type='file' name='foto' required> <br>
			<input type='submit' value='Alterar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>