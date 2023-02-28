<div class="modal fade" id="modRegFactibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-business-time"></i> Reprogramacion de Factibilidad</h5>
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
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Motivo:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <!-- <input type="date" class="form-control form-control-sm" id="fecha" name="fecha"> -->
                                <textarea class="form-control" name="motivoReprogramacion" id="motivoReprogramacion" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveFacRep"><i class="fa fa-save"></i> Guardar Reprogramacion</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveFacRep').on('click',function(){
    saveFacRep();
});
function fillTecnicos()
{
    jQuery.ajax(
    { 
        url: "{{url('persona/listarTecnicos')}}",
        method: 'get',
        success: function(r){
            $('#personal').append('<option selected disabled value="0">Seleccione personal . . .</option>');
            $.each(r.data,function(indice,fila){
                $('#personal').append("<option value='"+fila.idPersona+"'>"+fila.nombre+' '+fila.apellido+"</option>");
            });
            $('#personal').select2({
                dropdownParent: $('#modRegFactibilidad'),
                width:"resolve",
            });
        }
    });
}
function dataFactibilidad()
{
    return {
        solnro:$('#solnro').val(),
        idPersona:$('#personal').val(),
        fecha:$('#fecha').val(),
        motivo:$('#motivoReprogramacion').val(),
    }
}
function repFactibilidad(element)
{
    // alert($(element).attr('data-solnro'));
    $('#solnro').val($(element).attr('data-solnro'));
    // $('#modRegFactibilidad').modal('show');
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/showLastFactibilidad')}}",
        data: {solnro:$(element).attr('data-solnro')},
        method: 'get',
        success: function(r){
            limpiarFormFac();
            if(r.estado)
            {
                $('#personal').val(r.data.idPersona).trigger("change.select2");
                $('#fecha').val(r.data.fecha);
                $('#motivoReprogramacion').val(r.data.motivo);
            }
            $('#modRegFactibilidad').modal('show');
        }
    });
}
function saveFacRep()
{
    if($('#formValRegFac').valid()==false)
    {   return;}
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/saveFacRep')}}",
        data: dataFactibilidad(),
        method: 'get',
        success: function(r){
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
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
        motivo: "required",
    },
});
</script>