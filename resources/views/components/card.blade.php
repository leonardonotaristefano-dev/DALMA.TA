<div class="card cardBackground mx-auto shadow text-center mb-3 ">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200?random=' . $article->id }}" class="cardTopImg" alt="immagine dell'articolo {{ $article->title }}">
    <div class="card-body cardBody">
        <h4 id="cardTitle" class="card-title title_m">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ $article->price }}€</h6>        
        <div class="d-flex justify-content-evenly align-items-center">
            <a href="{{route('article.show', compact('article'))}}" class="btn btn-outline-info btn-rounded">Dettaglio</a>           
        </div>
    </div>
    <a href="{{route('byCategory', ['category' => $article->category])}}" class="badgeArticle text-end badge text-decoration-none">#{{ucfirst($article->category->name)}}</a>
</div>
