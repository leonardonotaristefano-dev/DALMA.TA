<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50 py-5">
            {{session('errorMessage')}}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50 py-5">
            {{session('message')}}
        </div>
    @endif
    <div class="container-fluid text-center">
        <div class="row heightCustom justify-content-center align-item-center">
            <div class="col-12">
                <h1 class="display-1 my-5 title_m">Presto.it</h1>
                <div class="row justify-content-center align-items-center py-5 heightCustom mx-5">
                    @forelse ($articles as $article)
                        <div class="col-12 col-md-3">
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <div class="col-12">
                            <h3 class="text-center">Non sono ancora stati creati articoli</h3>
                        </div>
                    @endforelse
                </div>
                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Pubblica un articolo</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>
