<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Prueba de carga</h1>
    <form method="post" action="<?= base_url("loginForm"); ?>">
        <br> </br>
        <div class="screen">
            <div class="login">

        		<div class="login__field">
        			<i class="login__icon fas fa-user"></i>
    				<input type="text" class="login__input" name="email" placeholder="Email">
    			</div>

        		<div class="login__field">
        			<i class="login__icon fas fa-lock"></i>
        			<input type="password" class="login__input" name="password" placeholder="Password">
        		</div>

        		<button class="button login__submit">Iniciar Sesion</button>
                			
        	</div>
        </div>
    </form>
    <div class="wrapper">
        <p> ¿No tienes una cuenta?
        <a href="<?= site_url("register"); ?>">Registrarse</a></p>
    </div>
</body>
</html>