@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<!-- <script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script> -->
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Listar personas</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-person"></i> Listar</h3>
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
                                        <th class="text-center" data-priority="1">DOC</th>
                                        <th class="text-center" data-priority="2">Cargo</th>
                                        <th class="text-center" data-priority="2">Nombre</th>
                                        <th class="text-center" data-priority="3">Celular</th>
                                        <th class="text-center" data-priority="3">Correo</th>
                                        <th class="text-center" data-priority="2">Firma</th>
                                        <th class="text-center" data-priority="4">F.Reg.</th>
                                        <th class="text-center" data-priority="4">F.Act.</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">DOC</th>
                                        <th class="text-center" data-priority="2">Cargo</th>
                                        <th class="text-center" data-priority="2">Nombre</th>
                                        <th class="text-center" data-priority="3">Celular</th>
                                        <th class="text-center" data-priority="3">Correo</th>
                                        <th class="text-center" data-priority="2">Firma</th>
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
<!-- <button class="btn btn-success" id="tipicha">casca</button> -->
@include('persona.modals')
<script>
    // tippy('#tipicha', {
    //   content: 'unsafeUserData',
    //   allowHTML: false
    // });
localStorage.setItem("nb",0);
localStorage.setItem("sbd",1);
localStorage.setItem("sba",3);
    var tablaDeRegistros;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
        fillCargo();
        // $('.overlayPagina').css("display","none");
    } );
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{url('persona/listar')}}",
            method: 'get',
            success: function(result){
                console.log(result.data);
                var html = '';
                let firma = '';
                for (var i = 0; i < result.data.length; i++) 
                {
                    firma = result.data[i].firma=='1'?'<button type="button" class="btn btn-info btn-sm py-0 shadow font-italic"><i class="fa fa-signature"></i> Firma</button>':'<button type="button" class="btn btn-secondary btn-sm py-0 font-italic" onclick="cambiarFirmador('+result.data[i].idPersona+');"><i class="fa fa-signature"></i> Cambiar</button>';
                    html += '<tr class="text-center">' +
                        '<td>' + formatoTipoDoc(result.data[i].tipoDoc) + ' ' + result.data[i].doc + '</td>' +
                        '<td>' + novDato(result.data[i].nombreCargo) + '</td>' +
                        '<td>' + result.data[i].nombre + ' ' + result.data[i].apellido + '</td>' +
                        '<td>' + novDato(result.data[i].celular) + '</td>' +
                        '<td>' + novDato(result.data[i].correo) + '</td>' +
                        '<td>' + firma +'</td>' +
                        '<td>' + formatoDateHours(result.data[i].fechaRegistro) + '</td>' +
                        '<td>' + verificarFecha(novDato(result.data[i].fechaActualizacion)) + '</td>' +
                        '<td><div class="btn-group btn-group-sm" role="group">'+
                        '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+result.data[i].idPersona+');"><i class="fa fa-edit" ></i></button>'+
                        '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+result.data[i].idPersona+');"><i class="fa fa-trash"></i></button>'+
                        '</div></td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
                $('.overlayPagina').css("display","none");
            }
        });
    }
    function eliminar(id)
    {
        Swal.fire({
            title: 'Esta seguro de eliminar el registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if(result.isConfirmed)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('persona/eliminar')}}",
                    data: {id:id},
                    method: 'get',
                    success: function(result){
                        console.log(result);
                        construirTabla();
                        fillRegistros();
                        msjRee(result);
                    }
                });
            }
        });
    }
    function cambiarFirmador(id)
    {
        Swal.fire({
            title: 'Esta seguro de cambiar el registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Cambiar!'
        }).then((result) => {
            if(result.isConfirmed)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('persona/cambiarFirmador')}}",
                    data: {id:id},
                    method: 'get',
                    success: function(result){
                        console.log(result);
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
    // function limpiarForm()
    // {
    //     $(".select2").val("0").trigger("change.select2");
    //     $('.contenedorFormularioRegistrar :input').val('');
    // }
</script>
@endsection