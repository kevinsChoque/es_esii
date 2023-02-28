<style>
    @media (min-width: 1200px)
    {
        .modal-xl {
            max-width: 1250px !important;
        }
    }
</style>
<div class="modal fade" id="modalEditarSol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-file"></i> Editar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateRegEditarSol">
                    <div class="row contenedorFormNewSol">
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0 text-center font-weight-bold">DATOS DE LA SOLICITUD:</p></div>
                        </div>
                        <input type="hidden" id="esolnro">
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Numero de Solicitud: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="enumSoli" name="enumSoli">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Fecha de Solicitud: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="efechaSoli" name="efechaSoli">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="m-0">Fecha de Vencimiento: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="efechaVencimiento" name="efechaVencimiento">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Lugar: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="elugar" name="elugar" value="Abancay">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Fecha: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm clean" id="efecha" name="efecha">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Empresa Prestadora: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="eempresa" name="eempresa" value="EMUSAP ABANCAY">
                            </div>
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="" class="m-0">Numero de recibo de pago por factibilidad del servicio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="enumRecibo" name="enumRecibo">
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
                                <input type="text" class="form-control form-control-sm clean" id="enombreTit" name="enombreTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Dni: <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="edniTit" name="edniTit" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">CORREO ELECTRONICO:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="ecorreoTit" name="ecorreoTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Domicilio (Calle, Jirón, Avenida): <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="edomicilioTit" name="edomicilioTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="enumeroTit" name="enumeroTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="emanzanaTit" name="emanzanaTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="eloteTit" name="eloteTit">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Urbanizacion, barrio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="eurbanizacionTit" name="eurbanizacionTit">
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
                                <input type="text" class="form-control form-control-sm clean" id="enombreRep" name="enombreRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Dni:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="edniRep" name="edniRep" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">CORREO ELECTRONICO:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="ecorreoRep" name="ecorreoRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Domicilio (Calle, Jirón, Avenida):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="edomicilioRep" name="edomicilioRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="enumeroRep" name="enumeroRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="emanzanaRep" name="emanzanaRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="eloteRep" name="eloteRep">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Urbanizacion, barrio:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="eurbanizacionRep" name="eurbanizacionRep">
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
                                <select class="form-control form-control-sm" name="etipoPredio" id="etipoPredio">
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
                                <input type="text" class="form-control form-control-sm clean" id="eubicacionPre" name="eubicacionPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Numero (Nº):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="enumeroPre" name="enumeroPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Manzana (MZ):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="emanzanaPre" name="emanzanaPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="" class="m-0">Lote (Lt):</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="elotePre" name="elotePre">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Referencia:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="ereferenciaPre" name="ereferenciaPre">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Tipo de servicio:</label>
                            <div class="form-control form-control-sm text-center">
                                <input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="ets1">
                                <label class="form-check-label mr-5" for="ets1">Servicio de Agua Potable</label>

                                <input class="form-check-input" type="checkbox" value="Servicio de Alcantarillado Sanitario" id="ets2">
                                <label class="form-check-label" for="ets2">Servicio de Alcantarillado Sanitario</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="" class="m-0">Categoria:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="ecategoria" id="ecategoria">
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
                                <select class="form-control form-control-sm" name="eusoServicio" id="eusoServicio">
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
                                <input type="text" class="form-control form-control-sm clean" id="enumeroMeses" name="enumeroMeses">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 mb-2 font-weight-bold text-center">La conexión se solicita para ser instalada en el predio ubicado en el numeral III. Por lo cual adjunto copia de los documentos siguientes:</p>
                        </div>
                        <div class="col-lg-6 pl-5">
                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem1" checked>
                            <label class="form-check-label mr-5" for="eitem1">Documento que acredita la propiedad, titulo posesorio o certificado de posesión del predio, según corresponda</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem2" checked>
                            <label class="form-check-label mr-5" for="eitem2">Plano de Ubicación del predio, el cual deberá detallar la ubicación de la conexión de agua y/o alcantarillado</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem3">
                            <label class="form-check-label mr-5" for="eitem3">Documento que acredite la representación, de ser el caso</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem4">
                            <label class="form-check-label mr-5" for="eitem4">Certificado de vigencia de poder, para el caso de personas jurídicas</label></p>
                        </div>
                        <div class="col-lg-6 pl-5">
                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem5">
                            <label class="form-check-label mr-5" for="eitem5">Memoria descriptiva de instalaciones sanitarias internas de agua y desagüe firmada ingeniero sanitario colegiado y habilitado (Conexión domiciliaria de Agua Potable de un diámetro mayor a 15mm)</label></p>

                            <p class="m-0 text-justify"><input class="form-check-input" type="checkbox" value="Servicio de Agua Potable" id="eitem6">
                            <label class="form-check-label mr-5" for="eitem6">Plano de instalaciones sanitarias internas de agua y desagüe, firmado ingeniero sanitario colegiado y habilitado (Conexión domiciliaria de Agua Potable de un diámetro a 15mm)</label></p>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="" class="m-0">Otros:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm clean" id="eotros" name="eotros">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Numero de telefono:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm soloNumeros clean" id="etelefono" name="etelefono" maxlength="9">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Numero alternativo:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm soloNumeros clean" id="etelefonoAlternativo" name="etelefonoAlternativo" maxlength="9">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveEditarSoli"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveEditarSoli').on('click',function(){
    saveEditarSoli();
});
// $('.botonNewSoli').on('click',function(){
//     jQuery.ajax(
//     { 
//         url: "{{url('solicitud/showNumCorrelativo')}}",
//         method: 'get',
//         success: function(r){
//             console.log(r);
//             let anio = new Date();
//             $('#enumSoli').val(anio.getFullYear()+'-'+r.numeroCorrelativo);
//             $('#modalEditarSol').modal('show');
//         }
//     });
// });
$('#efechaSoli').on('change',function(){
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

    $('#efechaVencimiento').val(fechitaVen);
    $('#efecha').val($(this).val());
});

