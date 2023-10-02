<?php

//----------------------------------------------------------------
// Realiza la consulta SQL para obtener los datos de la base de datos
$sql = "SELECT major, minor FROM datos_beacon";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si se encontraron resultados, obtén el primer resultado
    $row = $result->fetch_assoc();

    // Almacena los valores en variables de sesión
    $_SESSION['clave1'] = $row['clave1'];
    $_SESSION['clave2'] = $row['clave2'];

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    echo "No se encontraron resultados en la base de datos.";
}

?>