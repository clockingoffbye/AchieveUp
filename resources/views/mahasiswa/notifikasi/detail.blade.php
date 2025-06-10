@extends('mahasiswa.layouts.app')
@section('title', 'Detail Notifikasi')
@section('content')

    <div class="container mx-auto p-6 max-w-2xl">

        {{-- Jika ini notifikasi rekomendasi --}}
        @if (isset($rekomendasi))
            <div class="bg-white rounded shadow p-6 mb-6">
                <h2 class="text-xl font-bold mb-2">Info Lomba</h2>
                <table class="w-full text-sm mb-2">
                    <tr>
                        <td class="font-semibold w-40">Judul</td>
                        <td>: {{ $rekomendasi->lomba->judul ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Tempat</td>
                        <td>: {{ $rekomendasi->lomba->tempat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Periode</td>
                        <td>:
                            {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar)->format('d M Y') }}
                            s.d.
                            {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Tingkat</td>
                        <td>: {{ ucfirst($rekomendasi->lomba->tingkat ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Bidang</td>
                        <td>:
                            @if ($rekomendasi->lomba && $rekomendasi->lomba->bidang->count())
                                @foreach ($rekomendasi->lomba->bidang as $b)
                                    <span
                                        class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2 py-0.5 rounded">{{ $b->nama }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="bg-white rounded shadow p-6 mb-6">
                <h2 class="text-xl font-bold mb-2">Mahasiswa Direkomendasikan</h2>
                <ul class="list-disc pl-5">
                    @forelse($mahasiswa as $m)
                        <li>{{ $m->mahasiswa->nama ?? '-' }} ({{ $m->mahasiswa->nim ?? '-' }})</li>
                    @empty
                        <li class="text-gray-500">Tidak ada mahasiswa direkomendasikan.</li>
                    @endforelse
                </ul>
            </div>

            <div class="bg-white rounded shadow p-6">
                <h2 class="text-xl font-bold mb-2">Dosen Pembimbing</h2>
                <ul class="list-disc pl-5">
                    @forelse($dosen as $d)
                        <li>{{ $d->dosen->nama ?? '-' }} ({{ $d->dosen->nidn ?? '-' }})</li>
                    @empty
                        <li class="text-gray-500">Tidak ada dosen pembimbing.</li>
                    @endforelse
                </ul>
            </div>

            <div class="mt-6 flex space-x-3">
                <a href="{{ url('mahasiswa/notifikasi') }}"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    Kembali
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition btn-hapus"
                    data-id="{{ $mahasiswaRekom->id }}" data-type="rekomendasi">
                    Hapus
                </button>
            </div>
        @endif

        {{-- Jika ini notifikasi verifikasi --}}
        @if (isset($note))
            <div class="bg-white rounded shadow p-6 mb-6">
                <h2 class="text-xl font-bold mb-2">Detail Verifikasi Prestasi</h2>
                <table class="w-full text-sm">
                    <tr>
                        <td class="font-semibold w-40">Judul</td>
                        <td>: {{ $note->judul ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Status</td>
                        <td>: {{ ucfirst($note->status ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Catatan</td>
                        <td>: {{ $note->note ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Waktu</td>
                        <td>: {{ \Carbon\Carbon::parse($note->created_at)->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-6 flex space-x-3">
                <a href="{{ url('mahasiswa/notifikasi') }}"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    Kembali
                </a>
                <a href="{{ url('mahasiswa/prestasi/' . $note->prestasi_id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Detail Prestasi
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition btn-hapus"
                    data-id="{{ $note->id }}" data-type="verifikasi">
                    Hapus
                </button>
            </div>
        @endif

        {{-- Jika ini notifikasi pengajuan lomba --}}
        @if (isset($pengajuanLomba))
            <div class="bg-white rounded shadow p-6 mb-6">
                <h2 class="text-xl font-bold mb-2">Detail Pengajuan Lomba</h2>
                <table class="w-full text-sm mb-2">
                    <tr>
                        <td class="font-semibold w-40">Judul Lomba</td>
                        <td>: {{ $lomba->judul ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Tempat</td>
                        <td>: {{ $lomba->tempat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Periode</td>
                        <td>:
                            @if ($lomba)
                                {{ \Carbon\Carbon::parse($lomba->tanggal_daftar)->format('d M Y') }}
                                s.d.
                                {{ \Carbon\Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Status Pengajuan</td>
                        <td>
                            :
                            @if ($pengajuan->status === 'approved')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-green-100 text-green-700 border border-green-300">
                                    <i class="fas fa-check-circle mr-1"></i> Disetujui
                                </span>
                            @elseif($pengajuan->status === 'rejected')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-red-100 text-red-700 border border-red-300">
                                    <i class="fas fa-times-circle mr-1"></i> Ditolak
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-300">
                                    <i class="fas fa-hourglass-half mr-1"></i> Diproses
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Catatan</td>
                        <td>: {{ $pengajuan->notes ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Waktu Pengajuan</td>
                        <td>: {{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-6 flex space-x-3">
                <a href="{{ url('mahasiswa/notifikasi') }}"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    Kembali
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition btn-hapus"
                    data-id="{{ $pengajuanLomba->id }}" data-type="pengajuan_lomba">
                    Hapus
                </button>
            </div>
        @endif

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const type = $(this).data('type');
                Swal.fire({
                    title: 'Yakin hapus notifikasi ini?',
                    text: "Data yang dihapus tidak dapat dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/mahasiswa/notifikasi/${type}/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Berhasil!', response.message, 'success')
                                    .then(() => {
                                        window.location.href =
                                            "{{ url('mahasiswa/notifikasi') }}";
                                    });
                            },
                            error: function() {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
