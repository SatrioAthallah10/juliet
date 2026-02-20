<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Konfirmasi Pembayaran - Juliet</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
       /* ============================================================
   verify.css
   Untuk halaman konfirmasi pembayaran
   Design system: sesuai style.css EduCore (#5C0269, #C7306D)
   ============================================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Outfit', 'Inter', sans-serif;
    background: linear-gradient(160deg, #e4a6eeff 0%, #7E0A6F 45%, #C7306D 100%);
    min-height: 100vh;
    padding: 20px;
}

/* ── Main Container ── */
.payment-container {
    max-width: 800px;
    margin: 40px auto;
    background: white;
    border-radius: 1.75rem;
    overflow: hidden;
    box-shadow: 0 32px 80px rgba(92, 2, 105, 0.35), 0 8px 24px rgba(0,0,0,.15);
}

/* ── Header ── */
.payment-header {
    background: linear-gradient(135deg, #5C0269 0%, #7E0A6F 60%, #C7306D 100%);
    color: white;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.payment-header img {
 background-color: #f083eaff;
 box-shadow: 0 8px 24px rgba(239, 237, 237, 0.3);
}
.payment-header::before {
    content: '';
    position: absolute;
    top: -3rem;
    right: -3rem;
    width: 10rem;
    height: 10rem;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
    pointer-events: none;
}

.payment-header::after {
    content: '';
    position: absolute;
    bottom: -2rem;
    left: -2rem;
    width: 7rem;
    height: 7rem;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.04);
    pointer-events: none;
}

.payment-header h1 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
    position: relative;
    z-index: 1;
}

.payment-header p {
    font-size: 16px;
    opacity: 0.9;
    position: relative;
    z-index: 1;
}

.status-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(4px);
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    position: relative;
    z-index: 1;
}

/* ── Timer Section ── */
.timer-section {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 20px 30px;
    text-align: center;
    border-bottom: 3px solid #fbbf24;
}

.timer-label {
    font-size: 14px;
    color: #92400e;
    font-weight: 600;
    margin-bottom: 8px;
}

.timer {
    font-size: 32px;
    font-weight: 700;
    color: #92400e;
    font-family: 'Outfit', monospace;
    letter-spacing: .05em;
}

/* ── Alert Section ── */
.alert-section {
    padding: 30px;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-left: 5px solid #fbbf24;
}

.alert-section .alert-icon {
    font-size: 24px;
    color: #f59e0b;
    margin-right: 15px;
    flex-shrink: 0;
}

.alert-section h5 {
    color: #92400e;
    font-weight: 700;
    margin-bottom: 15px;
    font-family: 'Outfit', sans-serif;
}

.alert-section ul {
    margin: 0;
    padding-left: 20px;
}

.alert-section li {
    color: #78350f;
    margin-bottom: 10px;
    line-height: 1.6;
}

.alert-section strong {
    color: #92400e;
    font-weight: 700;
}

/* ── Info Section ── */
.info-section {
    padding: 30px;
    background: #fdfafd;
}

.info-card {
    background: #ffffff;
    border-radius: 1rem;
    padding: 25px;
    margin-bottom: 20px;
    border: 1.5px solid #E5C8E2;
    box-shadow: 0 2px 8px rgba(92, 2, 105, 0.04);
    transition: box-shadow .25s ease, border-color .25s ease;
}

.info-card:hover {
    border-color: #CF9ED0;
    box-shadow: 0 6px 20px rgba(92, 2, 105, 0.08);
}

.info-card h6 {
    color: #5C0269;
    font-weight: 700;
    margin-bottom: 20px;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Outfit', sans-serif;
}

.info-card h6 i {
    color: #C7306D;
    font-size: 1.1rem;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 15px 0;
    border-bottom: 1px solid #f0e6f4;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    color: #64748b;
    font-weight: 500;
    font-size: 15px;
}

