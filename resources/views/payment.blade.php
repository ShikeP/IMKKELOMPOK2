@include('partials.sidebar')
<div id="paymentApp" style="max-width:420px;margin:40px auto;background:#fff;border-radius:18px;box-shadow:0 2px 16px rgba(0,0,0,0.07);padding:0 0 32px 0;">
    <!-- Step 1: Pilih Metode Pembayaran -->
    <div v-if="step===1" style="padding:32px 32px 0 32px;">
        <h2 style="font-size:1.3rem;font-weight:700;margin-bottom:18px;">Pilih Metode Pembayaran</h2>
        <div style="display:flex;flex-direction:column;gap:16px;">
            <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
                <input type="radio" v-model="paymentMethod" value="gopay" style="accent-color:#ff7300;"> 
                <img src="https://img.icons8.com/color/32/000000/gopay.png" style="width:28px;"> GoPay
            </label>
            <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
                <input type="radio" v-model="paymentMethod" value="ovo" style="accent-color:#ff7300;"> 
                <img src="https://img.icons8.com/color/32/000000/ovo.png" style="width:28px;"> OVO
            </label>
            <label style="display:flex;align-items:center;gap:12px;padding:14px 18px;border:1.5px solid #eee;border-radius:10px;cursor:pointer;">
                <input type="radio" v-model="paymentMethod" value="cod" style="accent-color:#ff7300;"> 
                <span style="font-size:1.1rem;">Cash on Delivery</span>
            </label>
        </div>
        <button :disabled="!paymentMethod" @click="step=2" style="margin-top:32px;width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Lanjut</button>
    </div>
    <!-- Step 2: Ringkasan Pesanan -->
    <div v-if="step===2" style="padding:32px 32px 0 32px;">
        <h2 style="font-size:1.3rem;font-weight:700;margin-bottom:18px;">Ringkasan Pesanan</h2>
        <div style="background:#fafafa;border-radius:12px;padding:18px 18px 10px 18px;margin-bottom:18px;">
            <div v-for="item in cartItems" :key="item.id" style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                <span>@{{ item.food.name }}</span>
                <span style="font-weight:600;">@{{ item.quantity }} x Rp@{{ item.food.price.toLocaleString('id-ID') }}</span>
            </div>
            <div style="border-top:1px solid #eee;margin:10px 0 0 0;padding-top:10px;display:flex;justify-content:space-between;">
                <span>Subtotal</span>
                <span style="font-weight:600;">Rp@{{ subtotal.toLocaleString('id-ID') }}</span>
    </div>
            <div style="display:flex;justify-content:space-between;">
                <span>Biaya Layanan</span>
                <span style="font-weight:600;">Rp@{{ serviceFee.toLocaleString('id-ID') }}</span>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:1.1rem;font-weight:700;color:#ff7300;margin-top:8px;">
                <span>Total</span>
                <span>Rp@{{ total.toLocaleString('id-ID') }}</span>
            </div>
        </div>
        <button @click="step=3" style="margin-top:18px;width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Buat Pesanan</button>
        <button @click="step=1" style="margin-top:10px;width:100%;background:#fff;color:#ff7300;font-weight:700;font-size:1.1rem;border:1.5px solid #ff7300;border-radius:8px;padding:12px 0;cursor:pointer;">Kembali</button>
    </div>
    <!-- Step 3: Sukses -->
    <div v-if="step===3" style="padding:32px 32px 0 32px;">
        <div style="display:flex;flex-direction:column;align-items:center;">
            <div style="font-size:2.5rem;color:#4CAF50;margin-bottom:8px;">✔️</div>
            <div style="font-size:1.2rem;font-weight:700;margin-bottom:8px;text-align:center;">Pesanan Berhasil Dibuat! 🎉</div>
            <div style="background:#fafafa;border-radius:12px;padding:18px 18px 10px 18px;margin-bottom:18px;width:100%;">
                <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                    <span>Kode Pesanan:</span>
                    <span style="color:#ff7300;font-weight:600;">@{{ orderCode }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                    <span>Total Pembayaran:</span>
                    <span style="font-weight:600;">Rp@{{ total.toLocaleString('id-ID') }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                    <span>Metode Pembayaran:</span>
                    <span style="font-weight:600;">@{{ paymentMethodLabel }}</span>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
<script>
new Vue({
    el: '#paymentApp',
    data: {
        step: 1,
        paymentMethod: '',
        cartItems: @json($cartItems ?? []),
        subtotal: @json(isset($cartItems) ? collect($cartItems)->sum(function($item){ return $item['food']['price'] * $item['quantity']; }) : 0),
        serviceFee: 13500,
        get total() { return this.subtotal + this.serviceFee; },
        orderCode: 'ORD-' + Math.floor(Date.now()/1000),
    },
    computed: {
        paymentMethodLabel() {
            if(this.paymentMethod==='gopay') return 'GoPay';
            if(this.paymentMethod==='ovo') return 'OVO';
            if(this.paymentMethod==='cod') return 'Bayar Di Tempat';
            return '';
        }
    }
});
</script> 