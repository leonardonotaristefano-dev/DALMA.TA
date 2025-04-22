<div class="card mx-auto shadow text-center mb-3">
    <img src="https://picsum.photos/200" class="card-img-top" alt="immagine dell'articolo {{ $article->title }}">
    <div class="card-body cardBody">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ $article->price }}€</h6>
        <a href="{{route('byCategory', ['category' => $article->category])}}" class="badge bg-info text-decoration-none">#{{ucfirst($article->category->name)}}</a>
        <div class="d-flex justify-content-evenly align-items-center">
            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Dettaglio</a>           
        </div>
    </div>
</div>
