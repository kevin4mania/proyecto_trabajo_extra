<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Full Width Pics - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
</head>

<body>
    <?php
    $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
    
    die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "SELECT eslogan FROM `Pagina`") or
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
    <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
        <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">
    </header>

    <!-- Content section -->

    <section class="py-5">
        <div class="container">
            
            <h1>Slogan</h1>
            <?php
            if ($reg = mysqli_fetch_array($registros)) {
                echo '<p class="lead">'.$reg['eslogan'].'</p>';
            }
            ?>          
            </div>
    </section>

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