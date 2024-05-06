@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier Doctorant'])

    

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Modifier Doctorant</h5>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('doctorants.update', ['id_periode' => $id_periode, 'id_societe' => $id_societe, 'id' => $doctorant->id_doctorant]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id_periode" value="{{ $id_periode }}">
    <input type="hidden" name="id_societe" value="{{ $id_societe }}">
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $doctorant->nom }}" required>
        @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $doctorant->prenom }}" required>
        @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ $doctorant->adresse }}" required>
        @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="numero_cin" class="form-label">Numéro CIN</label>
        <input type="text" class="form-control @error('numero_cin') is-invalid @enderror" id="numero_cin" name="numero_cin" value="{{ $doctorant->numero_cin }}" required>
        @error('numero_cin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="carte_sejour" class="form-label">Carte de séjour</label>
        <input type="text" class="form-control @error('carte_sejour') is-invalid @enderror" id="carte_sejour" name="carte_sejour" value="{{ $doctorant->carte_sejour }}" required>
        @error('carte_sejour')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="brut_indemnites" class="form-label">Brut des indemnités</label>
        <input type="text" class="form-control @error('brut_indemnites') is-invalid @enderror" id="brut_indemnites" name="brut_indemnites" value="{{ $doctorant->brut_indemnites }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57  || event.charCode === 46" required>
        @error('brut_indemnites')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>



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
