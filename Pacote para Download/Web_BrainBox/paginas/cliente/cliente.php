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
        <title>Cliente</title>
        <script src="../../js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../boots/css/bootstrap.css">
        <link rel="stylesheet" href="../../css/style_tela_pedido.css">
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../../boots/js/bootstrap.js"></script>
        <script src="js/personalizado.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include_once '../../classes/conexao.php';
        ?>
        <?php
        include_once '../../classes/conexao.php';
        session_start();
        if (isset($_SESSION['cliente'])) {
            $usuario = $_SESSION['cliente'];
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $id = $_SESSION['id_cli'];
        } else {
            header("location:../entrar.php");
            exit();
        }
        ?>
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="text-white p-4" style="background-image: url(../../img/amarelo.jpeg); background-size: 40%;">
                    <h4 class="text-white"><img class="logo" src="../../img/logo-png.png"></h4>
                    <span class="text-white">BRAINBOX</span>
                    <div class="usuario">
                        <p class="text-dark">Olá, <?php echo $usuario; ?></p><a href="../sair.php"><button type="button" class="btn btn-primary" style="margin-top: -5.2em; padding:5px; margin-left: 10.2em; text-align: center; width: 4em;"><i id="exit" class="fas fa-sign-out-alt"></i> Sair</button></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-danger text-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" style="outline:none!important;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ol>
                    <li><a href="../../home.php" title=""><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#" accesskey="2" title=""><i class="fas fa-hamburger"></i> Produtos</a></li>
                    <li data-toggle="modal" data-target="#conta"><a href="#" accesskey="2" title=""><i class="fas fa-user"></i> Minha Conta</a></li>
                </ol>
                <form method="post" class="form-inline my-2 my-lg-0" action="pesquisar.php">
                    <input name="pesquisar" class="form-control mr-sm-2"  type="search" placeholder="Pesquisar produtos" aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
        </div>
        <div class="modal fade" id="conta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white" style="font-family:'Roboto Condensed', sans-serif;">
                        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 8em; font-size: 20px;"><i id="cont" class="fas fa-portrait"></i>Detalhes da Conta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="font-family:'Roboto Condensed', sans-serif;">
                        <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em; font-size: 17px; font-weight: 500;">Nível de acesso: Cliente</h5>
                        <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em; font-size: 17px; font-weight: 500;">Nome: <?php echo $usuario; ?></h5>
                        <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em;font-size: 17px; font-weight: 500;">E-mail: <?php echo $email; ?></h5>
                        <div class="modal1__body">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn" data-toggle="modal" data-target="#editar" data-whatever="<?php echo $id; ?>" data-whatevernome="<?php echo $usuario; ?>" data-whateveremail="<?php echo $email; ?>"><i id="ops" class="fas fa-pen-square"></i>Editar dados</button>
                                <button type="button" class="btn btn"><i id="ops" class="fas fa-trash-alt"></i><?php echo "<a href='apagar_cliente.php?id=" . $id . "' data-confirm='Tem certeza de que deseja excluir o usuário selecionado?'><font color='#222'>Deletar conta</font></a>" ?></button>
                                <a href="../sair.php"><button type="button" class="btn btn"><i id="ops" class="fas fa-sign-out-alt"></i>Sair da conta</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-size: 18px;">Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="evento_cliente.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="control-label">Nome:</label>
                                    <input name="nome" type="text" class="form-control" id="recipient-name" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="control-label">Email:</label>
                                    <input name="email" type="email" class="form-control" id="recipient-email" required="required">
                                </div>
                            </div>
                            <div class="form-row" style="text-align: left;">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="control-label">Senha:</label>
                                    <input name="senha" type="password" class="form-control" id="recipient-senha" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="control-label">Confirmar Senha:</label>
                                    <input name="conf_senha" type="password" class="form-control" id="recipient-confsenha" required="required">
                                </div> 
                            </div>
                            <input name="id" type="hidden" class="form-control" id="id-cliente" value="">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success btn-sm">Alterar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#editar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                var recipientc = button.data('whateveremail')

                var modal = $(this)
                modal.find('.modal-title').text('Editar Cliente ID ' + recipient)
                modal.find('#id-cliente').val(recipient)
                modal.find('#recipient-name').val(recipientnome)
                modal.find('#recipient-email').val(recipientc)
            })
        </script>
        <!---Final Modais---->

    </form>
</div>
</body>
</html>
