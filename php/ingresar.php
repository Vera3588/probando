<?php
$correo=$_POST["correo"];
$clave=$_POST["clave"];

$conexion=mysqli_connect("localhost", "root", "", "db_ecoweb");

$consulta="SELECT * FROM usuarios WHERE correo='$correo' AND clave='$clave'";

$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

$consulta1 = "SELECT id FROM usuarios WHERE correo='$correo' AND clave='$clave'";
$resultado1 = mysqli_query($conexion, $consulta1);

$row = mysqli_fetch_assoc($resultado1);

$id_user = $row['id'];

if($id_user == 1){
	header("location: ../html/admin/inicio.html");
}

else if($filas>0){
	header("location:../html/ingresado/inicio.html");
}
else {
	echo '<script>
		alert("El usuario y/o contraseña son incorrectos, si aún no tienes cuenta, por favor registrese primero");
		window.history.go(-1);
		</script>';
		exit;
}
mysqli_free_result($resultado);
