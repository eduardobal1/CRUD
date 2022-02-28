<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div align='center'>
    <table border='1' cellpadding='0' cellspacing='0' width='600'
                            bgcolor='#F6F6F6' bordercolor='#FFFFFF'>
    <tr>
        <td width='150' style='font-weight: bold'>ID</td>
        <td width='150' style='font-weight: bold'>NOMBRE</td>
        <td width='150' style='font-weight: bold'>CORREO</td>
        <td width='150' style='font-weight: bold'>FECHA</td>
        <td width='150' style='font-weight: bold'>HORA</td>
    </tr>
<?php
include('conexion.php');

    $query ="select * from datos";  //Esta linea hace consulta
    $result = mysqli_query($conexion_db, $query);

    while($registro = mysqli_fetch_array($result)){
echo"
        <tr>
        <td width='150'>".$registro['ID']."</td>
        <td width='150'>".$registro['Nombre']."</td>
        <td width='150'>".$registro['correo']."</td>
        <td width='150'>".$registro['fecha']."</td>
        <td width='150'>".$registro['hora']."</td>

        </tr>
";
}
mysqli_close($conexion_db);
?>
    </table>
</body>
</html>