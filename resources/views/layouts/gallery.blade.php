<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="@falecomoantonio" />

        <title>Rei das Vendas</title>

        <!-- Lato Font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

        <!-- Stylesheet -->
        <link href="{{ url("assets/css/gallery-materialize.min.css") }}" rel="stylesheet" />

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <style type="text/css">
            .parallax-container {
                min-height: 380px;
                line-height: 0;
                height: auto;
                color: rgba(255,255,255,.9);
            }
            .parallax-container .section {
                width: 100%;
            }

            @media only screen and (max-width : 992px) {
                .parallax-container .section {
                    position: absolute;
                    top: 40%;
                }
                #index-banner .section {
                    top: 10%;
                }
            }

            @media only screen and (max-width : 600px) {
                #index-banner .section {
                    top: 0;
                }
            }
        </style>
    </head>
    <body>

    <div id="index-banner" class="parallax-container">
        <div class="parallax">
            <img height="230" src="{{ getSuperBanner() }}" />
        </div>
    </div>

    <!-- Navbar and Header -->
    <nav class="nav-extended">
        <!-- Fixed Masonry Filters -->
        <div class="categories-wrapper  yellow accent-2">
            <div class="categories-container">
                <ul class="categories container">
                    <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
                    @foreach($categories as $cat)
                    <li><a class="grey-text text-darken-3" title="{{ $cat->description }}" href="#{{ \Illuminate\Support\Str::slug($cat->name,'_') }}">{{ ucfirst($cat->name) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <ul class="sidenav" id="nav-mobile">
        <li class="active"><a href="index.html"><i class="material-icons">camera</i>Gallery</a></li>
        <li><a href="index-dark.html"><i class="material-icons">brightness_3</i>Dark Theme</a></li>
        <li><a href="blog.html"><i class="material-icons">edit</i>Blog</a></li>
        <li><a href="docs.html"><i class="material-icons">school</i>Docs</a></li>
        <li><a href="full-header.html"><i class="material-icons">fullscreen</i>Fullscreen Header</a></li>
        <li><a href="horizontal.html"><i class="material-icons">swap_horiz</i>Horizontal Style</a></li>
        <li><a href="no-image.html"><i class="material-icons">texture</i>No Image Expand</a></li>
    </ul>

        @if(1>2)
        <nav class="nav-extended">
            <div class="nav-background" style="opacity:1;height: 300px;">
                <div class="pattern active" style="background-image: url({{ url("assets/images/banner.png") }});background-repeat: no-repeat;background-size:contain;"></div>
            </div>

            <div class="nav-wrapper container">
                <a href="index.html" class="brand-logo grey-text text-darken-3"><i class="material-icons">camera</i>Rei das Vendas</a>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="active"><a class="grey-text text-darken-3" href="index.html">Gallery</a></li>
                    <li><a class="grey-text text-darken-3" href="index-dark.html">Dark Theme</a></li>
                    <li><a class="grey-text text-darken-3" href="blog.html">Blog</a></li>
                    <li><a class="grey-text text-darken-3" href="docs.html">Docs</a></li>
                    <li><a class="grey-text text-darken-3" class='dropdown-trigger' href='#' data-target='feature-dropdown'>Features<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <!-- Dropdown Structure -->
                <ul id='feature-dropdown' class='dropdown-content'>
                    <li><a class="grey-text text-darken-3" href="full-header.html">Fullscreen Header</a></li>
                    <li><a class="grey-text text-darken-3" href="horizontal.html">Horizontal Style</a></li>
                    <li><a class="grey-text text-darken-3" href="no-image.html">No Image Expand</a></li>
                </ul>

                <div class="nav-header center">
                    <h1  class="grey-text text-darken-3"> &nbsp; </h1>
                    <div class="tagline grey-text text-darken-3">&nbsp;</div>
                </div>
            </div>

            <!-- Fixed Masonry Filters -->
            <div class="categories-wrapper yellow accent-2">
                <div class="categories-container">
                    <ul class="categories container">
                        <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
                        @foreach($categories as $cat)
                            <li><a class="grey-text text-darken-3" title="{{ $cat->description }}" href="#{{ \Illuminate\Support\Str::slug($cat->name,'_') }}">{{ ucfirst($cat->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <div id="portfolio" class="section gray">
            <div class="container">
                <div class="gallery row">
                    @if($offers->count()>0)
                        @foreach($offers as $offer)
                            <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter {{ \Illuminate\Support\Str::slug($offer->category->name,'_') }}">
                                <div class="gallery-curve-wrapper">
                                    <a class="gallery-cover gray">
                                        <img class="responsive-img" src="{{ url("storage/offers/{$offer->banner}") }}?0" alt="placeholder">
                                    </a>
                                    <div class="gallery-header">
                                        <p>
                                            <span><h5 class="center-align">{{ $offer->title }}</h5></span>
                                        </p>
                                        <p class="center-align">
                                            <span><a href="{{ $offer->link }}" target="_blank" class="waves-effect btn-small waves-light btn amber accent-4">Comprar</a></span>
                                        </p>
                                    </div>
                                    <div class="gallery-body">
                                        <div class="title-wrapper">
                                            <h3>{{ $offer->title }}</h3>
                                            <span class="price">R$ {{ $offer->price}}</span>
                                        </div>
                                        <p class="description">
                                            {!! $offer->content !!}
                                        </p>

                                        <div class="carousel-wrapper">
                                            <div class="carousel">
                                                @foreach($offer->gallery as $key => $g)
                                                    <a class="carousel-item" href="#{{ getNumberName($key+1)  }}!"><img src="{{ url("storage/gallery/{$g}") }}"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gallery-action">
                                        <a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>Ainda não publicamos nenhuma oferta!</h4>
                    @endif
                </div>
            </div>
        </div>

        <footer class="page-footer blue-grey darken-2">
            <div class="container">
                <div class="row">
                    <div class="col l5 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l4 s12">
                        <h5 class="white-text">Instagram</h5>
                        <div id="instafeed"></div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright blue-grey darken-4">
                <div class="container ">
                    Desenvolvido por <a class="brown-text text-lighten-3" href="{{ url('login') }}">Antonio José</a>
                </div>
            </div>
        </footer>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>

        <!-- Core Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="{{ url("assets/js/imagesloaded.pkgd.min.js") }}"></script>
        <script src="{{ url("assets/js/masonry.pkgd.min.js") }}"></script>
        <script src="{{ url("assets/js/materialize.min.js") }}"></script>
        <script src="{{ url("assets/js/color-thief.min.js") }}"></script>
        <script src="{{ url("assets/js/galleryExpand.js") }}"></script>
        <script src="{{ url("assets/js/instafeed.min.js") }}"></script>
        <script src="{{ url("assets/js/init.js") }}"></script>
        <script src="{{ url("assets/js/instagram.js") }}"></script>
    </body>
</html>
