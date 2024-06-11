<?php

require_once __DIR__ . '/classes/Menu.php';

class MenusService {

    public function request_curl() {
        $urlmiservicio = "http://localhost/_servWeb/serRestaurante/Menus.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $menusData = json_decode($res, true);

            if ($menusData !== null) {
                $menus = [];
                foreach ($menusData as $menuData) {
                    $menu = new Menu($menuData);
                    $menus[] = $menu;
                }
                return $menus;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function eliminarMenu($idmenu) {
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Menus.php?id=" . $idmenu;

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true); // Indica a cURL que devuelva la respuesta en lugar de imprimirla
        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la eliminación correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;
        } else {
            // Mostrar un mensaje de error si no se pudo realizar la eliminación
        }

        // Cerrar la conexión cURL
        curl_close($conexion);
    }

    function actualizar_pasaje($idmenu, $nombre, $pvp, $tipo) {
        // Datos a enviar en la solicitud
        $datos = array(
            "idmenu" => $idmenu,
            "nombre" => $nombre,
            "pvp" => $pvp,
            "tipo" => $tipo,
        );

        // Convertir los datos a formato JSON
        $envio = json_encode($datos);

        // URL del servicio web para actualizar un pasaje
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Menus.php";

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');

        // Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));

        // Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);

        // para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la actualización correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;
        }


        // Cerrar la conexión cURL
        curl_close($conexion);
    }

    function insertarMenu($nombre, $pvp, $tipo) {
        $envio = json_encode(array(
            "nombre" => $nombre,
            "pvp" => $pvp,
            "tipo" => $tipo
        ));

        $urlmiservicio = "http://localhost/_servWeb/serRestaurante/Menus.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        // Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        // Tipo de petición
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        // Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        // para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            // Decodificar la respuesta JSON
            $respuesta = json_decode($res, true);
            // Verificar si se obtuvo un resultado
            if (isset($respuesta['resultado'])) {
                // Mostrar el resultado obtenido
                echo $respuesta['resultado'];
            }
        }
        curl_close($conexion);
    }
}
