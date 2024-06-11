<?php

include_once './Services/ClientesService.php';
include_once './views/ClientesView.php';

class ClientesController {

    private $view;
    private $service;

    public function __construct() {
        $this->view = new ClientesView();
        $this->service = new ClientesService();
    }

    public function mostrarClientes() {
        $clientes = $this->service->request_curl();

        $this->view->mostrarClientes($clientes);
    }

    
}
