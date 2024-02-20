<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Usuarios_Roles
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Usuarios_Roles";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idAccesos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Usuarios_Roles WHERE idAccesos = $idAccesos";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Usuarios_idUsuarios, $Roles_idRoles,)
    {


        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Usuarios_Roles(Usuarios_idUsuarios,Roles_idRoles) values ( $Usuarios_idUsuarios,  $Roles_idRoles )";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($Usuarios_idUsuarios, $Roles_idRoles, $idUsuariosRoles,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Usuarios_Roles set Usuarios_idUsuarios=$Usuarios_idUsuarios,Roles_idRoles=$Roles_idRoles, where idUsuariosRoles= $idUsuariosRoles";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($Usuarios_idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Usuarios_Roles` WHERE `Usuarios_idUsuarios`= $Usuarios_idUsuarios";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }
}
