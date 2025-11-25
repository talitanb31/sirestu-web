<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Formulir;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use SweetAlert2\Laravel\Swal;



class FormulirController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('formulir', compact('pegawais'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id'       => 'required|exists:pegawais,id',
            'jenis_cuti'       => 'required|string',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'           => 'required|string',
            'alamat'           => 'required|string',
        ]);

        function hitungHariCuti($start, $end)
        {
            if (Carbon::parse($start)->isSameDay(Carbon::parse($end))) {
                return 1;
            }

            $period = CarbonPeriod::create($start, $end);
            $total = 0;

            foreach ($period as $date) {
                if ($date->isWeekend()) continue;
                $total++;
            }

            return $total;
        }

        $pegawai = Pegawai::with('cuti')->findOrFail($request->pegawai_id);
        $cuti = $pegawai->cuti;

        $hariCuti = hitungHariCuti($request->tanggal_mulai, $request->tanggal_selesai);

        $mapJenis = [
            'tahunan'    => 'cuti_n',
            'besar'      => 'cuti_besar',
            'sakit'      => 'cuti_sakit',
            'melahirkan' => 'cuti_melahirkan',
            'alasan'     => 'cuti_alasan_penting',
            'diluar'     => 'cuti_diluat_negara',
        ];

        $field = $mapJenis[$request->jenis_cuti];

        if ($cuti->$field < $hariCuti) {
            return back()->withErrors('Jumlah cuti tidak cukup.');
        }

        $cuti->$field -= $hariCuti;
        $jenisCuti = ['tahunan' => 'Cuti Tahunan', 'besar' => 'Cuti Besar', 'sakit' => 'Cuti Sakit', 'melahirkan' => 'Cuti Melahirkan', 'alasan' => 'Cuti Karena Alasan Penting', 'diluar' => 'Cuti Diluar Tanggungan Negara',];
        $jenisCutiEdited = $jenisCuti[$request->jenis_cuti] ?? $request->jenis_cuti;
        $cuti->save();

        Formulir::create([
            'pegawai_id'      => $request->pegawai_id,
            'jenis_cuti'      => $jenisCutiEdited,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan'          => $request->alasan,
            'alamat'          => $request->alamat,
            'total_hari'      => $hariCuti,
            'status'          => 'pending',
        ]);

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Pengajuan cuti berhasil diajukan.',
        ]);

        return back();
    }
}
