@extends('layouts.main')
@section('content')
    <div class="container mt-5 py-5">
        <div class="login">
            <h1>Login</h1>
            <div class="card" style="width: 50%">
                <div class="card-body">
                    <form role="form" class="php-email-form"  action="{{ url('login/proses') }}" method="post">
                        @csrf
                        <div class="form-group">
                            @if (session('status'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>{{ session('status') }}</strong>
                                </div>
                            @endif
                            <h6 class="mb-4">
                                @error('pesan')
                                    <p class="text-center small">{{ $message }}</p>
                                @enderror
                            </h6>
                            <label class="form-label" for="inputEmail">Email</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                id="inputEmail" placeholder="Your Email">
                            @error('email')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="form-label" for="InputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword"
                                placeholder="Password">
                            @error('password')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-start mt-2"><button type="submit" class="btn btn-block btn-primary"> Login
                            </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
