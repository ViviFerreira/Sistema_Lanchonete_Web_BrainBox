<?php 
$cont = 1;
while($cont < 15){
	echo "INSERT INTO `categoria`(`tipo_categoria`) VALUES
	('Categoria$cont');".'<br>';
	$cont = $cont + 1;
}
