<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador | Redefinir Dados</title>
    </head>
    <body>
        <?php
        include_once './gerente.php';
        include_once '../../classes/conexao.php';
        $sql = 'SELECT * FROM usuarios WHERE id_usuario=' . $_GET['editar'];
        $result = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_array($result);
        ?>

        <div class="box">
            <h1>Redefina seus dados</h1>
            <form method="post" action="evento_gerente.php?editar=<?php echo $linha['id_usuario']; ?>">
                <input type="text" name="nome" class="form-control" required="" placeholder="Nome"value="<?php echo $linha['nome_usuario']; ?>">
                <input type="email" name="email" class="form-control" required="" placeholder="E-mail" value="<?php echo $linha['email_usuario']; ?>">
                <input type="password" name="senha" class="form-control"required="" placeholder="Senha">
                <input type="password" name="conf_senha" class="form-control"required=""  placeholder="Confirmar Senha">
                <input type="submit" class="btn btn-primary mb-2 btn-sm" value="Enviar">
            </form>
        </div>
        <br>
    </body>
</html>
