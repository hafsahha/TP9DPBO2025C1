# TP9DPBO2025C1

## Janji

*Saya, **Hafsah Hamidah** dengan NIM **2311474**, mengerjakan **Tugas Praktikum 9** dalam mata kuliah **DPBO** dengan sebaik-baiknya demi keberkahan-Nya.
Saya berjanji tidak melakukan kecurangan sebagaimana yang telah dispesifikasikan. **Aamiin.***

---

## Deskripsi Program

**TP9DPBO2025C - Manajemen Mahasiswa** adalah aplikasi berbasis **PHP** yang mengimplementasikan pola arsitektur **MVP (Model-View-Presenter)** untuk mengelola data mahasiswa dalam sebuah sistem. Aplikasi ini memungkinkan pengguna untuk **menambah**, **mengedit**, **menghapus**, dan **menampilkan** data mahasiswa.

Aplikasi ini terdiri dari tiga komponen utama dalam arsitektur **MVP**:

* **Model**: Menangani data mahasiswa dan interaksi dengan database.
* **View**: Menampilkan data kepada pengguna.
* **Presenter**: Penghubung antara **View** dan **Model**, menangani logika aplikasi.

---

## Fitur

1. **Manajemen Mahasiswa (CRUD)** – Tambah, edit, hapus, dan lihat data mahasiswa.
2. **Tabel Mahasiswa** – Menampilkan data mahasiswa dalam bentuk tabel dengan opsi untuk edit dan hapus.

---

## Struktur Folder

```
TP9DPBO2025C/
│
├── assets/
│   ├── bootstrap.min.css
│   ├── bootstrap.bundle.min.js
│   ├── jquery.min.js
│   └── popper.min.js
│
├── model/
│   ├── DB.class.php           ← Kelas dasar untuk koneksi DB
│   ├── Mahasiswa.class.php    ← Model untuk data mahasiswa
│   ├── TabelMahasiswa.class.php ← Model untuk tabel mahasiswa
│   └── Template.class.php     ← Kelas untuk parsing template HTML
│
├── presenter/
│   ├── KontrakPresenter.php   ← Antarmuka presenter
│   ├── ProsesMahasiswa.php    ← Presenter yang menangani logika mahasiswa
│
├── templates/
│   ├── edit.html              ← Template untuk halaman edit
│   ├── skin.html              ← Template untuk halaman utama
│
├── view/
│   ├── KontrakView.php        ← Antarmuka view
│   ├── TampilMahasiswa.php    ← View untuk menampilkan mahasiswa
│   └── index.php              ← Halaman utama untuk tampil mahasiswa
│
├── mvp_php.sql                ← Struktur database
└── index.php                  ← Halaman utama (Mahasiswa)
```

---

## Alur Navigasi Halaman

| Halaman     | Fungsi                                                                                                                       |
| ----------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `index.php` | Halaman utama yang menampilkan **form tambah mahasiswa** dan **daftar mahasiswa** dalam tabel. Bisa tambah, edit, dan hapus. |
| `edit.html` | Halaman untuk **edit data mahasiswa** dengan form yang sudah terisi otomatis berdasarkan data mahasiswa yang dipilih.        |

---

## Relasi Tabel MySQL

**Database: `mvp_php`**

* `mahasiswa(id, nim, nama, tempat_lahir, tgl_lahir, gender, email, telp)`

---

## Komponen Sistem

### Model (`model/`)

* **DB.class.php**
  Kelas dasar untuk koneksi ke database menggunakan `mysqli`. Model lain mewarisi kelas ini untuk akses data.

* **Mahasiswa.class.php**
  Menangani data mahasiswa.
  Metode: `getMahasiswa()`, `getMahasiswaById()`, `add()`, `update()`, `delete()`.

* **TabelMahasiswa.class.php**
  Menangani tabel mahasiswa di database.
  Metode: `getAll()`, `add()`, `update()`, `delete()`.

* **Template.class.php**
  Kelas untuk meng-handle template HTML dengan metode `replace()` dan `write()`.

---

### Presenter (`presenter/`)

* **KontrakPresenter.php**
  Antarmuka untuk presenter, mendefinisikan fungsi-fungsi yang harus dimiliki oleh presenter.

* **ProsesMahasiswa.php**
  Presenter untuk mengelola logika aplikasi mahasiswa, seperti menambah, mengubah, dan menghapus data mahasiswa.

---

### View (`view/`)

* **KontrakView\.php**
  Antarmuka untuk View, mengatur interaksi antara View dan Presenter.

* **TampilMahasiswa.php**
  Menampilkan form tambah/edit mahasiswa dan daftar mahasiswa dalam bentuk tabel.

---

## Alur Kerja MVP

1. **User Interacts with View**: Pengguna berinteraksi dengan tampilan, seperti mengisi form untuk menambah atau mengedit data mahasiswa.
2. **View Passes Input to Presenter**: View mengirimkan input pengguna ke Presenter.
3. **Presenter Handles the Logic**: Presenter memproses data dengan logika aplikasi (validasi, pemrosesan).
4. **Model Updates Data**: Presenter berinteraksi dengan Model untuk menyimpan atau mengambil data dari database.
5. **Presenter Updates View**: Setelah Model selesai memproses data, Presenter memberi tahu View untuk memperbarui tampilan dengan data terbaru.

---

## Dokumentasi


---

