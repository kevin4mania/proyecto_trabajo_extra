<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contacts </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">

</head>
<body>
<?php
    $conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
    //$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or 
    die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "SELECT * FROM `Categoria` ") or
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
    <!-- <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');"> -->

    <section class="mb-4" style="margin-left: 10%;margin-right: 10%;">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Ingresa Producto</h2>
<!--Section description-->
<div class="row">

    <!--Grid column-->
    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="controlador/ingresaProducto.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-8">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="">Nombre</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="md-form mb-0">
                    <label for="categoria" >Categoria:</label>                    
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="md-form mb-0">
                    <?php  
                    echo'<select name="categoria" class="form-control">';
                            while ($reg = mysqli_fetch_array($registros)) {
                            echo'<option value="'.$reg['id_categoria'].'">'.$reg['Descripcion'].'</option>';   
                            }          
                    echo'</select>';
                            ?>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="subject" name="descripcion" class="form-control">
                        <label for="subject" class="">descripcion</label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="number" id="name" name="cantidad" class="form-control">
                        <label for="name" class="">Cantidad</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="number" id="name" name="precio" class="form-control">
                        <label for="name" class="">Precio</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                    <!-- <form action="pagina2.php" method="post" enctype="multipart/form-data"> -->
                    <!-- <label for="subject" class="">Seleccione el archivo</label> -->
                        <input type="file" id="subject" name="foto" class="form-control">
                        
                    <!-- </form> -->
                    </div>
                </div>
            </div>

    

        </form>
        <div class="text-center text-md-left">
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Enviar</a>
        </div>
        <div class="status"></div>
    </div>
</div>

</section>
  <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; StyleShop 2020</p>
        </div>
    </footer>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>


</html>