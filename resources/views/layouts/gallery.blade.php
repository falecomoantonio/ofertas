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


        <meta name="description" content="Os melhores preços do Sertão Central você encontra aqui" />
        <meta itemprop="name" content="Ofertas do Rei das Vendas" />
        <meta itemprop="description" content="Os melhores preços do Sertão Central você encontra aqui">
        <meta itemprop="image" content="">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Ofertas do Rei das Vendas">
        <meta name="twitter:description" content="Os melhores preços do Sertão Central você encontra aqui">
        <meta name="twitter:image" content="">
        <link href="" rel="image_src" />
        <meta property="og:title" content="Ofertas do Rei das Vendas" />
        <meta property="og:image" content="" />
        <meta property="og:description" content="Os melhores preços do Sertão Central você encontra aqui" />
        <meta property="og:site_name" content="Ofertas do Rei das Vendas" />
        <meta property="article:tag" content="Ofertas, Celular, Smartphone, IPhone, Smarttv, perfume importado, perfume, natura, boticário, preço bom, barato" />


        @yield('STYLE')

    </head>
    <body>

        <header id="index-banner" class="parallax-container">
            <div class="parallax">
                <img height="230" src="{{ getSuperBanner() }}" />
            </div>
        </header>

        <!-- Navbar and Header -->
        <nav class="nav-extended">
            <!-- Fixed Masonry Filters -->
            <div class="categories-wrapper  yellow accent-2">
                <div class="categories-container">
                    <ul class="categories container">
                        <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
                        <li class="active"><a class="grey-text text-darken-3" href="#promo">Em Promoção</a></li>
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


        <div id="portfolio" class="section gray">
            <div class="container">
                @yield('CONTENT')
            </div>
        </div>

        @component('components.footer')
        @endcomponent

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
        @yield('SCRIPT')

        @component('components.whatsapp_button')
        @endcomponent

        @component('components.onesignal_widget')
        @endcomponent
    </body>
</html>
