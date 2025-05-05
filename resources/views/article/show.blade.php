<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center heightCustom">
            <div class="col-12">
                <h1 class="display-4 title_m">{{$article->title }}</h1>
            </div>
        </div>
        <article class="d-flex justify-content-center">
        <div class="row justify-content-center py-5 heightCustom">
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide shadow rounded">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{$image->getUrl(300, 300)}}" class="d-block w-100 rounded shadow" alt="Immagine {{$key +1}} dell'articolo '{{ $article->title }}'">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{__('ui.previous')}}</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{__('ui.next')}}</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/500" alt="Nessuna foto inserita dall'utente">
                @endif
            </div>
            <div class="col-12 col-md-6 mb-3 ps-4 lh-lg">
                <div>{{$article->created_at}}</div>
                <div class="d-flex flex-column justify-content-start h-75">
                    {{-- <h2 class="title_m text-start">{{$article->title}}</h2> --}}
                    <h2 class="fs-2">{{$article->title}}</h2>
                    <p class="fs-4">{{$article->description}}</p>
                    <h4 class="fw-bold">{{__('ui.price'). ": " .$article->price}} €</h4>
                </div>
            </div>
        </div>
    </article>
    </div>
</x-layout>