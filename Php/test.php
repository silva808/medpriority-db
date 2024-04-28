<!-- --------------------------------UPDATE USERS------------------------------------ -->
<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
//     require_once 'conexion.php';

//     // Decode JSON data sent via AJAX
//     $data = json_decode(file_get_contents("php://input"), true);

//     // Prepare SQL statement
//     $valorant = "UPDATE usuario SET 
//                 tipo_documento = ?, 
//                 nombre = ?, 
//                 edad = ?, 
//                 genero = ?, 
//                 direccion = ?, 
//                 telefono = ?, 
//                 correo = ?, 
//                 tipo_afiliacion = ? 
//               WHERE id_usuario = ?";

//     $stmt = mysqli_prepare($conn, $valorant);

//     // Check if the prepare statement was successful
//     if ($stmt) {
//         // Bind parameters
//         mysqli_stmt_bind_param(
//             $stmt,
//             "ssisssssi",
//             $data['id_type'],
//             $data['name'],
//             $data['age'],
//             $data['sexmoneyfeelingsdie'],
//             $data['address'],
//             $data['pickupyophonebaby'],
//             $data['email'],
//             $data['afi'],
//             $data['id']
//         );

//         // Execute statement
//         mysqli_stmt_execute($stmt);

//         // Close statement
//         mysqli_stmt_close($stmt);
//     } else {
//         // If prepare statement failed, handle the error
//         echo "Error: " . mysqli_error($conn);
//     }

//     // Close connection
//     mysqli_close($conn);
// }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    require_once 'conexion.php';

    // Decode JSON data sent via AJAX
    $data = json_decode(file_get_contents("php://input"), true);

    // Prepare and execute SQL statement to update user information
    $valorant = "UPDATE usuario SET 
                tipo_documento = ?, 
                nombre = ?, 
                edad = ?, 
                genero = ?, 
                direccion = ?, 
                telefono = ?, 
                correo = ?, 
                tipo_afiliacion = ? 
              WHERE id_usuario = ?";

    $stmt = mysqli_prepare($conn, $valorant);

    // Check if the prepare statement was successful
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param(
            $stmt,
            "ssisssssi",
            $data['id_type'],
            $data['name'],
            $data['age'],
            $data['sexmoneyfeelingsdie'],
            $data['address'],
            $data['pickupyophonebaby'],
            $data['email'],
            $data['afi'],
            $data['id']
        );

        // Execute statement
        mysqli_stmt_execute($stmt);

        // Close statement
        mysqli_stmt_close($stmt);

        // After successful update, fetch the updated user data
        $hpta = "SELECT * FROM usuario WHERE id_usuario = ?";
        $sapo = mysqli_prepare($conn, $hpta);
        mysqli_stmt_bind_param($sapo, "i", $data['id']);
        mysqli_stmt_execute($sapo);
        $result = mysqli_stmt_get_result($sapo);
        $updatedData = mysqli_fetch_assoc($result);

        // Send the updated user data as JSON response
        header('Content-Type: application/json');
        echo json_encode($updatedData);
    } else {
        // If prepare statement failed, handle the error
        echo json_encode(array('error' => 'Failed to update user information.'));
    }

    // Close connection
    mysqli_close($conn);
}

?>