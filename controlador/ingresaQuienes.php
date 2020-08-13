<?php
//UPDATE `Pagina` SET `Vision`='nueva VIsion',`Mision`='Nueva Mision' WHERE 1
if(isset( $_POST['mision']))
$mision = $_POST['mision'];
if(isset( $_POST['vision']))
$vision = $_POST['vision'];

echo $mision.$vision;
$conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
die("Problemas con la conexión");

mysqli_query($conexion, "UPDATE `Pagina` SET `Vision`='".$vision."',`Mision`='".$mision."' WHERE 1")
    or die("Problemas en el select" . mysqli_error($conexion));
    mysqli_close($conexion);

    echo 'insertado';
    
    header("Location: ../index.php");
    mysqli_close($conexion);
                die();
    


?>

