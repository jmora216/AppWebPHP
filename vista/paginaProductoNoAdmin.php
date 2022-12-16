<?php require_once 'vista/navBarUsuario.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de productos</title>
    </head>
    <body background="fondo1.jpg">
    <center>
        <div class="container mt-3">
            <h3>Lista productos</h3>
            <table class="table table-hover table-light">
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
        </div>
    </center>
</body>
</html>