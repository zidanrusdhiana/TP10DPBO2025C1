CREATE DATABASE IF NOT EXISTS medicine_schedule;
USE medicine_schedule;

CREATE TABLE IF NOT EXISTS pasien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    usia INT NOT NULL,
    alamat TEXT NOT NULL,
    no_telepon VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS obat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_obat VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    dosis VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS jadwal_obat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pasien_id INT NOT NULL,
    obat_id INT NOT NULL,
    waktu_konsumsi VARCHAR(50) NOT NULL,
    frekuensi VARCHAR(50) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'Aktif',
    FOREIGN KEY (pasien_id) REFERENCES pasien(id) ON DELETE CASCADE,
    FOREIGN KEY (obat_id) REFERENCES obat(id) ON DELETE CASCADE
);

INSERT INTO pasien (nama, usia, alamat, no_telepon) VALUES
('Mochamad Zidan', 20, 'Morioh City', '081234567890'),
('Giorno Giovanna', 15, 'Venice, Italy', '082345678901'),
('Jolyne Kujo', 17, 'Green Dolphin Street', '083456789012'),
('Joseph Joestar', 25, 'New York City', '084567890123'),
('Dio Brando', 30, 'London, England', '085678901234');

INSERT INTO obat (nama_obat, deskripsi, dosis) VALUES
('Amoxicillin', 'Antibiotik untuk infeksi bakteri', '250mg'),
('Paracetamol', 'Obat pereda nyeri dan penurun demam', '500mg'),
('Ibuprofen', 'Obat antiinflamasi nonsteroid', '400mg'),
('Omeprazole', 'Obat untuk mengatasi masalah lambung', '20mg');

INSERT INTO jadwal_obat (pasien_id, obat_id, waktu_konsumsi, frekuensi, tanggal_mulai, tanggal_selesai, status) VALUES
(1, 1, 'Pagi, Malam', '2x sehari', '2025-05-15', '2025-05-21', 'Aktif'),
(2, 2, 'Pagi, Siang, Malam', '3x sehari', '2025-05-12', '2025-05-19', 'Aktif'),
(3, 3, 'Malam', '1x sehari', '2025-05-10', '2025-06-10', 'Aktif'),
(4, 4, 'Pagi', '1x sehari', '2025-05-15', '2025-05-20', 'Aktif'),
(5, 1, 'Siang', '1x sehari', '2025-05-12', '2025-05-18', 'Aktif');