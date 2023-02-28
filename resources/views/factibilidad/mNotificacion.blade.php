<div class="modal fade" id="modNotificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-comment"></i> Notificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="callout callout-info col-lg-12 contTarjetas">
                    <div class="row">
                        <div class="col-lg-10">
                            <h5><i class="fa fa-person"></i> Titular: <span class="notNombreTitular"></span></h5>
                            <p><i class="fa fa-phone"></i> Telefono <span class="notTelefono"></span></p>
                        </div>
                        <div class="col-lg-2 text-center align-middle justify-content-center">
                            <i class="fa-regular fa-comment text-success iconNotTelefono"></i>
                        </div>
                    </div>
                </div>
                <div class="callout callout-info col-lg-12 contTarjetas">
                    <div class="row">
                        <div class="col-lg-10">
                            <h5><i class="fa fa-person"></i> Titular: <span class="notNombreTitular"></span></h5>
                            <p><i class="fa fa-phone"></i> Telefono Alternativo <span class="notAlternativo"></span></p>
                        </div>
                        <div class="col-lg-2 text-center align-middle justify-content-center">
                            <i class="fa-regular fa-comment text-success iconNotAlternativo"></i>
                        </div>
                    </div>
                </div>
                <div class="callout callout-info col-lg-12 contTarjetas">
                    <div class="row">
                        <div class="col-lg-10">
                            <h5><i class="fa fa-person"></i> Tecnico: <span class="notNombreTecnico"></span></h5>
                            <p><i class="fa fa-phone"></i> Telefono <span class="notTecnico"></span></p>
                        </div>
                        <div class="col-lg-2 text-center align-middle justify-content-center">
                            <i class="fa-regular fa-comment text-success iconNotTecnico"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success enviarNotificacion"><i class="fa-solid fa-comment"></i> Notificar</button>
            </div>
        </div>
    </div>
</div>
<script>
    var fechaFactibilidad='';
    var fecha = '';
    function sendNotificaciones(element)
    {
        $('#modNotificacion').modal('show');
        jQuery.ajax(
        { 
            url: "{{url('notificacion/enviarFactibilidad')}}",
            data: {idFac:$(element).attr('data-idFac')},
            method: 'get',
            success: function(r){
                fechaFactibilidad=r.fechaFactibilidad;
                $('.notNombreTitular').html(r.solicitud.nombreTit);
                if(r.solicitud.telefono!==null && r.solicitud.telefono!='')
                {   $('.notTelefono').html(r.solicitud.telefono);}
                else
                {   $('.notTelefono').parent().parent().parent().parent().css('display','none');}
                if(r.solicitud.telefonoAlternativo!==null && r.solicitud.telefonoAlternativo!='')
                {   $('.notAlternativo').html(r.solicitud.telefonoAlternativo);}
                else
                {   $('.notAlternativo').parent().parent().parent().parent().css('display','none');}

                $('.notNombreTecnico').html(r.tecnico.nombre+' '+r.tecnico.apellido);
                if(r.tecnico.celular!==null && r.tecnico.celular!='')
                {   $('.notTecnico').html(r.tecnico.celular);}
                else
                {   $('.notTecnico').parent().parent().parent().parent().css('display','none');}

                $('#modNotificacion').modal('show');
            }
        });
    }
    $('.enviarNotificacion').on('click',function(){
        enviarNotificacion();
    });
    function enviarNotificacion()
    {
        fechaFactibilidad = new Date(fechaFactibilidad);
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        fecha = fechaFactibilidad.toLocaleDateString('es', opciones);
        if($('.notTelefono').html()!==null && 
            $('.notTelefono').html()!='' && 
            $('.notTelefono').html()!==undefined)
        {
            notificarWasap($('.notTelefono').html(),$('.notNombreTitular').html(),fecha,'iconNotTelefono');
        }
        if($('.notAlternativo').html()!==null && 
            $('.notAlternativo').html()!='' && 
            $('.notAlternativo').html()!==undefined)
        {
            notificarWasap($('.notAlternativo').html(),$('.notNombreTitular').html(),fecha,'iconNotAlternativo');
        }
        if($('.notTecnico').html()!==null && 
            $('.notTecnico').html()!='' && 
            $('.notTecnico').html()!==undefined)
        {
            notificarWasap($('.notTecnico').html(),$('.notNombreTecnico').html(),fecha,'iconNotTecnico');
        }
        $('.enviarNotificacion').css('display','none');
        // alert(fechaFactibilidad);
    }
    function notificarWasap(tel,nombre,fecha,icon)
    {
        let nombreEnviar= '*'+nombre+'*';
        let fechaEnviar= 'de *FACTIBILIDAD* que se realizara el *'+fecha+'*';

        var data = { 
            "messaging_product": "whatsapp", 
            "to": tel, 
            "type": "template", 
            "template": 
            {   "name": "enviar_informacion", 
                "language": 
                {   "code": "es" },
                "components": 
                [
                    {
                        "type": "body",
                        "parameters": [
                            {   "type": "text",
                                "text": nombreEnviar
                            },
                            {   "type": "text",
                                "text": fechaEnviar
                            },
                        ]
                    },
                ]
            } 
        }
        jQuery.ajax(
        { 
            url: "https://graph.facebook.com/v15.0/103259702672983/messages",
            contentType : 'application/json',
            headers: {'Authorization': 'Bearer EAALrwdMNvzwBAHb25WJ8Y4p7ji76SurZBD827sD6MZAlXAjaGcQXZBHZCIkTvtq9IZBpUlqRMKoA4uFLyUN5ZATij5KSAhMqVPIogUZC7dJtZCKx8rcsHOFgQzwWZC3zbrhsZAaI5IgxXFKD7i2l8s7lGJNUph43ISw3l0BmZCh9sR6DFmw2iGBmhJm9UHeacZCRs06QDvq6qIvk3QZDZD'},
            data: data,
            method: 'post',
            success: function(r){
                console.log(r);
                $('.'+icon).removeClass('fa-regular fa-comment');
                $('.'+icon).addClass('fa-solid fa-comment');
            },
            error : function(xhr, status) {
                console.log(xhr);
                console.log(status);
                alert('Disculpe, existió un problema');
            },
        });
    }
    $("#modNotificacion").on("hidden.bs.modal", function () 
    {
        $('.contTarjetas').css('display','block');
        $('.iconNotTecnico,.iconNotAlternativo,.iconNotTelefono').removeClass('fa-solid fa-comment');
        $('.iconNotTecnico,.iconNotAlternativo,.iconNotTelefono').addClass('fa-regular fa-comment');
        $('.enviarNotificacion').css('display','block');
    });
</script>