<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrar</title>
    </head>
    <body>
        <?php

        Class Usuarios_Entrar {

            public $msgErro = "";

            public function entrar($email, $senha) {
                define('HOST', 'localhost');
                define('USER', 'root');
                define('PASS', '');
                define('BASE', 'sistema_lanchonete');
                $conexao = 'mysql:host=' . HOST . ';dbname=' . BASE;
                try {
                    $conn = new PDO($conexao, USER, PASS);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $erro_conexao) {
                    $msgErro = $erro_conexao->getMessage();
                }
                if (isset($email) && isset($senha)) {
                    $sql = $conn->prepare("SELECT * FROM usuarios WHERE email_usuario=:e AND senha_usuario=:s");
                    $sql->bindValue(":e", $email);
                    $sql->bindValue(":s", md5($senha));
                    $sql->execute();
                    $num = $sql->rowCount();
                    if ($num > 0) {
                        $_SESSION["email"] = $email;
                        $_SESSION["senha"] = $senha;
                        $verifica = $conn->query("SELECT * FROM usuarios");
                        while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
                            if ($linha['email_usuario'] == $email) {
                                $nome = $linha['nome_usuario'];
                                $idt = $linha['id_usuario'];
                                $email = $linha['email_usuario'];
                                $senha = $linha['senha_usuario'];
                                $nivel = $linha['nivel_usuario'];
                                switch ($nivel) {
                                    case '1';
                                        session_start();
                                        $_SESSION['cliente'] = $nome;
                                        $_SESSION['id_cli'] = $idt;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['senha'] = $senha;
                                        header("location:../paginas/cliente/cliente.php");
                                        return TRUE;
                                        break;
                                    case '2';
                                        session_start();
                                        $_SESSION['funcionario'] = $nome;
                                        $_SESSION['id_fun'] = $idt;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['senha'] = $senha;
                                        header("location:../paginas/funcionario/cadastro_cliente.php");
                                        return TRUE;
                                        break;
                                    case '3';
                                        session_start();
                                        $_SESSION['gerente'] = $nome;
                                        $_SESSION['id_ge'] = $idt;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['senha'] = $senha;
                                        header("location:../paginas/gerente/produto.php");
                                        return TRUE;
                                        break;
                                    case '4';
                                        session_start();
                                        $_SESSION['administrador'] = $nome;
                                        $_SESSION['id_adm'] = $idt;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['senha'] = $senha;
                                        header("location:../paginas/adm/administrador_inicio.php");
                                        break;
                                        return TRUE;
                                }
                            }
                        }
                    }
                } else {
                    return FALSE;
                }
            }

        }
        ?>

    </div>
</body>
</html>
