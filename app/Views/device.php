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

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="mt-4 bg-gray-100 p-8 shadow-md max-w-5xl w-full mx-auto">
        <h1 class="text-black text-2xl font-sans mb-6 text-center">Register Device</h1>

        <form method="post" action="<?= base_url("add_device"); ?>" class="space-y-4">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <label for="name" class="block text-black mb-2">Name</label>
                    <input name="name" required type="text" pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+"
                        class="form-input w-full bg-gray-100 text-black pl-2" id="name" placeholder="Name Device">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/3 px-3">
                    <label for="province" class="block text-black mb-2">Province/State</label>
                    <select name="province" class="form-input w-full bg-gray-100 text-black pl-2" id="province"
                        required>
                        <option value="Elije una provincia">Elije una provincia</option>
                    </select>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label for="municipality" class="block text-black mb-2">Municipality</label>
                    <select name="municipality" class="form-input w-full bg-gray-100 text-black pl-2" id="municipality"
                        required>
                        <option value="Elije un municipio">Elije un municipio</option>
                    </select>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label for="city" class="block text-black mb-2">City</label>
                    <select name="city" class="form-input w-full bg-gray-100 text-black pl-2" id="city" required>
                        <option value="Elije una ciudad">Elije una ciudad</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label for="address" class="block text-black mb-2">Address</label>
                    <input name="address" required type="text"
                        class="form-input w-full bg-gray-100 text-black rounded-sm pl-2" id="address"
                        placeholder="Address">
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class=" bg-green-200 text-black px-4 py-2 w-full">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>