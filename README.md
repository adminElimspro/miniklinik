# MiniKlinik — Starter Tes Live Coding

Selamat datang! Ini adalah **starter project** untuk sesi *live coding* posisi **Programmer PHP/Laravel** di PT Elimspro Tekno Medika.

Aplikasi ini adalah sistem informasi klinik sederhana yang sudah berjalan sebagian. Bacalah README ini secara menyeluruh sebelum mulai mengerjakan.

---

## Prasyarat

| Kebutuhan | Versi minimal |
|---|---|
| PHP | 8.2 |
| Composer | 2.x |
| MySQL | 8.x (atau PostgreSQL 15+) |

---

## Cara Menjalankan

```bash
# 1. Fork repo ini ke akun GitHub-mu, lalu clone fork tersebut
git clone https://github.com/<username-kamu>/miniklinik.git
cd miniklinik

# 2. Buat branch kerja
git checkout -b kandidat

# 3. Install dependensi
composer install

# 4. Salin konfigurasi
cp .env.example .env
php artisan key:generate

# 5. Buat database MySQL bernama: miniklinik
#    Lalu isi .env:
#    DB_DATABASE=miniklinik
#    DB_USERNAME=root
#    DB_PASSWORD=<password-mysql-kamu>

# 6. Migrasi & seed
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

Buka **http://localhost:8000** — kamu akan melihat daftar 20 pasien.

> **PostgreSQL?** Ganti `DB_CONNECTION=pgsql`, `DB_PORT=5432`, `DB_USERNAME=postgres` di `.env`.

---

## Modul yang Sudah Ada

| Modul | Status | Keterangan |
|---|---|---|
| Pasien (CRUD) | ✅ Tersedia | List, Tambah, Edit, Hapus — dengan **1 bug yang sengaja ditanam** |
| Dokter | ✅ Data tersedia | 5 dokter ter-seed, belum ada halaman UI |
| Kunjungan | ❌ Belum ada | **Tugasmu membuat ini** |

---

## Tugas

Kerjakan semua tugas di branch `kandidat`. Commit secara **bertahap** (minimal 4 commit terpisah — bukan satu commit besar di akhir).

---

### Tugas 1 — Debugging

Ada **satu bug** pada modul Pasien yang sudah ada. Temukan dan perbaiki.

**Cara menemukan:** coba edit data pasien tanpa mengubah No. Rekam Medis, lalu simpan. Perhatikan apa yang terjadi.

Perbaiki bug tersebut dan pastikan edit pasien berjalan normal.

---

### Tugas 2 — Modul Kunjungan (Migration + Model + Relasi)

Buat tabel `kunjungan` dengan kolom:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint, PK | |
| `pasien_id` | bigint, FK | → tabel `pasien` |
| `dokter_id` | bigint, FK | → tabel `dokter` |
| `tgl_kunjungan` | date | |
| `keluhan` | text | nullable |
| `catatan_dokter` | text | nullable |
| timestamps | | |

Buat juga:
- Model `Kunjungan` dengan `$fillable` dan relasi `belongsTo` ke `Pasien` dan `Dokter`
- Relasi `hasMany('kunjungan')` di model `Pasien`

---

### Tugas 3 — CRUD Kunjungan

Buat halaman dan controller untuk Kunjungan:

- **Index** — daftar kunjungan (tampilkan: tanggal, nama pasien, nama dokter, keluhan singkat). **Wajib gunakan eager loading** agar tidak terjadi query N+1.
- **Create + Store** — form tambah kunjungan baru dengan validasi:
  - `pasien_id` → required, harus ada di tabel pasien
  - `dokter_id` → required, harus ada di tabel dokter
  - `tgl_kunjungan` → required, format tanggal valid
  - `keluhan` → nullable
- **Tampilkan pesan sukses/gagal** setelah aksi

Route yang diharapkan:
```
GET  /kunjungan          → index
GET  /kunjungan/create   → form tambah
POST /kunjungan          → simpan
```

---

### Tugas 4 — REST API

Buat endpoint di `routes/api.php`:

```
GET /api/pasien/{id}/kunjungan
```

**Response sukses (200):**
```json
{
  "data": {
    "pasien": {
      "id": 1,
      "no_rm": "RM0001",
      "nama": "Agus Setiawan"
    },
    "kunjungan": [
      {
        "id": 1,
        "tgl_kunjungan": "2024-06-15",
        "keluhan": "Demam dan batuk",
        "dokter": "dr. Budi Santoso"
      }
    ],
    "total": 1
  }
}
```

**Response pasien tidak ditemukan (404):**
```json
{
  "message": "Pasien tidak ditemukan."
}
```

---

### Tugas 5 — Fitur Interaktif dengan Livewire

Livewire sudah terpasang di project ini.

Buat **satu** fitur interaktif menggunakan Livewire, pilih salah satu:

- **Opsi A:** Search/filter pasien secara real-time di halaman index pasien (tanpa reload halaman)
- **Opsi B:** Tabel kunjungan yang bisa difilter berdasarkan nama dokter atau rentang tanggal

Komponen harus menampilkan data dengan **paginasi** (jangan load semua data sekaligus).

---

### Tugas 6 — Query SQL

Tuliskan **2 query SQL mentah** (boleh di file `queries.sql`, di `README`, atau dijalankan via `php artisan tinker` dengan `DB::select()`).

**Query 1:** Tampilkan daftar pasien beserta jumlah kunjungannya, hanya pasien yang memiliki **lebih dari 1 kunjungan**, diurutkan dari yang terbanyak.

**Query 2:** Tampilkan nama dokter dan jumlah kunjungan yang ditanganinya **pada bulan berjalan**, diurutkan dari terbanyak.

---

## Ketentuan Pengumpulan

1. Pastikan semua pekerjaan ada di branch **`kandidat`**
2. Push ke fork GitHub-mu
3. Kirimkan **URL repo GitHub-mu** kepada penguji sebelum waktu habis
4. Pastikan repo **Public** agar penguji bisa mengakses

```bash
git push origin kandidat
```

---

## Struktur Project

```
app/
  Http/Controllers/
    PasienController.php     ← CRUD Pasien (ada bug di method update)
  Models/
    Pasien.php
    Dokter.php
database/
  migrations/
  seeders/
    DokterSeeder.php         ← 5 dokter
    PasienSeeder.php         ← 20 pasien (RM0001–RM0020)
resources/views/
  layouts/app.blade.php      ← Layout Bootstrap 5 + Livewire
  pasien/
routes/
  web.php                    ← Route resource pasien
  api.php                    ← Kosong, siap diisi (prefix: /api)
```

---

## Tips

- `php artisan migrate:fresh --seed` — reset database ke kondisi awal
- `php artisan route:list` — lihat semua route terdaftar
- `php artisan make:livewire NamaKomponen` — buat komponen Livewire baru
- Tidak ada build step (Vite/npm) — semua CSS/JS via CDN

---

*Selamat mengerjakan! — Tim PT Elimspro Tekno Medika*
