@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter Doctorant'])

    @include('layouts.navbars.auth.sidenavafterperiodes')

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter un bénéficiaire d'options de souscription'</h5>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('beneficiaires_abondement.store', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nom" class="form-label">{{ __('Nom') }}</label>
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autofocus>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">{{ __('Prénom') }}</label>
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required>
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="adresse" class="form-label">{{ __('Adresse') }}</label>
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cin" class="form-label">{{ __('CIN') }}</label>
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required>
                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="carte_sejour" class="form-label">{{ __('Carte de séjour') }}</label>
                                <input id="carte_sejour" type="text" class="form-control @error('carte_sejour') is-invalid @enderror" name="carte_sejour" value="{{ old('carte_sejour') }}">
                                @error('carte_sejour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="commune" class="form-label">{{ __('Commune') }}</label>
                                <input id="commune" type="text" class="form-control @error('commune') is-invalid @enderror" name="commune" value="{{ old('commune') }}">
                                @error('commune')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="numero_plan" class="form-label">{{ __('Numéro de plan') }}</label>
                                <input id="numero_plan" type="text" class="form-control @error('numero_plan') is-invalid @enderror" name="numero_plan" value="{{ old('numero_plan') }}" required>
                                @error('numero_plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="duree_annees" class="form-label">{{ __('Durée en années') }}</label>
                                <input id="duree_annees" type="number" class="form-control @error('duree_annees') is-invalid @enderror" name="duree_annees" value="{{ old('duree_annees') }}" required>
                                @error('duree_annees')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_ouverture" class="form-label">{{ __('Date d’ouverture') }}</label>
                                <input id="date_ouverture" type="date" class="form-control @error('date_ouverture') is-invalid @enderror" name="date_ouverture" value="{{ old('date_ouverture') }}" required>
                                @error('date_ouverture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="montant_abondement" class="form-label">{{ __('Montant abondement') }}</label>
                                <input id="montant_abondement" type="number" step="0.01" class="form-control @error('montant_abondement') is-invalid @enderror" name="montant_abondement" value="{{ old('montant_abondement') }}" required>
                                @error('montant_abondement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="montant_annuel_revenu_imposable" class="form-label">{{ __('Montant annuel du revenu imposable') }}</label>
                                <input id="montant_annuel_revenu_imposable" type="number" step="0.01" class="form-control @error('montant_annuel_revenu_imposable') is-invalid @enderror" name="montant_annuel_revenu_imposable" value="{{ old('montant_annuel_revenu_imposable') }}" required>
                                @error('montant_annuel_revenu_imposable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Créer') }}
                                    </button>
                                    <a href="{{ route('beneficiairesAbondement.index', ['id_periode' => $id_periode]) }}" class="btn btn-secondary">
                                        {{ __('Annuler') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
