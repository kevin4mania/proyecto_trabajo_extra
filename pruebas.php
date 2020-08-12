<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    hola esto es la prueba de conexion
    <?php
    //$conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
    $conexion = mysqli_connect("localhost", "root", "kevinroot", "tiendaropa2022") or 
    die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "select * from Categoria") or
    die("Problemas en el select:" . mysqli_error($conexion));
    
    if ($reg = mysqli_fetch_array($registros)) {
        echo "Nombre: " . $reg['Descripcion'] . "<br>";
    }
    
    while ($reg = mysqli_fetch_array($registros)) {
        echo "Nombre:" . $reg['Descripcion'] . "<br>";
    }


    mysqli_close($conexion);

    ?>


</body>

</html>