<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['descripcion']))
$descripcion = $_POST['descripcion'];
if(isset( $_POST['cantidad']))
$cantidad = $_POST['cantidad'];
if(isset( $_POST['precio']))
$precio = $_POST['precio'];
if(isset( $_POST['foto']))
$foto = $_POST['foto'];
if(isset( $_POST['categoria']))
$categoria = $_POST['categoria'];

echo 'nombre:';
echo $foto;
echo '';

//$path = $foto;
$type = pathinfo($foto, PATHINFO_EXTENSION);
$data = file_get_contents($foto);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo 'BASE:';
echo $data;
echo 'ENCODE:';
echo base64_encode($data);

//$img_file = 'raju.jpg';
$imgData = base64_encode(file_get_contents($foto));
$src = 'data: '.mime_content_type($foto).';base64,'.$imgData;
//-------------------

$datosFOTO = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
echo 'FFFFFFFOOOTTTOO';
echo $datosFOTO;
echo $_FILES['foto']['tmp_name'];


$conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
die("Problemas con la conexión");

mysqli_query($conexion, "insert into Producto(id_categoria,Nombre,Descripcion,Precio,Cantidad) values 
                       ($categoria,'$name','$descripcion',$precio,$cantidad)")
    or die("Problemas en el select" . mysqli_error($conexion));


$registros = mysqli_query($conexion, "SELECT MAX(id_producto) as id FROM Producto") or
die("Problemas en el select:" . mysqli_error($conexion));

if ($reg = mysqli_fetch_array($registros)) {
    $id=$reg['id'];
    echo $id;
    
    mysqli_query($conexion, "insert into Fotos(id_producto,id_categoria,fotos) values 
                ($id,$categoria,'$src')")
    or die("Problemas en el select" . mysqli_error($conexion));
    

}

mysqli_close($conexion);

echo 'insertado'

?>
</body>
</html>
