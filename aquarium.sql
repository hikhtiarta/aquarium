-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2020 pada 16.52
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aquarium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `img`, `url`) VALUES
(9, 'c2411d46-b05d-4111-b313-f34292375090.jpg', 'http://localhost/aquarium/admin/page_home'),
(10, '79e4ad5c-f3dc-42ba-b0ac-873e7f12dffa.jpg', 'http://localhost/aquarium/admin/page_about'),
(12, '296f5da6-2f27-400f-b209-917a13bf6c5f.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `img`) VALUES
(1, 'Kabinet', '12500196-ab34-438a-98c9-a646648dd643.png'),
(2, 'Lampu', '12500196-ab34-438a-98c9-a646648dd643.png'),
(8, 'Pasir', '12500196-ab34-438a-98c9-a646648dd643.png'),
(9, 'Filter', '12500196-ab34-438a-98c9-a646648dd643.png'),
(10, 'Tangki', 'c4c87828-aff7-4e62-b7e1-14fed19b0026.png'),
(11, 'Makanan Ikan', '0b4cca81-3d5b-4e28-b449-600ac2b1cfcb.png'),
(12, 'Substrat', '41a6d69e-1709-4f71-a897-8ca5a105cf8a.png'),
(13, 'Sistem CO2', '75dc5c48-5b88-4085-8b51-62298ba43c2e.png'),
(14, 'Dasdas', '2f9e7333-7827-4a41-a219-bd43a9de6f3e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `created_date`) VALUES
(1, 'Hasan Ikhtiarta', 'hasan.ikhtiarta@gmail.com', 'Bagus!', '2020-07-29 15:44:42'),
(2, '321', '312', '312 321', '2020-07-29 16:23:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `share` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `thumbnail`, `likes`, `share`, `created_date`, `updated_date`, `url`) VALUES
(31, 'Map with Marker', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</span><br></p>', '[\"2020\\/07\\/21\\/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020\\/07\\/21\\/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-21 05:05:30', '2020-07-21 07:50:58', 'map-with-marker'),
(32, 'Cara Membuat Aquascape Murah dan Mudah ', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '[\"2020\\/07\\/28\\/ed747d7e-efd8-47f7-82c1-249bc38ef0af.jpg\",\"2020\\/07\\/28\\/5ef312b1-723f-4b94-86cd-438720cdf6aa.jpg\"]', 0, 0, '2020-07-28 14:14:43', NULL, 'cara-membuat-aquascape-murah-dan-mudah'),
(33, 'tes1', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:17:15', NULL, 'tes1'),
(34, 'tes2', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes2'),
(35, 'tes3', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes3'),
(36, 'tes4', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes4'),
(37, 'tes5', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes5'),
(38, 'tes6', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes6'),
(39, 'tes7', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes7'),
(40, 'tes8', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes8'),
(41, 'tes9', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes9'),
(42, 'tes10', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes10'),
(43, 'tes11', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes11'),
(44, 'tes12', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes12'),
(45, 'tes13', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes13'),
(46, 'tes14', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes14'),
(47, 'tes15', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes15'),
(48, 'tes16', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes16'),
(49, 'tes17', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes17'),
(50, 'tes18', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes18'),
(51, 'tes19', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes19'),
(52, 'tes20', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes20'),
(53, 'tes21', 'tes1', '[\"2020/07/21/59032ec5-d597-4875-adfd-8ca5f48aaa45.png\",\"2020/07/21/4d3b5f42-e5a6-44c7-9b78-ece77a56be75.png\"]', 0, 0, '2020-07-29 06:19:10', NULL, 'tes21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `img` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `share` int(11) NOT NULL DEFAULT 0,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `description`, `price`, `img`, `created_date`, `updated_date`, `likes`, `share`, `url`) VALUES
(38, 'Hiasan Aquascape 1:1', '[\"Kabinet\"]', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</span><br></p>', 100000, '[\"2020\\/07\\/22\\/c52d757a-4b8f-4d03-80d6-1ff321187b45.jpg\",\"2020\\/07\\/22\\/7d16bbea-13eb-4f2f-ba13-b1c30e7839fd.jpg\",\"2020\\/07\\/22\\/080d1d77-4c19-4640-b239-b88a657870bf.jpg\"]', '2020-07-21 23:26:12', NULL, 0, 0, 'hiasan-aquascape-11'),
(39, 'Aquascape Kayu 1:1', '[\"Kabinet\"]', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</span><br></p>', 25000000, '[\"2020\\/07\\/22\\/252f211d-c222-4e74-aed5-d7f902f5a341.jpg\",\"2020\\/07\\/22\\/f3c3e59e-fb26-438a-bc65-93485b226107.jpg\",\"2020\\/07\\/22\\/afe63268-a0c3-43bd-9bf1-20b3651539d7.jpg\"]', '2020-07-21 23:26:44', NULL, 0, 0, 'aquascape-kayu-11'),
(40, 'Batu Hias 1:1', '[\"Kabinet\"]', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</span><br></p>', 100000000, '[\"2020\\/07\\/22\\/287f1d99-a47f-4688-82c9-38416e0b6428.jpg\",\"2020\\/07\\/22\\/db1020cd-c758-4eb0-9935-ea628615b945.jpg\",\"2020\\/07\\/22\\/3c12f246-2e22-4579-960d-46b1b206568a.jpg\"]', '2020-07-21 23:27:12', NULL, 0, 0, 'batu-hias-11'),
(41, 'Lampu Hias Aquarium Besar Sedang Kecil 100x100 das dadas das asd asdas dasdasd', '[\"Lampu\"]', '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</span><br></p>', 80000000, '[\"2020\\/07\\/22\\/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020\\/07\\/22\\/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020\\/07\\/22\\/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-21 23:28:34', '2020-07-23 08:22:08', 0, 0, 'lampu-hias-aquarium-besar-sedang-kecil-100x100-das-dadas-das-asd-asdas-dasdasd'),
(42, 'Hasan Ikhtiarta', '[\"Kabinet\"]', '<p>312312</p>', 1312312, '[\"2020\\/07\\/23\\/a4e56d03-23d5-49f0-8a9a-8aec89202a78.png\"]', '2020-07-23 07:45:18', NULL, 0, 0, 'hasan-ikhtiarta'),
(43, 'cek', '[\"Filter\"]', '<p>312312321</p>', 213123, '[\"2020\\/07\\/23\\/b469b7b8-0cec-4e21-97dc-e302d3a47291.png\"]', '2020-07-23 08:01:48', NULL, 0, 0, 'cek'),
(44, 'tes1', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:35:58', NULL, 0, 0, 'tes1'),
(45, 'tes2', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes2'),
(46, 'tes3', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes3'),
(47, 'tes4', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes4'),
(48, 'tes5', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes5'),
(49, 'tes6', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes6'),
(50, 'tes7', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes7'),
(51, 'tes8', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes8'),
(52, 'tes9', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes9'),
(53, 'tes10', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes10'),
(54, 'tes11', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes11'),
(55, 'tes12', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes12'),
(56, 'tes13', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes13'),
(57, 'tes14', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes14'),
(58, 'tes15', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes15'),
(59, 'tes16', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes16'),
(60, 'tes17', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes17'),
(61, 'tes18', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes18'),
(62, 'tes19', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes19'),
(63, 'tes20', '[\"Kabinet\"]', 'tes', 1, '[\"2020/07/22/4f48ca50-85c1-4882-9eb5-6ae4785eaaed.jpg\",\"2020/07/22/cb4c65d6-fea5-4a2c-ad0a-6952252485bf.jpg\",\"2020/07/22/4f39548c-41ca-4a0f-9d6c-4822a3c426e3.jpg\"]', '2020-07-23 12:38:04', NULL, 0, 0, 'tes20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(36) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `toko_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `name`, `toko_name`, `email`, `phone`, `address`, `bio`) VALUES
('1', 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'admin', 'aquawabisabi', 'aquawabisabi', 'hasan.ikhtiarta@gmail.com', '081297991631', 'Wisma Staco 7th floor, Jl. Casablanca, RT.4/RW.12, Menteng Dalam, Tebet, South Jakarta City, Jakarta 12960', '<b>Toko ikan dsa das</b>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
