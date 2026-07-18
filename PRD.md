# Product Requirements Document (PRD)

# Sistem Informasi Portal Satu Data Telkom University

> **Versi:** 1.0  
> **Tanggal:** Juli 2025  
> **Author:** Nathaniel Yusuf Langelo  
> **Status:** Active Development  
> **Konteks:** Tugas Akhir S1 Sistem Informasi — Universitas Telkom  
> **Studi Kasus:** Direktorat Pusat Teknologi Informasi (PuTI) Universitas Telkom

---

## 1. Latar Belakang & Tujuan Proyek

Portal Satu Data Telkom University adalah sistem informasi berbasis website yang berfungsi sebagai **entry point** untuk memperkenalkan konsep, kebijakan, dan ekosistem pengelolaan data di lingkungan Universitas Telkom kepada seluruh civitas academica dan publik.

### Tujuan Utama

- Menyediakan portal terpusat untuk informasi Satu Data Telkom University
- Menampilkan struktur organisasi dan informasi Data Owner per direktorat
- Menyediakan katalog dataset yang dapat dicari dan diakses publik kampus
- Memvisualisasikan alur tata kelola data (Data Governance) secara informatif
- Menyediakan panel administrasi untuk pengelolaan seluruh konten portal

---

## 2. Tech Stack

| Layer             | Teknologi                           |
| ----------------- | ----------------------------------- |
| Backend & Routing | Laravel (PHP Framework)             |
| Admin Panel       | Filament PHP                        |
| Frontend / Public | Laravel Blade + Tailwind CSS        |
| Database          | MySQL                               |
| Arsitektur        | MVC (Model-View-Controller)         |
| Deployment        | Localhost (lingkungan pengembangan) |

### Konvensi Kode

- Gunakan **bahasa Indonesia** untuk semua label UI, pesan error, dan teks antarmuka publik
- Gunakan **bahasa Inggris** untuk nama variabel, fungsi, model, controller, dan migration
- Ikuti konvensi penamaan Laravel standar:
    - Model: `PascalCase` singular (contoh: `DataOwner`, `NewsArticle`)
    - Controller: `PascalCase` + `Controller` (contoh: `DataOwnerController`)
    - Migration: `snake_case` plural (contoh: `data_owners`, `news_articles`)
    - Route: `kebab-case` (contoh: `/data-owner`, `/katalog-dataset`)
- Semua relasi Eloquent didefinisikan di Model
- Gunakan **Form Request** untuk validasi di semua form Filament

---

## 3. Aktor & Role Pengguna

| Role          | Akses                                              | Keterangan                                     |
| ------------- | -------------------------------------------------- | ---------------------------------------------- |
| `super_admin` | Full akses ke semua fitur Filament                 | Dapat mengelola user, role, dan seluruh konten |
| `admin_puti`  | Akses kelola konten portal (tanpa user management) | Staff PuTI yang mengelola informasi portal     |
| `data_owner`  | Akses input & edit data unit kerjanya sendiri      | Perwakilan tiap direktorat/unit kerja          |
| `guest`       | Hanya akses halaman publik, tanpa login            | Seluruh civitas academica dan publik umum      |

### Implementasi Role

- Gunakan package **Spatie Laravel Permission** untuk manajemen role & permission
- Filament panel hanya dapat diakses oleh `super_admin`, `admin_puti`, dan `data_owner`
- Guest mengakses seluruh halaman publik tanpa autentikasi

---

## 4. Struktur Halaman Publik (Blade)

Semua halaman publik menggunakan layout utama dengan komponen:

- **Navbar** — logo, menu navigasi, tombol masuk (jika ada akses admin)
- **Footer** — logo PuTI, alamat, tautan cepat, copyright

### 4.1 Beranda (`/`)

**Tujuan:** Halaman utama yang memperkenalkan Portal Satu Data secara ringkas.

**Konten yang ditampilkan:**

- **Hero Section** — judul besar "Portal Satu Data Telkom University", tagline singkat, dan tombol CTA ("Jelajahi Katalog" & "Tentang Satu Data")
- **Overview Satu Data** — penjelasan singkat tentang apa itu Satu Data Telkom University (teks dapat diedit admin)
- **Statistik ringkas** — total dataset, total data owner, total direktorat (diambil otomatis dari database)
- **Preview berita terbaru** — 3 berita/artikel terbaru dengan tombol "Lihat Semua"
- **Tautan cepat** ke halaman utama lainnya (Data Owner, Katalog, Data Governance)

