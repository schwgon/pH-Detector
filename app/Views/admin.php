<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Panel - CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">

<div class="dark:text-black p-8 shadow-sm max-w-5xl w-full mx-auto">
        <h1 class="text-3xl font-sans mb-6 text-center dark:text-white">Administrator Panel - CRUD</h1>

        <!-- Tabla para mostrar registros -->
        <div class="bg-transparent backdrop-blur-lg shadow-sm w-full mx-auto border-2 rounded-lg border-emerald-400">
            <div class="px-6 py-4 bg-transparent dark:text-white rounded-t-lg">
            <h2 class="text-2xl font-sans mb-6 text-center">Record List</h2>
            </div>
            <div class="p-6 bg-transparent rounded-b-lg">
                <table class="w-full table-auto bg-transparent">
                    <thead class="bg-transparent">
                        <tr>
                            <th class="px-4 py-2 text-left  dark:text-gray-200">ID</th>
                            <th class="px-4 py-2 text-left  dark:text-gray-200">Name</th>
                            <th class="px-4 py-2 text-left  dark:text-gray-200">Mail</th>
                            <th class="px-4 py-2 text-left  dark:text-gray-200">Permissions</th>
                            <th class="px-4 py-2 text-left  dark:text-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-transparent">
                        <?php foreach ($usuarios as $user): ?>
                            <tr class=" dark:bg-gray-700/60 hover:bg-gray-200/60 dark:hover:bg-gray-600/60">
                                <td class="border-t border-gray-200 dark:border-gray-600 px-4 py-2  dark:text-gray-300"><?= $user['id_usuario']; ?></td>
                                <td class="border-t border-gray-200 dark:border-gray-600 px-4 py-2  dark:text-gray-300"><?= $user['name']; ?></td>
                                <td class="border-t border-gray-200 dark:border-gray-600 px-4 py-2  dark:text-gray-300"><?= $user['email']; ?></td>
                                <td class="border-t border-gray-200 dark:border-gray-600 px-4 py-2  dark:text-gray-300"><?= $user['permiso']; ?></td>
                                <td class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                                    <a href="<?= site_url('edit/' . $user['id_usuario']); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                                    <a href="<?= site_url('delete/' . $user['id_usuario']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Delete</a>
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
