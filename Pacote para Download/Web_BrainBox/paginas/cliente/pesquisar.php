
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Cliente | Pesquisar</title>
    </head>
    <body>
        <?php
        include_once '../../classes/conexao.php';
        include_once './cliente.php';
        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
        if (!isset($_POST['pesquisar'])) {
            header("Location: pedido.php");
        } else {
            $valor_pesquisar = $_POST['pesquisar'];
        }
        $result_cursos = "SELECT * FROM produto WHERE nome_produto LIKE '%$valor_pesquisar%'";
        $resultado_cursos = mysqli_query($conn, $result_cursos);
        ?>
        <div class="container theme-showcase" role="main">
            <div class="row">
                <div class="box_fora"> 
                    <?php
                    if ($resultado_cursos->num_rows != 0) {
                        while ($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) {
                            ?>
                            <div class="box_produto">
                                <p><?php echo $rows_cursos['nome_produto']; ?></p>
                                <p>Preço: <?php echo $rows_cursos['preco_produto']; ?></p>
                                <input type="checkbox">
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert' style='margin-top:1em; width:60%;'>Nenhuma produto encontrado!</div>";
                    }
                    ?>
                </div>
                </body>
                </html>