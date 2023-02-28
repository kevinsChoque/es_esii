
<div class="modal fade" id="modDataMedicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-plus"></i> Medicion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegMed">
                    <input type="hidden" name="solnroDataAdd" id="solnroDataAdd">
                    <div class="row contFormAddData">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-2 shadow bg-warning">
                                    <div class="form-group">
                                        <label class="m-0">Estado de medicion:</label>
                                        <select name="estado" id="estado" class="form-control form-control-sm">
                                            <option disabled>Seleccione</option>
                                            <option value="1">Concluido</option>
                                            <option value="0" selected>En proceso</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-warning py-1 mb-1 text-center"><p class="m-0">PARA CONEXIONES DE AGUA POTABLE</p></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">1. DIAMETRO DE TUBERIA DE AGUA SOLICITADO</p></div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-1">
                                        <select class="form-control form-control-sm" name="diametroTuberiaA" id="diametroTuberiaA">
                                            <option selected disabled value="0">Seleccione</option>
                                            <option value="1/2 pulgada">1/2 pulgada</option>
                                            <option value="3/4(*) pulgada">3/4(*) pulgada</option>
                                            <option value="1(*) pulgada">1(*) pulgada</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group mb-1">
                                        <!-- <label class="m-0">Otros:</label> -->
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Otros</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="otros1" name="otros1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">2. LONGUITUD DE TUBERIA REQUERIDA</p></div>
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size: 0.7rem;">Para la instalacion:</span>
                                    </div>
                                    <input type="text" id="longuitudAgua" name="longuitudAgua" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="font-size: 0.7rem;">metros.</span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">3. DIAMETRO DE MATRIZ DE AGUA</p></div>
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="diametroAgua" name="diametroAgua" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="font-size: 0.7rem;">pulgadas(``).</span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">4. TIPO DE TERRENO SOBRE EL QUE SE TRABAJARA LA CONEXION</p></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cat" name="cat" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Tierra:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dat" name="dat" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddat" name="ddat" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cap" name="cap" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Pista:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dap" name="dap" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddap" name="ddap" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cav" name="cav" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Vereda:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dav" name="dav" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddav" name="ddav" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cae" name="cae" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Enboquillado:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dae" name="dae" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddae" name="ddae" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cao" name="cao" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Otros:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dao" name="dao" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddao" name="ddao" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">5. TIPO DE PREDIO</p></div>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control form-control-sm" id="tipoPredio" name="tipoPredio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">6. OBSERVACIONES</p></div>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control form-control-sm" id="obs1" name="obs1">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-warning py-1 mb-1 text-center"><p class="m-0">PARA CONEXIONES DE DESAGUE</p></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">1. DIAMETRO DE TUBERIA DE DESAGUE SOLICITADO</p></div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-1">
                                        <select class="form-control form-control-sm" name="diametroTuberiaD" id="diametroTuberiaD">
                                            <option selected disabled value="0">Seleccione</option>
                                            <option value="4 pulgada">4 pulgada</option>
                                            <option value="6 pulgada">6 pulgada</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Otros</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="otros2" name="otros2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">2. LONGUITUD DE TUBERIA REQUERIDA</p></div>
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size: 0.7rem;">Para la instalacion:</span>
                                    </div>
                                    <input type="text" id="longuitudDesague" name="longuitudDesague" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="font-size: 0.7rem;">metros.</span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">3. DIAMETRO DE COLECTOR DE DESAGUE</p></div>
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="diametroDesague" name="diametroDesague" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="font-size: 0.7rem;">pulgadas(``).</span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text alert alert-info m-0">4. PROFUNDIDAD MAXIMA A CUAL LA CAJA DE REGISTRO DEBE TRABAJAR</span>
                                    </div>
                                    <input type="text" id="profundidad" name="profundidad" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0" style="font-size: .9rem;">5. TIPO DE TERRENO SOBRE EL QUE SE TRABAJARA LA CONEXION</p></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cdt" name="cdt" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Tierra:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="ddt" name="ddt" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="dddt" name="dddt" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cdp" name="cdp" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Pista:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="ddp" name="ddp" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="dddp" name="dddp" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cdv" name="cdv" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Vereda:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="ddv" name="ddv" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="dddv" name="dddv" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cde" name="cde" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Enboquillado:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="dde" name="dde" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="ddde" name="ddde" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-1">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend w-100">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="cdo" name="cdo" class="checkedMed">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Otros:</span>
                                                <div class="input-group-text">
                                                    <input type="text" id="ddo" name="ddo" class="form-control form-control-sm">
                                                </div>
                                                <span class="input-group-text" style="font-size: 0.7rem;">Distancia:</span>
                                                <div class="input-group-text w-100">
                                                    <input type="text" id="dddo" name="dddo" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text alert alert-info m-0">6. BREVE EXPOSICION DEL TIPO O CALIDAD DE LAS AGUAS RESIDUALES AUTORIZADOS PARA SU VERTIMIENTO A LA RED PUBLICA</span>
                                    </div>
                                    <input type="text" id="calidadAgua" name="calidadAgua" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <span class="input-group-text alert alert-info m-0">7. OBSERVACIONES</span>
                                    </div>
                                    <input type="text" id="obs2" name="obs2" class="form-control">
                                </div>
                            </div> 
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveDataMed"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$('.saveDataMed').on('click',function(){
    saveDataMed();
});
function registrarAdicional(element)
{
    // $('#modDataMedicion').modal('show');
    var solnro = $(element).attr('data-solnro');
    $('#solnroDataAdd').val(solnro);
    jQuery.ajax(
    { 
        url: "{{url('medicion/show')}}",
        data: {solnro:solnro},
        method: 'get',
        success: function(r){
            limpiarFormAddData();
            console.log(r);
            if(r.estado)
            {
                // $('#estado').attr('selected',r.data.estado);
                $('#estado').val(r.data.estado);
                $('#diametroTuberiaA').val(r.data.diametroTuberiaA);
                $('#otros1').val(r.data.otros1);
                $('#longuitudAgua').val(r.data.longuitudAgua);
                $('#diametroAgua').val(r.data.diametroAgua);
                $('#cat').prop('checked',r.data.cat=='1'?true:false);
                $('#dat').val(r.data.dat);
                $('#ddat').val(r.data.ddat);
                $('#cap').prop('checked',r.data.cap=='1'?true:false);
                $('#dap').val(r.data.dap);
                $('#ddap').val(r.data.ddap);
                $('#cav').prop('checked',r.data.cav=='1'?true:false);
                $('#dav').val(r.data.dav);
                $('#ddav').val(r.data.ddav);
                $('#cae').prop('checked',r.data.cae=='1'?true:false);
                $('#dae').val(r.data.dae);
                $('#ddae').val(r.data.ddae);
                $('#cao').prop('checked',r.data.cao=='1'?true:false);
                $('#dao').val(r.data.dao);
                $('#ddao').val(r.data.ddao);
                $('#tipoPredio').val(r.data.tipoPredio);
                $('#obs1').val(r.data.obs1);

                $('#diametroTuberiaD').val(r.data.diametroTuberiaD);
                $('#otros2').val(r.data.otros2);
                $('#longuitudDesague').val(r.data.longuitudDesague);
                $('#diametroDesague').val(r.data.diametroDesague);
                $('#profundidad').val(r.data.profundidad);
                $('#cdt').prop('checked',r.data.cdt=='1'?true:false);
                $('#ddt').val(r.data.ddt);
                $('#dddt').val(r.data.dddt);
                $('#cdp').prop('checked',r.data.cdp=='1'?true:false);
                $('#ddp').val(r.data.ddp);
                $('#dddp').val(r.data.dddp);
                $('#cdv').prop('checked',r.data.cdv=='1'?true:false);
                $('#ddv').val(r.data.ddv);
                $('#dddv').val(r.data.dddv);
                $('#cde').prop('checked',r.data.cde=='1'?true:false);
                $('#dde').val(r.data.dde);
                $('#ddde').val(r.data.ddde);
                $('#cdo').prop('checked',r.data.cdo=='1'?true:false);
                $('#ddo').val(r.data.ddo);
                $('#dddo').val(r.data.dddo);
                $('#calidadAgua').val(r.data.calidadAgua);
                $('#obs2').val(r.data.obs2);
            }
            $('#modDataMedicion').modal('show');
        }
    });
}
function dataAddMed()
{

    return {
        solnro:$('#solnroDataAdd').val(),
        estado:$('#estado').val(),
        // solo de agua
        diametroTuberiaA:$('#diametroTuberiaA').val(),
        otros1:$('#otros1').val(),
        longuitudAgua:$('#longuitudAgua').val(),
        diametroAgua:$('#diametroAgua').val(),
        cat:$('#cat').prop('checked')?'1':'0',
        dat:$('#dat').val(),
        ddat:$('#ddat').val(),
        cap:$('#cap').prop('checked')?'1':'0',
        dap:$('#dap').val(),
        ddap:$('#ddap').val(),
        cav:$('#cav').prop('checked')?'1':'0',
        dav:$('#dav').val(),
        ddav:$('#ddav').val(),
        cae:$('#cae').prop('checked')?'1':'0',
        dae:$('#dae').val(),
        ddae:$('#ddae').val(),
        cao:$('#cao').prop('checked')?'1':'0',
        dao:$('#dao').val(),
        ddao:$('#ddao').val(),
        tipoPredio:$('#tipoPredio').val(),
        obs1:$('#obs1').val(),
        // solo de desague
        diametroTuberiaD:$('#diametroTuberiaD').val(),
        otros2:$('#otros2').val(),
        longuitudDesague:$('#longuitudDesague').val(),
        diametroDesague:$('#diametroDesague').val(),
        profundidad:$('#profundidad').val(),
        cdt:$('#cdt').prop('checked')?'1':'0',
        ddt:$('#ddt').val(),
        dddt:$('#dddt').val(),
        cdp:$('#cdp').prop('checked')?'1':'0',
        ddp:$('#ddp').val(),
        dddp:$('#dddp').val(),
        cdv:$('#cdv').prop('checked')?'1':'0',
        ddv:$('#ddv').val(),
        dddv:$('#dddv').val(),
        cde:$('#cde').prop('checked')?'1':'0',
        dde:$('#dde').val(),
        ddde:$('#ddde').val(),
        cdo:$('#cdo').prop('checked')?'1':'0',
        ddo:$('#ddo').val(),
        dddo:$('#dddo').val(),
        calidadAgua:$('#calidadAgua').val(),
        obs2:$('#obs2').val(),
    }
}
function saveDataMed()
{
    // if($('#formValRegMed').valid()==false)
    //     return;
    jQuery.ajax(
    { 
        url: "{{url('medicion/saveDataMed')}}",
        data: dataAddMed(),
        method: 'get',
        success: function(r){
            construirTabla();
            fillRegistros();
            $('#modDataMedicion').modal('hide');
            msjRee(r);
        }
    });
}
function limpiarFormAddData()
{
    $(".contFormAddData input[type=text]").val('');
    $('.contFormAddData select').val('0');
    $('.checkedMed').prop('checked',false);
}
// $("#formValRegMed").validate({
//     errorClass: "text-danger font-italic font-weight-normal",
//     ignore: ".ignore",
//     rules: {
//         estado: "required",
//     },
// });
</script>