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
                                <form method="POST" action="{{ route('beneficiairesOS.update', ['id_periode' => $id_periode, 'id_societe' => $beneficiaire->id_beneficiaire_options_souscription]) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
        <div class="col-md-6">
            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $beneficiaire->nom }}" required autofocus>
            @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
        <div class="col-md-6">
            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $beneficiaire->prenom }}" required>
            @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
        <div class="col-md-6">
            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $beneficiaire->adresse }}" required>
            @error('adresse')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('CIN') }}</label>
        <div class="col-md-6">
            <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ $beneficiaire->cin }}" required>
            @error('cin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="carte_sejour" class="col-md-4 col-form-label text-md-right">{{ __('Carte de séjour') }}</label>
        <div class="col-md-6">
            <input id="carte_sejour" type="text" class="form-control @error('carte_sejour') is-invalid @enderror" name="carte_sejour" value="{{ $beneficiaire->carte_sejour }}" required>
            @error('carte_sejour')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
        <label for="id_fiscal" class="col-md-4 col-form-label text-md-right">{{ __('ID Fiscal') }}</label>
        <div class="col-md-6">
            <input id="id_fiscal" type="text" class="form-control @error('id_fiscal') is-invalid @enderror" name="id_fiscal" value="{{ $beneficiaire->id_fiscal }}" required>
            @error('id_fiscal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ pour le numéro CNSS -->
    <div class="form-group row">
        <label for="num_cnss" class="col-md-4 col-form-label text-md-right">{{ __('Numéro CNSS') }}</label>
        <div class="col-md-6">
            <input id="num_cnss" type="text" class="form-control @error('num_cnss') is-invalid @enderror" name="num_cnss" value="{{ $beneficiaire->num_cnss }}" required>
            @error('num_cnss')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ pour l'organisme -->
    <div class="form-group row">
        <label for="organisme" class="col-md-4 col-form-label text-md-right">{{ __('Organisme') }}</label>
        <div class="col-md-6">
            <input id="organisme" type="text" class="form-control @error('organisme') is-invalid @enderror" name="organisme" value="{{ $beneficiaire->organisme }}" required>
            @error('organisme')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nbr_actions_acquises" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions acquises') }}</label>
        <div class="col-md-6">
            <input id="nbr_actions_acquises" type="text" class="form-control @error('nbr_actions_acquises') is-invalid @enderror" name="nbr_actions_acquises" value="{{ $beneficiaire->nbr_actions_acquises }}" required>
            @error('nbr_actions_acquises')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ pour le nombre d'actions distribuées -->
    <div class="form-group row">
        <label for="nbr_actions_distribuees" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions distribuées') }}</label>
        <div class="col-md-6">
            <input id="nbr_actions_distribuees" type="text" class="form-control @error('nbr_actions_distribuees') is-invalid @enderror" name="nbr_actions_distribuees" value="{{ $beneficiaire->nbr_actions_distribuees }}" required>
            @error('nbr_actions_distribuees')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ pour le prix d'acquisition -->
    <div class="form-group row">
        <label for="prix_acquisition" class="col-md-4 col-form-label text-md-right">{{ __('Prix d\'acquisition') }}</label>
        <div class="col-md-6">
            <input id="prix_acquisition" type="text" class="form-control @error('prix_acquisition') is-invalid @enderror" name="prix_acquisition" value="{{ $beneficiaire->prix_acquisition }}" required>
            @error('prix_acquisition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
    <label for="date_attribution" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'attribution') }}</label>
    <div class="col-md-6">
        <input id="date_attribution" type="date" class="form-control @error('date_attribution') is-invalid @enderror" name="date_attribution" value="{{ $beneficiaire->date_attribution }}" required>
        @error('date_attribution')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Champ pour la valeur de l'action à l'attribution -->
<div class="form-group row">
    <label for="valeur_action_attribution" class="col-md-4 col-form-label text-md-right">{{ __('Valeur de l\'action à l\'attribution') }}</label>
    <div class="col-md-6">
        <input id="valeur_action_attribution" type="text" class="form-control @error('valeur_action_attribution') is-invalid @enderror" name="valeur_action_attribution" value="{{ $beneficiaire->valeur_action_attribution }}" required>
        @error('valeur_action_attribution')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="date_levee_option" class="col-md-4 col-form-label text-md-right">{{ __('Date de levée d\'option') }}</label>
    <div class="col-md-6">
        <input id="date_levee_option" type="date" class="form-control @error('date_levee_option') is-invalid @enderror" name="date_levee_option" value="{{ $beneficiaire->date_levee_option }}">
        @error('date_levee_option')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Champ pour la valeur de l'action levée -->
<div class="form-group row">
    <label for="valeur_action_levee" class="col-md-4 col-form-label text-md-right">{{ __('Valeur de l\'action levée') }}</label>
    <div class="col-md-6">
        <input id="valeur_action_levee" type="text" class="form-control @error('valeur_action_levee') is-invalid @enderror" name="valeur_action_levee" value="{{ $beneficiaire->valeur_action_levee }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57  || event.charCode === 46">
        @error('valeur_action_levee')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="date_cession" class="col-md-4 col-form-label text-md-right">{{ __('Date de cession') }}</label>
    <div class="col-md-6">
        <input id="date_cession" type="date" class="form-control @error('date_cession') is-invalid @enderror" name="date_cession" value="{{ $beneficiaire->date_cession }}">
        @error('date_cession')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Champ pour le nombre d'actions cédées -->
<div class="form-group row">
    <label for="nbr_actions_cedees" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions cédées') }}</label>
    <div class="col-md-6">
        <input id="nbr_actions_cedees" type="text" class="form-control @error('nbr_actions_cedees') is-invalid @enderror" name="nbr_actions_cedees" value="{{ $beneficiaire->nbr_actions_cedees }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57  || event.charCode === 46">
        @error('nbr_actions_cedees')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Champ pour le montant de l'abondement -->
<div class="form-group row">
    <label for="montant_abondement" class="col-md-4 col-form-label text-md-right">{{ __('Montant de l\'abondement') }}</label>
    <div class="col-md-6">
        <input id="montant_abondement" type="text" class="form-control @error('montant_abondement') is-invalid @enderror" name="montant_abondement" value="{{ $beneficiaire->montant_abondement }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57  || event.charCode === 46">
        @error('montant_abondement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Champ pour le complément de salaire -->
<div class="form-group row">
    <label for="complement_salaire" class="col-md-4 col-form-label text-md-right">{{ __('Complément de salaire') }}</label>
    <div class="col-md-6">
        <input id="complement_salaire" type="text" class="form-control @error('complement_salaire') is-invalid @enderror" name="complement_salaire" value="{{ $beneficiaire->complement_salaire }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57  || event.charCode === 46">
        @error('complement_salaire')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Enregistrer les modifications') }}
                                            </button>
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
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
@endsection
