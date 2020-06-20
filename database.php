<?php
	
	$host = 'localhost';
	$dbname = 'php_login_database';
	$usuario = 'root';
	$password = ''; 

		
	$conexion = mysqli_connect($host, $usuario, $password, $dbname);

	if(!$conexion){
		die("Conexion fallida: " . mysqli_connect_error());
	}
	
?>
