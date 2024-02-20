<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/tipoacceso.models.php");
error_reporting(0);

$TipoAccesos = new TipoAccesos;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $data = array();
        $datos = $TipoAccesos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $IdTipoAcceso = $_POST["IdTipoAcceso"];
        $datos = array();
        $datos = $TipoAccesos->uno($IdTipoAcceso);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':

        $Detalle = $_POST["Detalle"];

        $datos = array();
        $datos = $TipoAccesos->Insertar($Detalle);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $IdTipoAcceso = $_POST["IdTipoAcceso"];
        $Detalle = $_POST["Detalle"];

        $datos = array();
        $datos = $TipoAccesos->Actualizar($IdTipoAcceso, $Detalle);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $IdTipoAcceso = $_POST["IdTipoAcceso"];
        $datos = array();
        $datos = $TipoAccesos->Eliminar($IdTipoAcceso);
        echo json_encode($datos);
        break;
}
