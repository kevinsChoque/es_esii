<div class="modal fade" id="modRegMedicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-ruler"></i> Programar Medicion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegMed">
                    <input type="hidden" name="solnro" id="solnro">
                    <div class="row contFormRegFac">
                        <div class="form-group col-lg-12">
                            <label class="m-0">Tecnico:</label>
                            <select class="form-control form-control-sm" name="personal" id="personal" style="width: 100%;"></select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Fecha de Medicion:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" id="fecha" name="fecha">
                            </div>
                        </div>
                        <!-- <div class="form-group col-lg-12">
                            <label for="" class="m-0">Motivo:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea class="form-control" name="motivoProgramacion" id="motivoProgramacion" cols="30" rows="5"></textarea>
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveProMed"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveProMed').on('click',function(){
    saveProMed();
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
                dropdownParent: $('#modRegMedicion'),
                width:"resolve",
            });
        }
    });
}
function dataMedicion()
{
    return {
        solnro:$('#solnro').val(),
        idPersona:$('#personal').val(),
        fecha:$('#fecha').val(),
        // motivo:$('#motivoProgramacion').val(),
    }
}
function proMedicion(element)
{
    let solnro = $(element).attr('data-solnro');
    $('#solnro').val(solnro);
    $('#modRegMedicion').modal('show');
    // jQuery.ajax(
    // { 
    //     url: "{{url('medicion/showLastMedicion')}}",
    //     data: {solnro:solnro},
    //     method: 'get',
    //     success: function(r){
    //         // limpiarFormFac();
    //         if(r.estado)
    //         {
    //             $('#personal').val(r.data.idPersona).trigger("change.select2");
    //             $('#fecha').val(r.data.fecha);
    //             $('#motivoProgramacion').val(r.data.motivo);
    //         }
    //         $('#modRegMedicion').modal('show');
    //     }
    // });
}
function saveProMed()
{
    if($('#formValRegMed').valid()==false)
    {   return;}
    jQuery.ajax(
    { 
        url: "{{url('medicion/saveProMed')}}",
        data: dataMedicion(),
        method: 'get',
        success: function(r){
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            $('#modRegMedicion').modal('hide');
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
$("#formValRegMed").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        personal: "required",
        fecha: "required",
        motivo: "required",
    },
});
</script>