**Model terkait:** `SiteContent`, `NewsArticle`, `Dataset`, `DataOwner`

---

### 4.2 Tentang (`/tentang`)

**Tujuan:** Menjelaskan latar belakang, visi, misi, dan dasar hukum program Satu Data.

**Konten yang ditampilkan:**

- Latar belakang program Satu Data Telkom University
- Visi dan misi pengelolaan data universitas
- Dasar hukum (Perpres No. 39 Tahun 2019 tentang Satu Data Indonesia)
- Prinsip-prinsip Satu Data (satu standar data, satu metadata, satu portal)

**Catatan:** Seluruh konten halaman ini dapat diedit melalui panel admin (konten dinamis).

**Model terkait:** `SiteContent` (key-based content management)

---

### 4.3 Profil & Struktur Organisasi PuTI (`/profil`)

**Tujuan:** Menampilkan informasi tentang Direktorat PuTI dan struktur organisasinya.

**Konten yang ditampilkan:**

- Deskripsi singkat Direktorat PuTI
- Tugas pokok dan fungsi PuTI
- **Bagan struktur organisasi** — ditampilkan sebagai gambar yang dapat diupload admin
- Informasi kontak PuTI (email, telepon, lokasi)

**Model terkait:** `SiteContent`, `OrganizationChart`

---

### 4.4 Data Owner (`/data-owner`)

**Tujuan:** Menampilkan daftar penanggung jawab data (Data Owner) dari setiap direktorat/unit kerja.

**Konten yang ditampilkan:**

- Daftar card Data Owner per direktorat, berisi:
    - Nama direktorat/unit kerja
    - Nama Data Owner
    - Jabatan
    - Email kontak
    - Foto (opsional)
- **Filter** berdasarkan nama direktorat
- **Pencarian** berdasarkan nama atau direktorat

**Aturan bisnis:**

- Setiap direktorat hanya memiliki satu Data Owner utama
- Data Owner dapat dikelola oleh `data_owner` role untuk unit kerjanya sendiri, atau `admin_puti`/`super_admin` untuk semua unit

**Model terkait:** `DataOwner`, `Directorate`

**Struktur database `data_owners`:**

```
id, directorate_id, name, position, email, photo, is_active, created_at, updated_at
```

**Struktur database `directorates`:**

```
id, name, abbreviation, description, order, created_at, updated_at
```

---

### 4.5 Data Governance (`/data-governance`)

**Tujuan:** Memvisualisasikan alur tata kelola data di Universitas Telkom secara informatif.

**Konten yang ditampilkan:**

- Penjelasan singkat tentang Data Governance di Telkom University
- **Visualisasi alur** tata kelola data — ditampilkan sebagai:
    - Gambar diagram alur yang dapat diupload admin, **ATAU**
    - Komponen HTML/CSS statis yang menggambarkan alur dari pengumpulan → pengolahan → penyimpanan → penggunaan data
- Peran dan tanggung jawab tiap aktor dalam tata kelola data
- Kebijakan dan standar data yang berlaku

**Catatan untuk agent:** Untuk MVP, implementasikan sebagai gambar statis yang dapat diupload admin. Visualisasi interaktif adalah pengembangan lanjutan.

**Model terkait:** `SiteContent`, `GovernanceAsset`

---

### 4.6 Katalog Dataset (`/katalog-dataset`)

**Tujuan:** Menyediakan daftar dataset yang tersedia di lingkungan Universitas Telkom beserta informasinya.

**Konten yang ditampilkan:**

- **Search bar** — pencarian berdasarkan nama dataset atau kata kunci
- **Filter** berdasarkan:
    - Direktorat/unit kerja pemilik data
    - Kategori dataset
    - Format data (CSV, JSON, Excel, PDF, dll.)
- **Daftar card dataset**, setiap card berisi:
    - Nama dataset
    - Deskripsi singkat
    - Direktorat pemilik
    - Data Owner terkait
    - Kategori & format
    - Tanggal pembaruan terakhir
    - Tombol "Detail" untuk melihat informasi lengkap
