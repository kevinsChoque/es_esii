@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Medicion</h6>
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-ruler"></i> Listar Medicion</h3>
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
                                        <th class="text-center" data-priority="3">Factibilidad</th>
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
                                        <th class="text-center" data-priority="3">Factibilidad</th>
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
@include('medicion.mProgramacion')
@include('medicion.mAddData')
@include('medicion.mLoadFile')
<script>
localStorage.setItem("nb",3);
localStorage.setItem("sbd",0);
localStorage.setItem("sba",9);
    var tablaDeRegistros,tablaDeRegistrosArchivos;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        tablaDeRegistrosArchivos=$('.contRegFilesFact').html();
        fillRegistros();
        fillTecnicos();
    } );
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{url('medicion/listar')}}",
            method: 'get',
            success: function(result){
                console.log(result.data);
                var html = '';
                for (var i = 0; i < result.data.length; i++) 
                {
                    if(result.data[i].estadoMedicion!=1)
                    {
                        html += '<tr class="text-center">' +
                            '<td class="align-middle font-weight-bold">' + novDato(result.data[i].numSoli) + '</td>' +
                            '<td class="align-middle">' + 
                                formatoGeneral('Direccion','fa fa-home',result.data[i].ubicacionPre,'<br>') +
                                formatoGeneral('numero','fa fa-hashtag',result.data[i].numeroPre,'<br>') +
                                formatoGeneral('manzana','fa fa-hashtag',result.data[i].manzanaPre,'<br>') +
                                formatoGeneral('lote','fa fa-hashtag',result.data[i].lotePre,'<br>') + 
                            '</td>' +
                            '<td class="align-middle font-weight-bold">' + 
                                formatoGeneral('Telefono','fa fa-phone',result.data[i].telefono,'<br>') + 
                                formatoGeneral('Telefono alternativo','fa fa-phone',result.data[i].telefonoAlternativo) + 
                            '</td>' +
                            '<td class="align-middle" style="font-size: 0.9rem;">' + 
                                novDato(result.data[i].nombre)+' '+ novDato(result.data[i].apellido) +'<br>'+ 
                                formatoDate(result.data[i].fecha) +'</td>' +
                            '<td class="align-middle">'+
                                '<div class="btn-group btn-group-sm" role="group">'+
                                    '<button type="button" class="btn text-info" title="Programar Medicion" onclick="proMedicion(this);" data-solnro="'+result.data[i].solnro1+'"><i class="fa-solid fa-ruler"></i></button>'+
                                    '<button type="button" class="btn text-info" title="Subir archivo" onclick="loadFile(this)" data-solnro="'+result.data[i].solnro1+'" data-idMed="'+result.data[i].idMed+'"><i class="fa fa-upload" ></i></button>'+
                                    '<a href="{{url('medicion/download')}}/'+result.data[i].solnro1+'" class="btn text-info" title="Descargar documento"><i class="fa fa-download"></i></a>'+
                                    '<button type="button" class="btn text-info" title="Agregar datos a la Medicion" onclick="registrarAdicional(this);" data-solnro="'+result.data[i].solnro1+'"><i class="fa-solid fa-plus"></i></button>'+
                                    '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar(this);" data-solnro="'+result.data[i].solnro1+'"><i class="fa fa-trash"></i></button>'+
                                '</div>'+
                            '</td>'+
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
    function eliminar(element)
    {
        let solnro = $(element).attr('data-solnro');
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
                    url: "{{url('medicion/eliminar')}}",
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
</script>
@endsection