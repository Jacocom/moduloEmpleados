<?php

class moduloEmpleados_view extends VistaBase {

    function html() {
      // echo  "<pre>";
      // var_dump($arrayDatosInicial);
      // echo "</pre>";
      // $nivel = $_SESSION['session_intranet_nivel'];

    ?>

   <!--  <script type="text/javascript">
      $("#verifi").on("click",function(){
        // alert("click");
        var cantSeleccionados = document.getElementsByTagName('input').length;
        for(var i=0;i<cantSeleccionados;i++){
          if(document.getElementsByTagName('input')[i].id == "chekfgysverifi"){
            if(document.getElementsByTagName('input')[i].checked == false){
              if((i+1)==cantSeleccionados){
                abrir_modal_dialog('IBG - Desarrollo', 'form-oe', 'Aceptar');
                var validacion = "<div id='valida'><h1>No se ha seleccionado ningún registro</h1></div>";
                $("#form-oe").html(validacion);
                // alert("hay check sin checked");
                event.preventDefault();
              }
            }else{
              i=cantSeleccionados;
            }
          }  
        }
      });
      $("#selecc").on("click",function(){
        var cantSeleccionados = document.getElementsByTagName('input').length;
        for(var i=0;i<cantSeleccionados;i++){
          if(document.getElementsByTagName('input')[i].id == "chekfgys"){
            if(document.getElementsByTagName('input')[i].checked == false){
              if((i+1)==cantSeleccionados){
                abrir_modal_dialog('IBG - Desarrollo', 'form-oe', 'Aceptar');
                var validacion = "<div id='valida'><h1>No se ha seleccionado ningún registro</h1></div>";
                $("#form-oe").html(validacion);
                event.preventDefault();
              }
            }else{
              i=cantSeleccionados;
            }
          }
        }  
      });
    </script> -->
    <div id="contenido_repoe">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            </div>

            <div class="box-body">
              <div id="div_ordserv">
                <div class="div-form">
                  <div class="form-general">
                    <div class="head-form form-inline">
                      <div class="title-form pull-left"><span><h4>MODULO EMPLEADOS</h4></span></div>
                      <div class="clearfix"></div>
                    </div>
                    <hr> 
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    </div>
                    
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Nombre Completo: * </span>
                          <input id="nombre_empld" type="text" maxlength="10" class="form-control text-right input-sm" maxlength="50" >
                      </div>
                      <span id="errorVacioNombre" style="color:red" hidden="hidden">"El campo nombre es requerido."</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Correo Electronico: * </span>
                          <input id="email_empld" type="text" maxlength="10" class="form-control text-right input-sm" maxlength="50" >
                      </div>
                      <span id="errorVacioEmail" style="color:red" hidden="hidden">"El campo Correo Electronico es requerido."</span>
                    </div><div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    </div>
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Sexo: * </span>
                          <input id="sexo_empld" type="radio" maxlength="10" class="form-control text-right input-sm" maxlength="50" >
                      </div>
                      <span id="errorVacioSexo" style="color:red" hidden="hidden">"El campo Sexo es requerido."</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Area: * </span>
                          <!-- ojo este select lo debo pintar en php y ponerlo en una capa, en este caso se queda asi mientras se adelanta, otras secciones -->
                          <div id="seleccionarea">
                            <!-- en esta seccion por medio de js se insertara el elmento creado en php -->
                          </div>
                      </div>
                      <span id="errorVacioArea" style="color:red" hidden="hidden">"El campo Area es requerido."</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    </div>
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Descripcion: * </span>
                          <input id="descripcion_empld" type="textarea" maxlength="10" class="form-control text-right input-sm" maxlength="50" >
                      </div>
                      <span id="errorVacioDescripcion" style="color:red" hidden="hidden">"El campo Descripcion es requerido."</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    <div class="form-group col-xs-4 col-sm-2 col-md-2 col-lg-3">
                      <div class="input-group input-group-sm">
                          <span class="input-group-addon"> Roles: * </span>
                          <!-- ojo este check box lo debo pintar en php y ponerlo en una capa, en este caso se queda asi mientras se adelanta, otras secciones
                         ademas deben ser mas -->
                          <div id="seleccionroles">
                            <!-- en esta seccion por medio de js se insertara el elmento creado en php -->
                          </div>
                      </div>
                      <span id="errorVacioEmail" style="color:red" hidden="hidden">"El campo Correo Electronico es requerido."</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    </div>
                    <!-- aqui los demas campos ojo -->

                    <div class="clearfix"></div>

                    <div class="form-group col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                    </div>
                    <div class="form-group  col-sm-2 col-lg-2">
                      <div class="bt_imprs input-group input-group-sm">
                        <a class=" btn btn-ibg  pull-right" href="javascript:cargarSeleccionNotasContab();">
                          <span>Agregar</span>
                        </a>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group  col-sm-5 col-lg-5">
                    </div>
                    <div class="clearfix"></div>
                        <div id="lista_Empleados"></div> 
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- <div id="spin" style="display: none;"></div> -->

            <div class="box-footer">
            </div>

          </div>

        </div>
      </div>

    </div>
  <?php
  //echo "fecha ini".$this->fechaini."fecha fin: ".$this->fechafin;
  }
}
?>
