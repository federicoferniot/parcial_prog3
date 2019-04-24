<?php
include_once "/../clases/proveedor.php";
include_once "/../clases/pedido.php";
include_once "/../clases/archivos.php";

switch($_POST["caso"]){
    case "cargarProveedor":
        if($_POST["id"]!="" && $_POST["nombre"]!="" && $_POST["email"]!=""){
            $origen = $_FILES["foto"]["tmp_name"];
            $array_nombre_archivo = explode(".", $_FILES["foto"]["name"]);
            $nombre_archivo = ($_POST["id"]).".".($_POST["nombre"]).".";
            $nombre_archivo .= $array_nombre_archivo[sizeof($array_nombre_archivo)-1];
            $destino = "data/fotos/".$nombre_archivo;
            move_uploaded_file($origen, $destino);

            $proveedor = new Proveedor($_POST["id"], $_POST["nombre"], $_POST["email"], $nombre_archivo);
            Archivo::agregar_proveedor($proveedor);
        }
        break;
    case "hacerPedido":
        $array_proveedores = Archivo::obtener_array_proveedores();
        if($_POST["producto"]!="" && $_POST["cantidad"]!="" && $_POST["id"]!=""){
            $pedido = new Pedido($_POST["producto"], $_POST["cantidad"], $_POST["id"]);
            foreach($array_proveedores as $proveedor){
                if($proveedor->id == $_POST["id"]){
                    Archivo::agregar_pedido($pedido);
                    break;
                }
            }
        }
        break;
    case "modificarProveedor":
        if($_POST["id"]!="" && $_POST["nombre"]!="" && $_POST["email"]!=""){
            $array_proveedores = Archivo::obtener_array_proveedores();
        }
        break;
}
