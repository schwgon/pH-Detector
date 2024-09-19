<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Red</title>
</head>
<body>
    <h1>Configurar Red Principal</h1>
    <form action="sendCredentials" method="post">
        <label for="ssid">SSID:</label>
        <input type="text" id="ssid" name="ssid" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
