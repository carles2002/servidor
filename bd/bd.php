<?php

$conexionbd =new mysqli("localhost","root","","proyecto3a");
$conexionbd->set_charset("utf8");

if(!empty($_POST["ingresar"])) {
    if (empty($_POST["usuariologin"]) and empty($_POST["passwordlogin"])) {
        echo '<div class="alert alert-danger">Los campos están vacíos</div>';
    } else {
        $usuario = $_POST["usuariologin"];
        $contrasenia = $_POST["contrasenialogin"];
        $sql = $conexionbd->query("select * from usuarios where usuario = '$usuario' and contraseña = '$contrasenia'");

        if ($datos = $sql->fetch_object()) {
            // Almacenamos el nombre del usuario en una variable de sesión
            $_SESSION['usuario'] = $datos->nombre;

            header("location:../user/inicio.php");
        } else {
            echo '<div class="alert alert-danger">No estás registrado en el servidor</div>';
        }
    }
}
?>
