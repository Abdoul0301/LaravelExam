@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Absences</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Demande</h3>
            <div class="section-intro">Demander ici un nouveau absence</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('absence.store') }}">
                        @csrf
                        @method('POST')



                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">type absences</label>
                            <select name="type_absences" id="type_absences" class="form-control">

                                <option value=""></option>
                                <option value="maladie">maladie</option>
                                <option value="evenement">evenement</option>
                                <option value="conges">congés</option>
                            </select>


                            @error('type_absences')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Explication</label>
                            <input type="text" class="form-control" id="setting-input-3" name="explication"
                                   placeholder="Entrer explication" value="{{old('explication')}}">


                            @error('explication')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Date de début</label>
                            <input type="date" class="form-control" id="setting-input-3" name="date_debut"
                                   placeholder="Entrer date de debut" value="{{old('date_debut')}}">


                            @error('date_debut')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Date de fin</label>
                            <input type="date" class="form-control" id="setting-input-3" name="date_fin"
                                   placeholder="Entrer date de fin" value="{{old('date_fin')}}">


                            @error('date_fin')
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
