<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/auth.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body class="flex justify-center items-center min-h-screen">

    <!-- Tarjeta del formulario con fondo claro/oscuro -->
    <div class="card p-8 shadow-md max-w-5xl w-full mx-auto border-2 border-emerald-400">
        <h1 class="signup">Register</h1>

        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-correo text-center mb-4 text-red-600">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url("register1"); ?>">
            <div class="inputBox">
                <input name="name" required type="text" pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+" placeholder=" " />
                <span>User</span>
            </div>
            <div class="inputBox">
                <input name="email" required type="email" placeholder="" />
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input name="password" required type="password" minlength="8" placeholder=" " />
                <span>Password</span>
            </div>
            <button type="submit" class="relative inline-flex h-12 active:scale-95 transition overflow-hidden rounded-lg p-[1px] focus:outline-none">
  <span
    class="absolute inset-[-1000%] animate-[spin_2s_linear_infinite] bg-[conic-gradient(from_90deg_at_50%_50%,#e7029a_0%,#f472b6_50%,#bd5fff_100%)]" >
  </span>
  <span
    class="inline-flex h-full w-full cursor-pointer items-center justify-center rounded-lg bg-slate-950 px-7 text-sm font-medium text-white backdrop-blur-3xl gap-2">
    Enter
    <svg
      stroke="currentColor"
      fill="currentColor"
      stroke-width="0"
      viewBox="0 0 448 512"
      height="1em"
      width="1em"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M429.6 92.1c4.9-11.9 2.1-25.6-7-34.7s-22.8-11.9-34.7-7l-352 144c-14.2 5.8-22.2 20.8-19.3 35.8s16.1 25.8 31.4 25.8H224V432c0 15.3 10.8 28.4 25.8 31.4s30-5.1 35.8-19.3l144-352z"
      ></path>
    </svg>
  </span>
</button>

        </form>

        <span class="text-center mt-4">
            Do you already have an account?
            <a href="<?= site_url("login"); ?>" class="text-emerald-400 hover:text-emerald-500 ml-2">Log In</a>
        </span>
    </div>

</body>
</html>
