@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
<link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

@include('layouts.navbars.auth.topnav', ['title' => 'Salaries Exoneré'])



div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">salaries exoneres</h5>
                            
                            <a href="{{ route('salaries_exoneration.create', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}" class="btn btn-primary">Créer un salarié exonéré</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            @if(count($salaries_exoneres) > 0)
                                <table class="table table-striped align-middle">
                                    <thead class="table-header">
                                    <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro CIN</th>
                    <th>Carte de séjour</th>
                    <th>ID fiscale</th>
                    <th>Brut des traitements</th>
                    <th>Avantages</th>
                    <th>Indemnité</th>
                    <th>Revenu brut imposable</th>
                    <th>Retenues opérées</th>
                    <th>Revenu Net Imposable</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries_exoneres as $salarie)
                    <tr>
                        <td>{{ $salarie->nom }}</td>
                        <td>{{ $salarie->prenom }}</td>
                        <td>{{ $salarie->numero_cin }}</td>
                        <td>{{ $salarie->carte_sejour }}</td>
                        <td>{{ $salarie->id_fiscale }}</td>
                        <td>{{ $salarie->brut_traitements }}</td>
                        <td>{{ $salarie->avantages }}</td>
                        <td>{{ $salarie->indemnite }}</td>
                        <td>{{ $salarie->revenu_brut_imposable }}</td>
                        <td>{{ $salarie->retenues_operees }}</td>
                        <td>{{ $salarie->revenu_net_imposable }}</td>
                        <td>
                        <a href="{{ route('salaries_exoneration.edit', $salarie->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                               
                                                <!-- Bouton de suppression -->
                                                <form action="{{ route('salaries_exoneration.destroy', $salarie->id , ) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce salarié exonéré?')">Supprimer</button>
                                                </form>
                                            </td>
                    </tr>
                @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>Aucun salarie exoneré trouvé.</p>
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
