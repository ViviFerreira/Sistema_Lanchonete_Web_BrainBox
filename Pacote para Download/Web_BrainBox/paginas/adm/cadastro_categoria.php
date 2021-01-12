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
        ?>
        <div class="loginbox">
            <h1>Cadastro de Categoria</h1>
            <form method="post">
                <input type="text" name="tipo" placeholder="Nome" required="" maxlength="30">
                <input type="submit" name="" value="Cadastrar">
            </form>
        </div>
         
        <?php
        //verificar se clicou no botao
        if (isset($_POST['tipo'])) {
            $tipo = addslashes($_POST['tipo']);
            if (!empty($tipo)) {
                $produto->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($produto->msgErro == "") {//se esta tudo ok
                    if ($produto->cadastrar_categoria($tipo)) {
                        ?>
                        <div id="popup_sucesso">
                            <img src="../../img/good-quality.png"><br>
                            Cadastrado com sucesso!<br>
                            <a href="cadastro_categoria.php">
                                <button>Ok</button></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="popup_erro">
                            <img src="../../img/warning.png"><br>
                            Categoria já cadastrada! <br>
                            <a href="cadastro_categoria.php">
                                <button> Ok</button></a></div>
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
        }
        ?>
    </body>
</html>
