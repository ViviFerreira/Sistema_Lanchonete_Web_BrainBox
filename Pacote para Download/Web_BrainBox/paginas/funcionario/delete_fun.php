<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Funcionário | Deletar Conta</title>
        <style>
            .confirmacao{
                background:rgb(255, 255, 255);
                width:30%;
                min-width:200px;
                transform: translate(-50%,-50%);
                margin-top: -25%;
                margin-left:55%;
                position:relative;
                box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.24);
            }
            .modal__header{
                background:#323132;
                color:rgba(255, 255, 255, 0.8);
                padding:1rem;
                position:relative;
            }
            footer{
                padding:1rem;
                height: 60px;
                border-top:1px solid #ccc;
            }
            footer button{
                text-decoration: none;
                width:25%;
                padding:5px;
                margin-top: -5px;
                background:#323132;
                display:inline-block;
                border-radius:3px;
                margin-left: 4px;
                color:#fff;
                font-size: 12px;
                text-align: center;
                text-transform: uppercase;
                font-weight: 400;
                font-family: 'Rubik', sans-serif;
            }
            .modal__body p{
                text-align: center;
                padding-top: 5px;
                font-size:15px;
                color:#222d32;
                font-weight: 500;
                font-family: 'Rubik', sans-serif;
            }
            .modal__body {
                height: 45px;
            }
        </style>
    </head>
    <body>
        <?php
        include_once './funcionario.php';
        include_once '../../classes/conexao.php';
        if (isset($_SESSION['funcionario'])) {
            
        } else {
            header("location:entrar.php");
            exit();
        }
        ?>
        <div class="confirmacao">
            <header class="modal__header">
                <h2 class="modal__title">Você não tem permissão para excluir sua conta</h2>
            </header>
            <footer class="footer">
                <center>
                    <button><?php echo "<a href=cadastro_cliente.php" . "><font color='#fff'>Ok</font></a>"; ?></button></center>
            </footer>
        </div>
    </body>
</html>
