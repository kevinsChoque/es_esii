<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{asset('plugins/datatablee/bootstrap5/bootstrap.min.css')}}" rel="stylesheet">
	<!-- <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"> -->
	<!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"> -->
	<script src="{{asset('plugins/datatablee/jquery-3.6.1.min.js')}}"></script>

	<link href="{{asset('plugins/datatablee/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{asset('plugins/datatablee/buttons.dataTables.min.css')}}" rel="stylesheet">

	<script type="text/javascript" src="{{asset('plugins/datatablee/jquery-3.5.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/dataTables.buttons.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/vfs_fonts.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/buttons.html5.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/datatablee/buttons.print.min.js')}}"></script>

	<style>
		.btn-success-import{
			color: #fff !important;
			background-color: #198754 !important;
			border-color: #198754 !important;
			padding: 5px 12px !important;
		}
	</style>
    <title>EMUSAP</title>
  </head>
  <body class="p-2">
    <div class="container-fluid">
        <div class="card shadow bg-light">
			<div class="card-header">
				<h6 class="m-0">Recibos pagados</h6>
			</div>
			<div class="card-body px-1">
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

    <script src="{{asset('plugins/datatablee/bootstrap5/bootstrap.bundle.min.js')}}"></script>
	<script>
		$(document).ready( function () {
	        tablaDeRegistros=$('.contenedorRegistros').html();
	        fillRegistros();
	    } );
		function initDatatablePer()
		{
			// $(document).ready(function() {
				$('#registros').DataTable( {
					"dom":'Bfrtip',
					"buttons": [
						{   extend: 'excelHtml5',
							title: 'Recibos Pagados'
						},
					],
					"autoWidth":false,
					"responsive":true,
					"ordering": false,
					"lengthMenu": [[-1,5, 10,25, -1], ["Todos",5, 10,25, "Todos"]],   
					// "order": [[ 1, 'desc' ]],
					"language": {
						"info": "Mostrando la pagina _PAGE_ de _PAGES_. (Total: _MAX_)",
						"search":"",
						"infoFiltered": "(filtrando)",
						"infoEmpty": "No hay registros disponibles",
						"sEmptyTable": "No tiene registros guardados.",
						"lengthMenu":"Mostrar registros _MENU_ .",
						"paginate": {
							"first": "Primero",
							"last": "Ultimo",
							"next": "Siguiente",
							"previous": "Anterior"
						}
					},
					
				} );
				$('input[type=search]').parent().css('width','100%');
				$('input[type=search]').css('width','100%');
				$('input[type=search]').css('margin','0');
				$('input[type=search]').prop('placeholder','Escriba para buscar en las columnas.');

				$('#example_filter').css('width','50%');
				$('#example_filter').addClass('mb-2');

				$('.buttons-html5').addClass('btn btn-success-import');
			// } );

		}
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
	                        '<td>' + r.data[i].numSoli + '</td>' +
	                        '<td>' + r.data[i].fechaSoli + '</td>' +
	                        '<td>' + r.data[i].codigo + '</td>' +
	                        '<td>' + r.data[i].nombreTit + '</td>' +
	                        '<td>' + tipoPersona +'</td>' +
	                        '<td>' + nombreEle  + '</td>' +
	                        '<td>' + r.data[i].ubicacionPre + '</td>' +
	                        '<td>' + servicios + '</td>' +
	                        '<td>' + r.data[i].telefono + '</td>' +
	                        '<td>' + r.data[i].correoTit + '</td>' +
	                        '<td>' + r.data[i].obs + '</td>' +
	                        '<td>' + r.data[i].fechaFactibilidad + '</td>' +
	                        '<td>' + resultado + '</td>' +
	                        '</tr>';
	                }
	                $('#data').html(html);
	                initDatatablePer();
	                $('.overlayRegistros').css('display','none');
	            }
	        });
	    }
	</script>
  </body>
</html>
