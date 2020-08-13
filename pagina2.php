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
$servicios = mysqli_query($conexion, "select * from fotos2") or
die("Problemas en el select:" . mysqli_error($conexion));
 //INSERT INTO `fotos2`(`id_fotos`, `id_producto`, `fotos`) VALUES ([value-1],[value-2],[value-3])
 $template = '';

 while ($reg = mysqli_fetch_array($servicios)) {
   
   $template .= '<div class="col-lg-3 col-md-6 mb-4">
   <div class="card h-100">
   <img class="card-img-top" src="'. $reg['fotos'].'" alt="'.$reg['Nombre'].'" style="width: 150px; margin-left: auto; margin-right: auto;" />
   <div class="card-body">
       <h4 class="card-title">'.$reg['id_producto'].'</h4>
       
       </div>
   </div>
 </div>';
 }
echo $template;

mysqli_close($conexion);
  ?>
</body>

</html>