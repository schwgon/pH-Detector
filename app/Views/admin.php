<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Panel - CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-transparent flex justify-center items-center min-h-screen">
    <div class="p-8 shadow-md max-w-5xl w-full mx-auto backdrop-blur-sm bg-transparent rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-emerald-400">Panel de Administrador</h1>

        <!-- Tabla para mostrar registros de usuarios -->
        <div class="w-full mx-auto border-2 rounded-lg border-emerald-400 mb-8">
            <div class="px-6 py-4 bg-transparent rounded-t-lg">
                <h2 class="text-2xl font-semibold text-center">Lista de Usuarios</h2>
            </div>
            <div class="p-6 bg-transparent rounded-b-lg">
                <table class="w-full table-auto">
                    <thead class="bg-transparent">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium">ID</th>
                            <th class="px-4 py-2 text-left font-medium">Nombre</th>
                            <th class="px-4 py-2 text-left font-medium">Correo</th>
                            <th class="px-4 py-2 text-left font-medium">Permisos</th>
                            <th class="px-4 py-2 text-left font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                            <tr class="hover:bg-transparent transition duration-150 ease-in-out">
                                <td class="border-t border-gray-200 px-4 py-2"><?= $user['id_usuario']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2"><?= $user['name']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2"><?= $user['email']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2"><?= $user['permiso']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2">
                                    <a href="<?= site_url('edit/' . $user['id_usuario']); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm">Editar</a>
                                    <a href="<?= site_url('delete/' . $user['id_usuario']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Nueva tabla para la gestión de dispositivos -->
        <div class="w-full mx-auto border-2 rounded-lg border-emerald-400">
            <div class="px-6 py-4 bg-transparent rounded-t-lg">
                <h2 class="text-2xl font-semibold text-center">Lista de Dispositivos</h2>
            </div>
            <div class="p-6 bg-transparent rounded-b-lg">
                <table class="w-full table-auto">
                    <thead class="bg-transparent">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium">Dispositivo ID</th>
                            <th class="px-4 py-2 text-left font-medium">Nombre de Dispositivo</th>
                            <th class="px-4 py-2 text-left font-medium">Uusuario</th>
                            <th class="px-4 py-2 text-left font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dispositivos as $device): ?>
                            <tr class="hover:bg-transparent transition duration-150 ease-in-out">
                                <td class="border-t border-gray-200 px-4 py-2"><?= $device['id_dispositivo']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2"><?= $device['nombre']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2"><?= $device['id_usuario']; ?></td>
                                <td class="border-t border-gray-200 px-4 py-2">
                                    <a href="<?= site_url('edit_device/' . $device['id_dispositivo']); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm">Editar</a>
                                    <a href="<?= site_url('delete_device/' . $device['id_dispositivo']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este dispositivo?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
