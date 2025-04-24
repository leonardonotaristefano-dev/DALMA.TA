<x-layout>
    <div class="container-fluid">
        <div class="row heightCustom justify-content-center align-item-center text-center py-3">
            <div class="col-12">
                <h1 class="display-5 title_m">Risultati per la ricerca: <br> <span class="fw-bold title_m">{{$query}}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5 heightCustom mx-5">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center">Nessun articolo corrisponde alla tua ricerca</h3>
            </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>