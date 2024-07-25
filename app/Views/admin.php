<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Panel - CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 font-sans">Administrator Panel - CRUD</h1>

        <!-- Tabla para mostrar registros -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h2 class="text-2xl font-semibold">Record List</h2>
            </div>
            <div class="p-6 bg-gray-900">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-white">ID</th>
                            <th class="px-4 py-2 text-left text-white">Name</th>
                            <th class="px-4 py-2 text-left text-white">Mail</th>
                            <th class="px-4 py-2 text-left text-white">Permissions</th>
                            <th class="px-4 py-2 text-left text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= $user['id_usuario']; ?></td>
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= $user['name']; ?></td>
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= $user['email']; ?></td>
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= $user['permiso']; ?></td>
                                <td class="border-t border-gray-700 px-4 py-2">
                                    <a href="<?= site_url('edit/' . $user['id_usuario']); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                                    <a href="<?= site_url('delete/' . $user['id_usuario']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Delete</a>
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