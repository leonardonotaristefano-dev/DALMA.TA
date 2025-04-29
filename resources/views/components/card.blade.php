<div class="card mx-auto shadow text-center mb-3">
    <img src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200?random=' . $article->id }}" class="cardTopImg" alt="immagine dell'articolo {{ $article->title }}">
    <div class="card-body cardBody">
        <h4 class="card-title title_m">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ $article->price }}€</h6>
        <a href="{{route('byCategory', ['category' => $article->category])}}" class="badge bg-info text-decoration-none">#{{ucfirst($article->category->name)}}</a>
        <div class="d-flex justify-content-evenly align-items-center">
            <a href="{{route('article.show', compact('article'))}}" class="btn buttonOpacity">Dettaglio</a>           
        </div>
    </div>
</div>
