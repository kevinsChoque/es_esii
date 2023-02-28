<!-- modal modalRegistrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateReg">
                <div class="row contenedorFormularioRegistrar">
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Persona: <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm select2" id="personas" style="width: 100%;">
                            <option selected disabled value="0"> Seleccione...</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Usuario: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="usuario" name="usuario">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Contraseña: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Acceso como: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select name="cargoUser" id="cargoUser" class="form-control form-control-sm">
                                <option value="">Seleccione . . . </option>
                                <option value="Cat. usuario admin">Cat. usuario admin</option>
                                <option value="Cat. usuario atencion">Cat. usuario atencion</option>
                                <option value="Gerencia de mantenimiento">Gerencia de mantenimiento</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal modalEditar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateEdit">
                    <input type="hidden" id="idUser">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="m-0">Persona: <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm select2" id="epersonas" style="width: 100%;">
                            <option selected disabled value="0"> Seleccione...</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Usuario: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="eusuario">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Contraseña: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="epassword">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Acceso como: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select name="ecargoUser" id="ecargoUser" class="form-control form-control-sm">
                                <option value="0" disabled selected>Seleccione . . . </option>
                                <option value="Cat. usuario admin">Cat. usuario admin</option>
                                <option value="Cat. usuario atencion">Cat. usuario atencion</option>
                                <option value="Gerencia de mantenimiento">Gerencia de mantenimiento</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardarCambios"><i class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/modificacionJqueryValidate.js')}}"></script>
<script>	
$('.guardar').on('click',function(){
    guardar();
});
$('.guardarCambios').on('click',function(){
    guardarCambios();
});

$('.tipoDoc').on('change',function(){
    setInputSegunDoc($(this).val());
});
$('.etipoDoc').on('change',function(){
    esetInputSegunDoc($(this).val());
});

function clearFillNewPersona()
{
    $("#personas").select2("destroy");
    $("#personas").find("option").remove();
    fillNewUser();
}
// funcion inservible fillPersonas
function fillPersonas()
{
    jQuery.ajax(
    { 
        url: "{{url('persona/listar')}}",
        method: 'get',
        success: function(r){
            $.each(r.data,function(indice,fila){
                $('#personas').append("<option value='"+fila.idPersona+"'>"+novDato(fila.nombre)+novDato(fila.apellido)+ ' | ' + novDato(fila.nombreCargo)+"</option>");
                $('#epersonas').append("<option value='"+fila.idPersona+"'>"+novDato(fila.nombre)+novDato(fila.apellido)+ ' | ' + novDato(fila.nombreCargo)+"</option>");
            });
            $('#personas').select2({
                width:"resolve",
                dropdownParent: $('#modalRegistrar'),
            });
            $('#epersonas').select2({
                width:"resolve",
                dropdownParent: $('#modalEditar'),
            });
        }
    });
}
function fillNewUser()
{
    jQuery.ajax(
    { 
        url: "{{url('persona/listarNewUser')}}",
        method: 'get',
        success: function(result){
            $('#personas').append('<option selected disabled value="0">Seleccione...</option>');
            $.each(result.data,function(indice,fila){
                $('#personas').append("<option value='"+fila.idPersona+"'>"+novDato(fila.nombreCargo)+ ' | ' +novDato(fila.nombre)+' '+novDato(fila.apellido)+"</option>");
            });
            $('#personas').select2({dropdownParent: $('#modalRegistrar'),width:"resolve"});
        }
    });
}
function data(tipo)
{
	let segunAccion=tipo?'':'e';
	return {
        idPersona:$('#'+segunAccion+'personas').val(),
        usuario:$('#'+segunAccion+'usuario').val(),
    	password:$('#'+segunAccion+'password').val(),
        cargoUser:$('#'+segunAccion+'cargoUser').val(),
	}
}
function guardar()
{
	if($('#formValidateReg').valid()==false)
    {   return;}
    if($('#personas').val()===null)
    {   
        msjSimple(false,"Elija una persona para el usuario.");
        return;
    }
    jQuery.ajax(
    { 
        url: "{{url('user/registrar')}}",
        data: data(true),
        method: 'get',
        success: function(r){
        	console.log(r);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            clearFillNewPersona();
            limpiarForm();
            $('#modalRegistrar').modal('hide');
            msjRee(r);
        }
    });
}
function guardarCambios()
{
    if($('#formValidateEdit').valid()==false)
    {   return;}
	var idUser = {idUser: $('#idUser').val(),};
	var datos = data(false);
	Object.assign(datos,idUser);
    jQuery.ajax(
    { 
        url: "{{url('user/guardarCambios')}}",
        data: datos,
        method: 'get',
        success: function(r){
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            clearFillNewPersona();
            $('#modalEditar').modal('hide');
            msjRee(r);
        }
    });
}
function editar(id)
{
    jQuery.ajax(
    { 
        url: "{{url('user/editar')}}",
        data: {id:id},
        method: 'get',
        success: function(r){
            $('#epersonas').append('<option selected disabled value="0">Buscar vehiculo (Placa - Marca - Modelo)</option>');
            $.each(r.personas,function(indice,fila){
                $('#epersonas').append("<option value='"+fila.idPersona+"'>"+novDato(fila.nombreCargo)+ ' | ' +novDato(fila.nombre)+' '+novDato(fila.apellido)+"</option>");
            });
            $('#epersonas').select2({dropdownParent: $('#modalEditar'),width:"resolve"});
            // -------------------------
            $('#idUser').val(r.data.idUser);
            $("#epersonas").val(r.data.idPersona).trigger("change.select2");
            $('#eusuario').val(r.data.usuario);
            $('#epassword').val(r.data.password);
            $('#ecargoUser').val(r.data.cargoUser);
            $('#modalEditar').modal('show');
        }
    });
}
function clearEditPersona()
{
    $("#epersonas").select2("destroy");
    $("#epersonas").find("option").remove();
}
$("#formValidateReg").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        personas: "required",
        usuario: "required",
        password: "required",
    },
});
$("#formValidateEdit").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        epersonas: "required",
        eusuario: "required",
        epassword: "required",
    },
});

$("#modalRegistrar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateReg');
});
$("#modalEditar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateEdit');
    clearEditPersona();
});
</script>