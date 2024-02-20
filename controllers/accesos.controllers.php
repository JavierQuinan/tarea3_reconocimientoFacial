<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Accesos.models.php");
error_reporting(0);

$Accesos = new Accesos;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $data = array();
        $datos = $Accesos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $sub_array = array();
            $sub_array[] = $row["Ultimo"];
            $sub_array[] = $row["Nombres"] . " " . $row["Apellidos"];
            $sub_array[] = '<button type="button" onClick=editar(' . $row["idAccesos"] . ') class="btn btn-outline-success">Editar</button>  <button type="button" onClick=eliminar(' . $row["idAccesos"] . ') class="btn btn-outline-danger">Eliminar</button> ';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idAccesos = $_POST["idAccesos"];
        $datos = array();
        $datos = $Accesos->uno($idAccesos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $usuariosId = $_POST["usuariosId"];
        $tipo = $_POST["tipo"];
        $datos = array();
        $datos = $Accesos->Insertar($usuariosId, $tipo);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
}
