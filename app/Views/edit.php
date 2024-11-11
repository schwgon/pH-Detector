<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-transparent flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md shadow-md rounded-lg p-8 space-y-6 mx-auto">
        <h1 class="text-2xl font-semibold text-center ">Editar Usuario</h1>

        <form action="<?= site_url('update/' . $usuario->id_usuario); ?>" method="post" class="space-y-4">
            <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario; ?>">

            <!-- Campo Nombre -->
            <div class="relative">
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="<?= $usuario->name; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Nombre"
                />
                <label 
                    for="name" 
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Nombre
                </label>
            </div>

            <!-- Campo Correo -->
            <div class="relative">
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="<?= $usuario->email; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Correo"
                />
                <label 
                    for="email" 
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Correo
                </label>
            </div>

            <!-- Campo Permisos -->
            <div class="relative">
                <label for="permiso" class="block">Permisos</label>
                <select 
                    name="permiso" 
                    id="permiso" 
                    required 
                    class="w-full border-b-2 bg-transparent border-emerald-400 focus:outline-none focus:border-emerald-400"
                >
                    <option value="Admin" <?= $usuario->id_permiso == 'Admin' ? 'selected' : ''; ?>>Administrador</option>
                    <option value="User" <?= $usuario->id_permiso == 'User' ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>

            <!-- Botones de Acción -->
            <div class="flex justify-between mt-6">
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-emerald-600 text-white rounded-lg shadow-md hover:bg-emerald-500 transition duration-200">Actualizar</button>
                <a href="<?= site_url('panel_admin'); ?>" class="w-full md:w-auto mt-3 md:mt-0 px-4 py-2 bg-gray-400 text-white rounded-lg shadow-md hover:bg-gray-500 transition duration-200 text-center">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>
