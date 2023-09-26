<?php
//Guardamos el nomnre del usuario logeado en una vvble global
global $nombreUsuario;
session_start();

//Iniciar conexión con la db
$conexionbd =new mysqli("localhost","root","","proyecto3a");
$conexionbd->set_charset("utf8");

//Se sonsulta si el usuario pertenece a la bd
if(!empty($_POST["ingresar"])) {
    if (empty($_POST["usuariologin"]) and empty($_POST["passwordlogin"])) {
        echo '<div class="alert alert-danger">Los campos están vacíos</div>';
    } else {
        $usuario = $_POST["usuariologin"];
        $contrasenia = $_POST["contrasenialogin"];
        $sql = $conexionbd->query("select * from usuarios where usuario = '$usuario' and contraseña = '$contrasenia'");
        $nombre= $conexionbd->query("select nombre FROM usuarios");

        if ($datos = $sql->fetch_object()) {
            // Almacenamos el nombre del usuario en una variable de sesión
            $_SESSION['usuario'] = $datos->nombre;
            $nombreUsuario = $nombre->fetch_row()[0];
            echo $nombreUsuario;
            $_SESSION['usuario'] =$nombreUsuario;
            echo "nombre" . $_SESSION['usuario'];
            
            
            header("location:../user/inicio.php");
        
        } else {
            echo '<div class="alert alert-danger">No estás registrado en el servidor</div>';
        }
    }
}
?>
