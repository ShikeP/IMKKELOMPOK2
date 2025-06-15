<div id="checkoutPanel" style="position:fixed;top:0;right:-480px;width:400px;max-width:100vw;height:100vh;background:#fff;z-index:2000;transition:right 0.3s;box-shadow: -2px 0 16px rgba(0,0,0,0.07);border-radius:8px 0 0 8px;display:flex;flex-direction:column;">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:24px 28px 12px 28px;border-bottom:1px solid #f2f2f2;">
        <div style="font-size:1.25rem;font-weight:700;color:#222;">Checkout</div>
        <button onclick="closeCheckoutPanel()" style="background:none;border:none;font-size:1.7rem;color:#ff7300;cursor:pointer;">&times;</button>
    </div>
    <form id="checkoutForm" style="flex:1;display:flex;flex-direction:column;padding:18px 28px 0 28px;gap:18px;overflow-y:auto;max-height:calc(100vh - 60px);">
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Tipe Pesanan</label>
            <div style="display:flex;gap:10px;">
                <label style="flex:1;">
                    <input type="radio" name="order_type" value="takeaway" checked style="accent-color:#ff7300;"> <span style="font-weight:500;">Bawa Pulang</span>
                </label>
                <label style="flex:1;">
                    <input type="radio" name="order_type" value="delivery" style="accent-color:#ff7300;"> <span style="font-weight:500;">Delivery</span>
                </label>
            </div>
        </div>
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Nama</label>
            <input type="text" name="name" required style="width:100%;padding:10px 12px;border-radius:8px;border:1px solid #eee;font-size:1rem;">
        </div>
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">No. Telepon</label>
            <input type="text" name="phone" required style="width:100%;padding:10px 12px;border-radius:8px;border:1px solid #eee;font-size:1rem;">
        </div>
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Email</label>
            <input type="email" name="email" required style="width:100%;padding:10px 12px;border-radius:8px;border:1px solid #eee;font-size:1rem;">
        </div>
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Alamat <span style='color:#ff7300'>*</span></label>
            <textarea name="address" id="checkoutAddress" required style="width:100%;padding:10px 12px;border-radius:8px;border:1px solid #eee;font-size:1rem;">{{ $user->address ?? '' }}</textarea>
        </div>
        <div>
            <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Catatan (opsional)</label>
            <textarea name="note" rows="2" style="width:100%;padding:10px 12px;border-radius:8px;border:1px solid #eee;font-size:1rem;"></textarea>
        </div>
        <button type="submit" style="margin-top:18px;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Lanjut ke Pembayaran</button>
    </form>
</div>
<!-- Panel Pembayaran -->
<div id="paymentPanel" style="position:fixed;top:0;right:-480px;width:400px;max-width:100vw;height:100vh;background:#fff;z-index:2100;transition:right 0.3s;box-shadow: -2px 0 16px rgba(0,0,0,0.07);border-radius:8px 0 0 8px;display:flex;flex-direction:column;">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:24px 28px 12px 28px;border-bottom:1px solid #f2f2f2;">
        <div style="font-size:1.25rem;font-weight:700;color:#222;">Pembayaran</div>
        <button onclick="closePaymentPanel()" style="background:none;border:none;font-size:1.7rem;color:#ff7300;cursor:pointer;">&times;</button>
    </div>
    <div id="paymentStep1" style="flex:1;display:flex;flex-direction:column;padding:18px 28px 0 28px;gap:18px;">
        <label style="font-weight:600;color:#222;margin-bottom:6px;display:block;">Pilih Metode Pembayaran</label>
        <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
            <input type="radio" name="payment_method" value="gopay" style="accent-color:#ff7300;"> 
            <img src="https://img.icons8.com/color/32/000000/gopay.png" style="width:28px;"> GoPay
        </label>
        <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
            <input type="radio" name="payment_method" value="ovo" style="accent-color:#ff7300;"> 
            <img src="https://img.icons8.com/color/32/000000/ovo.png" style="width:28px;"> OVO
        </label>
        <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
            <input type="radio" name="payment_method" value="cod" style="accent-color:#ff7300;"> 
            <span style="font-size:1.1rem;">Cash on Delivery</span>
        </label>
        <button id="toSummaryBtn" style="margin-top:32px;width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Lanjut</button>
    </div>
    <div id="paymentStep2" style="display:none;flex:1;flex-direction:column;padding:18px 28px 0 28px;gap:18px;">
        <h3 style="font-size:1.1rem;font-weight:700;">Ringkasan Pesanan</h3>
        <div id="summaryBox" style="background:#fafafa;border-radius:12px;padding:18px 18px 10px 18px;margin-bottom:18px;"></div>
        <button id="toSuccessBtn" style="margin-top:18px;width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Buat Pesanan</button>
        <button id="backToPaymentBtn" style="margin-top:10px;width:100%;background:#fff;color:#ff7300;font-weight:700;font-size:1.1rem;border:1.5px solid #ff7300;border-radius:8px;padding:12px 0;cursor:pointer;">Kembali</button>
    </div>
    <div id="paymentStep3" style="display:none;flex:1;flex-direction:column;align-items:center;justify-content:center;padding:32px 28px 0 28px;">
        <div style="font-size:2.5rem;color:#4CAF50;margin-bottom:8px;">✔️</div>
        <div style="font-size:1.2rem;font-weight:700;margin-bottom:8px;text-align:center;">Pesanan Berhasil Dibuat! 🎉</div>
        <div style="background:#fafafa;border-radius:12px;padding:18px 18px 10px 18px;margin-bottom:18px;width:100%;">
            <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                <span>Kode Pesanan:</span>
                <span style="color:#ff7300;font-weight:600;">ORD-<span id="orderCode"></span></span>
            </div>
            <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                <span>Total Pembayaran:</span>
                <span style="font-weight:600;" id="successTotal"></span>
            </div>
            <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                <span>Metode Pembayaran:</span>
                <span style="font-weight:600;" id="successMethod"></span>
            </div>
            <div style="display:flex;justify-content:space-between;">
                <span>Estimasi Siap:</span>
                <span style="font-weight:600;">20-30 menit</span>
            </div>
        </div>
        <div style="background:#eaf6ff;border-radius:8px;padding:10px 14px;color:#0077b6;font-size:0.98rem;margin-bottom:12px;">
            💡 Silakan bayar saat pesanan siap atau saat makan di tempat
        </div>
        <button style="width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;margin-bottom:10px;">Lihat Detail Pesanan</button>
        <button style="width:100%;background:#fff;color:#ff7300;font-weight:700;font-size:1.1rem;border:1.5px solid #ff7300;border-radius:8px;padding:12px 0;cursor:pointer;">Lanjut Belanja</button>
    </div>
