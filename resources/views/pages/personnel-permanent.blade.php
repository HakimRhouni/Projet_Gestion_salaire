@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Périodes'])



<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Personnel Permanent</h5>
                            <!-- Bouton "Ajouter Personnel Permanent" -->
                           <div class="row">
    <div class="col">
        <a href="{{ route('personnel_permanent.create', ['id_entreprise' => $id_entreprise, 'id_periode' => $id_periode]) }}" class="btn btn-primary">Ajouter Personnel Permanent</a>
    </div>
    <div class="col">
        <a href="{{ route('PersonnelPermanentController.pdf', ['id_periode' => $id_periode]) }}" class="btn btn-primary">Imprimer PDF</a>
    </div>
    <div class="col">
        <form action="{{ route('ajouter.employes.annee.precedente', ['id_periode' => $periode->id_periode]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Ajouter employés année précédente</button>
        </form>
    </div>
</div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            @if(count($personnelPermanents) > 0)
                                <table class="table table-striped align-middle">
                                    <thead class="table-header">
                                        <tr>
                                            <th>Matricule</th>
                                            <th>LF de l'employé</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>CIN</th>
                                            <th>Carte de séjour</th>
                                            <th>CNSS</th>
                                            <th>Situation de famille</th>
                                            <th>Adresse</th>
                                            <th>Montant du revenu brut imposable</th>
                                            <th>Actions</th> <!-- Ajout de la colonne pour les actions -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personnelPermanents as $personnelPermanent)
                                        <tr>
                                            <td>{{ $personnelPermanent->matricule }}</td>
                                            <td>{{ $personnelPermanent->lf_employe }}</td>
                                            <td>{{ $personnelPermanent->nom }}</td>
                                            <td>{{ $personnelPermanent->prenom }}</td>
                                            <td>{{ $personnelPermanent->cin }}</td>
                                            <td>{{ $personnelPermanent->carte_sejour }}</td>
                                            <td>{{ $personnelPermanent->cnss }}</td>
                                            <td>{{ $personnelPermanent->situation_famille }}</td>
                                            <td>{{ $personnelPermanent->adresse }}</td>
                                            <td>{{ $personnelPermanent->montant_revenu_brut_imposable }}</td>
                                            <td>
    <a href="{{ route('personnel_permanent.edit', ['id' => $personnelPermanent->id_personnel_permanent, 'id_periode' => $periode->id_periode]) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('personnel_permanent.destroy', $personnelPermanent->id_personnel_permanent) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel permanent?')">Supprimer</button>
    </form>
    <a href="{{ route('generate.payroll', ['id_personnel_permanent' => $personnelPermanent->id_personnel_permanent]) }}"   class="btn btn-info">Bulletin de paie</a>
</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>Aucun personnel Permanent trouvé.</p>
                                @endif
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

