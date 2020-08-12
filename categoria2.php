<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    <?php
        $conexion = mysqli_connect("localhost", "root", "kevinroot", "tiendaropa2022") or 
        die("Problemas con la conexión");
        ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
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
                        <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.html">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Shop Name</h1>
                <div class="list-group">
                    <a href="tienda.php" class="list-group-item">Categoria 1</a>
                    <a href="categoria2.php" class="list-group-item">Categoria 2</a>
                    <a href="categoria3.php" class="list-group-item">Categoria 3</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">
                    <?php
        $registros = mysqli_query($conexion, "SELECT * FROM `Producto` WHERE `id_categoria`=2") or
        die("Problemas en el select:" . mysqli_error($conexion));
        ?>
                    <?php 
          while ($reg = mysqli_fetch_array($registros)) {
            //echo "Nombre:" . $reg['Descripcion'] . "<br>";
        
          echo '<div class="col-lg-3 col-md-6 mb-4">';
            echo '<div class="card h-100">';
              echo '<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
              echo '<div class="card-body">';
                echo '<h4 class="card-title">';
                  echo '<a href="#">'.$reg['Nombre'].'</a>';
                echo '</h4>';
                echo '<h5>$'.$reg['Precio'].'</h5>';
                echo '<p class="card-text">'.$reg['Descripcion'].'</p>';
              echo '</div>';
              echo '<div class="card-footer">';
                echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          }?>

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
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>