<?php

// ini_set("display_errors", "1");
// error_reporting(E_ERROR);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class notascontab_model extends Odbc {

  function __construct() {
    
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: realiza la consulta de la lista de empleados para mostrar en el listado de la vista.
  ******************************************************************************/
  function getLsitadoEmpleados(){
    $consulta = "SELECT e.nombre nombemp, e.email emailemp, case e.sexo  when 'M' then 'Masculino' else 'Femenino' end as sexo, a.nombre area, e.boletin boletin FROM empleado e JOIN areas a ON(e.area_id = a.id) JOIN empleado_rol e_r ON (e.id = e_r.empleado_id) JOIN roles r ON (r.id = e_r.rol_id);";
    $this->consultar($consulta, __FUNCTION__);
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: realiza la insercion de un nuevo empleado, no se envia el id del 
    empleado pues al ser auto incremetable el sitema lo toma automaticamente.
    Se usa la variable contErrores para capturar un valor resultado de la correcta o incorrecta 
    ejecucion de la sentencia en este caso de insercion
  ******************************************************************************/
  function setEmpleadoNuevo($nombre, $email, $sexo, $area_id, $boletin, $desripcion){
    $contErrores = 0;
    $dml = "INSERT INTO empleado (nombre, email, sexo, area_id, boletin, descripcion) 
              VALUES ('".$nombre."','".$email."','".$sexo."','".$area_id."','".$boletin."','".$descripcion."')";
    $contErrores = $this->consultar($dml, __FUNCTION__);
    return $contErrores;
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: Se realiza la acutalizacion de la informacion del emplado, para este caso si se 
    recibe como parametro el id del empleado para orientar la acutlaizacion a ese id especificamente.
    Se usa la variable contErrores para capturar un valor resultado de la correcta o incorrecta 
    ejecucion de la sentencia en este caso actualizacion
  ******************************************************************************/
  function setEmpleadoUpdate($id, $nombre, $email, $sexo, $area_id, $boletin, $desripcion){
    $contErrores = 0;
    $dml = "UPDATE empleado SET nombre = '".$nombre."', email = '".$email."', sexo = '".$sexo."', area_id = '".$area_id."', boletin = '".$boletin."', descripcion = '".$descripcion."' WHERE id = '".."'";
    $contErrores = $this->consultar($dml, __FUNCTION__);
    return $contErrores;
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: Se realiza la eliminacion del empleado, para este coso se eliminara el registro, ya que la tabla
    de empleados no posee un campo de estado activo o inactivo, para eviar eliminar el registo como tal.
    Se usa la variable contErrores para capturar un valor resultado de la correcta o incorrecta 
    ejecucion de la sentencia en este caso al elminar.
  ******************************************************************************/
  function setEmpleadoEliminar($id_empleado){
    $contErrores = 0;    
    $dml = "DELETE FROM empleado WHERE id = '$id_empleado'";
    $contErrores = $this->consultar($dml, __FUNCTION__);
    return $contErrores;
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: funcion que trae las areas almacenadas en base de datos.
  ******************************************************************************/
  function getAreaTotales(){
    $consulta = "SELECT id, nombre FROM areas ORDER BY nombre ASC";
    $this->consultar($consulta, __FUNCTION__);
  }
  /******************************************************************************
    FECHA: 09/2021
    AUTOR: luis jacobo Diaz muñoz
    DESCRIPCION: funcion que consulta todos los roles posibles
  ******************************************************************************/
  function getRolesTotales(){
    $consulta = "SELECT id, nombre FROM roles ORDER BY nombre ASC";
    $this->consultar($consulta, __FUNCTION__);
  }
}
?>