<?php 
$cont = 2;
while($cont < 15){
	echo "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES
	('Cliente$cont', 'cliente$cont@gmail.com.br', '202cb962ac59075b964b07152d234b70', 1, '2019-04-12', '09:35:15');".'<br>';
	$cont = $cont + 1;
}
