<?php

class ControladorPlantilla {

    /*================================================
    llamada a la plantilla
    =================================================*/

    public function ctrTraerPlantilla() {

        #include() se utiliza para invocar el archivo que contiene el codigo html-php.
        include "views/plantilla.vista.php";
    }

}
