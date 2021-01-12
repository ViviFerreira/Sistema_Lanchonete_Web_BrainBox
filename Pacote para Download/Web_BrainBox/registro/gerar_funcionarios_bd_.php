<?php 
$cont = 2;
while($cont < 50){
	echo "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES
	('Funcionário$cont', 'funcionario$cont@gmail.com.br', '202cb962ac59075b964b07152d234b70', 2, '2019-04-12', '09:35:15');".'<br>';
	$cont = $cont + 1;
}
