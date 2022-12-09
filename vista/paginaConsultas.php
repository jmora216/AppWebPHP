<!DOCTYPE html>
<?php require_once 'vista/navBar.php'; ?>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css">
        <title>Lista de productos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body background="fondo1.jpg">
        <div class="container mt-3">
            <div class="row">
                <div class="col col-3">
                    <br>
                    <h4>Filtrar usuarios</h4>
                    <form action = "?c=Consultas&a=listarUsuarios" method="POST">
                        <div class="row">
                            <div class="col col-9">
                                <select class="form-select" name="tipo" id="pet-select">
                                    <option value="">--escoge una opcion--</option>
                                    <option value="todos">Todos</option>
                                    <option value="administradores">Administradores</option>
                                    <option value="usuarios">Usuarios</option>
                                </select>  
                            </div>
                            <div class="col col-3">
                                <button class="btn btn-outline-success" type="submit">filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col col-9">
                    <div class="">
                        <table class="table table-hover table-ligth">
                            <h4>Listado usuarios</h4>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->lista as $item) : ?>
                                    <tr>
                                        <td><?php echo $item->id ?></td>
                                        <td><?php echo $item->nombre ?></td>
                                        <td><?php echo $item->usuario ?></td>
                                        <td><?php echo $item->rol ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>