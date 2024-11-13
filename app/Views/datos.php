<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Panel - CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 font-sans">Datos de pH</h1>

        <!-- Tabla para mostrar registros -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h2 class="text-2xl font-semibold">Lista de pH</h2>
            </div>

            <div class="p-6 bg-gray-900">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-white">Valor pH</th>
                            <th class="px-4 py-2 text-left text-white">Fecha y Hora</th>
                            <th class="px-4 py-2 text-left text-white">Estado pH</th> <!-- Nueva columna -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dat): ?>
                            <?php
                                // Clasificar el valor pH
                                $ph_value = $dat['ph_value'];
                                if ($ph_value < 6.0) {
                                    $estado = 'Bajo';
                                    $estado_class = 'bg-red-500';
                                } elseif ($ph_value > 8.0) {
                                    $estado = 'Alto';
                                    $estado_class = 'bg-yellow-500';
                                } elseif ($ph_value <= 8.0) {
                                    $estado = 'Normal';
                                    $estado_class = 'bg-green-500';
                                } 
                            ?>
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= htmlspecialchars($ph_value); ?></td>
                                <td class="border-t border-gray-700 px-4 py-2 text-white"><?= htmlspecialchars($dat['dia']." - ".$dat['mes']." - ".$dat['ano']); ?></td>
                                <td class="border-t border-gray-700 px-4 py-2 text-white <?= $estado_class; ?>"><?= htmlspecialchars($estado); ?></td> <!-- Nueva celda -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>