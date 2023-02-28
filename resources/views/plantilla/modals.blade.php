<!-- modal modalRegistrar -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->
<style>
    @media (min-width: 1200px)
    {
        .modal-xl {max-width: 1250px !important;}
    }
    .todo-list>li {
        background-color: #e0e3e7;
        border-left: 2px solid #a5adb5;
    }
</style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="{{asset('plugins/sortable/Sortable.min.js')}}"></script>
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-person-circle-plus"></i> Nueva plantilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateReg">
                <div class="row contenedorFormularioRegistrar">
                    <div class="form-group col-lg-3">
                        <label for="" class="m-0">Nombre de plantilla: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="" class="m-0">Descripcion: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="descripcion" name="descripcion">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Tipo de terreno: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                            </div>
                            <select class="form-control form-control-sm" name="tipoTerreno" id="tipoTerreno">
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
                            <select class="form-control form-control-sm" name="tipoConexion" id="tipoConexion">
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
                            <select class="form-control form-control-sm" name="diametro" id="diametro">
                                <option disabled selected value="0">Seleccione...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 table-responsive">
                        <table id="regCp" class="table table-hover table-striped table-bordered dt-responsive nowrap">
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
                            <tbody id="dataCp">
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
                        <div id="example1" class="list-group col" class="todo-list ui-sortable" data-widget="todo-list" style="display: none;">
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">1 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">2 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">3 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">4 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">5 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                            <div class="list-group-item" style="">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <small class="text">6 mins</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                        </div>
                        <ul class="todo-list ui-sortable testList" data-widget="todo-list" id="example2">
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
                            <!-- <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <span class="text">Make the theme responsive</span>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li> -->
                        </ul>
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

<!-- <button class="input-group-text font-weight-bold" onclick="finEdit(this);">Cancelar</button> -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<script src="{{asset('js/modificacionJqueryValidate.js')}}"></script>
<script>
// new Sortable(example1, {
//     animation: 150,
//     ghostClass: 'blue-background-class'
// });	
new Sortable(example2, {
    handle: '.handle', // handle's class
    animation: 150
});
new Sortable(example1, {
    handle: '.handle', // handle's class
    animation: 150
});
$('.guardar').on('click',function(){
    guardar();
});
$('#tipoConexion').on('change',function(){
    // alert($(this).val());
    let html='';
    if($(this).val()=='agua')
    {
        
        html='<option disabled selected>Seleccione...</option>'+
            '<option value="agua 1/2">Agua 1/2</option>'+
            '<option value="agua 3/4">Agua 3/4</option>'+
            '<option value="agua 2">Agua 2</option>';
        $('#diametro').html(html);
    }
    else
    {
        html='<option disabled selected>Seleccione...</option>'+
            '<option value="alcantarrillado 2">Alcantarrillado 2</option>'+
            '<option value="alcantarrillado 4">Alcantarrillado 4</option>'+
            '<option value="alcantarrillado 6">Alcantarrillado 6</option>';
        $('#diametro').html(html);
    }
});

