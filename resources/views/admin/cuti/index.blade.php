@extends('layouts.master')

@section('title', 'Cuti')

@section('content')
<div class="hp-main-layout-content">
    <div class="row mb-32 gy-32">
        <div class="col-12">
            <div class="row justify-content-between gy-32">
                <div class="col hp-flex-none w-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Cuti</a>
                            </li>

                            <li class="breadcrumb-item active">
                                Index
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 col-md-7">
                    <div class="row g-16 align-items-center justify-content-end">
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="input-group align-items-center">
                                <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                    <i class="iconly-Curved-User text-black-80" style="font-size: 16px;"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-8" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card hp-contact-card mb-32">
                <div class="card-body px-12 py-12">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Cuti N</th>
                                    <th>Cuti N-1</th>
                                    <th>Cuti N-2</th>
                                    <th>Cuti Besar</th>
                                    <th>Cuti Sakit</th>
                                    <th>Cuti Melahirkan</th>
                                    <th>Cuti Alasan Penting</th>
                                    <th>Cuti Diluar Tanggungan Negara</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @forelse($cutis as $p)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->pegawai->name }}</td>
                                    <td>{{ $p->cuti_n }}</td>
                                    <td>{{ $p->cuti_1n }}</td>
                                    <td>{{ $p->cuti_2n }}</td>
                                    <td>{{ $p->cuti_besar }}</td>
                                    <td>{{ $p->cuti_sakit }}</td>
                                    <td>{{ $p->cuti_melahirkan }}</td>
                                    <td>{{ $p->cuti_alasan_penting }}</td>
                                    <td>{{ $p->cuti_diluat_negara }}</td>
                                    <td class="text-end">
                                        <a onclick='openEditModal(@json($p))'> <i class="iconly-Light-Edit hp-cursor-pointer mx-4 hp-transition hp-hover-text-color-warning-1 text-black-80" style="font-size: 24px;"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data pegawai</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>

                    <div >
                        {{ $cutis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id="modalCuti" tabindex="-1" aria-labelledby="editCutiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-16 px-24">
                    <h5 class="modal-title" id="editCutiLabel">Edit Data Cuti</h5>
                    <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                    </button>
                </div>

                <div class="divider m-0"></div>

                <form id="cutiForm" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="PUT">
                    <input type="hidden" name="id" id="cuti_id">

                    <div class="modal-body">
                        <div class="row gx-8">
                            <div class="col-12">
                                <div class="mb-24">
                                    <label class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="pegawai_name" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Cuti N</label>
                                <input type="number" class="form-control" name="cuti_n" id="cuti_n">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Cuti N-1</label>
                                <input type="number" class="form-control" name="cuti_1n" id="cuti_1n">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti N-2</label>
                                <input type="number" class="form-control" name="cuti_2n" id="cuti_2n">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti Besar</label>
                                <input type="number" class="form-control" name="cuti_besar" id="cuti_besar">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti Sakit</label>
                                <input type="number" class="form-control" name="cuti_sakit" id="cuti_sakit">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti Melahirkan</label>
                                <input type="number" class="form-control" name="cuti_melahirkan" id="cuti_melahirkan">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti Alasan Penting</label>
                                <input type="number" class="form-control" name="cuti_alasan_penting" id="cuti_alasan_penting">
                            </div>
                            <div class="col-6 mt-12">
                                <label class="form-label">Cuti Diluar Tanggungan Negara</label>
                                <input type="number" class="form-control" name="cuti_diluat_negara" id="cuti_diluat_negara">
                            </div>
                        </div>
                    </div>

                     <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                        <button type="submit" class="m-0 btn btn-primary w-100" id="saveCutiBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(cuti) {
        document.getElementById('cuti_id').value = cuti.id;
        document.getElementById('pegawai_name').value = cuti.pegawai.name;

        document.getElementById('cuti_n').value = cuti.cuti_n;
        document.getElementById('cuti_1n').value = cuti.cuti_1n;
        document.getElementById('cuti_2n').value = cuti.cuti_2n;
        document.getElementById('cuti_besar').value = cuti.cuti_besar;
        document.getElementById('cuti_sakit').value = cuti.cuti_sakit;
        document.getElementById('cuti_melahirkan').value = cuti.cuti_melahirkan;
        document.getElementById('cuti_alasan_penting').value = cuti.cuti_alasan_penting;
        document.getElementById('cuti_diluat_negara').value = cuti.cuti_diluat_negara;

        document.getElementById('cutiForm').action = "/admin/cuti/" + cuti.id;

        var myModal = new bootstrap.Modal(document.getElementById('modalCuti'));
        myModal.show();
    }
</script>
@endsection