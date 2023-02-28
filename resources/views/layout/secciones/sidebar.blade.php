<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(-45deg,#212c50 50%,#20273e);">
    <a href="#" class="brand-link">
        <img src="{{asset('img/logo.jpg')}}" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light ml-5">EMUSAP</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block text-center ocultarTextIzqNameUser nameSidebar" title="nombre apellido">
                    {{Session::get('user')->nombre}} {{Session::get('user')->apellido}}
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu">
                <!-- <li class="nav-item smPms"> submenu publico de solo lectura-->
                <li class="nav-item">
                    <a href="{{url('home/home')}}" class="nav-link bg-light sba1">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p data-npms="dashboard">Dashboard</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{url('user/user')}}" class="nav-link bg-secondary sba2">
                        <i class="fas fa-users nav-icon"></i>
                        <p data-npms="dashboard">----{{Session::get('idCargo')}}--{{Session::get('user')->cargoUser}}</p>
                    </a>
                </li> -->
                @if(Session::get('idCargo')=='2')
                <li class="nav-item">
                    <a href="{{url('user/user')}}" class="nav-link bg-secondary sba2">
                        <i class="fas fa-users nav-icon"></i>
                        <p data-npms="dashboard">GESTION DE USUARIOS</p>
                    </a>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || Session::get('user')->cargoUser=='Gerencia de mantenimiento')
                <li class="nav-item has-treeview smPms sbd1">
                    <a href="#" class="nav-link bg-secondary">
                        <i class="nav-icon fa fa-gears"></i>
                        <p>MANTENIMIENTO<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('idCargo')=='2')
                        <li class="nav-item">
                            <a href="{{url('persona/persona')}}" class="nav-link sba3">
                                <i class="fa fa-person nav-icon"></i>
                                <p data-npms="persona">Personal</p>
                            </a>
                        </li>
                        @endif
                        @if(Session::get('idCargo')=='2' || Session::get('user')->cargoUser=='Gerencia de mantenimiento')
                        <li class="nav-item">
                            <a href="{{url('cp/cp')}}" class="nav-link sba4">
                                <i class="fa-solid fa-sack-dollar nav-icon"></i>
                                <p data-npms="persona">Costos colaterales</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || 
                    Session::get('user')->cargoUser=='Cat. usuario admin' || 
                    Session::get('user')->cargoUser=='Cat. usuario atencion')
                <li class="nav-item has-treeview smPms sbd2">
                    <a href="#" class="nav-link bg-secondary">
                        <i class="nav-icon fa fa-file"></i>
                        <p>GENERAR<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('idCargo')=='2' || 
                            Session::get('user')->cargoUser=='Cat. usuario admin' || 
                            Session::get('user')->cargoUser=='Cat. usuario atencion')
                        <li class="nav-item">
                            <a href="{{url('numero/numero')}}" class="nav-link sba5">
                                <i class="fa fa-file-word nav-icon"></i>
                                <p data-npms="persona" style="font-size: 0.91rem !important;">Numero de documentos</p>
                            </a>
                        </li>
                        @endif
                        @if(Session::get('idCargo')=='2' || 
                            Session::get('user')->cargoUser=='Cat. usuario admin' || 
                            Session::get('user')->cargoUser=='Cat. usuario atencion')
                        <li class="nav-item">
                            <a href="{{url('doc/doc')}}" class="nav-link sba6">
                                <i class="fa fa-file-word nav-icon"></i>
                                <p data-npms="persona">Anexo N.2 (Contrato)</p>
                            </a>
                        </li>
                        @endif
                        @if(Session::get('idCargo')=='2' || 
                            Session::get('user')->cargoUser=='Cat. usuario admin' || 
                            Session::get('user')->cargoUser=='Cat. usuario atencion')
                        <li class="nav-item">
                            <a href="{{url('solicitud/solicitud')}}" class="nav-link sba7">
                                <i class="fa fa-file-word nav-icon"></i>
                                <p data-npms="persona">Anexo N.1 (Solicitud)</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || 
                    Session::get('user')->cargoUser=='Cat. usuario admin' || 
                    Session::get('user')->cargoUser=='Cat. usuario atencion')
                <li class="nav-item">
                    <a href="{{url('factibilidad/factibilidad')}}" class="nav-link bg-secondary sba8">
                        <i class="nav-icon fa-solid fa-business-time"></i>
                        <p>FACTIBILIDAD</p>
                    </a>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || Session::get('user')->cargoUser=='Gerencia de mantenimiento')
                <li class="nav-item">
                    <a href="{{url('medicion/medicion')}}" class="nav-link bg-secondary sba9">
                        <i class="nav-icon fa-solid fa-ruler"></i>
                        <p>MEDICION</p>
                    </a>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || Session::get('user')->cargoUser=='Gerencia de mantenimiento')
                <li class="nav-item has-treeview smPms sbd3">
                    <a href="#" class="nav-link bg-secondary">
                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                        <p>PRESUPUESTO<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('plantilla/plantilla')}}" class="nav-link sba10">
                                <i class="fa-solid fa-vr-cardboard nav-icon"></i>
                                <p data-npms="persona">Plantilla presupuestal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('presupuesto/listoPresupuesto')}}" class="nav-link sba11">
                                <i class="fa-solid fa-list nav-icon"></i>
                                <p data-npms="persona">Listos para presupuesto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link sba12" onclick="showCuadroPresupuestal();">
                                <i class="fa fa-file-circle-plus nav-icon"></i>
                                <p data-npms="persona">Registrar presupuesto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('presupuesto/presupuesto')}}" class="nav-link sba13">
                                <i class="fa fa-list nav-icon"></i>
                                <p data-npms="persona">Lista de presupuestos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Session::get('idCargo')=='2' || 
                    Session::get('user')->cargoUser=='Cat. usuario admin' || 
                    Session::get('user')->cargoUser=='Cat. usuario atencion')
                <li class="nav-item">
                    <a href="{{url('reporte/reporte')}}" class="nav-link bg-secondary sba14">
                        <i class="nav-icon fa-solid fa-clipboard"></i>
                        <p>REPORTES</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link bg-secondary sba15 cerrarSesion">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>Cerrar sesion</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<script>
    $('.cerrarSesion').on('click',function(){
        $('.overlayPagina').css("display","none");
        window.location.href = "{{url('home/logout')}}";
    });
    function showCuadroPresupuestal()
    {
        localStorage.setItem("solnro",0);
        window.location.href = "{{url('presupuesto/cuadroPresupuestal')}}";
    }
    smPms();
    var content=false;
    function smPms()
    {
        $('.smPms').each(function(){
            // if($(this).prop('checked'))
            // {
            //     listRol.push($(this).val());
            //     console.log($(this).val());
            // }
            // console.log('nombre de los submenu->'+$(this).find('p').html());

            $(this).find('p').each(function(){
                // console.log($(this).html());
                if(localStorage.getItem("pms").includes($(this).attr('data-npms')))
                {
                    // console.log('si incluye-------------------');
                    $(this).parent().parent().css('display','block');
                    content=true;
                }
                else
                {
                    $(this).parent().parent().css('display','none');
                }
            });
            if(content)
            {
                $(this).css('display',content?'block':'none');
                content=false;
            }
            else
            {
                $(this).remove();
            }
            
            // $(this).css('display',content?'block':'none');
            // content=false;
            console.log('-----------------');
        });
    }
    // alert(JSON.parse(localStorage.getItem("userStart")).id);
    if(JSON.parse(localStorage.getItem("userStart")).id!=1)
    {
        $('.onlyAdmin').remove();
    }
    var userSidebar = JSON.parse(localStorage.getItem("userStart"));
    // {{Session::get('user')->cargoUser}}
    // $('.nameSidebar').html(userSidebar.nombre+ ' '+userSidebar.apellido);
    $('.sidebarPermisosAdmin').remove();
</script>