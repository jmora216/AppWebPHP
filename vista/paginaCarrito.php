<?php 
    if ($_SESSION['rol'] == 'admin') { 
        require_once 'vista/navBar.php';
    }else{
        require_once 'vista/navBarUsuario.php';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de productos</title>
    </head>
    <body background="fondo1.jpg">
    <center>
        <div class="container mt-3">
            <table class="table table-hover table-light">
                <?php $user = $_SESSION['usuario']; ?>
                <?php $total = 0.0; ?>
                <h4> Carrito de compra</h4>
                <h4> Hola <?php echo $user; ?>, estos son tus productos</h4>
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
            <h5> Total = <?php echo $total; ?> </h5>
        </div>
    </center>
</body>
</html>
