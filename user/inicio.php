<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#"> Bienvenido,
                <?php echo $_SESSION['usuario']; ?> </a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/user/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/user/cerrar.php">Cerrar sesión</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
        </div>
    </nav>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Mediciones</h1>
                    <p class="lead">La medición de su sonda es: </p>
                    <hr class="my-2">
                    <p>More info</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                    </p>
                    <?php
                    // Incluye la conexión y datos desde el archivo db_connection.php
                    include '../bd/controlador.php';

                    if (!empty($row)) {
                        echo "<h2>Última entrada de la tabla testB:</h2>";
                        echo "<p>ID: " . $row["ID"] . "</p>";
                        echo "<p>Campo1: " . $row["major"] . "</p>"; // Reemplaza "campo1" con el nombre de tu columna
                        echo "<p>Campo2: " . $row["minor"] . "</p>"; // Reemplaza "campo2" con el nombre de tu columna
                        // Agrega más campos según sea necesario
                    } else {
                        echo "<p>No se encontraron entradas en la tabla testB.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
