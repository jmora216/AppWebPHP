<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.php">
    </head>
    <body>
    <center>
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Bienvenido</span></div>
                <form action = "?c=Principal&a=AsignarControlador" method="POST">
                    <div class="row">
                        <input name = "username" type="text" placeholder="Usuario" required>
                    </div>
                    <br><br>
                    <div class="row">
                        <input name = "password" type="password" placeholder="Contraseña" required>
                    </div>
                    <br><br>
                    <input type="submit" name="Submit" value="Login" id="boton">
                </form>
            </div>
        </div>
    </center>
</body>
<footer>
    <h4></h4>
</footer>
</html>
