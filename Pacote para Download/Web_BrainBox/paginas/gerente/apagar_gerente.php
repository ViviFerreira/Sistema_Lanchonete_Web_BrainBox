<?php

session_start();
include_once '../../classes/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM usuarios WHERE id_usuario='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
        header("Location: ../sair");
    } else {
        $_SESSION['msg'] = "Erro o administrador não foi apagado com sucesso";
       header("Location: ../sair.php");
    }
} else {
    $_SESSION['msg'] = "Necessário selecionar um admnistrador";
   header("Location: ../sair.php");
}
