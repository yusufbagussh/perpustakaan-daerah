-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 10:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_daerah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL,
  `users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_nama` varchar(255) NOT NULL,
  `anggota_jenis_kelamin` varchar(10) NOT NULL,
  `anggota_tempat_lahir` varchar(255) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_alamat` varchar(255) NOT NULL,
  `anggota_nomor_identitas` int(50) NOT NULL,
  `anggota_jenis_kartu` varchar(50) NOT NULL,
  `anggota_foto` varchar(50) NOT NULL,
  `users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'c51950a99b8b5ea2b6887333f0dfe0aa', '2021-12-13 08:19:12'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '602dc842c11637b5291fc4084ac9a808', '2021-12-14 08:36:34'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '5d81ab4001f4d132f437fa3dde40a566', '2021-12-14 09:05:54'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '5d81ab4001f4d132f437fa3dde40a566', '2021-12-14 09:31:12'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '5d81ab4001f4d132f437fa3dde40a566', '2021-12-14 09:31:34'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '5d81ab4001f4d132f437fa3dde40a566', '2021-12-14 09:31:40'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '5d81ab4001f4d132f437fa3dde40a566', '2021-12-14 09:32:19'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '67174ec237627941036d27fe391fd6c5', '2021-12-14 09:36:54'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '67174ec237627941036d27fe391fd6c5', '2021-12-14 09:37:17'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'ec6919b23aa79e41055b2b4592dfe341', '2021-12-14 09:41:07'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '40c59cf803bf702a843bcf6a124f10ca', '2021-12-18 05:52:57'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '943840f48170d1d3bf240f90e26bde3b', '2021-12-18 05:53:15'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'dfd404196dd5a2dfbf095bc13aea8bca', '2021-12-18 06:17:44'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'b8a8220dff6ddb3e43064cb815adb7c0', '2021-12-18 06:21:31'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'dfd404196dd5a2dfbf095bc13aea8bca', '2021-12-18 06:28:46'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'dfd404196dd5a2dfbf095bc13aea8bca', '2021-12-18 06:28:59'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '0c0d5d9698a4e1cea91a539eead551a0', '2021-12-18 06:29:06'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '0c0d5d9698a4e1cea91a539eead551a0', '2021-12-18 06:29:12'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '0c0d5d9698a4e1cea91a539eead551a0', '2021-12-18 06:29:13'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '0c0d5d9698a4e1cea91a539eead551a0', '2021-12-18 06:29:14'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '0c0d5d9698a4e1cea91a539eead551a0', '2021-12-18 06:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'site-admin'),
