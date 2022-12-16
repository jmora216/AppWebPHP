<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.php">
        <title>Gestión de Productos</title>
    </head>
    <body>
    <center>
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>
                        <?php
                        if ($obj->codigo != null) {
                            echo 'Actualización';
                        } else {
                            echo 'Nuevo Registro';
                            $obj->codigo = -1;
                        }
                        ?>
                    </span></div>
                <form action="?c=Admin&a=Guardar" method="POST">
                    <div class="row">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" value="<?php echo $obj->nombre; ?>" required>
                    </div>
                    <br>
                    <div class="row">
                        <label>Precio:</label>
                        <input type="text" name="precio" value="<?php echo $obj->precio; ?>" required>
                    </div>
                    <input type="submit" name="Submit" value="Guardar" id="boton">
                    <button id="boton" onclick="document.location = '?c=Admin&a=Index'">Regresar</button>
                </form>
                </table>
            </div>
        </div>
    </center>
</body>
</html>
