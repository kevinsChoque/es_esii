<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_tokenAuth" content="test" />
    <!-- <meta name="_token" content="{{csrf_token()}}" /> -->
    <title>EMUSAP</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/all/all.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('plugins/adminlte/fontawesome-free/css/all.min.css')}}"> -->
    <!-- Theme style ADMIN LTE CSS -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/adminlte/dist/css/adminlte.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style type="text/css">
    	body{
    		display: flex;
            flex-basis: 100%;
            min-height: 100vh;
            min-height: calc(var(--vh, 1vh) * 100);
            width: 100%;
            font-family: Manrope,sans-serif;
            background: linear-gradient(-45deg,#405189 50%,#0ab39c);
    	}
    </style>
</head>
<body class="login-page" style="min-height: 466px;">
    <div class="overlayPagina">
        <!-- <h1 class="msjOverlayPagina"> -->
            <!-- <i class="fas fa-sync-alt"></i> Cargando . . . -->
            <!-- <img src="{{asset('img/imgAdicionales/spinerLetter.svg')}}" class="w-100"> -->
            <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
                <div class="ldio-onxyanc9oyh">
                    <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
                </div>
            </div>
        <!-- </h1> -->
    </div>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h4"><b>EMUSAP </b>Abancay</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar sesion</p>
                <form action="{{url('dashboard')}}" method="post" id="formLogin">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" form="formLogin"><i class="fa fa-arrow-right"></i> Ingresar</button>
                    </div>
                </div>
                @csrf
                </form>
                <div class="social-auth-links text-center mt-2 mb-3 d-none">
                    <a href="#" class="btn btn-block btn-primary"><i class="fab fa-facebook mr-2"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-danger"><i class="fab fa-google-plus mr-2"></i> Sign in using Google+</a>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery -->
    <!-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/adminlte/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App js-->
    <script src="{{asset('plugins/adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/helper.js')}}"></script>
<script>
var __API__='{{ env('API') }}';
$(document).ready( function () {
    $('.overlayPagina').css("display","none");
} );
$('.login').on('click',function(event){
    event.preventDefault();
    $('.overlayPagina').css("display","inherit");
    jQuery.ajax(
    { 
        url: __API__+"auth/login",
        data:{usuario:$('#usuario').val(),password:$('#contrasena').val()},
        method: 'post',
        success: function(result){
            console.log(result);
            if(result.estado)
            {
                $('meta[name=_tokenAuth]').attr("content",'bearer '+result.access_token);
                localStorage.setItem("token",'bearer '+result.access_token);
                localStorage.setItem("__token__",result.access_token);
                $('#keys').val('bearer '+result.access_token);
                $('#u').val(JSON.stringify(result.user));
                localStorage.setItem("pms",JSON.stringify(result.pms));
                localStorage.setItem("userStart",JSON.stringify(result.user));
                localStorage.setItem("inspector",JSON.stringify(result.inspector));
                
                // $('#start').submit();
                window.location.href = "{{url('home/home')}}";
            }
            else
            {
                msjRee(result);
                $('.overlayPagina').css("display","none");
            }

            // window.location.href = "{{url('home')}}/bearer "+result.access_token;
        }
    });
})
</script>
@if(Session::has('globalMessage'))
<script>

$(function()
{
    @if(Session::get('type')=='error')
        @foreach(explode('__BREAKLINE__', Session::get('globalMessage')) as $value)
            @if(trim($value)!='')
                new PNotify(
                {
                    title : 'No se pudo proceder',
                    text : '{{$value}}',
                    type : '{{Session::get('type')}}'
                });
            @endif
        @endforeach
    @else
        Swal.fire(
        {
            title : '{{Session::get('type')=='success' ? 'Correcto' : 'Alerta'}}',
            text : '{!!Session::get('globalMessage')!!}',
            icon : '{{Session::get('type')=='success' ? 'success' : 'warning'}}',
            timer: {{Session::get('type')=='success' ? '2000' : '60000'}}
        });
    @endif
});
</script>
@endif
</body>
</html>
