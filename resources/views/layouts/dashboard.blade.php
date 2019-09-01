<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url("assets/img/apple-icon.png") }}" />
        <link rel="icon" type="image/png" href="{{ url("assets/img/favicon.png") }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Rei das Vendas - Paínel Administrativo</title>
        <meta name="robots" content="noindex" />
        <meta name="googlebot" content="noindex">
        <meta name="googlebot-news" content="nosnippet">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="{{ url("assets/css/material-dashboard.css?v=2.1.1") }}" rel="stylesheet" />
        @yield('STYLE')
    </head>
    <body class="">

        <div class="wrapper ">
            <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ url("assets/img/sidebar-1.jpg") }}">
                <div class="logo">
                    <a href="{{ url("dashboard") }}" class="simple-text logo-normal">Rei das Vendas</a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("dashboard.start") }}">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("administrators.index") }}">
                                <i class="material-icons">account_circle</i>
                                <p>Administradores</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("offers.index") }}">
                                <i class="material-icons">redeem</i>
                                <p>Ofertas</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("categories.index") }}">
                                <i class="material-icons">view_list</i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("newsletters.index") }}">
                                <i class="material-icons">email</i>
                                <p>Newsletters</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route("settings.index") }}">
                                <i class="material-icons">settings</i>
                                <p>Configuração</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="#pablo">Dashboard</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        <a class="dropdown-item" href="{{ route("administrators.profile") }}">Perfil</a>
                                        <a class="dropdown-item" href="{{ route("settings.index") }}">Configurações</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" id="btnCloseSession" href="#">Encerrar</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        @if(session()->has('DASH_MSG_SUCCESS'))
                        <div class="alert alert-primary">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('DASH_MSG_SUCCESS') }}</span>
                        </div>
                        @endif
                        @if(session()->has('DASH_MSG_WARNING'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('DASH_MSG_WARNING') }}</span>
                        </div>
                        @endif
                        @if(session()->has('DASH_MSG_ERROR'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('DASH_MSG_ERROR') }}</span>
                        </div>
                        @endif
                        @if(session()->has('DASH_MSG_INFO'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('DASH_MSG_INFO') }}</span>
                        </div>
                        @endif

                        @yield('CONTENT')
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li><a href="#">Manutenção</a></li>
                                <li><a href="#">Limpar Cache</a></li>
                                <li><a href="#"> Ajuda</a></li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">
                            &copy; <span id="currentYear"></span>, Codificado por Antonio Jose.
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <script type="text/javascript" src="{{ url("assets/js/core/jquery.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/core/popper.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/core/bootstrap-material-design.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/perfect-scrollbar.jquery.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/moment.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/sweetalert2.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/jquery.validate.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/jquery.bootstrap-wizard.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/bootstrap-selectpicker.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/bootstrap-datetimepicker.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/jquery.dataTables.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/bootstrap-tagsinput.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/jasny-bootstrap.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/fullcalendar.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/nouislider.min.js") }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/arrive.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/chartist.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/plugins/bootstrap-notify.js") }}"></script>
        <script src="{{ url("assets/js/material-dashboard.js?v=2.1.1") }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $().ready(function() {
                    $sidebar = $('.sidebar');

                    $("#currentYear").html(new Date().getFullYear());


                    $('#btnCloseSession').click(function(){
                        Swal.fire({
                            title: 'Não vá embora agora',
                            text: "Encerrar sessão?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Encerrar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.value) {
                                $('#logout-form').submit();
                            }
                        });
                    });



                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                        }

                    }

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .active-color span').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                        }
                    });

                    $('.fixed-plugin .background-color .badge').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('background-color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });

                    $('.fixed-plugin .img-holder').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');


                        var new_image = $(this).find("img").attr('src');

                        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function() {
                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }

                        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function() {
                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                $full_page_background.fadeIn('fast');
                            });
                        }

                        if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                        }
                    });

                    $('.switch-sidebar-image input').change(function() {
                        $full_page_background = $('.full-page-background');

                        $input = $(this);

                        if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar_img_container.fadeIn('fast');
                                $sidebar.attr('data-image', '#');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page_background.fadeIn('fast');
                                $full_page.attr('data-image', '#');
                            }

                            background_image = true;
                        } else {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar.removeAttr('data-image');
                                $sidebar_img_container.fadeOut('fast');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page.removeAttr('data-image', '#');
                                $full_page_background.fadeOut('fast');
                            }

                            background_image = false;
                        }
                    });

                    $('.switch-sidebar-mini input').change(function() {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });
        </script>
        @yield('SCRIPT')
    </body>
</html>
