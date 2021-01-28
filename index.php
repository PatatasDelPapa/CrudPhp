<?php
    
    /* 
        EL INDEX: En el mostraremos la salida de las vistas al usuario y también a traves de él enviaremos las
        distintas acciones que el usuario envie al controlador 
    */

    /* 
        require() establece que el código del archivo invocado es requerido, es decir, obligatorio para el
        funcionamiento del programa. Por ello, si el archivo especificado en la funcion require() no se encuentra
        saltará un error "PHP FATAL ERROR" y el programa PHP se detendrá
    */

    /*
        La version require_once() funciona de la misma forma que su respectivo, salvo que, al utilizar la versión
        once, se impide la carga de un mismo archivo más de una vez.
    */

    require_once "controllers/plantilla.controlador.php";
    require_once "controllers/formularios.controlador.php";
    require_once "models/formulario.modelo.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();


