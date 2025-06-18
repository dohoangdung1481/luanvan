@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0 mt-5">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        {{-- Logo giả lập --}}
                        <div class="mb-2">
                            <img src="{{ asset('img/logolv.png') }}" alt="Logo" width="160" class="img-fluid">
                        </div>
                        <h4 class="fw-bold">Đăng nhập hệ thống</h4>
                    </div>

                    {{-- Session Status --}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">Ghi nhớ đăng nhập</label>
                        </div>

                        {{-- Submit + Forgot --}}
                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                                </a>
                            @endif
                            <button type="submit" class="btn btn-primary px-4">
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Optional register link --}}
            <div class="text-center mt-3">
                <span class="text-muted">Chưa có tài khoản?</span>
                <a href="{{ route('register') }}" class="text-decoration-none">Đăng ký</a>
            </div>
        </div>
    </div>
</div>
@endsection