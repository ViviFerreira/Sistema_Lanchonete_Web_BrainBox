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
    </head>
    <body>
        <?php
        Class Usuario {

            private $pdo;
            public $msgErro = ""; // tudo ok

            public function conectar($nome, $host, $usuario, $senha) {
                global $pdo;
                try {
                    $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
                } catch (PDOException $e) {
                    $msgErro = $e->getMessage();
                }
            }

            public function cadastrar($nome, $email, $senha) {
                global $pdo;
                $date = date("y/m/d");
                date_default_timezone_set("Brazil/East");
                $hora = date("h:i:s");
                date_default_timezone_set("Brazil/East");
                //verificar se ja esxiste o email cadastrado
                $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario=:e");
                $sql->bindValue(":e", $email);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return FALSE; //Ja esta cadastrada
                } else {
                    //caso nao, Cadastrar
                    $sql = $pdo->prepare("INSERT INTO usuarios(nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES(:n, :e, :s, :l, :d, :h)");
                    $sql->bindValue(":n", $nome);
                    $sql->bindValue(":e", $email);
                    $sql->bindValue(":s", md5($senha));
                    $sql->bindValue(":l", 1);
                    $sql->bindValue(":d", $date);
                    $sql->bindValue(":h", $hora);
                    $sql->execute();
                    return TRUE; //tudo ok
                    
                }
            }

            public function criar_ADM($nome, $email, $senha) {
                global $pdo;
                $date = date("y/m/d");
                date_default_timezone_set("Brazil/East");
                $hora = date("h:i:s");
                date_default_timezone_set("Brazil/East");
                //verificar se ja esxiste o email cadastrado
                $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario=:e");
                $sql->bindValue(":e", $email);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return FALSE; //Ja esta cadastrada
                } else {
                    //caso nao, Cadastrar
                    $sql = $pdo->prepare("INSERT INTO usuarios(nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES(:n, :e, :s, :l, :d, :h)");
                    $sql->bindValue(":n", $nome);
                    $sql->bindValue(":e", $email);
                    $sql->bindValue(":s", md5($senha));
                    $sql->bindValue(":l", 4);
                    $sql->bindValue(":d", $date);
                    $sql->bindValue(":h", $hora);
                    $sql->execute();
                    return TRUE; //tudo ok
                }
            }

            public function news_cadastros($nome, $email, $senha, $nivel) {
                global $pdo;
                global $pdo;
                $date = date("y/m/d");
                date_default_timezone_set("Brazil/East");
                $hora = date("h:i:s");
                date_default_timezone_set("Brazil/East");
                //verificar se ja esxiste o email cadastrado
                $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario=:e");
                $sql->bindValue(":e", $email);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return FALSE; //Ja esta cadastrada
                } else {
                    //caso nao, Cadastrar
                    $sql = $pdo->prepare("INSERT INTO usuarios(nome_usuario, email_usuario, senha_usuario, nivel_usuario, date_cadastro, hora_cadastro) VALUES(:n, :e, :s, :l, :d, :h)");
                    $sql->bindValue(":n", $nome);
                    $sql->bindValue(":e", $email);
                    $sql->bindValue(":s", md5($senha));
                    $sql->bindValue(":l", $nivel);
                    $sql->bindValue(":d", $date);
                    $sql->bindValue(":h", $hora);
                    $sql->execute();
                    return TRUE; //tudo ok
                }
            }

        }
        ?>
    </body>
</html>
