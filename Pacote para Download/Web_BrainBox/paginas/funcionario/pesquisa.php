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
        <title>Funcionário | Pesquisa</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="js/personalizado.js"></script>
        <script src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="js/pesquisa.js"></script>
    </head>
    <body>
        <?php
        include_once './funcionario.php';
        include_once '../../classes/conexao.php';
        ?>
        <div class="msg-top">
            <?php
            if (isset($_SESSION['msg'])) {
                $mensagem = ($_SESSION['msg']);
                ?>
                <div class = "alert alert-success" role = "alert" style="margin-top: 3em;">
                    <?php echo $mensagem; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="outline: none!important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="box-result">
            <form method="POST" id="form-pesquisa" action="" style="margin-top:-3em;"autocomplete="off">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1" class="label-pesquisa">Pesquisar cliente</label>
                    <input type="text" name="pesquisa" class="form-control" id="pesquisa" required="" placeholder="Digite nome do Cliente">
                </div>
            </form>
            <table class="resultado">

            </table>
        </div>
    </body>
</html>