<?php

    class Conexion {
        static public function conectar() {

            #PDO("nombre del servidor; nombre base de datos", "usuario", "contraseña");

            $link = new PDO(
                "mysql:host=localhost;dbname=crud_basico",
                "root",
                ""
            );

            $link->exec("set names utf8");
            return $link;
        }
    }
?>