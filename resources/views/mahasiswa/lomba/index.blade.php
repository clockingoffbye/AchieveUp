@extends('mahasiswa.layouts.app')

@section('title', 'Lomba')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col" x-data="{ activeTab: 'lomba' }">
        <!-- Tab Navigation - Directly attached to table -->
        <div class="flex border-b-0">
            <button class="px-5 py-2.5 text-sm font-medium transition-colors duration-200 focus:outline-none"
                :class="{ 'bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold': activeTab === 'lomba', 'text-gray-600 hover:text-gray-800 bg-gray-100': activeTab !== 'lomba' }"
                @click="activeTab = 'lomba'">Data Lomba</button>
            <button class="px-5 py-2.5 text-sm font-medium transition-colors duration-200 focus:outline-none"
                :class="{ 'bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold': activeTab === 'pengajuan', 'text-gray-600 hover:text-gray-800 bg-gray-100': activeTab !== 'pengajuan' }"
                @click="activeTab = 'pengajuan'">Pengajuan Lomba</button>
        </div>

        <!-- Tab Content -->
        <div>
            <!-- Controls section -->
            <div class="bg-white border-t border-l border-r border-gray-200 px-6 py-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <label for="show-entry" class="text-sm font-medium text-gray-700">Tampilkan</label>
                        <select id="show-entry"
                            class="appearance-none bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="40">40</option>
                        </select>
                        <span class="text-sm font-medium text-gray-700">data</span>
                    </div>

                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative flex-1 md:flex-none md:min-w-[240px]">
                            <input id="search-bar" type="text" placeholder="Cari..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all" />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <a href="{{ route('mahasiswa.lomba.create') }}" id="btn-add-lomba"
                            class="flex items-center justify-center px-4 py-2 bg-[#6041CE] hover:bg-[#4e35a5] text-white rounded-lg transition-colors duration-200 text-sm font-medium">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Tambah</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Lomba Table -->
            <div x-show="activeTab === 'lomba'"
                class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table id="table_lomba" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tingkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Periode Pendaftaran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Link</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bidang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200"></tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <p id="lomba_info" class="text-sm text-gray-600"></p>
                        <div id="lomba_pagination" class="flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>

            <!-- Pengajuan Table -->
            <div x-show="activeTab === 'pengajuan'"
                class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table id="table_pengajuan" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tingkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Periode Pendaftaran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catatan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Admin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200"></tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <p id="pengajuan_info" class="text-sm text-gray-600"></p>
                        <div id="pengajuan_pagination" class="flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let lombaData = [];
            let pengajuanData = [];
            let lombaCurrentPage = 1;
            let pengajuanCurrentPage = 1;

            function getStatusConfig(status) {
                const config = {
                    'approved': {
                        bgClass: 'bg-green-100',
                        textClass: 'text-green-800',
                        icon: 'fas fa-check-circle text-green-500'
                    },
                    'rejected': {
                        bgClass: 'bg-red-100',
                        textClass: 'text-red-800',
                        icon: 'fas fa-times-circle text-red-500'
                    },
                    'pending': {
                        bgClass: 'bg-gray-200',
                        textClass: 'text-gray-800',
                        icon: 'fas fa-hourglass-half text-gray-500'
                    }
                };

                return config[status] || config.pending;
            }

            function getTingkatConfig(tingkat) {
                const config = {
                    'internasional': {
                        bgClass: 'bg-purple-100',
                        textClass: 'text-purple-800'
                    },
                    'nasional': {
                        bgClass: 'bg-blue-100',
                        textClass: 'text-blue-800'
                    },
                    'regional': {
                        bgClass: 'bg-green-100',
                        textClass: 'text-green-800'
                    },
                    'lokal': {
                        bgClass: 'bg-yellow-100',
                        textClass: 'text-yellow-800'
                    }
                };

                return config[tingkat.toLowerCase()] || {
                    bgClass: 'bg-gray-100',
                    textClass: 'text-gray-800'
                };
            }

            function actionButtonsLomba(id) {
                return `
                    <div class="flex items-center gap-3">
                        <a href="/mahasiswa/lomba/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                `;
            }

            function actionButtonsPengajuan(id, status) {
                let buttons = `
                <div class="flex items-center gap-3">
                    <a href="/mahasiswa/lomba/pengajuan/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
            `;

                if (status === 'pending') {
                    buttons += `
                    <button type="button" class="action-btn text-red-600 hover:text-red-800 btn-hapus" data-id="${id}" data-type="pengajuan-lomba" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
                } else if (status === 'rejected') {
                    buttons += `
                    <a href="/mahasiswa/pengajuan-lomba/${id}/edit" class="action-btn text-amber-600 hover:text-amber-800" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                `;
                }

                buttons += `</div>`;
                return buttons;
            }

            function renderLombaTable() {
                let searchQuery = $('#search-bar').val().toLowerCase();
                let entriesToShow = parseInt($('#show-entry').val());
                let tbody = $('#table_lomba tbody');

                let filtered = lombaData.filter(item =>
                    Object.values(item).some(val => val && typeof val === 'string' && val.toLowerCase()
                        .includes(searchQuery))
                );

                let totalData = filtered.length;
                let totalPages = Math.ceil(totalData / entriesToShow);

                let startIndex = (lombaCurrentPage - 1) * entriesToShow;
                let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                tbody.empty();
                if (totalData === 0) {
                    tbody.append(`
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-search text-gray-300 text-3xl mb-2"></i>
                                    <p>Tidak ada data lomba ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    `);
                } else {
                    $.each(paginated, function(index, item) {
                        const tingkatConfig = getTingkatConfig(item.tingkat);

                        let row = `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.judul}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold ${tingkatConfig.bgClass} ${tingkatConfig.textClass}">
                                        ${item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1)}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.periode_pendaftaran}</td>
                                <td class="px-6 py-4 text-sm">
                                    ${item.link ? 
                                      `<a href="${item.link}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline flex items-center gap-1">
                                                                                                                <span class="truncate max-w-[150px]">${item.link}</span>
                                                                                                                <i class="fas fa-external-link-alt text-xs"></i>
                                                                                                              </a>` : 
                                      '<span class="text-gray-400">-</span>'}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap gap-1">
                                        ${item.bidang.map(b => 
                                            `<span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full">${b.nama}</span>`
                                        ).join('')}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${actionButtonsLomba(item.id)}
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                }

                $("#lomba_info").text(`Menampilkan ${paginated.length} dari ${totalData} data lomba`);

                let paginationHtml = '';
                if (totalPages > 1) {
                    for (let i = 1; i <= totalPages; i++) {
                        paginationHtml += `
                            <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                                ${i === lombaCurrentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                                page-btn-lomba" data-page="${i}">${i}
                            </button>
                        `;
                    }
                }

                $("#lomba_pagination").html(paginationHtml);

                $(".page-btn-lomba").off("click").on("click", function() {
                    lombaCurrentPage = parseInt($(this).data("page"));
                    renderLombaTable();
                });
            }

            function renderPengajuanTable() {
                let searchQuery = $('#search-bar').val().toLowerCase();
                let entriesToShow = parseInt($('#show-entry').val());
                let tbody = $('#table_pengajuan tbody');

                let filtered = Array.isArray(pengajuanData) ? pengajuanData.filter(item =>
                    (item.status === 'pending' || item.status === 'rejected') &&
                    Object.values(item).some(val => val && typeof val === 'string' && val.toLowerCase()
                        .includes(searchQuery))
                ) : [];

                let totalData = filtered.length;
                let totalPages = Math.ceil(totalData / entriesToShow);

                let startIndex = (pengajuanCurrentPage - 1) * entriesToShow;
                let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                tbody.empty();
                if (totalData === 0) {
                    tbody.append(`
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-clipboard-list text-gray-300 text-3xl mb-2"></i>
                                    <p>Tidak ada data pengajuan ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    `);
                } else {
                    $.each(paginated, function(index, item) {
                        const tingkatConfig = getTingkatConfig(item.tingkat);
                        const statusConfig = getStatusConfig(item.status);

                        let row = `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.judul}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold ${tingkatConfig.bgClass} ${tingkatConfig.textClass}">
                                        ${item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1)}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.periode_pendaftaran}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium capitalize
                                        ${statusConfig.bgClass} ${statusConfig.textClass}">
                                        <i class="${statusConfig.icon}"></i>
                                        ${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-[200px] truncate" title="${item.notes || '-'}">
                                    ${item.notes || '<span class="text-gray-400">-</span>'}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    ${item.admin ? item.admin.nama : '<span class="text-gray-400">-</span>'}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${actionButtonsPengajuan(item.id, item.status)}
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                }

                $("#pengajuan_info").text(`Menampilkan ${paginated.length} dari ${totalData} data pengajuan`);

                let paginationHtml = '';
                if (totalPages > 1) {
                    for (let i = 1; i <= totalPages; i++) {
                        paginationHtml += `
                            <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                                ${i === pengajuanCurrentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                                page-btn-pengajuan" data-page="${i}">${i}
                            </button>
                        `;
                    }
                }

                $("#pengajuan_pagination").html(paginationHtml);

                $(".page-btn-pengajuan").off("click").on("click", function() {
                    pengajuanCurrentPage = parseInt($(this).data("page"));
                    renderPengajuanTable();
                });
            }

            function loadLomba() {
                $.ajax({
                    url: '/mahasiswa/lomba/getall',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        lombaData = Array.isArray(response) ? response : [];
                        lombaCurrentPage = 1;
                        renderLombaTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading lomba:', status, error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memuat data lomba.',
                            timer: 2000
                        });
                        lombaData = [];
                        renderLombaTable();
                    }
                });
            }

            function loadPengajuan() {
                $.ajax({
                    url: '/mahasiswa/lomba/getpengajuan',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        pengajuanData = Array.isArray(response.data) ? response.data : [];
                        pengajuanCurrentPage = 1;
                        renderPengajuanTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading pengajuan:', status, error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memuat data pengajuan lomba.',
                            timer: 2000
                        });
                        pengajuanData = [];
                        renderPengajuanTable();
                    }
                });
            }

            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const type = $(this).data('type');
                if (type === 'pengajuan-lomba') {
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data pengajuan yang dihapus tidak dapat dikembalikan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/mahasiswa/lomba/${id}`,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(res) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Pengajuan berhasil dihapus.',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                    loadPengajuan();
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat menghapus pengajuan.',
                                    });
                                }
                            });
                        }
                    });
                }
            });

            $('#search-bar').on('input', function() {
                lombaCurrentPage = 1;
                pengajuanCurrentPage = 1;
                renderLombaTable();
                renderPengajuanTable();
            });

            $('#show-entry').on('change', function() {
                lombaCurrentPage = 1;
                pengajuanCurrentPage = 1;
                renderLombaTable();
                renderPengajuanTable();
            });

            document.addEventListener('alpine:initialized', () => {
                const alpineComponent = Alpine.getComponent(document.querySelector('[x-data]'));
                if (alpineComponent) {
                    Alpine.effect(() => {
                        const currentTab = alpineComponent.activeTab;
                        if (currentTab === 'lomba') {
                            renderLombaTable();
                        } else if (currentTab === 'pengajuan') {
                            renderPengajuanTable();
                        }
                    });
                }
            });

            window.loadLomba = loadLomba;
            window.loadPengajuan = loadPengajuan;
            loadLomba();
            loadPengajuan();
        });
    </script>

    <style>
        .action-btn {
            @apply inline-flex items-center justify-center h-8 w-8 rounded-full transition-colors duration-200;
        }

        /* Make sure the active tab has the highest z-index to properly overlap the table */
        [x-show="activeTab === 'lomba'"],
        [x-show="activeTab === 'pengajuan'"] {
            z-index: 10;
        }
    </style>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    showConfirmButton: true
                });
            });
        </script>
    @endif
@endsection
