<?php

class PedidosView {

    public function mostrarTablaPedidos($pedidos, $conteoPedidos, $clientes, $menus) {
        if ($pedidos) {

            foreach ($clientes as $cliente) {
                if ($pedidos[0]->getIdcliente() == $cliente->getIdcliente()) {
                    $nombrecliente = $cliente->getNombre();
                    break;
                }
            }

            echo "<h2>Pedidos de $nombrecliente</h2>";

            $conteo = isset($conteoPedidos[$pedidos[0]->getIdcliente()]) ? $conteoPedidos[$pedidos[0]->getIdcliente()] : 0;
            echo "<h3>Numero de pedidos del cliente: $conteo</h3>";

            echo "<table border='1'>";
            echo "<tr><th>ID Pedido</th><th>Menu</th><th>Fecha</th><th>PVP</th><th>Accion</th></tr>";

            $sumaPVP = 0;
            foreach ($pedidos as $pedido) {

                echo "<tr>";
                echo "<td>{$pedido->getIdpedidomenu()}</td>";

                foreach ($menus as $menu) {
                    if ($pedido->getIdmenu() == $menu->getIdmenu()) {
                        $nombreMenu = $menu->getNombre();
                        $valorpvp = $menu->getPvp();

                        $sumaPVP += $valorpvp;
                    }
                }
                echo "<td>$nombreMenu</td>";
                echo "<td>{$pedido->getFechapedido()}</td>";

                echo "<td>$valorpvp €</td>";

                echo "<td>";
                echo "<form action='index.php?controller=Pedidos&action=eliminarPedido' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='idpedido' value='{$pedido->getIdpedidomenu()}'>";
                echo "<input type='submit' name='borrar_pedido' value='Borrar' class='submit-btn'>";
                echo "</form>";

                echo "<form action='index.php?controller=Pedidos&action=mostrarFormActualizacion' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='idpedido' value='{$pedido->getIdpedidomenu()}'>";
                echo "<input type='submit' name='actualizar_pedido' value='Actualizar' class='submit-btn'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<h4>Precio total: $sumaPVP €</h4>";
        } else {
            echo "<h2>No hay pedidos para el cliente</h2>";
        }
    }

    public function mostrarFormAct($pedidos, $menus, $clientes) {


        echo "<form action='index.php?controller=Pedidos&action=actualizarPedido' method='post' class='pasaje-form'>";

        //echo "<input type='hidden' name='id_pedido' value='{$pedido->getIdpedidomenu()}'>";
        $nombrecliente = '';
        foreach ($pedidos as $pedido) {

            echo "<input type='hidden' name='idpedido' value='{$pedido->getIdpedidomenu()}'><br>";

            foreach ($clientes as $cliente) {
                if ($pedido->getIdcliente() == $cliente->getIdcliente()) {
                    $nombrecliente = $cliente->getNombre();
                }
            }
        }

        echo "<label class='clase-label'>Cliente</label><br>";
        echo $nombrecliente . "<br>";

        echo "<label class='clase-label'>Menu</label><br>";
        $nombreMenu = '';
        $pvp = '';
        foreach ($pedidos as $pedido) {
            foreach ($menus as $menu) {
                if ($menu->getIdmenu() == $pedido->getIdmenu()) {
                    $nombreMenu = $menu->getNombre();
                }
            }

            echo $nombreMenu . "<br>";

            echo "<label class='clase-label'>Nuevo menu para el cliente:</label><br>";

            echo "<select name='menu'>";

            foreach ($menus as $menu) {
                echo "<option value='{$menu->getIdmenu()}'>{$menu->getNombre()}</option>";
            }
        }
        echo "</select><br>";
        echo "<br>";

        echo "<input type='submit' name='actualizar_pedido' value='Actualizar' class='submit-btn'><br>";

        echo "</form>";
    }

    public function mostrarFormInsertado($menus, $clientes) {
        echo "<form action='index.php?controller=Pedidos&action=insertarPedido' method='post' class='pasaje-form'>";
        echo "<label class='clase-label'>Selecciona el menu a añadir para el cliente</label>";

        $selectedClienteId = isset($_POST['idcliente']) ? $_POST['idcliente'] : '';

        // Filtrar y mostrar solo el cliente seleccionado
        foreach ($clientes as $cliente) {
            if ($cliente->getIdcliente() == $selectedClienteId) {
                echo "<input type='hidden' name='idcliente' value='" . $cliente->getIdcliente() . "'>";
                echo "<p>" . $cliente->getNombre() . "</p><br>";
                break;
            }
        }
        echo "<select name='menu'>";
        foreach ($menus as $menu) {
            echo "<option value='{$menu->getIdmenu()}'>{$menu->getNombre()}</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "<input type='submit' name='actualizar_pedido' value='Insertar' class='submit-btn'><br>";

        echo "</form>";
    }

    public function botonInsertar($selectedClienteId) {
        echo '<form action="index.php?controller=Pedidos&action=mostrarFormInsertado" method="post">';
        echo "<input name='idcliente' type='hidden' value='" . htmlspecialchars($selectedClienteId) . "'>";
        echo "<button class='submit-btn' name='insertarnuevopedido'>Insertar Nuevo Pedido</button>";
        echo "</form>";
    }

    public function volverAlHome() {

        echo '<form action="index.php" method="post">';
        echo "<button class='volver-btn'>Volver</button>";
        echo "</form>";
    }
    
     public function volverAtras(){
         echo '<button class="volver-btn" onclick="window.history.back();">Volver</button>';
    }
}
