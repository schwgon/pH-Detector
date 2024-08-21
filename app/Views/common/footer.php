<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<footer class="flex flex-col items-center justify-center py-4 bg-transparent text-black">
    <div class="flex flex-wrap justify-between w-full px-11 mb">
        <div class="flex items-center justify-center space-x-2">
            <h2 class="text-xl font-sans text-black">Contact</h2>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <a href="https://www.instagram.com">
            <i class="fab fa-instagram w-6 h-6 hover:opacity-75" style="color: black;"></i>
            </a>
            <a href="https://www.facebook.com">
            <i class="fab fa-facebook w-6 h-6 hover:opacity-75" style="color: black;"></i>
            </a>
            <a href="https://mail.google.com/">
            <i class="fas fa-envelope w-6 h-6 hover:opacity-75" style="color: black;"></i>
            </a>
            <a href="tel:+1234567890">
            <i class="fas fa-phone w-6 h-6 hover:opacity-75" style="color: black;"></i>
            </a>
        </div>
        <div class="text-sm text-black">
            <p>Subscribe to our newsletter!</p>
            <a href="<?php echo base_url('register') ?>" class="text-black hover:underline">Sign Up</a>
        </div>
    </div>
    <hr class="border-indigo-400 w-full my-2">
    <div class="text-center text-sm text-black mt-2">
        <p>&copy; Todos los derechos reservados</p>
    </div>
</footer>
</body>
</html>
