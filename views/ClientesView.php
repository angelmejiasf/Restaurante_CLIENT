<?php

class ClientesView {

    public function mostrarClientes($clientes) {
        $selectedClienteId = isset($_POST['idcliente']) ? $_POST['idcliente'] : '';

        echo "<form action='index.php?controller=Pedidos&action=obtenerPedidos' method='post'>";
        echo '<label tabindex="-1" aria-disabled="true">Selecciona cliente</label>';
        echo "<select name='idcliente'>";
        foreach ($clientes as $cliente) {
            $selected = $cliente->getIdcliente() == $selectedClienteId ? 'selected' : '';
            echo "<option value='" . $cliente->getIdcliente() . "' " . $selected . ">" . $cliente->getNombre() . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Ver pedidos clientes' class='submit-btn'>";
        echo "</form>";
    }
    
   
}
