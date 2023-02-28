@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Costos Colaterales</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <!-- <a href="{{url('presupuesto/cuadroPresupuestal')}}" class="btn btn-sm btn-success float-right">
                <i class="fa fa-plus"></i> 
                Registrar presupuesto
            </a> -->
        </div>
    </div>
</div>
@endsection
@section('contenido')
<!-- <div class="overlayPagina">
    <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
        <div class="ldio-onxyanc9oyh">
            <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
        </div>
    </div>
</div> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay dark overlayRegistros">
                    <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="svgLoadLetter">
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-list"></i> Listado de costos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1">Categoria</th>
                                        <th class="text-center" data-priority="1">Codigo</th>
                                        <th class="text-center" data-priority="1">Actividad</th>
                                        <th class="text-center" data-priority="2">Unid.</th>
                                        <th class="text-center" data-priority="2">Especificacion</th>
                                        <th class="text-center" data-priority="1">Tarifa</th>
                                        <th class="text-center" data-priority="3">Medio</th>
                                        <th class="text-center" data-priority="3">Unid.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">Categoria</th>
                                        <th class="text-center" data-priority="1">Codigo</th>
                                        <th class="text-center" data-priority="3">Actividad</th>
                                        <th class="text-center" data-priority="2">Unid.</th>
                                        <th class="text-center" data-priority="2">Especificacion</th>
                                        <th class="text-center" data-priority="4">Tarifa</th>
                                        <th class="text-center" data-priority="4">Medio</th>
                                        <th class="text-center" data-priority="1">Unid.</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
localStorage.setItem("sbd",1);
localStorage.setItem("sba",4);
var tablaDeRegistros;

$(document).ready( function () {
    tablaDeRegistros=$('.contenedorRegistros').html();
    fillRegistros();
    // $('.overlayPagina').css("display","none");
} );

function fillRegistros()
{
    $('.contenedorRegistros').css('display','block');
    jQuery.ajax(
    { 
        url: "{{url('cp/listar')}}",
        method: 'get',
        success: function(result){
            var html = '';
            let add = ''
            for (var i = 0; i < result.data.length; i++) 
            {
                edit = '<button type="button" class="btn text-info py-0 pl-1 pr-0" title="Editar tarifa" onclick="editarTarifa(this);"><i class="fa fa-pencil"></i></button>';
                add = '<div class="form-group m-0 newTarifa" style="display: none;">'+
                            '<div class="input-group input-group-sm">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text font-weight-bold">S/.</span>'+
                                '</div>'+
                                '<input type="text" class="form-control form-control-sm text-center saveNewTarifa" value="'+result.data[i].tarifa+'">'+
                                '<div class="input-group-append">'+
                                    '<button class="input-group-text font-weight-bold" onclick="finEdit(this);">Cancelar</button>'+
                                    '<button class="btn btn-success" onclick="saveEditTarifa(this);" data-id="'+result.data[i].idCp+'"><i class="fa fa-save"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                html += '<tr class="este es--------">' +
                    '<td class="font-weight-bold">' + result.data[i].categoria + '</td>' +
                    '<td class="text-center font-weight-bold">' + result.data[i].codigo + '</td>' +
                    '<td>' + novDato(result.data[i].actividad) +'</td>' +
                    '<td class="text-center">' + novDato(result.data[i].unidad) + '</td>' +
                    '<td>' + novDato(result.data[i].especificacion) + '</td>' +
                    '<td class="text-center shadow bg-light font-weight-bold">' + 
                        '<p class="m-0 containerTarifa">'+
                            '<span class="tarifaCp">'+novDato(result.data[i].tarifa) +'</span>'+ 
                            edit + 
                        '</p>'+
                        add +
                    '</td>' +
                    '<td class="text-center">' + novDato(result.data[i].medio) + '</td>' +
                    '<td class="text-center">' + novDato(result.data[i].unidadRendimiento) + '</td></tr>';
            }
            $('#data').html(html);
            initDatatable('registros');
            $('.overlayRegistros').css('display','none');
            $('.overlayPagina').css("display","none");
        }
    });
}
function saveEditTarifa(elem)
{
    let newTarifa = $(elem).parent().parent().find('input.saveNewTarifa').val();
    let id = $(elem).attr('data-id');
    // alert($(elem).parent().parent().find('input.saveNewTarifa').val());
    // ajax para guardar
    jQuery.ajax(
    { 
        url: "{{url('cp/saveEditTarifa')}}",
        data: {newTarifa : newTarifa,id : id},
        method: 'get',
        success: function(r){
            $(elem).parent().parent().parent().parent().parent().find('span.tarifaCp').html(newTarifa)
            // alert($(elem).parent().parent().parent().parent().parent().find('span.tarifaCp').html(newTarifa));
            msjRee(r);
            console.log(r);
        }
    });
    finEdit(elem);
}
function finEdit(elem)
{
    // $(elem).parent().parent().parent().parent().css('display','none');
    $(elem).parent().parent().parent().css('display','none');
    $(elem).parent().parent().parent().parent().find('p.containerTarifa').css('display','block');
    // alert($(elem).parent().parent().parent().attr('class'));
}
function editarTarifa(elem)
{
    $(elem).parent().css('display','none');
    $(elem).parent().parent().find('div.newTarifa').css('display','block');
    // alert($(elem).parent().parent().attr('class'));
}
// function editar(id)
// {
//     localStorage.setItem("idPresupuesto",id);
//     window.location.href = "{{url('presupuesto/editCuadroPresupuestal')}}";
// }
</script>
@endsection