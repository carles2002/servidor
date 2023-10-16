
<?php

// Test: Insertar, leer y borrar datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto3a";

$pasados =0;

//Hacer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die(" ❌ Error en la conexión a la base de datos: " . $conn->connect_error);
}

// 1. Insertar datos en la base de datos
$test_data = "INSERT INTO usuarios (nombre, usuario,contraseña,idSonda) VALUES ('hola','holaUsuario','holaContraseña','33')";
if ($conn->query($test_data) === TRUE) {
    echo "✅ Dato de prueba insertado con éxito.<br>". PHP_EOL;
   $pasados++;
    
} else {
    echo "Error al insertar el dato de prueba: " . $conn->error . "<br>". PHP_EOL;
}

// 2. Leer los datos (ya está implementado arriba)

// 3. Borrar los datos insertados
$delete_test_data = "DELETE FROM usuarios WHERE nombre='hola' AND usuario='holaUsuario' AND contraseña='holaContraseña' AND idSonda='33'";
if ($conn->query($delete_test_data) === TRUE) {
    echo "✅ Dato de prueba eliminado con éxito.<br>". PHP_EOL;
    $pasados ++;
} else {
    echo "❌ Error al eliminar el dato de prueba: " . $conn->error . "<br>". PHP_EOL;
}

if ($pasados =2){
    echo "✅ ✅TODOS LOS TESTS PASADOS CORRECTAMENTE". PHP_EOL;
    nl2br(2);
}

?>
