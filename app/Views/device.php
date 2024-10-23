<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device</title>
    <script src="<?= base_url('./js/address.js'); ?>"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <!-- Contenedor del formulario -->
    <div class="max-w-4xl w-full mx-auto bg-transparent border-2 border-emerald-400 shadow-2xl p-8 space-y-8">
        <h1 class="text-2xl font-extrasans text-center">Register Device</h1>

        <form method="post" action="<?= base_url("add_device"); ?>" class="space-y-6">
            <!-- Campo Nombre del Dispositivo -->
            <div class="relative">
                <input
                    name="name"
                    id="name"
                    type="text"
                    pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required
                    placeholder="Name Device"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                    for="name"
                >
                    Device Name
                </label>
            </div>

            <!-- Selección de Provincia, Municipio y Ciudad -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Campo Provincia -->
                <div>
                    <label for="province" class="block mb-2">Province/State</label>
                    <select id="province" name="province" class="w-full text-black rounded-lg border border-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400" required>
                        <option value="">Choose a province</option>
                    </select>
                </div>

                <!-- Campo Municipio -->
                <div>
                    <label for="municipality" class="block mb-2">Municipality</label>
                    <select id="municipality" name="municipality" class="w-full text-black rounded-lg border border-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400" required>
                        <option value="">Choose a municipality</option>
                    </select>
                </div>

                <!-- Campo Ciudad -->
                <div>
                    <label for="city" class="block mb-2">City</label>
                    <select id="city" name="city" class="w-full text-black rounded-lg border border-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400" required>
                        <option value="">Choose a city</option>
                    </select>
                </div>
            </div>

            <!-- Campo Dirección -->
            <div class="relative">
                <input
                    name="address"
                    id="address"
                    type="text"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required
                    placeholder="Address"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                    for="address"
                >
                    Address
                </label>
            </div>

            <!-- Campo Litros -->
            <div class="relative">
                <input
                    name="liters"
                    id="liters"
                    type="number"
                    step="0.01"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required
                    placeholder="Liters that the device will measure"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                    for="liters"
                >
                Liters that the device will measure
                </label>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="w-full py-2 px-4 bg-emerald-600 hover:bg-emerald-500 rounded-md shadow-lg font-semibold transition duration-200">
                Submit
            </button>
        </form>
    </div>
</body>

</html>