- **Halaman detail dataset** (`/katalog-dataset/{slug}`) berisi informasi lengkap dataset

**Aturan bisnis:**

- Dataset tidak menyediakan tautan unduhan langsung (hanya informasi/katalog)
- Hubungi Data Owner terkait untuk akses data aktual
- Semua dataset berstatus `published` ditampilkan ke publik

**Model terkait:** `Dataset`, `DataCategory`, `DataOwner`, `Directorate`

**Struktur database `datasets`:**

```
id, title, slug, description, directorate_id, data_owner_id,
category_id, data_format, last_updated_at, status (draft/published),
created_at, updated_at
```

**Struktur database `data_categories`:**

```
id, name, slug, description, created_at, updated_at
```

---

### 4.7 Berita & Artikel (`/berita`)

**Tujuan:** Menampilkan berita, pengumuman, dan artikel terkait Satu Data dan pengelolaan data di Telkom University.

**Konten yang ditampilkan:**

- Daftar artikel dengan thumbnail, judul, ringkasan, tanggal, dan kategori
- **Filter** berdasarkan kategori berita
- **Pencarian** berdasarkan judul atau konten
- **Halaman detail artikel** (`/berita/{slug}`)
- Artikel terkait di bagian bawah halaman detail

**Aturan bisnis:**

- Hanya artikel berstatus `published` yang ditampilkan ke publik
- Artikel diurutkan berdasarkan `published_at` terbaru

**Model terkait:** `NewsArticle`, `NewsCategory`

**Struktur database `news_articles`:**

```
id, title, slug, content, excerpt, thumbnail, category_id,
author, status (draft/published), published_at, created_at, updated_at
```

**Struktur database `news_categories`:**

```
id, name, slug, created_at, updated_at
```

---

## 5. Panel Admin (Filament)

Akses panel admin: `/admin`

Filament digunakan sebagai panel administrasi untuk mengelola seluruh konten portal. Semua resource Filament menggunakan **Form** dan **Table** standar Filament v3.

### 5.1 Resource yang Dibutuhkan

| Resource Filament      | Model          | Akses Role                            |
| ---------------------- | -------------- | ------------------------------------- |
| `DirectorateResource`  | `Directorate`  | super_admin, admin_puti               |
| `DataOwnerResource`    | `DataOwner`    | super_admin, admin_puti, data_owner\* |
| `DatasetResource`      | `Dataset`      | super_admin, admin_puti, data_owner\* |
| `DataCategoryResource` | `DataCategory` | super_admin, admin_puti               |
| `NewsArticleResource`  | `NewsArticle`  | super_admin, admin_puti               |
| `NewsCategoryResource` | `NewsCategory` | super_admin, admin_puti               |
| `SiteContentResource`  | `SiteContent`  | super_admin, admin_puti               |
| `UserResource`         | `User`         | super_admin only                      |

> \*`data_owner` hanya dapat melihat dan mengedit data milik unit kerjanya sendiri (filter by `directorate_id`)

### 5.2 Fitur Wajib Tiap Resource

Setiap Resource Filament harus memiliki:

- **ListRecords** — tabel dengan kolom yang relevan, searchable, sortable
- **CreateRecord** — form validasi lengkap
- **EditRecord** — form yang sama dengan create
- **DeleteRecord** — konfirmasi sebelum hapus
- **Slug auto-generate** untuk resource yang memiliki slug (dari judul/nama)

### 5.3 SiteContent (Konten Dinamis)

Model `SiteContent` digunakan untuk menyimpan konten halaman yang dapat diedit admin tanpa mengubah kode. Struktur:

```
id, page (beranda/tentang/profil/data-governance),
key (hero_title/hero_subtitle/about_description/dst),
value (text panjang), type (text/textarea/image),
created_at, updated_at
```

Implementasi: Gunakan key-value store. Di controller publik, panggil:

```php
$content = SiteContent::where('page', 'beranda')->pluck('value', 'key');
```

---

## 6. Routing Lengkap

### Public Routes (tanpa auth)

```
GET  /                          → HomeController@index
GET  /tentang                   → AboutController@index
GET  /profil                    → ProfileController@index
GET  /data-owner                → DataOwnerController@index
GET  /data-governance           → DataGovernanceController@index
GET  /katalog-dataset           → DatasetController@index
GET  /katalog-dataset/{slug}    → DatasetController@show
GET  /berita                    → NewsController@index
GET  /berita/{slug}             → NewsController@show
```

