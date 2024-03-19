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
                                        <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" placeholder="Raison sociale" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_cin" class="form-label">N CIN</label>
                                        <input type="text" class="form-control" id="n_cin" name="n_cin" placeholder="N CIN">
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_carte_sejour" class="form-label">N Carte séjour</label>
                                        <input type="text" class="form-control" id="n_carte_sejour" name="n_carte_sejour" placeholder="N Carte séjour">
                                    </div>
                                    <div class="mb-3">
                                        <label for="siege_social" class="form-label">Siège social</label>
                                        <input type="text area" class="form-control" id="siege_social" name="siege_social" placeholder="Siège social">
                                    </div>
                                    <div class="mb-3">
                                        <label for="commune" class="form-label">Commune</label>
                                        <input type="text" class="form-control" id="commune" name="commune" placeholder="Commune" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fax" class="form-label">Fax</label>
                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
                                        <input type="text" class="form-control" id="id_fiscal" name="id_fiscal" placeholder="Identifiant fiscal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_taxe_pro" class="form-label">N Taxe pro</label>
                                        <input type="text" class="form-control" id="n_taxe_pro" name="n_taxe_pro" placeholder="N Taxe pro">
                                    </div>
                                    <div class="mb-3">
                                        <label for="regime" class="form-label">Régime</label>
                                        <input type="text" class="form-control" id="regime" name="regime" placeholder="Régime" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero_ice" class="form-label">Numéro ICE</label>
                                        <input type="text" class="form-control" id="numero_ice" name="numero_ice" placeholder="Numéro ICE">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero_rc" class="form-label">Numéro RC</label>
                                        <input type="text" class="form-control" id="numero_rc" name="numero_rc" placeholder="Numéro RC">
                                    </div>
                                    <div class="mb-3">
                                        <label for="n_cnss" class="form-label">N CNSS</label>
                                        <input type="text" class="form-control" id="n_cnss" name="n_cnss" placeholder="N CNSS">
                                    </div>
                                    <div class="mb-3">
                                        <label for="modele" class="form-label">Modèle Comptable</label>
                                        <input type="text" class="form-control" id="modele" name="modele" placeholder="Modèle Comptable" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_creation" class="form-label">Date Création</label>
                                        <input type="date" class="form-control" id="date_creation" name="date_creation" placeholder="Date Création">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_premier_acte_exploitation" class="form-label">Date 1er acte d’exploitation</label>
                                        <input type="date" class="form-control" id="date_premier_acte_exploitation" name="date_premier_acte_exploitation" placeholder="Date 1er acte d’exploitation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="debut_exercice" class="form-label">Début d’exercice</label>
                                        <input type="date" class="form-control" id="debut_exercice" name="debut_exercice" placeholder="Début d’exercice">
                                    </div>
                                    <div class="mb-3">
                                        <label for="compte_dgi" class="form-label">Compte DGI</label>
                                        <input type="text" class="form-control" id="compte_dgi" name="compte_dgi" placeholder="Compte DGI">
                                    </div>
                                    <div class="form-group position-relative">
    <label for="mot_de_passe_compte_dgi">Mot de passe du Compte DGI</label>
    <div class="input-group">
        <input type="password" class="form-control" id="mot_de_passe_compte_dgi" name="mot_de_passe_compte_dgi">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary align-middle" type="button" id="togglePassword" onclick="toggle()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                    
                </svg>
            </button>
        </div>
    </div>
</div>    
                                    <button type="submit" class="btn btn-success">Ajouter</button>
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

