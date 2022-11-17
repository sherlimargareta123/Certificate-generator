@section('title', '| Participant - Edit')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Edit Participant') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home text-white"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('participants.index') }}"
                                        class="text-white">{{ __('Participant') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Participant') }}</li>
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
                        <h3 class="mb-0">{{ __('Edit Participant') }}</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('participants.update', $participant) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Name') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="name" placeholder="Name"
                                        type="text" value="{{ $participant->user->name }}" required>
                                </div>
                                @error('name')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Email') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="email" placeholder="Email"
                                        type="email" value="{{ $participant->user->email }}" required>
                                </div>
                                @error('email')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Phone') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="phone" placeholder="Phone"
                                        type="text" value="{{ $participant->phone }}" required>
                                </div>
                                @error('phone')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Agency') }}</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control form-control" name="agency" placeholder="Agency"
                                        type="text" value="{{ $participant->agency }}" required>
                                </div>
                                @error('agency')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label">{{ __('Attend at event') }}</label>
                                <div class="input-group input-group-merge">
                                    <select class="form-control" data-toggle="select" name="event_id" required>
                                        <option value="" selected>Select event ..</option>
                                        @foreach ($events as $event)
                                            @if ($event->id == $participant->event_id)
                                                @php($select = 'selected')
                                            @else
                                                @php($select = '')
                                            @endif
                                            <option {{ $select }} value="{{ $event->id }}">{{ $event->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('event_id')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <a href="{{ route('participants.index') }}" class="btn btn-default"
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
@endsection