</div>
<script>
function openCheckoutPanel() {
    closeCartPanel(); // Tutup panel keranjang terlebih dahulu
    document.getElementById('checkoutPanel').style.right = '0';
    // Autofill jika user login
    if (window.checkoutUser) {
        document.querySelector('input[name="name"]').value = window.checkoutUser.name || '';
        document.querySelector('input[name="phone"]').value = window.checkoutUser.phone || '';
        document.querySelector('input[name="email"]').value = window.checkoutUser.email || '';
        document.querySelector('textarea[name="address"]').value = window.checkoutUser.address || '';
    }
}
function closeCheckoutPanel() {
    document.getElementById('checkoutPanel').style.right = '-480px';
}
function closePaymentPanel() {
    document.getElementById('paymentPanel').style.right = '-480px';
}
let checkoutData = {};

// Saat submit form checkout, simpan data ke checkoutData dan buka panel pembayaran
if (document.getElementById('checkoutForm')) {
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var address = document.getElementById('checkoutAddress').value.trim();
        if (!address) {
            alert('Alamat wajib diisi!');
            document.getElementById('checkoutAddress').focus();
            return false;
        }
        // Simpan data checkout ke variabel JS
        checkoutData = {
            order_type: document.querySelector('input[name="order_type"]:checked').value,
            name: document.querySelector('input[name="name"]').value,
            phone: document.querySelector('input[name="phone"]').value,
            email: document.querySelector('input[name="email"]').value,
            address: document.querySelector('textarea[name="address"]').value,
            note: document.querySelector('textarea[name="note"]').value
        };
        document.getElementById('paymentPanel').style.right = '0';
        closeCheckoutPanel();
    });
}

const paymentPanel = document.getElementById('paymentPanel');
const step1 = document.getElementById('paymentStep1');
const step2 = document.getElementById('paymentStep2');
const step3 = document.getElementById('paymentStep3');

if (document.getElementById('toSummaryBtn')) {
    document.getElementById('toSummaryBtn').onclick = function() {
        // Validasi metode pembayaran
        const method = paymentPanel.querySelector('input[name="payment_method"]:checked');
        if (!method) { alert('Pilih metode pembayaran!'); return; }
        step1.style.display = 'none';
        step2.style.display = 'flex';
        // Ringkasan pesanan dummy
        document.getElementById('summaryBox').innerHTML = '<div style="display:flex;justify-content:space-between;"><span>Subtotal</span><span>Rp25.000</span></div><div style="display:flex;justify-content:space-between;"><span>Biaya Layanan</span><span>Rp13.500</span></div><div style="display:flex;justify-content:space-between;font-weight:700;color:#ff7300;"><span>Total</span><span>Rp38.500</span></div>';
    }
}

if (document.getElementById('toSuccessBtn')) {
    document.getElementById('toSuccessBtn').onclick = function() {
        // Gabungkan data checkout dan payment
        const orderData = {
            ...checkoutData,
            payment_method: paymentPanel.querySelector('input[name="payment_method"]:checked').value
        };
        fetch('/order/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            body: JSON.stringify(orderData)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                step2.style.display = 'none';
                step3.style.display = 'flex';
                document.getElementById('orderCode').innerText = data.order_id;
                document.getElementById('successTotal').innerText = 'Rp38.500';
                const method = paymentPanel.querySelector('input[name="payment_method"]:checked');
                document.getElementById('successMethod').innerText = method ? (method.value==='gopay'?'GoPay':method.value==='ovo'?'OVO':'Bayar Di Tempat') : '';
            } else {
                alert('Gagal membuat pesanan!');
            }
        })
        .catch(err => {
            alert('Terjadi error pada server!');
            console.error(err);
        });
    }
}
if (document.getElementById('backToPaymentBtn')) {
    document.getElementById('backToPaymentBtn').onclick = function() {
        step2.style.display = 'none';
        step1.style.display = 'flex';
    }
}
</script> 