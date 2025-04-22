<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="p-5 title_m">Registrati</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label">Nome Utente</label>
                      <input type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror" id="name" name="name">
                      @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Indirizzo Email</label>
                      <input type="email" class="form-control bg-dark text-white" id="email" aria-describedby="emailHelp" name="email">
                      @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control bg-dark text-white" id="password" name="password">
                      @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Conferma Password</label>
                      <input type="password" class="form-control bg-dark text-white" id="password_confirmation" name="password_confirmation">
                      @error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>