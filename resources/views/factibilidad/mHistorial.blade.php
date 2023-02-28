<div class="modal fade" id="modHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-list-ol"></i> Historial de Factibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 table-responsive contHistorial">
                        <table id="historial" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center" data-priority="1">Tecnico</th>
                                    <th class="text-center" data-priority="1">Fecha</th>
                                    <th class="text-center" data-priority="1">Motivo</th>
                                </tr>
                            </thead>
                            <tbody id="dataHistorial">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function fillRegistrosHistorial(element)
{
    // alert($(element).attr('data-solnro'));
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/listarHistorial')}}",
        data: {solnro:$(element).attr('data-solnro')},
        method: 'get',
        success: function(result){
            var html = '';
            for (var i = 0; i < result.data.length; i++) 
            {
                html += '<tr class="text-center">' +
                    '<td class="align-middle">' + novDato(result.data[i].nombre)+' '+ novDato(result.data[i].apellido) + '</td>' +
                    '<td class="align-middle">' + formatoDate(result.data[i].fecha) + '</td>' +
                    '<td class="align-middle font-weight-bold">' + novDato(result.data[i].motivo) + '</td>' +
                    '</tr>';
            }
            $('#dataHistorial').html(html);
            $('#modHistorial').modal('show');
        }
    });
}
</script>