.info-value {
    color: #0f172a;
    font-weight: 600;
    text-align: right;
    font-size: 15px;
}

/* ── Amount Card ── */
.amount-card {
    background: linear-gradient(135deg, #5C0269 0%, #7E0A6F 60%, #C7306D 100%);
    color: white;
    border-radius: 1.25rem;
    padding: 30px;
    text-align: center;
    margin-bottom: 25px;
    box-shadow: 0 12px 32px rgba(92, 2, 105, 0.35);
    position: relative;
    overflow: hidden;
}

.amount-card::before {
    content: '';
    position: absolute;
    top: -2.5rem;
    right: -2.5rem;
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.07);
    pointer-events: none;
}

.amount-card .label {
    font-size: 15px;
    opacity: 0.9;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
    font-weight: 600;
    position: relative;
    z-index: 1;
}

.amount-card .amount {
    font-size: 42px;
    font-weight: 700;
    margin: 10px 0;
    position: relative;
    z-index: 1;
    font-family: 'Outfit', sans-serif;
}

.amount-card .tax-info {
    font-size: 13px;
    opacity: 0.85;
    margin-top: 8px;
    position: relative;
    z-index: 1;
}

/* ── Action Section ── */
.action-section {
    padding: 30px;
    border-top: 2px solid #f0e6f4;
    background: #fdfafd;
}

