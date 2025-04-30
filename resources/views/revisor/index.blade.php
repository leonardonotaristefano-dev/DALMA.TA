<x-layout>
    <div class="container-fluid pt-3">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="rounded shadow bg-body-secondary pt-1">
                    <h1 class="display-5 text-center pb-lg-2 title_m">Revisor dashboard</h1>
                </div>
            </div>
        </div>
        
        @if (session()->has('message'))
        <div class="row justify-content-center"> 
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{session('message')}}
            </div>
        </div>         
        @endif
        
        @if ($article_to_check)
        @if ($article_to_check->images->count() > 0)
        <div class="row d-flex justify-content-center align-items-center mt-5"> 
            @foreach ($article_to_check->images as $key => $image)
            {{-- <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{$image->getUrl(300, 300)}}" class="revisorImage img-fluid rounded shadow" alt="Immagine {{$key +1}} dell'articolo {{ $article_to_check->title }}">
            </div> --}}
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $image->getUrl(300, 300) }}"
                            class="img-fluid rounded-start"
                            alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                        </div>
                        <div class="col-md-8 ps-3">
                            <div class="card-body">
                                <h5 class="">Ratings</h5>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <div class="text-center mx-auto {{ $image->adult }}">
                                        </div>
                                    </div>
                                    <div class="col-10">adult</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <div class=" text-center mx-auto {{ $image->violence }}">
                                        </div>
                                    </div>
                                    <div class="col-10">violence</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <div class=" text-center mx-auto {{ $image->spoof }}">
                                        </div>
                                    </div>
                                    <div class="col-10">spoof</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <div class=" text-center mx-auto {{ $image->racy }}">
                                        </div>
                                    </div>
                                    <div class="col-10">racy</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <div class=" text-center mx-auto {{ $image->medical }}">
                                        </div>
                                    </div>
                                    <div class="col-10">medical</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row d-flex justify-content-center"> 
            @for ($i = 0; $i < 6; $i++)
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img src="https://picsum.photos/500?random={{$i}}" class="img-fluid rounded shadow" alt="Immagine segnaposto">
            </div>
            @endfor
        </div>
        @endif
        <div class="row justify-content-center align-items-center text-center mt-5">
            <div class="col-md-4 ps-lg-4 d-flex flex-column justify-content-center text-center align-items-center">
                <div class="d-flex flex-column justify-content-center text-center align-items-center mx-auto">
                    <h1 class="title_m">{{ $article_to_check->title }}</h1>
                    <h3>Autore: {{ $article_to_check->user->name }}</h3>
                    <h4>{{ $article_to_check->price }}€</h4>
                    <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                    <p class="h6">{{ $article_to_check->description }}</p>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mt-5 mb-5" id="revisorButtonsContainer">
                    <form action="{{route('reject', ['article' => $article_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button id="rejectButton" class="revisorButton btn py-2 px-5 fw-bold ms-2">Rifiuta articolo</button>
                    </form>
                    <form action="{{route('accept', ['article' => $article_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button id="acceptButton" class="revisorButton btn py-2 px-5 fw-bold ms-2">Accetta articolo</button>
                    </form>
                    @if ($last_article)
                    <form action="{{route('undo', ['article' => $last_article])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button id="undoButton" class="revisorButton btn py-2 px-5 fw-bold ms-2">Annulla revisione</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center heightCustom text-center">
            <div class="col-12">
                <h1 class="display-4 title_m">Non ci sono articoli da revisionare</h1>
                <a href="{{route('homepage')}}" class="mt-5 btn btn-success">Torna alla homepage</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>