# TP10DPBO2025C1

## Janji
Saya Mochamad Zidan Rusdhiana dengan NIM 2305464 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program
![tp10](https://github.com/user-attachments/assets/1de60185-7651-4eda-9a91-565743141d09)

Aplikasi web berbasis PHP untuk mengelola jadwal konsumsi obat pasien menggunakan pola arsitektur MVVM (Model-View-ViewModel) dan PDO (PHP Data Objects) untuk menangani koneksi database.

## Struktur Database


### Tabel `pasien`
- `id` (INT, Primary Key, Auto Increment)
- `nama` (VARCHAR)
- `usia` (INT)
- `alamat` (TEXT)
- `no_telepon` (VARCHAR)

### Tabel `obat`
- `id` (INT, Primary Key, Auto Increment)
- `nama_obat` (VARCHAR)
- `deskripsi` (TEXT)
- `dosis` (VARCHAR)

### Tabel `jadwal_obat`
- `id` (INT, Primary Key, Auto Increment)
- `pasien_id` (INT, Foreign Key)
- `obat_id` (INT, Foreign Key)
- `waktu_konsumsi` (VARCHAR)
- `frekuensi` (VARCHAR)
- `tanggal_mulai` (DATE)
- `tanggal_selesai` (DATE)
- `status` (VARCHAR)


## Alur Program

1. **Request Handling**
   - Parameter `entity` dan `action` menentukan objek dan operasi yang akan dilakukan

2. **Pemrosesan Request**
   - `index.php` membuat instance ViewModel yang sesuai
   - ViewModel memproses request dan memanggil Model yang diperlukan
   - Data yang diambil atau diproses dikembalikan ke View

3. **Data Binding**
   - ViewModel menyediakan metode binding data untuk mempersiapkan data yang akan ditampilkan
   - Contoh: `bindJadwalData()` di `JadwalObatViewModel.php`

4. **Response Handling**
   - View merender output HTML dengan data dari ViewModel
   - Untuk operasi yang memodifikasi data, user diarahkan ke halaman yang sesuai

## Dokumentasi
https://github.com/user-attachments/assets/ec5da3c4-d776-4e84-ad8a-aa552e12de14

