<?php 
$cont = 2;
while($cont < 20){
	echo "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES
	('Gerente$cont', 'gerente$cont@gmail.com.br', '202cb962ac59075b964b07152d234b70', 3, '2019-04-12', '09:35:15');".'<br>';
	$cont = $cont + 1;
}
