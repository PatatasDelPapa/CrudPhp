<?php

class ControladorFormularios {
    
    /*================================================
    Ingresar Nota
    =================================================*/

    static public function ctrIngreso() {

        if (isset($_POST["registroNombre"]) && isset($_POST["registroDesc"])) {

            $tabla = "notas";
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "descripcion" => $_POST["registroDesc"]
            );

            $respuesta = ModeloFormularios::mdlIngreso($tabla, $datos);

            return $respuesta;

        }
    }

    /*================================================
    Seleccionar Notas
    =================================================*/

    static public function ctrSeleccionarNotas($item, $valor) {
        $tabla = "notas";

        $respuesta = ModeloFormularios::mdlSeleccionarNotas($tabla, $item, $valor);

        return $respuesta;
    }


    /*================================================
    Actualizar Nota
    =================================================*/

    static public function ctrActualizarNota() {

        if ((isset($_POST["actualizarNombre"]) && isset($_POST["actualizarDesc"])) && isset($_POST["idNota"])) {

            $tabla = "notas";
            $datos = array(
                "id" => $_POST["idNota"],
                "nombre" => $_POST["actualizarNombre"],
                "descripcion" => $_POST["actualizarDesc"]
            );

            $respuesta = ModeloFormularios::mdlActualizarNota($tabla, $datos);

            return $respuesta;

        }
    }

    /*================================================
    Eliminar Nota
    =================================================*/

    public function ctrEliminarNota() {
        if ((isset($_POST["eliminarNota"]))) {

            $tabla = "notas";
            $valor = $_POST["eliminarNota"];

            $respuesta = ModeloFormularios::mdlEliminarNota($tabla, $valor);

            if($respuesta == "ok") {

                echo '<script> 
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    
                        window.location = "index.php?pagina=listado";
                    </script>';
                    
            }
        } 
    }

}