@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Participant') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home text-white"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Participant') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-neutral mt-1" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="btn-inner--text">{{ __('Add Participant') }}</span>
                                <span class="btn-inner--icon"><i class="ni ni-bold-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a href="{{ route('participants.create') }}"
                                    class="dropdown-item">{{ __('Single Participant ') }}</a>
                            </div>
                        </div>
                    </div>
                    @include('participant.modal')
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
                        <h3 class="mb-0">{{ __('Participant') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable" style="white-space:normal">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Agency') }}</th>
                                    <th>{{ __('Attend the Event') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->participants as $participant)
                                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="{{ route('import-participants') }}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="file" name="file" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $participant->user->name }}</td>
                                        <td class="align-middle">{{ $participant->phone }}</td>
                                        <td class="align-middle">{{ $participant->agency }}</td>
                                        <td class="align-middle">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $event->name }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('participants.edit', $participant) }}"
                                                class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                    class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            <button onclick="deleteItem(this)" data-id="{{ $participant->id }}"
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
        @include('participant.script')
    </div>
@endsection
