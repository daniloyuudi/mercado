<html>
	<head>
		<title>Caixa</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Caixa</h2>
		<table>
			<th>Código</th>
			<th>Data</th>
			<th>Total</th>
			<th>Feijoada de brinde?</th>
			<th>Forma de pagamento</th>
			<th>CPF</th>
			<th colspan=2>Ações</th>
			
			<?php
				// connect to database
				$con = mysqli_connect('localhost', 'root', '', 'mercado');
				if (mysqli_connect_errno())
					die('Falha ao conectar ao banco de dados!!! Erro: ' . mysqli_connect_error());
				
				// get all rows
				$res = mysqli_query($con, "SELECT * FROM caixa;");
				if (!$res)
					die('Falha ao recuperar dados! Erro: ' . mysqli_error($con));
				$num_rows = mysqli_num_rows($res);
				
				// print all rows
				if ($num_rows > 0) {
					for ($i = 0; $i < $num_rows; $i++) {
						mysqli_data_seek($res, $i);
						$row = mysqli_fetch_assoc($res);
						
						$codigo = $row['codigo'];
						$data = $row['data'];
						$total = $row['total'];
						$feijoadaBrinde = $row['feijoadaBrinde'];
						$formaPagamento = $row['formaPagamento'];
						$cpf = $row['cpf'];
						
						echo "<tr>";
						echo "	<td>$codigo</td>";
						echo "	<td>$data</td>";
						echo "	<td>R\$$total</td>";
						if ($feijoadaBrinde)
							echo "	<td><img src='../yes.png' width=29 height=29></td>";
						else
							echo "	<td><img src='../no.png' width=25 height=25></td>";
						switch ($formaPagamento) {
							case 'C': echo "	<td>Cartão</td>"; break;
							case 'D': echo "	<td>Dinheiro</td>"; break;
						}
						echo "	<td>$cpf</td>";
						echo "	<td><a href='alterar-form.php?codigo=$codigo'>editar</a></td>";
						echo "	<td><a href='excluir.php?codigo=$codigo'>excluir</a></td>";
						echo "</tr>";
					}
				} else {
					echo "<tr>";
					echo "	<td colspan=8>Nenhuma venda realizada ainda!</td>";
					echo "</tr>";
				}
			?>
		</table>
		<a href='novo-form.php'>Cadastrar nova venda</a>
		<hr>
		<a href='../index.html'>Voltar</a>
	</body>
</html>