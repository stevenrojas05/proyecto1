<?php 
session_start();

require 'menu.html';
require 'database.php';

$usuario = $_SESSION['usuario'];
if(isset($usuario)){
    header("location: user.php");
}else{

?>

<html>
<head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body>


    <br><br><br><br>
    <form action="login.php" method="POST" id="formulario">
        <h2>Login</h2>
        <input type="text" name="usuario" placeholder="&#9000; Nombre de Usuario" required>
        <input type="password" name="password" placeholder="&#128272; Contraseña" required>
        <input type="submit" value="Ingresar">
    </form>

<?php


    if(!empty($_POST['usuario']) && !empty($_POST['password'])){
		
		$usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $password = sha1($password);

		$query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '".$usuario."' and password = '".$password."'");
		$nr = mysqli_num_rows($query);

		if($nr == 1){
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: user.php");
		}else if($nr == 0){
			echo '<script language="javascript">alert("Usuario o contraseña incorrecta");</script>';
		}

    }
}

?>
    
</body>

</html>        