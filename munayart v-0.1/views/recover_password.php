<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Recuperar Contraseña</h1>
        <form action="../php/recover_password.php" method="POST">
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <button type="submit">Recuperar Contraseña</button>
        </form>
    </div>
</body>
</html>
