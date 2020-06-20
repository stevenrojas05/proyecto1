<html>
<head>
        <title>User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="servicios/css/style.css">
</head>
<body>

<?php
    require 'menu.html';
    require 'database.php';

    session_start();
    $usuario = $_SESSION['usuario'];

    $query = "SELECT * FROM usuarios WHERE usuario LIKE '$usuario'";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();

        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['password'] = $row['password'];
    
    if(!isset($usuario)){
        header("location: login.php");
    }else{

?>


<br>
<h1>Bienvenido <?php echo $usuario; ?></h1>

<div id="tabla">
    <table>
        <tr>
            <td>Usuario</td><td><?php echo $usuario; ?></td>
        </tr>
        <tr>
            <td>Nombre</td><td><?php echo $row['nombre']; ?></td>
        </tr>
        <tr>
            <td>Correo</td><td><?php echo $row['correo']; ?></td>
        </tr>
        <tr>
            <td>Telofono</td><td><?php echo $row['telefono']; ?></td>
        </tr>
        <tr>
            <td><a id="link" href="modificar.php">Modificar</a></td><td><a id="link" href="eliminar.php">Eliminar</a></td>
        </tr>
        <tr>
            <td colspan="2"><a id="link" href="salir.php">Salir</a></td>
        </tr>
    </table>
</div>

<?php
    }
?>




</body>
</html>