### Admin Routes (Filament — otomatis)

```
/admin/*   → Filament Panel (middleware: auth + role check)
```

---

## 7. Database Schema Lengkap

```sql
-- Users & Roles (Laravel default + Spatie)
users: id, name, email, password, directorate_id (nullable), remember_token, timestamps
roles: id, name, guard_name, timestamps
model_has_roles: role_id, model_type, model_id

-- Directorates
directorates: id, name, abbreviation, description, order, timestamps

-- Data Owners
data_owners: id, directorate_id (FK), name, position, email, photo, is_active, timestamps

-- Datasets
datasets: id, title, slug, description, directorate_id (FK), data_owner_id (FK),
          category_id (FK), data_format, last_updated_at, status, timestamps

-- Data Categories
data_categories: id, name, slug, description, timestamps

-- News Articles
news_articles: id, title, slug, content, excerpt, thumbnail,
               category_id (FK), author, status, published_at, timestamps

-- News Categories
news_categories: id, name, slug, timestamps

-- Site Content
site_contents: id, page, key, value (longText), type, timestamps

-- Organization Chart
organization_charts: id, image_path, description, is_active, timestamps

-- Governance Assets
governance_assets: id, image_path, description, order, is_active, timestamps
```

---

## 8. Alur Pengembangan (Iterasi)

Pengembangan dilakukan dengan metode **Iterative Incremental** dalam beberapa iterasi:

### Iterasi 1 — Fondasi & Setup

- [ ] Setup project Laravel + Filament + Spatie Permission
- [ ] Buat semua migration dan model
- [ ] Seed data awal (directorates, roles, super_admin user)
- [ ] Setup layout publik (navbar, footer, base template Blade)

### Iterasi 2 — Core Public Pages

- [ ] Halaman Beranda (`/`)
- [ ] Halaman Tentang (`/tentang`)
- [ ] Halaman Profil PuTI (`/profil`)
- [ ] SiteContent model + seeder konten awal

### Iterasi 3 — Data Owner & Dataset

- [ ] Halaman Data Owner (`/data-owner`) + filter + search
- [ ] Halaman Katalog Dataset (`/katalog-dataset`) + filter + search
- [ ] Halaman Detail Dataset (`/katalog-dataset/{slug}`)
- [ ] Resource Filament: DirectorateResource, DataOwnerResource, DatasetResource

### Iterasi 4 — Data Governance & Berita

- [ ] Halaman Data Governance (`/data-governance`) + upload diagram
- [ ] Halaman Berita (`/berita`) + filter + search
- [ ] Halaman Detail Berita (`/berita/{slug}`)
- [ ] Resource Filament: NewsArticleResource, NewsCategoryResource

### Iterasi 5 — Admin Panel Lengkap & Polish

- [ ] SiteContentResource (kelola konten dinamis tiap halaman)
- [ ] UserResource + role management (super_admin only)
- [ ] Pembatasan akses data_owner hanya ke data unit kerjanya
- [ ] Statistik dashboard Filament (total dataset, data owner, berita)
- [ ] Polish UI publik, responsif mobile

---

## 9. Aturan Penting untuk Agent

### Yang HARUS dilakukan:

- Selalu gunakan **Eloquent ORM** — jangan raw query SQL kecuali terpaksa
- Semua form Blade menggunakan **CSRF token** (`@csrf`)
- Semua gambar/file upload disimpan di `storage/app/public` dan di-link ke `public/storage`
- Jalankan `php artisan storage:link` saat setup awal
- Gunakan **slug** untuk semua URL yang mengacu ke konten spesifik (dataset, berita)
- Setiap model yang memiliki status `draft/published` harus ada **scope** `scopePublished()`
- Gunakan **soft delete** untuk model utama (DataOwner, Dataset, NewsArticle)

### Yang TIDAK boleh dilakukan:

- ❌ Jangan gunakan Vue, React, atau framework JavaScript berat — gunakan Blade murni untuk halaman publik
- ❌ Jangan buat autentikasi custom untuk halaman publik — publik tidak perlu login
- ❌ Jangan simpan file upload di folder `public/` langsung — selalu gunakan `storage`
- ❌ Jangan hardcode konten teks di Blade view — gunakan `SiteContent` untuk konten yang bisa berubah
- ❌ Jangan lupa `fillable` atau `guarded` di setiap Model

