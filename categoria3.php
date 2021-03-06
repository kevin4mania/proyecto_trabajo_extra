<?php
if (isset($_REQUEST['pos']))
  $inicio = $_REQUEST['pos'];
else
  $inicio = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    <?php
        $conexion = mysqli_connect("localhost", "root", "", "tiendaropa2022") or
        //$conexion = mysqli_connect("localhost", "root", "kevinroot", "tiendaropa2022") or 
        //$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or
        die("Problemas con la conexión");
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">StyleShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">

                <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">Quienes Somos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="tienda.php">Tienda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contacts.php">Contáctanos</a>
                </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Style Shop</h1>
                <div class="list-group">
                    <a href="tienda.php" class="list-group-item">Caballeros</a>
                    <a href="categoria2.php" class="list-group-item">Damas</a>
                    <a href="categoria3.php" class="list-group-item">Infantil</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <br>
                <center>
                    <h2>Infantil</h2>
                </center>
                <br>

                <div class="row">
                    <?php
                    $registros = mysqli_query($conexion, "SELECT * FROM `Producto` JOIN `Fotos` ON Fotos.id_producto = Producto.id_producto WHERE Fotos.id_categoria = 3 LIMIT $inicio,12") or
                        die("Problemas en el select:" . mysqli_error($conexion));
                    ?>
                    <?php
                    $impresos = 0;
                    while ($reg = mysqli_fetch_array($registros)) {
                        //echo "Nombre:" . $reg['Descripcion'] . "<br>";
                        $impresos++;
                        echo '<div class="col-lg-3 col-md-6 mb-4">';
                        echo '<div class="card h-100">';
                        echo '<a href="#"><img class="card-img-top" src="' . $reg['fotos'] . '" alt="" style="width: 150px; margin-left: auto; margin-right: auto;"></a>';
                        echo '<div class="card-body">';
                        echo '<h4 class="card-title">';
                        echo '<a href="#">' . $reg['Nombre'] . '</a>';
                        echo '</h4>';
                        echo '<h5>$' . $reg['Precio'] . '</h5>';
                        echo '<p class="card-text">' . $reg['Descripcion'] . '</p>';
                        echo '<form action="informacion.php" method="POST">';
                        echo '<input type = "text" name="codigo" id="codigo" value="' . $reg['id_producto'] . '" style="display: none;"/>';
                        echo '<input type="submit" value="Ver Informacion">';
                        echo '</form>';
                        echo '</div>';
                        echo '<div class="card-footer">';
                        echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } 
                    if ($inicio == 0)
                        echo "Anteriores ";
                      else {
                        $anterior = $inicio - 12;
                        echo "<a href=\"categoria3.php?pos=$anterior\">Anteriores </a>";
                      }
                      if ($impresos == 12) {
                        $proximo = $inicio + 12;
                        echo "<a href=\"categoria3.php?pos=$proximo\"> Siguientes</a>";
                      } else
                        echo "Siguientes";

                        mysqli_close($conexion);
                    ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; StyleShop 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>