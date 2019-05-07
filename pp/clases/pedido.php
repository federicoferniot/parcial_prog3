<?php

class Pedido{
    public $producto;
    public $cantidad;
    public $idProveedor;

    public function __construct($producto, $cantidad, $idProveedor){
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->idProveedor = $idProveedor;
    }
    public function __toString(){
        $pedido = ($this->producto).";";
        $pedido .= ($this->cantidad).";";
        $pedido .= ($this->idProveedor).";";
        return $pedido;
    }
}