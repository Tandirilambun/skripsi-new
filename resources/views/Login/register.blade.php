@extends('main.index')
@section('index')
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-5">
            <main class="form-register p-4 my-5">
                <form action="/register" method="POST">
                    @csrf
                    <img class="mb-4" src="{{ asset('img/logo/Logo_SN_noText.png') }}" alt="" width="100"
                        height="100">
                    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>

                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Name" value="{{old('name')}}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <div class="invalid-feedback mb-2"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{old('username')}}">
                        <label for="floatingInput">Username</label>
                        @error('username')
                            <div class="invalid-feedback mb-2"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="email@example.com" value="{{old('email')}}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback mb-2"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback mb-2"> {{ $message }} </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-5" type="submit">Register</button>

                    <small class="d-block text-center mt-3">Already have account <a href="/login">Login!</a></small>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
                </form>
            </main>
        </div>
    </div>
@endsection
