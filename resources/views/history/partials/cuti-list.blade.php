<div id="cutiList" class="grid grid-cols-1 gap-6">
    @if ($pegawai)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Personal Data -->
            <div class="bg-white rounded-xl border shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Data Pegawai</h2>
                <ul class="space-y-2 text-gray-700">
                    <li><span class="font-medium">Nama:</span> {{ $pegawai->name }}</li>
                    <li><span class="font-medium">NIP:</span> {{ $pegawai->nip }}</li>
                    <li><span class="font-medium">Jabatan:</span> {{ $pegawai->jabatan }}</li>
                    <li><span class="font-medium">Unit Kerja:</span> {{ $pegawai->unit_kerja }}</li>
                </ul>
            </div>
            <div class="bg-white rounded-xl border shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Rekap Cuti</h2>
                @if ($rekapCuti->isNotEmpty())
                    <ul class="space-y-2 text-gray-700">
                        @foreach ($rekapCuti as $jenis => $total)
                            <li>
                                <span class="font-medium">{{ $jenis }}:</span> {{ $total }} hari
                            </li>
                        @endforeach
                    </ul>
                    <hr class="mt-2">
                    <p class="font-semibold text-gray-900 mt-2">Total: {{ $totalCuti }} hari</p>
                @else
                    <p class="text-gray-500">Belum ada data cuti.</p>
                @endif
            </div>
        </div>
    @endif

    @forelse($cutis as $cuti)
        <div class="bg-white rounded-xl border">
            <div class="flex items-center justify-between bg-white shadow-sm rounded-xl px-6 py-6">
                <div>
                    <p class="font-medium text-gray-900">
                        {{ $cuti->pegawai->name ?? 'Tidak ada nama' }}
                        <a class="text-blue-600">
                            ({{ $cuti->jenis_cuti }})
                        </a>
                    </p>
                </div>
                <div class="text-gray-700">
                    {{ $cuti->pegawai->nip ?? '-' }}
                </div>
                <div class="text-gray-700">
                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d M Y') }}
                    –
                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('d M Y') }}
                </div>

                @php
                    if ($cuti->status == 'approved') {
                        $bg = '#E8F5E9'; // hijau muda
                        $text = '#2E7D32'; // hijau teks
                        $border = '#4CAF50'; // hijau border
                    } elseif ($cuti->status == 'pending') {
                        $bg = '#FFFDE7';
                        $text = '#F9A825';
                        $border = '#FBC02D';
                    } else {
                        $bg = '#FFEBEE';
                        $text = '#C62828';
                        $border = '#E53935';
                    }
                @endphp

                <div
                    style="
        background: {{ $bg }};
        color: {{ $text }};
        border: 1px solid {{ $border }};
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
    ">
                    {{ ucfirst($cuti->status) }}
                </div>

                @if ($cuti->status == 'pending')
                    <button class="py-2 px-6 rounded-md text-base font-medium cursor-not-allowed"
                        style="
        background:#E0E0E0;        /* light grey */
        color:#616161;             /* dark grey text */
        border:1px solid #BDBDBD;  /* medium grey border */
        opacity:0.8;
    "
                        disabled>
                        Lihat PDF
                    </button>
                @else
                    <a href="{{ route('history.show', $cuti->id) }}"
                        class="py-2 px-6 rounded-md text-base items-center justify-center border border-primary 
              text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium"
                        target="_blank">
                        Lihat PDF
                    </a>
                @endif

            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-6">
            Tidak ada data cuti.
        </div>
    @endforelse

</div>
