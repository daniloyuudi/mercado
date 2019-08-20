<html>
	<head>
		<title>Lista de produtos</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Lista de produtos</h2>
		<table>
			<tr>
				<th></th>
				<th>Código</th>
				<th>Nome</th>
				<th>Fornecedor</th>
				<th>Categoria</th>
				<th>Preço</th>
				<th colspan=2>Ações</th>
			</tr>
			<?php
				// connect to db
				$con = mysqli_connect('localhost', 'root', '', 'mercado');
				if (mysqli_connect_errno())
					die('Falha ao conectar ao banco de dados! Erro: ' . mysqli_connect_error());
				
				// get all rows from table
				$res = mysqli_query($con, 'SELECT * FROM produtos;');
				$num_rows = mysqli_num_rows($res);
				
				// print all rows
				if ($num_rows > 0) {
					for ($i = 0; $i < $num_rows; $i++) {
						mysqli_data_seek($res, $i);
						$row = mysqli_fetch_assoc($res);
						
						$codigo = $row['codigo'];
						$nome = $row['nome'];
						$categoria = $row['categoria'];
						$fornecedor = $row['fornecedor'];
						$preco = $row['preco'];
						$foto = $row['foto'];
						
						echo "<tr>";
						echo "	<td><img src='../fotos/$foto' width=50 height=50></td>";
						echo "	<td>$codigo</td>";
						echo "	<td>$nome</td>";
						echo "	<td>$fornecedor</td>";
						echo "	<td>$categoria</td>";
						echo "	<td>R\$$preco</td>";
						echo "	<td><a href='alterar-form.php?codigo=$codigo'>editar</td>";
						echo "	<td><a href='excluir.php?codigo=$codigo'>excluir</a></td>";
						echo "</tr>";
					}					
				} else {
					echo "<tr>";
					echo "<td colspan=8>Nenhum produto foi registrado ainda!</td>";
					echo "</tr>";
				}
			?>
		</table>
		<a href='novo-form.php'>Cadastar novo produto</a> <hr>
		<a href='../index.html'>Voltar</a>
	</body>
</html>