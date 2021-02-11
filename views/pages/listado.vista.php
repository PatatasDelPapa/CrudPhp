<?php
    $notas = ControladorFormularios::ctrSeleccionarNotas(null, null);
?>

<table class="table table-stripped">
    <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    <?php foreach ($notas as $key => $value): ?>

        <tr>
            <td><?php echo ($key + 1) ?></td>
            <td><?php echo $value["nombre"] ?></td>
            <td><?php echo $value["descripcion"] ?></td>
            <td><?php echo $value["fecha_creacion"] ?></td>
            <td>
                <div class="btn-group"> 
                    <div class="px-1">
                        <a href="index.php?pagina=editar&id=<?php echo $value['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    </div>
                    <form method="POST">
                        <input type="hidden" value="<?php echo $value['id']; ?>" name="eliminarNota">

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrEliminarNota();
                        ?>

                    </form>
                </div>
            </td>
        </tr>

    <?php endforeach ?>
    </tbody>
</table> 