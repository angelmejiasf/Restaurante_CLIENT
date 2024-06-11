<?php

class ClientesService {

    public function request_curl() {
        $urlmiservicio = "http://localhost/_servWeb/serRestaurante/Clientes.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $clientesData = json_decode($res, true);

            if ($clientesData !== null) {
                $clientes = [];
                foreach ($clientesData as $clienteData) {
                    $cliente = new Cliente($clienteData);
                    $clientes[] = $cliente;
                }
                return $clientes;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
