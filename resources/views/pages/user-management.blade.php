@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Utilisateurs et leurs rôles</h6>
                </div>
                @if(auth()->user()->hasAnyRole(['admin', 'user']))
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
            
            </div>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr>
                            <th>Nom d'utilisateur</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                        @if (!$loop->last)
                                            , <!-- Ajoute une virgule sauf pour le dernier rôle -->
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
            </div>
        </div>
    </div>
@endsection
