@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Cuadro presupuestal</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <a href="{{url('presupuesto/presupuesto')}}" class="btn btn-sm btn-success float-right">
                <i class="fa fa-list"></i> 
                Listar
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
                <!-- <div class="overlay dark overlayRegistros">
                    <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="svgLoadLetter1">
                </div> -->
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-file-invoice-dollar"></i> Registrar cuadro presupuestal</h3>
                </div>
                <div class="card-body">
                    <form id="formValidateReg">
                    <div class="row">
                        <input type="hidden" id="solnro" name="solnro">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="" class="m-0">Usuarios: <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-sm" id="usuarios">
                                            <option selected disabled value="0"> Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Codigo Catastral: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-clipboard-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="codigo" name="codigo">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Usuario: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Direccion: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
                            </div>
                        </div>
                        <!-- <div class="form-group col-lg-3">
                            <label for="" class="m-0">Plantilla:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="Plantilla" name="Plantilla">
                                <select class="form-control form-control-sm" id="plantilla">
                                    <option selected disabled> Seleccione una plantilla</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group col-lg-3">
                            <label class="m-0" style="visibility: hidden;">Plantilla:</label>
                            <div class="input-group input-group-sm">
                                <select class="custom-select" id="plantilla">
                                    <option selected disabled> Seleccione una plantilla</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success loadItems" type="button">Cargar items</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12 table-responsive contenedorRegistros" style="display: block;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light shadow">
                                    <tr>
                                        <th class="text-center" data-priority="1">Codigo</th>
                                        <th class="text-center" data-priority="2">Rubros</th>
                                        <th class="text-center" data-priority="2">Unidad</th>
                                        <th class="text-center" data-priority="3">Cantidad</th>
                                        <th class="text-center" data-priority="3">C/U x Act.</th>
                                        <th class="text-center" data-priority="2">Costo Total</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    <tr id="primeraFila" class="font-weight-bold">
                                        <td>1 )</td>
                                        <td>Costos Directos.</td>
                                        <td class="text-center">-</td>
                                        <td colspan="2"></td>
                                        <td class="text-center costoTotal shadow" style="background-color: #c3bfbf;">0</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr id="segundaFila" class="font-weight-bold">
                                        <td>2 )</td>
                                        <td>Gastos Generales y Utilidad.</td>
                                        <td class="text-center">15%</td>
                                        <td colspan="2"></td>
                                        <td class="text-center gastoGeneral shadow" style="background-color: #c3bfbf;">0</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr class="font-weight-bold">
                                        <td colspan="2"><button class="btn btn-primary btn-sm w-100"  data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i> Agregar detalle</button></td>
                                        <td colspan="3">Precio del Servicio Colateral sin IGV (1+2)</td>
                                        <td class="text-center shadow precioSerCol" style="background-color: #68c98f;">0</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr class="font-weight-bold">
                                        <td colspan="2"></td>
                                        <td colspan="3">Precio del IGV </td>
                                        <td class="text-center shadow precioIgv" style="background-color: #68c98f;">0</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr class="font-weight-bold">
                                        <td colspan="2"></td>
                                        <td colspan="3">Precio del Servicio Colateral Total</td>
                                        <td class="text-center shadow totalPresupuesto" id="totalPresupuesto" style="background-color: #68c98f;">0</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form id="formImp" action="{{url('presupuesto/imprimir')}}" method="post">
                    <input type="hidden" id="idImp" name="idImp" value="6">
                    @csrf
                </form>
                <div class="card-footer py-1 border-transparent">
                    <button type="button" class="btn btn-sm btn-success float-right savePresupuesto"><i class="fa fa-plus"></i> Guardar Presupuesto</button>
                    <button type="submit" class="btn btn-sm btn-primary float-right mr-2" form="formImp" style="display: none;s"><i class="fa fa-print"></i> Imprimir Presupuesto</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('presupuesto.mDetalle')
