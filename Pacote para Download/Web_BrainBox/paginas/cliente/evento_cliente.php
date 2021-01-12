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
        <link rel="stylesheet" href="../css/style_admin.css" type="text/css" media="all" />
    </head>
    <body>
        <?php
        include_once './cliente.php';
        require_once '../../classes/conexao.php';
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
                if ($senha == $confirmarSenha) {
                    $sql = "update usuarios set nome_usuario='$nome', email_usuario='$email', senha_usuario=md5('$senha') where id_usuario='$id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    ?>
                    <script>
                        alert('Dados atualizados com sucesso!');
                        window.location.href = "../entrar.php";
                    </script>
                    <?php
                } else {
                    ?>
                     <script>
                        alert('Senhas não coincidem!');
                        window.location.href = "cliente.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <div class="mgs_Erro">Preencha todos os campos!</div>
                <?php
            }
        }
        ?>
    </body>
</html>
