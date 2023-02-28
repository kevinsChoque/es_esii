<style>
    @media (min-width: 1200px)
    {
        .modal-xl {
            max-width: 1250px !important;
        }
    }
</style>
<div class="modal fade" id="modalRegNewSol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-file"></i> Registrar Nueva Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateRegNewSol">
                    <div class="row contenedorFormNewSol">
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0 text-center font-weight-bold">DATOS DE LA SOLICITUD:</p></div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Numero de Solicitud: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumSoli" name="snumSoli">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Fecha de Solicitud: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="sfechaSoli" name="sfechaSoli">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Fecha de Vencimiento: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="sfechaVencimiento" name="sfechaVencimiento">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Lugar: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="slugar" name="slugar" value="Abancay">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Fecha: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="sfecha" name="sfecha">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Empresa Prestadora: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="sempresa" name="sempresa" value="EMUSAP ABANCAY">
                            </div>
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="" class="m-0">Numero de recibo de pago por factibilidad del servicio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumRecibo" name="snumRecibo">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0 font-weight-bold">I. DATOS DEL SOLICITANTE:</p></div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snombreTit" name="snombreTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Dni: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sdniTit" name="sdniTit" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">CORREO ELECTRONICO:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="scorreoTit" name="scorreoTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Domicilio (Calle, Jirón, Avenida): <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sdomicilioTit" name="sdomicilioTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumeroTit" name="snumeroTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="smanzanaTit" name="smanzanaTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sloteTit" name="sloteTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Urbanizacion, barrio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="surbanizacionTit" name="surbanizacionTit">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0 font-weight-bold">II. DATOS DE REPRESENTANTE:</p></div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Nombre:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snombreRep" name="snombreRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Dni:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sdniRep" name="sdniRep" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">CORREO ELECTRONICO:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="scorreoRep" name="scorreoRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Domicilio (Calle, Jirón, Avenida):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sdomicilioRep" name="sdomicilioRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumeroRep" name="snumeroRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="smanzanaRep" name="smanzanaRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sloteRep" name="sloteRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Urbanizacion, barrio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="surbanizacionRep" name="surbanizacionRep">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0 font-weight-bold">III. DATOS DEL PREDIO (marca con “X”)</p></div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Tipo de predio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="stipoPredio" id="stipoPredio">
                                    <option disabled value="0">Seleccione...</option>
                                    <option value="En construccion">En construccion</option>
                                    <option value="Habilitado" selected>Habilitado</option>
                                    <option value="Otros">Otros (especificar) TERRENO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Ubicación (Calle, Jirón, Avenida):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="subicacionPre" name="subicacionPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumeroPre" name="snumeroPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="smanzanaPre" name="smanzanaPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="slotePre" name="slotePre">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Referencia:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sreferenciaPre" name="sreferenciaPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Tipo de servicio:</label>
                            <div class="form-control form-control-sm text-center">
                                <input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sts1">
                                <label class="form-check-label mr-5" for="sts1">Servicio de Agua Potable</label>

                                <input class="form-check-input" type="checkbox" value="Servicio de Alcantarillado Sanitario" id="sts2">
                                <label class="form-check-label" for="sts2">Servicio de Alcantarillado Sanitario</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Categoria:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="scategoria" id="scategoria">
                                    <option disabled value="0">Seleccione...</option>
                                    <option value="Domestico" selected>Domestico</option>
                                    <option value="Social">Social</option>
                                    <option value="Comercial y Otros">Comercial y Otros</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Estatal">Estatal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Uso del servicio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="susoServicio" id="susoServicio">
                                    <option disabled value="0">Seleccione...</option>
                                    <option value="Permanente" selected>Permanente</option>
                                    <option value="Temporal">Temporal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Nº meses:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="snumeroMeses" name="snumeroMeses">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 mb-2 font-weight-bold text-center">La conexión se solicita para ser instalada en el predio ubicado en el numeral III. Por lo cual adjunto copia de los documentos siguientes:</p>
                        </div>
                        <div class="col-lg-6 pl-5">
                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem1" checked>
                            <label class="form-check-label mr-5" for="sitem1">Documento que acredita la propiedad, titulo posesorio o certificado de posesión del predio, según corresponda</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem2" checked>
                            <label class="form-check-label mr-5" for="sitem2">Plano de Ubicación del predio, el cual deberá detallar la ubicación de la conexión de agua y/o alcantarillado</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem3">
                            <label class="form-check-label mr-5" for="sitem3">Documento que acredite la representación, de ser el caso</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem4">
                            <label class="form-check-label mr-5" for="sitem4">Certificado de vigencia de poder, para el caso de personas jurídicas</label></p>
                        </div>
                        <div class="col-lg-6 pl-5">
                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem5">
                            <label class="form-check-label mr-5" for="sitem5">Memoria descriptiva de instalaciones sanitarias internas de agua y desagüe firmada ingeniero sanitario colegiado y habilitado (Conexión domiciliaria de Agua Potable de un diámetro mayor a 15mm)</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="sitem6">
                            <label class="form-check-label mr-5" for="sitem6">Plano de instalaciones sanitarias internas de agua y desagüe, firmado ingeniero sanitario colegiado y habilitado (Conexión domiciliaria de Agua Potable de un diámetro a 15mm)</label></p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Otros:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="sotros" name="sotros">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Numero de telefono:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm soloNumeros clean" id="stelefono" name="stelefono" maxlength="9">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Numero alternativo:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm soloNumeros clean" id="stelefonoAlternativo" name="stelefonoAlternativo" maxlength="9">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveNewSoli"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveNewSoli').on('click',function(){
    saveNewSoli();
});
// botonNewSoli
$('.botonNewSoli').on('click',function(){
    jQuery.ajax(
    { 
        url: "{{url('solicitud/showNumCorrelativo')}}",
        method: 'get',
        success: function(r){
            console.log(r);
            let anio = new Date();
            $('#snumSoli').val(anio.getFullYear()+'-'+r.numeroCorrelativo);
            $('#modalRegNewSol').modal('show');
        }
    });
});
$('#sfechaSoli').on('change',function(){
    let fecha = $(this).val().split('-');
    let fechaActual = new Date(fecha[0], fecha[1], fecha[2]);
    let fechaVencimiento  = new Date(fechaActual.setMonth(fechaActual.getMonth()+1));
    
    dia = fechaVencimiento.getDate().toString().length>1?fechaVencimiento.getDate().toString():'0'+fechaVencimiento.getDate().toString();
    if(fechaVencimiento.getMonth().toString().length>1)
    {mes=fechaVencimiento.getMonth().toString();}
    else
    {
        if(fechaVencimiento.getMonth().toString()=='0') mes='12';
        else mes = '0'+fechaVencimiento.getMonth().toString();
    }
    let fechitaVen = fechaVencimiento.getFullYear().toString()+'-'+mes+'-'+dia;

    $('#sfechaVencimiento').val(fechitaVen);
    $('#sfecha').val($(this).val());
});


