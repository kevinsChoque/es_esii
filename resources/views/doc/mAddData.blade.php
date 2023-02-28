<div class="modal fade" id="modDataContrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-plus"></i> Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegAddData">
                    <input type="hidden" name="solnroDataAdd" id="solnroDataAdd">
                    <div class="row contFormAddData">
                        <div class="col-lg-12">
                            <div class="alert bg-info shadow font-weight-bold py-0"><p class="m-0">1.- DATOS DEL TITULAR DE LA CONEXION DOMICILIARIA</p></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-0 font-weight-bold"><p class="m-0">Datos del Titular</p></div>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Nombre: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nombreTit" name="nombreTit">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Dni: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="dniTit" name="dniTit">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Ruc: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="rucTit" name="rucTit">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Domicilio: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="domicilioTit" name="domicilioTit">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Numero (Nª): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numeroTit" name="numeroTit">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Manzana (MZN): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="manzanaTit" name="manzanaTit">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Lote (Lt): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="loteTit" name="loteTit">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="m-0">Urbanizacion: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="urbanizacionTit" name="urbanizacionTit">
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-0 font-weight-bold"><p class="m-0">Datos del Representante</p></div>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Nombre: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nombreRep" name="nombreRep">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Dni: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="dniRep" name="dniRep">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Ruc: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="rucRep" name="rucRep">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Domicilio: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="domicilioRep" name="domicilioRep">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Numero (Nª): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numeroRep" name="numeroRep">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Manzana (MZN): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="manzanaRep" name="manzanaRep">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Lote (Lt): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="loteRep" name="loteRep">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="m-0">Urbanizacion: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="urbanizacionRep" name="urbanizacionRep">
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-warning py-0 font-weight-bold"><p class="m-0">Poder inscrito en:</p></div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="m-0">Ciudad: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ciudad" name="ciudad">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="m-0">Fecha: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="fecha" name="fecha">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="m-0">Ficha Nª: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numeroFicha" name="numeroFicha">
                        </div>
                        <div class="col-lg-12">
                            <div class="alert bg-info shadow font-weight-bold py-0"><p class="m-0">2.- DATOS DE LA CONEXION DOMICILIARIA</p></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-0 font-weight-bold"><p class="m-0">Lugar de Instalacion</p></div>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Domicilio: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="domicilioPre" name="domicilioPre">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Numero (Nª): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numeroPre" name="numeroPre">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Manzana (MZN): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="manzanaPre" name="manzanaPre">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0">Lote (Lt): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="lotePre" name="lotePre">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="m-0">Urbanizacion: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="urbanizacionPre" name="urbanizacionPre">
                        </div>
                        <hr>
                        <div class="col-lg-6 form-group mb-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend w-100">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="aguaPot" name="aguaPot" class="checkedCon">
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Agua Potable:</span>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Diametro de conexion(mm):</span>
                                    <div class="input-group-text w-100">
                                        <input type="text" id="aguaPotDia" name="aguaPotDia" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-6 form-group mb-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend w-100">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="alcSan" name="alcSan" class="checkedCon">
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Alcantarrillado Sanitario:</span>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Diametro de conexion(mm):</span>
                                    <div class="input-group-text w-100">
                                        <input type="text" id="alcSanDia" name="alcSanDia" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-6 form-group mb-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend w-100">
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Tipo de conexion:</span>
                                    <div class="input-group-text w-50">
                                        <select class="form-control form-control-sm" name="tiempoConexion" id="tiempoConexion">
                                            <option disabled value="0">Seleccione</option>
                                            <option value="Temporal">Temporal</option>
                                            <option value="Permanente" selected>Permanente</option>
                                        </select>
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Nª de meses:</span>
                                    <div class="input-group-text w-50">
                                        <input type="text" id="meses" name="meses" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-6 form-group mb-1">
                            <div class="input-group input-group-sm h-100">
                                <div class="input-group-prepend w-100">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="existe" name="existe" class="checkedCon">
                                    </div>
                                    <span class="input-group-text font-weight-bold w-100" style="font-size: 0.7rem;">Existen puntos de agua y/o alcantarillado:</span>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12 form-group mb-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend w-100">
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Tipo de conexion:</span>
                                    <div class="input-group-text w-50">
                                        <select class="form-control form-control-sm" name="tipoConexion" id="tipoConexion">
                                            <option selected disabled value="0">Seleccione</option>
                                            <option value="Domestico">(Residencial) Domestico</option>
                                            <option value="Social">(Residencial) Social</option>
                                            <option value="Comercial">(No Residencial) Comercial</option>
                                            <option value="Industrial">(No Residencial) Industrial</option>
                                            <option value="Estatal">(No Residencial) Estatal</option>
                                        </select>
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Numero de unidades de uso que seran atendidas:</span>
                                    <div class="input-group-text w-50">
                                        <input type="text" id="unidades" name="unidades" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12 form-group mb-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend w-100">
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Nª de suministro:</span>
                                    <div class="input-group-text w-25">
                                        <input type="text" id="suministro" name="suministro" class="form-control form-control-sm">
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Nª de medidor:</span>
                                    <div class="input-group-text w-25">
                                        <input type="text" id="medidor" name="medidor" class="form-control form-control-sm">
                                    </div>
                                    <span class="input-group-text font-weight-bold" style="font-size: 0.7rem;">Fecha de emision de facturacion:</span>
                                    <div class="input-group-text w-50">
                                        <input type="text" id="fechaFacturacion" name="fechaFacturacion" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="alert alert-info py-0 font-weight-bold"><p class="m-0">Forma de pago de instalacion</p></div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="m-0">Tipo de pago:</label>
                            <select class="form-control form-control-sm" name="tipoPago" id="tipoPago">
                                <option selected disabled value="0">Seleccione</option>
                                <option value="Contado">Contado</option>
                                <option value="Cuotas">Cuotas</option>
                            </select>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Monto S/:</label>
                            <input type="text" class="form-control form-control-sm" id="monto" name="monto">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Cuota inicial:</label>
                            <input type="text" class="form-control form-control-sm" id="cuotaInicial" name="cuotaInicial">
                        </div>
                        <div class="col-lg-1 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Plazo:</label>
                            <input type="text" class="form-control form-control-sm" id="plazo" name="plazo">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Nª de cuotas:</label>
                            <input type="text" class="form-control form-control-sm" id="cuotas" name="cuotas">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Cuota mensual S/:</label>
                            <input type="text" class="form-control form-control-sm" id="cuotaMensual" name="cuotaMensual">
                        </div>
                        <div class="col-lg-1 form-group">
                            <label class="m-0" style="font-size: 0.7rem;">Interes %:</label>
                            <input type="text" class="form-control form-control-sm" id="interes" name="interes">
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-0 font-weight-bold"><p class="m-0">(SOLO para servicios temporales)</p></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="m-0">Fondo de garantia (monto):</label>
                            <input type="text" class="form-control form-control-sm" id="garantia" name="garantia">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="m-0">Penalidad (monto):</label>
                            <input type="text" class="form-control form-control-sm" id="penalidad" name="penalidad">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveDataCon"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveDataCon').on('click',function(){
    saveDataCon();
});

