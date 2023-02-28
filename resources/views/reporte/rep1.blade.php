@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Tramites de Solicitud:</h6>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay dark overlayRegistros">
                    <!-- <i class="fas fa-2x fa-sync-alt"></i> -->
                    <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="svgLoadLetter">
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-person"></i> Nuevas instalaciones de agua y/o desague.</h3>
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
                                        <th class="text-center" data-priority="1">Num.Soli.</th>
                                        <th class="text-center" data-priority="2">Fecha de Soli.</th>
                                        <th class="text-center" data-priority="2">Cod. catastral</th>
                                        <th class="text-center" data-priority="3">Titular</th>
                                        <th class="text-center" data-priority="2">Tipo</th>
                                        <th class="text-center" data-priority="3">Representante</th>
                                        <th class="text-center" data-priority="4">Direccion</th>
                                        <th class="text-center" data-priority="4">Servicios</th>
                                        <th class="text-center" data-priority="4">Telefono</th>
                                        <th class="text-center" data-priority="4">Correo</th>
                                        <th class="text-center" data-priority="4">Obs.</th>
                                        <th class="text-center" data-priority="4">Fecha de verificacion de factibilidad</th>
                                        <th class="text-center" data-priority="4">Resultado de factibilidad</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">Num.Soli.</th>
                                        <th class="text-center" data-priority="2">Fecha de Soli.</th>
                                        <th class="text-center" data-priority="2">Cod. catastral</th>
                                        <th class="text-center" data-priority="3">Titular</th>
                                        <th class="text-center" data-priority="2">Tipo</th>
                                        <th class="text-center" data-priority="3">Representante</th>
                                        <th class="text-center" data-priority="4">Direccion</th>
                                        <th class="text-center" data-priority="4">Servicios</th>
                                        <th class="text-center" data-priority="4">Telefono</th>
                                        <th class="text-center" data-priority="4">Correo</th>
                                        <th class="text-center" data-priority="4">Obs.</th>
                                        <th class="text-center" data-priority="4">Fecha de verificacion de factibilidad</th>
                                        <th class="text-center" data-priority="4">Resultado de factibilidad</th>
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
localStorage.setItem("sba",14);
    var tablaDeRegistros;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
    } );
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{url('reporte/listarRep1')}}",
            method: 'get',
            success: function(r){
                console.log(r.data);
                var html = '';
                let nombreRep;
                let nombreEle='';
                let tipoPersona='';
                let servicios = '';
                let resultado = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    if(r.data[i].ts1=='true' && r.data[i].ts2=='false')
                    {
                        servicios = 'Solo Agua';
                    }
                    if(r.data[i].ts1=='false' && r.data[i].ts2=='true')
                    {
                        servicios = 'Solo Desague';
                    }
                    if(r.data[i].ts1=='true' && r.data[i].ts2=='true')
                    {
                        servicios = 'Agua y Desague';
                    }
                    resultado = r.data[i].resultado==1?'Positivo':'Negativo';
                    // console.log(r.data[i].nombreRep===null?r.data[i].nombreTit:r.data[i].nombreRep);
                    nombreRep=r.data[i].nombreRep;
                    nombreEle=r.data[i].nombreRep===null || r.data[i].nombreRep==''?r.data[i].nombreTit:r.data[i].nombreRep;
                    tipoPersona=r.data[i].nombreRep===null || r.data[i].nombreRep==''?'Titular':'Representante';
                    resultado
                    html += '<tr class="text-center">' +
                        '<td>' + novDato(r.data[i].numSoli) + '</td>' +
                        '<td>' + novDato(r.data[i].fechaSoli) + '</td>' +
                        '<td>' + novDato(r.data[i].codigo) + '</td>' +
                        '<td>' + novDato(r.data[i].nombreTit) + '</td>' +
                        '<td>' + tipoPersona +'</td>' +
                        '<td>' + nombreEle  + '</td>' +
                        '<td>' + novDato(r.data[i].ubicacionPre) + '</td>' +
                        '<td>' + servicios + '</td>' +
                        '<td>' + novDato(r.data[i].telefono) + '</td>' +
                        '<td>' + novDato(r.data[i].correoTit) + '</td>' +
                        '<td>' + novDato(r.data[i].obs) + '</td>' +
                        '<td>' + formatoDate(r.data[i].fechaFactibilidad) + '</td>' +
                        '<td>' + formatoBadge(resultado) + '</td>' +
                        '</tr>';
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
</script>
@endsection