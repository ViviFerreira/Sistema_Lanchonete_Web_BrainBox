<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <title>Administrador | Início</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
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
            $consulta4 = mysqli_query($conn, "select * from produto");
            $resultado4 = mysqli_num_rows($consulta4);
            $consulta5 = mysqli_query($conn, "select * from compra");
            $resultado5 = mysqli_num_rows($consulta5);
        } else {
            header("location:../entrar.php");
            exit();
        }
        ?>
        <div class="well">
            <h3>Bem-Vindo Administrador!</h3>
            <p>Reunimos alguns links para você começar. </p>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1><i id="car" class="fas fa-user-friends"></i></h1><p>Clientes</p></div>

                    <div class="theback"><h1>Total de cadastros</h1><p><?php echo $resultado1; ?> <br> <a href="cliente.php"><i class="fas fa-eye"style="font-size:20px; padding-left: 6em;"></i></a></p>
                    </div>
                </div>
                <div class="thecard">

                    <div class="thefront"><h1><i id="car" class="fas fa-user-friends"></i></h1><p>Funcionários</p></div>
                    <div class="theback"><h1>Total de cadastros</h1><p><?php echo $resultado2; ?> <br> <a href="funcionario.php"><i class="fas fa-eye" style="font-size:20px; padding-left: 6em;"></i></a></p></div>
                </div>
                <div class="thecard">
                    <div class="thefront"><h1><i id="car" class="fas fa-user-friends"></i></h1><p>Gerentes</p></div>
                    <div class="theback"><h1>Total de cadastros</h1><p><?php echo $resultado3; ?> <br> <a href="gerente.php"><i class="fas fa-eye" style="font-size:20px; padding-left: 6em;"></i></a></p></div>
                </div>
                <div class="thecard">
                    <div class="thefront"><h1><i id="car"  class="fas fa-hamburger"></i></h1><p>Produtos</p></div>
                    <div class="theback"><h1>Total de cadastros</h1><p><?php echo $resultado4; ?> <br> <a href="produto.php"><i class="fas fa-eye" style="font-size:20px; padding-left: 6em;"></i></a></p></div>
                </div>
                <div class="thecard">
                    <div class="thefront"><h1><i id="car" class="fas fa-concierge-bell"></i></h1><p>Pedidos</p></div>
                    <div class="theback"><h1>Total de cadastros</h1><p><?php echo $resultado5; ?> <br> <a href="#"><i class="fas fa-eye"style="font-size:20px; padding-left: 6em;"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="more_opcoe">
                <a href="novos_cadastros.php"><button type="button" class="btn btn-primary btn-sm"><i id="icone_opco" class="fas fa-plus"></i> Usuário</button></a>
                <a href="cadastro_produto.php"><button type="button" class="btn btn-secondary btn-sm"><i id="icone_opco" class="fas fa-plus"></i> Produto</button></a>
            </div>
        </div>
    </body>
</section>
</div>
<!-- Pushy JS -->


</body>
</html>
