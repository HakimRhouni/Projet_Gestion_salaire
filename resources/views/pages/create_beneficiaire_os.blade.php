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
                                <h5 class="card-title">Ajouter un bénéficiaire d'options de souscription'</h5>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('beneficiairesOS.store', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}">

                            @csrf
                            <input type="hidden" name="id_societe" value="{{ $id_societe }}">


                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control" name="prenom" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control" name="adresse" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('CIN') }}</label>

                                <div class="col-md-6">
                                    <input id="cin" type="text" class="form-control" name="cin" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="carte_sejour" class="col-md-4 col-form-label text-md-right">{{ __('Carte de séjour') }}</label>

                                <div class="col-md-6">
                                    <input id="carte_sejour" type="text" class="form-control" name="carte_sejour" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_fiscal" class="col-md-4 col-form-label text-md-right">{{ __('ID Fiscal') }}</label>

                                <div class="col-md-6">
                                    <input id="id_fiscal" type="text" class="form-control" name="id_fiscal" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_cnss" class="col-md-4 col-form-label text-md-right">{{ __('Numéro CNSS') }}</label>

                                <div class="col-md-6">
                                    <input id="num_cnss" type="text" class="form-control" name="num_cnss" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="organisme" class="col-md-4 col-form-label text-md-right">{{ __('Organisme') }}</label>

                                <div class="col-md-6">
                                    <input id="organisme" type="text" class="form-control" name="organisme" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nbr_actions_acquises" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions acquises') }}</label>

                                <div class="col-md-6">
                                    <input id="nbr_actions_acquises" type="number" class="form-control" name="nbr_actions_acquises"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nbr_actions_distribuees" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions distribuées') }}</label>

                                <div class="col-md-6">
                                    <input id="nbr_actions_distribuees" type="number" class="form-control" name="nbr_actions_distribuees" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prix_acquisition" class="col-md-4 col-form-label text-md-right">{{ __('Prix d\'acquisition') }}</label>

                                <div class="col-md-6">
                                    <input id="prix_acquisition" type="number" class="form-control" name="prix_acquisition" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_attribution" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'attribution') }}</label>

                                <div class="col-md-6">
                                    <input id="date_attribution" type="date" class="form-control" name="date_attribution" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="valeur_action_attribution" class="col-md-4 col-form-label text-md-right">{{ __('Valeur de l\'action à l\'attribution') }}</label>

                                <div class="col-md-6">
                                    <input id="valeur_action_attribution" type="number" class="form-control" name="valeur_action_attribution" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_levee_option" class="col-md-4 col-form-label text-md-right">{{ __('Date de levée d\'option') }}</label>

                                <div class="col-md-6">
                                    <input id="date_levee_option" type="date" class="form-control" name="date_levee_option">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="valeur_action_levee" class="col-md-4 col-form-label text-md-right">{{ __('Valeur de l\'action levée') }}</label>

                                <div class="col-md-6">
                                    <input id="valeur_action_levee" type="number" class="form-control" name="valeur_action_levee" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_cession" class="col-md-4 col-form-label text-md-right">{{ __('Date de cession') }}</label>

                                <div class="col-md-6">
                                    <input id="date_cession" type="date" class="form-control" name="date_cession">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nbr_actions_cedees" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'actions cédées') }} </label>

                                <div class="col-md-6">
                                    <input id="nbr_actions_cedees" type="number" class="form-control" name="nbr_actions_cedees" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="montant_abondement" class="col-md-4 col-form-label text-md-right">{{ __('Montant de l\'abondement') }}</label>

                                <div class="col-md-6">
                                    <input id="montant_abondement" type="number" class="form-control" name="montant_abondement" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="complement_salaire" class="col-md-4 col-form-label text-md-right">{{ __('Complément de salaire') }}</label>

                                <div class="col-md-6">
                                    <input id="complement_salaire" type="number" class="form-control" name="complement_salaire" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
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
    @include('layouts.footers.auth.footer')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
@endsection
