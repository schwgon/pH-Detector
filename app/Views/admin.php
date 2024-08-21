<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Panel - CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 font-sans">Administrator Panel - CRUD</h1>

        <!-- Tabla para mostrar registros -->
        <div class="bg-gray-100 rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 bg-gray-100 text-black">
                <h2 class="text-2xl font-semibold">Record List</h2>
            </div>
            <div class="p-6 bg-gray-200">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-black">ID</th>
                            <th class="px-4 py-2 text-left text-black">Name</th>
                            <th class="px-4 py-2 text-left text-black">Mail</th>
                            <th class="px-4 py-2 text-left text-black">Permissions</th>
                            <th class="px-4 py-2 text-left text-black">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                            <tr class="bg-gray-100 hover:bg-gray-200">
                                <td class="border-t border-gray-100 px-4 py-2 text-black"><?= $user['id_usuario']; ?></td>
                                <td class="border-t border-gray-100 px-4 py-2 text-black"><?= $user['name']; ?></td>
                                <td class="border-t border-gray-100 px-4 py-2 text-black"><?= $user['email']; ?></td>
                                <td class="border-t border-gray-100 px-4 py-2 text-black"><?= $user['permiso']; ?></td>
                                <td class="border-t border-gray-100 px-4 py-2">
                                    <a href="<?= site_url('edit/' . $user['id_usuario']); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
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