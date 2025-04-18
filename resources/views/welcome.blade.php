<x-layout>
    <div class="container-fluid text-center">
        <div class="row vh-100 justify-content-center align-item-center">
            <div class="col-12">
                <h1 class="display-1">Presto.it</h1>
                <div class="my-3">
                    @auth
                    <a href="{{route('create.article')}}" class="btn btn-dark">Pubblica un articolo</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>