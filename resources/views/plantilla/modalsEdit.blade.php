<!-- modal modalEditar -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="{{asset('plugins/sortable/Sortable.min.js')}}"></script>
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Editar plantilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateEdit">
                <input type="hidden" name="idPlantilla" id="idPlantilla">
                <div class="row contenedorFormularioEditar">
                    <div class="form-group col-lg-3">
                        <label for="" class="m-0">Nombre de plantilla: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="enombre" name="enombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="" class="m-0">Descripcion: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="edescripcion" name="edescripcion">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Tipo de terreno: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="etipoTerreno" id="etipoTerreno">
                                <option disabled selected value="0">Seleccione...</option>
                                <option value="pista">Pista</option>
                                <option value="tierra">Tierra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Tipo de conexion: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="etipoConexion" id="etipoConexion">
                                <option disabled selected value="0">Seleccione...</option>
                                <option value="agua">Agua</option>
                                <option value="desague">Desague</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Diametro: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="ediametro" id="ediametro">
                                <option disabled selected value="0">Seleccione...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 table-responsive">
                        <table id="regCpEdit" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" data-priority="1">Cat.</th>
                                    <th class="text-center" data-priority="1">Cod.</th>
                                    <th class="text-center" data-priority="1">Act.</th>
                                    <th class="text-center" data-priority="2">Uni.</th>
                                    <th class="text-center" data-priority="2">Esp.</th>
                                    <th class="text-center" data-priority="1">Tarifa</th>
                                    <th class="text-center" data-priority="3">Medio</th>
                                    <th class="text-center" data-priority="3">Uni</th>
                                </tr>
                            </thead>
                            <tbody id="edataCp">
                            </tbody>
                            <tfoot class="thead-light">
                                <tr>
                                    <th class="text-center" data-priority="1">Cat.</th>
                                    <th class="text-center" data-priority="1">Cod.</th>
                                    <th class="text-center" data-priority="1">Act.</th>
                                    <th class="text-center" data-priority="2">Uni.</th>
                                    <th class="text-center" data-priority="2">Esp.</th>
                                    <th class="text-center" data-priority="1">Tarifa</th>
                                    <th class="text-center" data-priority="3">Medio</th>
                                    <th class="text-center" data-priority="3">Uni</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-lg-4 shadow" style="height: 400px;overflow: auto;">
                        <ul class="todo-list ui-sortable testList" data-widget="todo-list" id="itemsEdit">
                            <li class="bg-info border rounded">
                                
                                <span class="text">
                                    <span class="handle ui-sortable-handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    Agregue items, ( <i class="fas fa-ellipsis-v"></i> <i class="fas fa-ellipsis-v"></i> ) click y mover para ordenar.</span>
                                <!-- <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div> -->
                            </li>
                        </ul>
                    </div>  
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardarCambios"><i class="fa fa-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<script src="{{asset('js/modificacionJqueryValidate.js')}}"></script>
<script>
new Sortable(itemsEdit, {
    handle: '.handle', // handle's class
    animation: 150
});
$('.guardarCambios').on('click',function(){
    guardarCambios();
});
$('#etipoConexion').on('change',function(){
    let html='';
    if($(this).val()=='agua')
    {
        
        html='<option disabled selected>Seleccione...</option>'+
            '<option value="agua 1/2">Agua 1/2</option>'+
            '<option value="agua 3/4">Agua 3/4</option>'+
            '<option value="agua 2">Agua 2</option>';
        $('#ediametro').html(html);
    }
    else
    {
        html='<option disabled selected>Seleccione...</option>'+
            '<option value="alcantarrillado 2">Alcantarrillado 2</option>'+
            '<option value="alcantarrillado 4">Alcantarrillado 4</option>'+
            '<option value="alcantarrillado 6">Alcantarrillado 6</option>';
        $('#ediametro').html(html);
    }
});

