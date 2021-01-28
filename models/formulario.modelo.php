<?php

require_once "conexion.php";

class ModeloFormularios {

    /*================================================
    Ingreso Nota
    =================================================*/

    static public function mdlIngreso($tabla, $datos) {
        
        #statement: declaración

        /*
        prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute().
        La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o
        signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la 
        sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de 
        entrecomillar manualmente los parametros.
        */
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion) VALUES (:nombre, :descripcion)");

        /*
        bindParam() Vincula una variable de PHP a un párametro de sustitución con nombre o de signo 
        de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        */
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;

    }


    /*================================================
    Seleccionar Nota(s)
    =================================================*/
    
    static public function mdlSeleccionarNotas($tabla, $item, $valor) {

        # Si no se reciben $item y $valor entonces extraer todos los datos de la db.
        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt -> fetchAll();

        # En caso contrario extraer la fila que coincida.
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();

        }
        
        $stmt->close();
        $stmt = null;
    }


    /*================================================
    Modificar Nota
    =================================================*/

    static public function mdlActualizarNota($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion WHERE id=:id");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        
        $stmt->close();
        $stmt = null;
    }

    /*================================================
    Eliminar Nota
    =================================================*/

    static public function mdlEliminarNota($tabla, $valor) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        
        $stmt->close();
        $stmt = null;
    }
}