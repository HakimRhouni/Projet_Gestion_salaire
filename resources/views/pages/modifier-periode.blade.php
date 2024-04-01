@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">Modifier Période</div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('periodes.update', ['id_periode' => $periode->id_periode]) }}">
    @csrf
    @method('PUT')

    <!-- Gestion d'erreur pour le champ 'annee' -->
    <div class="mb-3">
        <label for="annee" class="form-label">Année</label>
        <input type="text" class="form-control @error('annee') is-invalid @enderror" id="annee" name="annee" value="{{ $periode->annee }}">
        @error('annee')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Gestion d'erreur pour le champ 'debut_exercice' -->
    <div class="mb-3">
        <label for="debut_exercice" class="form-label">Début de l'exercice</label>
        <input type="date" class="form-control @error('debut_exercice') is-invalid @enderror" id="debut_exercice" name="debut_exercice" value="{{ $periode->debut_exercice }}">
        @error('debut_exercice')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Gestion d'erreur pour le champ 'fin_exercice' -->
    <div class="mb-3">
        <label for="fin_exercice" class="form-label">Fin de l'exercice</label>
        <input type="date" class="form-control @error('fin_exercice') is-invalid @enderror" id="fin_exercice" name="fin_exercice" value="{{ $periode->fin_exercice }}">
        @error('fin_exercice')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Ajoutez d'autres champs de formulaire pour modifier la période ici -->

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
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

@push('js')

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
