<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Aturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Pindahkan ke sini

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('konsultasi.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required'
        ]);

        session([
            'pasien' => [
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan
            ],
            'question_index' => 0,
            'selected_gejalas' => []
        ]);

        return redirect()->route('konsultasi.questions');
    }

    public function questions(Request $request)
    {
        $gejalas = Gejala::all();
        $currentIndex = $request->session()->get('question_index', 0);
        $currentQuestion = $gejalas->get($currentIndex);

        $hasNext = $currentIndex + 1 < $gejalas->count();

        if (!$currentQuestion) {
            return redirect()->route('konsultasi.diagnosis');
        }

        return view('konsultasi.questions', compact('currentQuestion', 'hasNext'));
    }

    public function answer(Request $request)
    {
        $jawaban = $request->input('jawaban');
        $currentIndex = $request->session()->get('question_index', 0);
        $selectedGejalas = $request->session()->get('selected_gejalas', []);

        if ($jawaban === 'Ya') {
            $gejala = Gejala::orderBy('id')->skip($currentIndex)->first();
            if ($gejala && !in_array($gejala->id, $selectedGejalas)) {
                $selectedGejalas[] = $gejala->id;
                $request->session()->put('selected_gejalas', $selectedGejalas);
            }
        }

        // Cek hasil diagnosis setelah setiap jawaban
        return $this->performDiagnosis($request);
    }

    // Fungsi untuk memeriksa diagnosis berdasarkan gejala yang dipilih
    private function performDiagnosis(Request $request)
    {
        $selectedGejalaIds = $request->session()->get('selected_gejalas', []);
        $pasien = session('pasien');
        $gejalaDipilih = Gejala::whereIn('id', $selectedGejalaIds)->get();

        $diagnosisResults = [];
        $penyakitTerkait = null;

        // Ambil semua penyakit dan gejala terkait dari tabel aturan
        $penyakitDenganGejala = Aturan::with('penyakit')
            ->select('penyakit_id', DB::raw('GROUP_CONCAT(gejala_id) as gejalas'))
            ->groupBy('penyakit_id')
            ->get();

        foreach ($penyakitDenganGejala as $item) {
            $gejalaInRule = explode(',', $item->gejalas); // Konversi ke array

            // Hitung kesamaan antara gejala yang dipilih dan gejala dalam aturan
            $intersect = array_intersect($selectedGejalaIds, $gejalaInRule);

            if (count($intersect) >= count($gejalaInRule) * 1) { 
                $penyakit = $item->penyakit;

                if ($penyakit) {
                    $diagnosisResults[] = [
                        'penyakit' => $penyakit->nama_penyakit,
                        'definisi' => $penyakit->definisi,
                        'solusi' => $penyakit->solusi,
                    ];

                    $penyakitTerkait = $penyakit->id;
                }
            }
        }

        // Jika ada penyakit yang terdeteksi, simpan diagnosis ke database
        if ($penyakitTerkait !== null) {
            DB::table('diagnoses')->insert([
                'penyakit_id' => $penyakitTerkait,
                'nama' => $pasien['nama'],
                'jenis_kelamin' => $pasien['jenis_kelamin'],
                'alamat' => $pasien['alamat'],
                'pekerjaan' => $pasien['pekerjaan'],
                'answer_log' => json_encode($selectedGejalaIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Jika diagnosis sudah ditemukan, tampilkan hasil diagnosis
        if (!empty($diagnosisResults)) {
            return view('konsultasi.diagnosis', [
                'diagnosis' => $diagnosisResults,
                'pasien' => $pasien,
                'gejalaDipilih' => $gejalaDipilih,
            ]);
        }

        // Jika belum ada diagnosis, lanjutkan ke pertanyaan berikutnya
        $totalQuestions = Gejala::count();
        if ($request->session()->get('question_index') + 1 < $totalQuestions) {
            $request->session()->put('question_index', $request->session()->get('question_index') + 1);
            return redirect()->route('konsultasi.questions');
        }

        return redirect()->route('konsultasi.diagnosis');
    }

    public function diagnosis(Request $request)
    {
        // Cek data sebelum diagnosis
        Log::info('Data Sesi Sebelum Diagnosis:', [
            'selected_gejalas' => $request->session()->get('selected_gejalas'),
            'pasien' => session('pasien'),
            'question_index' => $request->session()->get('question_index')
        ]);

        $selectedGejalaIds = $request->session()->get('selected_gejalas', []);
        $pasien = session('pasien');
        $gejalaDipilih = Gejala::whereIn('id', $selectedGejalaIds)->get();

        $diagnosisResults = [];
        $penyakitTerkait = null;

        $penyakitDenganGejala = Aturan::with('penyakit')
            ->select('penyakit_id', DB::raw('GROUP_CONCAT(gejala_id) as gejalas'))
            ->groupBy('penyakit_id')
            ->get();

        foreach ($penyakitDenganGejala as $item) {
            $gejalaInRule = explode(',', $item->gejalas);
            $intersect = array_intersect($selectedGejalaIds, $gejalaInRule);

            if (count($intersect) >= count($gejalaInRule) * 1) {
                $penyakit = $item->penyakit;

                if ($penyakit) {
                    $diagnosisResults[] = [
                        'penyakit' => $penyakit->nama_penyakit,
                        'definisi' => $penyakit->definisi,
                        'solusi' => $penyakit->solusi,
                    ];
                    $penyakitTerkait = $penyakit->id;
                }
            }
        }

        if ($penyakitTerkait !== null) {
            DB::table('diagnoses')->insert([
                'penyakit_id' => $penyakitTerkait,
                'nama' => $pasien['nama'],
                'jenis_kelamin' => $pasien['jenis_kelamin'],
                'alamat' => $pasien['alamat'],
                'pekerjaan' => $pasien['pekerjaan'],
                'answer_log' => json_encode($selectedGejalaIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Cek data setelah diagnosis selesai
        Log::info('Data Sesi Setelah Diagnosis:', [
            'selected_gejalas' => $request->session()->get('selected_gejalas'),
            'pasien' => session('pasien'),
            'question_index' => $request->session()->get('question_index')
        ]);

        // Hapus sesi yang ada
        $request->session()->forget('selected_gejalas');
        $request->session()->forget('pasien');
        $request->session()->forget('question_index');

        return view('konsultasi.diagnosis', [
            'diagnosis' => $diagnosisResults,
            'pasien' => $pasien,
            'gejalaDipilih' => $gejalaDipilih,
        ]);
    }

    public function finish()
    {
        return view('konsultasi.finish');
    }
}
