<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estiloProductos.php">
        <title>Lista de productos</title>
    </head>
    <body background="fondo1.jpg">
    <center>
        <div class="table-wrapper">
            <table class="fl-table">
                <h1>Carrito</h1>

                <?php $user = $_SESSION['usuario']; ?>
                <?php $total = 0.0; ?>
                <h2> Hola, <?php echo $user; ?></h2>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->crud2->ListarCarrito($_SESSION['ID']) as $item): ?>

                        <tr>
                            <td><?php echo $item->nombreProducto; ?></td>
                            <td><?php echo $item->precioProducto; ?></td>
                            <td>
                                <a onclick="javascript: return confirm('¿Está seguro de eliminar este producto?');" 
                                   href="?c=Carrito&a=EliminarProducto&codigoProducto=<?php echo $item->codigoProducto ?>">
                                    <img src="css/eliminar.png"></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

                <?php foreach ($this->crud2->ListarCarrito($_SESSION['ID']) as $item): ?>

                    <?php $total += $item->precioProducto; ?>

                <?php endforeach; ?>

            </table>
            <h2> Total = <?php echo $total; ?> </h2>
            <br>
            <?php if ($_SESSION['rol'] == 'admin') { ?>
                <button id="boton" onclick="document.location = '?c=Admin&a=Index'">Regresar</button> 
            <?php } else { ?>
                <button id="boton" onclick="document.location = '?c=NoAdmin&a=Index'">Regresar</button>
            <?php } ?>

            <button id="boton" onclick="document.location = '?c=Principal&a=cerrarSesion'">Cerrar Sesion</button>
        </div>
    </center>
</body>
</html>