<script>
localStorage.setItem("nb",4);
localStorage.setItem("sbd",3);
localStorage.setItem("sba",12);
    var flip=0;
    $(document).ready( function () {
        // tablaDeRegistros=$('.contenedorRegistros').html();
        $('.overlayPagina').css("display","none");
        fillPlantilla();
        fillUsers();
        // initDatatable('registros');
        if(localStorage.getItem("solnro")!=0)
        {
            $("#usuarios").val(localStorage.getItem("solnro")).change();
            getDatos(localStorage.getItem("solnro"));
        }
    } );
    
    $('#usuarios').on('change',function(){
        // alert($(this).val());
        getDatos($(this).val());
    });
    $('.savePresupuesto').on('click',function(){
        savePresupuesto();
    });
    $('.loadItems').on('click',function(){
        loadItems();
    });
    function getDatos(solnro)
    {
        $('#solnro').val(solnro);
        jQuery.ajax(
        { 
            url: "{{url('presupuesto/getDatos')}}",
            data: {solnro:solnro},
            method: 'get',
            success: function(r){
                console.log(r);
                $('#codigo').val(r.codigo);
                $('#usuario').val(r.data.nombreTit);
                $('#direccion').val(r.data.ubicacionPre);
            }
        });
    }
    function fillUsers()
    {
        jQuery.ajax(
        { 
            url: "{{url('presupuesto/listarListos')}}",
            method: 'get',
            success: function(r){
                console.log(r.data);
                $.each(r.data,function(indice,fila){
                    $('#usuarios').append("<option value='"+fila.solnro+"'>"+novDato(fila.dniTit)+ ' | ' +novDato(fila.nombreTit)+ ' | ' + novDato(fila.ubicacionPre)+"</option>");
                });
                $('#usuarios').select2({
                    width:"resolve",
                });
            }
        });
    }
    
    function fillPlantilla()
    {
        jQuery.ajax(
        { 
            url: "{{url('plantilla/listar')}}",
            method: 'get',
            success: function(result){
                $.each(result.data,function(indice,fila){
                    $('#plantilla').append("<option value='"+fila.idPlantilla+"'>"+fila.nombre+' '+fila.cantidad+"</option>");
                });
                
            }
        });
    }
    function data(tipo)
    {
        return {
            solnro:$('#solnro').val(),
            codigo:$('#codigo').val(),
            usuario:$('#usuario').val(),
            direccion:$('#direccion').val(),
            total:$('#totalPresupuesto').html(),
            estado:'1',
        }
    }
    // var ppp=0;
    function savePresupuesto()
    {
        let ids = [];
        let cods = [];
        let cantidades = [];
        $('.idDetalle').each(function(index,element){
            // alert($(element).attr('data-id'));
            ids.push($(element).attr('data-id'));
            cods.push($(element).attr('data-codigo'));
        });
        if($('#formValidateReg').valid()==false)
        {return;}
        if(ids.length==0)
        {
            msjSimple(false,'Agregue detalle');
            return;
        }
        $('.cantDetalle').each(function(index,element){
            cantidades.push($(element).val());
        });
        $( ".overlayPagina" ).css('display','block');
        var dataDetalle = {ids:ids,cods:cods,cantidades:cantidades};
        var datos = data();
        Object.assign(datos,dataDetalle);
        console.log('--------------');
        console.log(datos);
        console.log('--------------');
        jQuery.ajax(
        { 
            url: "{{url('presupuesto/registrar')}}",
            data: datos,
            method: 'get',
            success: function(result){
                msjRee(result);
                $( ".overlayPagina" ).css('display','none');
                window.location.href = "{{url('presupuesto/presupuesto')}}";
            }
        });
    }
    function loadItems()
    {
        if($('#plantilla').val()===null)
        {
            msjSimple(false,'Seleccione una plantilla');
            return;
        }
        jQuery.ajax(
        { 
            url: "{{url('plantilla/show')}}",
            data: {id:$('#plantilla').val()},
            method: 'get',
            success: function(r){
                console.log(r);
                for (var i = 0; i < r.data.length; i++) {
                    fillDetalle(r.data[i]);
                }
                calCostoDirecto();
                calGastosGenerales();
                calPrecioSerCol();
                calPrecioIgv();
                calTotal();
            }
        });
    }
    function fillDetalle(detalle)
    {
        // console.log(detalle.cantidad);
        let cantidad = detalle.cantidad=='' || detalle.cantidad===null?'0':detalle.cantidad;
        let subTotal = parseFloat(detalle.tarifa.replace(',', '.')) * parseFloat(cantidad);
        let reg = '<tr class="kevins idDetalle" data-id="'+detalle.idCp+'" data-codigo="'+detalle.codigo+'">'+
                '<td class="text-center align-middle font-weight-bold">'+detalle.codigo+'</td>'+
                '<td class="align-middle">'+detalle.actividad+'</td>'+
                '<td class="text-center align-middle">'+detalle.unidad+'</td>'+
                '<td class="text-center align-middle">'+
                    '<div class="form-group m-0 col-9 m-auto">'+
                        '<div class="input-group input-group-sm shadow">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>'+
                            '</div>'+
                            '<input type="text" class="form-control form-control-sm text-center cantDetalle" value="'+cantidad+'" onkeyup="calForDetalle(this);">'+
                        '</div>'+
                    '</div>'+
                '</td>'+
                '<td class="text-center align-middle regCostoUnitario">'+detalle.tarifa+'</td>'+
                '<td class="text-center align-middle regCosto font-weight-bold">'+subTotal+'</td>'+
                '<td class="text-center align-middle"><button type="button" class="btn text-danger" title="Eliminar registro" onclick="delReg(this)"><i class="fa fa-trash"></i></button></td>'+
            '</tr>';
        $('#primeraFila').after(reg);
    }
    $("#formValidateReg").validate({
        errorClass: "text-danger font-italic font-weight-normal",
        ignore: ".ignore",
        rules: {
            codigo: "required",
            usuario: "required",
            direccion: "required",
        },
    });
</script>
@endsection