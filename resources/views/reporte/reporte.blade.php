@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">REPORTES</h6>
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
        <div class="col-lg-4">
            <div class="callout callout-info">
                <h5><a class="text-dark" href="{{url('reporte/rep1')}}">Tramites de Solicitud.</a></h5>
                <p class="text-muted">Nuevas instalaciones de agua y/o desague.</p>
            </div>
        </div>
        <!-- <div class="col-lg-4">
            <div class="callout callout-warning">
                <h5><a class="text-dark" href="http://127.0.0.1:8000/rListEmpSer">Lista de empresas.</a></h5>
                <p class="text-muted">Listado por servicio.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="callout callout-success">
                <h5><a class="text-dark" href="http://127.0.0.1:8000/rSummarySer">Lista de servicios.</a></h5>
                <p class="text-muted">Resumen con infracciones.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="callout callout-info">
                <h5><a class="text-dark" href="http://127.0.0.1:8000/rListInfEmp">Lista de infracciones.</a></h5>
                <p class="text-muted">Listado por empresa.</p>
            </div>
        </div> -->
    </div>
</div>
<script>
$(document).ready( function () {
    $('.overlayPagina').css("display","none");
} );
localStorage.setItem("nb",0);
localStorage.setItem("sbd",0);
localStorage.setItem("sba",14);
</script>
@endsection