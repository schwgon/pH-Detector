<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-gray-100 text-black">
    <div class="container">
        <h1 class="mt-5">Editar Usuario</h1>

        <div class="card mt-5">
            <div class="card-header text-black">
                <h2>Formulario de Edición</h2>
            </div>
            <div class="bg-gray-100 card-body">
                <form action="<?= site_url('update/' . $usuario['id_usuario']); ?>" method="post">
                    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario']; ?>">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= $usuario['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $usuario['email']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="permiso">Permisos</label>
                        <select name="permiso" class="form-control" id="permiso" required>
                            <option value="<?= $usuario['id_permiso'] == 'Admin' ? 'selected' : '1'; ?>" >Admin</option>
                            <option value="<?= $usuario['id_permiso'] == 'User' ? 'selected' : '0'; ?>">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?= site_url('panel_admin'); ?>" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>