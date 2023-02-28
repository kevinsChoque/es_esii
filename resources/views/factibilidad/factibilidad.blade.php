@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Listar Factibilidad</h6>
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-business-time"></i> Fechas de Factibilidad</h3>
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
                                        <th class="text-center" data-priority="4">Ubicacion del Predio</th>
                                        <th class="text-center" data-priority="2">Telefonos</th>
                                        <th class="text-center" data-priority="3">Tecnico y Dia de Fac.</th>
                                        <th class="text-center" data-priority="1">Rep.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1"># Sol.</th>
                                        <th class="text-center" data-priority="4">Ubicacion del Predio</th>
                                        <th class="text-center" data-priority="2">Telefonos</th>
                                        <th class="text-center" data-priority="3">Tecnico y Dia de Fac.</th>
                                        <th class="text-center" data-priority="1">Rep.</th>
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


@include('factibilidad.mAddData')
@include('factibilidad.mReprogramacion')
@include('factibilidad.mHistorial')
@include('factibilidad.mLoadFile')
@include('factibilidad.mNotificacion')
<script>
localStorage.setItem("nb",2);
localStorage.setItem("sbd",0);
localStorage.setItem("sba",8);
    var tablaDeRegistros,tablaDeRegistrosArchivos;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        tablaDeRegistrosArchivos=$('.contRegFilesFact').html();
        fillRegistros();
        fillTecnicos();
        // fillCargo();
    } );
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{url('factibilidad/listar')}}",
            method: 'get',
            success: function(r){
                console.log(r.data);
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    console.log(r.data[i].rado);
                    if(r.data[i].rado!='1')
                    html += '<tr class="text-center">' +
                        '<td class="align-middle font-weight-bold">' + novDato(r.data[i].numSoli) + '</td>' +
                        '<td class="align-middle">' + 
                            formatoGeneral('Direccion','fa fa-home',r.data[i].ubicacionPre,'<br>') +
                            formatoGeneral('numero','fa fa-hashtag',r.data[i].numeroPre,'<br>') +
                            formatoGeneral('manzana','fa fa-hashtag',r.data[i].manzanaPre,'<br>') +
                            formatoGeneral('lote','fa fa-hashtag',r.data[i].lotePre,'<br>') + 
                        '</td>' +
                        '<td class="align-middle font-weight-bold">' + 
                            '<button type="button" class="btn text-success py-0" title="Notificar" onclick="sendNotificaciones(this);" data-idFac="'+r.data[i].idFac+'"><i class="fa-solid fa-comment"></i> whatsapp</button><br>'+
                            formatoGeneral('Telefono','fa fa-phone',r.data[i].telefono,'<br>') + 
                            formatoGeneral('Telefono alternativo','fa fa-phone',r.data[i].telefonoAlternativo) + 
                        '</td>' +
                        '<td class="align-middle" style="font-size: 0.9rem;">' + 
                            novDato(r.data[i].nombre)+' '+ novDato(r.data[i].apellido) + '<br>' +
                            formatoDate(r.data[i].fecha) +
                        '</td>' +
                        '<td class="align-middle">'+
                            '<div class="btn-group btn-group-sm" role="group">'+
                                '<button type="button" class="btn text-info" title="Lista de Reprogramaciones" onclick="fillRegistrosHistorial(this);" data-solnro="'+r.data[i].solnro1+'"><i class="fa fa-list-ol"></i></button>'+
                                '<button type="button" class="btn text-info" title="Reprogramar Factibilidad" onclick="repFactibilidad(this);" data-solnro="'+r.data[i].solnro1+'"><i class="fa-solid fa-business-time"></i></button>'+
                                '<button type="button" class="btn text-info" title="Subir archivo" onclick="loadFile(this)" data-solnro="'+r.data[i].solnro1+'" data-idFac="'+r.data[i].idFac+'"><i class="fa fa-upload" ></i></button>'+
                                '<a href="{{url('factibilidad/download')}}/'+r.data[i].solnro+'" class="btn text-info" title="Descargar documento"><i class="fa fa-download"></i></a>'+
                                '<button type="button" class="btn text-info" title="Agregar datos a factibilidad" onclick="registrarAdicional(this);" data-solnro="'+r.data[i].solnro1+'"><i class="fa-solid fa-plus"></i></button>'+
                                '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar(this);" data-solnro="'+r.data[i].solnro1+'"><i class="fa fa-trash"></i></button>'+
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

    function eliminar(element)
    {
        let solnro = $(element).attr('data-solnro');
        // alert(solnro);
        Swal.fire({
            title: 'Esta seguro de eliminar el registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if(result.isConfirmed)
            {
                // $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('factibilidad/eliminar')}}",
                    data: {solnro:solnro},
                    method: 'get',
                    success: function(r){
                        $(".overlayRegDBL").toggle(flip++%2===0);
                        construirTabla();
                        fillRegistros();
                        msjRee(r);
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