@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


    @include('layouts.navbars.auth.topnav', ['title' => 'Simpl-IR'])


    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <!-- Insérer ici le code de l'iframe -->
                                <iframe src="https://ir.tax.gov.ma/ir/private/login.do?method=reload&feature=IR&langue=fr" style="width: 100%; height: 600px; border: none;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footers.auth.footer')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
@endsection
