-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27 Nov 2018 pada 13.56
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `imagePath`, `title`, `description`, `type_id`, `user_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1542617586.images (12).jpg', 'dress', 'dress terbaru warna sesuai gambar bahan terbaik', 2, 3, 2, 120, '2018-11-18 18:53:06', '2018-11-18 18:53:06'),
(2, '1542617981.0_280df766-7b35-4a97-99f0-4f7064f31cfd_1280_1280.jpg', 'baju gamis', 'baju gamis keluaran terbaru,warna sesuai gambar,bahan terbaik, untuk ukuran silahkan beri note saat checkout', 2, 3, 1, 179, '2018-11-18 18:59:41', '2018-11-18 18:59:41'),
(3, '1542618737.6-Colors-Children-Magic-Drawing-Board-Paperless.jpg_350x350.jpg', 'cpu', 'cpu produk terbaik,harga terjangkau,warna sesuai gambar', 1, 3, 6, 7000, '2018-11-18 19:12:17', '2018-11-18 19:12:17'),
(4, '1542618826.160811-500x500.jpg', 'baju bayi', 'baju bayi lucu,warna sesuai gambar,ukuran sudah ada digambar', 3, 3, 4, 290, '2018-11-18 19:13:46', '2018-11-18 19:13:46'),
(5, '1542618971.1555264_1460947460726_full.jpg', 'topi bayi', 'topi lucu ,produksi korea warna sesuai gambar', 3, 3, 6, 120, '2018-11-18 19:16:11', '2018-11-18 19:16:11'),
(6, '1542619088.3213575_1d9a5185-9312-4019-9dda-f48808d9d8b3.jpg', 'baju tunik', 'baju tunik keluaran terbaru,warna sesuai gambar ukuran cek di checkout', 2, 3, 6, 300, '2018-11-18 19:18:09', '2018-11-18 19:18:09'),
(7, '1542620096.13667586_674b9901-7c6c-48e3-a126-c86a74056f5a_1080_1080.jpg', 'jeans wanita', 'kualitas bagus,keluaran terbaru,warna sesuai gambar', 2, 1, 6, 300, '2018-11-18 19:34:56', '2018-11-18 19:34:56'),
(8, '1542620209.039817700_1512983883-DGMjmT9UMAA0wEE.jpg', 'sweeter style korea', 'sweeter keluaran dari korea,kualitas bagus,bahan terbaik,warna sesuai gambar,ukuran cek aja di checkout', 2, 1, 6, 450, '2018-11-18 19:36:49', '2018-11-18 19:36:49'),
(9, '1542620277.050379900_1495272468-nec-proyektor.jpg', 'proyektor', 'proyektor kualitas terbaik,dijamin awet', 1, 1, 7, 4000, '2018-11-18 19:37:57', '2018-11-18 19:37:57'),
(10, '1542620417.AC-4-2.jpg', 'ac', 'lengkap dengan remotnya yang kualitasnyapun terbaik', 1, 1, 9, 9000, '2018-11-18 19:40:17', '2018-11-18 19:40:17'),
(11, '1542620525.ARTIKEL-W3-JULI-2017-302-min.jpg', 'paket bayi', 'paket lengkap bayi,terjamin kualitasnya,warna sesuai gambar harganya pun mewakili kualitasnya', 3, 1, 6, 390, '2018-11-18 19:42:05', '2018-11-18 19:42:05'),
(12, '1542620650.blackpink-lisa-nonagon-collaboration.jpg', 'jaket korean style', 'kualitasnya terbaik,produksi korea,warna sesuai gambar', 2, 1, 7, 500, '2018-11-18 19:44:10', '2018-11-18 19:44:10'),
(13, '1542620744.busha new.jpg', 'laging bayi', 'laging bayi aman dan terbaru,kualitasnya terjamin,harganya terjangkau,warna tinggal milih sesuai gambar', 3, 1, 4, 79, '2018-11-18 19:45:44', '2018-11-18 19:45:44'),
(14, '1542620870.busha.jpg', 'laging bayi', 'laging abyi lucu,terdapat gambar lucunya juga,kualitasnya bagus', 3, 1, 5, 230, '2018-11-18 19:47:50', '2018-11-18 19:47:50'),
(15, '1542621556.Celana-Jeans-Wanita-Hijab.jpg', 'jeans wanita', 'celana jeans wanita dengan bentuk jaman now, warna sesuai gambar', 2, 1, 5, 159, '2018-11-18 19:59:16', '2018-11-18 19:59:16'),
(16, '1542621907.ddedfc31a822069c51429b924de7f3d5.jpg', 'jaket wanita', 'warna sesuai gambar,motif kotak-kotak,bentuk jaman sekarang,bahan bagus,keluaran terbaik dan terbaru', 2, 1, 5, 340, '2018-11-18 20:05:07', '2018-11-18 20:05:07'),
(17, '1542622168.download (1).jpg', 'sarung tangan dan kaki bayi', 'warna sesuaigambar,bentuk lucu,bahan aman dan nyaman', 3, 1, 5, 200, '2018-11-18 20:09:28', '2018-11-18 20:09:28'),
(18, '1542623780.download.jpg', 'kaos panjang wanita', 'dengan motif garis garis dapat membuat baju semakin indah untuk dipakai wanita,bahan terbaik', 2, 1, 5, 67, '2018-11-18 20:36:20', '2018-11-18 20:36:20'),
(19, '1542623848.ec159493754749b0e811527f64093972--denim-jean.jpg', 'kaos korean style', 'kaos asli produksi korea,warna sesaui gambar,bahan bagus', 2, 1, 5, 120, '2018-11-18 20:37:28', '2018-11-18 20:37:28'),
(20, '1542623916.DVD Player.jpg', 'dvd player', 'dvd player kualitas terbaik,harga terjangkau,keluaran terbaru', 1, 1, 6, 2000, '2018-11-18 20:38:37', '2018-11-18 20:38:37'),
(21, '1542623987.fdc40ac78e00e9768e82901b5726ba10.jpg', 'jaket jeans wanita', 'jaket jeans dengan motif sobek sobek kecil bagian bawah dapat dipastikan bahan terbaik dan keluaran terbaru', 2, 1, 6, 300, '2018-11-18 20:39:47', '2018-11-18 20:39:47'),
(22, '1542624348.harga-samsung-ativ-book-9.jpg', 'laptop', 'dengan bentuk minimalis,tips,desain indah,kualitas terjamin baik', 1, 1, 13, 7000, '2018-11-18 20:45:48', '2018-11-18 20:45:48'),
(23, '1542636403.images (1).jpg', 'kaos kaki bayi', 'kaos kaki bayi dengan mitif lucu,warna tinggal milih di gambar. bahan nyaman dan aman', 3, 1, 15, 99, '2018-11-19 00:06:43', '2018-11-19 00:06:43'),
(24, '1542636736.images (2).jpg', 'jepit rambut bayi', 'warna bisa sesuaikan dengan gambar,lucu untuk anak perempuan', 3, 1, 8, 22, '2018-11-19 00:12:16', '2018-11-19 00:12:16'),
(25, '1542680527.images (3).jpg', 'bando bayi', 'bando lucu bayi,warna bisa sesuaikan gambar', 3, 3, 8, 78, '2018-11-19 12:22:08', '2018-11-19 12:22:08'),
(26, '1542680815.images (5).jpg', 'kets bayi', 'sepatu kets bayi,bentuknya yang gemas makin terlihat indah saat dipakai bayi,warna sesuai di gambar,di jamin nyaman dan aman dipakai bayi', 3, 3, 7, 390, '2018-11-19 12:26:55', '2018-11-19 12:26:55'),
(27, '1542682844.images (14).jpg', 'cardigan panjang', 'cardigan panjang bawah lutut,motif sesuai gambar,bahan bagus,bisa digunakan untuk muslimah ataupun ingin bepergian karena bentuknya sangat cocok untuk di pakai kemanapun', 2, 3, 9, 200, '2018-11-19 13:00:44', '2018-11-19 13:00:44'),
(28, '1542686833.images (16).jpg', 'hem wanita', 'hem wanita,warna sesuai gambar,kualitas terbaik', 2, 3, 9, 120, '2018-11-19 14:07:13', '2018-11-19 14:07:13'),
(29, '1542687562.yoona_png_by_sweet_levitika_by_sweetlevitika-d6m3e6f.png', 'dress', 'dress cantik terbaru,dengan warna yang sudah ada pada gambar cantik saat dipakai wanita akan terlihat anggun saat di pakai,keluaran terbaru', 2, 3, 11, 250, '2018-11-19 14:19:22', '2018-11-19 14:19:22'),
(30, '1542688119.Setelan-Panjang-Mickey-MouseHappy-Head-Fullprint.jpg', 'setelan panjang micky mouse', 'kulaitisan bagus,motif nya lucu, warna sesuai dengan gambar', 2, 3, 6, 120, '2018-11-19 14:28:39', '2018-11-19 14:28:39'),
(31, '1542690261.ryusei_ryusei-swt-kamiko-sweater-wanita---green_full05.jpg', 'sweeter cewek', 'sweeter keluaran terbaru warna sesuai di gambar', 2, 3, 10, 150, '2018-11-19 15:04:21', '2018-11-19 15:04:21'),
(32, '1542695670.Foto Lisa Black Pink Terbaru - Gambar Photo Lalisa Manoban BLACKPINK - kpopfid.blogspot.com (6).jpg', 'hem jeans wanita', 'keluaran asli korea,kualitas terjamin,produksi terbaru,bahan aman dan nyaman', 2, 3, 6, 200, '2018-11-19 16:34:30', '2018-11-19 16:34:30'),
(33, '1542696564.images (26).jpg', 'baju kodok', 'baju kodok ini sangat cocok untuk dipakai dikalangan remaja jaman sekarang,denagn bentuknya yang lucu membuat semakin lucu,warna sesuai gambar', 2, 3, 13, 250, '2018-11-19 16:49:24', '2018-11-19 16:49:24'),
(34, '1542696861.images (8).jpg', 'turban bayi', 'turban lucu,bahab bagus,warna sesuai gambar', 3, 1, 7, 79, '2018-11-19 16:54:21', '2018-11-19 16:54:21'),
(35, '1542697063.images (18).jpg', 'hem tunik', 'hem tunik bagus untuk muslimah dan untuk bepergian juga cocok,motif kotak kotak,warna sesuai gambar', 2, 1, 11, 289, '2018-11-19 16:57:43', '2018-11-19 16:57:43'),
(36, '1542770260.img10498-1454635729.jpg', 'setelan doraemon', 'dengan motif doraemon akan membuat bayi menjadi semakin lucu,bahanya aman dan nyaman,keluaran terbaru.', 3, 1, 7, 120, '2018-11-20 13:17:41', '2018-11-20 13:17:41'),
(37, '1542770511.unnamed.jpg', 'printer', 'keluaran terbaru,warna hitam elegan,kualitas terbaik', 1, 1, 9, 2300, '2018-11-20 13:21:51', '2018-11-20 13:21:51'),
(38, '1542770742.kemeja_tsum_tsum_kemeja_disney_kemeja_lucu_kemeja_murah_tuni.jpg', 'kemeja cewek', 'kemeja cantik dengan motif lucu di keseluruhan kemeja membuat terlihat gemas saat ddipakai,lengan panjang,warna sudah ada di gambar.', 2, 1, 13, 179, '2018-11-20 13:25:42', '2018-11-20 13:25:42'),
(39, '1542770850.images (24).jpg', 'oven', 'oven kue ini keluaran terbaru,sangat cocok untuk ibu rumah tangga yang ingin membuat kue yang cepat karena tidak perlu waktu lama mmenunggu untuk meng oven menggunakan oven ini,kualitas terpercaya.', 1, 1, 6, 3200, '2018-11-20 13:27:30', '2018-11-20 13:27:30'),
(40, '1542771736.kunci-pinktu-elektronik.jpg', 'kunci pintu elektronik', 'kunci pintu elektronik ini memudahkan agar saat mengunci pintu lebih mudah,warna hitam,kualitasnya terbaik,keluaran terbaru', 1, 1, 8, 1300, '2018-11-20 13:42:16', '2018-11-20 13:42:16'),
(41, '1542771876.images (1).jpg', 'magicom', 'megicom model terbaru,warna putih', 1, 1, 6, 800, '2018-11-20 13:44:36', '2018-11-20 13:44:36'),
(42, '1542772803.HTB1d0auSXXXXXcEXVXXq6xXFXXXb.jpg', 'papan informasi', 'warna sesuai gambar,kualitas terpercaya,awet,keluaran terbaru', 1, 1, 6, 3400, '2018-11-20 14:00:04', '2018-11-20 14:00:04'),
(43, '1542773752.Cosmos-Desk-Fan-9in-2in1-9-CV-TWINO-300x300.jpg', 'kipas angin', 'kipas angin dengan kualitas terbaik,keluaran terbaru,warna sesuai di gambar', 1, 1, 7, 1000, '2018-11-20 14:15:52', '2018-11-20 14:15:52'),
(44, '1542774067.8-Tips-Mudah-Merawat-Barang-Elektronik-Dapur-Anda-02.jpg', 'blender', 'kualitas terbaik,keluaran terbaru,warna sesuai gambar', 1, 1, 4, 1000, '2018-11-20 14:21:07', '2018-11-20 14:21:07'),
(45, '1542774928.Cosmos_Stand_Mixer_CM1489.jpg', 'mixer', 'kualitas terbaik, keluaran terbaru,nyaman dipakai', 1, 1, 7, 350, '2018-11-20 14:35:28', '2018-11-20 14:35:28'),
(46, '1542857464.kmd.jpg', 'radio', 'radio kualtisnya bagus,warna sesuai gambar', 1, 1, 3, 7000, '2018-11-21 13:31:05', '2018-11-21 13:31:05'),
(47, '1542863580.57201d510e11854c3e4693d756e9b5fe-d9bbt7q.png', 'baju cowok', 'baju keluaran terbaru,bahan terbaik,warna sesuai digambar tinggal milih', 2, 1, 8, 250, '2018-11-21 15:13:01', '2018-11-21 15:13:01'),
(48, '1542863918.images (10).jpg', 'setelan bayi', 'setelan bayi lucu dengan motif seperti semangka yang akan membuat gemas saat di pakai bayi,warna sesuai gambar', 3, 1, 3, 238, '2018-11-21 15:18:38', '2018-11-21 15:18:38'),
(49, '1542864313.images (19).jpg', 'jaket wanita', 'jaket lucu ,bahan berkualitas,keluaran terbaru', 2, 1, 5, 500, '2018-11-21 15:25:13', '2018-11-21 15:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;