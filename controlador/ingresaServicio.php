    <?php
    if(isset( $_POST['name']))
    $name = $_POST['name'];
    if(isset( $_POST['descripcion']))
    $descripcion = $_POST['descripcion'];
    $datosFOTO = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($_FILES['foto']['tmp_name']));

    $conexion = mysqli_connect("localhost", "root", "", "tiendaropa2022") or 
    die("Problemas con la conexión");

    mysqli_query($conexion, "INSERT INTO `Servicios`(`Nombre`, `Descripcion`, `foto`) 
    VALUES ('$name','$descripcion','$datosFOTO')") or die("Problemas en el select" . mysqli_error($conexion));

    echo 'insertado';

    header("Location: ../cargaServicio.php");
  
    die();
    mysqli_close($conexion);
?>
