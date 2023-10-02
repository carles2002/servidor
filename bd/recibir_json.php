<?php
$json_data = file_get_contents('php://input');
$data = json_decode($json_data);

// Procesa los datos JSON
$clave1 = $data->clave1;
$clave2 = $data->clave2;

// Realiza las operaciones necesarias en el servidor

// Devuelve una respuesta (opcional)
$respuesta = array('mensaje' => 'Datos recibidos correctamente');
echo json_encode($respuesta);
?>