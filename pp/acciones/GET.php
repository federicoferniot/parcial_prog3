<?php
include_once "./clases/proveedor.php";
include_once "./clases/pedido.php";
include_once "./clases/archivos.php";

switch($_GET["caso"]){
    case "consultarProveedor":
        $nombre = $_GET["nombre"];
        $array_proveedores = Archivo::obtener_proveedores();
        $encontrado = false;
        foreach ($array_proveedores as $proveedor){
            if(strcasecmp($proveedor->nombre, $nombre)==0){
                echo $proveedor."<br>";
                $encontrado = true;
            }
        }
        if(!$encontrado) echo "No existe proveedor ".$nombre;
        break;
    case "proveedores":
        $array_proveedores = Archivo::obtener_proveedores();
        foreach ($array_proveedores as $proveedor){
            echo $proveedor."<br>";
        }
        break;
    case "listarPedidos":
        $array_pedidos = Archivo::obtener_pedidos();
        $array_proveedores = Archivo::obtener_proveedores();
        foreach ($array_pedidos as $pedido){
            foreach($array_proveedores as $proveedor){
                if($pedido->idProveedor == $proveedor->id){
                    echo $pedido.$proveedor->nombre."<br>";
                    break;
                }
            }
        }
        break;
    case "listarPedidoProveedor":
        $array_pedidos = Archivo::obtener_pedidos();
        $id = $_GET["id"];
        foreach($array_pedidos as $pedido){
            if($pedido->idProveedor == $id){
                echo $pedido;
            }
        }
        break;
}
