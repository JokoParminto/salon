-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2019 pada 16.01
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) DEFAULT NULL,
  `member_address` varchar(70) DEFAULT NULL,
  `member_birthdate` date DEFAULT NULL,
  `member_phone` varchar(30) DEFAULT NULL,
  `member_gender` enum('laki','perempuan') DEFAULT NULL,
  `member_created_at` datetime DEFAULT NULL,
  `member_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_address`, `member_birthdate`, `member_phone`, `member_gender`, `member_created_at`, `member_updated_at`) VALUES
(2, 'joko', 'joko', '2019-07-09', '2334123412', 'laki', '2019-07-15 19:13:58', '2019-07-15 19:13:58'),
(3, 'angelina', 'jogja', '2019-07-09', '3453245', 'perempuan', '2019-07-16 16:30:09', '2019-07-16 16:30:09'),
(4, 'Lalisa', 'godean', '1997-03-21', '087881233344', 'perempuan', '2019-07-16 17:17:38', '2019-07-16 17:17:38'),
(5, 'Rose', 'Bantul', '1998-07-15', '08788566443', 'perempuan', '2019-07-17 07:46:35', '2019-07-17 07:46:35'),
(6, 'Jennie', 'Sanden', '1996-01-11', '089876765432', 'perempuan', '2019-07-18 06:13:32', '2019-07-18 06:13:32'),
(7, 'Rose', 'Srandakan', '1997-11-02', '087865765432', 'perempuan', '2019-07-18 06:16:25', '2019-07-18 06:16:25'),
(8, 'Dewi Irawati', 'Sangkeh', '1999-07-21', '089876543123', 'perempuan', '2019-07-24 17:49:28', '2019-07-24 17:49:28'),
(9, 'Anisa', 'jogja', '2019-08-04', '0857683475', 'perempuan', '2019-08-04 14:43:12', '2019-08-04 14:43:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `officer`
--

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL,
  `officer_name` varchar(30) DEFAULT NULL,
  `officer_address` varchar(50) DEFAULT NULL,
  `officer_phone` varchar(15) DEFAULT NULL,
  `officer_birthdate` date DEFAULT NULL,
  `officer_date_join` date DEFAULT NULL,
  `officer_created_at` datetime DEFAULT NULL,
  `officer_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `officer`
--

INSERT INTO `officer` (`officer_id`, `officer_name`, `officer_address`, `officer_phone`, `officer_birthdate`, `officer_date_join`, `officer_created_at`, `officer_updated_at`) VALUES
(1, 'pemilik', 'jogja', '098560943', '2019-07-17', '2019-07-01', '2019-07-16 14:07:11', '2019-07-16 14:07:13'),
(2, 'petugas', 'jogja', '095464343', '2019-07-16', '2019-07-16', '2019-07-16 14:07:57', '2019-07-16 14:08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_member_id` int(11) NOT NULL,
  `reservation_service_id` int(11) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `reservation_status` enum('ok','close','cancel','confirmed') DEFAULT 'cancel',
  `reservation_created_at` datetime DEFAULT NULL,
  `reservation_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_member_id`, `reservation_service_id`, `reservation_date`, `reservation_time`, `reservation_status`, `reservation_created_at`, `reservation_updated_at`) VALUES
(1, 4, 2, '2019-07-17', '00:00:00', 'confirmed', '2019-07-17 07:15:06', '2019-07-17 07:15:06'),
(2, 4, 3, '2019-07-17', '00:00:00', 'close', '2019-07-17 07:15:06', '2019-07-17 07:15:06'),
(3, 5, 1, '2019-07-17', '00:00:00', 'close', '2019-07-17 07:47:29', '2019-07-17 07:47:29'),
(4, 5, 2, '2019-07-17', '00:00:00', 'ok', '2019-07-17 07:47:29', '2019-07-17 07:47:29'),
(5, 8, 13, '2019-07-25', '00:00:13', 'close', '2019-07-24 18:07:01', '2019-07-24 18:07:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(30) DEFAULT NULL,
  `service_desc` text,
  `service_price` int(11) DEFAULT NULL,
  `service_photo` varchar(250) DEFAULT NULL,
  `service_created_at` datetime DEFAULT NULL,
  `service_updates_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_desc`, `service_price`, `service_photo`, `service_created_at`, `service_updates_at`) VALUES
