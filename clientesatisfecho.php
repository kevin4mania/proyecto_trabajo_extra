<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['estrellas']))
        $estrellas = $_POST['estrellas'];

    echo $estrellas;

    $conexion = mysqli_connect("localhost", "root", "kevinroot", "tiendaropa2022") or
        die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "SELECT * FROM `Pagina`") or
        die("Problemas en el select:" . mysqli_error($conexion));

    if ($reg = mysqli_fetch_array($registros)) {
        echo $reg['Quienes'];
      
        echo $estrellas;
        if ($estrellas >= 3) {
            $reg['Quienes']+=1;
        }
    }
    
    echo 'Quienes:'.$reg['Quienes'];
    mysqli_query($conexion, "UPDATE `Pagina` SET `Quienes`=".$reg['Quienes']."")
    or die("Problemas en el select" . mysqli_error($conexion));
    
    


    /*
    header("Location: ../index.php");
    mysqli_close($conexion);
    die();
*/


    ?>

</body>

</html>