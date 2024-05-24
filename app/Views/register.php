<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <form method="post" action="<?= base_url("register1"); ?>">
        <h1>Bienvenido</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input name="name" required type="text" class="form-control" id="name" placeholder="Tu Nombre">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input name="email" required type="mail" class="form-control" id="email" placeholder="correodeejemplo@gmail.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input name="password" required type="password" class="form-control" id="password" placeholder="1234">
        </div>
        
        <button class="mb-3"><input type="submit" value="Register" class="btn btn-primary" /></button>
    </form>
</body>
</html>