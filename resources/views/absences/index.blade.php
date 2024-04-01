@extends('layouts.template')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Absences</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">

                        </form>

                    </div>

                    <div class="col-auto">
                        <a class="btn app-btn-secondary" href="{{ route('absence.create') }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Demande absence
                        </a>
                    </div>
                </div>
                <!--//row-->
            </div>
            <!--//table-utilities-->
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->



    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Employé</th>
                            <th class="cell">Type</th>
                            <th class="cell">Explication</th>
                            <th class="cell">Date Début</th>
                            <th class="cell">Date Fin</th>
                            <th class="cell">Statut</th>
                            <th class="cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($absences as $absence)
                            @if(auth()->user()->id === $absence->user->id)
                                <tr>
                                    <td class="cell">{{ $absence->id}}</td>
                                    <td class="cell">{{ $absence->user->name}}</td>
                                    <td class="cell">{{ $absence->type_absences}}</td>
                                    <td class="cell">{{ $absence->explication}}</td>
                                    <td class="cell">{{ $absence->date_debut}}</td>
                                    <td class="cell">{{ $absence->date_fin}}</td>
                                    <td class="cell"><span class="badge bg-success">{{ $absence->status}}</span></td>


                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary"
                                           href="{{ route('absence.delete', $absence->id) }}">Retirer</a>

                                        @if(auth()->user()->role === 'administrateur')
                                            <!-- Afficher le bouton pour l'administrateur -->
                                            <a class="btn-sm app-btn-secondary"
                                               href="{{ route('absence.edit', $absence->id) }}">Editer</a>
                                        @endif

                                    </td>

                                </tr>
                            @endif
                            @if(auth()->user()->id !== $absence->user->id)
                                <tr>
                                    <td class="cell" colspan="4">Aucun demande d'absence lier à {{auth()->user()->name}} </td>

                                </tr>
                            @endif
                        @empty

                        @endforelse



                    </tbody>
                </table>
            </div>
            <!--//table-responsive-->

        </div>
        <!--//app-card-body-->
    </div>
    <!--//app-card-->
    <nav class="app-pagination">
        {{ $absences->links() }}
    </nav>
    <!--//app-pagination-->
    <!--//tab-content-->
@endsection
