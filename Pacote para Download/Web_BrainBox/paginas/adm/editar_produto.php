<?php
session_start();
include_once '../../classes/conexao.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$precoc = mysqli_real_escape_string($conn, $_POST['precoc']);
$precov = mysqli_real_escape_string($conn, $_POST['precov']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
$qnt = mysqli_real_escape_string($conn, $_POST['qnt']);
$result_produto = "UPDATE produto SET nome_produto='$nome', preco_produto =  '$precoc', preco_venda =  '$precov', tipo_produto =  '$tipo', categoria =  '$categoria', qtde_produto =  '$qnt' WHERE id_produto = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        if (!empty($id)) {
            if (mysqli_affected_rows($conn) != 0) {
                $_SESSION['msg'] = "Produto editado com sucesso!";
                header("Location: produto.php");
            } else {
                $_SESSION['msg'] = "Erro o produto não foi editado com sucesso";
                header("Location: produto.php");
            }
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>