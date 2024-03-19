@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


@include('layouts.navbars.auth.topnav', ['title' => 'Salaries Exoneré'])



div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title"> creer un salarie exoneres</h5>
                            <form action="{{ route('salaries_exoneration.store') }}" method="POST">
                                    @csrf
                                    <!-- Champ pour le nom -->
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" class="form-control">
                                    </div>

                                    <!-- Champ pour le prénom -->
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" id="prenom" class="form-control">
                                    </div>

                                    <!-- Champ pour le numéro CIN -->
                                    <div class="form-group">
                                        <label for="numero_cin">Numéro CIN</label>
                                        <input type="text" name="numero_cin" id="numero_cin" class="form-control">
                                    </div>

                                    <!-- Champ pour la carte de séjour -->
                                    <div class="form-group">
                                        <label for="carte_sejour">Carte de Séjour</label>
                                        <input type="text" name="carte_sejour" id="carte_sejour" class="form-control">
                                    </div>

                                    <!-- Champ pour l'adresse -->
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" id="adresse" class="form-control">
                                    </div>

                                    <!-- Champ pour le numéro CNSS -->
                                    <div class="form-group">
                                        <label for="numero_cnss">Numéro CNSS</label>
                                        <input type="text" name="numero_cnss" id="numero_cnss" class="form-control">
                                    </div>

                                    <!-- Champ pour l'ID fiscale -->
                                    <div class="form-group">
                                        <label for="id_fiscale">ID Fiscale</label>
                                        <input type="text" name="id_fiscale" id="id_fiscale" class="form-control">
                                    </div>

                                    <!-- Champ pour la date de recrutement -->
                                    <div class="form-group">
                                        <label for="date_recrutement">Date de Recrutement</label>
                                        <input type="date" name="date_recrutement" id="date_recrutement" class="form-control">
                                    </div>

                                    <!-- Champ pour la période en jours -->
                                    <div class="form-group">
                                        <label for="periode_en_jours">Période en Jours</label>
                                        <input type="number" name="periode_en_jours" id="periode_en_jours" class="form-control">
                                    </div>

                                    <!-- Champ pour les traitements bruts -->
                                    <div class="form-group">
                                        <label for="brut_traitements">Traitements Bruts</label>
                                        <input type="number" name="brut_traitements" id="brut_traitements" class="form-control">
                                    </div>

                                    <!-- Champ pour les avantages -->
                                    <div class="form-group">
                                        <label for="avantages">Avantages</label>
                                        <input type="number" name="avantages" id="avantages" class="form-control">
                                    </div>

                                    <!-- Champ pour les indemnités -->
                                    <div class="form-group">
                                        <label for="indemnite">Indemnités</label>
                                        <input type="number" name="indemnite" id="indemnite" class="form-control">
                                    </div>

                                    <!-- Champ pour le revenu brut imposable -->
                                    <div class="form-group">
                                        <label for="revenu_brut_imposable">Revenu Brut Imposable</label>
                                        <input type="number" name="revenu_brut_imposable" id="revenu_brut_imposable" class="form-control">
                                    </div>

                                    <!-- Champ pour les retenues opérées -->
                                    <div class="form-group">
                                        <label for="retenues_operees">Retenues Opérées</label>
                                        <input type="number" name="retenues_operees" id="retenues_operees" class="form-control">
                                    </div>

                                    <!-- Champ pour le revenu net imposable -->
                                    <div class="form-group">
                                        <label for="revenu_net_imposable">Revenu Net Imposable</label>
                                        <input type="number" name="revenu_net_imposable" id="revenu_net_imposable" class="form-control">
                                    </div>

                                    <!-- Champ caché pour l'ID de la société -->
                                    <input type="hidden" name="id_societe" value="{{ $id_societe }}">

                                    <!-- Champ caché pour l'ID de la période -->
                                    <input type="hidden" name="id_periode" value="{{ $id_periode }}">

                                    <!-- Bouton pour soumettre le formulaire -->
                                    <button type="submit" class="btn btn-primary">Créer Salarié Exonéré</button>
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
</div>
@endsection

