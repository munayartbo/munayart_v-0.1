<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Recuperar Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #1D3354;
            color: #ffffff;
            padding: 50px 100px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }
        .container button {
            background-color: #d64045;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }
        footer {
            background-color: #1D3354;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .message {
            margin: 10px 0;
            font-size: 14px;
            color: #d64045;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Recuperar Contraseña</h2>
            <p>Introduce tu correo electrónico para recibir instrucciones sobre cómo recuperar tu contraseña.</p>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <button type="submit">Enviar Código de Recuperación</button>
            <?php
            // Incluir la conexión a la base de datos
            include '../php/db_connection.php';

            // Verificar si se envió el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Capturar el correo electrónico del formulario
                $email = $_POST["email"];

                // Preparar la consulta para verificar si el correo electrónico está registrado
                $stmt = $conn->prepare("SELECT CodUsuario FROM Usuario WHERE Email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Correo electrónico encontrado
                    echo '<p class="message">Pronto recibirás un código de recuperación.</p>';

                    // Aquí puedes agregar código adicional para generar y enviar un código de verificación

                } else {
                    // Correo electrónico no encontrado
                    echo '<p class="message">El correo electrónico no está registrado.</p>';
                }

                // Cerrar la conexión a la base de datos
                $stmt->close();
                $conn->close();
            }
            ?>
        </form>
    </div>
</body>
</html>
