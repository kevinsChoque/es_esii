<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="modal fade" id="modDataFactibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-plus"></i> Factibilidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValRegAddData">
                    <input type="hidden" name="solnroDataAdd" id="solnroDataAdd">
                    
                    <div class="row contFormAddData">
                        <div class="col-lg-4 form-group">
                            <label class="m-0">Codigo Catastral: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="codigo" name="codigo">
                        </div>
                        <div class="col-lg-4 form-group bg-warning pb-3 shadow">
                            <label class="m-0">Resultado del analisis de factibilidad:</label>
                            <select class="form-control form-control-sm" name="resultado" id="resultado">
                                <option selected disabled value="0">Seleccione</option>
                                <option value="Positivo">Positivo</option>
                                <option value="Negativo">Negativo</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="m-0">Explicar motivo:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="motivo1" name="motivo1">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="m-0">Observacion (del trabajador y/o el solicitante):</label>
                            <!-- <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea class="form-control" id="obs" name="obs" cols="20" rows="8"></textarea>
                            </div> -->
                            <div id="summernote">
                                
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">2. DATOS DEL USUARIO</p></div>
                            <div class="form-group mb-1">
                                <label class="m-0">Codigo:</label>
                                <input type="text" class="form-control form-control-sm" id="codigo" name="codigo">
                            </div>
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">3. DATOS DEL PREDIO</p></div>
                            <div class="form-group mb-1">
                                <label class="m-0">Tipo de propiedad:</label>
                                <select class="form-control form-control-sm" name="tipoPropiedad" id="tipoPropiedad">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Particular o terreno independiente">Particular o terreno independiente</option>
                                    <option value="Publico o terreno del estado">Publico o terreno del estado</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Tipo de construccion:</label>
                                <select class="form-control form-control-sm" name="tipoConstruccion" id="tipoConstruccion">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Vivienda">Vivienda</option>
                                    <option value="Lote baldio">Lote baldio</option>
                                    <option value="Edificio (3 pisos a mas)">Edificio (3 pisos a mas)</option>
                                    <option value="Lote cercado">Lote cercado</option>
                                    <option value="Edificio estatal">Edificio estatal</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Otros:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="otros" name="otros">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label for="" class="m-0">Material de la construccion:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="material" name="material">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label for="" class="m-0">Numero de pisos:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="numPisos" name="numPisos">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label for="" class="m-0">Numero de familias:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="numFamilias" name="numFamilias">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label for="" class="m-0">Numero de habitantes:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="numHabitantes" name="numHabitantes">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">4. ACTIVIDA DE LA VIVIENDA Y UNIDADES DE USO</p></div>
                            <div class="form-group mb-1">
                                <label for="" class="m-0">Actividad:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="act" name="act">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Tarifa:</label>
                                <select class="form-control form-control-sm" name="tarifa" id="tarifa">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Social">Social</option>
                                    <option value="Domestico">Domestico</option>
                                    <option value="Comercial">Comercial</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Estatal">Estatal</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Uniades de uso:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="unidad" name="unidad">
                                </div>
                            </div>
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">5. SERVICIO SOLICITADO</p></div>
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="servicio" id="servicio">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Agua y desague">Agua y desague</option>
                                    <option value="Solo agua">Solo agua</option>
                                    <option value="Solo desague">Solo desague</option>
                                </select>
                            </div>
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">6. FORMA DE PAGO DE LA CONEXION DOMICILIARIA SOLICITADA</p></div>
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="formaPago" id="formaPago">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Pago hobligatorio del 100%">Pago hobligatorio del 100%</option>
                                    <option value="Apto al pago fraccionado">Apto al pago fraccionado</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Explicar motivo:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="motivo" name="motivo">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">7. CUENTA CON SERVICIO DE ALCANTARRILLADO SANITARIO</p></div>
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" id="r1" name="cuentaAlcantarillado" value="1">
                                        </div>
                                        <span class="input-group-text" style="font-size: 0.7rem;">Si, numero de conexiones</span>
                                    </div>
                                    <input type="text" id="ca1" name="ca1" class="form-control">
                                </div>
                            </div> 
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" id="r2" name="cuentaAlcantarillado" value="0">
                                        </div>
                                        <span class="input-group-text" style="font-size: 0.7rem;">No, tipo de alcantarrillado</span>
                                    </div>
                                    <input type="text" id="ca2" name="ca2" class="form-control">
                                </div>
                            </div>  
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">8. CUENTA CON TANQUE DE ALMACENAMIENTO</p></div> 
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="cuenta" id="cuenta">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Tanque alto y bajo">Tanque alto y bajo</option>
                                    <option value="Solo tanque alto">Solo tanque alto</option>
                                    <option value="Solo tanque bajo">Solo tanque bajo</option>
                                    <option value="No cuenta">No cuenta</option>
                                </select>
                            </div>
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">9. PERIODICIDAD DE FACTURACION Y FECHA DE VENCIMIENTODE RECIBO</p></div> 
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="periodicidad" id="periodicidad">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Otros:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="otros1" name="otros1">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">10. PUNTO DE AGUA</p></div> 
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="cuentaPunto" id="cuentaPunto">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Si cuenta">Si cuenta</option>
                                    <option value="No cuenta con punto de agua">No cuenta con punto de agua</option>
                                </select>
                            </div>
                            <div class="alert alert-info py-1 mb-1 shadow-lg bg-warning font-weight-bold"><p class="m-0">11. RESULTADO DEL ANALISIS DE FACTIBILIDAD</p></div> 
                            <div class="form-group mb-1 shadow-lg">
                                <select class="form-control form-control-sm" name="resultado" id="resultado">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="m-0">Explicar motivo:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="motivo1" name="motivo1">
                                </div>
                            </div>
                            <div class="alert alert-info py-1 mb-1"><p class="m-0">Observacion (del trabajador y/o el solicitante)</p></div> 
                            <div class="form-group mb-1">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <textarea class="form-control" id="obs" name="obs" cols="20" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="alert alert-primary py-1 mb-1"><p class="m-0">Atendido de manera</p></div> 
                            <div class="form-group mb-1">
                                <select class="form-control form-control-sm" name="atendido" id="atendido">
                                    <option selected disabled value="0">Seleccione</option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="Mediante telefono">Mediante telefono</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </form>
                <!-- <div id="summernote">Hello Summernote</div> -->
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success saveDataFac"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    (function ($) {
  $.extend($.summernote.lang, {
    'es-ES': {
      font: {
        bold: 'Negrita',
        italic: 'Itálica',
        underline: 'Subrayado',
        strike: 'Tachado',
        clear: 'Quitar estilo de fuente',
        height: 'Altura de la línea',
        size: 'Tamaño de la fuente'
      },
      image: {
        image: 'Imagen',
        insert: 'Insertar imagen',
        resizeFull: 'Redimensionar a tamaño completo',
        resizeHalf: 'Redimensionar a la mitad',
        resizeQuarter: 'Redimensionar a un cuarto',
        floatLeft: 'Flotar a la izquierda',
        floatRight: 'Flotar a la derecha',
        floatNone: 'No flotar',
        dragImageHere: 'Arrastre una imagen aquó',
        selectFromFiles: 'Seleccionar a partir de un archivo',
        url: 'URL de la imagen'
      },
      link: {
        link: 'Link',
        insert: 'Insertar link',
        unlink: 'Quitar link',
        edit: 'Editar',
        textToDisplay: 'Texto para mostrar',
        url: 'Hacia que URL lleva el link?'
      },
      video: {
        video: 'Video',
        videoLink: 'Link para el video',
        insert: 'Insertar video',
        url: 'URL del video?',
        providers: '(YouTube, Vimeo, Vine, Instagram, o DailyMotion)'
      },
      table: {
        table: 'Tabla'
      },
      hr: {
        insert: 'Insertar línea horizontal'
      },
      style: {
        style: 'Estilo',
        normal: 'Normal',
        blockquote: 'Cita',
        pre: 'Código',
        h1: 'Título 1',
        h2: 'Título 2',
        h3: 'Título 3',
        h4: 'Título 4',
        h5: 'Título 5',
        h6: 'Título 6'
      },
      lists: {
        unordered: 'Lista con marcadores',
        ordered: 'Lista numerada'
      },
      options: {
        help: 'Ayuda',
        fullscreen: 'Pantalla completa',
        codeview: 'Ver código fuente'
      },
      paragraph: {
        paragraph: 'Párrafo',
        outdent: 'Menos tabulación',
        indent: 'Más tabulación',
        left: 'Alinear a la izquierda',
        center: 'Alinear al centro',
        right: 'Alinear a la derecha',
        justify: 'Justificar'
      },
      color: {
        recent: 'Color de fondo',
        more: 'Más colores',
        background: 'Fondo',
        foreground: 'Fuente',
        transparent: 'Transparente',
        setTransparent: 'Fondo transparente',
        reset: 'Restaurar',
        resetToDefault: 'Restaurar por defecto'
      },
      shortcut: {
        shortcuts: 'Atajos de teclado',
        close: 'Cerrar',
        textFormatting: 'Formato de texto',
        action: 'Acción',
        paragraphFormatting: 'Formatao de párrafo',
        documentStyle: 'Estilo de documento'
      },
      history: {
        undo: 'Deshacer',
        redo: 'Rehacer'
      }
    }
  });
})(jQuery);
$(document).ready(function() {
    // $('#summernote').summernote();
    $('#summernote').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                  // set focus to editable area after initializing summernote
        lang: 'es-ES' ,// default: 'en-US'
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['codeview', 'help']]
        ]
    });
});
$('.saveDataFac').on('click',function(){ 
    saveDataFac();
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
    // $('#modDataFactibilidad').modal('show');
    // alert($(element).attr('data-solnro'));
    $('#solnroDataAdd').val($(element).attr('data-solnro'));
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/show')}}",
        data: {solnro:$(element).attr('data-solnro')},
        method: 'get',
        success: function(r){
            limpiarFormAddData();
            console.log(r);
            if(r.estado)
            {
                $('#codigo').val(r.data.codigo);
                $('#tipoPropiedad').val(r.data.tipoPropiedad===null?'0':r.data.tipoPropiedad);
                $('#tipoConstruccion').val(r.data.tipoConstruccion===null?'0':r.data.tipoConstruccion);
                $('#otros').val(r.data.otros);
                $('#material').val(r.data.material);
                $('#numPisos').val(r.data.numPisos);
                $('#numFamilias').val(r.data.numFamilias);
                $('#numHabitantes').val(r.data.numHabitantes);
                $('#act').val(r.data.act);
                $('#tarifa').val(r.data.tarifa===null?'0':r.data.tarifa);
                $('#unidad').val(r.data.unidad);
                $('#servicio').val(r.data.servicio===null?'0':r.data.servicio);
                $('#formaPago').val(r.data.formaPago===null?'0':r.data.formaPago);
                $('#motivo').val(r.data.motivo);

                if(r.data.cuentaAlcantarillado=='1')
                {
                    $('#r1').attr('checked',true);
                    $('#ca1').val(r.data.dCuentaAlcantarillado);
                }
                else
                {
                    $('#r2').attr('checked',true);
                    $('#ca2').val(r.data.dCuentaAlcantarillado);
                }
                
                $('#cuenta').val(r.data.cuenta===null?'0':r.data.cuenta);
                $('#periodicidad').val(r.data.periodicidad===null?'0':r.data.periodicidad);
                $('#otros1').val(r.data.otros1);
                $('#cuentaPunto').val(r.data.cuentaPunto===null?'0':r.data.cuentaPunto);

                $('#resultado').val(r.data.resultado=='1'?'Positivo':'Negativo');

                $('#motivo1').val(r.data.motivo1);
                $('#obs').val(r.data.obs);
                $('#summernote').summernote('code', r.data.obs);
                $('#atendido').val(r.data.atendido===null?'0':r.data.atendido);
            }
            // else
            // {
                
            // }
            $('#modDataFactibilidad').modal('show');
        }
    });
}
function dataAddFac()
{
    return {
        solnro:$('#solnroDataAdd').val(),
        codigo:$('#codigo').val(),
        tipoPropiedad:$('#tipoPropiedad').val(),
        tipoConstruccion:$('#tipoConstruccion').val(),
        otros:$('#otros').val(),
        material:$('#material').val(),
        numPisos:$('#numPisos').val(),
        numFamilias:$('#numFamilias').val(),
        numHabitantes:$('#numHabitantes').val(),
        act:$('#act').val(),
        tarifa:$('#tarifa').val(),
        unidad:$('#unidad').val(),
        servicio:$('#servicio').val(),
        formaPago:$('#formaPago').val(),
        motivo:$('#motivo').val(),
        cuentaAlcantarillado:$('input[name=cuentaAlcantarillado]').prop('checked')?'1':'0',
        dCuentaAlcantarillado:$('input[name=cuentaAlcantarillado]').prop('checked')?$('#ca1').val():$('#ca2').val(),
        cuenta:$('#cuenta').val(),
        periodicidad:$('#periodicidad').val(),
        otros1:$('#otros1').val(),
        cuentaPunto:$('#cuentaPunto').val(),
        resultado:$('#resultado').val()=='Positivo'?'1':'0',
        motivo1:$('#motivo1').val(),
        // obs:$('#obs').val(),
        obs: $('#summernote').summernote('code'),
        atendido:$('#atendido').val(),
    }
}
function saveDataFac()
{
    if($('#formValRegAddData').valid()==false)
        return;
    jQuery.ajax(
    { 
        url: "{{url('factibilidad/saveDataFac')}}",
        data: dataAddFac(),
        method: 'get',
        success: function(r){
            construirTabla();
            fillRegistros();
            $('#modDataFactibilidad').modal('hide');
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