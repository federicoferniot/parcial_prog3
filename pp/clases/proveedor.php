<?php

class Proveedor{
    public $id;
    public $nombre;
    public $email;
    public $foto;

    public function __construct($id, $nombre, $email, $foto){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->foto = $foto;
    }
    public function toString(){
        $proveedor = ($this->id).";";
        $proveedor .= ($this->nombre).";";
        $proveedor .= ($this->email).";";
        $proveedor .= ($this->foto).";";
        return $proveedor;
    }
}