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
        $conexion = mysqli_connect("localhost", "root", "", "tiendaropa2022") or 
    
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
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
                    </li>
                    <li class="nav-item active">
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

    <?php
        
        $template = '';
        
        if ($reg = mysqli_fetch_array($registros)) {
            $template .= '<header class="py-5 bg-image-full" style="background-image: url('.$reg['background'].');">';
            $template .= '<img class="img-fluid d-block mx-auto" src="'.$reg['logo'].'" alt="" style="width: 300px; height:150px">';

        }
        echo $template;

        
        ?>
    </header>

    <?php
        $registros = mysqli_query($conexion, "SELECT * FROM `Pagina`") or
        die("Problemas en el select:" . mysqli_error($conexion));
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
            <p class="m-0 text-center text-white">Copyright &copy; StyleShop 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>