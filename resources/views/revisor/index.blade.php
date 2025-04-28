<x-layout>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-6">
                <div class="rounded shadow bg-body-secondary pt-1">
                    <h1 class="display-5 text-center pb-2 title_m">Revisor dashboard</h1>
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
                <div class="row d-flex justify-content-center"> 
                    @foreach ($article_to_check->images as $key => $image)
                        <div class="col-6 col-md-4 mb-4">
                            <img src="{{Storage::url($image->path)}}" class="img-fluid rounded shadow" alt="Immagine {{$key +1}} dell'articolo '{{ $article_to_check->title }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row d-flex justify-content-center"> 
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-md-4 mb-4 text-center">
                            <img src="https://picsum.photos/500?random={{$i}}" class="img-fluid rounded shadow" alt="Immagine segnaposto">
                        </div>
                    @endfor
                </div>
            @endif
                    <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                        <div>
                            <h1 class="title_m">{{ $article_to_check->title }}</h1>
                            <h3>Autore: {{ $article_to_check->user->name }}</h3>
                            <h4>{{ $article_to_check->price }}€</h4>
                            <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                            <p class="h6">{{ $article_to_check->description }}</p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around">
                            <form action="{{route('reject', ['article' => $article_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta articolo</button>
                            </form>
                            <form action="{{route('accept', ['article' => $article_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success py-2 px-5 fw-bold">Accetta articolo</button>
                            </form>
                            @if ($last_article)
                                <form action="{{route('undo', ['article' => $last_article])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning py-2 px-5 fw-bold">Annulla ultima revisione</button>
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