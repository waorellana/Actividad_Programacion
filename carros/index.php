<?php
/* -------------------------------------------------------------------------- */
/*                                CONTROLADORES                               */
/* -------------------------------------------------------------------------- */


require_once "controllers/carros.controlador.php";
require_once "controllers/plantilla.controladores.php";

/* -------------------------------------------------------------------------- */
/*                                MODELOS                                     */
/* -------------------------------------------------------------------------- */

require_once "models/carros.modelos.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

