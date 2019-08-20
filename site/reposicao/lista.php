<html>
	<head>
		<title>Lista de reposição</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Lista de ordens de reposição</h2>
		<table>
			<tr>
				<th>Código</th>
				<th>Descrição</th>
				<th>Fornecedor</th>
				<th>Valor</th>
				<th>Data</th>
				<th>Status</th>
				<th colspan=2>Ações</th>
			</tr>
			<?php
				// connect to db
				$con = mysqli_connect('localhost', 'root', '', 'mercado');
				if (mysqli_connect_errno())
					die('Falha ao conectar ao banco de dados! Erro: ' . mysqli_connect_error());
				
				// get all rows from table
				$res = mysqli_query($con, 'SELECT * FROM reposicao;');
				$num_rows = mysqli_num_rows($res);
				
				// print all rows
				if ($num_rows > 0) {
					for ($i = 0; $i < $num_rows; $i++) {
						mysqli_data_seek($res, $i);
						$row = mysqli_fetch_assoc($res);
						
						$codigo = $row['codigo'];
						$descricao = $row['descricao'];
						$fornecedor = $row['fornecedor'];
						$valor = $row['valor'];
						$data= $row['data'];
						$status = $row['status'];
						
						echo "<tr>";
						echo "	<td>$codigo</td>";
						echo "	<td>$descricao</td>";
						echo "	<td>$fornecedor</td>";
						echo "	<td>R\$$valor</td>";
						echo "	<td>$data</td>";
						switch ($status) {
							case 'A': echo "	<td>Aguardando</td>"; break;
							case 'E': echo "	<td>Enviado</td>"; break;
							case 'R': echo "	<td>Recebido</td>"; break;
						}
						echo "	<td><a href='alterar-form.php?codigo=$codigo'>editar</td>";
						echo "	<td><a href='excluir.php?codigo=$codigo'>excluir</a></td>";
						echo "</tr>";
					}					
				} else {
					echo "<tr>";
					echo "<td colspan=8>Nenhuma ordem foi registrada ainda!</td>";
					echo "</tr>";
				}
				
				// close db
				mysqli_close($con);
			?>
		</table>
		<a href='novo-form.php'>Cadastar nova ordem</a> <hr>
		<a href='../index.html'>Voltar</a>
	</body>
</html>