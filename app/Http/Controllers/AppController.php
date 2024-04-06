<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministrateurs = User::all()->count();
        $totalContrats = Contrat::all()->count();
        $nbClientsMasculin = User::where('sexe', 'masculin')->count();
        $nbClientsFeminin = User::where('sexe', 'feminin')->count();



        return view('dashboard',compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs','totalContrats','nbClientsMasculin','nbClientsFeminin'));
    }

    public function downloadPdf1()
    {
        $pdf = PDF::loadView('attespdf');

        return $pdf->download('Attestation_de_travail.pdf');
    }

    public function downloadPdf2()
    {
        $pdf = PDF::loadView('contratpdf');

        return $pdf->download('Contrat_de_travail.pdf');
    }
}
