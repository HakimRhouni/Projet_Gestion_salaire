@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    

    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter Doctorant'])



    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter Doctorant</h5>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('doctorants.store', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" method="POST">
    @csrf
    <input type="hidden" name="id_societe" value="{{ $id_societe }}">
    <input type="hidden" name="id_periode" value="{{ $id_periode }}">
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" required>
        @error('nom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" required>
        @error('prenom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" required>
        @error('adresse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="numero_cin" class="form-label">Numéro CIN</label>
        <input type="text" class="form-control @error('numero_cin') is-invalid @enderror" id="numero_cin" name="numero_cin" required>
        @error('numero_cin')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="carte_sejour" class="form-label">Carte de Séjour</label>
        <input type="text" class="form-control @error('carte_sejour') is-invalid @enderror" id="carte_sejour" name="carte_sejour" required>
        @error('carte_sejour')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="brut_indemnites" class="form-label">Brut des Indemnités</label>
        <input type="text" class="form-control @error('brut_indemnites') is-invalid @enderror" id="brut_indemnites" name="brut_indemnites" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" required>
        @error('brut_indemnites')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <!-- Ajoutez d'autres champs de formulaire ici -->
    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
