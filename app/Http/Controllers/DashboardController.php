<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use App\Models\Diagnosis;
use App\Models\Gejala;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count data
        $diagnosisCount = Diagnosis::count();
        $symptomCount = Gejala::count();
        $diseaseCount = Penyakit::count();

        return view('dashboard.index', compact(
            'diagnosisCount', 'symptomCount', 'diseaseCount'
        ));
    }
}
