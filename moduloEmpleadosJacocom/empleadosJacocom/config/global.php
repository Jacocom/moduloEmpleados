<?php

define('RAIZ_CORE', dirname(__FILE__,8)); //nos estamos devolviendo un nivel en la ruta padre para ingresar a otra aplicacion que es msm


$absolute_path_core = "";

if (DIRECTORY_SEPARATOR == '/') {
    $absolute_path_core = RAIZ_CORE . '/';
} else {
    $absolute_path_core = str_replace('\\', '/', RAIZ_CORE);
}


define('RUTAS_CORE', $absolute_path_core);
//echo RUTAS_CORE;


/* El controlador que se ejecutara por defecto junto con su metodo por defecto */
define('CONTROLADOR_DEFECTO', 'empleado');
define('ACCION_DEFECTO', 'index');

/*
  todos los proyectos apuntaran a la raiz de la carpeta que contiene el MVC junto con todas las funciones y librerias que se usaran
  y de esa forma reutilizar codigo y ahorrar espacio en disco.
 */
define('RUTA_IMG', 'image_request_app/');
//define('RUTA_MVC', $_SERVER['DOCUMENT_ROOT'] . '/application/');

define('RUTA_MVC', RUTAS_CORE . '/application/');
define('RUTA_RECURSOS', '/application/');
define("INICIAR_SIMULADOR", false);


define("ODBCMYSQL", 'prueba_tecnica_dev'); 
define('ODBC_USERMYSQL', 'root');
define('ODBC_PASSMYSQL', 'jacocom2032');


?>
