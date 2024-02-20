<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Accesos
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Accesos.*, Usuarios.Nombres, Usuarios.Apellidos FROM `Accesos` inner JOIN Usuarios on Accesos.Usuarios_idUsuarios = Usuarios.idUsuarios;";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idAccesos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Accesos WHERE idAccesos = $idAccesos";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($usuariosId, $IdTipoAcceso)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Accesos(Usuarios_idUsuarios,IdTipoAcceso) values ( $usuariosId, $IdTipoAcceso)";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close();
    }
}