### Urutan setup project:

```bash
# 1. Install Laravel
composer create-project laravel/laravel satu-data-portal

# 2. Install Filament
composer require filament/filament
php artisan filament:install --panels

# 3. Install Spatie Permission
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# 4. Konfigurasi database di .env lalu jalankan:
php artisan migrate
php artisan storage:link

# 5. Buat super admin pertama:
php artisan make:filament-user
```

---

## 10. Pengujian (Blackbox Testing)

Pengujian dilakukan menggunakan **Blackbox Testing** pada setiap akhir iterasi.

### Skenario Pengujian Utama

| No  | Fitur           | Skenario Input                    | Expected Output                                                   |
| --- | --------------- | --------------------------------- | ----------------------------------------------------------------- |
| 1   | Beranda         | Akses `/` sebagai guest           | Halaman beranda tampil dengan hero, statistik, dan berita terbaru |
| 2   | Data Owner      | Akses `/data-owner`               | Daftar Data Owner tampil per direktorat                           |
| 3   | Data Owner      | Input pencarian nama direktorat   | Daftar terfilter sesuai kata kunci                                |
| 4   | Katalog Dataset | Akses `/katalog-dataset`          | Daftar dataset berstatus published tampil                         |
| 5   | Katalog Dataset | Input keyword di search bar       | Dataset relevan tampil, yang tidak relevan tersembunyi            |
| 6   | Detail Dataset  | Klik tombol "Detail" pada dataset | Halaman detail dataset tampil lengkap                             |
| 7   | Berita          | Akses `/berita`                   | Daftar artikel published tampil terurut terbaru                   |
| 8   | Admin Login     | Login dengan kredensial valid     | Redirect ke dashboard Filament                                    |
| 9   | Admin Login     | Login dengan kredensial salah     | Pesan error ditampilkan, tidak masuk panel                        |
| 10  | CRUD Dataset    | Admin tambah dataset baru         | Dataset tersimpan dan tampil di katalog publik                    |
| 11  | CRUD Dataset    | Admin hapus dataset               | Dataset tidak tampil di katalog publik                            |
| 12  | Role data_owner | Login sebagai data_owner          | Hanya bisa edit data unit kerjanya sendiri                        |
| 13  | Role admin_puti | Akses UserResource                | Halaman tidak dapat diakses (403)                                 |

---

## 11. Struktur Folder yang Direkomendasikan

```
app/
├── Filament/
│   └── Resources/
│       ├── DataOwnerResource.php
│       ├── DatasetResource.php
│       ├── DirectorateResource.php
│       ├── NewsArticleResource.php
│       ├── NewsCategoryResource.php
│       ├── DataCategoryResource.php
│       ├── SiteContentResource.php
│       └── UserResource.php
├── Http/
│   └── Controllers/
│       ├── HomeController.php
│       ├── AboutController.php
│       ├── ProfileController.php
│       ├── DataOwnerController.php
│       ├── DataGovernanceController.php
│       ├── DatasetController.php
│       └── NewsController.php
├── Models/
│   ├── User.php
│   ├── Directorate.php
│   ├── DataOwner.php
│   ├── Dataset.php
│   ├── DataCategory.php
│   ├── NewsArticle.php
│   ├── NewsCategory.php
│   ├── SiteContent.php
│   ├── OrganizationChart.php
│   └── GovernanceAsset.php
resources/
└── views/
    ├── layouts/
    │   ├── app.blade.php       ← layout utama publik
    │   ├── navbar.blade.php
    │   └── footer.blade.php
    ├── home/
    │   └── index.blade.php
    ├── about/
    │   └── index.blade.php
    ├── profile/
    │   └── index.blade.php
    ├── data-owner/
    │   └── index.blade.php
    ├── data-governance/
    │   └── index.blade.php
    ├── dataset/
    │   ├── index.blade.php
    │   └── show.blade.php
    └── news/
        ├── index.blade.php
        └── show.blade.php
```

---

_Dokumen ini adalah PRD aktif yang dapat diperbarui seiring perkembangan proyek._  
_Selalu refer ke dokumen ini sebelum mengerjakan fitur baru._
