@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\PengajuanPrestasiAdminNote;
    use App\Models\PengajuanLombaAdminNote;

    $adminId = Auth::guard('dosen')->id();

    $unreadPengajuanPrestasi = PengajuanPrestasiAdminNote::where('dosen_id', $adminId)
        ->where('is_accepted', false)
        ->count();

    $unreadPengajuanLomba = PengajuanLombaAdminNote::where('dosen_id', $adminId)->where('is_accepted', false)->count();

    $notifUnread = $unreadPengajuanPrestasi + $unreadPengajuanLomba;
@endphp

<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow px-8 py-4 flex items-center justify-between">
    <div class="text-base font-medium text-gray-700">
    </div>
    
    <div class="flex items-center space-x-3 justify-end relative">
        <a href="{{ url('admin/notifikasi') }}"
            class="relative flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition mr-2"
            title="Notifikasi">
            <i class="fas fa-bell text-gray-600"></i>
            @if ($notifUnread > 0)
                <span
                    class="absolute top-2 right-2 block w-2.5 h-2.5 rounded-full bg-red-600 border-2 border-white"></span>
            @endif
        </a>
        <div class="flex flex-col text-right leading-tight">
            <span
                class="text-sm font-medium text-gray-800">{{ Auth::guard('dosen')->user()->nama ?? 'Nama Pengguna' }}</span>
            <span class="text-xs text-gray-500">{{ Auth::guard('dosen')->user()->nidn ?? '-' }}</span>
        </div>
        <div x-data="{ open: false }" class="relative">
            <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';" alt="User Image"
                class="w-10 h-10 rounded-[12px] object-cover border-2 border-primary cursor-pointer transition duration-200 hover:scale-105"
                @click="open = !open">
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="absolute right-0 mt-3 w-48 bg-white border border-gray-100 rounded-xl shadow-xl z-50 py-2 ring-1 ring-black/5">
                <a href="{{ route('admin.profil.index') }}">
                    <div class="px-4 py-3 border-b">
                        <div class="flex items-center gap-3 mb-2">
                            <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';"
                                alt="User Avatar" class="w-8 h-8 rounded-lg object-cover border-2 border-white/20">

                            <div
                                class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-400 border-2 border-white rounded-full animate-pulse">
                            </div>

                            <div
                                class="absolute -bottom-1 -right-1 w-4 h-4 bg-white rounded-full shadow-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <svg class="w-2 h-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute right-0 mt-3 w-72 bg-white/95 backdrop-blur-md border border-gray-200/50 rounded-2xl shadow-xl z-50 overflow-hidden ring-1 ring-black/5">

                            <div
                                class="p-4 bg-gradient-to-br from-[#6041CE]/10 to-purple-50 border-b border-gray-200/50">
                                <a href="{{ route('admin.profil.index') }}"
                                    class="group block hover:bg-white/50 rounded-xl p-2 transition-all duration-500">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative">
                                            <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                                onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';"
                                                alt="User Avatar"
                                                class="w-12 h-12 rounded-xl object-cover border-2 border-white shadow-sm group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full">
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="font-semibold text-gray-900 truncate group-hover:text-[#6041CE] transition-colors duration-500">
                                                {{ Auth::guard('dosen')->user()->nama ?? 'clockingoffbye' }}
                                            </div>
                                            <div class="text-sm text-gray-500 truncate">
                                                {{ Auth::guard('dosen')->user()->email ?? 'admin@example.com' }}
                                            </div>
                                            <div class="text-xs text-gray-400">
                                                NIDN: {{ Auth::guard('dosen')->user()->nidn ?? '-' }}
                                            </div>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#6041CE] transition-colors duration-500"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('admin.profil.index') }}"
                                    class="group flex items-center space-x-3 w-full px-3 py-2 text-sm text-gray-700 hover:bg-[#6041CE]/10 hover:text-[#6041CE] rounded-lg transition-all duration-500">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center group-hover:from-[#6041CE]/20 group-hover:to-purple-200 transition-all duration-500">
                                        <svg class="w-4 h-4 text-blue-600 group-hover:text-[#6041CE]"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium">Profil Saya</div>
                                        <div class="text-xs text-gray-500">Kelola informasi profil</div>
                                    </div>
                                </a>

                                <div class="border-t border-gray-200/50 my-2"></div>

                                <button type="button" id="btn-logout"
                                    class="group flex items-center space-x-3 w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-all duration-500">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-red-100 to-red-200 rounded-lg flex items-center justify-center group-hover:from-red-200 group-hover:to-red-300 transition-all duration-500">
                                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 01-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 text-left">
                                        <div class="font-medium">Keluar</div>
                                        <div class="text-xs text-red-500">Logout dari sistem</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" method="GET" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
</header>

@push('scripts')
    <script>
        function showLoading() {
            let overlay = document.getElementById('custom-loading-overlay');
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.id = 'custom-loading-overlay';
                overlay.style.position = 'fixed';
                overlay.style.top = '0';
                overlay.style.left = '0';
                overlay.style.width = '100vw';
                overlay.style.height = '100vh';
                overlay.style.background = 'rgba(255,255,255,0.4)';
                overlay.style.zIndex = '1040'; // LOWER than SweetAlert2's default (1060+)
                overlay.style.display = 'flex';
                overlay.style.alignItems = 'center';
                overlay.style.justifyContent = 'center';
                overlay.innerHTML = `
            <div class="loader-spinner" style="border: 6px solid #eee; border-top: 6px solid #6041ce; border-radius: 50%; width: 48px; height: 48px; animation: spin 1s linear infinite;"></div>
            <style>
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
        `;
                document.body.appendChild(overlay);
            }
            overlay.style.display = 'flex';
        }

        function hideLoading() {
            let overlay = document.getElementById('custom-loading-overlay');
            if (overlay) overlay.style.display = 'none';
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener('DOMNodeInserted', function(e) {
                if (e.target.classList && e.target.classList.contains('swal2-container')) {
                    e.target.style.zIndex = '1060'; // Higher than overlay
                }
            }, false);
        });

        document.addEventListener('DOMContentLoaded', function() {
            function updateDateTime() {
                const now = new Date();

                const wibOffset = 7 * 60; // 7 hours in minutes
                const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
                const wibTime = new Date(utc + (wibOffset * 60000));

                const timeString = wibTime.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                const dateString = wibTime.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });

                const timeElement = document.getElementById('current-time');
                const dateElement = document.getElementById('current-date');

                if (timeElement) {
                    timeElement.textContent = timeString;
                }

                if (dateElement) {
                    dateElement.textContent = dateString;
                }
            }

            updateDateTime();
            const clockInterval = setInterval(updateDateTime, 1000);

            window.addEventListener('beforeunload', function() {
                clearInterval(clockInterval);
            });

            const btnLogout = document.getElementById('btn-logout');
            if (btnLogout) {
                btnLogout.addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Konfirmasi Logout',
                        text: 'Apakah Anda yakin ingin keluar dari sistem?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Keluar',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        backdrop: true,
                        allowOutsideClick: false,
                        customClass: {
                            popup: 'rounded-2xl',
                            confirmButton: 'rounded-lg px-6 py-2',
                            cancelButton: 'rounded-lg px-6 py-2'
                        },
                        buttonsStyling: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showLoading();

                            Swal.fire({
                                title: 'Sedang Logout...',
                                text: 'Mohon tunggu sebentar',
                                icon: 'info',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                customClass: {
                                    popup: 'rounded-2xl'
                                },
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Logout Berhasil',
                                    text: 'Anda telah keluar dari sistem. Terima kasih!',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    customClass: {
                                        popup: 'rounded-2xl'
                                    },
                                    willClose: () => {
                                        document.getElementById('logout-form')
                                            .submit();
                                    }
                                });
                            }, 800);
                        }
                    });
                });
            }

            const header = document.querySelector('header');
            if (header) {
                header.style.transform = 'translateY(-100%)';
                header.style.transition = 'transform 0.5s ease-out';

                setTimeout(() => {
                    header.style.transform = 'translateY(0)';
                }, 100);
            }

            console.log('Header initialized with WIB timezone');
        });
    </script>
@endpush
