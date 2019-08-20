<html>
	<head>
		<title>Alterar venda</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Erro ao conectar ao banco de dados!!!!! Erro: ' . mysqli_connect_error());
			
			// get all fields
			$codigo = $_POST['codigo'];
			$data = $_POST['data'];
			$total = $_POST['total'];
			if (isset($_POST['feijoadaBrinde']))
				$feijoadaBrinde = 1;
			else $feijoadaBrinde = 0;
			$formaPagamento = $_POST['formaPagamento'];
			$cpf = $_POST['cpf'];
			
			// update record
			$query = "UPDATE caixa SET data='$data', total=$total, feijoadaBrinde=$feijoadaBrinde, formaPagamento='$formaPagamento', cpf='$cpf' WHERE codigo=$codigo;";
			if (!mysqli_query($con, $query))
				die('Falha ao atualizar venda!!! Erro: ' . mysqli_error($con));
			echo "Venda atualizada com sucesso!!";
			
			// close db
			mysqli_close($con);
		?> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>