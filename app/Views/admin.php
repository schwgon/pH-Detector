<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - ABM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Panel - ABM</h1>

        <!-- Formulario para agregar nuevo registro -->
        <div class="card mt-5">
            <div class="card-header">
                <h2>Agregar Nuevo Registro</h2>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="permisos">Permisos</label>
                        <select name="permisos" id="permisos" class="form-control" required>
                            <option value="1">Administrador</option>
                            <option value="0">Usuario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>

        <!-- Tabla para mostrar registros -->
        <div class="card mt-5">
            <div class="card-header">
                <h2>Lista de Registros</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Permisos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Juan Pérez</td>
                            <td>juan@example.com</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Editar</button>
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                        <!-- Más registros aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>