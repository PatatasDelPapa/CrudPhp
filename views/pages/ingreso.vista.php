<div>
<!-- Formulario para ingresar nuevas notas al sistema -->
<form class="p-5 bg-light" method="POST">

    <div class="form-group">

        <label for="nombre">Nombre:</label>

        <div class="input-group">

            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-tasks"></i></span>

            </div>

            <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="registroNombre">

        </div>

    </div>

    <div class="form-group">

        <label for="descripcion">Descripción:</label>

        <div class="input-group">

            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>

            </div>

            <input type="text" class="form-control" placeholder="Ingrese descripcion" id="desc" name="registroDesc">

        </div>

    </div>



    <?php 

        /*================================================
        Forma en como se instancia la clase de un metodo no estático
        =================================================*/

        // $ingreso = new ControladorFormularios();
        // $ingreso -> ctrIngreso();
        
        /*================================================
        Forma en como se instancia la clase de un metodo estático
        =================================================*/

        $ingreso = ControladorFormularios::ctrIngreso();

        if ($ingreso == "ok") {

            /*
            Script para eliminar cache de los datos enviados
            */
            echo '<script> 
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>';
            
            echo '<div class="alert alert-success">La nota ha sido registrada</div>';

        }


    ?>

    <button type="submit" class="btn btn-primary">Enviar</button>

</form>
</div>