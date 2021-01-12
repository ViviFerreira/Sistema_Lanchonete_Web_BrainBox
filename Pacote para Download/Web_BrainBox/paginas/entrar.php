<!DOCTYPE html>
<html>
    <head>
        <title>Entrar</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../boots/css/bootstrap.css">
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/style_formbox.css">
        <script src="../boots/js/bootstrap.js"></script>
    </head>
    <body>
        <?php
        require_once '../classes/Usuarios_entrar.php';
        $e = new Usuarios_Entrar;
        ?>
        <div class="loginbox">
            <img src="../img/logo-png.png" class="avatar">
            <h1>Entrar</h1>
            <form method="post">
                <p>E-mail</p>
                <input type="email" name="email" placeholder="E-mail" required="required" maxlength="45">
                <p>Senha</p>
                <input type="password" name="senha" placeholder="Senha" required="required" maxlength="30">
                <div class="log">
                    <input type="submit" name="" value="Entrar">
                </div>
            </form>
        </div>
        <?php
        //verificar se clicou no botao
        if (isset($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if (!empty($email) && !empty($senha)) {
                if ($e->msgErro == "") {//se esta tudo ok
                    if ($e->entrar($email, $senha)) {
                        
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Email ou senha incorretos!</strong> Por favor tente novamente.
                            <a href="entrar.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <p class="text-dark">&times;</p>
                                </button>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $e->msgErro; ?>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="mgs_Erro">Preencha todos os campos!</div>
                <?php
            }
        }
        ?>
</html>