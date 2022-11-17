@section('title', '| Event - Edit')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Edit Event') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home text-white"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('events.index') }}"
                                        class="text-white">{{ __('Event') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Event') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Edit Event') }}</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Event Name') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="name" placeholder="Event Name"
                                        type="text" value="{{ $event->name }}" required>
                                </div>
                                @error('name')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Date') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="date" placeholder="Date"
                                        type="date" value="{{ $event->date }}" required>
                                </div>
                                @error('date')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Location') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="location" placeholder="Location"
                                        type="text" value="{{ $event->location }}" required>
                                </div>
                                @error('location')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <a href="{{ route('events.index') }}" class="btn btn-default"
                                type="submit">{{ __('Back') }}</a>
                            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@endsection
