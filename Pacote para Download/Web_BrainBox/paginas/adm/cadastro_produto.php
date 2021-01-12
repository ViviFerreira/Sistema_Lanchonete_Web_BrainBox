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
        <title>Administrador | Cadastro de Categoria</title>
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/">
    </head>
    <body>
        <?php
        include_once './administrador.php';
        require_once '../../classes/Produto.php';
        $produto = new Produto();
        $cat = new Produto();
        include_once '../../classes/conexao.php';
        $consultacategoria = 'select * from categoria';
        $produtos = mysqli_query($conn, $consultacategoria);
        ?>
        <div class="loginbox">
            <h1>Cadastro de Produto</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Nome do produto</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" required="" maxlength="30">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Preço da compra</label>
                        <input type="number" name="precoc" class="form-control" step="0.01" placeholder="Preço compra" required="" maxlength="30">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Preço da venda</label>
                        <input type="number" name="precov" class="form-control" step="0.01" placeholder="Preço venda" required="" maxlength="30">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Categoria</label>
                        <select id="s1" name="tipo" class="form-control">
                            <option value="1">Comida</option>
                            <option value="2">Bebida</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                         <label for="inputEstado">Categoria 2</label>
                        <select id="s1" name="categoria" class="form-control">
                            <?php
                            while ($nomecategoria = mysqli_fetch_array($produtos)) {
                                ?>
                                <option value="<?php echo $nomecategoria['tipo_categoria']; ?>"><?php echo $nomecategoria['tipo_categoria']; ?></option>
                                <?php
                            }
                            ?>
                        </select><br>
                    </div>
                    <div class="form-group col-md-6">
                         <label for="inputEstado">Quantidade</label>
                        <input type="number" name="qnt" class="form-control" placeholder="Quantidade" required="" maxlength="30">
                    </div>
                </div>
                     <input type="submit" name="" value="Enviar" class="btn btn-primary mb-2 " style="width: 5em; margin-top:0px; margin-left:42em; padding: 5px;">
                </div>
            </form>
        </div>
        <div class="categoria-box">
            <h1>Cadastro de Categoria</h1>
            <form method="post">
                <input type="text" name="tipo" class="form-control" placeholder="Nome" required="" maxlength="30">
                <input type="submit" name="" class="btn btn-primary mb-2 btn-sm" value="Enviar" style="width: 5em; margin-top:8px; margin-left:16.5em; padding: 5px;">
            </form>
        </div>

        <?php
        //verificar se clicou no botao
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $precoc = addslashes($_POST['precoc']);
            $precov = addslashes($_POST['precov']);
            $tipo = addslashes($_POST['tipo']);
            $categoria = addslashes($_POST['categoria']);
            $qnt = addslashes($_POST['qnt']);
            if (!empty($nome) && !empty($precoc) && !empty($precov) && !empty($tipo) && !empty($categoria) && !empty($qnt)) {
                $produto->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($produto->msgErro == "") {//se esta tudo ok
                    if ($produto->cadastrar_produto($nome, $precoc, $precov, $tipo, $categoria, $qnt)) {
                        ?>
                        <script>
                            alert("Cadastrado com sucesso!");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("Produto já cadastrado!");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $produto->msgErro; ?>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="mgs_Erro">Preencha todos os campos!</div>
                <?php
            }
        } else if (isset($_POST['tipo'])) {
            //verificar se clicou no botao
            $tipo = addslashes($_POST['tipo']);
            if (!empty($tipo)) {
                $cat->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($cat->msgErro == "") {//se esta tudo ok
                    if ($cat->cadastrar_categoria($tipo)) {
                        ?>
                        <script>
                            alert("Cadastrado com sucesso!");
                            window.location.href = "cadastro_produto.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("Categoria já cadastrada!");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $cat->msgErro; ?>
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