function dataNewSoli()
{
    let hoy = new Date();
    let hora = hoy.getHours().toString().padStart(2, 0);
    let minutos = hoy.getMinutes().toString().padStart(2, 0);
    let segunHora = hora >= 12 ? 'PM' : 'AM';
    let docHora = hora+':'+minutos+' '+segunHora;
	return {
        // solnro:'666'+$('#snumSoli').val().split('-')[0]+$('#snumSoli').val().split('-')[1],
        numSoli:$('#snumSoli').val(),
        fechaSoli:$('#sfechaSoli').val(),
        fechaVencimiento:$('#sfechaVencimiento').val(),
        lugar:$('#slugar').val(),
        fecha:$('#sfecha').val(),
        empresa:$('#sempresa').val(),
        numRecibo:$('#snumRecibo').val(),

        nombreTit:$('#snombreTit').val(),
        dniTit:$('#sdniTit').val(),
        domicilioTit:$('#sdomicilioTit').val(),
        correoTit:$('#scorreoTit').val(),
        numeroTit:$('#snumeroTit').val(),
        manzanaTit:$('#smanzanaTit').val(),
        loteTit:$('#sloteTit').val(),
        urbanizacionTit:$('#surbanizacionTit').val(),

        nombreRep:$('#snombreRep').val(),
        dniRep:$('#sdniRep').val(),
        correoRep:$('#scorreoRep').val(),
        domicilioRep:$('#sdomicilioRep').val(),
        numeroRep:$('#snumeroRep').val(),
        manzanaRep:$('#smanzanaRep').val(),
        loteRep:$('#sloteRep').val(),
        urbanizacionRep:$('#surbanizacionRep').val(),

        tipoPredio:$('#stipoPredio').val(),
        ubicacionPre:$('#subicacionPre').val(),
        numeroPre:$('#snumeroPre').val(),
        manzanaPre:$('#smanzanaPre').val(),
        lotePre:$('#slotePre').val(),
        referenciaPre:$('#sreferenciaPre').val(),

        ts1:$('#sts1').prop('checked'),
        ts2:$('#sts2').prop('checked'),

        categoria:$('#scategoria').val(),
        usoServicio:$('#susoServicio').val(),
        numeroMeses:$('#snumeroMeses').val(),

        item1:$('#sitem1').prop('checked'),
        item2:$('#sitem2').prop('checked'),
        item3:$('#sitem3').prop('checked'),
        item4:$('#sitem4').prop('checked'),
        item5:$('#sitem5').prop('checked'),
        item6:$('#sitem6').prop('checked'),

        otros:$('#sotros').val(),

        telefono:$('#stelefono').val(),
        telefonoAlternativo:$('#stelefonoAlternativo').val(),

        hora:docHora,
	}
}
function saveNewSoli()
{
    if($('#formValidateRegNewSol').valid()==false)
        return;
    jQuery.ajax(
    { 
        url: "{{url('solicitud/saveNewSoli')}}",
        data: dataNewSoli(),
        method: 'get',
        success: function(r){
            console.log(r);
            cleanFormNewSoli();
            $(".overlayRegDBL").toggle(flip++%2===0);
            construirTablaDBL();
            listarFromApp();
            $('#modalRegNewSol').modal('hide');
            msjRee(r);
        }
    });
}
function cleanFormNewSoli()
{
    // $(".contenedorFormularioRegistrar input[type=text]").val('');
    // $(".contenedorFormularioRegistrar input[type=date]").val('');
    // $(".contenedorFormularioRegistrar select").val('0');
    // $(".contenedorFormularioRegistrar input[type=checkbox]").prop('checked',false);
    $('.clean').val('')
    $('#sts1').prop('checked',false);
    $('#sts2').prop('checked',false);
    $('#sitem3').prop('checked',false);
    $('#sitem4').prop('checked',false);
    $('#sitem5').prop('checked',false);
    $('#sitem6').prop('checked',false);
}
$("#formValidateRegNewSol").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        snumSoli: "required",
        sfechaSoli: "required",
        sfechaVencimiento: "required",
        slugar: "required",
        sfecha: "required",
        sempresa: "required",
        snombreTit: "required",
        sdniTit: "required",
        sdomicilioTit: "required",
    },
});
</script>