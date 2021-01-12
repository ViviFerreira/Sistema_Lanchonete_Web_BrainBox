<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
         <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Administrador | Clientes</title>
        <script src="js/personalizado.js"></script>
    </head>
    <body>

        <?php
        include_once './administrador.php';
        ?>
        <div class="titulo">
              <h2>Clientes Cadastrados</h2>
        </div>
        <div class="msg-top">
            <?php
            if (isset($_SESSION['msg'])) {
                $mensagem = ($_SESSION['msg']);
                ?>
                <div class = "alert alert-success" role = "alert" style="margin-top: 3em;">
                    <?php echo $mensagem; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="outline: none!important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="table-box">
            <div class="search_but">
                <a href="pesquisa.php"><button type="button" class="btn btn-primary btn-sm">Pesquisar</button></a>
            </div>
            <span id="conteudo"></span><br><br><br>
            <script>
                var qnt_result_pg = 10; //quantidade de registro por página
                var pagina = 1; //página inicial
                $(document).ready(function () {
                    listar_clientes(pagina, qnt_result_pg); //Chamar a função para listar os registros
                });

                function listar_clientes(pagina, qnt_result_pg) {
                    var dados = {
                        pagina: pagina,
                        qnt_result_pg: qnt_result_pg
                    }
                    $.post('listar_clientes.php', dados, function (retorna) {
                        //Subtitui o valor no seletor id="conteudo"
                        $("#conteudo").html(retorna);
                    });
                }
            </script>
        </div>
    </body>
</html>
