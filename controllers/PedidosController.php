<?php

require_once './Services/PedidosService.php';
require_once './views/PedidosView.php';
include_once './Services/ClientesService.php';
include_once './Services/MenusService.php';

class PedidosController {

    private $view;
    private $service;
    private $clientesService;
    private $menusService;

    public function __construct() {
        $this->service = new PedidosService();
        $this->view = new PedidosView();
        $this->clientesService = new ClientesService();
        $this->menusService = new MenusService();
    }

    public function obtenerPedidos() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idcliente'])) {
            $idcliente = $_POST['idcliente'];
            $conteoPedidos = $this->service->obtenerConteoPedidosPorCliente();
            $pedidos = $this->service->obtenerPedidosPorCliente($idcliente);
            $menus = $this->menusService->request_curl();
            $clientes = $this->clientesService->request_curl();

            $this->view->mostrarTablaPedidos($pedidos, $conteoPedidos, $clientes, $menus);
            $this->view->botonInsertar($idcliente);
            $this->view->volverAlHome();
        }
    }

    public function eliminarPedido() {
        if (isset($_POST['borrar_pedido'])) {
            $idpedido = $_POST['idpedido'];
            $this->service->request_delete($idpedido);
            $this->view->volverAtras();
        }
    }

    public function mostrarFormActualizacion() {
        if (isset($_POST['actualizar_pedido'])) {
            $idpedido = $_POST['idpedido'];
            $pedidos = $this->service->obtenerInfoPedidos($idpedido);
            $menus = $this->menusService->request_curl();
            $clientes = $this->clientesService->request_curl();

            $this->view->mostrarFormAct($pedidos, $menus, $clientes);
            $this->view->volverAtras();
        }
    }

    public function mostrarFormInsertado() {
        if (isset($_POST['insertarnuevopedido'])) {
            $idcliente = $_POST['idcliente'];
            $menus = $this->menusService->request_curl();
            $clientes = $this->clientesService->request_curl();

            $this->view->mostrarFormInsertado($menus, $clientes);
            $this->view->volverAtras();
        }
    }

    public function insertarPedido() {

        try {
            $resultado = $this->service->insertarpedido($_POST["menu"], $_POST["idcliente"]);
            echo $resultado;
            $this->view->volverAtras();
        } catch (Exception $exc) {
            error_log("Excepción capturada: " . $exc->getMessage());
            echo $exc->getMessage();
            $this->view->volverAtras();
        }
    }

    public function actualizarPedido() {
        if (isset($_POST['actualizar_pedido'])) {
            $idmenu = $_POST['menu'];
            $idpedido = $_POST['idpedido'];

            $this->service->actulizarPedido($idmenu, $idpedido);
            $this->view->volverAtras();
        }
    }
}
