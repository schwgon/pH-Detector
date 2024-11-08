<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dispositivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-transparent flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg  shadow-md rounded-lg p-8 space-y-6 mx-auto">
        <h1 class="text-2xl font-semibold text-center ">Editar Dispositivo</h1>
        
        <form action="<?= site_url('update_device/' . $dispositivo['id_dispositivo']); ?>" method="post" class="space-y-4">
            <input type="hidden" name="id_dispositivo" value="<?= $dispositivo['id_dispositivo']; ?>">

            <!-- Campo Nombre del Dispositivo -->
            <div class="relative">
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    value="<?= $dispositivo['nombre']; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Nombre del Dispositivo"
                />
                <label 
                    for="nombre" 
                    class="absolute left-0 -top-3.5 text-sm  transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Nombre del Dispositivo
                </label>
            </div>

            <!-- Campo Usuario Asociado -->
            <div class="relative">
                <input 
                    type="number" 
                    name="id_usuario" 
                    id="id_usuario" 
                    value="<?= $dispositivo['id_usuario']; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Usuario Asociado"
                />
                <label 
                    for="id_usuario" 
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Usuario Asociado
                </label>
            </div>
            
            <!-- Campo Barrio -->
            <div class="relative">
                <input 
                    type="number" 
                    name="id_barrio" 
                    id="id_barrio" 
                    value="<?= $dispositivo['id_barrio']; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Barrio"
                />
                <label 
                    for="id_barrio" 
                    class="absolute left-0 -top-3.5 text-sm  transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Barrio
                </label>
            </div>

            <!-- Campo Calle -->
            <div class="relative">
                <input 
                    type="number" 
                    name="id_calle" 
                    id="id_calle" 
                    value="<?= $dispositivo['id_calle']; ?>" 
                    required 
                    class="peer w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    placeholder="Calle"
                />
                <label 
                    for="id_calle" 
                    class="absolute left-0 -top-3.5 text-sm  transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                >
                    Calle
                </label>
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
