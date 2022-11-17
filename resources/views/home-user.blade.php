@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-secondary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-default d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-stats border-right border-left border-top border-bottom border-light">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total My Certificate</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $certificates }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                            <i class="fa fa-certificate"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('certificates-user') }}" class="text-nowrap">
                                        Go to certificate index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            @include('nav.footer')
        </div>
    </footer>
@endsection
