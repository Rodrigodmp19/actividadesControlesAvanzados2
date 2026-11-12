<?php

session_start();

// Verificar si hay sesion
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit;
}

// Verificar si el rol es cliente
if ($_SESSION["rol"] != "cliente") {
    echo "Acceso no autorizado<br>";
    echo "<a href='logout.php'>Salir</a>";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelForja - Cliente</title>
</head>
<body>
    <h3>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h3>
    <h3>Último acceso: <?php echo $_SESSION["ultimo"]; ?></h3>
    <h3>Proyectos enviados: <?php echo $_SESSION["enviados"]; ?></h3>
    <h3>Último tipo de web pedido: <?php if(empty($_COOKIE["ultimo_tipo"])) {
        echo "Ninguno";
    } else if (isset($_COOKIE["ultimo_tipo"])) {
        echo $_COOKIE["ultimo_tipo"];
    } ?></h3>
    <a href="login.html"><input type="submit" value="Volver"></a>

    <form action="enviar_proyecto" method="POST" enctype="multipart/form-data">
        <h3>Nombre del proyecto: <input type="text" name="proyecto"></h3>
        <h3>Tipo de proyecto <select name="tipo"></h3>
            <option value="landing">Landing - 300€</option>
            <option value="corporativa">Corporativa - 900€</option>
            <option value="tienda">Tienda - 2000€</option>
        </select>
        <h3>Mantenimiento:</h3>
            <h4><input type="radio" name="mantenimiento" value="no">No - 0€</h4>
            <h4><input type="radio" name="mantenimiento" value="mensual">Mensual - 50€</h4>
            <h4><input type="radio" name="mantenimiento" value="anual">Anual - 500€</h4>
    </form><br>

    <a href="logout.php"><input type="submit" value="Cerrar sesión"></a>

</body>
</html>
