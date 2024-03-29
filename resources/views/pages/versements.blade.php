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
                                <h5 class="card-title">Liste des Versements</h5>
                                <a href="{{ route('versements.create', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" class="btn btn-primary">Ajouter Versement</a>
                                <a href="{{ route('versements.pdf',['id_periode' => $id_periode]) }}" class="btn btn-primary">Imprimer PDF</a>

                            </div>
                            <div class="card-body">
                                @if(count($versements) > 0)
                                <table class="table">
                        <thead>
                            <tr>
                                <th>Mois</th>
                                <th>Référence</th>
                                <th>Date de versement</th>
                                <th>Mode de paiement</th>
                                <th>Numéro de quittance</th>
                                <th>Principale</th>
                                <th>Pénalité</th>
                                <th>Majorations</th>
                                <th>Total versé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($versements as $versement)
                            <tr>
                                <td>{{ $versement->mois }}</td>
                                <td>{{ $versement->reference }}</td>
                                <td>{{ $versement->date_versement }}</td>
                                <td>{{ $versement->mode_paiement }}</td>
                                <td>{{ $versement->numero_quittance }}</td>
                                <td>{{ $versement->principale }}</td>
                                <td>{{ $versement->penalite }}</td>
                                <td>{{ $versement->majorations }}</td>
                                <td>{{ $versement->total_verse }}</td>
                                <td>
                                <a href="{{ route('versements.edit', ['id_periode' => $id_periode, 'id' => $versement->id]) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('versements.destroy', ['id_periode' => $id_periode, 'id' => $versement->id]) }}" method="POST" style="display: inline-block;">
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
                                    <p>Aucun versement trouvé.</p>
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
