<?php
    require_once 'conexion.php';

    if(isset($_POST['id'])) {
        $tipoDocumento = $_POST['id_type'];
        $numeroDocumento = $_POST['id']; //just in case
        $nombre = $_POST['name'];
        $edad = $_POST['age'];
        $sexo = $_POST['sexmoneyfeelingsdie'];
        $direccion = $_POST['address'];
        $telefono = $_POST['pickupyophonebaby'];
        $correoElectronico = $_POST['email'];
        $tipoAfiliacion = $_POST['afi'];

    $sage = "UPDATE usuario SET tipo_documento='$tipoDocumento',
    nombre='$nombre',
    edad='$edad',
    genero='$sexo',
    direccion='$direccion',
    telefono='$telefono',
    correo='$correoElectronico',
    tipo_afiliacion='$tipoAfiliacion'
    WHERE id_usuario='$numeroDocumento'";
    
    echo $sage; // Output the SQL query for debugging

    if (mysqli_query($conn, $sage)) {
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
} 
    mysqli_close($conn);
?>
