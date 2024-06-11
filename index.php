<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        <?php
        include_once './controllers/ClientesController.php';
        include_once './Services/classes/Cliente.php';
        $clienteController = new ClientesController();
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Restaurante</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">



                    <li class="nav-item">
                        <form action="index.php?controller=Pedidos&action=obtenerPedidos" method="post">
                            <?php $clienteController->mostrarClientes(); ?>

                        </form>

                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <?php
            include 'frontcontroller.php';
            ?>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
