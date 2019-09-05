@extends('layouts.gallery')
@section('STYLE')
    <style type="text/css">
        .parallax-container {
            min-height: 280px;
            max-height: 300px;
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
@endsection
@section('CONTENT')
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
    <div class="row">
        <p class="text-center">
        @if($offers->count()>0)
            {!! $offers->links("components.paginate") !!}
        @endif
        </p>
    </div>
@endsection
@section('SCRIPT')
@endsection
