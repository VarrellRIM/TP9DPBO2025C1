# TP9DPBO2025C1

## Janji
Saya Varrell Rizky Irvanni Mahkota dengan NIM 2306245 mengerjakan TP9 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Dokumentasi


## Desain Program

### Struktur Database
Program ini menggunakan database MySQL dengan nama `mvp_php` yang terdiri dari 1 tabel:

1. **Tabel `mahasiswa`**
   - `id` (Primary Key, Auto Increment)
   - `nim` (Nomor Induk Mahasiswa)
   - `nama` (Nama mahasiswa)
   - `tempat` (Tempat lahir)
   - `tl` (Tanggal lahir)
   - `gender` (Jenis kelamin)
   - `email` (Email mahasiswa)
   - `telp` (Nomor telepon mahasiswa)

### Struktur Folder (MVP Architecture)
Program ini menerapkan arsitektur MVP (Model-View-Presenter) dengan struktur folder sebagai berikut:

- **model/**
  - `DB.class.php` - Class untuk koneksi database
  - `Mahasiswa.class.php` - Model untuk representasi data mahasiswa
  - `TabelMahasiswa.class.php` - Model untuk operasi CRUD pada tabel mahasiswa
  - `Template.class.php` - Model untuk mengelola template HTML
  
- **view/**
  - `KontrakView.php` - Interface untuk view
  - `TampilMahasiswa.php` - View untuk menampilkan data mahasiswa
  
- **presenter/**
  - `KontrakPresenter.php` - Interface untuk presenter
  - `ProsesMahasiswa.php` - Presenter untuk menghubungkan model dan view
  
- **templates/**
  - `skin.html` - Template HTML untuk tampilan utama
  
- `index.php` - Entry point aplikasi
- `form.php` - Form untuk tambah dan edit data mahasiswa

### Alur Kerja
1. **Menampilkan Data (Read)**:
   - User mengakses `index.php`
   - `index.php` membuat instance `TampilMahasiswa`
   - `TampilMahasiswa` memanggil `ProsesMahasiswa` untuk memproses data
   - `ProsesMahasiswa` mengambil data dari database melalui `TabelMahasiswa`
   - Data ditampilkan menggunakan template `skin.html`

2. **Menambah Data (Create)**:
   - User mengklik tombol "Tambah Mahasiswa" dan diarahkan ke `form.php`
   - User mengisi form dan submit
   - `form.php` memanggil `ProsesMahasiswa->addMahasiswa()`
   - Data disimpan ke database melalui `TabelMahasiswa`
   - User diarahkan kembali ke `index.php`

3. **Mengubah Data (Update)**:
   - User mengklik tombol edit pada data yang ingin diubah
   - User diarahkan ke `form.php` dengan parameter id
   - `form.php` mengambil data mahasiswa berdasarkan id
   - User mengubah data dan submit
   - `form.php` memanggil `ProsesMahasiswa->updateMahasiswa()`
   - Data diupdate di database melalui `TabelMahasiswa`
   - User diarahkan kembali ke `index.php`

4. **Menghapus Data (Delete)**:
   - User mengklik tombol hapus pada data yang ingin dihapus
   - Konfirmasi penghapusan muncul
   - Jika user mengkonfirmasi, `index.php` memanggil `ProsesMahasiswa->deleteMahasiswa()`
   - Data dihapus dari database melalui `TabelMahasiswa`
   - Halaman `index.php` direfresh untuk menampilkan data terbaru

## Catatan Penting
**Jangan lupa untuk mengubah kredensial database di file `presenter/ProsesMahasiswa.php`:**

```php
$db_host = "localhost"; // host 
$db_user = "root"; // user
$db_password = ""; // password
$db_name = "mvp_php"; // nama basis data
