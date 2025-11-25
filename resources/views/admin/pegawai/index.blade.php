@extends('layouts.master')

@section('title', 'Pegawai')

@section('content')
<div class="hp-main-layout-content">
    <div class="row mb-32 gy-32">
        <div class="col-12">
            <div class="row justify-content-between gy-32">
                <div class="col hp-flex-none w-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Pegawai</a>
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

                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-primary w-100" onclick="openCreateModal()">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Tambah</span>
                            </button>
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
                                    <th>NIP/NIPPPK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @forelse($pegawais as $p)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td class="text-end">
                                        <a onclick='showDetail(@json($p))'> <i class="iconly-Light-Show hp-cursor-pointer mx-4 hp-transition hp-hover-text-color-primary-1 text-black-80" style="font-size: 24px;"></i></a>
                                        <a onclick='openEditModal(@json($p))'> <i class="iconly-Light-Edit hp-cursor-pointer mx-4 hp-transition hp-hover-text-color-warning-1 text-black-80" style="font-size: 24px;"></i></a>
                                        <a onclick='confirmDeleteAjax(@json(route("admin.pegawai.destroy", $p->id)))'> <i class="iconly-Light-Delete hp-cursor-pointer mx-4 hp-transition hp-hover-text-color-danger-1 text-black-80" style="font-size: 24px; cursor:pointer;"></i></a>
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

                    <div>
                        {{ $pegawais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPegawai" tabindex="-1" aria-labelledby="addNewPegawaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-16 px-24">
                    <h5 class="modal-title" id="addNewPegawaiLabel">Tambah Pegawai</h5>
                    <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                    </button>
                </div>

                <div class="divider m-0"></div>

                <form id="pegawaiForm" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="modal-body">
                        <div class="row gx-8">
                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="nip" class="form-label">
                                        <span class="text-danger me-4">*</span> NIP/NIPPPK
                                    </label>
                                    <input type="text" class="form-control" name="nip" id="nip" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="name" class="form-label">
                                        <span class="text-danger me-4">*</span> Nama
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="jabatan" class="form-label">
                                        <span class="text-danger me-4">*</span> Jabatan
                                    </label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="unit_kerja" class="form-label">
                                        <span class="text-danger me-4">*</span> Unit Kerja
                                    </label>
                                    <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="tanggal_masuk" class="form-label">
                                        <span class="text-danger me-4">*</span> Tanggal Masuk
                                    </label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-24">
                                    <label for="no_telp" class="form-label">
                                        <span class="text-danger me-4">*</span> No. Telp
                                    </label>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                        <button type="submit" class="m-0 btn btn-primary w-100" id="saveBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPegawaiDetail" tabindex="-1" aria-labelledby="detailPegawaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-16 px-24">
                    <h5 class="modal-title" id="detailPegawaiLabel">Detail Pegawai</h5>
                    <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                    </button>
                </div>

                <div class="divider m-0"></div>

                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12 col-md-6 mb-3">
                            <strong>NIP/NIPPPK:</strong> <span id="detailNip"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>Nama:</strong> <span id="detailName"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>Jabatan:</strong> <span id="detailJabatan"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>Unit Kerja:</strong> <span id="detailUnitKerja"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>Tanggal Masuk:</strong> <span id="detailTanggalMasuk"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>No. Telp:</strong> <span id="detailNoTelp"></span>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <strong>Masa Kerja:</strong> <span id="detailMasaKerja"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>
                    <button type="submit" class="m-0 btn btn-primary w-100" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
     function confirmDeleteAjax(url) {
        Swal.fire({
            title: 'Yakin hapus data ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    location.reload();
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire('Error!', 'Tidak bisa menghapus data.', 'error');
                });
            }
        })
    }

    function showDetail(pegawai) {
        document.getElementById('detailNip').innerText = pegawai.nip;
        document.getElementById('detailName').innerText = pegawai.name;
        document.getElementById('detailJabatan').innerText = pegawai.jabatan;
        document.getElementById('detailUnitKerja').innerText = pegawai.unit_kerja;
        document.getElementById('detailTanggalMasuk').innerText = pegawai.tanggal_masuk;
        document.getElementById('detailNoTelp').innerText = pegawai.no_telp;

        let masuk = new Date(pegawai.tanggal_masuk);
        let now = new Date();

        let years = now.getFullYear() - masuk.getFullYear();
        let months = now.getMonth() - masuk.getMonth();

        if (months < 0) {
            years--;
            months += 12;
        }

        let masaKerja = years + " tahun " + months + " bulan";
        document.getElementById('detailMasaKerja').innerText = masaKerja;

        new bootstrap.Modal(document.getElementById('modalPegawaiDetail')).show();
    }


    function openCreateModal() {
        document.getElementById('addNewPegawaiLabel').innerText = "Tambah Pegawai";
        document.getElementById('pegawaiForm').action = "{{ route('admin.pegawai.store') }}";
        document.getElementById('formMethod').value = "POST";
        document.getElementById('pegawaiForm').reset();
        document.getElementById('saveBtn').innerText = "Simpan";

        new bootstrap.Modal(document.getElementById('modalPegawai')).show();
    }

    function openEditModal(pegawai) {
        document.getElementById('addNewPegawaiLabel').innerText = "Edit Pegawai";
        document.getElementById('pegawaiForm').action = "/admin/pegawai/" + pegawai.id;
        document.getElementById('formMethod').value = "PUT";

        document.getElementById('nip').value = pegawai.nip;
        document.getElementById('name').value = pegawai.name;
        document.getElementById('jabatan').value = pegawai.jabatan;
        document.getElementById('unit_kerja').value = pegawai.unit_kerja;
        document.getElementById('tanggal_masuk').value = pegawai.tanggal_masuk;
        document.getElementById('no_telp').value = pegawai.no_telp;

        document.getElementById('saveBtn').innerText = "Update";

        new bootstrap.Modal(document.getElementById('modalPegawai')).show();
    }
</script>
@endsection