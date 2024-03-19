@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
   

    @include('layouts.navbars.auth.topnav', ['title' => 'Personnel Occasionnel'])



    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Personnel Occasionnel</h5>
                            </div>
                            <div class="card-header">
    <h5 class="card-title">Personnel Occasionnel</h5>
    <a href="{{ route('personnel_occasionnel.create', ['id_periode' => $id_periode]) }}" class="btn btn-primary">Ajouter</a>
</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form action="{{ route('personnel_occasionnel.store', ['id_periode' => $id_periode]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_societe" value="{{ $entreprise->id }}">
            <input type="hidden" name="raison_sociale" value="{{ $entreprise->raison_sociale }}">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cin" class="form-label">CIN</label>
                                        <input type="text" class="form-control" id="cin" name="cin" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="carte_sejour" class="form-label">Carte de séjour</label>
                                        <input type="text" class="form-control" id="carte_sejour" name="carte_sejour" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero_cnss" class="form-label">Numéro CNSS</label>
                                        <input type="text" class="form-control" id="numero_cnss" name="numero_cnss" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_fiscal" class="form-label">ID Fiscal</label>
                                        <input type="text" class="form-control" id="id_fiscal" name="id_fiscal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="profession" class="form-label">Profession</label>
                                        <input type="text" class="form-control" id="profession" name="profession" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="montant_brut" class="form-label">Montant Brut</label>
                                        <input type="number" class="form-control" id="montant_brut" name="montant_brut" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ir_preleve" class="form-label">IR Prélevé</label>
                                        <input type="number" class="form-control" id="ir_preleve" name="ir_preleve" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                                </div>
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
