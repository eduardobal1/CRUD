<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Recibimos por POST los datos procedentes del formulario


$nombr = $_POST["nombre"];
$nombre = strip_tags($nombr);
$n_nombre = strlen($nombre);         
$email = $_POST["correo"];       //Asi recogemos el correo desde el formulario 
$correo = strip_tags($email);    //Eliminamos la etiqueta que puedan ex

// Validamos el correo de manera muy simple, contempla que exista la @,
if(filter_var($correo. FILTER_VALIDATE_EMAIL)) {
// correo valido, contamos caracteres
    $n_correo = strlen($correo);           //Contamos el numero de caracteres
} else {
    //correo no valido, asiganamos 0 al numero de caracteres
    $n_correo = 0;
}

$fecha = date("d-m-Y");                     // Asi recogemos la fecha
$hora = date("H:i");                        //Asi recogemos la hora

$total_car = $n_nombre * $n_correo;
// Si alguno de ellos vale 0, $total_Car valdrá 0

if ($total_car >=1){
    //Abrimos la conexion a la base de datos
    include("conexion.php");

    $_GRABAR_SQL = "INSERT INTO datos (Nombre, correo, fecha, hora) VALUES ('$nombre','$correo','$fecha','$hora')";
mysqli_query($conexion_db, $_GRABAR_SQL) or die(mysqli_error());

// Cerramos la conexion a la base de datos
mysqli_close($conexion_db);

//Confirmamos que el registro ha sido insertado con exito

echo "
<p>Los datos han sido guardados con exito.</p>";
    
}else {
    echo "
    Los campos <b>nombre</b> y <b>crreo></b> no puede estar vacios. <br/>";
}


?>
</body>
</html>




