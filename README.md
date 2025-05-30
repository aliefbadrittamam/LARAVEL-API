<!DOCTYPE html>
<html lang="id">
<!-- <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dokumentasi API - Laravel Backend</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 2rem; line-height: 1.6; }
    h2 { margin-top: 2rem; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; }
    th, td { border: 1px solid #ccc; padding: 0.5rem; text-align: left; }
    th { background-color: #f5f5f5; }
    code { background: #eee; padding: 0.2rem 0.4rem; border-radius: 4px; }
    pre { background: #f9f9f9; padding: 1rem; border-left: 4px solid #ccc; overflow: auto; }
  </style>
</head> -->
<body>

  <h1>🧭 Dokumentasi API Routes – Laravel Backend</h1>
  <p>Semua endpoint dilindungi oleh <strong>Laravel Sanctum</strong> dan menggunakan <strong>middleware RBAC</strong>.</p>

  <h2>🔐 Auth Endpoints</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>POST</td><td>/register</td><td>Registrasi user</td><td>-</td></tr>
    <tr><td>POST</td><td>/login</td><td>Login user</td><td>-</td></tr>
    <tr><td>GET</td><td>/saya</td><td>Profil user saat ini</td><td>auth:sanctum</td></tr>
    <tr><td>GET</td><td>/user</td><td>Store permission (sementara)</td><td>-</td></tr>
  </table>

  <h2>🛡️ Role & Permission (Super Admin Only)</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>POST</td><td>/super-admin/permission</td><td>Tambah permission</td><td>auth:sanctum + role:super-admin</td></tr>
    <tr><td>GET</td><td>/super-admin</td><td>Tambah role (sementara store)</td><td>auth:sanctum + role:super-admin</td></tr>
  </table>

  <h2>📦 Category Endpoints</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>GET</td><td>/categories/showdata</td><td>Lihat semua kategori</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
    <tr><td>POST</td><td>/categories/tambah</td><td>Tambah kategori baru</td><td>auth:sanctum + role:admin</td></tr>
    <tr><td>PUT</td><td>/categories/update</td><td>Perbarui data kategori</td><td>auth:sanctum + role:admin</td></tr>
    <tr><td>DELETE</td><td>/categories/delete</td><td>Hapus kategori</td><td>auth:sanctum + role:admin</td></tr>
  </table>

  <h2>🛍️ Product Endpoints</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>GET</td><td>/product/showdata</td><td>Lihat semua produk</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
    <tr><td>POST</td><td>/product/tambah</td><td>Tambah produk</td><td>auth:sanctum + role:admin/super-admin</td></tr>
    <tr><td>POST</td><td>/product/update</td><td>Perbarui produk</td><td>auth:sanctum + role:admin/super-admin</td></tr>
    <tr><td>DELETE</td><td>/product/delete</td><td>Hapus produk</td><td>auth:sanctum + role:admin/super-admin</td></tr>
  </table>

  <h2>💳 Payment Gateway Endpoints</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>POST</td><td>/payment-gateway/store</td><td>Membuat transaksi pembayaran</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
    <tr><td>POST</td><td>/payment-gateway/cek-detail-transaksi</td><td>Mengecek detail transaksi</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
    <tr><td>POST</td><td>/payment-gateway/cek-status-transaksi</td><td>Mengecek status pembayaran</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
  </table>

  <h2>🚚 Shipping API</h2>
  <table>
    <tr><th>Method</th><th>Endpoint</th><th>Deskripsi</th><th>Middleware</th></tr>
    <tr><td>POST</td><td>/destination</td><td>Ambil data tujuan pengiriman</td><td>auth:sanctum + role:admin/super-admin/customer</td></tr>
  </table>

  <h2>📌 Header Autentikasi</h2>
  <pre><code>
Authorization: Bearer {your_token}
Content-Type: application/json
  </code></pre>

  <h2>📌 Payment Endpoints</h2>

  <h3>1. POST /api/payment/store</h3>
  <p>Membuat transaksi baru dengan pilihan metode pembayaran dan item produk.</p>
  <pre><code>{
  "{
  "store_name": "Toko Mebel Jaya",
  "customer_name": "Budi Santoso",
  "customer_email": "budi@example.com",
  "customer_phone": "081234567890",
  "products": [
    {
      "product_code": "MBL001",
      "product_name": "Meja Kayu Jati",
      "product_price": 2500000,
      "quantity": 1
    },
    {
      "product_code": "MBL002",
      "product_name": "Kursi Tamu Minimalis",
      "product_price": 1800000,
      "quantity": 1
    }
  ],
  "callback_url": "https://tokomebeljaya.com/payment-callback",
  "metode_pembayaran": "QRIS"
}

}</code></pre>
  <p><strong>Metode pembayaran yang didukung:</strong> BRIVA, QRIS, OVO, DANA, LINKAJA, BCA_KLIKPAY, MANDIRI_CLICKPAY, ALFAMART, INDOMARET</p>
  <p><strong>Respons sukses:</strong></p>
  <pre><code>{
  "status": true,
  "message": "Transaksi berhasil dibuat",
  "data": {
    "success": true,
    "data": {
      "reference": "DEV-TRX-171000123456",
      "checkout_url": "https://tripay.co.id/checkout/DEV-TRX-171000123456"
    }
  }
}</code></pre>

  <h3>2. POST /api/payment/detail-transaksi</h3>
  <p>Mengecek detail transaksi berdasarkan kode referensi.</p>
  <pre><code>{
  "reference": "DEV-TRX-171000123456"
}</code></pre>
  <p><strong>Respons sukses:</strong></p>
  <pre><code>{
  "status": true,
  "message": "Status transaksi berhasil diambil",
  "data": {
    "success": true,
    "data": {
      "reference": "DEV-TRX-171000123456",
      "status": "PAID",
      "amount": 25000
    }
  }
}</code></pre>

  <h3>3. POST /api/payment/status-pembayaran</h3>
  <p>Mengambil status pembayaran berdasarkan referensi transaksi.</p>
  <pre><code>{
  "reference": "DEV-TRX-171000123456"
}</code></pre>
  <p><strong>Respons sukses:</strong></p>
  <pre><code>{
  "status": true,
  "message": "Status pembayaran berhasil diambil",
  "data": "Lunas"
}</code></pre>

  <p><strong>Status Pembayaran:</strong> Lunas (PAID), Menunggu Pembayaran (PENDING), Kedaluwarsa (EXPIRED), Belum Bayar (lain-lain)</p>

</body>
</html>

  <h2>🚀 Cara Clone dan Menjalankan Proyek Laravel</h2>
  <pre><code>
# 1. Clone repository
git clone https://github.com/namauser/nama-repo.git
cd nama-repo

# 2. Install dependencies
composer install

# 3. Copy file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Konfigurasi .env (database, mail, dll)

# 6. Jalankan migrasi dan seeding jika diperlukan
php artisan migrate --seed

# 7. Jalankan server lokal
php artisan serve

# 8. Jalankan queue jika menggunakan antrian
php artisan queue:work
  </code></pre>

  <p><strong>Catatan:</strong> Pastikan Anda sudah mengatur database, storage link (<code>php artisan storage:link</code>), dan Laravel Sanctum untuk autentikasi token.</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
