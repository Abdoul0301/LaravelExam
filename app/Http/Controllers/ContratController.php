<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveContratRequest;
use App\Models\Contrat;
use Exception;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::paginate(10);
        return view('contrats.index', compact('contrats'));
    }


    public function create()
    {
        return view('contrats.create');
    }


    public function edit(Contrat $contrat)
    {
        return view('contrats.edit', compact('contrat'));
    }


    //Interraction avec la BD

    public function store(Contrat $contrat, saveContratRequest $request)
    {
        //Enregistrer un nouveau Contrat
        try {

            $contrat->name = $request->name;

            $contrat->save();

            return redirect()->route('contrat.index')->with('success_message', 'Contrat enregistré');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function update(Contrat $contrat, saveContratRequest $request)
    {
        //Enregistrer un nouveau Contrat
        try {
            $contrat->name = $request->name;

            $contrat->update();

            return redirect()->route('contrat.index')->with('success_message', 'Contrat mis à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Contrat $contrat)
    {
        //Enregistrer un nouveau Contrat
        try {
            $contrat->delete();

            return redirect()->route('contrat.index')->with('success_message', 'Contrat supprimé');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
