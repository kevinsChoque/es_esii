<div class="modal fade" id="modRegFactibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-business-time"></i> Factibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegFac">
                    <input type="hidden" name="solnro" id="solnro">
                    <div class="row contFormRegFac">
                        <div class="form-group col-lg-12">
                            <label class="m-0">Tecnico:</label>
                            <select class="form-control form-control-sm" name="personal" id="personal" style="width: 100%;"></select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Fecha de factibilidad:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" id="fecha" name="fecha">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success geFactibilidad"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.geFactibilidad').on('click',function(){
    // geFactibilidad();
    guardarSegunSeaCaso();
});
function guardarSegunSeaCaso()
{
    if($('#formValRegFac').valid()==false)
        return;
    jQuery.ajax(
    { 
        // url: "{{url('solicitud/geFactibilidad')}}",
        url: "{{url('factibilidad/guardarSegunSeaCaso')}}",
        data: datagGuardarSegunSeaCaso(),
        method: 'get',
        success: function(r){
            $(".overlayRegDBL").toggle(flip++%2===0);
            construirTablaDBL();
            listarFromApp();
            $('#modRegFactibilidad').modal('hide');
            msjRee(r);
        }
    });
}
function fillTecnicos()
{
    jQuery.ajax(
    { 
        url: "{{url('persona/listarTecnicos')}}",
        method: 'get',
        success: function(r){
            $('#personal').append('<option selected disabled value="0">Seleccione personal . . .</option>');
            $('#personalFactibilidad').append('<option selected disabled value="0">Seleccione personal . . .</option>');
            $.each(r.data,function(indice,fila){
                $('#personal').append("<option value='"+fila.idPersona+"'>"+fila.nombre+' '+fila.apellido+"</option>");
                $('#personalFactibilidad').append("<option value='"+fila.idPersona+"'>"+fila.nombre+' '+fila.apellido+"</option>");
            });
            $('#personal').select2({
                dropdownParent: $('#modRegFactibilidad'),
                width:"resolve",
            });
            $('#personalFactibilidad').select2({
                dropdownParent: $('#modRegFacSol'),
                width:"resolve",
            });
        }
    });
}
function datagGuardarSegunSeaCaso()
{
    let numeroSolicitud = $('#solnro').val();
    let hoy = new Date();
    let hora = hoy.getHours().toString().padStart(2, 0);
    let minutos = hoy.getMinutes().toString().padStart(2, 0);
    let segunHora = hora >= 12 ? 'PM' : 'AM';
    let docHora = hora+':'+minutos+' '+segunHora;
    return {
        solnro:$('#solnro').val(),

        nombreTit:$('#'+numeroSolicitud).attr('data-SolNombre'),
        dniTit:$('#'+numeroSolicitud).attr('data-SolElect'),
        // correoTit:$('#'+numeroSolicitud).attr('data-SolElect'),
        domicilioTit:
            $('#'+numeroSolicitud).attr('data-SolTipCal')+' '+
            $('#'+numeroSolicitud).attr('data-SolDirec'),
        numeroTit:$('#'+numeroSolicitud).attr('data-SolDirNro'),
        // manzanaTit:$('#'+numeroSolicitud).attr('data-SolElect'),
        // loteTit:$('#'+numeroSolicitud).attr('data-SolElect'),
        urbanizacionTit:$('#'+numeroSolicitud).attr('data-SolUrban'),

        idPersona:$('#personal').val(),
        fecha:$('#fecha').val(),
        lugar:'Abancay',
        empresa:'EMUSAP ABANCAY',

        hora:docHora,
    }
}
function dataFactibilidad()
{
    return {
        solnro:$('#solnro').val(),
        idPersona:$('#personal').val(),
        fecha:$('#fecha').val(),
    }
}
function regFactibilidad(solnro)
{
    $('#solnro').val(solnro);
    // $('#modRegFactibilidad').modal('show');
    jQuery.ajax(
    { 
        url: "{{url('solicitud/showFactibilidad')}}",
        data: {solnro:solnro},
        method: 'get',
        success: function(r){
            limpiarFormFac();
            if(r.estado)
            {
                $('#personal').val(r.data.idPersona).trigger("change.select2");
                $('#fecha').val(r.data.fecha);
            }
            $('#modRegFactibilidad').modal('show');
        }
    });
}
function geFactibilidad()
{
    if($('#formValRegFac').valid()==false)
        return;
    jQuery.ajax(
    { 
        url: "{{url('solicitud/geFactibilidad')}}",
        data: dataFactibilidad(),
        method: 'get',
        success: function(r){
            $('#modRegFactibilidad').modal('hide');
            msjRee(r);
        }
    });
}
function limpiarFormFac()
{
    $(".contFormRegFac input[type=date]").val('');
    // $(".contFormRegFac select").val('0');
    $('#personal').val('0').trigger("change.select2");
}
$("#formValRegFac").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        personal: "required",
        fecha: "required",
    },
});
</script>