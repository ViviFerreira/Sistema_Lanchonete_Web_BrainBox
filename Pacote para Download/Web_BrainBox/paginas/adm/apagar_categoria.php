<?php

session_start();
include_once '../../classes/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM categoria WHERE id_categoria='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "Categoria apagada com sucesso!";
        header("Location: categoria.php");
    } else {

        $_SESSION['msg'] = "Erro a categoria não foi apagada com sucesso";
        header("Location: categoria.php");
    }
} else {
    $_SESSION['msg'] = "Necessário selecionar uma categoria";
    header("Location: categoria.php");
}
