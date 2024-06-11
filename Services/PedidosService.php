<?php

require_once __DIR__ . '/classes/Pedido.php';

class PedidosService {

    public function obtenerPedidosPorCliente($idcliente) {
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php?idcliente=" . urlencode($idcliente);

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $pedidosData = json_decode($res, true);

            if ($pedidosData !== null) {
                $pedidos = [];
                foreach ($pedidosData as $pedidoData) {
                    $pedido = new Pedido($pedidoData);
                    $pedidos[] = $pedido;
                }
                return $pedidos;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function obtenerInfoPedidos($idpedido) {
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php?idpedido=" . urlencode($idpedido);

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $pedidosData = json_decode($res, true);

            if ($pedidosData !== null) {
                $pedidos = [];
                foreach ($pedidosData as $pedidoData) {
                    $pedido = new Pedido($pedidoData);
                    $pedidos[] = $pedido;
                }
                return $pedidos;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function obtenerConteoPedidosPorCliente() {
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php?accion=contar";

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $conteoPedidos = json_decode($res, true);
            return $conteoPedidos;
        } else {
            return false;
        }
    }

    public function request_delete($idpedido) {

        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php?idpedido=" . $idpedido;

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la eliminación correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;
        }

        // Cerrar la conexión cURL
        curl_close($conexion);
    }

    function actulizarPedido($idmenu, $idpedido) {
        $datos = array(
            "IDMENU" => $idmenu,
            "IDPEDIDOMENU" => $idpedido
        );

        $envio = json_encode($datos);
        $urlMiServicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php";

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        if ($res) {
            echo $res;
        }

        curl_close($conexion);
    }

    function insertarpedido($menu, $idcliente) {
        $envio = json_encode(array(
            "menu" => $menu,
            "idcliente" => $idcliente,
        ));

        $urlmiservicio = "http://localhost/_servWeb/serRestaurante/Pedidos.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        $respuesta = json_decode($res, true);

        echo $respuesta['resultado'];
    }
}
