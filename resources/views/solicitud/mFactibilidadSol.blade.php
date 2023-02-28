<div class="modal fade" id="modRegFacSol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-business-time"></i> Factibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegFacSol">
                    <input type="hidden" name="solnro" id="solnro">
                    <div class="row contFormRegFacSol">
                        <div class="form-group col-lg-12">
                            <label class="m-0">Tecnico:</label>
                            <select class="form-control form-control-sm" name="personalFactibilidad" id="personalFactibilidad" style="width: 100%;"></select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Fecha de factibilidad:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" id="fechaFactibilidad" name="fechaFactibilidad">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success geFacSol"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.geFacSol').on('click',function(){
    // geFactibilidad();
    geFacSol();
});
function geFacSol()
{
    if($('#formValRegFacSol').valid()==false)
        return;
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/geFacSol')}}",
        data: dataFacSol(),
        method: 'get',
        success: function(r){
            $(".overlayRegDBL").toggle(flip++%2===0);
            construirTablaDBL();
            listarFromApp();
            $('#modRegFacSol').modal('hide');
            msjRee(r);
        }
    });
}
function dataFacSol()
{
    let numeroSolicitud = $('#solnro').val();
    return {
        solnro:$('#solnro').val(),
        // nombreTit:$('#'+numeroSolicitud).attr('data-SolNombre'),
        // dniTit:$('#'+numeroSolicitud).attr('data-SolElect'),
        // domicilioTit:
        //     $('#'+numeroSolicitud).attr('data-SolTipCal')+' '+
        //     $('#'+numeroSolicitud).attr('data-SolDirec'),
        // numeroTit:$('#'+numeroSolicitud).attr('data-SolDirNro'),
        // urbanizacionTit:$('#'+numeroSolicitud).attr('data-SolUrban'),

        idPersona:$('#personalFactibilidad').val(),
        fecha:$('#fechaFactibilidad').val(),
        // lugar:'Abancay',
        // empresa:'EMUSAP ABANCAY',

        // hora:docHora,
    }
}

function regFacSol(element)
{
    // alert($(element).attr('data-numsoli'));
    $('#solnro').val($(element).attr('data-numsoli'));
    $('#modRegFacSol').modal('show');
}

function limpiarFormFac()
{
    $(".contFormRegFacSol input[type=date]").val('');
    // $(".contFormRegFacSol select").val('0');
    $('#personalFactibilidad').val('0').trigger("change.select2");
}
$("#formValRegFacSol").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        personalFactibilidad: "required",
        fechaFactibilidad: "required",
    },
});
</script>