function eremoveItemCp(elem)
{
    $(elem).parent().parent().parent().remove();
}
function eaddItemCp(elem)
{
    let html = '';
    html += '<li class="eitemCp" data-id="'+novDato($(elem).attr('data-id'))+'">'+
                '<span class="text" style="width: 100%;">'+ 
                    '<div class="tools" style="float: right;">'+
                        '<i class="fas fa-trash" onclick="eremoveItemCp(this)"></i>'+
                     '</div>'+
                    '<span class="handle ui-sortable-handle">'+
                        '<i class="fas fa-ellipsis-v"></i> '+
                        '<i class="fas fa-ellipsis-v"></i>'+
                    '</span>'+
                    '<span class="badge badge-primary">'+novDato($(elem).attr('data-cod'))+'</span>: '+ 
                    novDato($(elem).attr('data-act')) + '<br>' +
                    '<p class="m-0 econtainerCantidad font-weight-bold" style="display: block;">Cantidad: '+
                        '<span class="ecantidadItem">0</span>'+
                        '<button type="button" class="btn text-info py-0 pl-1 pr-0" title="Editar cantidad" onclick="eeditarCantidad(this);"><i class="fa fa-pencil"></i>'+
                        '</button>'+
                    '</p>'+
                    '<div class="form-group m-0 enewCantidad" style="display: none;">'+
                        '<div class="input-group input-group-sm">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i> Cantidad:</span>'+
                            '</div>'+
                            '<input type="text" class="form-control form-control-sm text-center esaveNewCantidad" value="0">'+
                            '<div class="input-group-append">'+
                                '<a href="#" class="input-group-text font-weight-bold" onclick="efinEdit(this);">Cancelar</a>'+
                                '<a href="#" class="btn btn-success" onclick="esaveEditCantidad(this);"><i class="fa fa-save"></i></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</span>'+
            '</li>';
    $('#itemsEdit').append(html);
}
var ppp='';
function efillItemCp(item)
{
    let html = '';
    html += '<li class="eitemCp" data-id="'+novDato(item['idCp'])+'">'+
                '<span class="text" style="width: 100%;">'+ 
                    '<div class="tools" style="float: right;">'+
                        '<i class="fas fa-trash" onclick="eremoveItemCp(this)"></i>'+
                    '</div>'+
                    '<span class="handle ui-sortable-handle">'+
                        '<i class="fas fa-ellipsis-v"></i> '+
                        '<i class="fas fa-ellipsis-v"></i>'+
                    '</span>'+
                    '<span class="badge badge-primary">'+novDato(item['codigo'])+'</span>: '+ 
                    novDato(item['actividad']) + '<br>' +
                    '<p class="m-0 econtainerCantidad font-weight-bold" style="display: block;">Cantidad: '+
                        '<span class="ecantidadItem">'+novDato(item['cantidad'])+'</span>'+
                        '<button type="button" class="btn text-info py-0 pl-1 pr-0" title="Editar cantidad" onclick="eeditarCantidad(this);"><i class="fa fa-pencil"></i>'+
                        '</button>'+
                    '</p>'+
                    '<div class="form-group m-0 enewCantidad" style="display: none;">'+
                        '<div class="input-group input-group-sm">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i> Cantidad:</span>'+
                            '</div>'+
                            '<input type="text" class="form-control form-control-sm text-center esaveNewCantidad" value="0">'+
                            '<div class="input-group-append">'+
                                '<a href="#" class="input-group-text font-weight-bold" onclick="efinEdit(this);">Cancelar</a>'+
                                '<a href="#" class="btn btn-success" onclick="esaveEditCantidad(this);"><i class="fa fa-save"></i></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</span>'+
            '</li>';
    $('#itemsEdit').append(html);
}
function fillCpEdit()
{
    jQuery.ajax(
    { 
        url: "{{url('cp/listar')}}",
        method: 'get',
        success: function(result){
            var html = '';
            for (var i = 0; i < result.data.length; i++) 
            {
                html += '<tr class="text-center" onclick="eaddItemCp(this)" data-cod="'+ novDato(result.data[i].codigo) +'" data-act="'+ novDato(result.data[i].actividad) +'" data-id="'+ novDato(result.data[i].idCp) +'">' +
                    '<td>' + novDato(result.data[i].categoria) + '</td>' +
                    '<td class="font-weight-bold">' + novDato(result.data[i].codigo) + '</td>' +
                    '<td>' + novDato(result.data[i].actividad) + '</td>' +
                    '<td>' + novDato(result.data[i].unidad) + '</td>' +
                    '<td>' + novDato(result.data[i].especificacion) + '</td>' +
                    '<td>' + novDato(result.data[i].tarifa) +'</td>' +
                    '<td>' + novDato(result.data[i].medio) + '</td>' +
                    '<td>' + novDato(result.data[i].unidadRendimiento) + '</td>' +
                    '</tr>';
            }
            $('#edataCp').html(html);
            initDatatable('regCpEdit');
        }
    });
}
function esaveEditCantidad(elem)
{
    let newCantidad = $(elem).parent().parent().find('input.esaveNewCantidad').val();
    $(elem).parent().parent().parent().parent().find('p.econtainerCantidad').find('span.ecantidadItem').html(newCantidad==''?'0':newCantidad);
    efinEdit(elem);
}
function eeditarCantidad(elem)
{
    let cantidad = $(elem).parent().find('span.ecantidadItem').html();
    $(elem).parent().parent().find('div.enewCantidad').find('input.esaveNewCantidad').val(cantidad);

    $(elem).parent().css('display','none');
    $(elem).parent().parent().find('div.enewCantidad').css('display','block');
}
function efinEdit(elem)
{
    $(elem).parent().parent().parent().css('display','none');
    $(elem).parent().parent().parent().parent().find('p.econtainerCantidad').css('display','block');
}
function dataEdit()
{
	return {
        nombre:$('#enombre').val(),
        descripcion:$('#edescripcion').val(),
        tipoTerreno:$('#etipoTerreno').val(),
        tipoConexion:$('#etipoConexion').val(),
        diametro:$('#ediametro').val(),
    }
}
function guardarCambios()
{
    if($('#formValidateEdit').valid()==false)
    {return;}
    let ids = [];
    let ordenes = [];
    let cantidades = [];
    $('.eitemCp').each(function(index,element){
        ids.push($(element).attr('data-id'));
        ordenes.push(index);
    });
    $('.ecantidadItem').each(function(index,element){
        cantidades.push($(element).html());
    });
    if(ids.length==0)
    {
        msjSimple(false,'Agregue items');
        return;
    }
    var listas = {
        ids:ids,
        ordenes:ordenes,
        idPlantilla:$('#idPlantilla').val(),
        cantidades:cantidades,
    };
    var datos = dataEdit();
    Object.assign(datos,listas);
    jQuery.ajax(
    { 
        url: "{{url('plantilla/guardarCambios')}}",
        data: datos,
        method: 'get',
        success: function(r){
        	console.log(r);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            // limpiarForm();
            $('#modalEditar').modal('hide');
            msjRee(r);
        }
    });
}
// function guardarCambios()
// {
//     if($('#formValidateEdit').valid()==false)
//     {
//         return;
//     }
// 	var idPersona = {idPersona: $('#idPersona').val(),};
// 	var datos = data(false);
// 	Object.assign(datos,idPersona);
//     jQuery.ajax(
//     { 
//         url: "{{url('persona/guardarCambios')}}",
//         data: datos,
//         method: 'get',
//         success: function(result){
//             $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
//             construirTabla();
//             fillRegistros();
//             $('#modalEditar').modal('hide');
//             msjRee(result);
//         }
//     });
// }
function editar(id)
{
    limpiarForm(false);
    jQuery.ajax(
    { 
        url: "{{url('plantilla/editar')}}",
        data: {id:id},
        method: 'get',
        success: function(r){
        	console.log(r);
            $('#modalEditar').modal('show');
            $('#idPlantilla').val(r.data.idPlantilla);
            $('#enombre').val(r.data.nombre);
            $('#edescripcion').val(r.data.descripcion);
            $('#etipoTerreno').val(r.data.tipoTerreno);
            $('#etipoConexion').val(r.data.tipoConexion);
            $('#etipoConexion').change();
            $('#ediametro').val(r.data.diametro);
            for (var i = 0; i < r.list.length; i++) {
                efillItemCp(r.list[i]);
            }
            ppp=r.list;
      //       $('#etipoDoc').val(result.data.tipoDoc);
      //       esetInputSegunDoc($("#etipoDoc").val());
      //       $('#edoc').val(result.data.doc);
      //       $('#eruc').val(result.data.ruc);
      //       $('#enombre').val(result.data.nombre);
	    	// $('#eapellido').val(result.data.apellido);
      //       $('#ecelular').val(result.data.celular);
      //       $('#ecorreo').val(result.data.correo);
      //       $('#edomicilio').val(result.data.domicilio);
      //       $('#efechaNacimiento').val(result.data.fechaNacimiento);
      //       $('#modalEditar').modal('show');
        }
    });
}
$("#formValidateEdit").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        enombre: "required",
        edescripcion: "required",
        etipoTerreno: "required",
        etipoConexion: "required",
        ediametro: "required",
    },
});

$("#modalEditar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateReg');
});
$("#modalEditar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateEdit');
});
</script>