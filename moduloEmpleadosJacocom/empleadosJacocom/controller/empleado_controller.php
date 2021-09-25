<?php
ini_set("display_errors", "1");
error_reporting(E_ERROR);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datos_primarios
 *
 * @author Usuario
 */
class empleado_controller extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }
    /*************************************************************************************
     * FECHA: 09/2021
     * AUTOR: LUIS JACOBO DIAZ MUÑOZ
     * DESCRIPCION: En esta funcion se llama al cargar view para mostrar la pagina que se desea, adicional
     * se agrega codigo que obtiene las aras para su selecicon en un select html.
     ************************************************************************************/
    function contenidoEmpleados(){
        $modelo = $this->conectarControlABd();
        // se obtinen las areas para ser asignadas a los usuarios, en este caso se motraran para su selecion en un select html
        $modelo->getAreaTotales();
        $datosOdbcAreas = $modelo->getDatosOdbc();
        $arrayOdbcAreas = $datosOdbcAreas->getRegstroAll();
        $contreg = count($arrayOdbcAreas);
        $selectAreasHtml = "<select id='selectAreas'>";
        for($i=0;$<$contreg;$i++){
            $idarea = $arrayOdbcAreas[$i]["id"];
            $nombrearea = $arrayOdbcAreas[$i]["nombre"];
            $selectAreasHtml = $selectAreasHtml."<option value = '".$idarea."'>".$nombre."</option>";
        }
        $selectAreasHtml = $selectAreasHtml."</select>";
        echo $selectAreasHtml."|>"; // se usa esta concatenacion para que al pasar el codigo cargado de la pagina, unido con el select, los cuales se separan con javascript y asi poder poner los cada uno en su elemento html
        // Se obtienen los roles que estan en base de datos para ser presentados y seleccionados.
        $modelo->getRolesTotales();
        $datosOdbcRoles = $modelo->getDatosOdbc();
        $arrayOdbcRoles = $datosOdbcRoles->getRegistroAll();
        $contreg = count($arrayOdbcRoles);
        $radiosSeccionRoles = "";
        for($i=0;$i<$contreg;$i++){
            $idrol = $arrayOdbcRoles[$i]["id"];
            $nombrerol = $arrayOdbcRoles[$i]["nombre"];
            $radiosSeccionRoles = $radiosSeccionRoles."<label><input type='checkbox' id='".$idrol."'>".$nombrerol."</label><br>";
        }
        echo $radiosSeccionRoles."|>";
        // se crea la lista de empleados para ser cargados en las seccion lista, asi se veran los que ahy mienras insertar el nuevo.
        $modelo->getLsitadoEmpleados();
        $datosOdbcEmpleados = $modelo->getDatosOdbc();
        $arrayOdbcEmpleados = $datosOdbcEmpleados->getRegistroAll();
        $cantreg = count($arrayOdbcEmpleados);
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, nombre, 'Nombre', 'text-center', '', '', '', '', '', '', false, '', '', '', '', 'col-fec');
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, email, 'Correo Electronico', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, sexo, 'Sexo', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');  
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, area, 'Area', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, boletin, 'Boletin', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, modificar, 'Modificar', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');
        $this->arraytabla = agregaCampo($this->arraytabla, empleado, titulo, eliminar, 'Eliminar', 'text-center', '', '', '', '', '', '', false, '', '', '', '', '');
        for($i=1;$i<=$contreg;$i++){
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, $arrayOdbcEmpleados[$i-1]["nombemp"], 'Nombre', 'text-center');
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, $arrayOdbcEmpleados[$i-1]["emailemp"], 'text-center');
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, $arrayOdbcEmpleados[$i-1]["sexo"], 'Sexo', 'text-center');  
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, $arrayOdbcEmpleados[$i-1]["area"], 'Area', 'text-center');
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, $arrayOdbcEmpleados[$i-1]["boletin"], 'Boletin', 'text-center');
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, "<img src='../resources/image/update_icon.png'>", 'Modificar', 'text-center');
            $this->arraytabla = agregaCampo($this->arraytabla, empleado, $i, "<img src='../resources/image/update_icon.png'>", 'Eliminar', 'text-center');
        }
        crearTabla1($this->arraytabla, true, '', '', 'tablaPrincipal');
        echo "|>";
        $vista = cargarView("moduloEmpleados");
        $vista->html();
    }
    
    function conectarControlABd(){
        $modelo = cargarModel('moduloEmpleados');
        $modelo->conectar(ODBCMYSQL, ODBC_USERMYSQL, ODBC_PASSMYSQL, '', INICIAR_SIMULADOR);
        return $modelo;
    }
}  