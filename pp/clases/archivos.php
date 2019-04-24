<?php

include_once "/../clases/proveedor.php";
include_once "/../clases/pedido.php";

class Archivo{
    static function obtener_array_proveedores(){
        $array_archivo = array();
        $archivo = fopen("data/proveedores.txt", "r");
        while(!feof($archivo)){
            $proveedor_leido = trim(fgets($archivo));
            if($proveedor_leido != ""){
                $array_proveedores = explode(";", $proveedor_leido);
                array_push($array_archivo, new Proveedor($array_proveedores[0], $array_proveedores[1], $array_proveedores[2], $array_proveedores[3]));
            }
        }
        fclose($archivo);
        return $array_archivo;
    }

    static function obtener_array_pedidos(){
        $array_archivo = array();
        $archivo = fopen("data/pedidos.txt", "r");
        while(!feof($archivo)){
            $pedido_leido = trim(fgets($archivo));
            if($pedido_leido != ""){
                $array_pedido = explode(";", $pedido_leido);
                array_push($array_archivo, new Pedido($array_pedido[0], $array_pedido[1], $array_pedido[2]));
            }
        }
        fclose($archivo);
        return $array_archivo;
    }

    static function agregar_proveedor($proveedor){
        $archivo = fopen("data/proveedores.txt", "a");
        fwrite($archivo, $proveedor->toString());
        fwrite($archivo, PHP_EOL);
        fclose($archivo);
    }

    static function agregar_pedido($pedido){
        $archivo = fopen("data/pedidos.txt", "a");
        fwrite($archivo, $pedido->toString());
        fwrite($archivo, PHP_EOL);
        fclose($archivo);
    }
}