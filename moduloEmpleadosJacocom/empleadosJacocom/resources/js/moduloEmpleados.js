function cargar_modulo_empleados(){  
  $.ajax({
      url: 'index.php',
      type: 'post',
      data: {
        controlador: 'notascontab',
        metodo: 'contenidoEmpleados'
      },
      beforeSend: function () {
        agregar_cargador('spin');       
      },
      complete: function () {
        // removerElementoDom('spin');
      },
      success: function (data) {
        // se parte la data de respues del ajax, la cual contiene el selecctor de areas, los check de roles y la pagina a presentar
        var datapartes = data.split("|>");
        $('#seccion_oe').html(datapartes[3]);// se setea el html de la pagina para cargarla totalmente.
        $("#seleccionarea").html(datapartes[0]);// se setea el html de el selector de area en la capa correspondiente.
        $("#seleccionroles").html(datapartes[1]);// se seta el html de los cheks de roles en la capa correspondiente.
        $("#lista_Empleados").html(datapartes[2]);// se trae la lista de empleados para ser mostrados al entrar al modulo debajo del area de ingreso de datos del empleado
        $(".spinner").remove();
        $("#spin").remove();   
        $("#spin").remove();
     },
      error: function () {
      }
    });
}