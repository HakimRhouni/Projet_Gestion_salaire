@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
   

    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter Doctorant'])



    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter un Versement</h5>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('versements.store', ['id_periode' => $id_periode, 'id_societe' => $id_societe]) }}">

                            @csrf

                            <div class="form-group row">
                                <label for="mois" class="col-md-4 col-form-label text-md-right">{{ __('Mois') }}</label>

                                <div class="col-md-6">
                                    <input id="mois" type="text" class="form-control @error('mois') is-invalid @enderror" name="mois" value="{{ old('mois') }}" required autofocus>

                                    @error('mois')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reference" class="col-md-4 col-form-label text-md-right">{{ __('Référence') }}</label>

                                <div class="col-md-6">
                                    <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required>

                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_versement" class="col-md-4 col-form-label text-md-right">{{ __('Date versement') }}</label>

                                <div class="col-md-6">
                                    <input id="date_versement" type="date" class="form-control @error('date_versement') is-invalid @enderror" name="date_versement" value="{{ old('date_versement') }}" required>

                                    @error('date_versement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mode_paiement" class="col-md-4 col-form-label text-md-right">{{ __('Mode paiement') }}</label>

                                <div class="col-md-6">
                                    <input id="mode_paiement" type="text" class="form-control @error('mode_paiement') is-invalid @enderror" name="mode_paiement" value="{{ old('mode_paiement') }}" required>

                                    @error('mode_paiement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="numero_quittance" class="col-md-4 col-form-label text-md-right">{{ __('Numéro quittance') }}</label>

                                <div class="col-md-6">
                                    <input id="numero_quittance" type="text" class="form-control @error('numero_quittance') is-invalid @enderror" name="numero_quittance" value="{{ old('numero_quittance') }}" required>

                                    @error('numero_quittance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="principale" class="col-md-4 col-form-label text-md-right">{{ __('Principale') }}</label>

                                <div class="col-md-6">
                                    <input id="principale" type="text" class="form-control @error('principale') is-invalid @enderror" name="principale" value="{{ old('principale') }}" required>

                                    @error('principale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penalite" class="col-md-4 col-form-label text-md-right">{{ __('Pénalité') }}</label>

                                <div class="col-md-6">
                                    <input id="penalite" type="text" class="form-control @error('penalite') is-invalid @enderror" name="penalite" value="{{ old('penalite') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 44" required>

                                    @error('penalite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="majorations" class="col-md-4 col-form-label text-md-right">{{ __('Majorations') }}</label>

                                <div class="col-md-6">
                                    <input id="majorations" type="text" class="form-control @error('majorations') is-invalid @enderror" name="majorations" value="{{ old('majorations') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 44" required>

                                    @error('majorations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_verse" class="col-md-4 col-form-label text-md-right">{{ __('Total versé') }}</label>

                                <div class="col-md-6">
                                    <input id="total_verse" type="text" class="form-control @error('total_verse') is-invalid @enderror" name="total_verse" value="{{ old('total_verse') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 44" required>

                                    @error('total_verse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
