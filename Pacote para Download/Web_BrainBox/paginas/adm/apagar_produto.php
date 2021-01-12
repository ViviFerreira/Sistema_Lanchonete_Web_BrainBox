<?php

session_start();
include_once '../../classes/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM produto WHERE id_produto='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "Produto apagado com sucesso!";
        header("Location: produto.php");
    } else {
        $_SESSION['msg'] = "Erro o produto não foi apagado com sucesso";
        header("Location: produto.php");
    }
} else {
    $_SESSION['msg'] = "Necessário selecionar um produto";
    header("Location: produtos.php");
}
