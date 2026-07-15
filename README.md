# Sistem Informasi Perpustakaan Kampus

Aplikasi web untuk mengelola data perpustakaan kampus menggunakan Node.js, Express, dan MySQL. Proyek ini dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) Pemrograman Web[cite: 2].

---

## Identitas Pengembang

* **Nama Lengkap:** Muhammad Fadhil Irsyad[cite: 1]
* **NIM:** 411241007[cite: 2]
* **Mata Kuliah:** Pemrograman Web[cite: 2]

---

## Fitur Utama

1. **Dashboard Real-Time:** Menampilkan data statistik jumlah buku, total anggota peminjam, dan buku yang sedang aktif dipinjam secara langsung.
2. **CRUD Katalog Buku:** Pengelolaan lengkap data buku (Tambah, Tampil, Edit, Hapus) dengan fitur pencarian judul.
3. **CRUD Data Peminjam:** Pengelolaan lengkap basis data mahasiswa yang terdaftar sebagai anggota perpustakaan.
4. **CRUD Transaksi Peminjaman:** Perekaman data transaksi peminjaman menggunakan pilihan dropdown relasional (menghubungkan ID Buku dan ID Peminjam).
5. **Logika Stok Otomatis:** Stok buku otomatis berkurang saat dipinjam dan otomatis bertambah kembali saat dikembalikan.
6. **Format Tanggal Indonesia:** Tanggal transaksi otomatis ditampilkan menggunakan format lokal (Contoh: 15 Juli 2026)[cite: 2].
7. **Forest Green Theme:** Tampilan antarmuka bersih dengan palet warna hijau hutan alami untuk kenyamanan visual.

---

## Struktur Proyek Terbaru

```text
perpustakaan-web
├── config
│   └── database.js
├── controllers
│   ├── dashboardController.js
│   ├── bukuController.js
│   ├── peminjamController.js
│   └── peminjamanController.js
├── routes
│   ├── dashboard.js
│   ├── buku.js
│   ├── peminjam.js
│   └── peminjaman.js
├── models
│   ├── bukuModel.js
│   ├── peminjamModel.js
│   └── peminjamanModel.js
├── public
│   ├── css
│   │   └── style.css
│   └── js
│       └── main.js
├── views
│   ├── partials
│   │   ├── footer.ejs
│   │   └── header.ejs
│   ├── dashboard.ejs
│   ├── buku.ejs
│   ├── editBuku.ejs
│   ├── editPeminjam.ejs
│   ├── editPeminjaman.ejs
│   ├── peminjam.ejs
│   ├── peminjaman.ejs
│   ├── tambahBuku.ejs
│   ├── tambahPeminjam.ejs
│   └── tambahPeminjaman.ejs
├── .gitignore
├── server.js
├── package.json
├── package-lock.json
└── README.md