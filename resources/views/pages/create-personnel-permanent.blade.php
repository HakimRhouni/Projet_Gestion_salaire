@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
<link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

@include('layouts.navbars.auth.topnav', ['title' => 'Créer Personnel Permanent'])

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Créer Personnel Permanent</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('personnel_permanent.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_societe" value="{{ $id_societe }}">
                                <input type="hidden" name="id_periode" value="{{ $id_periode }}">
                                
                                <div class="mb-3">
                                    <label for="matricule" class="form-label">Matricule</label>
                                    <input type="text" class="form-control" id="matricule" name="matricule" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lf_employe" class="form-label">LF de l'employé</label>
                                    <input type="text" class="form-control" id="lf_employe" name="lf_employe" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cin" class="form-label">CIN</label>
                                    <input type="text" class="form-control" id="cin" name="cin">
                                </div>
                                <div class="mb-3">
                                    <label for="carte_sejour" class="form-label">Carte de séjour</label>
                                    <input type="text" class="form-control" id="carte_sejour" name="carte_sejour">
                                </div>
                                <div class="mb-3">
                                    <label for="cnss" class="form-label">CNSS</label>
                                    <input type="text" class="form-control" id="cnss" name="cnss">
                                </div>
                                <div class="mb-3">
                                    <label for="situation_famille" class="form-label">Situation de famille</label>
                                    <input type="text" class="form-control" id="situation_famille" name="situation_famille">
                                </div>
                                <div class="mb-3">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse">
                                </div>
                                <div class="mb-3">
                                    <label for="salaire_base_annuel" class="form-label">Salaire de base annuel</label>
                                    <input type="text" class="form-control" id="salaire_base_annuel" name="salaire_base_annuel">
                                </div>
                                <div class="mb-3">
    <label for="montant_brut" class="form-label">Montant Brut</label>
    <input type="text" class="form-control" id="montant_brut" name="montant_brut" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_avantages" class="form-label">Montant Avantages</label>
    <input type="text" class="form-control" id="montant_avantages" name="montant_avantages" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_indemnites" class="form-label">Montant Indemnités</label>
    <input type="text" class="form-control" id="montant_indemnites" name="montant_indemnites" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_exoneres" class="form-label">Montant Exonérés</label>
    <input type="text" class="form-control" id="montant_exoneres" name="montant_exoneres" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_revenu_brut_imposable" class="form-label">Montant du revenu brut imposable</label>
    <input type="text" class="form-control" id="montant_revenu_brut_imposable" name="montant_revenu_brut_imposable" readonly>
</div>
<div class="mb-3">
    <label for="montant_frais_professionnels" class="form-label">Montant Frais Professionnels</label>
    <input type="text" class="form-control" id="montant_frais_professionnels" name="montant_frais_professionnels" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_cotisations" class="form-label">Montant Cotisations</label>
    <input type="text" class="form-control" id="montant_cotisations" name="montant_cotisations" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_autres_retenues" class="form-label">Montant Autres Retenues</label>
    <input type="text" class="form-control" id="montant_autres_retenues" name="montant_autres_retenues" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="montant_echeances" class="form-label">Montant Echéances</label>
    <input type="text" class="form-control" id="montant_echeances" name="montant_echeances" onchange="calculateAmounts()">
</div>
<div class="mb-3">
    <label for="revenu_net_imposable" class="form-label">Revenu Net Imposable</label>
    <input type="text" class="form-control" id="revenu_net_imposable" name="revenu_net_imposable" readonly>
</div>
<div class="mb-3">
    <label for="nb_reductions_charge_famille" class="form-label">Nombre Réductions Charge Famille</label>
    <input type="text" class="form-control" id="nb_reductions_charge_famille" name="nb_reductions_charge_famille">
</div>
<div class="mb-3">
    <label for="periode_jours" class="form-label">Période Jours</label>
    <input type="text" class="form-control" id="periode_jours" name="periode_jours">
</div>
<div class="mb-3">
    <label for="date_permis_habiter" class="form-label">Date Permis Habiter</label>
    <input type="date" class="form-control" id="date_permis_habiter" name="date_permis_habiter">
</div>
<div class="mb-3">
    <label for="ir_preleve" class="form-label">IR Prélevé</label>
    <input type="text" class="form-control" id="ir_preleve" name="ir_preleve">
</div>
<div class="mb-3">
    <label for="date_autorisation_construire" class="form-label">Date Autorisation Construire</label>
    <input type="date" class="form-control" id="date_autorisation_construire" name="date_autorisation_construire">
</div>
                                
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection
<script>
    // Fonction pour calculer automatiquement les montants
    function calculateAmounts() {
        var montant_brut = parseFloat(document.getElementById('montant_brut').value) || 0;
        var montant_avantages = parseFloat(document.getElementById('montant_avantages').value) || 0;
        var montant_indemnites = parseFloat(document.getElementById('montant_indemnites').value) || 0;
        var montant_exoneres = parseFloat(document.getElementById('montant_exoneres').value) || 0;
        var montant_frais_professionnels = parseFloat(document.getElementById('montant_frais_professionnels').value) || 0;
        var montant_cotisations = parseFloat(document.getElementById('montant_cotisations').value) || 0;
        var montant_autres_retenues = parseFloat(document.getElementById('montant_autres_retenues').value) || 0;
        var montant_echeances = parseFloat(document.getElementById('montant_echeances').value) || 0;

        var montant_revenu_brut_imposable = montant_brut + montant_avantages + montant_indemnites - montant_exoneres;
        document.getElementById('montant_revenu_brut_imposable').value = montant_revenu_brut_imposable;

        var revenu_net_imposable = montant_revenu_brut_imposable - montant_frais_professionnels + montant_cotisations + montant_autres_retenues + montant_echeances;
        document.getElementById('revenu_net_imposable').value = revenu_net_imposable;
    }
</script>

@push('css')
    <style>
        /* Ajoutez vos styles CSS personnalisés ici */
    </style>
@endpush

@push('js')
    <script>
        // Ajoutez vos scripts JavaScript personnalisés ici
    </script>
@endpush
