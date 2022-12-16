<?php
if ($_SESSION['rol'] == 'admin') {
    require_once 'vista/navBar.php';
} else {
    require_once 'vista/navBarUsuario.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="">
        <title>Lista de productos</title>
    </head>
    <body background="fondo1.jpg">
    <center>
        <div class="container mt-3">
            <h3>Listado de Productos</h3>
            <div class="row">
                <div class="col-3">
                    <h4>Filtrar por precio</h4>
                    <form action = "?c=Admin&a=listar" method="POST">
                        <div class="row">
                            <div class="col col-9">
                                <select class="form-select" name="precio" id="pet-select">
                                    <option value="">--escoge una opcion--</option>
                                    <option value="50000">menores que 50000</option>
                                    <option value="10000">menores que 10000</option>
                                    <option value="5000">menores que 5000</option>
                                    <option value="2000">menores que 2000</option>
                                    <option value="1000">menores que 1000</option>
                                </select>  
                            </div>
                            <div class="col col-3">
                                <button class="btn btn-outline-info" type="submit">filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <?php if ($_SESSION['rol'] == 'admin') { ?>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-outline-success" onclick="document.location = '?c=Admin&a=Formulario'">agregar producto</button>
                        </div>
                    <?php } ?>
                    <table class="table table-hover table-light">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Agregar al Carrito</th>
                                <?php if ($_SESSION['rol'] == 'admin') { ?>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->lista as $item): ?>
                                <tr>
                                    <td><?php echo $item->codigo; ?></td>
                                    <td><?php echo $item->nombre; ?></td>
                                    <td><?php echo $item->precio; ?></td>
                                    <td>
                                        <a onclick="javascript: return confirm('¿Está seguro de agregar este producto al carrito?');"
                                           href="?c=Carrito&a=AgregarProducto&codigo=<?php echo $item->codigo ?>">
                                            <img src="css/anadir-al-carrito.png"></a>
                                    </td>
                                    <?php if ($_SESSION['rol'] == 'admin') { ?>
                                    <td>
                                        <a href="?c=Admin&a=Formulario&codigo=<?php echo $item->codigo ?>">
                                            <img src="css/editar.png"></a>
                                    </td>
                                    <td>
                                        <a onclick="javascript: return confirm('¿Está seguro de eliminar este producto?');" 
                                           href="?c=Admin&a=Eliminar&codigo=<?php echo $item->codigo ?>">
                                            <img src="css/eliminar.png"></a>
                                    </td>
                                    <?php } ?>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </center>
</body>
</html>
