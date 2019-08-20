<html>
	<head>
		<title>Alterar venda</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Alterar venda</h2>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Erro ao conectar ao banco de dados!!! Erro: ' . mysqli_connect_error());
			
			// get fields
			$codigo = $_GET['codigo'];
			$res = mysqli_query($con, "SELECT * FROM caixa WHERE codigo=$codigo;");
			$row = mysqli_fetch_assoc($res);
			$data = $row['data'];
			$total = $row['total'];
			$feijoadaBrinde = $row['feijoadaBrinde'];
			$formaPagamento = $row['formaPagamento'];
			$cpf = $row['cpf'];
		?>
		
		<form action='alterar.php' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='codigo' value=<?php echo $codigo; ?>>
			Data:<input type='date' name='data' value='<?php echo $data; ?>' required> <br>
			Total:<input type='number' name='total' min=0 max=9999.99 step=0.01 value=<?php echo $total; ?> required> <br>
			<input type='checkbox' name='feijoadaBrinde' <?php if ($feijoadaBrinde) echo 'checked'; ?> value='S'> Feijoada de Brinde? <br>
			Forma de pagamento: <select name='formaPagamento' required>
				<option value='D' <?php if ($formaPagamento == 'D') echo 'selected'; ?>>Dinheiro</option>
				<option value='C' <?php if ($formaPagamento == 'C') echo 'selected'; ?>>Cartão</option>
			</select> <br>
			CPF:<input type='text' name='cpf' maxlength=15 value='<?php echo $cpf; ?>'> <br>
			<input type='submit' value='Cadastar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>