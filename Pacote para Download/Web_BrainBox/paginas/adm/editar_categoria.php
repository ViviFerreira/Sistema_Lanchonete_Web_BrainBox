<?php
session_start();
include_once '../../classes/conexao.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$result_produto = "UPDATE categoria SET tipo_categoria='$nome' WHERE id_categoria = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        if (!empty($id)) {
            if (mysqli_affected_rows($conn) != 0) {
                $_SESSION['msg'] = "Categoria editada com sucesso!";
                header("Location: categoria.php");
            } else {
                $_SESSION['msg'] = "Erro a categoria não foi editada com sucesso";
                header("Location: categoria.php");
            }
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>