<?php
/* Se conecta con la base de datos elegida. */
$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or 
die("Problemas con la conexión");
 
$consulta = mysqli_query($conexion, "SELECT `fotos` FROM `fotos2`") or
die("Problemas en el select:" . mysqli_error($conexion));

if ($reg = mysqli_fetch_array($registros)) {
    //$datos=$reg["fotos"];
    $datos = base64_decode($reg["fotos"]);
	echo $datos;
}
	// $hacerConsulta = $conexion->prepare($consulta); // Se crea un objeto PDOStatement.
	// $hacerConsulta->execute(); // Se ejecuta la consulta.
	// $datos = $hacerConsulta->fetch(PDO::FETCH_ASSOC)["imagen"]; // Se recuperan los resultados.
	// $hacerConsulta->closeCursor(); // Se libera el recurso.
 
	// $datos = base64_decode($datos);
	// echo $datos;
?>