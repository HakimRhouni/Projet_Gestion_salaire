@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')


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
                            <form action="{{ route('modifier-entreprise', ['id_entreprise' => $entreprise->id_entreprise]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
        <label for="raison_sociale">Raison sociale</label>
        <input type="text" class="form-control @error('raison_sociale') is-invalid @enderror" id="raison_sociale" name="raison_sociale" value="{{ $entreprise->raison_sociale }}">
        @error('raison_sociale')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'nom' -->
    
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $entreprise->nom }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'prenom' -->
    
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $entreprise->prenom }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'n_cin' -->
    
    <div class="form-group">
        <label for="n_cin">N CIN</label>
        <input type="text" class="form-control @error('n_cin') is-invalid @enderror" id="n_cin" name="n_cin" value="{{ $entreprise->n_cin }}">
        @error('n_cin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'n_carte_sejour' -->
    
    <div class="form-group">
        <label for="n_carte_sejour">N Carte séjour</label>
        <input type="text" class="form-control @error('n_carte_sejour') is-invalid @enderror" id="n_carte_sejour" name="n_carte_sejour" value="{{ $entreprise->n_carte_sejour }}">
        @error('n_carte_sejour')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'siege_social' -->
    
    <div class="form-group">
        <label for="siege_social">Siège social</label>
        <input type="text" class="form-control @error('siege_social') is-invalid @enderror" id="siege_social" name="siege_social" value="{{ $entreprise->siege_social }}">
        @error('siege_social')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'commune' -->
    
    <div class="form-group">
        <label for="commune">Commune</label>
        <input type="text" class="form-control @error('commune') is-invalid @enderror" id="commune" name="commune" value="{{ $entreprise->commune }}">
        @error('commune')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'telephone' -->
    
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $entreprise->telephone }}">
        @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'fax' -->
    
    <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ $entreprise->fax }}">
        @error('fax')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Gestion d'erreur pour le champ 'email' -->
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $entreprise->email }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
                                <div class="form-group">
    <label for="forme_juridique">Forme juridique</label>
    <select class="form-control" id="forme_juridique" name="forme_juridique">
        <option value="">Choisissez une forme juridique</option>
        <option value="EI" {{ $entreprise->forme_juridique === 'EI' ? 'selected' : '' }}>Entreprise individuelle (EI)</option>
        <option value="EIRL" {{ $entreprise->forme_juridique === 'EIRL' ? 'selected' : '' }}>Entreprise individuelle à responsabilité limitée (EIRL)</option>
        <option value="SNC" {{ $entreprise->forme_juridique === 'SNC' ? 'selected' : '' }}>Société en nom collectif (SNC)</option>
        <option value="SCS" {{ $entreprise->forme_juridique === 'SCS' ? 'selected' : '' }}>Société en commandite simple (SCS)</option>
        <option value="SARL" {{ $entreprise->forme_juridique === 'SARL' ? 'selected' : '' }}>Société à responsabilité limitée (SARL)</option>
        <option value="SAS" {{ $entreprise->forme_juridique === 'SAS' ? 'selected' : '' }}>Société par actions simplifiée (SAS)</option>
        <option value="SA" {{ $entreprise->forme_juridique === 'SA' ? 'selected' : '' }}>Société anonyme (SA)</option>
        <option value="SCA" {{ $entreprise->forme_juridique === 'SCA' ? 'selected' : '' }}>Société en commandite par actions (SCA)</option>
        <option value="EP" {{ $entreprise->forme_juridique === 'EP' ? 'selected' : '' }}>Entreprise publique</option>
        <option value="Coop" {{ $entreprise->forme_juridique === 'Coop' ? 'selected' : '' }}>Coopérative</option>
    </select>
</div>

