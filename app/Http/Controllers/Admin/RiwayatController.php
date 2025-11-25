<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulir;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use PhpOffice\PhpWord\Element\TextRun;
use SweetAlert2\Laravel\Swal;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutis = Formulir::latest()->paginate(10);
        return view('admin.riwayat.index', compact('cutis'));
    }

    public function indexUser(Request $request)
    {
        $search = $request->input('search');
        $cutis = collect();
        $rekapCuti = collect();
        $totalCuti = 0;

        if (!empty($search)) {
            $cutis = Formulir::with('pegawai')
                ->whereHas('pegawai', function ($q) use ($search) {
                    $q->where('nip', $search);
                })
                ->latest()
                ->get();

            $pegawai = $cutis->first()?->pegawai;

            $rekapCuti = $cutis->groupBy('jenis_cuti')
                ->map(fn($items) => $items->sum('total_hari'));

            $totalCuti = $rekapCuti->sum();
        } else {
            $pegawai = null;
        }

        if ($request->ajax()) {
            return view('history.partials.cuti-list', compact('cutis', 'pegawai', 'rekapCuti', 'totalCuti'))->render();
        }

        return view('history', compact('cutis', 'pegawai', 'rekapCuti', 'totalCuti'));
    }

    public function showUser($id)
    {
        $formulir = Formulir::findOrFail($id);
        $pdfFile = storage_path('app/public/' . $formulir->pdf_path);


        if (file_exists($pdfFile)) {
            return response()->file($pdfFile);
        } else {
            abort(404, 'File tidak ditemukan');
        }
    }

    public function show($id)
    {
        $formulir = Formulir::findOrFail($id);
        $pdfFile = storage_path('app/public/' . $formulir->pdf_path);


        if (file_exists($pdfFile)) {
            return response()->file($pdfFile);
        } else {
            abort(404, 'File tidak ditemukan');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve($id)
    {
        $cuti = Formulir::findOrFail($id);

        $cuti->status = 'approved';
        $cuti->save();

        $this->createPdf($cuti);
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Pengajuan cuti disetujui.',
        ]);

        return back();
    }

    public function reject(Request $request, $id)
    {
        $cuti = Formulir::findOrFail($id);

        $request->validate([
            'alasan' => 'required|string|max:255'
        ]);

        $mapJenis = [
            'Cuti Tahunan'    => 'cuti_n',
            'Cuti Besar'      => 'cuti_besar',
            'Cuti Sakit'      => 'cuti_sakit',
            'Cuti Melahirkan' => 'cuti_melahirkan',
            'Cuti Karena Alasan Penting'     => 'cuti_alasan_penting',
            'Cuti Diluar Tanggungan Negara'     => 'cuti_diluat_negara',
        ];

        $field = $mapJenis[$cuti->jenis_cuti];

        $pegawaiCuti = $cuti->pegawai->cuti;

        $pegawaiCuti->$field += $cuti->total_hari;
        $pegawaiCuti->save();

        $cuti->status = 'rejected';
        $cuti->keterangan = $request->alasan;
        $cuti->save();

        $this->createPdf($cuti);
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Pengajuan cuti ditolak.',
        ]);

        return back();
    }

    public function createPDf(Formulir $formulir)
    {
        $jenisCuti = ['tahunan' => 'Cuti Tahunan', 'besar' => 'Cuti Besar', 'sakit' => 'Cuti Sakit', 'melahirkan' => 'Cuti Melahirkan', 'alasan' => 'Cuti Karena Alasan Penting', 'diluar' => 'Cuti Diluar Tanggungan Negara',];
        $formulir->jenis_cuti = $jenisCuti[$formulir->jenis_cuti] ?? $formulir->jenis_cuti;
        $templatePath = storage_path('app/templates/template_cuti.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama', $formulir->pegawai->name);
        $templateProcessor->setValue('jabatan', $formulir->pegawai->jabatan);
        $templateProcessor->setValue('nip', $formulir->pegawai->nip);
        $templateProcessor->setValue('unit_kerja', $formulir->pegawai->unit_kerja);
        $templateProcessor->setValue('tanggal_mulai', Carbon::parse($formulir->tanggal_mulai)->timezone('Asia/Jakarta')->translatedFormat('d-m-Y'));
        $templateProcessor->setValue('tanggal_selesai', Carbon::parse($formulir->tanggal_selesai)->isSameDay(Carbon::parse($formulir->tanggal_mulai)) ? "-" : Carbon::parse($formulir->tanggal_selesai)->timezone('Asia/Jakarta')->translatedFormat('d-m-Y'));
        $templateProcessor->setValue('alasan', $formulir->alasan);
        $templateProcessor->setValue('alamat', $formulir->alamat);
        $templateProcessor->setValue('telp', $formulir->pegawai->no_telp);
        $templateProcessor->setValue('tanggal', $formulir->created_at->translatedFormat('d F Y'));
        $templateProcessor->setValue('n_2', $formulir->pegawai->cuti->cuti_2n);
        $templateProcessor->setValue('n_1', $formulir->pegawai->cuti->cuti_1n);
        $templateProcessor->setValue('n', $formulir->pegawai->cuti->cuti_n);
        $templateProcessor->setValue('cuti_besar', $formulir->pegawai->cuti->cuti_besar);
        $templateProcessor->setValue('cuti_sakit', $formulir->pegawai->cuti->cuti_sakit);
        $templateProcessor->setValue('cuti_melahirkan', $formulir->pegawai->cuti->cuti_melahirkan);
        $templateProcessor->setValue('cuti_alasan', $formulir->pegawai->cuti->cuti_alasan_penting);
        $templateProcessor->setValue('cuti_diluar', $formulir->pegawai->cuti->cuti_diluat_negara);
        if ($formulir->status == 'approved') {
            $templateProcessor->setValue('disetujui', '✓');
            $templateProcessor->setValue('tidak_setuju', '');
            $templateProcessor->setValue('keterangan', '');
        } else if ($formulir->status == 'rejected') {
            $templateProcessor->setValue('disetujui', '');
            $templateProcessor->setValue('tidak_setuju', '✓');
            $templateProcessor->setValue('keterangan', $formulir->keterangan ?? '');
        } else {
            $templateProcessor->setValue('disetujui', '');
            $templateProcessor->setValue('tidak_setuju', '');
            $templateProcessor->setValue('keterangan', '');
        }
        $tanggalMasuk = Carbon::parse($formulir->pegawai->tanggal_masuk);
        $hariIni = Carbon::now();
        $totalBulan = $tanggalMasuk->diffInMonths($hariIni);
        $tahun = floor($totalBulan / 12);
        $bulan = $totalBulan % 12;
        $masaKerja = "{$tahun} Tahun {$bulan} Bulan";
        $templateProcessor->setValue('masa_kerja', $masaKerja);
        $tanggalMulai = Carbon::parse($formulir->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($formulir->tanggal_selesai);
        $diff = $tanggalMulai->diff($tanggalSelesai);
        $lamaCutiRun = new TextRun();
        if ($diff->d == 0) {
            $lamaCutiRun->addText("" . 1 . " (Hari / ");
        } else if ($diff->d > 0) {
            $lamaCutiRun->addText("" . $diff->d + 1 . " Hari ");
        } else {
            $lamaCutiRun->addText("[0] (", ['strikethrough' => true]);
            $lamaCutiRun->addText("Hari / ", ['strikethrough' => true]);
        }
        if ($diff->m > 0) {
            $lamaCutiRun->addText($diff->m . " Bulan / ");
        } else {
            $lamaCutiRun->addText("Bulan / ", ['strikethrough' => true]);
        }
        if ($diff->y > 0) {
            $lamaCutiRun->addText($diff->y . " Tahun)");
        } else {
            $lamaCutiRun->addText("Tahun)", ['strikethrough' => true]);
        }
        $lamaCutiRun->addText(' *');
        $templateProcessor->setComplexValue('lama_cuti', $lamaCutiRun);
        $map = ['Cuti Tahunan' => 'jenis_cuti_tahunan', 'Cuti Besar' => 'jenis_cuti_besar', 'Cuti Sakit' => 'jenis_cuti_sakit', 'Cuti Melahirkan' => 'jenis_cuti_melahirkan', 'Cuti Karena Alasan Penting' => 'jenis_cuti_alasan', 'Cuti Diluar Tanggungan Negara' => 'jenis_cuti_diluar',];
        foreach ($map as $key => $placeholder) {
            $templateProcessor->setValue($placeholder, $formulir->jenis_cuti == $key ? '✓' : '');
        }
        $wordFile = 'formulirs/formulir_' . $formulir->id . '.docx';
        $templateProcessor->saveAs(storage_path('app/public/' . $wordFile));
        $wordFile = storage_path('app/public/formulirs/formulir_' . $formulir->id . '.docx');
        $pdfFile = storage_path('app/public/formulirs/formulir_' . $formulir->id . '.pdf');
        // $libreOffice = '"C:\Program Files\LibreOffice\program\soffice.exe"';
        // exec("$libreOffice --headless --convert-to pdf --outdir " . dirname($pdfFile) . " " . $wordFile);
        exec("libreoffice --headless --convert-to pdf --outdir " . dirname($pdfFile) . " " . $wordFile);
        if (file_exists($wordFile)) {
            unlink($wordFile);
        }
        $formulir->update(['pdf_path' => 'formulirs/formulir_' . $formulir->id . '.pdf']);
        return true;
    }
}
