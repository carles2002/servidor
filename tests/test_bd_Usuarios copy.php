<?php

// Test: Insertar, leer y borrar datos en la tabla 'usuarios'
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
    $test_data = "INSERT INTO usuarios (nombre, usuario, contraseña, idSonda) VALUES ('hola','holaUsuario','holaContraseña','33')";
    if ($conn->query($test_data) !== TRUE) {
        throw new Exception("al insertar el dato de prueba en 'usuarios'");
    }
    echo "✅ Dato de prueba insertado con éxito.". PHP_EOL;
    $pasados++;
    
    // 3. Borrar los datos insertados
    $delete_test_data = "DELETE FROM usuarios WHERE nombre='hola' AND usuario='holaUsuario' AND contraseña='holaContraseña' AND idSonda='33'";
    if ($conn->query($delete_test_data) !== TRUE) {
        throw new Exception("al eliminar el dato de prueba en 'usuarios'");
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
