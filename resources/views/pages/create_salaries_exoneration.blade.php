@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


@include('layouts.navbars.auth.topnav', ['title' => 'creer un salarie exoneres'])

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">creer un salarie exoneres</h5>
                        </div>
                        <div class="card-body">
                       <form id="createPersonnelForm" action="{{ route('salaries_exoneration.store') }}" method="POST">
                                @csrf
                                <!-- Champ pour le nom -->
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour le prénom -->
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror">
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour le numéro CIN -->
                                <div class="form-group">
                                    <label for="numero_cin">Numéro CIN</label>
                                    <input type="text" name="numero_cin" id="numero_cin" class="form-control @error('numero_cin') is-invalid @enderror">
                                    @error('numero_cin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour la carte de séjour -->
                                <div class="form-group">
                                    <label for="carte_sejour">Carte de Séjour</label>
                                    <input type="text" name="carte_sejour" id="carte_sejour" class="form-control @error('carte_sejour') is-invalid @enderror">
                                    @error('carte_sejour')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour l'adresse -->
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror">
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour le numéro CNSS -->
                                <div class="form-group">
                                    <label for="numero_cnss">Numéro CNSS</label>
                                    <input type="text" name="numero_cnss" id="numero_cnss" class="form-control @error('numero_cnss') is-invalid @enderror">
                                    @error('numero_cnss')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour l'ID fiscale -->
                                <div class="form-group">
                                    <label for="id_fiscale">ID Fiscale</label>
                                    <input type="text" name="id_fiscale" id="id_fiscale" class="form-control @error('id_fiscale') is-invalid @enderror">
                                    @error('id_fiscale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour la date de recrutement -->
                                <div class="form-group">
                                    <label for="date_recrutement">Date de Recrutement</label>
                                    <input type="date" name="date_recrutement" id="date_recrutement" class="form-control @error('date_recrutement') is-invalid @enderror">
                                    @error('date_recrutement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour la période en jours -->
                                <div class="form-group">
                                    <label for="periode_en_jours">Période en Jours</label>
                                    <input type="text" name="periode_en_jours" id="periode_en_jours" class="form-control montant-input @error('periode_en_jours') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                    @error('periode_en_jours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour les traitements bruts -->
                                <div class="form-group">
                                    <label for="brut_traitements">Traitements Bruts</label>
                                    <input type="text" name="brut_traitements" id="brut_traitements" onchange="calculateAmounts()" class="form-control montant-input @error('brut_traitements') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                    @error('brut_traitements')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour les avantages -->
                                <div class="form-group">
                                    <label for="avantages">Avantages</label>
                                    <input type="text" name="avantages" id="avantages"  onchange="calculateAmounts()" class="form-control montant-input @error('avantages') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                    @error('avantages')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour les indemnités -->
                                <div class="form-group">
                                    <label for="indemnite">Indemnités</label>
                                    <input type="text" name="indemnite" id="indemnite"  onchange="calculateAmounts()" class="form-control montant-input @error('indemnite') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                    @error('indemnite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour le revenu brut imposable -->
                                <div class="form-group">
                                    <label for="revenu_brut_imposable">Revenu Brut Imposable</label>
                                    <input type="text" name="revenu_brut_imposable" id="revenu_brut_imposable" class="form-control" readonly>
                                </div>

                                <!-- Champ pour les retenues opérées -->
                                <div class="form-group">
                                    <label for="retenues_operees">Retenues Opérées</label>
                                    <input type="text" name="retenues_operees" id="retenues_operees" onchange="calculateAmounts()" class="form-control montant-input @error('retenues_operees') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                    @error('retenues_operees')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Champ pour le revenu net imposable -->
                                <div class="form-group">
                                    <label for="revenu_net_imposable">Revenu Net Imposable</label>
                                    <input type="text" name="revenu_net_imposable" id="revenu_net_imposable" class="form-control" readonly>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Fonction pour calculer automatiquement les montants
    $(document).ready(function() {
        // Écouter les événements de saisie sur les champs de montant
        $('.montant-input').on('input', function() {
            calculateAmounts();
        });
    });

    function calculateAmounts() {
        var formData = $('#createPersonnelForm').serialize();
        formData += '&_token={{ csrf_token() }}';
        // Envoyer les données au serveur via une requête AJAX
        $.ajax({
            type: 'POST',
            url: '{{ route("calcul.SalariesExonerationMontants") }}',
            data: formData,
            success: function (data) {
                // Mettre à jour les champs de formulaire avec les résultats
                $('#revenu_brut_imposable').val(data.revenu_brut_imposable);
                $('#revenu_net_imposable').val(data.revenu_net_imposable);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>

