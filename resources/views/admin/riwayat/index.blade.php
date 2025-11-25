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
                                        <th>NIP/NIPPPK</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Cuti</th>
                                        <th class="text-center">Status</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @forelse($cutis as $p)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->pegawai->name }}</td>
                                            <td>{{ $p->pegawai->nip }}</td>
                                            <td>{{ $p->jenis_cuti }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($p->tanggal_mulai)->translatedFormat('d F Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse($p->tanggal_selesai)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                @if ($p->status == 'pending')
                                                    <div class="d-flex">
                                                        <form action="{{ route('admin.riwayat.approve', $p->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                onclick="return confirm('Setujui pengajuan ini?')">
                                                                Setujui
                                                            </button>
                                                        </form>

                                                        <button class="btn btn-sm btn-outline-danger ms-8"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalTolak{{ $p->id }}">
                                                            Tolak
                                                        </button>
                                                    </div>
                                                @else
                                                    <span
                                                        class="badge bg-{{ $p->status == 'approved' ? 'success' : 'danger' }}-4 hp-bg-dark-{{ $p->status == 'approved' ? 'success' : 'danger' }} text-{{ $p->status == 'approved' ? 'success' : 'danger' }} border-{{ $p->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($p->status) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $p->keterangan ?? '-' }}</td>
                                            <td>
                                                @if ($p->status == 'pending')
                                                    <button class="btn btn-primary" disabled>
                                                        Lihat PDF
                                                    </button>
                                                @else
                                                    <a href="{{ route('admin.riwayat.show', $p->id) }}"
                                                        class="btn btn-primary" target="_blank">
                                                        Lihat PDF
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    <div class="modal fade" id="modalTolak{{ $p->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.riwayat.reject', $p->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tolak Pengajuan Cuti</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <label>Alasan Penolakan</label>
                                                        <textarea name="alasan" class="form-control" required></textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Tidak ada data pegawai</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>

                        {{ $cutis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