$('#resultado').on('change',function(){
    if($(this).val()=='Negativo')
    {
        $('#motivo1').attr('disabled',false);
    }
    else
    {
        $('#motivo1').attr('disabled',true);
    }
});
function registrarAdicional(element)
{
    // $('#modDataContrato').modal('show');
    $('#solnroDataAdd').val($(element).attr('data-solnro'));
    jQuery.ajax(
    { 
        url: "{{url('contrato/show')}}",
        data: {solnro:$(element).attr('data-solnro')},
        method: 'get',
        success: function(r){
            // limpiarFormAddData();
            console.log(r);
            if(r.estado)
            {
                $('#nombreTit').val(r.sol.nombreTit);
                $('#dniTit').val(r.sol.dniTit);
                $('#domicilioTit').val(r.sol.domicilioTit);
                $('#numeroTit').val(r.sol.numeroTit);
                $('#manzanaTit').val(r.sol.manzanaTit);
                $('#loteTit').val(r.sol.loteTit);
                $('#urbanizacionTit').val(r.sol.urbanizacionTit);

                $('#nombreRep').val(r.sol.nombreRep);
                $('#dniRep').val(r.sol.dniRep);
                $('#domicilioRep').val(r.sol.domicilioRep);
                $('#numeroRep').val(r.sol.numeroRep);
                $('#manzanaRep').val(r.sol.manzanaRep);
                $('#loteRep').val(r.sol.loteRep);
                $('#urbanizacionRep').val(r.sol.urbanizacionRep);

                $('#domicilioPre').val(r.sol.ubicacionPre);
                $('#numeroPre').val(r.sol.numeroPre);
                $('#manzanaPre').val(r.sol.manzanaPre);
                $('#lotePre').val(r.sol.lotePre);
                
                if(r.con!='')
                {
                    $('#rucTit').val(r.con.rucTit);
                    $('#rucRep').val(r.con.rucRep);
                    $('#ciudad').val(r.con.pciudad);
                    $('#fecha').val(r.con.pfecha);
                    $('#numeroFicha').val(r.con.pficha);
                }

                // $('#urbanizacionPre').val(r.sol.urbanizacionPre);

                // aguaPot:$('input[name=aguaPot]').prop('checked')?'1':'0';
                // aguaPotDia:$('#aguaPotDia').val();
                // alcSan:$('input[name=alcSan]').prop('checked')?'1':'0';
                // alcSanDia:$('#alcSanDia').val();
                // tiempoConexion:$('#tiempoConexion').val();
                // meses:$('#meses').val();
                // existe:$('input[name=existe]').prop('checked')?'1':'0';

                // tipoConexion:$('#tipoConexion').val();
                // unidades:$('#unidades').val();
                // suministro:$('#suministro').val();
                // medidor:$('#medidor').val();
                // fechaFacturacion:$('#fechaFacturacion').val();
                // tipoPago:$('#tipoPago').val();
                // monto:$('#monto').val();
                // cuotaInicial:$('#cuotaInicial').val();
                // plazo:$('#plazo').val();
                // cuotas:$('#cuotas').val();
                // cuotaMensual:$('#cuotaMensual').val();
                // interes:$('#interes').val();
                // garantia:$('#garantia').val();
                // penalidad:$('#penalidad').val();

                // -----------------------------
                // $('#codigo').val(r.data.codigo);
                // $('#tipoPropiedad').val(r.data.tipoPropiedad===null?'0':r.data.tipoPropiedad);
                // $('#tipoConstruccion').val(r.data.tipoConstruccion===null?'0':r.data.tipoConstruccion);
                // $('#otros').val(r.data.otros);
                // $('#material').val(r.data.material);
                // $('#numPisos').val(r.data.numPisos);
                // $('#numFamilias').val(r.data.numFamilias);
                // $('#numHabitantes').val(r.data.numHabitantes);
                // $('#act').val(r.data.act);
                // $('#tarifa').val(r.data.tarifa===null?'0':r.data.tarifa);
                // $('#unidad').val(r.data.unidad);
                // $('#servicio').val(r.data.servicio===null?'0':r.data.servicio);
                // $('#formaPago').val(r.data.formaPago===null?'0':r.data.formaPago);
                // $('#motivo').val(r.data.motivo);

                // if(r.data.cuentaAlcantarillado=='1')
                // {
                //     $('#r1').attr('checked',true);
                //     $('#ca1').val(r.data.dCuentaAlcantarillado);
                // }
                // else
                // {
                //     $('#r2').attr('checked',true);
                //     $('#ca2').val(r.data.dCuentaAlcantarillado);
                // }
                
                // $('#cuenta').val(r.data.cuenta===null?'0':r.data.cuenta);
                // $('#periodicidad').val(r.data.periodicidad===null?'0':r.data.periodicidad);
                // $('#otros1').val(r.data.otros1);
                // $('#cuentaPunto').val(r.data.cuentaPunto===null?'0':r.data.cuentaPunto);

                // $('#resultado').val(r.data.resultado=='1'?'Positivo':'Negativo');

                // $('#motivo1').val(r.data.motivo1);
                // $('#obs').val(r.data.obs);
                // $('#atendido').val(r.data.atendido===null?'0':r.data.atendido);
            }
            $('#modDataContrato').modal('show');
        }
    });
}
function dataAddCon()
{
    return {
        solnro:$('#solnroDataAdd').val(),
        nombreTit:$('#nombreTit').val(),
        dniTit:$('#dniTit').val(),
        rucTit:$('#rucTit').val(),
        domicilioTit:$('#domicilioTit').val(),
        numeroTit:$('#numeroTit').val(),
        manzanaTit:$('#manzanaTit').val(),
        loteTit:$('#loteTit').val(),
        urbanizacionTit:$('#urbanizacionTit').val(),
        nombreRep:$('#nombreRep').val(),
        dniRep:$('#dniRep').val(),
        rucRep:$('#rucRep').val(),
        domicilioRep:$('#domicilioRep').val(),
        numeroRep:$('#numeroRep').val(),
        manzanaRep:$('#manzanaRep').val(),
        loteRep:$('#loteRep').val(),
        urbanizacionRep:$('#urbanizacionRep').val(),
        pciudad:$('#ciudad').val(),
        pfecha:$('#fecha').val(),
        pficha:$('#numeroFicha').val(),
        domicilioPre:$('#domicilioPre').val(),
        numeroPre:$('#numeroPre').val(),
        manzanaPre:$('#manzanaPre').val(),
        lotePre:$('#lotePre').val(),
        urbanizacionPre:$('#urbanizacionPre').val(),

        aguaPot:$('input[name=aguaPot]').prop('checked')?'1':'0',
        aguaPotDia:$('#aguaPotDia').val(),
        alcSan:$('input[name=alcSan]').prop('checked')?'1':'0',
        alcSanDia:$('#alcSanDia').val(),
        tiempoConexion:$('#tiempoConexion').val(),
        meses:$('#meses').val(),
        existe:$('input[name=existe]').prop('checked')?'1':'0',

        tipoConexion:$('#tipoConexion').val(),
        unidades:$('#unidades').val(),
        suministro:$('#suministro').val(),
        medidor:$('#medidor').val(),
        fechaFacturacion:$('#fechaFacturacion').val(),
        tipoPago:$('#tipoPago').val(),
        monto:$('#monto').val(),
        cuotaInicial:$('#cuotaInicial').val(),
        plazo:$('#plazo').val(),
        cuotas:$('#cuotas').val(),
        cuotaMensual:$('#cuotaMensual').val(),
        interes:$('#interes').val(),
        garantia:$('#garantia').val(),
        penalidad:$('#penalidad').val(),
    }
}
function saveDataCon()
{
    // if($('#formValRegAddData').valid()==false)
    //     return;
    jQuery.ajax(
    { 
        url: "{{url('contrato/saveDataCon')}}",
        data: dataAddCon(),
        method: 'get',
        success: function(r){
            // construirTabla();
            // fillRegistros();
            $('#modDataContrato').modal('hide');
            msjRee(r);
        }
    });
}
function limpiarFormAddData()
{
    $(".contFormAddData input[type=text]").val('');
    $(".contFormAddData textarea").val('');
    $('.contFormAddData select').val('0');
    $('input[name=cuentaAlcantarillado]').attr('checked',false)
}
$("#formValRegAddData").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        codigo: "required",
    },
});
</script>