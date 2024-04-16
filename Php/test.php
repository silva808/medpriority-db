<?php
    require_once 'conexion.php';

    // Get data sent via POST
    $tipoDocumento = $_POST['id_type'];
    $numeroDocumento = $_POST['id']; //just in case
    $nombre = $_POST['name'];
    $edad = $_POST['age'];
    $sexo = $_POST['sexmoneyfeelingsdie'];
    $direccion = $_POST['address'];
    $telefono = $_POST['pickupyophonebaby'];
    $correoElectronico = $_POST['email'];
    $tipoAfiliacion = $_POST['afi'];
    // Get other data fields similarly

    // Update database

    $sage = "UPDATE usuario SET tipo_documento='$tipoDocumento', 
    nombre='$nombre',
    edad='$edad',
    genero='$sexo',
    direccion='$direccion',
    telefono='$telefono',
    correo='$correoElectronico',
    tipo_afiliacion='$tipoAfiliacion'
    WHERE id_usuario='$identi'";

    if (mysqli_query($conn, $sage)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
?>
