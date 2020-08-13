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
    <link href="css/estilos1.css" rel="stylesheet">

</head>

<body>
    <?php
    $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or
        //$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or
        die("Problemas con la conexión");
    ?>
    <?php
    $registros = mysqli_query($conexion, "select * from `Producto` where id_producto = ".$_POST['codigo']) or
        die("Problemas en el select:" . mysqli_error($conexion));
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">StyleShop</a>
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
                <?php
                while($reg = mysqli_fetch_array($registros)){
                    echo '<div class="col-lg-3 col-md-6 mb-4">';
                    echo '<div class="card h-100">';
                    $registros1 = mysqli_query($conexion, "select * from Fotos where id_producto = ".$_POST['codigo']) or
                    die("Problemas en el select:" . mysqli_error($conexion));
                    
                    $Lightbox  = '<div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">';
                    $Lightbox1 = '<!-- Next/previous controls -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    <!-- Caption text -->
                        <div class="caption-container">
                          <p id="caption"></p>
                        </div>
                        <div class="container">';
                    $cont = 1;
                    $foto = '';
                    while($reg1 = mysqli_fetch_array($registros1)){
                        
                        $foto = '<a href="#"><img class="card-img-top" src="' . $reg1['fotos'] . '"  alt="" onclick="openModal();currentSlide('.$cont.')" style="width: 150px; margin-left: auto; margin-right: auto;"></a>';
                        
                    $Lightbox .= '
                        <div class="mySlides">
                          <div class="numbertext">'.$cont.'</div>
                          <img src="'. $reg1['fotos'] .'" style="width:100%">
                        </div>
                    ';
                        
                    $Lightbox1 .= ' 
                        <!-- Thumbnail image controls -->
                        <div class="column">
                          <img class="demo" src="'. $reg1['fotos'] .'" onclick="currentSlide('.$cont.')" alt="'.$reg['Nombre'].'">
                        </div>                       
                      ';
                      $cont+=1;  
                }
                $Lightbox1 .= '</div>
                </div>
                </div>';
                    
                    echo $foto;
                    echo $Lightbox;
                    echo $Lightbox1;
                    echo '<div class="card-body" style="width=90%;">';
                    echo '<h4 class="card-title">';
                    echo '<a href="#">' . $reg['Nombre'] . '</a>';
                    echo '</h4>';
                    echo '<h5>$' . $reg['Precio'] . '</h5>';
                    echo '<input type = "text" name="codigo" id="codigo" value="' . $reg['id_producto'] . '" style="display: none;"/>';
                    echo '<p class="card-text">' . $reg['Descripcion'] . '</p>';
                    echo '<a href="tienda.php">Regresar</a>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
  
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; StyleShop 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/js/script.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>