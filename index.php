<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tienda StyleShop</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
    <link href="css/estilos2.css" rel="stylesheet">
</head>

<body>
    <?php
    $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or

        die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "select * from Pagina") or
        die("Problemas en el select:" . mysqli_error($conexion));

    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">StyleShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
    <!-- Header - set the background image for the header in the line below -->

    <?php

    $template = '';
    $slogan = '';
    $porque = '';
    while ($reg = mysqli_fetch_array($registros)) {
        $template .= '<header class="py-5 bg-image-full" style="background-image: url(' . $reg['background'] . ');">';
        $template .= '<img class="img-fluid d-block mx-auto" src="' . $reg['logo'] . '" alt="" style="width: 300px; height:150px">';
        $slogan = $reg['Eslogan'];
        $porque = $reg['porque'];
    }
    echo $template;


    ?>

    </header>


    <!-- Content section -->

    <section class="py-5">
        <div class="container">

            <h1>Slogan</h1>
            <?php

            echo '<p class="lead" style="text-align: justify;">' . $slogan . '</p>';
            ?>

            <h1>¿Porqué comprar en StyleShop?</h1>
            <?php

            echo '<p class="lead" style="text-align: justify;" >' . $porque . '</p>';

            mysqli_close($conexion);
            ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="" alt="" style="width: 150px; margin-left: auto; margin-right: auto;" />
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="cargaProducto.php">Cliente Satisfecho</a>
                        </h4>
                        <p class="card-text">Califique nuestro servicio</p>
                        <form action="index.php" method="POST">
                            <p class="clasificacion">
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <!--
                                --><label for="radio1">★</label>
                                <!--
                                --><input id="radio2" type="radio" name="estrellas" value="4">
                                <!--
                                --><label for="radio2">★</label>
                                <!--
                                --><input id="radio3" type="radio" name="estrellas" value="3">
                                <!--
                                --><label for="radio3">★</label>
                                <!--
                                --><input id="radio4" type="radio" name="estrellas" value="2">
                                <!--
                                --><label for="radio4">★</label>
                                <!--
                                --><input id="radio5" type="radio" name="estrellas" value="1">
                                <!--
                                --><label for="radio5">★</label>
                            </p>
                            <input type="submit" value="Enviar Calificacion">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="py-5 bg-dark">
        <?php
        //SELECT COUNT(id_producto)as conteo FROM `Producto`
        if (isset($_POST['estrellas']))
            $estrellas = $_POST['estrellas'];
        $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or
            die("Problemas con la conexión");
        $registros = mysqli_query($conexion, "SELECT * FROM `Pagina`") or
            die("Problemas en el select:" . mysqli_error($conexion));

        if ($reg = mysqli_fetch_array($registros)) {
            $valor=$reg['Quienes'];
            if (intval($estrellas)  >= 3) {
                //echo 'decntro';
                $valor += 1;
            }            
            $satisfechos = '<p class="m-0 text-center text-white">Cliente satisfecho: ' . $valor . '</p>';
        }
        mysqli_query($conexion, "UPDATE `Pagina` SET `Quienes`=" . $valor . "")
            or die("Problemas en el select" . mysqli_error($conexion));

            $registros2 = mysqli_query($conexion, "SELECT COUNT(id_producto)as conteo FROM `Producto`") or
            die("Problemas en el select:" . mysqli_error($conexion));
            if ($reg = mysqli_fetch_array($registros2)) {
                $conteo='<p class="m-0 text-center text-white">Total de productos: ' . $reg['conteo']. '</p>';
            }

        ?>


        <div class="container">
            <?php echo $satisfechos; ?>
            <?php echo $conteo; ?>

            <p class="m-0 text-center text-white">Copyright &copy; StyleShop 2020 <a class="nav-link" href="login.php">Admin</a></p>

        </div>
        <!-- /.container -->
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>