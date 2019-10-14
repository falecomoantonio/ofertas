<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="@falecomoantonio" />
        <meta name="description" content="Vitrine Virtual" />

        <title>{{ getValue('title_site') }}</title>

        <!-- Lato Font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

        <!-- Stylesheet -->
        <link href="{{ url("assets/css/gallery-materialize.min.css") }}" rel="stylesheet" />

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />


        <meta name="description" content="{{ getValue("seo_description") }}" />
        <meta itemprop="name" content="{{ getValue("seo_name") }}" />
        <meta itemprop="description" content="{{ getValue("seo_description") }}" />
        <meta itemprop="image" content="{{ url("storage/banner/" .  getValue('seo_imagem')) }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ getValue("og_title") }}">
        <meta name="twitter:description" content="{{ getValue("seo_description") }}">
        <meta name="twitter:image" content="{{ url("storage/banner/" .  getValue('seo_imagem')) }}">
        <link href="{{ url("storage/banner/" .  getValue('seo_imagem')) }}" rel="image_src" />
        <meta property="og:title" content="{{ getValue("og_title") }}" />
        <meta property="og:image" content="{{ url("storage/banner/" .  getValue('og_image')) }}" />
        <meta property="og:description" content="{{ getValue("seo_description") }}" />
        <meta property="og:site_name" content="{{ getValue('og_site_name') }}" />
        <meta property="article:tag" content="{{ getValue('article_tag') }}" />


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
                        @if($blog)
                        <li><a class="grey-text text-darken-3" href="{{ route("homepage") }}">Ofertas</a></li>
                        @else
                        <li><a class="grey-text text-darken-3" href="{{ route("blog") }}">Blog</a></li>
                            <li><a class="grey-text text-darken-3" href="{{ route("blog") }}">Ofertas do Dia</a></li>
                        <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
                        <li><a class="grey-text text-darken-3" href="#promo">Em Promoção</a></li>
                        @endif
                        @foreach($categories as $cat)
                        <li><a class="grey-text text-darken-3" title="{{ $cat->description }}" href="#{{ \Illuminate\Support\Str::slug($cat->name,'_') }}">{{ ucfirst($cat->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="nav-mobile">
            <li><a class="grey-text text-darken-3" href="{{ route("blog") }}>Blog</a></li>
            <li class="active"><a class="grey-text text-darken-3" href="#all">Tudo</a></li>
            <li class=""><a class="grey-text text-darken-3" href="#promo">Em Promoção</a></li>
            @foreach($categories as $cat)
                <li><a class="grey-text text-darken-3" title="{{ $cat->description }}" href="#{{ \Illuminate\Support\Str::slug($cat->name,'_') }}">{{ ucfirst($cat->name) }}</a></li>
            @endforeach
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ getValue("google_analytics") }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ getValue("google_analytics") }}');
        </script>


        @yield('SCRIPT')

        @component('components.whatsapp_button')
        @endcomponent

        @component('components.onesignal_widget')
        @endcomponent
    </body>
</html>
