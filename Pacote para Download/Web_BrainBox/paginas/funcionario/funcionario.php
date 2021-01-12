<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Funcionário</title>
        <script src="../../js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../boots/css/bootstrap.css">
        <link rel="stylesheet" href="../../css/style_menu.css">
        <link rel="stylesheet" href="../../css/style_private_areas.css" type="text/css" media="all" />
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../../boots/js/bootstrap.js"></script>
        <script src="js/personalizado.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['funcionario'])) {
            $usuario = $_SESSION['funcionario'];
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $id = $_SESSION['id_fun'];
        } else {
            header("location:../entrar.php");
            exit();
        }
        ?>
        <header> 
            <div class="conta">
                <i id="user_top" class="fas fa-user-circle"></i><button type="button" class="btn btn-warning btn-sm text-dark" data-toggle="modal" data-target="#conta" style="margin-top:-4.8em;">
                    Conta
                </button>
            </div>
            <button class="menu-btn"><i class="fas fa-bars"></i></button>
            <div class="logotipo"
                 <p>BrainBox</p>
            </div>
        </header>
        <nav class="pushy pushy-left" data-focus="#first-link">
            <div class="pushy-content">
                <ul>
                    <li class="pushy-submenu">
                        <button><i id="icone_menu" class="fas fa-user"></i></i>Cliente</button>
                        <ul>
                            <li class="pushy-link"><a href="cadastro_cliente.php"><i id="icone_submenu" class="fas fa-plus"></i>Novo cliente</a></li>
                            <li class="pushy-link"><a href="cliente.php"><i id="icone_submenu" class="fas fa-clipboard-list"></i>Cadastrados</a></li>
                    </li>
                </ul>
                </li>
                <li class="pushy-submenu">
                    <button><i id="icone_menu" class="fas fa-concierge-bell"></i>Pedido</button>
                    <ul>
                        <li class="pushy-link"><a href="#"><i id="icone_submenu" class="fas fa-plus"></i>Novo pedido</a></li>
                        <li class="pushy-link"><a href="#"><i id="icone_submenu" class="fas fa-clipboard-list"></i>Cadastrados</a></li>
                        <li class="pushy-link"><a href="#"><i id="icone_submenu" class="fas fa-exchange-alt"></i> Alterar status</a></li>
                        <li class="pushy-link"><a href="#"><i id="icone_submenu" class="fas fa-print"></i>  Imprimir</a></li>
                </li>
                </ul>
                </li>
            </div>
        </nav>
        <div class="site-overlay"></div>
        <section id="main">
            <div class="modal fade" id="conta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark" style="font-family:'Roboto Condensed', sans-serif;">
                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 8em; font-size: 20px;"><strong><i id="ops" class="fas fa-portrait"></i>Detalhes da Conta</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"style="font-family:'Roboto Condensed', sans-serif;">
                            <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em; font-size: 17px; font-weight: 500;">Nível de acesso: Funcionário</h5>
                            <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em; font-size: 17px; font-weight: 500;">Nome: <?php echo $usuario; ?></h5>
                            <h5 class="lead" id="exampleModalLabel" style="padding-left: 1em;font-size: 17px; font-weight: 500;">E-mail: <?php echo $email; ?></h5>
                            <div class="modal1__body">
                                <ul>
                                    <a href="#"><li><i id="ops" class="fas fa-pen-square"></i><?php echo "<a href=editar_funcionario.php?editar=" . $id . "><font color='#222'>Editar dados</font></a>"; ?></li></a>
                                    <a href="#"><li><i id="ops" class="fas fa-trash-alt"></i></i><?php echo "<a href='apagar_funcionario.php?id=" . $id . "' data-confirm='Tem certeza de que deseja excluir o usuário selecionado?'><font color='#222'>Deletar conta</font></a>" ?></li></a>
                                    <a href="../sair.php"><li><i id="ops" class="fas fa-sign-out-alt"></i></i>Sair da conta</li></a>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pushy JS -->
        <script src="../../js/pushy.min.js"></script>
    </body>
</html>
