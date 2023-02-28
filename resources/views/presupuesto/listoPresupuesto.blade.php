@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Presupuesto</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <!-- <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button> -->
        </div>
    </div>
</div>
@endsection
@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay dark overlayRegistros">
                    <!-- <i class="fas fa-2x fa-sync-alt"></i> -->
                    <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="svgLoadLetter">
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-list"></i> Lista deregistros para presupuesto</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="4">DNI del Titular</th>
                                        <th class="text-center" data-priority="2">Nombre del Titular</th>
                                        <th class="text-center" data-priority="3">Direccion del predio</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="4">DNI del Titular</th>
                                        <th class="text-center" data-priority="2">Nombre del Titular</th>
                                        <th class="text-center" data-priority="3">Direccion del predio</th>
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
<script>
localStorage.setItem("sbd",3);
localStorage.setItem("sba",11);
    var tablaDeRegistros;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
        fillTecnicos();
    } );
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{url('presupuesto/listarListos')}}",
            method: 'get',
            success: function(result){
                console.log(result.data);
                var html = '';
                for (var i = 0; i < result.data.length; i++) 
                {
                    html += '<tr class="text-center">' +
                        '<td class="align-middle font-weight-bold">' + novDato(result.data[i].numSoli) + '</td>' +
                        '<td class="align-middle">' + novDato(result.data[i].dniTit) +'</td>' +
                        '<td class="align-middle">' + novDato(result.data[i].nombreTit) +'</td>' +
                        '<td class="align-middle">' + novDato(result.data[i].ubicacionPre) +'</td>' +
                        '<td class="align-middle">'+
                            '<div class="btn-group btn-group-sm" role="group">'+
                                // '<button type="button" class="btn text-info" title="Lista de Reprogramaciones" onclick="fillRegistrosHistorial('+result.data[i].solnrof+');"><i class="fa fa-list-ol"></i></button>'+
                                // '<button type="button" class="btn text-info" title="Programar Medicion" onclick="proMedicion('+result.data[i].solnrof+');"><i class="fa-solid fa-ruler"></i></button>'+
                                '<button type="button" class="btn text-info" title="Agregar datos a la Medicion" onclick="crearPresupuesto('+result.data[i].solnro+');"><i class="fa fa-file-invoice-dollar"></i></button>'+
                            '</div>'+
                        '</td>'+
                        '</tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
                $('.overlayPagina').css("display","none");
            }
        });
    }
    function crearPresupuesto(solnro)
    {
        localStorage.setItem("solnro",solnro);
        window.location.href = "{{url('presupuesto/cuadroPresupuestal')}}";
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
</script>
@endsection