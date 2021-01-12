$(function(){
	$("#pesquisa_pro").keyup(function(){
		//Recuperar o valor do campo
		var pesquisa_pro = $(this).val();
		
		//Verificar se há algo digitado
		if(pesquisa_pro != ''){
			var dados = {
				palavra : pesquisa_pro
			}
			$.post('resultado_produto.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}
	});
});
