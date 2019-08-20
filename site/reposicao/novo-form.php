<html>
	<head>
		<title>Nova ordem</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Nova ordem</h2>
		<form action='novo.php' method='post' enctype='multipart/form-data'>
			Descrição: <input type='text' name='descricao' maxlength=50 required> <br>
			Fornecedor: <input type='text' name='fornecedor' maxlength=20> <br>
			Valor: <input type='number' name='valor' min=0 max=999999.99 step=0.01 required> <br>
			Data: <input type='date' name='data' required> <br>
			Status: <select name='status' required>
				<option disabled selected></option>
				<option value='A'>Aguardando</option>
				<option value='E'>Enviado</option>
				<option value='R'>Recebido</option>
			</select> <br>
			<input type='submit' value='Cadastrar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='lista.php'>Voltar</a>
	</body>
</html>