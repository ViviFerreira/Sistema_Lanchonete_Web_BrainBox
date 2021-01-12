<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Funcionário | Cadastro de Clientes</title>
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <?php
        require_once '../../classes/usuarios.php';
        include_once './funcionario.php';
        include_once '../../classes/conexao.php';
        $u = new Usuario;
        $consulta = mysqli_query($conn, "select * from usuarios where nivel_usuario =1");
        $resultado1 = mysqli_num_rows($consulta);
        ?>
        <div class="loginbox">
            <h1>Cadastro de Cliente</h1>
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nome do Cliente</label>
                        <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Nome" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">E-mail do Cliente</label>
                        <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="E-mail" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input type="password" name="conf_senha" class="form-control" id="exampleInputPassword1" placeholder="Confirmar Senha" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-6">
                            <input type="submit" value="Enviar" class="btn btn-primary mb-2" style="width: 4.4em; margin-top: -0.5em; margin-left: 41.5em;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-card" style="margin-top: -7em; margin-left: 2em">
            <div class="card border-light mb-3" style="max-width: 17rem; max-height:7.5em;">
                <div class="card-header text-light" style="border: 1px solid #d7d7d7; border-bottom: none; background:#32383e;">Clientes</div>
                <div class="card-body"  style="border: 1px solid #d7d7d7; background:#fff;">
                    <label>Total de Cadastros: <?php echo $resultado1; ?> <br> <a href="cadastro_cliente.php"><i id="relo" class="fas fa-sync"></i></i></a> </labe>
                </div>
            </div>
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
                            <script>
                                alert("Cadastrado com sucesso!");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert("Email já cadastrado!");
                            </script>
                            <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("Senhas não coincidem!");
                        </script>
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