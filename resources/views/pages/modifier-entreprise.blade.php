@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
<link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>

@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h5 class="h3 mb-0">Modifier l'entreprise {{ $entreprise->raison_sociale }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('modifier-entreprise', ['id' => $entreprise->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="raison_sociale">Raison sociale</label>
                                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" value="{{ $entreprise->raison_sociale }}">
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $entreprise->nom }}">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $entreprise->prenom }}">
                                </div>
                                <div class="form-group">
                                    <label for="n_cin">N CIN</label>
                                    <input type="text" class="form-control" id="n_cin" name="n_cin" value="{{ $entreprise->n_cin }}">
                                </div>
                                <div class="form-group">
                                    <label for="n_carte_sejour">N Carte séjour</label>
                                    <input type="text" class="form-control" id="n_carte_sejour" name="n_carte_sejour" value="{{ $entreprise->n_carte_sejour }}">
                                </div>
                                <div class="form-group">
                                    <label for="siege_social">Siège social</label>
                                    <input type="text" class="form-control" id="siege_social" name="siege_social" value="{{ $entreprise->siege_social }}">
                                </div>
                                <div class="form-group">
                                    <label for="commune">Commune</label>
                                    <input type="text" class="form-control" id="commune" name="commune" value="{{ $entreprise->commune }}">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $entreprise->telephone }}">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax" value="{{ $entreprise->fax }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $entreprise->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="forme_juridique">Forme juridique</label>
                                    <input type="text" class="form-control" id="forme_juridique" name="forme_juridique" value="{{ $entreprise->forme_juridique }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_fiscal">Identifiant fiscal</label>
                                    <input type="text" class="form-control" id="id_fiscal" name="id_fiscal" value="{{ $entreprise->id_fiscal }}">
                                </div>
                                <div class="form-group">
                                    <label for="n_taxe_pro">N Taxe pro</label>
                                    <input type="text" class="form-control" id="n_taxe_pro" name="n_taxe_pro" value="{{ $entreprise->n_taxe_pro }}">
                                </div>
                                <div class="form-group">
                                    <label for="regime">Régime</label>
                                    <input type="text" class="form-control" id="regime" name="regime" value="{{ $entreprise->regime }}">
                                </div>
                                <div class="form-group">
                                    <label for="numero_ice">Numéro ICE</label>
                                    <input type="text" class="form-control" id="numero_ice" name="numero_ice" value="{{ $entreprise->numero_ice }}">
                                </div>
                                <div class="form-group">
                                    <label for="numero_rc">Numéro RC</label>
                                    <input type="text" class="form-control" id="numero_rc" name="numero_rc" value="{{ $entreprise->numero_rc }}">
                                </div>
                                <div class="form-group">
                                    <label for="n_cnss">N CNSS</label>
                                    <input type="text" class="form-control" id="n_cnss" name="n_cnss" value="{{ $entreprise->n_cnss }}">
                                </div>
                                <div class="form-group">
                                    <label for="modele">Modèle Comptable</label>
                                    <input type="text" class="form-control" id="modele" name="modele" value="{{ $entreprise->modele }}">
                                </div>
                                <div class="form-group">
                                    <label for="date_creation">Date Création</label>
                                    <input type="date" class="form-control" id="date_creation" name="date_creation" value="{{ $entreprise->date_creation }}">
                                </div>
                                <div class="form-group">
                                    <label for="date_premier_acte_exploitation">Date 1er acte d’exploitation</label>
                                    <input type="date" class="form-control" id="date_premier_acte_exploitation" name="date_premier_acte_exploitation" value="{{ $entreprise->date_premier_acte_exploitation }}">
                                </div>
                                <div class="form-group">
                                    <label for="debut_exercice">Début d’exercice</label>
                                    <input type="date" class="form-control" id="debut_exercice" name="debut_exercice" value="{{ $entreprise->debut_exercice }}">
                                </div>
                                <div class="form-group">
                                    <label for="compte_dgi">Compte DGI</label>
                                    <input type="text" class="form-control" id="compte_dgi" name="compte_dgi" value="{{ $entreprise->compte_dgi }}">
                                </div>
                                <div class="form-group">
                                    <label for="mot_de_passe_compte_dgi">Mot de passe du Compte DGI</label>
                                    <input type="password" class="form-control" id="mot_de_passe_compte_dgi" name="mot_de_passe_compte_dgi">
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
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
