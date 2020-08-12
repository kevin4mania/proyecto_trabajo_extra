<html>

<head>
    <title>Problema</title>
</head>

<body>
    <?php
//   copy($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
//   echo "La foto se registro en el servidor.<br>";
//   $nom = $_FILES['foto']['name'];
//   echo "<img src=\"$nom\">";
$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or 
die("Problemas con la conexión");

  $datos = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
 //INSERT INTO `fotos2`(`id_fotos`, `id_producto`, `fotos`) VALUES ([value-1],[value-2],[value-3])
	try{
		$consulta = "INSERT INTO `fotos2` (";
		$consulta .= " `id_producto`, `fotos`";
		$consulta .= ") VALUES (";
		$consulta .= "1,'".$datos."');";
		$conexion->query($consulta);
	} catch (Exception $e) {
		die ("Se produjo un error");
	}
 
	echo "Imagen almacenada.";
  ?>
</body>

</html>