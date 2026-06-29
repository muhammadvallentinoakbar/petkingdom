# PetKingdom — Website Pet Shop Berbasis Laravel


Aplikasi ini dikembangkan sebagai Tugas Akhir mata kuliah **Pemograman Web 2**, Program Studi Sistem Informasi, Fakultas Sains dan Teknologi, Universitas Pesantren Tinggi Darul Ulum (UNIPDU) Jombang.

- **Demo:** http://petshopku.site.je/
- **Disusun oleh:**
  - Muhammad Vallentino Akbar — 4124040
  - Sayyid Ahmed Ubaidillah — 4123051
- **Dosen Pengampu:** Muhammad Miftakhul Syaikh

---

## Deskripsi Aplikasi

PetKingdom memungkinkan pelanggan untuk menelusuri katalog produk, melakukan pemesanan, membayar, hingga melacak status pengiriman secara online. Di sisi lain, admin dapat mengelola data master (kategori, brand, supplier, produk) serta memantau dan memproses seluruh transaksi pesanan melalui satu dashboard terpusat.

Sistem menerapkan **Role-Based Access Control (RBAC)** dengan dua peran pengguna: **admin** dan **pelanggan (user)**, menggunakan package Spatie Laravel Permission.

---

## Daftar Fitur

### Sisi Pelanggan (Front-end)
- Registrasi, login, verifikasi email, dan reset kata sandi (Laravel Breeze)
- Beranda dengan kategori produk, produk terlaris, dan produk terbaru
- Katalog & pencarian produk berdasarkan nama, SKU, atau deskripsi
- Detail produk dan filter berdasarkan kategori
- Keranjang belanja (tambah, ubah jumlah, hapus item)
- Checkout dengan input alamat pengiriman
- Tiga metode pembayaran (simulasi): **COD**, **Transfer Bank**, dan **QRIS**
- Unggah bukti pembayaran (untuk transfer bank & QRIS)
- Riwayat pesanan dan pelacakan (tracking) status pengiriman
- Manajemen profil: data diri, foto profil, kata sandi, dan alamat

### Sisi Admin (Back-end)
- Dashboard ringkasan statistik (jumlah pelanggan, produk, pesanan, total pendapatan)
- Manajemen data master: kategori, brand, supplier, dan produk (CRUD)
- Manajemen pesanan: update status pesanan, status pembayaran, dan status pengiriman
- Akses dibatasi khusus role admin melalui `RoleMiddleware`

### Keamanan
- Autentikasi via Laravel Breeze
- Otorisasi berbasis role (Spatie Laravel Permission + RoleMiddleware)
- Validasi input pada seluruh form (termasuk tipe & ukuran file bukti pembayaran)
- Query data dibatasi berdasarkan `user_id` pengguna yang login

---

## Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Bahasa Pemrograman | PHP 8.2 |
| Framework Back-end | Laravel 12 |
| Basis Data | SQLite (lokal) / MySQL (opsional) |
| Templating Engine | Blade |
| Front-end / Styling | Tailwind CSS 3, Alpine.js |
| Build Tool | Vite |
| Manajemen Hak Akses | Spatie Laravel Permission |
| Manajemen Gambar | Intervention Image |
| Manajemen Dependensi | Composer (PHP), NPM (JavaScript) |

---

## Cara Menjalankan di Lokal

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- Git
- (Opsional) MySQL, jika tidak menggunakan SQLite

### Langkah-langkah

```bash
# 1. Clone repositori
git clone https://github.com/muhammadvallentinoakbar/petkingdom.git
cd petkingdom

# 2. Install dependensi PHP
composer install

# 3. Install dependensi JavaScript
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate
```

**6. Konfigurasi database** pada file `.env`.

Untuk SQLite (paling mudah untuk pengembangan lokal):
```env
DB_CONNECTION=sqlite
```
Lalu buat file database-nya:
```bash
touch database/database.sqlite
```

Atau untuk MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=petkingdom
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 7. Jalankan migrasi (tambahkan --seed jika tersedia data seeder)
php artisan migrate --seed

# 8. Buat symbolic link storage (untuk gambar produk & bukti pembayaran)
php artisan storage:link

# 9. Build/compile asset front-end
npm run dev
# atau untuk versi production:
# npm run build

