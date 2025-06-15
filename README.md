# WarungAbdya - Sistem Pemesanan Makanan Online

Selamat datang di proyek WarungAbdya! Ini adalah sistem pemesanan makanan online yang dibangun menggunakan Laravel. Aplikasi ini memungkinkan pengguna untuk menjelajahi menu, menambahkan item ke keranjang, melakukan proses checkout, mengelola profil mereka, dan menandai hidangan favorit. Dilengkapi juga dengan panel admin untuk pengelolaan makanan, pesanan, pengguna, dan ulasan secara komprehensif.

## Fitur Utama

*   **Autentikasi Pengguna**: Pendaftaran, Login, dan Logout untuk pengguna biasa dan admin.
*   **Kontrol Akses Berbasis Peran**: Membedakan antara peran `user` dan `admin` dengan hak akses yang berbeda.
*   **Menu Makanan Dinamis**: Menampilkan daftar makanan dengan filter kategori (Makanan, Lauk, Camilan, Minuman).
*   **Halaman Detail Produk Interaktif**:
    *   Deskripsi makanan dan harga.
    *   Ulasan dan penilaian dari pengguna.
    *   Fungsionalitas "Tambah ke Keranjang".
    *   Fitur Favorit/Daftar Keinginan dengan ikon hati interaktif (abu-abu untuk belum favorit, merah untuk sudah favorit).
    *   Bagian "Lauk Rekomendasi" yang menampilkan hidangan pelengkap yang relevan.
*   **Manajemen Keranjang Belanja**:
    *   Menambah, mengubah jumlah, dan menghapus item dari keranjang.
    *   Panel keranjang samping yang interaktif.
*   **Proses Checkout Terpadu**:
    *   Pilihan tipe pesanan (Ambil di Tempat / Pengiriman).
    *   Input detail pengguna (nama, alamat, telepon, email).
    *   Berbagai metode pembayaran (GoPay, OVO, Cash on Delivery).
    *   Ringkasan pesanan dan konfirmasi.
*   **Manajemen Profil Pengguna**: Melihat dan mengedit informasi profil pengguna.
*   **Panel Admin**:
    *   Dashboard untuk ringkasan data.
    *   Manajemen Produk (CRUD: Buat, Baca, Perbarui, Hapus).
    *   Manajemen Ulasan (Melihat, Menghapus).
    *   Manajemen Pesanan (Melihat, Memperbarui Status).
    *   Manajemen Pengguna.

## Teknologi yang Digunakan

*   **Backend**: PHP 8.x dengan Laravel Framework 10.x
*   **Database**: MySQL
*   **Templating**: Blade
*   **Frontend Interaktivitas**: JavaScript Vanilla (untuk keranjang, favorit, dll.)
*   **Manajemen Paket PHP**: Composer
*   **Manajemen Paket JavaScript**: npm (atau Yarn)
*   **Asset Bundling**: Vite

## Panduan Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek secara lokal.

### Prasyarat

Pastikan Anda telah menginstal yang berikut:
*   PHP >= 8.1
*   Composer
*   Node.js & npm (atau Yarn)
*   MySQL Server

### Langkah-langkah Instalasi

1.  **Clone Repositori**:
    ```bash
    git clone <URL_REPOSITORI_ANDA>
    cd abdya-copy-2 # Ganti dengan nama folder proyek Anda jika berbeda
    ```

2.  **Instal Dependensi PHP**:
    ```bash
    composer install
    ```

3.  **Instal Dependensi JavaScript**:
    ```bash
    npm install
    # atau
    # yarn install
    ```

4.  **Konfigurasi Variabel Lingkungan**:
    *   Duplikasi file `.env.example` dan ganti namanya menjadi `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Buat kunci aplikasi (application key):
        ```bash
        php artisan key:generate
        ```
    *   Buka file `.env` dan konfigurasikan detail koneksi database Anda:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=abdya # Ganti dengan nama database Anda
        DB_USERNAME=root # Ganti dengan username database Anda
        DB_PASSWORD= # Ganti dengan password database Anda (biarkan kosong jika tidak ada)
        ```

5.  **Jalankan Migrasi dan Seeder Database**:
    ```bash
    php artisan migrate
    php artisan db:seed # Ini akan mengisi database dengan data awal (pengguna, kategori, makanan)
    ```
    *Catatan: Jika `php artisan migrate` menghasilkan error tentang tabel yang sudah ada, itu berarti Anda pernah menjalankannya sebelumnya. Pastikan tabel `sessions` dan `users` sudah ada di database Anda.*

6.  **Buat Symlink Penyimpanan (untuk gambar)**:
    ```bash
    php artisan storage:link
    ```

7.  **Kompilasi Aset Frontend**:
    ```bash
    npm run dev # Untuk pengembangan dengan hot-reloading
    # atau
    # npm run build # Untuk produksi
    ```

## Cara Penggunaan

1.  **Mulai Server Pengembangan Laravel**:
    ```bash
    php artisan serve
    ```

2.  **Akses Aplikasi**:
    Buka browser web Anda dan navigasi ke `http://127.0.0.1:8000` (atau alamat yang ditampilkan di terminal Anda).

3.  **Kredensial Default (jika di-seed)**:
    *   **Pengguna Biasa**: `test@example.com` / `password` (Anda dapat memeriksa `database/seeders/DatabaseSeeder.php` untuk detail).
    *   **Admin**: Jika belum ada, Anda bisa membuat pengguna admin secara manual melalui Tinker:
        ```bash
        php artisan tinker
        >>> use App\Models\User;
        >>> use Illuminate\Support\Facades\Hash;
        >>> User::create(['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => 'admin']);
        ```

