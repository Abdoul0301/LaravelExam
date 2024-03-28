@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Employers</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Edition</h3>
            <div class="section-intro">Editer un employer</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('employe.update', $employer->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Departement</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option value=""></option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}"
                                        {{ $employer->departement_id === $departement->id ? 'selected' : '' }}>
                                        {{ $departement->name }}</option>
                                @endforeach

                            </select>

                            @error('departement_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Contrat</label>
                            <select name="contrat_id" id="contrat_id" class="form-control">
                                <option value=""></option>
                                @foreach ($contrats as $contrat)
                                    <option value="{{ $contrat->id }}"
                                        {{ $employer->contrat_id === $contrat->id ? 'selected' : '' }}>
                                        {{ $contrat->name }}</option>
                                @endforeach

                            </select>

                            @error('contrat_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom<span class="ms-2" data-container="body"
                                    data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                        width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                                    </svg></span></label>
                            <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom"
                                name="nom" value="{{ $employer->nom }}" required>


                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Prenom</label>
                            <input type="text" class="form-control" id="setting-input-2" name="prenom"
                                placeholder="Entrer le prenom" value="{{ $employer->prenom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Email</label>
                            <input type="email" class="form-control" id="setting-input-3" name="email"
                                placeholder="Entrer le mail" value="{{ $employer->email }}">


                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Contact</label>
                            <input type="number" class="form-control" id="setting-input-3" name="contact"
                                placeholder="Entrer le contact" value="{{ $employer->contact }}">


                            @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Sexe</label>
                            <input type="text" class="form-control" id="setting-input-3" name="sexe"
                                value="{{ $employer->sexe}}" placeholder="Entrer le sexe">


                            @error('sexe')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="setting-input-3" name="adresse"
                                   value="{{ $employer->adresse}}" placeholder="Entrer l'adresse">


                            @error('adresse')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Mettre a jour</button>
                    </form>
                </div>
                <!--//app-card-body-->

            </div>
            <!--//app-card-->
        </div>
    </div>
@endsection
