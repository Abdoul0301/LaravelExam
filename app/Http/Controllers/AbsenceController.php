<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveAbsenceRequest;
use App\Models\Absence;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with('user')->paginate(10);
        return view('absences.index', compact('absences'));
    }


    public function create()
    {
        $users = User::all();
        return view('absences.create', compact('users'));
    }


    public function edit(Absence $absence)
    {
        $users = User::all();
        return view('absences.edit', compact('absence','users'));
    }


    //Interraction avec la BD

    public function store(Absence $absence, saveAbsenceRequest $request)
    {
        //Enregistrer un nouveau département
        try {
            $absence->user_id = $request->user_id;
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
            $absence->user_id = $request->user_id;
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

    public function accept(Absence $absence)
    {
        $absence->status = 'valider';
        $absence->save();

        return redirect()->back()->with('success', 'Absence acceptée avec succès.');
    }

    public function refuse(Absence $absence)
    {
        $absence->status = 'refuser';
        $absence->save();

        return redirect()->back()->with('success', 'Absence refusée avec succès.');
    }




}
