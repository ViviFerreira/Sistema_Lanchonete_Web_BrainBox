<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../../boots/css/bootstrap.min.css">
        <script src="../../js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="../../boots/js/bootstrap.min.js"></script>
        <script src="js/categoria.js"></script>
    </head>
    <body>
        <?php
        include_once '../../classes/conexao.php';
        if (isset($_SESSION['msg'])) {
            unset($_SESSION['msg']);
        }
        $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

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
                            <td><button type="button" class="btn btn-primary" style="text-decoration: none;width: 4em; padding: 4px;"><?php echo "<a href='apagar_categoria.php?id=" . $row_usuario['id_categoria'] . "' data-confirm='Tem certeza de que deseja excluir o cliente selecionado?'><font color='#FFF'>Editar</font></a>" ?></button></td>
                            <td><button type="button" class="btn btn-danger" style="text-decoration: none; width: 4em; padding: 4px;"><?php echo "<a href='apagar_categoria.php?id=" . $row_usuario['id_categoria'] . "' data-confirm='Tem certeza de que deseja excluir o cliente selecionado?'><font color='#FFF'>Apagar</font></a>" ?></button></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <?php
            //Paginação - Somar a quantidade de usuários
            $result_pg = "SELECT COUNT(id_categoria) AS num_result FROM categoria";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);

            //Quantidade de pagina
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

            //Limitar os link antes depois
            $max_links = 2;

            echo '<nav aria-label="paginacao">';
            echo '<ul class="pagination">';
            echo '<li class="page-item">';
            echo "<span class='page-link'><a href='#' onclick='listar_categorias(1, $qnt_result_pg)'>Primeira</a> </span>";
            echo '</li>';
            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                if ($pag_ant >= 1) {
                    echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_categorias($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
                }
            }
            echo '<li class="page-item active">';
            echo '<span class="page-link">';
            echo "$pagina";
            echo '</span>';
            echo '</li>';

            for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                if ($pag_dep <= $quantidade_pg) {
                    echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_categorias($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
                }
            }
            echo '<li class="page-item">';
            echo "<span class='page-link'><a href='#' onclick='listar_categorias($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
            echo '</li>';
            echo '</ul>';
            echo '</nav>';
        } else {
            ?>
            <?php
            echo "<div class='alert alert-danger' role='alert' style='margin-top:-2.2em; margin-left:-5px;width:101%;'>Nenhuma categoria encontrada!</div>";     
        }
        ?>
    </body>
</html>