function editarSolicitud(element)
{
    // alert($(element).attr('data-solnro'));
    jQuery.ajax(
    { 
        url: "{{url('solicitud/show')}}",
        data: {solnro:$(element).attr('data-solnro')},
        method: 'get',
        success: function(r){
            // limpiarForm();
            console.log(r);
            if(r.estado)
            {
                $('#esolnro').val(r.data.solnro1);
                $('#enumSoli').val(r.data.numSoli);
                $('#efechaSoli').val(r.data.fechaSoli);
                $('#efechaVencimiento').val(r.data.fechaVencimiento);
                $('#elugar').val(r.data.lugar);
                $('#efecha').val(r.data.fecha);
                $('#eempresa').val(r.data.empresa);
                $('#enumRecibo').val(r.data.numRecibo);

                $('#enombreTit').val(r.data.nombreTit);
                $('#edniTit').val(r.data.dniTit);
                $('#ecorreoTit').val(r.data.correoTit);
                $('#edomicilioTit').val(r.data.domicilioTit);
                $('#enumeroTit').val(r.data.numeroTit);
                $('#emanzanaTit').val(r.data.manzanaTit);
                $('#eloteTit').val(r.data.loteTit);
                $('#eurbanizacionTit').val(r.data.urbanizacionTit);

                $('#enombreRep').val(r.data.nombreRep);
                $('#edniRep').val(r.data.dniRep);
                $('#ecorreoRep').val(r.data.correoRep);
                $('#edomicilioRep').val(r.data.domicilioRep);
                $('#enumeroRep').val(r.data.numeroRep);
                $('#emanzanaRep').val(r.data.manzanaRep);
                $('#eloteRep').val(r.data.loteRep);
                $('#eurbanizacionRep').val(r.data.urbanizacionRep);

                $('#etipoPredio').val(r.data.tipoPredio);
                $('#eubicacionPre').val(r.data.ubicacionPre);
                $('#enumeroPre').val(r.data.numeroPre);
                $('#emanzanaPre').val(r.data.manzanaPre);
                $('#elotePre').val(r.data.lotePre);
                $('#ereferenciaPre').val(r.data.referenciaPre);

                if(r.data.ts1=='true') $('#ets1').prop('checked',true); else $('#ets1').prop('checked',false);
                if(r.data.ts2=='true') $('#ets2').prop('checked',true); else $('#ets2').prop('checked',false);

                $('#ecategoria').val(r.data.categoria);
                $('#eusoServicio').val(r.data.usoServicio);
                $('#enumeroMeses').val(r.data.numeroMeses);

                if(r.data.item1=='true') $('#eitem1').prop('checked',true); else $('#eitem1').prop('checked',false);
                if(r.data.item2=='true') $('#eitem2').prop('checked',true); else $('#eitem2').prop('checked',false);
                if(r.data.item3=='true') $('#eitem3').prop('checked',true); else $('#eitem3').prop('checked',false);
                if(r.data.item4=='true') $('#eitem4').prop('checked',true); else $('#eitem4').prop('checked',false);
                if(r.data.item5=='true') $('#eitem5').prop('checked',true); else $('#eitem5').prop('checked',false);
                if(r.data.item6=='true') $('#eitem6').prop('checked',true); else $('#eitem6').prop('checked',false);

                $('#eotros').val(r.data.otros);

                $('#etelefono').val(r.data.telefono);
                $('#etelefonoAlternativo').val(r.data.telefonoAlternativo);
            }
            $('#modalEditarSol').modal('show');
        }
    });
}
function dataEditarSoli()
{
	return {
        solnro:$('#esolnro').val(),
        numSoli:$('#enumSoli').val(),
        fechaSoli:$('#efechaSoli').val(),
        fechaVencimiento:$('#efechaVencimiento').val(),
        lugar:$('#elugar').val(),
        fecha:$('#efecha').val(),
        empresa:$('#eempresa').val(),
        numRecibo:$('#enumRecibo').val(),

        nombreTit:$('#enombreTit').val(),
        dniTit:$('#edniTit').val(),
        correoTit:$('#ecorreoTit').val(),
        domicilioTit:$('#edomicilioTit').val(),
        numeroTit:$('#enumeroTit').val(),
        manzanaTit:$('#emanzanaTit').val(),
        loteTit:$('#eloteTit').val(),
        urbanizacionTit:$('#eurbanizacionTit').val(),

        nombreRep:$('#enombreRep').val(),
        dniRep:$('#edniRep').val(),
        correoRep:$('#ecorreoRep').val(),
        domicilioRep:$('#edomicilioRep').val(),
        numeroRep:$('#enumeroRep').val(),
        manzanaRep:$('#emanzanaRep').val(),
        loteRep:$('#eloteRep').val(),
        urbanizacionRep:$('#eurbanizacionRep').val(),

        tipoPredio:$('#etipoPredio').val(),
        ubicacionPre:$('#eubicacionPre').val(),
        numeroPre:$('#enumeroPre').val(),
        manzanaPre:$('#emanzanaPre').val(),
        lotePre:$('#elotePre').val(),
        referenciaPre:$('#ereferenciaPre').val(),

        ts1:$('#ets1').prop('checked'),
        ts2:$('#ets2').prop('checked'),

        categoria:$('#ecategoria').val(),
        usoServicio:$('#eusoServicio').val(),
        numeroMeses:$('#enumeroMeses').val(),

        item1:$('#eitem1').prop('checked'),
        item2:$('#eitem2').prop('checked'),
        item3:$('#eitem3').prop('checked'),
        item4:$('#eitem4').prop('checked'),
        item5:$('#eitem5').prop('checked'),
        item6:$('#eitem6').prop('checked'),

        otros:$('#eotros').val(),

        telefono:$('#etelefono').val(),
        telefonoAlternativo:$('#etelefonoAlternativo').val(),
	}
}
function saveEditarSoli()
{
    if($('#formValidateRegEditarSol').valid()==false)
        return;
    jQuery.ajax(
    { 
        url: "{{url('solicitud/saveEditarSoli')}}",
        data: dataEditarSoli(),
        method: 'get',
        success: function(r){
            console.log(r);
            // cleanFormNewSoli();
            $(".overlayRegDBL").toggle(flip++%2===0);
            construirTablaDBL();
            listarFromApp();
            $('#modalEditarSol').modal('hide');
            msjRee(r);
        }
    });
}
// function cleanFormNewSoli()
// {
//     $('.clean').val('')
//     $('#ets1').prop('checked',false);
//     $('#ets2').prop('checked',false);
//     $('#eitem3').prop('checked',false);
//     $('#eitem4').prop('checked',false);
//     $('#eitem5').prop('checked',false);
//     $('#eitem6').prop('checked',false);
// }
// $("#formValidateRegEditarSol").validate({
//     errorClass: "text-danger font-italic font-weight-normal",
//     ignore: ".ignore",
//     rules: {
//         enumSoli: "required",
//         efechaSoli: "required",
//         efechaVencimiento: "required",
//         elugar: "required",
//         efecha: "required",
//         eempresa: "required",
//         enombreTit: "required",
//         edniTit: "required",
//         edomicilioTit: "required",
//     },
// });
</script>