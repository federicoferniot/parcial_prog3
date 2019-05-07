<?php
include_once "./clases/proveedor.php";
include_once "./clases/pedido.php";
include_once "./clases/archivos.php";

switch($_POST["caso"]){
    case "cargarProveedor":
        if($_POST["id"]!="" && $_POST["nombre"]!="" && $_POST["email"]!="" && isset($_FILES["foto"]["tmp_name"])){
            $origen = $_FILES["foto"]["tmp_name"];
            $array_nombre_archivo = explode(".", $_FILES["foto"]["name"]);
            $nombre_archivo = ($_POST["id"]).".".($_POST["nombre"]).".";
            $nombre_archivo .= $array_nombre_archivo[sizeof($array_nombre_archivo)-1];
            $proveedor = new Proveedor($_POST["id"], $_POST["nombre"], $_POST["email"], $nombre_archivo);
            Archivo::cargar_foto($origen, $nombre_archivo);
            Archivo::agregar_proveedor($proveedor);
        }
        break;
    case "hacerPedido":
        if($_POST["producto"]!="" && $_POST["cantidad"]!="" && $_POST["id"]!=""){
            $pedido = new Pedido($_POST["producto"], $_POST["cantidad"], $_POST["id"]);
            Archivo::agregar_pedido($pedido, $_POST["id"]);
        }
        break;
    case "modificarProveedor":
        if($_POST["id"]!="" && $_POST["nombre"]!="" && $_POST["email"]!="" isset($_FILES["foto"]["tmp_name"])){
            Archivo::modificar_proveedor($_POST["id"], $_POST["nombre"], $_POST["email"], $_FILES["foto"]["tmp_name"]);
        }
        break;
}
