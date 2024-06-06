<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - ABM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container">
        <h1 class="mt-5">Admin Panel - ABM</h1>

        <!-- Tabla para mostrar registros -->
        <div class="card mt-5">
            <div class="card-header text-dark">
                <h2>Lista de Registros</h2>
            </div>
            <div class="bg-dark card-body">
                <table class="bg-dark table table-bordered text-white">
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
                        <?php foreach ($usuarios as $users): ?>
                            <tr>
                                <td>1<?= $users['id_usuario']; ?></td>
                                <td>Juan Pérez<?= $users['name']; ?></td>
                                <td>juan@example.com<?= $users['email']; ?></td>
                                <td>Administrador<?= $users['permiso']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                         <?php endforeach; ?>
                        <!-- Más registros aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>