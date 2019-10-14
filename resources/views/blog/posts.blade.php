@extends('layouts.gallery',['blog'=>true])
@section('STYLE')
    <link type="text/css" rel="stylesheet" href="{{ url("assets/css/onepage.css") }}" />
@endsection
@section('CONTENT')
    <div class="row">
        <div class="container-fluid">
            <a href="{{ getValue('whatsapp_group') }}" target="_blank">
                <img width="100%" src="{{ url("assets/images/bannerwpp.jpeg") }}" class="img-fluid" alt="" />
            </a>
        </div>
    </div>
    <div class="gallery row">
        @if($collection->count()>0)
            @foreach($collection as $entity)
                <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter {{ ($entity->promo ? 'promo' : \Illuminate\Support\Str::slug($entity->category->name,'_')) }}">

                    <div class="gallery-curve-wrapper">
                        @if($entity->promo)
                        <div class="ribbon"><span>PROMO</span></div>
                        @endif
                        <a class="gallery-cover gray">
                            <img class="responsive-img" src="{{ url("storage/offers/{$entity->banner}") }}?0" alt="placeholder">
                        </a>

                        <div class="gallery-header">
                            <p>
                                <span><h5 class="center-align">{{ $entity->title }}</h5></span>
                            </p>
                            <p class="text-center">
                                <span><h6 class="center-align" title="Consulte o Frete, preço válido até {{ $entity->created_at->addDays(1)->format('d/m/Y') }}">R$ {{ number_format($entity->price,2,',','.') }}</h6></span>
                            </p>
                            <p class="center-align">
                                <span><a href="{{ $entity->link }}" target="_blank" class="waves-effect btn-small waves-light btn green accent-4">Comprar</a></span>
                                <span><a href="https://api.whatsapp.com/send?phone=558899272210&text=Olá, gostaria de saber mais sobre o produto {{ $entity->id }} ( {{ $entity->bitly }} )" target="_blank" class="waves-effect btn-small waves-light btn amber accent-4">Perguntar</a></span>
                            </p>
                        </div>
                        <div class="gallery-body">
                            <div class="title-wrapper">
                                <h3>{{ $entity->title }}</h3>
                                <span class="price">R$ {{ number_format($entity->price,2,',','.') }}</span>
                            </div>
                            <p class="description">
                                {!! $entity->content !!}
                            </p>

                            <div class="carousel-wrapper">
                                <div class="carousel">
                                    @foreach($entity->gallery as $key => $g)
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
    <div class="row">
        <p class="text-center">
        @if($collection->count()>0)
            {!! $collection->links("components.paginate") !!}
        @endif
        </p>
    </div>
    <div class="row">
        <hr />
    </div>
    <div class="row">
        <p class="text-center">
            <h4>Nossos Clientes</h4>
        </p>
        <div class="col s12 m6 l6">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D961614460680214%26id%3D100004950065560&width=450&show_text=true&appId=1152217388213735&height=156" width="100%" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col s12 m6 l6">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fandre.rsfernandes%2Fposts%2F2808370342513260&width=450&show_text=true&appId=1152217388213735&height=156" width="100%" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col s12 m6 l6">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fauxy.alves%2Fposts%2F1373016219503412&width=450&show_text=true&appId=1152217388213735&height=156" width="100%" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col s12 m6 l6">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjardelyne.almeida%2Fposts%2F1972571706182593&width=450&show_text=true&appId=1152217388213735&height=137" width="100%" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
@endsection
@section('SCRIPT')
    <script type="text/javascript">
        $(function(){
            $('.carousel').carousel({duration:500});
        });
    </script>
@endsection
