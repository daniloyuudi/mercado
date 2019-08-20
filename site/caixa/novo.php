<html>
	<head>
		<title>Nova venda</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<?php
			// connect to db
			$con = mysqli_connect('localhost', 'root', '', 'mercado');
			if (mysqli_connect_errno())
				die('Erro ao conectar ao banco de dados!!! Erro: ' . mysqli_connect_error());
			
			// get fields
			$data = $_POST['data'];
			$total = $_POST['total'];
			if (isset($_POST['feijoadaBrinde']))
				$feijoadaBrinde = 1;
			else $feijoadaBrinde = 0;
			$formaPagamento = $_POST['formaPagamento'];
			$cpf = $_POST['cpf'];
			
			// write on db
			$query = "INSERT INTO caixa (data, total, feijoadaBrinde, formaPagamento, cpf) VALUES ('$data', $total, $feijoadaBrinde, '$formaPagamento', '$cpf');";
			if (!mysqli_query($con, $query))
				die('Falha ao inserir registro no banco de dados!!!! Erro: ' . mysqli_error($con));
			echo "Venda registrada com sucesso!";
			
			// close db
			mysqli_close($con);
		?>
		<hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>