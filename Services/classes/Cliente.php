<?php

class Cliente {

    private $idcliente;
    private $nombre;
    private $localidad;
    private $pais;
    private $telefono;

    public function __construct($assoc) {
        $this->idcliente = $assoc['IDCLIENTE'] ?? null;
        $this->nombre = $assoc['NOMBRE'] ?? null;
        $this->localidad = $assoc['LOCALIDAD'] ?? null;
        $this->pais = $assoc['PAIS'] ?? null;
        $this->telefono = $assoc['TELEFONO'] ?? null;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setLocalidad($localidad): void {
        $this->localidad = $localidad;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }
}
