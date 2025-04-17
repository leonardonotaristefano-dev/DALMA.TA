<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="p-5">Registrati</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label">Nome Utente</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Indirizzo Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Conferma Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>