(1, 'Potong', 'Potong berbagai macam jenis dengan adanya pegawai yang sudah proposional', 20000, '17072019070910potong.jpg', '2019-07-17 07:09:10', '2019-07-17 07:09:10'),
(2, 'Creambath', 'Menyediakan dengan bahan produck yang aman bagi kulit rambut yaitu Loreal dan Makarizo', 65000, '17072019071032creambath.jpg', '2019-07-17 07:10:32', '2019-07-17 07:10:32'),
(3, 'Smoothing Loreal', 'Pilihan Produck Loreal dan Matrix', 350000, '17072019071321creambath.jpg', '2019-07-17 07:13:21', '2019-07-18 06:24:28'),
(4, 'Coloring', 'Menggunakan Produk Pilihan Loreal dan Makarizo', 275000, '17072019075759coloring.jpg', '2019-07-17 07:57:59', '2019-07-17 07:57:59'),
(5, 'Potong Cowok', 'Dengan karyawan profesional maka hasil potong rambut anda akan semakin kelihatan menawan.', 10000, '18072019061844potongcowok.jpeg', '2019-07-18 06:18:44', '2019-07-18 06:18:44'),
(6, 'Coloring Cowok', 'Menggunakan produk piihan dan aman di rambut dan kulit kepala', 30000, '0408201915373918072019062324semircowok.jpg', '2019-07-18 06:21:49', '2019-08-04 15:37:39'),
(7, 'Bleaching Cowok', 'MMenggunakan product bahan aman di rambut dan kulit kepala', 350000, '0408201915380818072019062324semircowok.jpg', '2019-07-18 06:23:24', '2019-08-04 15:38:08'),
(8, 'Bleaching Cewek', 'Tidak merusak rambut karena menggunakan product loreal', 150000, '18072019062538coloring.jpg', '2019-07-18 06:25:38', '2019-07-18 06:25:38'),
(9, 'Smoothing Matrix', 'Bahan product tidak merusak rambut ', 275000, '18072019062751creambath.jpg', '2019-07-18 06:27:51', '2019-07-18 06:27:51'),
(10, 'Rebonding Makarizo', 'Berbeda dengan smoothing rebonding ini hanya meluruskan tapi tidak membuat berikilau. tapi jangan salah product makarizo ini juga tidak merusak rambut', 250000, '18072019062918coloring.jpg', '2019-07-18 06:29:18', '2019-07-18 06:29:18'),
(11, 'Masker Loreal', 'Membuat relaksasi dengan aroa yang membuat kita relax', 95000, '040820191546251428513100-masker780x390.jpg', '2019-07-18 06:30:11', '2019-08-04 15:46:25'),
(12, 'Masker Matrix', 'Sama halnya dengan masker loreal', 70000, '040820191548161558330PicsArt-03-17-04.02-.38-780x390.jpg', '2019-07-18 06:30:50', '2019-08-04 15:48:16'),
(13, 'Hair Spa dan Serum Loreal', 'Perpaduan masker spa dan serum akan membuat rambut beriklau dan kuat, terlebih menggunakan product loreal', 100000, '040820191551021035473PicsArt-04-14-10.34-.20-780x390.jpg', '2019-07-18 06:31:52', '2019-08-04 15:51:02'),
(14, 'Masker Makarizo', 'Merelaksasikan anda dengan keharuman product makarizo', 600000, '18072019063236creambathh.jpg', '2019-07-18 06:32:36', '2019-07-18 06:32:36'),
(15, 'Hair Spa Matrix ', 'Pilihan bagus untuk me time dan merelaksasikan diri dengan product yang aman', 60000, '18072019063340hairspa.jpg', '2019-07-18 06:33:40', '2019-07-18 06:33:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_reservation_id` int(11) NOT NULL,
  `transaction_officer_id` int(11) NOT NULL,
  `transaction_status` enum('ok','cancel') DEFAULT NULL,
  `transaction_created_at` datetime DEFAULT NULL,
  `transaction_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_reservation_id`, `transaction_officer_id`, `transaction_status`, `transaction_created_at`, `transaction_updated_at`) VALUES
