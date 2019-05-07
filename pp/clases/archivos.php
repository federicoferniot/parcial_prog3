<?php

include_once "./clases/proveedor.php";
include_once "./clases/pedido.php";

class Archivo{

    private static $ruta_archivo_proveedores = "./data/proveedores.txt";
    private static $ruta_archivo_pedidos = "./data/pedidos.txt";

    public static function obtener_proveedores(){
        $array_archivo = array();
        $archivo = fopen(self::$ruta_archivo_proveedores, "r");
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

    public static function obtener_pedidos(){
        $array_archivo = array();
        $archivo = fopen(self::$ruta_archivo_pedidos, "r");
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

    public static function agregar_proveedor($proveedor){
        $archivo = fopen(self::$ruta_archivo_proveedores, "a");
        fwrite($archivo, $proveedor);
        fwrite($archivo, PHP_EOL);
        fclose($archivo);
    }

    public static function cargar_foto($origen, $destino){
        if(file_exists("./data/fotos/".$destino)){
            copy("./data/fotos/".$destino, "./data/fotos/backup/".(date('Y-m-d').$destino));
        }
        move_uploaded_file($origen, "./data/fotos/".$destino);
    }


    public static function modificar_proveedor($id, $nombre, $email, $foto){
        
    }


    public static function agregar_pedido($pedido, $id_proveedor){
        $array_proveedores = self::obtener_proveedores();
        foreach($array_proveedores as $proveedor){
            if($proveedor->id == $id_proveedor){
                $archivo = fopen(self::$ruta_archivo_pedidos, "a");
                fwrite($archivo, $pedido);
                fwrite($archivo, PHP_EOL);
                fclose($archivo);
            }
        }
    }
}