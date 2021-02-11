<?php

    if(isset($_GET["id"])){
        $item = "id";
        $valor = $_GET["id"];
        $nota = ControladorFormularios::ctrSeleccionarNotas($item, $valor);
    }

?>

<div>
<form class="p-5 bg-light" method="POST">

    <div class="form-group">

        <div class="input-group">

            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-tasks"></i></span>

            </div>

            <input type="text" class="form-control" value="<?php echo $nota["nombre"]; ?>" placeholder="Escriba el nombre" id="nombre" name="actualizarNombre">

        </div>

    </div>

    <div class="form-group">

        <div class="input-group">

            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>

            </div>

            <input type="text" class="form-control" value="<?php echo $nota["descripcion"] ?>" placeholder="Escriba la descripción" id="desc" name="actualizarDesc">
            <input type="hidden" name="idNota" value="<?php echo $nota["id"] ?>">
        </div>

    </div>



    <?php 
        $actualizar = ControladorFormularios::ctrActualizarNota();
        
        /*
        Script para eliminar cache de los datos enviados y que además
        crea una alerta para posteriormente redireccionar a la vista
        de listado.
        */
        if ($actualizar == "ok") {
            echo '<script> 
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>';
        
            echo '<div class="alert alert-success">La nota ha sido actualizada</div>

            <script>
                setTimeout(function() {
                    window.location = "index.php?pagina=listado";
                }, 3000);
            </script>';

        }

    ?>

    <button type="submit" class="btn btn-primary">Actualizar</button>

</form>
</div>