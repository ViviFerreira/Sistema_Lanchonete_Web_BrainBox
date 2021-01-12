<?php 
$cont = 1;
while($cont < 15){
	echo "INSERT INTO `produto`(`nome_produto`, `preco_produto`, `preco_venda`, `tipo_produto`, `categoria`) VALUES
	('Produto$cont', 2, 3, 1, 'Salgado');".'<br>';
	$cont = $cont + 1;
}
