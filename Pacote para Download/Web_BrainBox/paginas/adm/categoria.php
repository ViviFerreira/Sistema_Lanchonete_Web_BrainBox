<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
         <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Administrador | Categorias </title>
        <script src="js/personalizado.js"></script>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        ?>
        <div class="titulo">
            <h2>Categorias cadastradas</h2>
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
            <?php
            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 10;

            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            //consultar no banco de dados
            $result_usuario = "SELECT * FROM categoria LIMIT $inicio, $qnt_result_pg";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
//Verificar se encontrou resultado na tabela "usuarios"
            if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {
                ?>
                <table class="table table-striped table-bordered table-hover table table-sm">
                    <thead> 
                        <tr style="text-align:center">
                            <th style="width:2em;">Id</th>
                            <th>Nome categoria</th>
                            <th style="width:2em;">Opção1</th>
                            <th style="width:2em;">Opção2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                            ?>
                            <tr style="text-align:center;">
                                <th><?php echo $row_usuario['id_categoria']; ?></th>
                                <td><?php echo $row_usuario['tipo_categoria']; ?></td>
                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar" data-whatever="<?php echo $row_usuario['id_categoria']; ?>" data-whatevernome="<?php echo $row_usuario['tipo_categoria']; ?>">Editar</button></td>
                                <td><button type="button" class="btn btn-danger btn-sm" style="text-decoration: none; width: 4em; padding: 4px;"><?php echo "<a href='apagar_categoria.php?id=" . $row_usuario['id_categoria'] . "' data-confirm='Tem certeza de que deseja excluir o cliente selecionado?'><font color='#FFF'>Apagar</font></a>" ?></button></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <?php
                //Paginção - Somar a quantidade de usuários
                $result_pg = "SELECT COUNT(id_categoria) AS num_result FROM categoria";
                $resultado_pg = mysqli_query($conn, $result_pg);
                $row_pg = mysqli_fetch_assoc($resultado_pg);
                //echo $row_pg['num_result'];
                //Quantidade de pagina 
                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                //Limitar os link antes depois
                $max_links = 2;
                echo '<nav aria-label="paginacao">';
                echo '<ul class="pagination">';
                echo '<li class="page-item">';
                echo "<span class='page-link'><a href='categoria.php?pagina=1'>Primeira</a></span> ";

                for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                    if ($pag_ant >= 1) {
                        echo "<li class='page-item'><a class='page-link' href='categoria.php?pagina=$pag_ant'>$pag_ant</a></li>";
                    }
                }

                echo '<li class="page-item active">';
                echo '<span class="page-link">';
                echo "$pagina";
                echo '</span>';
                echo '</li>';
                for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                    if ($pag_dep <= $quantidade_pg) {
                        echo "<li class='page-item'><a class='page-link' href='categoria.php?pagina=$pag_dep'>$pag_dep</a></li>";
                    }
                }
                echo '<li class="page-item">';
                echo "<span class='page-link'><a href='categoria.php?pagina=$quantidade_pg'>Ultima</a></li>";
                echo '</li>';
                echo '</ul>';
                echo '</nav>';
            } else {
                ?>
                <?php
                echo "<div class='alert alert-danger' role='alert' style='margin-top:-2.2em; margin-left:-5px;width:101%;'>Nenhuma categoria encontrada!</div>";
            }
            ?>
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-size: 18px;">Categoria</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="editar_categoria.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nome da categoria:</label>
                                <input name="nome" type="text" class="form-control" id="recipient-name">
                            </div>
                            <input name="id" type="hidden" class="form-control" id="id-categoria" value="">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success btn-sm">Alterar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var recipientnome = button.data('whatevernome')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Categoria ID ' + recipient)
            modal.find('#id-categoria').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
        })
    </script>


</body>
</html>
