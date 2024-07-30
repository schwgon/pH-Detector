<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="mt-4 bg-gray-800 p-8 rounded-xl shadow-md max-w-md w-full mx-auto">
        <h1 class="text-white text-2xl font-bold mb-6 text-center">Register</h1>
        <?php if (session()->getFlashdata('correo_message')): ?>
                <div class="alert alert-correo text-center mb-4 text-red-600	color: rgb(220 38 38);">
                    <?= session()->getFlashdata('correo_message') ?>
                </div>
            <?php endif; ?>
        <form method="post" action="<?= base_url("addDevice"); ?>">
            <div class="mb-4">
                <label for="id" class="">ID del dispositivo</label>
                <input name="id" required type="text" class="" id="id">
            </div>
            <div class="mb-4">
                <label for="name" class="">Nombre del dispositivo</label>
                <input name="name" required type="text" class="" id="name">
            </div>
            <div class="mb-6">
                <label for="calle" class="">Calle</label>
                <input name="calle" required type="text" class="" id="calle">
            
                <label for="barrio" class="">Barrio</label>
                <input name="barrio" required type="text" class="" id="barrio">
            </div>
            <div class="mb-6">
                <label for="ciudad" class="">Ciudad</label>
                <input name="ciudad" required type="text" class="" id="ciudad">
            </div>
            <div class="mb-6">
                <label for="provincia" class="">Provincia</label>
                <input name="provincia" required type="text" class="" id="provincia">
            </div>
            <div class="mb-6">
                <label for="pais" class="">Pais</label>
                <input name="pais" required type="text" class="" id="pais">
            </div>
            <button type="submit" class="">Agregar</button>
        </form>
    </div>

</body>

</html>