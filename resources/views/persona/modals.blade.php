<!-- modal modalRegistrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Nueva persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateReg">
                <div class="row contenedorFormularioRegistrar">
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Tipo documento:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm tipoDoc" name="tipoDoc" id="tipoDoc" disabled>
                                <option disabled>Seleccione el tipo de documento</option>
                                <option value="DNI" selected>DNI</option>
                                <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 toggleDoc">
                        <label for="" class="m-0">Documento: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="doc" name="doc" maxlength="8">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant documentoCantidad">0/8</span>
                                <span class="input-group-text font-weight-bold btn btn-sm btn-success buscarDni">
                                    <i class="fa fa-search"></i> 
                                    DNI
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group col-lg-4">
                        <label for="" class="m-0">RUC:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="ruc" name="ruc" maxlength="11">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant">0/11</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellidos: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="apellido" name="apellido">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Celular:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-phone-flip"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="celular" name="celular" maxlength="9">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant">0/9</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Correo:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="correo" name="correo">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Domicilio:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-location-dot"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="domicilio" name="domicilio">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Cargo:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="cargo" id="cargo">
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group col-lg-4">
                        <label for="" class="m-0">Fecha de nacimiento:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="date" class="form-control form-control-sm" id="fechaNacimiento" name="fechaNacimiento">
                        </div>
                    </div> -->
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
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person"></i> Editar persona</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formValidateEdit">
                <div class="row contenedorFormularioEditar">
                	<input type="hidden" id="idPersona" name="idPersona">
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Tipo documento:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm etipoDoc" name="etipoDoc" id="etipoDoc" disabled>
                                <option disabled>Seleccione el tipo de documento</option>
                                <option value="DNI" selected>DNI</option>
                                <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                    </div>
                	<div class="form-group col-lg-4">
                        <label for="" class="m-0">Documento: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="edoc" name="edoc" maxlength="8">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant edocumentoCantidad">0/8</span>
                                <span class="input-group-text font-weight-bold btn btn-sm btn-success ebuscarDni">
                                    <i class="fa fa-search"></i> 
                                    DNI
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group col-lg-4">
                        <label for="" class="m-0">RUC:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="eruc" name="eruc" maxlength="11">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant">0/11</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="enombre" name="enombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellidos: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="eapellido" name="eapellido">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Celular:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-phone-flip"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm soloNumeros contadorDigitos" id="ecelular" name="ecelular" maxlength="9">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold cant">0/9</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Correo:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="ecorreo" name="ecorreo">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Domicilio:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-location-dot"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="edomicilio" name="edomicilio">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Cargo:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="ecargo" id="ecargo">
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group col-lg-4">
                        <label for="" class="m-0">Fecha de nacimiento:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="date" class="form-control form-control-sm" id="efechaNacimiento" name="efechaNacimiento">
                        </div>
                    </div> -->
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

function fillCargo()
{
    jQuery.ajax(
    { 
        url: "{{url('cargo/listar')}}",
        method: 'get',
        success: function(r){
            $('#cargo').append('<option selected disabled value="0">Seleccione cargo . . .</option>');
            $('#ecargo').append('<option selected disabled value="0">Seleccione cargo . . .</option>');
            $.each(r.data,function(indice,fila){
                $('#cargo').append("<option value='"+fila.idCargo+"'>"+fila.nombre+"</option>");
                $('#ecargo').append("<option value='"+fila.idCargo+"'>"+fila.nombre+"</option>");
            });
        }
    });
}
function data(tipo)
{
	// segun la accion enviara datos de editar o registrar
	let segunAccion=tipo?'':'e';
	return {
        tipoDoc:$('#'+segunAccion+'tipoDoc').val(),
    	doc:$('#'+segunAccion+'doc').val(),
        ruc:$('#'+segunAccion+'ruc').val(),
    	nombre:$('#'+segunAccion+'nombre').val(),
    	apellido:$('#'+segunAccion+'apellido').val(),
    	celular:$('#'+segunAccion+'celular').val(),
        correo:$('#'+segunAccion+'correo').val(),
        domicilio:$('#'+segunAccion+'domicilio').val(),
        fechaNacimiento:$('#'+segunAccion+'fechaNacimiento').val(),

        idCargo:$('#'+segunAccion+'cargo').val(),
	}
}
function guardar()
{
	if($('#formValidateReg').valid()==false)
    {
        return;
    }
    jQuery.ajax(
    { 
        url: "{{url('persona/registrar')}}",
        data: data(true),
        method: 'get',
        success: function(result){
        	console.log(result);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            // limpiarForm();
            $('#modalRegistrar').modal('hide');
            msjRee(result);
        }
    });
}
function guardarCambios()
{
    if($('#formValidateEdit').valid()==false)
    {
        return;
    }
	var idPersona = {idPersona: $('#idPersona').val(),};
	var datos = data(false);
	Object.assign(datos,idPersona);
    jQuery.ajax(
    { 
        url: "{{url('persona/guardarCambios')}}",
        data: datos,
        method: 'get',
        success: function(result){
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            $('#modalEditar').modal('hide');
            msjRee(result);
        }
    });
}
function editar(id)
{
    jQuery.ajax(
    { 
        url: "{{url('persona/editar')}}",
        data: {id:id},
        method: 'get',
        success: function(result){
        	console.log(result);
            $('#idPersona').val(result.data.idPersona);
            $('#etipoDoc').val(result.data.tipoDoc);
            esetInputSegunDoc($("#etipoDoc").val());
            $('#edoc').val(result.data.doc);
            $('#eruc').val(result.data.ruc);
            $('#enombre').val(result.data.nombre);
	    	$('#eapellido').val(result.data.apellido);
            $('#ecelular').val(result.data.celular);
            $('#ecorreo').val(result.data.correo);
            $('#edomicilio').val(result.data.domicilio);
            $('#efechaNacimiento').val(result.data.fechaNacimiento);
            $('#ecargo').val(result.data.idCargo);
            $('#modalEditar').modal('show');
        }
    });
}
$("#formValidateReg").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        doc: "required",
        nombre: "required",
        apellido: "required",
    },
});
$("#formValidateEdit").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        edoc: "required",
        enombre: "required",
        eapellido: "required",
    },
});

$("#modalRegistrar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateReg');
});
$("#modalEditar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateEdit');
});
</script>