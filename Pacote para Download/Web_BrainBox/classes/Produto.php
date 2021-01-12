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

        Class Produto {

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

            public function cadastrar_categoria($tipo) {
                global $pdo;
                //verificar se ja esxiste o email cadastrado
                $sql = $pdo->prepare("SELECT id_categoria FROM categoria WHERE tipo_categoria=:t");
                $sql->bindValue(":t", $tipo);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return FALSE; //Ja esta cadastrada
                } else {
                    //caso nao, Cadastrar
                    $sql = $pdo->prepare("INSERT INTO categoria(tipo_categoria) VALUES(:t)");
                    $sql->bindValue(":t", $tipo);
                    $sql->execute();
                    return TRUE; //tudo ok
                }
            }

            public function cadastrar_produto($nome, $precoc, $precov, $tipo, $categoria, $qnt) {
                global $pdo;
                //verificar se ja esxiste o email cadastrado
                $sql = $pdo->prepare("SELECT id_produto FROM produto WHERE nome_produto=:n");
                $sql->bindValue(":n", $nome);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return FALSE; //Ja esta cadastrada
                } else {
                    //caso nao, Cadastrar
                    $sql = $pdo->prepare("INSERT INTO produto(nome_produto, preco_produto, preco_venda, tipo_produto, categoria, qtde_produto) VALUES(:n, :p, :v, :t , :c, :q)");
                    $sql->bindValue(":n", $nome);
                    $sql->bindValue(":p", $precoc);
                    $sql->bindValue(":v", $precov);
                    $sql->bindValue(":t", $tipo);
                    $sql->bindValue(":c", $categoria);
                    $sql->bindValue(":q", $qnt);
                    //tudo ok
                    $sql->execute();
                    return TRUE;
                }
            }

        }
        ?>
    </body>
</html>
