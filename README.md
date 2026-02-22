<div align="center">

# 🛒 Web Ecommerce Mini

### Platform ecommerce sederhana berbasis Laravel dengan fitur lengkap untuk admin dan pelanggan.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

</div>

---

## 📋 Tentang Project

**Web Ecommerce Mini** adalah aplikasi web ecommerce sederhana yang dibangun menggunakan **Laravel & ViteJS**. Project ini mencakup dua peran utama yaitu **Admin** dan **Pelanggan (Customer)**, masing-masing dengan dashboard dan fitur yang berbeda. Cocok digunakan sebagai referensi belajar atau sebagai starter project ecommerce berbasis PHP & JS.

---

## ✨ Fitur Utama

### 👤 Autentikasi
- Register & Login untuk Admin dan Pelanggan
- Proteksi route berdasarkan role (Admin / Customer)

### 🛠️ Dashboard Admin
- **Administrasi Produk** — Tambah, edit, hapus, dan kelola stok produk
- **Administrasi Transaksi** — Lihat dan kelola semua transaksi yang masuk
- **Manajemen Stok** — Update stok barang secara real-time

### 🛍️ Dashboard Pelanggan
- **Halaman Produk** — Browsing dan lihat detail produk
- **Keranjang Belanja** — Tambah, hapus, dan update jumlah produk di keranjang
- **Checkout** — Proses pembelian produk
- **Riwayat Pesanan** — Lihat semua transaksi yang pernah dilakukan

---

## 🧰 Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| **Laravel** | PHP Framework utama |
| **Blade** | Template engine untuk tampilan |
| **Tailwind CSS** | Framework CSS untuk styling |
| **Bootstrap CSS** | Framework CSS untuk styling |
| **Sqlite** | Database |
| **Vite** | Build tool untuk assets |

---

## ⚙️ Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di lokal:

### 1. Clone Repository
```bash
git clone https://github.com/Davin164/Web-EcommerceMini.git
cd Web-EcommerceMini
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database di file `.env`
```

### 4. Migrasi & Seeder Database
```bash
php artisan migrate --seed
```

### 5. Build Assets (FrontEnd)
```bash
npm run dev
```

### 6. Jalankan Server (BackEnd)
```bash
php artisan serve
```

Akses aplikasi di: **http://localhost:8000**

---

## 🗂️ Struktur Project

```
Web-EcommerceMini/
├── app/
│   ├── Http/Controllers/     # Controller untuk Admin & Customer
│   ├── Models/               # Model Eloquent
│   └── ...
├── database/
│   ├── migrations/           # Migrasi database
│   └── seeders/              # Data awal (seeder)
├── resources/
│   └── views/
│       ├── admin/            # Tampilan dashboard admin
│       ├── customer/         # Tampilan halaman pelanggan
│       ├── layouts/          # Layout utama (admin, app, guest)
│       └── profile/          # Halaman profil pengguna
├── routes/
│   └── web.php               # Definisi route aplikasi
└── ...
```

---

## 👥 Akun Default (Setelah Seeder)

| Role | Email | Password |
|---|---|---|
| Admin | admin@example.com | password |
| Customer | customer@example.com | password |

> ⚠️ Pastikan untuk mengganti password default setelah instalasi di lingkungan produksi.

---

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran. Bebas digunakan dan dimodifikasi sesuai kebutuhan.

---

<div align="center">

Dibuat dengan ❤️ menggunakan [Laravel](https://laravel.com)

</div>
