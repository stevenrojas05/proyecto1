<?php 
require 'menu.html';
require 'database.php';

session_start();

$id = $_SESSION['id'];
$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombre'];
$correo = $_SESSION['correo'];
$telefono = $_SESSION['telefono'];
$password = $_SESSION['password'];
?>

<html>
<head>
        <title>Modificar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <br>
    <form action="modificar.php" method="POST" id="formulario">
        <h2>Modifica tus datos</h2>
        <h3>Nombre Completo</h3>
        <input type="text" name="new_nombre" placeholder="&#9000; Nombre Completo" value="<?php echo $nombre; ?>" required>
        <h3>Correo Electronico</h3>
        <input type="email" name="new_correo" placeholder="&#x2709; Correo" value="<?php echo $correo; ?>" required>
        <h3>Telefono</h3>
        <input type="number" name="new_telefono" placeholder="&#9990; Telefono" value="<?php echo $telefono; ?>" required>
        <h3>Ingrese la contraseña para realizar los cambios</h3>
        <input type="password" name="contraseña" placeholder="&#128272; Contraseña" required>
        <input type="submit" value="Modificar datos">
    </form>

    <?php

    if(isset($_POST['new_nombre'])){
        $nombre = $_POST['new_nombre'];
        $correo = $_POST['new_correo'];
        $telefono = $_POST['new_telefono'];
        $contraseña = $_POST['contraseña'];
        
        $contraseña = sha1($contraseña);

        if($password == $contraseña){
            $sql = "UPDATE usuarios SET nombre='$nombre', correo='$correo', telefono='$telefono'
                    WHERE id='$id'";

            if($conexion->query($sql) === true){
                header("location: user.php");
            }else{
                die("Error al modificar datos: " . $conexion->error);
            }
        }else{
            echo '<script language="javascript">alert("Contraseña incorrecta");</script>';
        }

    }

    ?>

</body>
</html>