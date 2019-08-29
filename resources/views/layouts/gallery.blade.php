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
    </head>

    <body>

        <!-- Navbar and Header -->
        <nav class="nav-extended yellow lighten-4">
            <div class="nav-background">
                <div class="pattern active" style="background-image: url('{{ getSuperBanner()->value }}');"></div>
            </div>

            <div class="nav-wrapper container">
                <a href="index.html" class="brand-logo grey-text text-darken-3"><i class="material-icons">camera</i>Gallery</a>
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
                    <h1  class="grey-text text-darken-3">REI DAS VENDAS</h1>
                    <div class="tagline grey-text text-darken-3">Ofertas do Dia</div>
                </div>
            </div>

            <!-- Fixed Masonry Filters -->
            <div class="categories-wrapper yellow accent-2">
                <div class="categories-container">
                    <ul class="categories container">
                        <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
                        @foreach($categories as $cat)
                        <li><a class="grey-text text-darken-3" href="#{{ \Illuminate\Support\Str::slug($cat->name,'_') }}">{{ ucfirst($cat->name) }}</a></li>
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

        <!-- Gallery -->
        <div id="portfolio" class="section gray">
            <div class="container">
                <div class="gallery row">
                @if($offers->count()>0)
                    @foreach($offers as $offer)
                    <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter {{ \Illuminate\Support\Str::slug($offer->category->name,'_') }}">
                        <div class="gallery-curve-wrapper">
                            <a class="gallery-cover gray">
                                <img class="responsive-img" src="{{ url("storage/offers/{$offer->gallery[0]}") }}?0" alt="placeholder">
                            </a>
                            <div class="gallery-header">
                                <span>{{ $offer->title }}</span>
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
                                        <a class="carousel-item" href="#{{ getNumberName($key)  }}!"><img src="{{ url("storage/offers/{$g}") }}"></a>
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
        </div><!-- /.container -->

        <footer class="page-footer blue-grey lighten-5">
            <div class="container">
                <div class="row">
                    <div class="col l4 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l4 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright  blue-grey lighten-3">
                <div class="container">
                    © {{ date('Y') }} Paulo Vitor - Rei das Vendas
                    <a class="grey-text text-lighten-4 right" href="{{ url('login') }}">Desenvolvido por @falecomoantonio</a>
                </div>
            </div>
        </footer>

        <!-- Core Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="{{ url("assets/js/imagesloaded.pkgd.min.js") }}"></script>
        <script src="{{ url("assets/js/masonry.pkgd.min.js") }}"></script>
        <script src="{{ url("assets/js/materialize.min.js") }}"></script>
        <script src="{{ url("assets/js/color-thief.min.js") }}"></script>
        <script src="{{ url("assets/js/galleryExpand.js") }}"></script>
        <script src="{{ url("assets/js/init.js") }}"></script>

    </body>
</html>
