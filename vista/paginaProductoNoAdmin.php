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
                <h1>Listado de Productos</h1>
                <div>
                    <button id="boton" onclick="document.location = '?c=Carrito&a=ListarCarrito'">Ver Carrito</button>
                </div>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Agregar al Carrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->crud->Listar() as $item): ?>

                        <tr>
                            <td><?php echo $item->codigo; ?></td>
                            <td><?php echo $item->nombre; ?></td>
                            <td><?php echo $item->precio; ?></td>   
                            <td>
                                <a onclick="javascript: return confirm('¿Está seguro de agregar este producto al carrito?');"
                                   href="?c=Carrito&a=AgregarProducto&codigo=<?php echo $item->codigo ?>">
                                    <img src="css/anadir-al-carrito.png"></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>
            <button id="boton" onclick="document.location = '?c=Principal&a=cerrarSesion'">Cerrar Sesion</button>
        </div>
    </center>
</body>
</html>