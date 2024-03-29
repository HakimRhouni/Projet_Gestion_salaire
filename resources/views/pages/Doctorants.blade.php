@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-50'])

@section('content')


   
 


    @include('layouts.navbars.auth.topnav', ['title' => 'Doctorants'])

    

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Liste des Doctorants</h5>
                                <a href="{{ route('doctorants.create', ['id_periode' => $id_periode]) }}" class="btn btn-primary">Ajouter Doctorant</a>
                                <a href="{{ route('doctorants.pdf', ['id_periode' => $id_periode]) }}" class="btn btn-primary">Imprimer PDF</a>

                            </div>
                            <div class="card-body">
                                @if(count($doctorants) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Prénom</th>
                                                    <th scope="col">Adresse</th>
                                                    <th scope="col">Numéro CIN</th>
                                                    <th scope="col">Carte de Séjour</th>
                                                    <th scope="col">Brut Indemnités</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($doctorants as $doctorant)
                                                    <tr>
                                                        <td>{{ $doctorant->nom }}</td>
                                                        <td>{{ $doctorant->prenom }}</td>
                                                        <td>{{ $doctorant->adresse }}</td>
                                                        <td>{{ $doctorant->numero_cin }}</td>
                                                        <td>{{ $doctorant->carte_sejour }}</td>
                                                        <td>{{ $doctorant->brut_indemnites }}</td>
                                                        <td>
                                                        <a href="{{ route('doctorants.edit', ['id_periode' => $doctorant->id_periode, 'id_societe' => $doctorant->id_societe, 'id' => $doctorant->id]) }}" class="btn btn-primary">Modifier</a>

<!-- Bouton Supprimer -->
<form action="{{ route('doctorants.destroy', ['id_periode' => $doctorant->id_periode, 'id_societe' => $doctorant->id_societe, 'id' => $doctorant->id]) }}" method="POST" style="display: inline;">
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
                                    <p>Aucun doctorant trouvé.</p>
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
