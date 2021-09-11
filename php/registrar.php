<?php
$conexion=mysqli_connect("localhost", "root", "", "db_ecoweb");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$insertar = "INSERT INTO usuarios(nombre, apellidos, correo, clave) VALUES('$nombre', '$apellidos', '$correo', '$clave')";
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
	if (mysqli_num_rows ($verificar_usuario) > 0) {
		echo '<script>
		alert("El usuario ya esta registrado, por favor ingresa");
		window.history.go(-1);
		</script>';
		exit;
	}
$resultado = mysqli_query($conexion, $insertar);

if(!$resultado){
	echo'error al registrarse';
} else {
	echo '<script>
		alert("Registrado exitosamente");
		window.location.href="../html/ingresar.html";
		</script>';
		exit;
	
}
mysqli_close($conexion);