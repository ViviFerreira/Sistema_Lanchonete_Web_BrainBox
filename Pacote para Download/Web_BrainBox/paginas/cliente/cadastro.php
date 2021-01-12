<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../boots/css/bootstrap.css">
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../../css/style_formbox.css">
        <script src="../../boots/js/bootstrap.js"></script>
    </head>
    <body>
        <?php
        require_once '../../classes/usuarios.php';
        $u = new Usuario;
        ?>
        <div class="loginbox">
            <img src="../../img/logo-png.png" class="avatar">
            <h1>Cadastro de Clientes</h1>
            <form method="post">

                <input type="text" name="nome" placeholder="Nome" required="" maxlength="30">

                <input type="email" name="email" placeholder="E-mail" required="" maxlength="45">

                <input type="password" name="senha" placeholder="Senha" required="" maxlength="30">
                <input type="password" name="conf_senha" placeholder="Confirmar Senha" required="" maxlength="30">
                <input type="submit" name="" value="Cadastrar">
            </form>
        </div>

        <?php
        //verificar se clicou no botao
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                $u->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($u->msgErro == "") {//se esta tudo ok
                    if ($senha == $confirmarSenha) {
                        if ($u->cadastrar($nome, $email, $senha)) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Cadastrado com sucesso!</strong> Acesse para entrar.
                                <a href="../entrar.php">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <p class="text-dark">&times;</p>
                                </button>
                                </a>
                            </div>                           <?php
                        } else {
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Email já cadastrado!</strong> Por favor tente novamente.
                                <a href="cadastro.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <p class="text-dark">&times;</p>
                                </button>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Senha e confirmar senha não correspondem!</strong> Por favor tente novamente.
                            <a href="cadastro.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <p class="text-dark">&times;</p>
                                </button>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $u->msgErro; ?>
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
    </body>
</html>