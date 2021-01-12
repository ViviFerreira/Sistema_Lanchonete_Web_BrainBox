<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Administrador | Novos Cadastros</title>
        <script src="../../js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../boots/css/bootstrap.css">
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/usuarios.php';
        include_once '../../classes/conexao.php';
        if (isset($_SESSION['administrador'])) {
            $usuario = $_SESSION['administrador'];
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $id = $_SESSION['id_adm'];
            include_once '../../classes/conexao.php';
            $consulta = mysqli_query($conn, "select * from usuarios where nivel_usuario =1");
            $resultado1 = mysqli_num_rows($consulta);
            $consulta2 = mysqli_query($conn, "select * from usuarios where nivel_usuario =2");
            $resultado2 = mysqli_num_rows($consulta2);
            $consulta3 = mysqli_query($conn, "select * from usuarios where nivel_usuario =3");
            $resultado3 = mysqli_num_rows($consulta3);
        }
        $a = new Usuario();
        ?>
        <div class="loginbox">
            <h1>Cadastro de Usuário</h1>
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nome do Usuário</label>
                        <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Nome" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">E-mail do Usuário</label>
                        <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="E-mail" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Categoria do Usuário</label>
                        <select class="form-control" name="nivel" required="required">
                            <option value="2">Funcionário</option>
                            <option value="3">Gerente</option>
                            <option value="4">Administrador</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input type="password" name="conf_senha" class="form-control" id="exampleInputPassword1" placeholder="Confirmar Senha" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="submit" name="" value="Enviar" class="btn btn-primary mb-2 " style="width: 5em; padding: 5px;">
                    </div>
                </div>
            </form>
        </div>
        <div class="box-card">
            <div class="card border-light mb-3" style="max-width: 17rem; max-height:7.5em;">
                <div class="card-header bg-dark text-light" style="border: 1px solid #d7d7d7; border-bottom: none; font-family:'Roboto Condensed', sans-serif; font-size: 16px;">CLIENTES</div>
                <div class="card-body"  style="border: 1px solid #d7d7d7; background:#fff;">
                    <label>Total de Cadastros: <?php echo $resultado1; ?> <br> <a href="novos_cadastros.php"><i id="relo" class="fas fa-sync"></i></i></a> </labe>
                </div>
            </div> <br>
            <div class="card border-light mb-3" style="max-width: 17rem; height: 7.5em;">
                <div class="card-header bg-dark text-light" style="border: 1px solid #d7d7d7; border-bottom: none;font-family:'Roboto Condensed', sans-serif; font-size: 16px;">FUNCIONÁRIOS</div>
                <div class="card-body" style="border: 1px solid #d7d7d7; background:#fff;">
                    <label>Total de Cadastros: <?php echo $resultado2; ?> <br> <a href="novos_cadastros.php"><i id="relo" class="fas fa-sync"></i></a> </label>
                </div> 
            </div> <br>
            <div class="card border-light mb-3" style="max-width: 17rem; height: 7.5em;">
                <div class="card-header bg-dark text-light" style="border: 1px solid #d7d7d7; border-bottom: none;font-family:'Roboto Condensed', sans-serif; font-size: 16px;">GERENTES</div>
                <div class="card-body" style="border: 1px solid #d7d7d7;  background:#fff;">
                    <label>Total de Cadastros: <?php echo $resultado3; ?> <br> <a href="novos_cadastros.php"><i id="relo" class="fas fa-sync"></i></a> </labe>
                </div>
            </div>
        </div>
        <?php
        //verificar se clicou no botao
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $nivel = $_POST['nivel'];
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                $a->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($a->msgErro == "") { //se esta tudo ok
                    if ($senha == $confirmarSenha) {
                        if ($a->news_cadastros($nome, $email, $senha, $nivel)) {
                            ?>
                            <script>
                                alert("Usuário cadastrado com sucesso!");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert("Usuário já cadastrado! Tente Novamente");
                            </script>

                            <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("Senhas não coincidem! Tente novamente");
                        </script>

                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $a->msgErro; ?>
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