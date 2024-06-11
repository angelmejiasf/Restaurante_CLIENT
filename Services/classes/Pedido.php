<?php

class Pedido {

    private $idpedidomenu;
    private $idcliente;
    private $idmenu;
    private $fechapedido;

    public function __construct($assoc) {
        $this->idpedidomenu = $assoc['IDPEDIDOMENU'] ?? null;
        $this->idcliente = $assoc['IDCLIENTE'] ?? null;
        $this->idmenu = $assoc['IDMENU'] ?? null;
        $this->fechapedido = $assoc['FECHAPEDIDO'] ?? null;
    }

    public function getIdpedidomenu() {
        return $this->idpedidomenu;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getIdmenu() {
        return $this->idmenu;
    }

    public function getFechapedido() {
        return $this->fechapedido;
    }

    public function setIdpedidomenu($idpedidomenu): void {
        $this->idpedidomenu = $idpedidomenu;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setIdmenu($idmenu): void {
        $this->idmenu = $idmenu;
    }

    public function setFechapedido($fechapedido): void {
        $this->fechapedido = $fechapedido;
    }
}
