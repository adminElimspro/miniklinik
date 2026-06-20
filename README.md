# MiniKlinik — Starter Tes Live Coding

Selamat datang! Ini adalah **starter project** untuk sesi *live coding* posisi **Programmer PHP/Laravel** di PT Elimspro Tekno Medika.

Bacalah README ini secara menyeluruh sebelum mulai mengerjakan.

---

## Prasyarat

| Kebutuhan | Versi minimal |
|---|---|
| PHP | 8.2 |
| Composer | 2.x |
| PostgreSQL | 15+ |

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

# 5. Buat database PostgreSQL bernama: miniklinik
#    Lalu isi .env:
#    DB_DATABASE=miniklinik
#    DB_USERNAME=postgres
#    DB_PASSWORD=<password-postgres-kamu>

# 6. Migrasi & seed
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

Buka **http://localhost:8000** — kamu akan melihat daftar 20 pasien.

---

## Modul yang Sudah Ada

| Modul | Status | Keterangan |
|---|---|---|
| Pasien (CRUD) | ✅ Tersedia | List, Tambah, Edit, Hapus — dengan **1 bug yang sengaja ditanam** |
| Dokter | ✅ Data tersedia | 5 dokter ter-seed, belum ada halaman UI |
| Kunjungan | ❌ Belum ada | **Tugasmu membuat ini** |

---

## Aturan Sesi

- **Durasi: 90–120 menit**, dikerjakan di kantor dengan pengawasan, memakai laptop sendiri.
- Kerjakan **mandiri**. **AI assistant (Copilot / Cursor / Codeium / ChatGPT) WAJIB dimatikan.** Boleh membuka dokumentasi resmi Laravel/PHP.
- Untuk fitur interaktif, **pilih salah satu: Livewire ATAU Vue** (kuasai keduanya = nilai bonus).
- **Commit bertahap** tiap menyelesaikan satu bagian (bukan satu commit besar di akhir) — proses kerjamu ikut dinilai.

---

## Tugas yang Harus Dikerjakan

### 1. Perbaiki Bug pada Modul Pasien

Ada laporan: **saat mengedit data pasien dan menyimpannya, muncul error validasi "no_rm sudah digunakan" — padahal no_rm tidak diubah.** Akibatnya data pasien yang sudah ada tidak bisa diperbarui. Temukan penyebabnya dan perbaiki. Jelaskan singkat penyebabnya pada deskripsi commit.

### 2. Buat Modul "Kunjungan" (terhubung ke Pasien)

Tambahkan modul **Kunjungan** dengan ketentuan:

- **Migration** tabel `kunjungan` dengan kolom: `pasien_id` (FK), `dokter_id` (FK), `tanggal` (date), `keluhan` (text), `diagnosis` (string), `biaya` (decimal), `status` (string).
- **Relasi Eloquent**: satu Pasien punya banyak Kunjungan; Kunjungan milik satu Pasien dan satu Dokter.
- **CRUD lengkap**: daftar (paginasi 10), tambah, edit, hapus.
- **Validasi server-side** untuk input (field wajib, format tanggal, biaya numerik).
- Pada halaman daftar, tampilkan **nama pasien & nama dokter** untuk tiap kunjungan **secara efisien** (perhatikan jumlah query database).

### 3. Buat REST API

Sediakan endpoint: **`GET /api/pasien/{id}/kunjungan`** yang mengembalikan daftar kunjungan milik pasien tersebut dalam format **JSON**. Pastikan status code tepat (mis. 404 bila pasien tidak ditemukan).

### 4. Fitur Interaktif (Livewire atau Vue)

Buat satu fitur interaktif tanpa reload halaman penuh, pilih salah satu:

- **Pencarian pasien real-time** (ketik nama/no_rm → daftar tersaring), atau
- **Ubah status kunjungan secara inline** dari halaman daftar.

### 5. Query SQL

Tuliskan **2 query SQL** (boleh via Tinker / DBeaver / phpMyAdmin), simpan di file `JAWABAN_SQL.sql` di root project:

1. Total biaya kunjungan **per pasien**, hanya menampilkan pasien dengan total biaya **lebih dari 1.000.000**.
2. **5 diagnosis terbanyak** pada bulan ini, beserta jumlahnya.

### 6. Bonus (bila waktu cukup)

Pencarian/filter kunjungan, unit test sederhana, dokumentasi API singkat, atau menampilkan Livewire **dan** Vue sekaligus.

---

## Cara Pengumpulan

1. **Fork / clone** repo ini ke akun GitHub-mu sendiri (jadikan **public**), atau buat repo baru milikmu.
2. Kerjakan di branch **`kandidat`**: `git checkout -b kandidat`.
3. **Commit bertahap & bermakna** tiap menyelesaikan tugas.
4. Selesai → `git push`, lalu **bagikan URL repo** kamu ke penguji.
   *(Bila diminta cara offline: jalankan `git bundle create miniklinik-NAMA.bundle --all` dan serahkan filenya.)*

---

## Yang Dinilai

| Aspek | Bobot |
|---|---|
| Memahami & memperbaiki bug (Tugas 1) | 15 |
| Membaca/menavigasi kode existing & keaslian kerja | 35 |
| Modul Kunjungan: migration, relasi, CRUD, validasi, efisiensi query (Tugas 2) | 20 |
| REST API (Tugas 3) | 10 |
| Fitur interaktif (Tugas 4) | 10 |
| Query SQL (Tugas 5) | 5 |
| Kualitas commit Git & kode | 5 |

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
