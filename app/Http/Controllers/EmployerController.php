<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Contrat;
use App\Models\Departement;
use App\Models\Employer;
use Exception;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::with('departement','contrat')->paginate(10);
        return view('employers.index', compact('employers'));
    }


    public function create()
    {
        $departements = Departement::all();
        $contrats = Contrat::all();
        return view('employers.create', compact('departements','contrats'));
    }


    public function edit(Employer $employer)
    {
        $departements = Departement::all();
        $contrats = Contrat::all();
        return view('employers.edit', compact('employer', 'departements','contrats'));
    }

    public function store(StoreEmployeRequest $request)
    {
        try {
            $query = Employer::create($request->all());
            if ($query) {
                return redirect()->route('employer.index')->with('success_message', 'Employer ajouté');
            }
        } catch (Exception $e) {
            dd($e);
        }


    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        try {
            $employer->nom = $request->nom;
            $employer->prenom = $request->prenom;
            $employer->email = $request->email;
            $employer->contact = $request->contact;
            $employer->sexe = $request->sexe;
            $employer->adresse = $request->adresse;
            $employer->departement_id = $request->departement_id;
            $employer->contrat_id = $request->contrat_id;



            $employer->update();


            return redirect()->route('employer.index')->with('success_message', 'Les informations de l\'employer ont été mise à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function delete(Employer $employer)
    {
        try {
            $employer->delete();

            return redirect()->route('employer.index')->with('success_message', 'Employer retirer');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
