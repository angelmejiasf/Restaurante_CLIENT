<?php

include_once './Services/MenusService.php';
include_once './views/MenusView.php';

class MenusController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new MenusService();
        $this->view = new MenusView();
    }

    public function mostrarMenus() {
        $menus = $this->service->request_curl();

        $this->view->mostrarMenus($menus);
        $this->view->btnInsertar();
    }

    public function eliminarMenu() {
        if (isset($_POST['eliminar_menu'])) {
            $idmenu = $_POST['idmenu'];

            $this->service->eliminarMenu($idmenu);
            $this->view->volverAlHome();
        }
    }

    public function mostrarFormActualizacion() {
        if (isset($_POST['idmenu'])) {
            $idmenu = $_POST['idmenu'];

            $menus = $this->service->request_curl();
            $this->view->formActualizacion($menus, $idmenu);
            $this->view->volverAtras();
        }
    }

    public function actualizar_menu() {
        if (isset($_POST['actualizar_menu'])) {
            $idmenu = $_POST['idmenu'];
            $nombre = $_POST['nombre'];
            $pvp = $_POST['pvp'];
            $tipo = $_POST['tipo'];

            $this->service->actualizar_pasaje($idmenu, $nombre, $pvp, $tipo);
            $this->view->volverAlHome();
        }
    }

    public function mostrarFormInsertar() {
        $this->view->insertarMenu();
    }

    public function insertarMenu() {
        try {
            if ($this->service->insertarMenu($_POST["nombre"], $_POST["pvp"], $_POST["tipo"])) {

                quit();
            } else {
                throw new Exception("Error 404 . No se ha podido insertar el pasaje");
            }
        } catch (Exception $exc) {
            
        }

        $this->view->volverAlHome();
    }
}
