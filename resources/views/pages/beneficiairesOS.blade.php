@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    

    @include('layouts.navbars.auth.topnav', ['title' => 'Doctorants'])

    

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Liste des bénéficiaires d'options de souscription</h5>
                                <a href="{{ route('beneficiairesOS.create', ['id_periode' => $id_periode]) }}" class="btn btn-primary">Ajouter Bénéficiaire</a>

                            </div>
                            <div class="card-body">
                                @if(count($beneficiairesOS) > 0)
                                    <div class="table-responsive">
                                    <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>CIN</th>
                                                        <th>Carte de séjour</th>
                                                        <th>ID Fiscal</th>
                                                        <th>Nbr Actions Acquises</th>
                                                        <th>Nbr Action Distribuées</th>
                                                        <th>Prix Acquisition</th>
                                                        <th>Montant Abondement</th>
                                                        <th>Complément Salaire</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($beneficiairesOS as $beneficiaire)
                                                    <tr>
                                                        <td>{{ $beneficiaire->nom }}</td>
                                                        <td>{{ $beneficiaire->prenom }}</td>
                                                        <td>{{ $beneficiaire->cin }}</td>
                                                        <td>{{ $beneficiaire->carte_sejour }}</td>
                                                        <td>{{ $beneficiaire->id_fiscal }}</td>
                                                        <td>{{ $beneficiaire->nbr_actions_acquises }}</td>
                                                        <td>{{ $beneficiaire->nbr_actions_distribuees }}</td>
                                                        <td>{{ $beneficiaire->prix_acquisition }}</td>
                                                        <td>{{ $beneficiaire->montant_abondement }}</td>
                                                        <td>{{ $beneficiaire->complement_salaire }}</td>
                                                        <td>
    <a href="{{ route('beneficiairesOS.edit', ['id_periode' => $id_periode, 'id_societe' => $beneficiaire->id]) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('beneficiairesOS.destroy', ['id_periode' => $id_periode, 'id_societe' => $beneficiaire->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Supprimer</button>
    </form>
</td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        
                                    </div>
                                @else
                                    <p>Aucun Bénéficiaire d’options de souscription trouvé.</p>
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
@endsection
