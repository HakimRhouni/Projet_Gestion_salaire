@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

    @include('layouts.navbars.auth.topnav', ['title' => 'Personnel Occasionnel'])

    @include('layouts.navbars.auth.sidenavafterperiodes') <!-- Ajout du deuxième sidenav -->

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Personnel Occasionnel</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-header">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Adresse</th>
                                                <th>CIN</th>
                                                <th>Carte de séjour</th>
                                                <th>Numéro CNSS</th>
                                                <th>Id fiscal</th>
                                                <th>Profession</th>
                                                <th>Montant Brut</th>
                                                <th>IR Prélevé</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($personnelOcasionnel as $personnel)
                                                <tr>
                                                    <td>{{ $personnel->nom }}</td>
                                                    <td>{{ $personnel->prenom }}</td>
                                                    <td>{{ $personnel->adresse }}</td>
                                                    <td>{{ $personnel->cin }}</td>
                                                    <td>{{ $personnel->carte_sejour }}</td>
                                                    <td>{{ $personnel->numero_cnss }}</td>
                                                    <td>{{ $personnel->id_fiscal }}</td>
                                                    <td>{{ $personnel->profession }}</td>
                                                    <td>{{ $personnel->montant_brut }}</td>
                                                    <td>{{ $personnel->ir_preleve }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('css')
    <style>
        .table-header th {
            height: 60px; /* Ajustez la hauteur selon vos besoins */
        }
    </style>
@endpush

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Script JS personnalisé ici si nécessaire
    </script>
@endpush
