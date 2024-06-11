<?php

class Menu {

    private $idmenu;
    private $nombre;
    private $descripcion;
    private $pvp;
    private $fechacreacion;
    private $tipo;

    public function __construct($assoc) {
        $this->idmenu = $assoc['IDMENU'] ?? null;
        $this->nombre = $assoc['NOMBRE'] ?? null;
        $this->descripcion = $assoc['DESCRIPCION'] ?? null;
        $this->pvp = $assoc['PVP'] ?? null;
        $this->fechacreacion = $assoc['FECHACREACION'] ?? null;
        $this->tipo = $assoc['TIPO'] ?? null;
    }

    public function getIdmenu() {
        return $this->idmenu;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPvp() {
        return $this->pvp;
    }

    public function getFechacreacion() {
        return $this->fechacreacion;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setIdmenu($idmenu): void {
        $this->idmenu = $idmenu;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setPvp($pvp): void {
        $this->pvp = $pvp;
    }

    public function setFechacreacion($fechacreacion): void {
        $this->fechacreacion = $fechacreacion;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }
}
