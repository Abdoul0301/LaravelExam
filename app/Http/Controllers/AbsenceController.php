<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveAbsenceRequest;
use App\Models\Absence;
use Exception;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::paginate(10);
        return view('absences.index', compact('absences'));
    }


    public function create()
    {
        return view('absences.create');
    }


    public function edit(Absence $absence)
    {
        return view('absences.edit', compact('absence'));
    }


    //Interraction avec la BD

    public function store(Absence $absence, saveAbsenceRequest $request)
    {
        //Enregistrer un nouveau département
        try {

            $absence->type_absences = $request->type_absences;
            $absence->explication = $request->explication;
            $absence->date_debut = $request->date_debut;
            $absence->date_fin = $request->date_fin;
            //$absence->status = $request->status;

            $absence->save();

            return redirect()->route('absence.index')->with('success_message', 'absence enregistré');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function update(Absence $absence, saveAbsenceRequest $request)
    {
        //Enregistrer un nouveau département
        try {
            $absence->type_absences = $request->type_absences;
            $absence->explication = $request->explication;
            $absence->date_debut = $request->date_debut;
            $absence->date_fin = $request->date_fin;
            //$absence->status = $request->status;

            $absence->update();

            return redirect()->route('absence.index')->with('success_message', 'absence mis à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Absence $absence)
    {
        //Enregistrer un nouveau département
        try {
            $absence->delete();

            return redirect()->route('absence.index')->with('success_message', 'absence supprimé');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
