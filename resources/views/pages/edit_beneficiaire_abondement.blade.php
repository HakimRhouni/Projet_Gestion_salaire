@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
   
    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier Beneficiaire'])

   

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Modifier un bénéficiaire d'options de souscription</h5>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('beneficiaires_abondement.update', ['id_periode' => $id_periode, 'id_societe' => $id_societe, 'id' => $beneficiaire->id]) }}">
                            @csrf
                            @method('PUT')

                            <!-- Champ Nom -->
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $beneficiaire->nom }}" required autofocus>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Prénom -->
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $beneficiaire->prenom }}" required>
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Adresse -->
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $beneficiaire->adresse }}" required>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ CIN -->
                            <div class="form-group">
                                <label for="cin">CIN</label>
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ $beneficiaire->cin }}" required>
                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Carte de séjour -->
                            <div class="form-group">
                                <label for="carte_sejour">Carte de séjour</label>
                                <input id="carte_sejour" type="text" class="form-control @error('carte_sejour') is-invalid @enderror" name="carte_sejour" value="{{ $beneficiaire->carte_sejour }}">
                                @error('carte_sejour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Commune -->
                            <div class="form-group">
                                <label for="commune">Commune</label>
                                <input id="commune" type="text" class="form-control @error('commune') is-invalid @enderror" name="commune" value="{{ $beneficiaire->commune }}">
                                @error('commune')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Numéro de plan -->
                            <div class="form-group">
                                <label for="numero_plan">Numéro de plan</label>
                                <input id="numero_plan" type="text" class="form-control @error('numero_plan') is-invalid @enderror" name="numero_plan" value="{{ $beneficiaire->numero_plan }}" required>
                                @error('numero_plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Durée en années -->
                            <div class="form-group">
                                <label for="duree_annees">Durée en années</label>
                                <input id="duree_annees" type="number" class="form-control @error('duree_annees') is-invalid @enderror" name="duree_annees" value="{{ $beneficiaire->duree_annees }}" required>
                                @error('duree_annees')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Date d'ouverture -->
                            <div class="form-group">
                                <label for="date_ouverture">Date d'ouverture</label>
                                <input id="date_ouverture" type="date" class="form-control @error('date_ouverture') is-invalid @enderror" name="date_ouverture" value="{{ $beneficiaire->date_ouverture }}" required>
                                @error('date_ouverture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Montant abondement -->
                            <div class="form-group">
                                <label for="montant_abondement">Montant abondement</label>
                                <input id="montant_abondement" type="number" step="0.01" class="form-control @error('montant_abondement') is-invalid @enderror" name="montant_abondement" value="{{ $beneficiaire->montant_abondement }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                @error('montant_abondement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Champ Montant annuel du revenu imposable -->
                            <div class="form-group">
                                <label for="montant_annuel_revenu_imposable">Montant annuel du revenu imposable</label>
                                <input id="montant_annuel_revenu_imposable" type="number" step="0.01" class="form-control @error('montant_annuel_revenu_imposable') is-invalid @enderror" name="montant_annuel_revenu_imposable" value="{{ $beneficiaire->montant_annuel_revenu_imposable }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                @error('montant_annuel_revenu_imposable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
@endsection
