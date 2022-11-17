@extends('layouts.app')
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-3">
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent">
                    <div class="container-fluid d-flex align-items-center">
                        <img alt="Image placeholder" class="card-img-top"
                            style="margin-left: auto; margin-right: auto; width: 220px; height: 80px"
                            src="{{ asset('asset/img/brand/logo-apjii-jatim-full.png') }}">
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-4">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-muted">Remember me</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary my-4">Log in</button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}" class="btn btn-primary my-4">Forgot
                                        password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="text-right">
                <a class="text-light"><small>Kebijakan Privasi</small></a>
                &emsp;
                <a class="text-light"><small>Persyaratan Layanan</small></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
