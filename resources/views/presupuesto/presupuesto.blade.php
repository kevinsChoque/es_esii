@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Presupuestos registrados</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <a href="{{url('presupuesto/cuadroPresupuestal')}}" class="btn btn-sm btn-success float-right">
                <i class="fa fa-plus"></i> 
                Registrar presupuesto
            </a>
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-list"></i> Listado de presupuestos</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="1">Cod. catastral</th>
                                        <th class="text-center" data-priority="3">Usuario</th>
                                        <th class="text-center" data-priority="2">Direccion</th>
                                        <th class="text-center" data-priority="2">Total</th>
                                        <th class="text-center" data-priority="2">Estado</th>
                                        <th class="text-center" data-priority="4">F.Reg.</th>
                                        <th class="text-center" data-priority="4">F.Act.</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="1">Cod. catastral</th>
                                        <th class="text-center" data-priority="3">Usuario</th>
                                        <th class="text-center" data-priority="2">Direccion</th>
                                        <th class="text-center" data-priority="2">Total</th>
                                        <th class="text-center" data-priority="2">Estado</th>
                                        <th class="text-center" data-priority="4">F.Reg.</th>
                                        <th class="text-center" data-priority="4">F.Act.</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
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

@include('presupuesto.mLoadFile')
<script>
localStorage.setItem("nb",0);
localStorage.setItem("sbd",3);
localStorage.setItem("sba",13);
var tablaDeRegistros,tablaDeRegistrosArchivos;
var flip=0;

$(document).ready( function () {
    tablaDeRegistros=$('.contenedorRegistros').html();
    tablaDeRegistrosArchivos=$('.contRegFilesPres').html();
    fillRegistros();
    $('.overlayPagina').css("display","none");
} );
function finalizarProceso(element)
{
    // alert($(element).attr('data-idPre'));
    Swal.fire({
        title: 'Esta seguro de finalizar el proceso?',
        text: "¡Una vez finalize el proceso, se podra realizar el CONTRATO DE PRESTACION DE SERVICIOS DE SANEAMIENTO (ANEXO 2)!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Si, Finalizar Proceso!'
    }).then((result) => {
        if(result.isConfirmed)
        {
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            jQuery.ajax(
            { 
                url: "{{url('presupuesto/finalizarProceso')}}",
                data: {idPre:$(element).attr('data-idPre')},
                method: 'get',
                success: function(result){
                    construirTabla();
                    fillRegistros();
                    msjRee(result);
                }
            });
        }
    });
}
function estadoDeProceso(est,idPre)
{
    return est=='1'?'<span class="badge badge-success shadow">Finalizado</span>':'<span class="badge badge-danger shadow btn" onclick="finalizarProceso(this)" data-idPre="'+idPre+'">Finalizar Proceso</span>';
}
function fillRegistros()
{

    $('.contenedorRegistros').css('display','block');
    jQuery.ajax(
    { 
        url: "{{url('presupuesto/listar')}}",
        method: 'get',
        success: function(r){
            var html = '';
            for (var i = 0; i < r.data.length; i++) 
            {
                loadFiles = '<button type="button" class="btn text-info" title="Subir archivo" onclick="loadFile(this)" data-solnro="'+r.data[i].solnro+'" data-idPre="'+r.data[i].idPre+'"><i class="fa fa-upload" ></i></button>';
                print = '<a href="{{url('presupuesto')}}/print/'+r.data[i].idPre+'" target="_blank" class="btn text-info" title="Imprimir presupuesto"><i class="fa fa-print"></i></a>';

                edit = r.data[i].culminacionProceso=='1'?'':'<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idPre+');"><i class="fa fa-edit"></i></button>';
                dele = r.data[i].culminacionProceso=='1'?'':'<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idPre+');"><i class="fa fa-trash"></i></button>';
                html += '<tr>' +
                    '<td class="text-center font-weight-bold">' + r.data[i].numSoli + '</td>' +
                    '<td class="text-center font-weight-bold">' + r.data[i].codigo + '</td>' +
                    '<td class="text-center">' + novDato(r.data[i].usuario) +'</td>' +
                    '<td class="text-center">' + novDato(r.data[i].direccion) + '</td>' +
                    '<td class="text-center font-weight-bold"> S/. ' + novDato(r.data[i].total) + '</td>' +
                    '<td class="text-center">' + estadoDeProceso(r.data[i].culminacionProceso,r.data[i].idPre) + '</td>' +
                    '<td class="text-center">' + formatoDateHours(r.data[i].fr) + '</td>' +
                    '<td class="text-center">' + verificarFecha(novDato(r.data[i].fa)) + '</td>' +
                    '<td class="text-center"><div class="btn-group btn-group-sm" role="group">'+
                    loadFiles+
                    print+
                    edit+
                    dele+
                    '</div></td></tr>';
            }
            $('#data').html(html);
            initDatatable('registros');
            $('.overlayRegistros').css('display','none');
        }
    });
}
function editar(id)
{
    localStorage.setItem("idPresupuesto",id);
    window.location.href = "{{url('presupuesto/editCuadroPresupuestal')}}";
}
function eliminar(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar el registro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if(result.isConfirmed)
        {
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            jQuery.ajax(
            { 
                url: "{{url('presupuesto/eliminar')}}",
                data: {id:id},
                method: 'get',
                success: function(result){
                    construirTabla();
                    fillRegistros();
                    msjRee(result);
                }
            });
        }
    });
}
function construirTabla()
{
    $('.contenedorRegistros>div').remove();
    $('.contenedorRegistros').html(tablaDeRegistros);
}
function limpiarForm()
{
    $('.contenedorFormularioRegistrar :input').val('');
}
</script>
@endsection