<div class="form-group">
    <label for="id_fiscal">Identifiant fiscal</label>
    <input type="text" class="form-control @error('id_fiscal') is-invalid @enderror" id="id_fiscal" name="id_fiscal" value="{{ $entreprise->id_fiscal }}">
    @error('id_fiscal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'n_taxe_pro' -->

<div class="form-group">
    <label for="n_taxe_pro">N Taxe pro</label>
    <input type="text" class="form-control @error('n_taxe_pro') is-invalid @enderror" id="n_taxe_pro" name="n_taxe_pro" value="{{ $entreprise->n_taxe_pro }}">
    @error('n_taxe_pro')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'regime' -->

<div class="form-group">
    <label for="regime">Régime</label>
    <input type="text" class="form-control @error('regime') is-invalid @enderror" id="regime" name="regime" value="{{ $entreprise->regime }}">
    @error('regime')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'numero_ice' -->

<div class="form-group">
    <label for="numero_ice">Numéro ICE</label>
    <input type="text" class="form-control @error('numero_ice') is-invalid @enderror" id="numero_ice" name="numero_ice" value="{{ $entreprise->numero_ice }}">
    @error('numero_ice')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'numero_rc' -->

<div class="form-group">
    <label for="numero_rc">Numéro RC</label>
    <input type="text" class="form-control @error('numero_rc') is-invalid @enderror" id="numero_rc" name="numero_rc" value="{{ $entreprise->numero_rc }}">
    @error('numero_rc')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'n_cnss' -->

<div class="form-group">
    <label for="n_cnss">N CNSS</label>
    <input type="text" class="form-control @error('n_cnss') is-invalid @enderror" id="n_cnss" name="n_cnss" value="{{ $entreprise->n_cnss }}">
    @error('n_cnss')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'modele' -->

<div class="form-group">
    <label for="modele">Modèle Comptable</label>
    <input type="text" class="form-control @error('modele') is-invalid @enderror" id="modele" name="modele" value="{{ $entreprise->modele }}">
    @error('modele')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'date_creation' -->

<div class="form-group">
    <label for="date_creation">Date Création</label>
    <input type="date" class="form-control @error('date_creation') is-invalid @enderror" id="date_creation" name="date_creation" value="{{ $entreprise->date_creation }}">
    @error('date_creation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'date_premier_acte_exploitation' -->

<div class="form-group">
    <label for="date_premier_acte_exploitation">Date 1er acte d’exploitation</label>
    <input type="date" class="form-control @error('date_premier_acte_exploitation') is-invalid @enderror" id="date_premier_acte_exploitation" name="date_premier_acte_exploitation" value="{{ $entreprise->date_premier_acte_exploitation }}">
    @error('date_premier_acte_exploitation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'debut_exercice' -->

<div class="form-group">
    <label for="debut_exercice">Début d’exercice</label>
    <input type="date" class="form-control @error('debut_exercice') is-invalid @enderror" id="debut_exercice" name="debut_exercice" value="{{ $entreprise->debut_exercice }}">
    @error('debut_exercice')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'compte_dgi' -->

<div class="form-group">
    <label for="compte_dgi">Compte DGI</label>
    <input type="text" class="form-control @error('compte_dgi') is-invalid @enderror" id="compte_dgi" name="compte_dgi" value="{{ $entreprise->compte_dgi }}">
    @error('compte_dgi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Gestion d'erreur pour le champ 'mot_de_passe_compte_dgi' -->

<div class="form-group position-relative">
    <label for="mot_de_passe_compte_dgi">Mot de passe du Compte DGI</label>
    <div class="input-group">
        <input type="password" class="form-control @error('mot_de_passe_compte_dgi') is-invalid @enderror" id="mot_de_passe_compte_dgi" name="mot_de_passe_compte_dgi">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary align-middle" type="button" id="togglePassword" onclick="toggle()">
                <!-- Ajoutez ici une icône pour le bouton de bascule du mot de passe -->
            </button>
        </div>
    </div>
    @error('mot_de_passe_compte_dgi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
    function toggle() {
    let passwordInput = document.getElementById('mot_de_passe_compte_dgi');
    let toggleButton = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        `;
    } else {
        passwordInput.type = 'password';
        toggleButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        `;
    }
}

</script>
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
