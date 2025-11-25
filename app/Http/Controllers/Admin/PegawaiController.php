<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        return view('admin.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'           => 'required|numeric|unique:pegawais,nip',
            'name'          => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'unit_kerja'    => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'no_telp'       => 'required|string|max:20',
        ]);

        $pegawai =   Pegawai::create($request->all());

        $pegawai->cuti()->create([]);

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Berhasil menambahkan pegawai baru.',
        ]);

        return back();
    }

    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip'           => 'required|numeric|unique:pegawais,nip,' . $pegawai->id,
            'name'          => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'unit_kerja'    => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'no_telp'       => 'required|string|max:20',
        ]);

        $pegawai->update($request->all());
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Berhasil memperbarui data pegawai.',
        ]);

        return back();
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Berhasil hapus data pegawai.',
        ]);
        return back();
    }
}
