@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Contrats</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Ajout</h3>
            <div class="section-intro">Ajouter ici un nouveau contrat</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('contrat.store') }}">
                        @csrf
                        @method('POST')



                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom <span class="ms-2" data-container="body"
                                    data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                        width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                                    </svg></span></label>
                            <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom"
                                name="name" value="{{ old('name') }}" required>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                    </form>
                </div>
                <!--//app-card-body-->

            </div>
            <!--//app-card-->
        </div>
    </div>
@endsection
