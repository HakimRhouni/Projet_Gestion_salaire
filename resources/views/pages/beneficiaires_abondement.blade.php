@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

    @include('layouts.navbars.auth.topnav', ['title' => 'Doctorants'])

    @include('layouts.navbars.auth.sidenavafterperiodes')

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Liste des bénéficiaires d’abondements dans le cadre d’un plan d’épargne entreprise</h5>
                                <a href="{{ route('beneficiaires_abondement.create', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" class="btn btn-primary">Ajouter Bénéficiaire</a>


                            </div>
                            <div class="card-body">
                                @if(count($beneficiairesAbondement) > 0)
                                <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>CIN</th>
                                    <th>Carte de séjour</th>
                                    <th>Numéro de plan</th>
                                    <th>Durée en années</th>
                                    <th>Date d'ouverture</th>
                                    <th>Montant abondement</th>
                                    <th>Montant annuel du revenu imposable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiairesAbondement as $beneficiaire)
                                    <tr>
                                        <td>{{ $beneficiaire->nom }}</td>
                                        <td>{{ $beneficiaire->prenom }}</td>
                                        <td>{{ $beneficiaire->cin }}</td>
                                        <td>{{ $beneficiaire->carte_sejour }}</td>
                                        <td>{{ $beneficiaire->numero_plan }}</td>
                                        <td>{{ $beneficiaire->duree_annees }}</td>
                                        <td>{{ $beneficiaire->date_ouverture }}</td>
                                        <td>{{ $beneficiaire->montant_abondement }}</td>
                                        <td>{{ $beneficiaire->montant_annuel_revenu_imposable }}</td>
                                        <td>
                <!-- Bouton Modifier -->
                <a href="{{ route('beneficiaires_abondement.edit', ['id_periode' => $id_periode, 'id_societe' => $beneficiaire->id_societe, 'id' => $beneficiaire->id]) }}" class="btn btn-primary">Modifier</a>
                <!-- Formulaire Supprimer -->
                <form action="{{ route('beneficiaires_abondement.destroy', ['id_periode' => $id_periode, 'id_societe' => $beneficiaire->id_societe, 'id' => $beneficiaire->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                                @else
                                    <p>Aucun bénéficiaire d’abondement dans le cadre d’un plan d’épargne entreprise trouvé.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
