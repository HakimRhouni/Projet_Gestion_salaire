@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  

    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter Stagiaire'])

    
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter Stagiaire</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('stagiaires.store', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_societe" value="{{ $id_societe }}">
                                    <input type="hidden" name="id_periode" value="{{ $id_periode }}">
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
                                        <label for="montant_brut" class="form-label">Montant Brut</label>
                                        <input type="number" class="form-control" id="montant_brut" name="montant_brut" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="indemnite" class="form-label">Indemnité</label>
                                        <input type="number" class="form-control" id="indemnite" name="indemnite" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="retenues" class="form-label">Retenues</label>
                                        <input type="number" class="form-control" id="retenues" name="retenues" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="net_imposable" class="form-label">Net Imposable</label>
                                        <input type="number" class="form-control" id="net_imposable" name="net_imposable" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="net_imposable" class="form-label">Periode</label>
                                        <input type="number" class="form-control" id="periode" name="periode" required>
                                    </div>
                                    <!-- Ajoutez d'autres champs de formulaire ici -->
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
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
