<?php
require_once("../../../../Conection/db.php");
require_once("../../../../Controller/articulo.controller.php");


$id_articulo = $_GET['id_articulo'];
$id_imagen = $_GET['id_imagen'];

eliminar($id_articulo, $id_imagen);
header('Location: index.php');
?>
