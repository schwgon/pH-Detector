<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dispositivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-gray-100 text-black">
    <div class="container">
        <h1 class="mt-5">Editar Dispositivo</h1>

        <div class="card mt-5">
            <div class="card-header text-black">
                <h2>Formulario de Edición</h2>
            </div>
            <div class="bg-gray-100 card-body">
                <form action="<?= site_url('update_device/' . $dispositivo['id_dispositivo']); ?>" method="post">
                    <input type="hidden" name="id_dispositivo" value="<?= $dispositivo['id_dispositivo']; ?>">

                    <div class="form-group">
                        <label for="nombre">Nombre del Dispositivo</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $dispositivo['nombre']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_usuario">Usuario Asociado</label>
                        <input type="number" name="id_usuario" class="form-control" id="id_usuario" value="<?= $dispositivo['id_usuario']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_barrio">Barrio</label>
                        <input type="number" name="id_barrio" class="form-control" id="id_barrio" value="<?= $dispositivo['id_barrio']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_calle">Calle</label>
                        <input type="number" name="id_calle" class="form-control" id="id_calle" value="<?= $dispositivo['id_calle']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_medicion_bomba">Medición de Bomba</label>
                        <input type="number" name="id_medicion_bomba" class="form-control" id="id_medicion_bomba" value="<?= $dispositivo['id_medicion_bomba']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?= site_url('panel_admin'); ?>" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
