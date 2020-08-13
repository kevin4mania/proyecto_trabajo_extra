<?php
if(isset( $_POST['login']))
$email = $_POST['login'];
if(isset( $_POST['password']))
$password = $_POST['password'];

$conexion = mysqli_connect("www.db4free.net", "tiendaropa2022", "tiendaropa2022", "tiendaropa2022") or 
    //$conexion = mysqli_connect("localhost", "root", "1234", "tiendaropa2022") or 
    die("Problemas con la conexión");
    $admin = mysqli_query($conexion, "select * from Administrador where email = '".$email."'") or
    die("Problemas en el select:" . mysqli_error($conexion));


    while ($reg = mysqli_fetch_array($admin)) {
        if($reg['password'] == $password){
            header("Location: ../dashboard.php");
            mysqli_close($conexion);
            die();
        }    
    }
    header("Location: ../login.php");
    mysqli_close($conexion);
            die();
?>