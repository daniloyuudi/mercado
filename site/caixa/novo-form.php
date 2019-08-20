<html>
	<head>
		<title>Nova venda</title>
		<link rel='stylesheet' href='../style.css'>
	</head>
	<body>
		<h2>Nova venda</h2>
		<form action='novo.php' method='post' enctype='multipart/form-data'>
			Data: <input type='date' name='data' required> <br>
			Total: <input type='number' name='total' min=0 max=9999.99 step=0.01 required> <br>
			<input type='checkbox' name='feijoadaBrinde' value='S'> Feijoada brinde? <br>
			Forma de pagamento: <select name='formaPagamento' required>
				<option disabled selected></option>
				<option value='D'>Dinheiro</option>
				<option value='C'>Cartão</option>
			</select><br>
			CPF:<input type='text' name='cpf' maxlength=15> <br>
			<input type='submit' value='Cadastrar'>
			<input type='reset' value='Limpar'>
		</form> <hr>
		<a href='../index.html'>Voltar</a>
	</body>
</html>