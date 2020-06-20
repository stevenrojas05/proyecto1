<?php
    require 'menu.html';
    require 'database.php';
?>

<html>
<head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <br>
    <form action="registro.php" method="POST" id="formulario">
        <h2>Registrate</h2>
        <input type="text" name="nombre" placeholder="&#9000; Nombre Completo" required>
        <input type="email" name="correo" placeholder="&#x2709; Correo" required>
        <input type="text" name="usuario" placeholder="&#9000; Nombre de Usuario" required>
        <input type="number" name="telefono" placeholder="&#9990; Telefono" required>
        <input type="password" name="password" placeholder="&#128272; Contraseña" required>
        <input type="password" name="cpassword" placeholder="&#128272; Repetir contraseña" required>
        <input type="submit" value="Registrar">
    </form>

    <?php

    if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if($password == $cpassword){

            $password = sha1($password);

            $sql = "INSERT INTO usuarios(usuario, nombre, correo, telefono, password)
                VALUES('$usuario','$nombre','$correo','$telefono','$password')";

            if($conexion->query($sql) === true){
                echo '<script language="javascript">alert("Usuario creado exitosamente");</script>';
            }else{
                die("Error al insertar datos: " . $conexion->error);
            }
        }else{
            echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
        }

    }

    ?>

</body>
</html>