# 10. Jalankan server lokal
php artisan serve
```

Aplikasi dapat diakses melalui: **http://localhost:8000**

### Akun Demo

| Role | Email | Password |
|---|---|---|
| User | valentino@gmail.com | 12345678 |
| Admin | admin@gmail.com | 12345678 |

> Jika menjalankan dari kondisi database kosong (tanpa seeder), silakan registrasi akun baru terlebih dahulu, kemudian set role `admin` secara manual pada tabel terkait (Spatie Permission) untuk mengakses panel admin.

---

## Ringkasan Langkah Deploy

Aplikasi demo di-deploy menggunakan layanan *shared hosting* gratis **InfinityFree**. Berikut ringkasan langkah deploy-nya:

1. **Siapkan kode untuk production**
```bash
composer install --optimize-autoloader --no-dev
npm run build
```
2. **Set environment production** pada `.env`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```
3. **Buat akun & domain di hosting** (mis. InfinityFree), siapkan database MySQL melalui panel hosting (cPanel-like), lalu catat kredensial database.
4. **Upload file aplikasi**
- Upload seluruh isi folder project ke server (via File Manager hosting atau FTP/SFTP).
- Arahkan document root domain ke folder `public/`, **atau** pindahkan isi `public/` ke `htdocs`/root domain dan sesuaikan path `index.php` (umum dilakukan pada shared hosting tanpa akses konfigurasi server).
5. **Konfigurasi `.env` di server** sesuai kredensial database hosting.
6. **Jalankan migrasi** (jika hosting menyediakan akses terminal/SSH atau Composer/Artisan via panel):
```bash
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
```
Jika hosting tidak menyediakan akses CLI, migrasi dapat dilakukan secara manual melalui import file SQL ke database via panel hosting.
7. **Verifikasi** aplikasi dapat diakses melalui domain (contoh demo: http://petshopku.site.je/), pastikan upload gambar produk dan bukti pembayaran tersimpan dengan benar (folder `storage` writable).

---

## Akses Dosen ke Repositori (Jika Repositori Privat)

Jika repositori GitHub ini diatur sebagai **privat**, pemilik repositori perlu menambahkan dosen pengampu sebagai *collaborator* agar dapat mengakses dan menilai source code. Langkah-langkahnya:

1. Buka repositori di GitHub: `https://github.com/muhammadvallentinoakbar/petkingdom`
2. Masuk ke tab **Settings** → **Collaborators** (atau **Access** pada beberapa tampilan UI).
3. Klik **Add people**.
4. Masukkan username atau email GitHub dosen pengampu (**Muhammad Miftakhul Syaikh**).
5. Pilih role akses **Read** (cukup untuk meninjau kode) atau sesuai kebutuhan.
6. Klik **Add [username] to this repository**.
7. Dosen akan menerima undangan via email/notifikasi GitHub dan dapat mengakses repositori setelah menerima undangan tersebut.

> Alternatif: jika tidak ingin menambahkan sebagai collaborator, repositori juga dapat dijadikan **public** sementara untuk keperluan penilaian, lalu dikembalikan ke privat setelahnya.

---

## Struktur Direktori Utama

```
app/
├─ Models/            → Product, Category, Brand, Supplier, Cart, Order, OrderItem, User
├─ Http/
│   ├─ Controllers/   → ShopController, CartController, CheckoutController,
│   │                   PaymentController, OrderController, ProfileController,
│   │                   Admin/ (DashboardController, CategoryController, dst.)
│   └─ Middleware/     → RoleMiddleware
resources/views/        → shop, cart, products, orders, payment, profile, admin
database/migrations/    → struktur tabel basis data
routes/web.php          → seluruh rute aplikasi
```

---

## Catatan & Batasan

- Pembayaran (COD, transfer bank, QRIS) berupa **simulasi**, belum terintegrasi dengan payment gateway pihak ketiga.
- Pelacakan pengiriman diperbarui **manual oleh admin**, belum terintegrasi API kurir.
- Pengujian sistem menggunakan metode **black box testing** pada lingkungan lokal.

## Saran Pengembangan Lanjutan

- Integrasi payment gateway pihak ketiga (otomatisasi verifikasi pembayaran)
- Integrasi API resmi jasa kurir untuk update status pengiriman otomatis
- Fitur ulasan & rating produk
- Notifikasi email/push notification untuk perubahan status pesanan
- Automated testing (PHPUnit) pada seluruh modul

---

## Referensi

- [Laravel 12.x Documentation](https://laravel.com/docs)
- [Spatie Laravel Permission Documentation](https://spatie.be/docs/laravel-permission)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev)
- [InfinityFree Documentation](https://infinityfree.net)
