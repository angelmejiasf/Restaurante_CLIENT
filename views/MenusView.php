<?php

class MenusView {

    public function mostrarMenus($menus) {
        echo '<script>
            function confirmDelete(event) {
                if (!confirm("¿Estás seguro de que deseas eliminar este menú?")) {
                    event.preventDefault();
                }
            }
        </script>';
        
        if($menus){
            
        
        echo "<h2>Menus</h2>";
        echo "<table border='1' >";
        echo "<tr><th>ID Menu</th><th>Nombre</th><th>PVP</th><th>Fecha Creacion</th><th>Tipo</th><th>Acciones</th></tr>";

        foreach ($menus as $menu) {
            echo "<tr>";
            echo "<td>{$menu->getIdmenu()}</td>";
            echo "<td>{$menu->getNombre()}</td>";
            echo "<td>{$menu->getPvp()} €</td>";
            echo "<td>{$menu->getFechacreacion()}</td>";
            echo "<td>{$menu->getTipo()}</td>";
            echo "<td>";
            echo "<form action='index.php?controller=Menus&action=eliminarMenu' method='post' onsubmit='confirmDelete(event);'>";
            echo "<input type='hidden' name='idmenu' value='{$menu->getIdmenu()}'>";
            echo "<input type='submit' name='eliminar_menu' value='Eliminar'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='index.php?controller=Menus&action=mostrarFormActualizacion' method='post'>";
            echo "<input type='hidden' name='idmenu' value='{$menu->getIdmenu()}'>";
            echo "<input type='submit' name='actualizar_menu' value='Actualizar'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        
        }else{
            echo "<h2>No hay menus para mostrar</h2>";
        }
    }

    public function formActualizacion($menus, $idmenu) {
        echo "<h2>Actualizar Menu</h2>";
        echo "<form action='index.php?controller=Menus&action=actualizar_menu' method='post' class='pasaje-form'>";

        foreach ($menus as $menu) {
            if ($menu->getIdmenu() == $idmenu) {
                echo "<input type='hidden' name='idmenu' value='{$menu->getIdmenu()}'>";

                echo "<label class='clase-label'>Nombre</label><br>";
                echo "<input type='text' name='nombre' value='{$menu->getNombre()}'><br>";

                echo "<label class='clase-label'>Precio</label><br>";
                echo "<input type='text' name='pvp' value='{$menu->getPvp()}'><br>";

                echo "<label class='clase-label'>Tipo</label><br>";
                echo "<input type='text' name='tipo' value='{$menu->getTipo()}'><br>";
            }
        }


        echo "<input type='submit' name='actualizar_menu' value='Actualizar' class='submit-btn'>";
        echo "</form>";
    }

    public function insertarMenu() {
        echo "<h2>Insertar Nuevo Menu</h2>";
        echo "<form action='index.php?controller=Menus&action=insertarMenu' method='post' class='pasaje-form'>";

        echo "<input type='hidden' name='idmenu' value='idmenu'>";

        echo "<label class='clase-label'>Nombre</label><br>";
        echo "<input type='text' name='nombre'><br>";

        echo "<label class='clase-label'>Precio</label><br>";
        echo "<input type='number' name='pvp'><br>";

        echo "<label class='clase-label'>Tipo</label><br>";
        echo "<input type='text' name='tipo'><br>";

        echo "<input type='submit' name='insertar_menu' value='Insertar' class='submit-btn'>";
        echo "</form>";
    }

    public function btnInsertar() {
        echo '<form action="index.php?controller=Menus&action=mostrarFormInsertar" method="post">';
        echo "<button class='submit-btn'>Insertar un menu</button>";
        echo "</form>";
    }

    public function volverAlHome() {

        echo '<form action="index.php" method="post">';
        echo "<button class='volver-btn'>Volver</button>";
        echo "</form>";
    }

    public function volverAtras() {
        echo '<button class="volver-btn" onclick="window.history.back();">Volver</button>';
    }
}
