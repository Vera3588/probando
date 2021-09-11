<?php

$correo=$_POST["correo"];
$old=$_POST["old"];
$new=$_POST["new"];


$conexion=mysqli_connect("localhost", "root", "", "db_ecoweb");


$SQL1 = "SELECT * FROM usuarios WHERE correo = '$correo' AND clave='$old'";
$res = mysqli_query($conexion, $SQL1);

$SQL2 = "SELECT * FROM usuarios WHERE correo = '$correo' AND clave='$new' ";
$res1 = mysqli_query($conexion, $SQL2);

$contador=mysqli_num_rows($res);
$contador1=mysqli_num_rows($res1);


if($contador1 == 1 && $contador == 1 || $contador1 == 1){
	echo '<script>
		alert("La contraseña anterior es igual a la nueva, por favor verifica");
		window.history.go(-1);
		</script>';
		exit;
}
else if($contador == 0){
		echo '<script>
		alert("Error al cambiar la contraseña, verifica los datos ingresados");
		window.history.go(-1);
		</script>';
		exit;
}

$consulta1="UPDATE usuarios SET clave='$new' WHERE correo = '$correo' AND clave='$old'";
$resultado1=mysqli_query($conexion, $consulta1);

$consulta2="SELECT * FROM usuarios WHERE clave ='$new' AND correo = '$correo'";
$resultado2=mysqli_query($conexion, $consulta2);

$cont=mysqli_num_rows($resultado2);

if($cont>0){
	echo '<script>
		alert("la contraseña se ha actualizado correctamente");
		window.history.go(-1);
		</script>';
		exit;
}
else{
	echo '<script>
		alert("Error al cambiar la contraseña, verifica los datos ingresados");
		window.history.go(-1);
		</script>';
		exit;
}


?>