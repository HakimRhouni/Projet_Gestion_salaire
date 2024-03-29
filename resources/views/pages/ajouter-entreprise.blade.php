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
                                <h6>Ajouter une Entreprise</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('ajouter-entreprise') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="raison_sociale" class="form-label">Raison sociale</label>
                                        <input type="text" class="form-control @error('raison_sociale') is-invalid @enderror" id="raison_sociale" name="raison_sociale" placeholder="Raison sociale" required>
                                        @error('raison_sociale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom">
                                        @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prénom">
                                        @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_cin" class="form-label">N CIN</label>
                                        <input type="text" class="form-control @error('n_cin') is-invalid @enderror" id="n_cin" name="n_cin" placeholder="N CIN">
                                        @error('n_cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_carte_sejour" class="form-label">N Carte séjour</label>
                                        <input type="text"  class="form-control @error('n_carte_sejour') is-invalid @enderror" id="n_carte_sejour" name="n_carte_sejour" placeholder="N Carte séjour">
                                        @error('n_carte_sejour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="siege_social" class="form-label">Siège social</label>
                                        <input type="text area" class="form-control @error('siege_social') is-invalid @enderror" id="siege_social" name="siege_social" placeholder="Siège social">
                                        @error('siege_social')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="commune" class="form-label">Commune</label>
                                        <input type="text" class="form-control @error('commune') is-invalid @enderror" id="commune" name="commune" placeholder="Commune" required>
                                        @error('commune')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Téléphone</label>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" placeholder="Téléphone" required>
                                        @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="fax" class="form-label">Fax</label>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="fax" name="fax" placeholder="Fax">
                                        @error('fax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
    <label for="forme_juridique" class="form-label">Forme juridique</label>
    <select class="form-select" id="forme_juridique" name="forme_juridique" required>
        <option value="">Choisissez une forme juridique</option>
        <option value="EI">Entreprise individuelle (EI)</option>
        <option value="EIRL">Entreprise individuelle à responsabilité limitée (EIRL)</option>
        <option value="SNC">Société en nom collectif (SNC)</option>
        <option value="SCS">Société en commandite simple (SCS)</option>
        <option value="SARL">Société à responsabilité limitée (SARL)</option>
        <option value="SAS">Société par actions simplifiée (SAS)</option>
        <option value="SA">Société anonyme (SA)</option>
        <option value="SCA">Société en commandite par actions (SCA)</option>
        <option value="EP">Entreprise publique</option>
        <option value="Coop">Coopérative</option>
    </select>
</div>
                                    <div class="mb-3">
                                        <label for="id_fiscal" class="form-label">Identifiant fiscal</label>
                                        <input type="text" class="form-control @error('id_fiscal') is-invalid @enderror" id="id_fiscal" name="id_fiscal" placeholder="Identifiant fiscal" required>
                                        @error('id_fiscal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_taxe_pro" class="form-label">N Taxe pro</label>
                                        <input type="text" class="form-control @error('n_taxe_pro') is-invalid @enderror" id="n_taxe_pro" name="n_taxe_pro" placeholder="N Taxe pro">
                                        @error('n_taxe_pro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="regime" class="form-label">Régime</label>
                                        <input type="text" class="form-control" id="regime" name="regime" placeholder="Régime" required>
                                        @error('regime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="mb-3">
    <label for="numero_ice" class="form-label">Numéro ICE</label>
    <input type="text" class="form-control @error('numero_ice') is-invalid @enderror" id="numero_ice" name="numero_ice" placeholder="Numéro ICE">
    @error('numero_ice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="numero_rc" class="form-label">Numéro RC</label>
    <input type="text" class="form-control @error('numero_rc') is-invalid @enderror" id="numero_rc" name="numero_rc" placeholder="Numéro RC">
    @error('numero_rc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="n_cnss" class="form-label">N CNSS</label>
    <input type="text" class="form-control @error('n_cnss') is-invalid @enderror" id="n_cnss" name="n_cnss" placeholder="N CNSS">
    @error('n_cnss')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="modele" class="form-label">Modèle Comptable</label>
    <input type="text" class="form-control @error('modele') is-invalid @enderror" id="modele" name="modele" placeholder="Modèle Comptable" required>
    @error('modele')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="date_creation" class="form-label">Date Création</label>
    <input type="date" class="form-control @error('date_creation') is-invalid @enderror" id="date_creation" name="date_creation" placeholder="Date Création">
    @error('date_creation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="date_premier_acte_exploitation" class="form-label">Date 1er acte d’exploitation</label>
    <input type="date" class="form-control @error('date_premier_acte_exploitation') is-invalid @enderror" id="date_premier_acte_exploitation" name="date_premier_acte_exploitation" placeholder="Date 1er acte d’exploitation">
    @error('date_premier_acte_exploitation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="debut_exercice" class="form-label">Début d’exercice</label>
    <input type="date" class="form-control @error('debut_exercice') is-invalid @enderror" id="debut_exercice" name="debut_exercice" placeholder="Début d’exercice">
    @error('debut_exercice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="compte_dgi" class="form-label">Compte DGI</label>
    <input type="text" class="form-control @error('compte_dgi') is-invalid @enderror" id="compte_dgi" name="compte_dgi" placeholder="Compte DGI">
    @error('compte_dgi')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
                                   
                                    <div class="form-group position-relative">
    <label for="mot_de_passe_compte_dgi">Mot de passe du Compte DGI</label>
    <div class="input-group">
        <input type="password" class="form-control" id="mot_de_passe_compte_dgi" name="mot_de_passe_compte_dgi">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary align-middle" type="button" id="togglePasswordButton">
                Afficher
            </button>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success">Ajouter</button>
</div>
</div>    
                                   
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var toggleButton = document.getElementById("togglePasswordButton");
    var passwordField = document.getElementById("mot_de_passe_compte_dgi");

    toggleButton.addEventListener("click", function() {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Masquer";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Afficher";
        }
    });
});
    
</script>

