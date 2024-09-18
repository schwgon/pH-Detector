<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
<footer class="flex flex-col items-center justify-center py-4 bg-transparent text-black">
    <div class="flex flex-wrap justify-between w-full px-11 mb-2">
        <div class="flex items-center justify-center space-x-2">
            <h2 class="text-xl font-sans">Contact</h2>
            <a href="https://www.instagram.com">
                <i class="fab fa-instagram w-6 h-6 hover:opacity-75"></i>
            </a>
            <a href="https://www.facebook.com">
                <i class="fab fa-facebook w-6 h-6 hover:opacity-75 "></i>
            </a>
            <a href="https://mail.google.com/">
                <i class="fas fa-envelope w-6 h-6 hover:opacity-75"></i>
            </a>
            <a href="tel:+1234567890">
                <i class="fas fa-phone w-6 h-6 hover:opacity-75"></i>
            </a>
        </div>
        <div class="text-sm">
            <p>Subscribe to our newsletter!</p>
            <a href="<?php echo base_url('register') ?>" class="hover:underline ">Sign Up</a>
        </div>
    </div>
    <hr class="border-emerald-400 w-full my-2">
    <div class="text-center text-sm mt-2">
        <p>&copy; Todos los derechos reservados</p>
    </div>
</footer>
</body>
</html>