function removeItemCp(elem)
{
    $(elem).parent().parent().parent().remove();
}
function addItemCp(elem)
{
    let html = '';
    html += '<li class="itemCp" data-id="'+novDato($(elem).attr('data-id'))+'">'+
                '<span class="text" style="width: 100%;">'+ 
                    '<div class="tools" style="float: right;">'+
                        '<i class="fas fa-trash" onclick="removeItemCp(this)"></i>'+
                    '</div>'+
                    '<span class="handle ui-sortable-handle">'+
                        '<i class="fas fa-ellipsis-v"></i> '+
                        '<i class="fas fa-ellipsis-v"></i>'+
                    '</span>'+
                    '<span class="badge badge-primary">'+novDato($(elem).attr('data-cod'))+'</span>: '+ 
                    novDato($(elem).attr('data-act')) + '<br>' +
                    '<p class="m-0 containerCantidad font-weight-bold" style="display: block;">Cantidad: '+
                        '<span class="cantidadItem">0</span>'+
                        '<button type="button" class="btn text-info py-0 pl-1 pr-0" title="Editar cantidad" onclick="editarCantidad(this);"><i class="fa fa-pencil"></i>'+
                        '</button>'+
                    '</p>'+
                    '<div class="form-group m-0 newCantidad" style="display: none;">'+
                        '<div class="input-group input-group-sm">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i> Cantidad:</span>'+
                            '</div>'+
                            '<input type="text" class="form-control form-control-sm text-center saveNewCantidad" value="0">'+
                            '<div class="input-group-append">'+
                                '<a href="#" class="input-group-text font-weight-bold" onclick="finEdit(this);">Cancelar</a>'+
                                // '<button class="btn btn-success" onclick="saveEditCantidad(this);" data-id="'+novDato($(elem).attr('data-id'))+'"><i class="fa fa-save"></i></button>'+
                                '<a href="#" class="btn btn-success" onclick="saveEditCantidad(this);"><i class="fa fa-save"></i></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</span>'+
                // '<div class="tools">'+
                //     '<i class="fas fa-trash" onclick="removeItemCp(this)"></i>'+
                // '</div>'+
            '</li>';
    $('#example2').append(html);
}
function saveEditCantidad(elem)
{
    let newCantidad = $(elem).parent().parent().find('input.saveNewCantidad').val();
    $(elem).parent().parent().parent().parent().find('p.containerCantidad').find('span.cantidadItem').html(newCantidad==''?'0':newCantidad);
    finEdit(elem);
}
function editarCantidad(elem)
{
    $(elem).parent().css('display','none');
    $(elem).parent().parent().find('div.newCantidad').css('display','block');
}
function finEdit(elem)
{
    $(elem).parent().parent().parent().css('display','none');
    $(elem).parent().parent().parent().parent().find('p.containerCantidad').css('display','block');
}
function fillCp()
{
    jQuery.ajax(
    { 
        url: "{{url('cp/listar')}}",
        method: 'get',
        success: function(result){
            var html = '';
            for (var i = 0; i < result.data.length; i++) 
            {
                html += '<tr class="text-center" onclick="addItemCp(this)" data-cod="'+ novDato(result.data[i].codigo) +'" data-act="'+ novDato(result.data[i].actividad) +'" data-id="'+ novDato(result.data[i].idCp) +'">' +
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
            $('#dataCp').html(html);
            initDatatable('regCp');
        }
    });
}

function data(tipo)
{
	return {
        nombre:$('#nombre').val(),
    	descripcion:$('#descripcion').val(),
        tipoTerreno:$('#tipoTerreno').val(),
        tipoConexion:$('#tipoConexion').val(),
        diametro:$('#diametro').val(),
	}
}
function guardar()
{
    if($('#formValidateReg').valid()==false)
    {return;}
    let ids = [];
    let ordenes = [];
    let cantidades = [];
    $('.itemCp').each(function(index,element){
        // totalCostosDirectos = totalCostosDirectos + parseFloat($(this).html());
        // alert($(element).attr('data-id')+'---'+index);
        ids.push($(element).attr('data-id'));
        ordenes.push(index);
    });
    $('.cantidadItem').each(function(index,element){
        cantidades.push($(element).html());
    });
    if(ids.length==0)
    {
        msjSimple(false,'Agregue items');
        return;
    }
    var listas = {ids:ids,ordenes:ordenes,cantidades:cantidades};
    var datos = data(true);
    Object.assign(datos,listas);
    jQuery.ajax(
    { 
        url: "{{url('plantilla/registrar')}}",
        data: datos,
        method: 'get',
        success: function(result){
        	console.log(result);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            limpiarForm(true);
            $('#modalRegistrar').modal('hide');
            msjRee(result);
        }
    });
}
$("#formValidateReg").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        nombre: "required",
        descripcion: "required",
        tipoTerreno: "required",
        tipoConexion: "required",
        diametro: "required",
    },
});

$("#modalRegistrar").on("hidden.bs.modal", function () 
{
    limpiarValidacion('formValidateReg');
});
</script>