(2, 'staff', 'site-staff'),
(3, 'member', 'site-member');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 8),
(1, 17),
(3, 7),
(3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'yusuf.herlambang@gmail.com', 1, '2021-12-12 01:13:33', 1),
(2, '::1', 'yusuf.herlambang@gmail.com', 1, '2021-12-12 08:04:09', 1),
(3, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-13 08:20:28', 1),
(4, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-13 17:13:43', 1),
(5, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-13 19:12:56', 1),
(6, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-13 19:30:32', 1),
(7, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-14 00:32:47', 1),
(8, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-14 08:14:55', 1),
(9, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-14 08:17:29', 1),
(10, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-14 08:36:43', 1),
(11, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-14 09:06:19', 1),
(12, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-14 09:21:32', 1),
(13, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-14 09:33:02', 1),
(14, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-14 09:33:30', 1),
(15, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-14 10:32:31', 1),
(16, '::1', 'yusufbagus', NULL, '2021-12-16 03:40:35', 0),
(17, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-16 03:40:51', 1),
(18, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-16 03:42:08', 1),
(19, '::1', 'yusuf.herlambang27@gmail.com', 7, '2021-12-18 04:44:30', 1),
(20, '::1', 'ridhofataulwan@student.uns.ac.id', 14, '2021-12-18 05:53:25', 1),
(21, '::1', 'ridhofataulwan@student.uns.ac.id', 17, '2021-12-18 06:21:56', 1),
(22, '::1', 'rifaul0609', NULL, '2021-12-18 06:22:47', 0),
(23, '::1', 'rifaul0609', NULL, '2021-12-18 06:23:00', 0),
(24, '::1', 'ridhofataulwan@gmail.com', 16, '2021-12-18 06:23:21', 1),
(25, '::1', 'ridhofataulwan@gmail.com', 18, '2021-12-18 06:29:57', 1),
(26, '::1', 'rifaul09', NULL, '2021-12-18 06:30:10', 0),
(27, '::1', 'ridhofataulwan@student.uns.ac.id', 17, '2021-12-18 06:30:47', 1),
(28, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-20 23:26:24', 1),
(29, '::1', 'bagus.herlambang@student.uns.ac.id', 8, '2021-12-21 02:53:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-data', 'Manage All Data'),
(2, 'add-data', 'Just Add Data'),
(3, 'see-and-borrow', 'See and Borrow Books');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `buku_slug` varchar(255) NOT NULL,
  `buku_judul` varchar(50) NOT NULL,
  `buku_penulis` varchar(50) NOT NULL,
  `buku_penerbit` varchar(30) NOT NULL,
  `buku_kategori_id` int(11) DEFAULT NULL,
  `buku_isbn` varchar(30) NOT NULL,
  `buku_stok` int(11) NOT NULL,
  `buku_halaman` smallint(6) NOT NULL,
  `buku_gambar` varchar(50) NOT NULL,
  `buku_sinopsis` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_slug`, `buku_judul`, `buku_penulis`, `buku_penerbit`, `buku_kategori_id`, `buku_isbn`, `buku_stok`, `buku_halaman`, `buku_gambar`, `buku_sinopsis`, `created_at`, `updated_at`) VALUES
(35, 'habis-gelap-terbitlah-terang1', 'Habis Gelap Terbitlah Terang1', 'R. A. Kartini', 'Balai Pustaka123', 1, 'ISBN 979-407-063-7', 4, 204, 'perpussekolah1623668273.jpg', 'Habis Gelap Terbitlah Terang adalah buku kumpulan surat yang ditulis oleh Kartini. Kumpulan surat tersebut dibukukan oleh J.H. Abendanon dengan judul Door Duisternis Tot Licht. Setelah Kartini wafat, J.H. Abendanon mengumpulkan dan membukukan surat-surat yang pernah dikirimkan R.A Kartini pada teman-temannya di Eropa', NULL, '2021-12-14 03:12:31'),
(37, 'milea-suara-dari-dilan', 'Milea Suara dari Dilan', 'Pidi Baiq', 'Pastel BOOKS', 1, '978-602-0851-56-3', 0, 367, 'perpussekolah1623911192.jpg', 'Tidak ada kisah yang lebih Indah dari kisah cinta di SMA.Sama halnya dengan kisah cinta Dilan dan Milea.Dari yang awalnya benci hingga saling mencintai. Dari yang awalnya manis hingga menjadi rumit.Menjelang reuni akbar,Dilan memutuskan untuk menceritakan kembali masa masa itu.\r\n', NULL, NULL),
(38, 'matahari', 'Matahari', 'Tere Liye', 'Gramedia Pustaka Utama', 1, '978-602-03-3211-6', 4, 400, 'perpussekolah1623911284.jpg', 'Raib, Ali, dan Seli dirundung duka atas tewasnya Ily, sahabat mereka, pada pertarungan di Klan Matahari. Tak hanya mereka, para kesatria Klan Bulan juga merasakan hal sama, sampai membuat Miss Selena tak bisa kembali ke Klan Bumi.', NULL, NULL),
(39, 'hujan', 'Hujan', 'Tere Liye', 'PT Gramedia Pustaka Utama', 1, '978-602-03-2478-4', 3, 320, 'perpussekolah1623911448.jpg', 'Novel hujan adalah novel yang dibuat oleh Tere Liye pada tahun 2015. Novel ini menceritakan tentang dunia modern tetapi sedang dalam ambang kepunahan. Cerita dimulai dari pertemuan antara seorang pasien dengan dokter. Pasien tersebut bernama Lail dan dokter tersebut bernama Elijah. Lail bertemu dengan dokter tersebut dengan satu tujuan, yaitu menghapus ingatannya tentang hujan. Untuk menghapus ingatannya Lail harus menceritakan semua cerita hidupnya dengan detail dan tidak boleh ada kebohongan dan tidak ada yang ditutup-tutupi.', NULL, NULL),
(40, 'petjah', 'Petjah', 'Oda Sekar Ayu', 'Elex Media Komputindo', 1, '978-602-02959-4', 4, 314, 'perpussekolah1623911594.jpg', 'Nadhira seorang siswa SMA tingkat akhir dari kelas akselerasi. Dia berada di kelas spesial yang hanya berisi 10 orang, termasuk Dimas. Setahun sekelas dengan Dimas membuat Nadhira menyukai Dimas dengan segala karisma dan kepintarannya. Akan tetapi, Nadhira tahu bahwa tatapan mata Dimas terhadap dirinya selalu dingin. Oleh karena itu, Nadhira lebih banyak diam jika berada dekat Dimas.', NULL, NULL),
(41, 'ayah', 'Ayah', 'Andrea Hirata', 'PT Bentang Pustaka', 1, '978-602-291-102-9', 2, 412, 'perpussekolah1623911737.jpg', 'Sabari memiliki 3 sahabat yaitu Ukun, Tamat, dan Toharun yang selalu bersama dengan kekonyolannya. Sabari awalnya tidak tertarik dengan yang namanya cinta, tetapi setelah Marlena memberikan sebuah pensil sebagai hadiah karena Marlena mengambil kertas jawabannya, sejak itu Sabari berubah 180o dari biasanya. Sabari memang pandai berpuisi karena diwarisi dari ayahnya dan dia selalu membuatkan puisi cinta untuk Lena, tetapi Lena terus menolak dan bahkan menghinanya karena Sabari sama sekali bukan tipe laki-laki idaman Lena', NULL, NULL),
(42, 'sang-pemimpi', 'Sang Pemimpi', 'Andrea Hirata', 'PT Bentang Pustaka', 1, '979-3062-92-4', 3, 292, 'perpussekolah1623911957.jpg', 'Kisah perjuangan hidup Ikal dan sepupunya, Arai, dan sahabatnya, Jimbron - sebuah potret para remaja yang tengah mencari identitas diri dan seksualitasnya, dengan latar belakang Belitong tempo dulu.', NULL, NULL),
(43, 'baca-buku-ini-saat-engkau-lelah', 'Baca Buku Ini Saat Engkau Lelah', 'Munita Yeni', 'Psikologi Corner ', 1, '979-759-151-4', 3, 228, 'perpussekolah1623912408.jpg', 'Aku ingin terus bisa hidup dengan penuh kesadaran, untuk diriku sendiri, jangan pernah kalian meninggalkanku, membenciku, atau ingin membunuhku. Aku sangat membutuhkanmu. Mari kita hidup dengan saling mencintai mulai saat ini\r\nTerkadang kita terlalu sibuk mencintai ini dan itu bahkan sampai kita lupa untuk mencintai diri sendiri, dan itu sungguh melelahkan. Mengapa manusia mulai lupa bagaimana cara untuk mencintai dirinya sendiri? Bukankah sangat melelahkan ketika kalian ditinggalkan seseorang? Jika diri kalian sendiri yang meninggalkan dirimu, betapa sunyinya? Penelitian di Carnegei Mellon Universitg mengatakan bahwa rasa cinta menghasilkan emosi yang positif, hal ini mendorong sistem kekebalan tubuh orang tersebut menjadi lebih sehat', NULL, NULL),
(44, 'maaf-tuhan-aku-hampir-menyerah', 'Maaf Tuhan Aku Hampir Menyerah', 'Alfialghazi', 'Sahima', 1, '978-602-674-447-0', 6, 246, 'perpussekolah1623912751.jpg', 'Tidak semua hal akan berjalan sesuai keinginanmu. Pada satu waktu, impianmu akan dipukul mundur, harapanmu terpatahkan, dan langkahmu dihentikan paksa. Dunia yang luas terasa begitu menyesakkan. Ramai, tetapi sepi. Ingin terus melangkah, takut terjatuh. Ingin putar balik, sudah tak mungkin tertempuh. Ingin menyerah, tetap saja tidak akan pernah menyelesaikan masalah. Setiap pilihan nyaris tak mampu kamu tanggung konsekuensinya.', NULL, NULL),
(45, 'information-technology-business-start-up', 'Information Technology Business Start Up', 'Yudha Yudhanto', 'Elex Media Komputindo', 1, '978-602-04-8721-2', 0, 276, 'perpussekolah1623912939.jpg', 'Saat ini bisnis dengan model start-up sedang digandrungi. Bisnis dengan model ini menjadi tren dan banyak orang yang mencoba peruntungan di model bisnis ini. Banyaknya kesuksesan yang dituai oleh para pelaku bisnis start-up menjadi patokan impian dan motivasi.\r\n\r\nDunia Teknologi Informasi (TI) yang berkembang sangat pesat, telah menyulap dunia kita hingga ke detail paling sederhana di kehidupan. Hampir tak ada bidang yang tak tersentuh TI. TI digunakan untuk menyelesaikan berbagai masalah yang ada di tengah masyarakat. Sisi inilah yang banyak digunakan oleh para pegiat muda untuk dijadikan sebagai tonggak utama dalam berbisnis. Perangkat lunak, hardware, game, dan animasi merupakan kategori favorit untuk bisnis start-up berbasis IT ini.', NULL, NULL),
(63, 'safdaf', 'safdaf', 'safdasfd', 'sdfasdfs', 1, 'sdfasdfsa', 20, 300, '1639466195_abba70665dbe4e3706aa.png', 'sdfsdafa', '2021-12-14 01:16:35', '2021-12-14 01:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Agama'),
(2, 'Filsafat');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL,
  `konfirmasi_admin_id` int(11) NOT NULL,
  `konfirmasi_waktu_pinjam` datetime NOT NULL,
  `konfirmasi_waktu_kembali` datetime NOT NULL,
  `konfirmasi_pinjam_kembali_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1639291815, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_kembali`
--

CREATE TABLE `pinjam_kembali` (
  `pinjam_kembali_id` int(11) NOT NULL,
  `pinjam_kembali_anggota_id` int(11) NOT NULL,
  `pinjam_kembali_buku_id` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `pinjam_kembali_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `superadmin_nama` int(255) NOT NULL,
  `superadmin_foto` varchar(255) NOT NULL,
  `id_users` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'yusuf.herlambang27@gmail.com', 'masbag', '$2y$10$YDtQLylnAcK.0Fd2RlyQKOQgBh2sWinzO280FTMnPNx8v8W2qH34S', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-13 08:17:08', '2021-12-13 08:19:12', NULL),
(8, 'bagus.herlambang@student.uns.ac.id', 'yusufbagus', '$2y$10$qGTf.Dy/EGIdkd4p7kKwZudosF2Q9t81GL3k2uYar2qKSiF1fAGB6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-14 08:35:52', '2021-12-14 08:36:34', NULL),
(17, 'ridhofataulwan@student.uns.ac.id', 'rifaul02', '$2y$10$UyYb2RFpNf9MtEHMhG/qQ.8Wk0U9zwDt3tbjLxDePLoaVZS.FR1ee', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-18 06:20:11', '2021-12-18 06:21:31', NULL),
(18, 'ridhofataulwan@gmail.com', 'rifaul06', '$2y$10$3Jkh27YgT8QwCmSxo4mzte8nwLP1gNlpbMGYLatmAUvxPillqxw8i', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-18 06:25:43', '2021-12-18 06:29:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `buku_kategori_id` (`buku_kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `konfirmasi_admin_id` (`konfirmasi_admin_id`),
  ADD KEY `konfirmasi_pinjam_kembali_id` (`konfirmasi_pinjam_kembali_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam_kembali`
--
ALTER TABLE `pinjam_kembali`
  ADD PRIMARY KEY (`pinjam_kembali_id`),
  ADD KEY `pinjam_kembali_user_id` (`pinjam_kembali_anggota_id`),
  ADD KEY `pinjam_kembali_buku_id` (`pinjam_kembali_buku_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjam_kembali`
--
ALTER TABLE `pinjam_kembali`
  MODIFY `pinjam_kembali_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_kategori_id` FOREIGN KEY (`buku_kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`konfirmasi_admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`konfirmasi_pinjam_kembali_id`) REFERENCES `pinjam_kembali` (`pinjam_kembali_id`);

--
-- Constraints for table `pinjam_kembali`
--
ALTER TABLE `pinjam_kembali`
  ADD CONSTRAINT `pinjam_kembali_ibfk_1` FOREIGN KEY (`pinjam_kembali_anggota_id`) REFERENCES `anggota` (`anggota_id`),
  ADD CONSTRAINT `pinjam_kembali_ibfk_2` FOREIGN KEY (`pinjam_kembali_buku_id`) REFERENCES `buku` (`buku_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
