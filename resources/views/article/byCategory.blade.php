<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center heightCustom">
            <div class="col-12 pt-4">
                <h1 class="display-2 title_m">Articoli della categoria <span class="fst-italic title_m">{{$category->name}}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5 heightCustom">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="text-center">Non sono ancora stati creati articoli per questa categoria!</h3>
                    @auth
                    <a href="{{ route('create.article') }}" class="btn btn-dark my-5">Pubblica un articolo</a>
                    @endauth
                </div>    
            @endforelse
        </div>
    </div>
</x-layout>