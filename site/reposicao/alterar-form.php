<html>
	<head>
		<title>Alterar ordem de reposição</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Alterar ordem de reposição</h2>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Falha ao conectar ao banco de dados!!! Erro: ' . mysqli_connect_error());
			
			// get all values
			$codigo = (int)$_GET['codigo'];
			$res = mysqli_query($con, "SELECT * FROM reposicao WHERE codigo=$codigo;");
			if (!$res)
				die('Erro: ' . mysqli_error($con));
			$row = mysqli_fetch_assoc($res);
			$descricao = $row['descricao'];
			$fornecedor = $row['fornecedor'];
			$valor = (float)$row['valor'];
			$data = $row['data'];
			$status = $row['status'];
		?>
		
		<form action='alterar.php' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='codigo' value='<?php echo $codigo; ?>'>
			Descrição:<input type='text' name='descricao' value='<?php echo $descricao; ?>' maxlength=50 required> <br>
			Fornecedor:<input type='text' name='fornecedor' value='<?php echo $fornecedor ?>' maxlength=20> <br>
			Valor:<input type='number' name='valor' value=<?php echo $valor; ?> min=0 max=999999.99 step=0.01 required> <br>
			Data:<input type='date' name='data' value=<?php echo $data; ?> required> <br>
			Status:<select name='status' required>
				<option value='A' <?php if ($status == 'A') echo "selected"; ?>>Aguardando</option>
				<option value='E' <?php if ($status == 'E') echo "selected"; ?>>Enviado</option>
				<option value='R' <?php if ($status == 'R') echo "selected"; ?>>Recebido</option>
			</select> <br>
			<input type='submit' value='Alterar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>