@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 m-auto">
            <h6 class="my-0 ml-3">SIS. DE GESTION DE TRAMITE DE INSTALACIONES DE AGUA POTABLE Y ALCANTARILLADO.</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar" style="display: none;">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
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
<div class="container-fluid text-center justify-content-center" style="display: none;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="font-weight-bold font-italic shadow">SIS. DE GESTION DE TRAMITE DE INSTALACIONES DE AGUA POTABLE Y ALCANTARILLADO.</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay dark overlayRegistros">
                    <!-- <i class="fas fa-2x fa-sync-alt"></i> -->
                    <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="svgLoadLetter">
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-file"></i> Solicitudes segun estado</h3>
                </div>
                <div class="card-body">
                    <div class="row" style="display: none;">
                        <div class="form-group col-lg-4">
                            <label class="m-0">Numero de Solicitud:</label>
                            <input type="text" class="form-control form-control-sm" id="solnro">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="m-0">Nombre del Titular:</label>
                            <input type="text" class="form-control form-control-sm" id="solnro">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="m-0">Ubicacion del Predio:</label>
                            <input type="text" class="form-control form-control-sm" id="solnro">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="m-0" style="display: none;">Ubicacion del Predio:</label>
                            <div class="form-control form-control-sm p-0">
                                <button class="btn btn-success btn-sm w-100"><i class="fa fa-search"></i> Buscar registro</button>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="4">Nombre del Titular</th>
                                        <th class="text-center" data-priority="4">Ubicacion del Predio</th>
                                        <th class="text-center" data-priority="3">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="4">Ubicacion del Predio</th>
                                        <th class="text-center" data-priority="4">Ubicacion del Predio</th>
                                        <th class="text-center" data-priority="3">Estado</th>
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
localStorage.setItem("nb",0);
localStorage.setItem("sbd",0);
localStorage.setItem("sba",1);
var tablaDeRegistros;
var flip=0;
$('.overlayPagina').css("display","block");
$(document).ready( function () {
    tablaDeRegistros=$('.contenedorRegistros').html();
    fillRegistrosAllState();
} );

function fillRegistrosAllState()
{
    $('.contenedorRegistros').css('display','block');
    jQuery.ajax(
    { 
        url: "{{url('dash/listarSegunEstado')}}",
        method: 'get',
        success: function(result){
            console.log(',.,.,.,.-----');
            console.log(result.data[0].SolNro);
            console.log(',.,.,.,.-----');
            var html = '';
            for (var i = 0; i < result.data.length; i++) 
            {
                // alert(result.data[i].estadoMedicion);
                if(result.data[i].estadoMedicion!=1)
                {
                    html += '<tr class="text-center">' +
                        '<td class="align-middle font-weight-bold">' + novDato(result.data[i].SolNro) + '</td>' +
                        '<td class="align-middle">' + novDato(result.data[i].SolNombre) + '</td>' +
                        '<td class="align-middle">' + 
                            formatoGeneral('Direccion','fa fa-home',result.data[i].SolDirec,'<br>') +
                            formatoGeneral('numero','fa fa-hashtag',result.data[i].SolDirNro,'<br>') +
                        '</td>' +
                        '<td class="align-middle">' + segunEstadoExp(result.data[i].estado)+'</td>' +
                        '</tr>';
                }
            }
            $('#data').html(html);
            initDatatable('registros');
            $('.overlayRegistros').css('display','none');
            $('.overlayPagina').css("display","none");
        }
    });
}
function construirTabla()
{
    $('.contenedorRegistros>div').remove();
    $('.contenedorRegistros').html(tablaDeRegistros);
}
function segunEstadoExp(est)
{
    if(est=='2')
    {return '<span class="badge badge-info shadow">FACTIBILIDAD</span>';}
    if(est=='3')
    {return '<span class="badge badge-primary shadow">MEDICION</span>';}
    if(est=='4')
    {return '<span class="badge badge-warning shadow">PRESUPUESTO</span>';}
    if(est=='5')
    {return '<span class="badge badge-success shadow">CONTRATO</span>';}
}
</script>
@endsection