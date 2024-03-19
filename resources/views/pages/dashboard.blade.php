@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Entreprise'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Entreprises</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        
                                        <a href="{{ route('ajouter-entreprise') }}" class="btn btn-success" aria-label="Ajouter une entreprise">Ajouter</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                @if(count($entreprises) > 0)
                                    <table class="table table-striped align-middle">
                                        <thead class="table-header">
                                            <tr>
                                                <th>Raison sociale</th>
                                                <th>ID Fiscal</th>
                                                <th>Forme juridique</th>
                                                <th>Régime</th>
                                                <th>Modèle</th>
                                                <th>Téléphone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($entreprises as $entreprise)
                                             
                                             <tr onclick="window.location='{{ route('dashboard.periode', ['raison_sociale' => $entreprise->raison_sociale]) }}';" style="cursor:pointer;">


    <td>{{ $entreprise->raison_sociale }}</td>
    <td>{{ $entreprise->id_fiscal }}</td>
    <td>{{ $entreprise->forme_juridique }}</td>
    <td>{{ $entreprise->regime }}</td>
    <td>{{ $entreprise->modele }}</td>
    <td>{{ $entreprise->telephone }}</td>
    <td>
        <a href="{{ route('modifier-entreprise.update', ['id' => $entreprise->id]) }}" class="btn btn-warning">Modifier</a>
        <a href="{{ route('entreprise.supprimer', ['id' => $entreprise->id]) }}" class="btn btn-warning">Supprimer</a>
    </td>
</tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Aucune entreprise trouvé.</p>
                                @endif
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