(1, 2, 2, 'ok', '2019-07-17 07:17:24', '2019-07-17 07:17:24'),
(2, 3, 2, 'ok', '2019-07-17 07:50:29', '2019-07-17 07:50:29'),
(3, 5, 2, 'ok', '2019-07-24 18:11:46', '2019-07-24 18:11:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `user_access_id` int(11) NOT NULL,
  `user_access_officer_id` int(11) DEFAULT NULL,
  `user_access_member_id` int(11) DEFAULT NULL,
  `user_access_name` varchar(30) DEFAULT NULL,
  `user_access_address` varchar(50) DEFAULT NULL,
  `user_access_birthdate` date DEFAULT NULL,
  `user_access_registration_date` date DEFAULT NULL,
  `user_access_phone` varchar(15) DEFAULT NULL,
  `user_access_status` enum('active','not_active') DEFAULT 'active',
  `user_access_username` varchar(20) DEFAULT NULL,
  `user_access_password` varchar(100) DEFAULT NULL,
  `user_access_level` int(11) DEFAULT NULL,
  `user_access_created_at` datetime DEFAULT NULL,
  `user_access_updated_at` datetime DEFAULT NULL,
  `user_access_type` enum('admin','member','owner') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`user_access_id`, `user_access_officer_id`, `user_access_member_id`, `user_access_name`, `user_access_address`, `user_access_birthdate`, `user_access_registration_date`, `user_access_phone`, `user_access_status`, `user_access_username`, `user_access_password`, `user_access_level`, `user_access_created_at`, `user_access_updated_at`, `user_access_type`) VALUES
(1, 1, NULL, 'pemilik', NULL, NULL, NULL, NULL, 'active', 'pemilik', '58399557dae3c60e23c78606771dfa3d', 0, '2019-07-15 11:36:20', '2019-07-15 11:36:23', 'owner'),
(3, NULL, 2, 'joko', 'joko', '2019-07-09', '2019-07-15', '2334123412', 'active', 'joko', '9ba0009aa81e794e628a04b51eaf7d7f', 2, '2019-07-15 19:13:58', '2019-07-15 19:13:58', 'member'),
(4, 2, NULL, 'petugas', 'jogja', '2019-07-16', '2019-07-16', '90789678', 'active', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 1, '2019-07-16 14:12:45', '2019-07-16 14:12:47', 'admin'),
(5, NULL, 3, 'angelina', 'jogja', '2019-07-09', '2019-07-16', '3453245', 'active', 'angelina', '4e3d821e1e6207e6acd0e02bc3099e5a', 2, '2019-07-16 16:30:09', '2019-07-16 16:30:09', NULL),
(6, NULL, 4, 'Lalisa', 'godean', '1997-03-21', '2019-07-16', '087881233344', 'active', 'Lalisa', 'ca1b97376c72183ac9ffa795d5f89c6b', 2, '2019-07-16 17:17:38', '2019-07-16 17:17:38', NULL),
(7, NULL, 5, 'Rose', 'Bantul', '1998-07-15', '2019-07-17', '08788566443', 'active', 'Rose2000', 'fcdc7b4207660a1372d0cd5491ad856e', 2, '2019-07-17 07:46:35', '2019-07-17 07:46:35', NULL),
(8, NULL, 6, 'Jennie', 'Sanden', '1996-01-11', '2019-07-18', '089876765432', 'active', 'Jennie01', 'becc781b25a23525487117f3864bee33', 2, '2019-07-18 06:13:32', '2019-07-18 06:13:32', NULL),
(9, NULL, 7, 'Rose', 'Srandakan', '1997-11-02', '2019-07-18', '087865765432', 'active', 'Rose01', 'fcdc7b4207660a1372d0cd5491ad856e', 2, '2019-07-18 06:16:25', '2019-07-18 06:16:25', NULL),
(10, NULL, 8, 'Dewi Irawati', 'Sangkeh', '1999-07-21', '2019-07-24', '089876543123', 'active', 'dewii01', 'ed1d859c50262701d92e5cbf39652792', 2, '2019-07-24 17:49:28', '2019-07-24 17:49:28', NULL),
(11, NULL, 9, 'Anisa', 'jogja', '2019-08-04', '2019-08-04', '0857683475', 'active', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 2, '2019-08-04 14:43:12', '2019-08-04 14:43:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indeks untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_member_id` (`reservation_member_id`),
  ADD KEY `reservation_service_id` (`reservation_service_id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_reservation_id` (`transaction_reservation_id`),
  ADD KEY `transaction_officer_id` (`transaction_officer_id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`user_access_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `officer`
--
ALTER TABLE `officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `user_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`reservation_member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`reservation_service_id`) REFERENCES `service` (`service_id`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`transaction_reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`transaction_officer_id`) REFERENCES `officer` (`officer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
