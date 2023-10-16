<?php

// Test: Insertar, leer y borrar datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto3a";

$pasados = 0;
$errores = [];

try {
    // Hacer la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica la conexión
    if ($conn->connect_error) {
        throw new Exception("Error en la conexión a la base de datos");
    }
    
    // 1. Insertar datos en la base de datos
    $test_data = "INSERT INTO medicion (`id sonda`, fecha, hora, Latitud, Longitud, Humedad, Temperatura, Contaminacion) VALUES ('33','2023-01-01','00:33:00','33','33','31','31', '34')";
    
    if ($conn->query($test_data) !== TRUE) {
        throw new Exception("al insertar el dato de prueba");
    }
    echo "✅ Dato de prueba insertado con éxito.". PHP_EOL;
    $pasados++;
    
    // 3. Borrar los datos insertados
    $delete_test_data = "DELETE FROM medicion WHERE `id sonda`='33' AND fecha='2023-01-01' AND hora='00:33:00'";
    if ($conn->query($delete_test_data) !== TRUE) {
        throw new Exception("al eliminar el dato de prueba");
    }
    echo "✅ Dato de prueba eliminado con éxito". PHP_EOL;
    $pasados++;
    
} catch (Exception $e) {
    $errores[] = $e->getMessage();
}

// Reportar resultados del test
echo PHP_EOL . "Resumen de tests:". PHP_EOL;
if ($pasados > 0) {
    echo "✅ $pasados tests pasados correctamente". PHP_EOL;
}

if (count($errores) > 0) {
    echo PHP_EOL . "Errores detectados:". PHP_EOL;
    foreach ($errores as $error) {
        echo "❌ Error en: " . $error . PHP_EOL;
    }
}

?>
