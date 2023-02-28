@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Numero de documentos</h6>
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
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-person"></i> Generar numero</h3>
                </div>
                <div class="card-body">
                    <form id="formValidateReg"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="callout callout-warning">
                                <h5>Numero de documento para <strong class="text-warning">iniciar</strong> la autogeneracion.</h5>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="m-0"><strong>Contrato</strong> inicio desde: <strong class="nc">0</strong></p>
                                        <p>Numero actual: <strong class="nac">0</strong></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="m-0"><strong>Solicitud</strong> inicio desde: <strong class="ns">0</strong></p>
                                        <p>Numero actual: <strong class="nas">0</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                           
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Documento:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="documento" id="documento">
                                    <option disabled selected value="0">Seleccione documento . . . </option>
                                    <option value="Contrato">Contrato</option>
                                    <option value="Solicitud">Solicitud</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Numero de inicio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="numero" name="numero">
                            </div>
                        </div>
                        <!-- <div class="form-group col-lg-4">
                            <label class="m-0" style="visibility: hidden;"></label>
                            <div class="form-control form-control-sm p-0">
                                <button class="btn btn-success btn-sm w-100 guardar"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div> -->
                    </div>
                    </form>
                </div>
                <div class="card-footer py-1 border-transparent">
                    <button class="btn btn-success btn-sm guardar float-right"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
localStorage.setItem("sbd",2);
localStorage.setItem("sba",5);
$(document).ready( function () {
    fillNumero();
} );
function fillNumero()
{
    jQuery.ajax(
    { 
        url: "{{url('numero/listar')}}",
        method: 'get',
        success: function(r){
            console.log(r);
            $('.nc').html(r.data[0].numero);
            $('.nac').html(r.data[0].numeroActual);
            $('.ns').html(r.data[1].numero);
            $('.nas').html(r.data[1].numeroActual);
            $('.overlayPagina').css("display","none");
        }
    });
}
$('.guardar').on('click',function(){
    guardar();
});
function data()
{
    return {
        documento:$('#documento').val(),
        numero:$('#numero').val(),
    }
}
// function guardar()
// {
//     if($('#formValidateReg').valid()==false) return;
//     jQuery.ajax(
//     { 
//         url: "{{url('numero/registrar')}}",
//         data: data(),
//         method: 'get',
//         success: function(r){
//             if($('#documento').val()=='Contrato')
//             {   
//                 $('.nc').html($('#numero').val());
//                 $('.nac').html(r.data.numeroActual);
//             }
//             else
//             {   
//                 $('.ns').html($('#numero').val());
//                 $('.nas').html(r.data.numeroActual);
//             }
//             console.log(r);
//             msjRee(r);
//         }
//     });
// }
function guardar()
{
    if($('#formValidateReg').valid()==false) return;
    Swal.fire({
        title: 'Esta seguro de cambiar el numero de inicio de autogeneracion?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Cambiar!'
    }).then((result) => {
        if(result.isConfirmed)
        {
            jQuery.ajax(
            { 
                url: "{{url('numero/registrar')}}",
                data: data(),
                method: 'get',
                success: function(r){
                    if($('#documento').val()=='Contrato')
                    {   
                        $('.nc').html($('#numero').val());
                        $('.nac').html(r.data.numeroActual);
                    }
                    else
                    {   
                        $('.ns').html($('#numero').val());
                        $('.nas').html(r.data.numeroActual);
                    }
                    console.log(r);
                    msjRee(r);
                }
            });
        }
    });
}
$("#formValidateReg").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        documento: "required",
        numero: "required",
    },
});
</script>
@endsection