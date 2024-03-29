@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Modifier Personnel Permanent'])

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Modifier Personnel Permanent</h5>
                        </div>
                        <div class="card-body">
                            <form id="editPersonnelForm" action="{{ route('personnel_permanent.update', $personnelPermanent->id_personnel_permanent) }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="mb-3">
                                    <label for="matricule" class="form-label">Matricule</label>
                                    <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $personnelPermanent->matricule }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lf_employe" class="form-label">LF de l'employé</label>
                                    <input type="text" class="form-control" id="lf_employe" name="lf_employe" value="{{ $personnelPermanent->lf_employe }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $personnelPermanent->nom }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $personnelPermanent->prenom }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cin" class="form-label">CIN</label>
                                    <input type="text" class="form-control" id="cin" name="cin" value="{{ $personnelPermanent->cin }}">
                                </div>
                                <div class="mb-3">
                                    <label for="carte_sejour" class="form-label">Carte de séjour</label>
                                    <input type="text" class="form-control" id="carte_sejour" name="carte_sejour" value="{{ $personnelPermanent->carte_sejour }}">
                                </div>
                                <div class="mb-3">
                                    <label for="cnss" class="form-label">CNSS</label>
                                    <input type="text" class="form-control" id="cnss" name="cnss" value="{{ $personnelPermanent->cnss }}">
                                </div>
                                <div class="mb-3">
                                    <label for="situation_famille" class="form-label">Situation de famille</label>
                                    <input type="text" class="form-control" id="situation_famille" name="situation_famille" value="{{ $personnelPermanent->situation_famille }}">
                                </div>
                                <div class="mb-3">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $personnelPermanent->adresse }}">
                                </div>
                                <div class="mb-3">
                                    <label for="salaire_base_annuel" class="form-label">Salaire de base annuel</label>
                                    <input type="text" class="form-control" id="salaire_base_annuel" name="salaire_base_annuel" value="{{ $personnelPermanent->salaire_base_annuel }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_brut" class="form-label">Montant Brut</label>
                                    <input type="text" class="form-control" id="montant_brut" name="montant_brut" value="{{ $personnelPermanent->montant_brut }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_avantages" class="form-label">Montant Avantages</label>
                                    <input type="text" class="form-control" id="montant_avantages" name="montant_avantages" value="{{ $personnelPermanent->montant_avantages }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_indemnites" class="form-label">Montant Indemnités</label>
                                    <input type="text" class="form-control @error('montant_indemnites') is-invalid @enderror" class="form-control" id="montant_indemnites" name="montant_indemnites" value="{{ $personnelPermanent->montant_indemnites }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                     @error('montant_indemnites')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="montant_exoneres" class="form-label">Montant Exonérés</label>
                                    <input type="text" class="form-control" id="montant_exoneres" name="montant_exoneres" value="{{ $personnelPermanent->montant_exoneres }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_revenu_brut_imposable" class="form-label">Montant du revenu brut imposable</label>
                                    <input type="text" class="form-control" id="montant_revenu_brut_imposable" name="montant_revenu_brut_imposable" value="{{ $personnelPermanent->montant_revenu_brut_imposable }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="montant_frais_professionnels" class="form-label">Montant Frais Professionnels</label>
                                    <input type="text" class="form-control" id="montant_frais_professionnels" name="montant_frais_professionnels" value="{{ $personnelPermanent->montant_frais_professionnels }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_cotisations" class="form-label">Montant Cotisations</label>
                                    <input type="text" class="form-control" id="montant_cotisations" name="montant_cotisations" value="{{ $personnelPermanent->montant_cotisations }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_autres_retenues" class="form-label">Montant Autres Retenues</label>
                                    <input type="text" class="form-control" id="montant_autres_retenues" name="montant_autres_retenues" value="{{ $personnelPermanent->montant_autres_retenues }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="montant_echeances" class="form-label">Montant Echéances</label>
                                    <input type="text" class="form-control" id="montant_echeances" name="montant_echeances" value="{{ $personnelPermanent->montant_echeances }}" onchange="calculateAmounts()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="revenu_net_imposable" class="form-label">Revenu Net Imposable</label>
                                    <input type="text" class="form-control" id="revenu_net_imposable" name="revenu_net_imposable" value="{{ $personnelPermanent->revenu_net_imposable }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nb_reductions_charge_famille" class="form-label">Nombre Réductions Charge Famille</label>
                                    <input type="text" class="form-control" id="nb_reductions_charge_famille" name="nb_reductions_charge_famille" value="{{ $personnelPermanent->nb_reductions_charge_famille }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="periode_jours" class="form-label">Période Jours</label>
                                    <input type="text" class="form-control" id="periode_jours" name="periode_jours" value="{{ $personnelPermanent->periode_jours }}">
                                </div>
                                <div class="mb-3">
                                    <label for="date_permis_habiter" class="form-label">Date Permis Habiter</label>
                                    <input type="date" class="form-control" id="date_permis_habiter" name="date_permis_habiter" value="{{ $personnelPermanent->date_permis_habiter }}">
                                </div>
                                <div class="mb-3">
                                    <label for="ir_preleve" class="form-label">IR Prélevé</label>
                                    <input type="text" class="form-control" id="ir_preleve" name="ir_preleve" value="{{ $personnelPermanent->ir_preleve }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                                <div class="mb-3">
                                    <label for="date_autorisation_construire" class="form-label">Date Autorisation Construire</label>
                                    <input type="date" class="form-control" id="date_autorisation_construire" name="date_autorisation_construire" value="{{ $personnelPermanent->date_autorisation_construire }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
<link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
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
        var formData = $('#editPersonnelForm').serialize();
        
        // Envoyer les données au serveur via une requête AJAX
        $.ajax({
            type: 'POST',
            url: '{{ route("calcul.montants") }}',
            data: formData,
            success: function (data) {
                // Mettre à jour les champs de formulaire avec les résultats
                $('#montant_revenu_brut_imposable').val(data.montant_revenu_brut_imposable);
                $('#revenu_net_imposable').val(data.revenu_net_imposable);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
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
