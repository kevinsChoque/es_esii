<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Agregar Actividad o Rendimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Actividad / Rendimiento: <span class="text-danger">*</span></label>
                        <a href="#" class="control-label font-weight-bold text-info"> [ + Nuevo]</a>
                        <select name="aor" id="aor" class="form-control form-control-sm select2" style="width: 100%;">
                            <option selected disabled value="0">Buscar (codigo - actividad - unidad)</option>
                            <optgroup id="gro" label="Rotura"></optgroup>
                            <optgroup id="gex" label="Excavacion"></optgroup>
                            <optgroup id="gtt" label="Tendido Tuberia"></optgroup>
                            <optgroup id="gre" label="Retiro"></optgroup>
                            <optgroup id="gitr" label="Instalacion Tubo Reemplazo"></optgroup>
                            <optgroup id="gin" label="Instalacion"></optgroup>
                            <optgroup id="gem" label="Empalme"></optgroup>
                            <optgroup id="grel" label="Relleno"></optgroup>
                            <optgroup id="grep" label="Reposicion"></optgroup>
                            <optgroup id="gcs" label="Corte de Servicio"></optgroup>
                            <optgroup id="grea" label="Reapertura"></optgroup>
                            <optgroup id="gsu" label="Supervicion"></optgroup>
                            <optgroup id="gfs" label="Factibilidad de Servicios"></optgroup>
                            <optgroup id="grap" label="Revisión y Aprobación Proyectos"></optgroup>
                        </select>
                    </div>
                    <!-- <div class="form-group col-lg-6">
                        <label for="" class="m-0">Cantidad: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="cantidad" name="cantidad">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Total: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="total" name="total">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success loadDetalle"><i class="fa fa-plus"></i> Agregar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/modificacionJqueryValidate.js')}}"></script>
<script>    
$(document).ready( function () {
    fillCp();
} );
$('.loadDetalle').on('click',function(){
    let data = $('#aor').val().split('|');
    data[1] = data[1]=='null'?'--':data[1];
    let reg = '<tr class="kevins idDetalle" data-id="'+data[0]+'" data-codigo="'+data[1]+'">'+
            '<td class="text-center align-middle font-weight-bold">'+novDato(data[1])+'</td>'+
            '<td class="align-middle">'+data[2]+'</td>'+
            '<td class="text-center align-middle">'+data[3]+'</td>'+
            '<td class="text-center align-middle">'+
                '<div class="form-group m-0 col-9 m-auto">'+
                    '<div class="input-group input-group-sm">'+
                        '<div class="input-group-prepend">'+
                            '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>'+
                        '</div>'+
                        '<input type="text" class="form-control form-control-sm text-center cantDetalle" value="0" onkeyup="calForDetalle(this);">'+
                    '</div>'+
                '</div>'+
            '</td>'+
            '<td class="text-center align-middle regCostoUnitario">'+data[4]+'</td>'+
            '<td class="text-center align-middle regCosto font-weight-bold">0</td>'+
            '<td class="text-center align-middle"><button type="button" class="btn text-danger" title="Eliminar registro" onclick="delReg(this)"><i class="fa fa-trash"></i></button></td>'+
        '</tr>';
    $('#primeraFila').after(reg);
});
function delReg(elem)
{
    $(elem).parent().parent().remove();
    calCostoDirecto();
    calGastosGenerales();
    calPrecioSerCol();
    calPrecioIgv();
    calTotal();
}
function calForDetalle(elem)
{
    // alert( $(elem).parent().parent().parent().parent().find('td.regCosto').attr('class'));
    let num1 = $(elem).val();
    let num2 = $(elem).parent().parent().parent().parent().find('td.regCostoUnitario').html();
    let total = parseFloat(num1) * parseFloat(num2.replace(',', '.'));
    $(elem).parent().parent().parent().parent().find('td.regCosto').html(total.toFixed(2));
    calCostoDirecto();
    calGastosGenerales();
    calPrecioSerCol();
    calPrecioIgv();
    calTotal();
}
function calTotal()
{
    let psc = $('.precioSerCol').html();
    let pi = $('.precioIgv').html();
    let totalPresupuesto = parseFloat(psc)+parseFloat(pi);
    $('.totalPresupuesto').html(totalPresupuesto.toFixed(2));
}
function calPrecioIgv()
{
    let psc = $('.precioSerCol').html();
    let precioIgv = parseFloat(psc)* (18/100);
    $('.precioIgv').html(precioIgv.toFixed(2));
}
function calPrecioSerCol()
{
    let ct = $('.costoTotal').html();
    let gg = $('.gastoGeneral').html();
    let precioSerCol = parseFloat(ct)+parseFloat(gg);
    $('.precioSerCol').html(precioSerCol.toFixed(2));
}
function calCostoDirecto()
{
    let totalCostosDirectos = 0;
    $('.regCosto').each(function(index,element){
        totalCostosDirectos = totalCostosDirectos + parseFloat($(this).html());
    });
    $('.costoTotal').html(totalCostosDirectos.toFixed(2));
}
function calGastosGenerales()
{
    
    let costoTotal = parseFloat($('.costoTotal').html());
    let gastoGeneral = costoTotal * ( 15/100 );
    $('.gastoGeneral').html(gastoGeneral.toFixed(2));
}
function formatState(state) {
    // console.dir(state);
    if (!state.id) 
    {   return state.text;}
    if(state.id==0)
    {   return state.text;}
    let data = state.text.split(':');
    let cod = data['0'];
    let des = data['1'];

    var $state = $(
        '<span class="badge badge-info">' + cod + '</span>' + '<span> : ' + des + '</span>'
    );
    
    return $state;
};


function fillCp()
{
    jQuery.ajax(
    { 
        url: "{{url('cp/listar')}}",
        method: 'get',
        success: function(result){
            // $('#aor').append('<option selected disabled value="0">Buscar (codigo - actividad - unidad)</option>');
            $.each(result.data,function(indice,fila){
                let valorElegido = fila.idCp+'|'+fila.codigo+'|'+fila.actividad+'|'+fila.unidad+'|'+fila.tarifa;
                $('#g'+fila.cat).append("<option value='"+valorElegido+"'>"+novDato(fila.codigo)+' : '+novDato(fila.actividad)+' | '+novDato(fila.unidad)+' | '+novDato(fila.tarifa)+"</option>");
            });
            // $('#gro').append("<option value='vas'>vasasvvsvsa------------</option>");
            $('#aor').select2({
                dropdownParent: $('#staticBackdrop'),
                width:"resolve",
                templateResult: formatState
            });
        }
    });
}
</script>