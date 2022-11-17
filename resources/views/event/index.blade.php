@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Event') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home text-white"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Event') }}</li>
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
                        <h3 class="mb-0">{{ __('Event') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable" style="white-space:normal">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Location') }}</th>
                                    <th>{{ __('Participant') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $event->name }}</td>
                                        <td class="align-middle">{{ $event->date }}</td>
                                        <td class="align-middle">{{ $event->location }}</td>
                                        <td class="align-middle">{{ $event->participant }}
                                            <a href="{{ route('participants.show', $event->id) }}"
                                                class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Lihat"><span
                                                    class="btn-inner--icon"><i class="fas fa-sharp fa-solid fa-eye"></i></span></a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('events.edit', $event) }}"
                                                class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                    class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            <button onclick="deleteItem(this)" data-id="{{ $event->id }}"
                                                class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
        @include('event.script')
    </div>
    </div>
@endsection
