    <?php
    if(isset( $_POST['name']))
    $name = $_POST['name'];
    if(isset( $_POST['descripcion']))
    $descripcion = $_POST['descripcion'];
    $datosFOTO = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($_FILES['foto']['tmp_name']));


    echo $name. $descripcion;
    echo '';
    echo $datosFOTO;

    $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
    die("Problemas con la conexión");

    mysqli_query($conexion, "INSERT INTO `Servicios`(`Nombre`, `Descripcion`, `foto`) 
    VALUES ('$name','$descripcion','$datosFOTO')")
    or die("Problemas en el select" . mysqli_error($conexion));


    mysqli_close($conexion);

    echo 'insertado';

    header("Location: ../index.php");
    mysqli_close($conexion);
                die();

    ?>
