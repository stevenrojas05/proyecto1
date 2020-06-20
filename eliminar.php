<?php 
session_start();
$id = $_SESSION['id'];

require 'database.php';

$sql = "DELETE FROM usuarios WHERE id='$id'";

            if($conexion->query($sql) === true){
                session_destroy();
                header("location: registro.php");
            }else{
                die("Error al insertar datos: " . $conexion->error);
            }

?>