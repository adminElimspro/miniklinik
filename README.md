# MiniKlinik — Starter Tes Live Coding

Selamat datang! Ini adalah **starter project** untuk sesi *live coding* posisi **Programmer PHP/Laravel** di PT Elimspro Tekno Medika.

Aplikasi ini adalah sistem informasi klinik sederhana yang sudah berjalan sebagian. Tugasmu adalah mengembangkan dan memperbaikinya selama sesi tes. Penguji akan menjelaskan rincian tugas saat sesi dimulai.

---

## Prasyarat

| Kebutuhan | Versi minimal |
|---|---|
| PHP | 8.2 |
| Composer | 2.x |
| MySQL | 8.x (atau PostgreSQL 15+) |
| Laravel CLI | — (sudah termasuk dalam `vendor`) |

---

## Cara Menjalankan

```bash
# 1. Clone repo (tiap kandidat memakai salinan/fork sendiri)
git clone <url-repo-kamu>
cd miniklinik

# 2. Install dependensi PHP
composer install

# 3. Salin file konfigurasi
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Buat database MySQL (gunakan tool seperti phpMyAdmin / DBeaver / CLI)
#    Buat database baru bernama: miniklinik

# 6. Isi konfigurasi database di file .env
#    DB_DATABASE=miniklinik
#    DB_USERNAME=root
#    DB_PASSWORD=<password-mysql-kamu>

# 7. Jalankan migrasi & seeder
php artisan migrate --seed

# 8. Jalankan server lokal
php artisan serve
```

Setelah langkah 8, buka browser dan akses: **http://localhost:8000**

Kamu akan melihat daftar 20 data pasien yang sudah ter-seed.

---

## Menggunakan PostgreSQL

Jika ingin menggunakan PostgreSQL, ubah bagian ini di `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=miniklinik
DB_USERNAME=postgres
DB_PASSWORD=<password-postgres-kamu>
```

---

## Modul yang Sudah Ada

| Modul | Status | Keterangan |
|---|---|---|
| Pasien (CRUD) | ✅ Tersedia | List, Tambah, Edit, Hapus |
| Dokter | ✅ Data tersedia | Hanya data seed (5 dokter), belum ada halaman UI |

---

## Cara Kerja di Sesi Tes

1. **Fork atau clone** repo ini ke akun GitHub-mu sendiri.
2. Kerjakan semua tugas di branch `kandidat`:
   ```bash
   git checkout -b kandidat
   ```
3. Commit perubahanmu secara bertahap (bukan satu commit besar di akhir).
4. Push ke repo-mu dan bagikan URL repo kepada penguji setelah waktu habis.

> **Catatan:** Tugas lengkap akan dijelaskan oleh penguji saat sesi berlangsung. Jangan mulai mengerjakan apa pun sebelum penguji memulai sesi.

---

## Struktur Project

```
app/
  Http/Controllers/
    PasienController.php   ← Controller CRUD Pasien
  Models/
    Pasien.php
    Dokter.php
database/
  migrations/             ← Skema tabel pasien & dokter
  seeders/
    DokterSeeder.php      ← 5 data dokter
    PasienSeeder.php      ← 20 data pasien
resources/views/
  layouts/app.blade.php   ← Layout utama (Bootstrap 5)
  pasien/
    index.blade.php
    create.blade.php
    edit.blade.php
routes/
  web.php                 ← Route resource pasien
```

---

## Tips

- Gunakan `php artisan migrate:fresh --seed` untuk reset database ke kondisi awal.
- Gunakan `php artisan route:list` untuk melihat semua route yang terdaftar.
- Semua library PHP dikelola lewat Composer; semua library CSS/JS menggunakan CDN (tidak ada build step).

---

*Selamat mengerjakan! — Tim PT Elimspro Tekno Medika*
