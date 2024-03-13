@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

    @include('layouts.navbars.auth.topnav', ['title' => 'Stagiaires'])

    @include('layouts.navbars.auth.sidenavafterperiodes') <!-- Ajout du deuxième sidenav -->

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Liste des Stagiaires</h5>
                            </div>
                            <div class="card-body">
                            <a href="{{ route('stagiaires.create', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" class="btn btn-primary">Ajouter</a>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-header">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Adresse</th>
                                                <th>CIN</th>
                                                <th>Carte de séjour</th>
                                                <th>Numéro CNSS</th>
                                                <th>Id fiscal</th>
                                                <th>Montant Brut</th>
                                                <th>Indemnité</th>
                                                <th>Retenues</th>
                                                <th>Net Imposable</th>
                                                <th>Période</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Boucle pour afficher chaque stagiaire -->
                                            @foreach($stagiaires as $stagiaire)
                                                <tr>
                                                    <td>{{ $stagiaire->nom }}</td>
                                                    <td>{{ $stagiaire->prenom }}</td>
                                                    <td>{{ $stagiaire->adresse }}</td>
                                                    <td>{{ $stagiaire->cin }}</td>
                                                    <td>{{ $stagiaire->carte_sejour }}</td>
                                                    <td>{{ $stagiaire->numero_cnss }}</td>
                                                    <td>{{ $stagiaire->id_fiscal }}</td>
                                                    <td>{{ $stagiaire->montant_brut }}</td>
                                                    <td>{{ $stagiaire->indemnite }}</td>
                                                    <td>{{ $stagiaire->retenues }}</td>
                                                    <td>{{ $stagiaire->net_imposable }}</td>
                                                    <td>{{ $stagiaire->periode }}</td>
                                                    <td>
                                                    
                <a href="{{ route('stagiaires.edit', ['id_periode' => $id_periode, 'id' => $stagiaire->id]) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('stagiaires.destroy', ['id_periode' => $id_periode, 'id' => $stagiaire->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce stagiaire?')">Supprimer</button>
                </form>
            
          
            
            </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('css')
    <style>
        .table-header th {
            height: 60px; /* Ajustez la hauteur selon vos besoins */
        }
    </style>
@endpush

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Script JS personnalisé ici si nécessaire
    </script>
@endpush