/* ── Buttons ── */
.btn-payment {
    background: linear-gradient(135deg, #5C0269 0%, #7E0A6F 60%);
    color: white;
    border: none;
    padding: 18px 40px;
    border-radius: 0.875rem;
    font-weight: 700;
    font-size: 17px;
    cursor: pointer;
    transition: all 0.25s ease;
    width: 100%;
    margin-bottom: 15px;
    box-shadow: 0 8px 24px rgba(92, 2, 105, 0.35);
    font-family: 'Outfit', sans-serif;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.625rem;
}

.btn-payment:hover {
    background: linear-gradient(135deg, #4A0254 0%, #5C0269 60%);
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(92, 2, 105, 0.45);
}

.btn-payment:active {
    transform: translateY(0);
    box-shadow: 0 4px 16px rgba(92, 2, 105, 0.25);
}

.btn-cancel {
    background: white;
    color: #64748b;
    border: 2px solid #E5C8E2;
    padding: 18px 40px;
    border-radius: 0.875rem;
    font-weight: 600;
    font-size: 17px;
    cursor: pointer;
    transition: all 0.25s ease;
    width: 100%;
    font-family: 'Outfit', sans-serif;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.625rem;
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
    background: #fef2f2;
}

/* ── SweetAlert2 Custom ── */
.swal2-popup {
    border-radius: 1.25rem;
    font-family: 'Outfit', sans-serif;
}

.swal2-title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
}

.swal2-confirm {
    background: linear-gradient(135deg, #5C0269 0%, #7E0A6F 60%) !important;
    border-radius: 0.625rem !important;
    font-weight: 600 !important;
    padding: 0.75rem 2rem !important;
    box-shadow: 0 6px 20px rgba(92, 2, 105, 0.3) !important;
}

.swal2-confirm:hover {
    background: linear-gradient(135deg, #4A0254 0%, #5C0269 60%) !important;
    box-shadow: 0 8px 24px rgba(92, 2, 105, 0.4) !important;
}

.swal2-cancel {
    border-radius: 0.625rem !important;
    font-weight: 600 !important;
    padding: 0.75rem 2rem !important;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    .payment-container {
        margin: 20px auto;
        border-radius: 1.5rem;
    }

    .payment-header {
        padding: 30px 20px;
    }

    .payment-header h1 {
        font-size: 24px;
    }

    .payment-header p {
        font-size: 14px;
    }

    .timer-section {
        padding: 15px 20px;
    }

    .timer {
        font-size: 28px;
    }

    .alert-section {
        padding: 20px;
    }

    .info-section {
        padding: 20px;
    }

    .info-card {
        padding: 20px;
    }

    .amount-card {
        padding: 25px;
    }

    .amount-card .amount {
        font-size: 34px;
    }

    .action-section {
        padding: 20px;
    }

    .btn-payment,
    .btn-cancel {
        padding: 16px 30px;
        font-size: 16px;
    }

    .info-row {
        flex-direction: column;
        gap: 8px;
        padding: 12px 0;
    }

    .info-value {
        text-align: left;
    }
}

@media (max-width: 480px) {
    .payment-header h1 {
        font-size: 20px;
    }

    .timer {
        font-size: 24px;
    }

    .amount-card .amount {
        font-size: 28px;
    }

    .info-card h6 {
        font-size: 16px;
    }
}
    </style>
</head>
<body>
    <div class="payment-container">
        {{-- Header --}}
        <div class="payment-header">
            <h1>
                <img src="{{ asset('assets/success.png') }}" alt="">
                Registrasi Berhasil!
            </h1>
            <p>Silakan selesaikan pembayaran untuk mengaktifkan akun sekolah Anda</p>
            <div class="status-badge">
                <i class="fas fa-clock"></i> Menunggu Pembayaran
            </div>
        </div>

        {{-- Timer Countdown --}}
        <div class="timer-section">
            <div class="timer-label">⏰ Selesaikan pembayaran dalam:</div>
            <div class="timer" id="countdown">23:59:45</div>
        </div>

        {{-- Alert Important --}}
        <div class="alert-section">
            <div class="d-flex align-items-start">
                <i class="fas fa-exclamation-triangle alert-icon"></i>
                <div>
                    <h5>⚠️ Penting untuk Diperhatikan:</h5>
                    <ul>
                        <li>Pembayaran akan <strong>expired dalam 24 jam</strong></li>
                        <li>Pastikan <strong>nominal pembayaran sesuai</strong> dengan yang tertera</li>
                        <li>Akun sekolah akan <strong>aktif otomatis</strong> setelah pembayaran terverifikasi</li>
                        <li>Anda akan <strong>langsung login</strong> ke dashboard setelah pembayaran berhasil</li>
                        <li>Pilihan <strong>metode pembayaran</strong> tersedia di halaman berikutnya</li>
                        <li>Jika mengalami kendala, hubungi <strong>customer service kami</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- School Info --}}
        <div class="info-section">
            <div class="info-card">
                <h6>
                    <i class="fas fa-school"></i>
                    Informasi Sekolah
                </h6>
                <div class="info-row">
                    <span class="info-label">Nama Sekolah</span>
                    <span class="info-value">{{ $inquiry->school_name ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $inquiry->school_email ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">No. Telepon</span>
                    <span class="info-value">{{ $inquiry->school_phone ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Alamat</span>
                    <span class="info-value">{{ $inquiry->school_address ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="info-card">
                <h6>
                    <i class="fas fa-box"></i>
                    Paket Berlangganan
                </h6>
                <div class="info-row">
                    <span class="info-label">Paket</span>
                    <span class="info-value">{{ $package->name ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Durasi</span>
                    <span class="info-value">{{ $package->days ?? 0 }} Hari</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Limit Siswa</span>
                    <span class="info-value">{{ number_format($package->no_of_students ?? 0) }} Siswa</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Limit Staff</span>
                    <span class="info-value">{{ number_format($package->no_of_staffs ?? 0) }} Staff</span>
                </div>
            </div>

            {{-- Payment Amount --}}
            <div class="amount-card">
                <div class="label">💰 TOTAL PEMBAYARAN</div>
                <div class="amount">Rp {{ number_format($inquiry->price ?? 0, 0, ',', '.') }}</div>
                <div class="tax-info">Sudah termasuk PPN 11%</div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="action-section">
            <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="inquiry_id" value="{{ $inquiry->id }}">
                <input type="hidden" name="package_id" value="{{ $package->id ?? '' }}">
                <input type="hidden" name="amount" value="{{ $inquiry->price }}">
                
                <button type="submit" class="btn-payment">
                    <i class="fas fa-credit-card"></i>
                    Lanjutkan ke Pembayaran
                </button>
            </form>
            
            <button type="button" class="btn-cancel" onclick="confirmCancel()">
                <i class="fas fa-times"></i>
                Batalkan Registrasi
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // ============================================
        // COUNTDOWN TIMER (24 hours)
        // ============================================
        function startCountdown() {
        const countdownElement = document.getElementById('countdown');
    
        // ✅ Ambil expiry dari backend (pass via blade)
        const expiryTime = new Date("{{ $expires_at ?? '' }}").getTime();
        
        // ✅ Validasi expiry time
        if (!expiryTime || isNaN(expiryTime)) {
        countdownElement.innerHTML = "ERROR";
        console.error("Invalid expiry time");
        return;
        }
    
        const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = expiryTime - now;

        if (distance < 0) {
            clearInterval(timer);
            countdownElement.innerHTML = "EXPIRED";
            
            // ✅ Auto redirect after expired
            Swal.fire({
                icon: 'error',
                title: 'Waktu Habis!',
                text: 'Batas waktu pembayaran telah berakhir.',
                confirmButtonColor: '#dc3545',
                allowOutsideClick: false
            }).then(() => {
                window.location.href = '/';
            });
            return;
        }

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = 
            String(hours).padStart(2, '0') + ':' + 
            String(minutes).padStart(2, '0') + ':' + 
            String(seconds).padStart(2, '0');
            
        // ✅ TAMBAHAN: Alert kalo tinggal 1 jam
        if (distance < (60 * 60 * 1000) && distance > (59 * 60 * 1000)) {
            Swal.fire({
                icon: 'warning',
                title: 'Segera Expired!',
                text: 'Pembayaran akan expired dalam 1 jam',
                timer: 3000,
                showConfirmButton: false
            });
            }
        }, 1000);
    }

startCountdown();

        // ============================================
        // PROCEED TO PAYMENT
        // ============================================
        document.getElementById('payment-form').addEventListener('submit', function(e) {e.preventDefault();
    
        const form = this;  
    
        Swal.fire({
        title: 'Lanjutkan ke Pembayaran?',
        html: `
            <p>Anda akan diarahkan ke halaman pembayaran DOKU</p>
            <p class="mt-3"><strong>Total: Rp {{ number_format($inquiry->price ?? 0, 0, ',', '.') }}</strong></p>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#667eea',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-arrow-right"></i> Ya, Lanjutkan',
        cancelButtonText: 'Batal'}).then((result) => {
        if (result.isConfirmed) {
            // ✅ Show loading
            Swal.fire({
                title: 'Memproses...',
                text: 'Menghubungi payment gateway',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // ✅ Submit via AJAX (untuk handle error)
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success && data.payment_url) {
                    // ✅ Redirect ke DOKU
                    window.location.href = data.payment_url;
                } else {
                    throw new Error(data.message || 'Gagal memproses pembayaran');
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Memproses',
                    text: error.message || 'Terjadi kesalahan. Silakan coba lagi.',
                    confirmButtonColor: '#dc3545'
                });
            });
        }
        });
    });

        // ============================================
        // CANCEL REGISTRATION
        // ============================================
        function confirmCancel() {
            Swal.fire({
                title: 'Batalkan Registrasi?',
                text: 'Semua data registrasi akan dihapus dan Anda harus mendaftar ulang',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Batalkan',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("registration.cancel", ["id" => $inquiry->id]) }}';
                }
            });
        }

        // ============================================
        // PREVENT ACCIDENTAL PAGE CLOSE
        // ============================================
        window.addEventListener('beforeunload', function (e) {
            e.preventDefault();
            e.returnValue = '';
        });
    </script>
</body>
</html>
