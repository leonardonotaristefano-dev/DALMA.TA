<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="p-5">Login</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                      <label for="email" class="form-label">Indirizzo Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>