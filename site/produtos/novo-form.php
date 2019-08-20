<html>
	<head>
		<title>Novo produto</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Novo produto</h2>
		<form action='novo.php' method='post' enctype='multipart/form-data'>
			Código: <input type='text' name='codigo' maxlength=20 required> <br>
			Nome: <input type='text' name='nome' maxlength=20 required> <br>
			Fornecedor: <input type='text' name='fornecedor' maxlength=20> <br>
			Preço: <input type='number' name='preco' min=0 max=999.99 step=0.01 required> <br>
			Categoria: <input type='text' name='categoria' maxlength=20> <br>
			Foto: <input type='file' name='foto' required> <br>
			<input type='submit' value='Cadastrar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>