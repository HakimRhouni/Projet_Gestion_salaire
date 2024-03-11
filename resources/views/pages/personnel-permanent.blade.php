@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
<link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

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
                            <a href="{{ route('personnel_permanent.create', ['id_societe' => $id_societe, 'id_periode' => $id_periode]) }}" class="btn btn-primary">Ajouter Personnel Permanent</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                                <a href="{{ route('personnel_permanent.edit', $personnelPermanent->id_personnel_permanent) }}" class="btn btn-warning">Modifier</a>
                                                <a action="{{ route('personnel_permanent.destroy', $personnelPermanent->id_personnel_permanent) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning">Supprimer</button>
                                                </a>
                                            </td> <!-- Ajout des boutons de modification et de suppression -->
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
    @include('layouts.footers.auth.footer')
</div>
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
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
        $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
    </script>
@endpush
