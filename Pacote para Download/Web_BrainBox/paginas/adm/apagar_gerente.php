<?php
session_start();
include_once '../../classes/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM usuarios WHERE id_usuario='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "Gerente apagado com sucesso!";
        header("Location: gerente.php");
    } else {
        $_SESSION['msg'] = "Erro o gerente não foi apagado com sucesso";
        header("Location: gerente.php");
    }
} else {
    $_SESSION['msg'] = "Necessário selecionar um gerente";
    header("Location: gerente.php");
}
