<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class TipoAccesos
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Tipo_Acceso`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($IdTipoAcceso)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Tipo_Acceso` WHERE `IdTipoAcceso`=$IdTipoAcceso";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Detalle)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Tipo_Acceso`(`Detalle`) VALUES ('$Detalle')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close();
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($IdTipoAcceso, $Detalle)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Tipo_Acceso` SET `Detalle`='$Detalle' WHERE `IdTipoAcceso`=$IdTipoAcceso";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($IdTipoAcceso)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Tipo_Acceso where IdTipoAcceso = $IdTipoAcceso";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }
}
