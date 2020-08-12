<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About </title>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
</head>

<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "kevinroot", "tiendaropa2022") or 
    die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "SELECT * FROM `Pagina`") or
    die("Problemas en el select:" . mysqli_error($conexion));

    ?>

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

    <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
        <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">
    </header>

    <?php
        if ($reg = mysqli_fetch_array($registros)) {
           // echo "Nombre: " . $reg['Descripcion'] . "<br>";
        
    echo '<section class="py-5">
        <div class="container">
            <h1>Mision</h1>
            <p class="lead">
                '.$reg['Mision'].'
            </p>

        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <h1>Vision</h1>
            <p class="lead">'.$reg['Vision'].'</p>
        </div>
    </section>';
        }
    ?>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>