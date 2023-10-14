<link rel="stylesheet" href="../css/bootstrap.min.css" />
<?php

// Test: Insertar, leer y borrar datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto3a";

//Hacer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// 1. Insertar datos en la base de datos
$test_data = "INSERT INTO medicion (`id sonda`, fecha, hora, Latitud, Longitud, Humedad, Temperatura, Contaminacion) VALUES ('33','2023-01-01','00:33:00','33','33','31','31', '34')";
if ($conn->query($test_data) === TRUE) {
    echo "Dato de prueba insertado con éxito.<br>";
} else {
    echo "Error al insertar el dato de prueba: " . $conn->error . "<br>";
}

// 2. Leer los datos (ya está implementado arriba)

// 3. Borrar los datos insertados
$delete_test_data = "DELETE FROM medicion WHERE `id sonda`='33' AND fecha='2023-01-01' AND hora='00:33:00'";
if ($conn->query($delete_test_data) === TRUE) {
    echo "Dato de prueba eliminado con éxito.<br>";
} else {
    echo "Error al eliminar el dato de prueba: " . $conn->error . "<br>";
}
?>
<p class="lead">
</p>
<p class="lead">
    <a class="btn btn-success btn-lg" href="../index.php" role="button">SALIR</a>
</p>