-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jun 2021 pada 08.47
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toysShop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `city`, `country`, `phone`) VALUES
(11321, 'Jett', 'Kuta Bali', 'Indonesia', '081329887128'),
(11652, 'Raze', 'Bandung', 'Indonesia', '081383982117'),
(11773, 'Sova', 'Tegal', 'Indonesia', '081332998772'),
(11883, 'Dwi Candra', 'Kudus', 'Indonesia', '081329883992');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(20) NOT NULL,
  `ord_date` date NOT NULL,
  `cus_id` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `ord_date`, `cus_id`, `total_amount`) VALUES
(758727, '2021-04-13', 11883, 8000000),
(783941, '2021-02-08', 11652, 5800000),
(784269, '2021-03-09', 11773, 6450000),
(798213, '2021-04-14', 11321, 9200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderitem`
--

CREATE TABLE `tbl_orderitem` (
  `id` int(10) NOT NULL,
  `ord_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_orderitem`
--

INSERT INTO `tbl_orderitem` (`id`, `ord_id`, `prod_id`, `quantity`) VALUES
(91231, 783941, 373648, 1),
(91823, 798213, 312893, 1),
(93434, 784269, 328379, 2),
(98373, 758727, 394848, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `package` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_name`, `supplier_id`, `unit_price`, `package`) VALUES
(23783, 'Hot Wheels', 189272, 120000, 100),
(312893, 'Figure Toys', 123267, 5300000, 15),
(322912, 'Mobile Remote 4WD', 123267, 500000, 100),
(328379, 'Lego', 193810, 125000, 90),
(373648, 'Optimus Prime ', 174910, 8000000, 80),
(387927, 'Puzzle', 188291, 78000, 80),
(394848, 'Gundam Knight', 174910, 6000000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(10) NOT NULL,
  `companyName` varchar(20) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `companyName`, `city`, `country`, `phone`) VALUES
(123267, 'PT Jaya Abadi', 'Kendal', 'Indonesia', '082746182637'),
(123414, 'PT CK Jaya', 'Kudus', 'Indonesia', '081329337228'),
(174910, 'PT Worksi Robot', 'Tangerang', 'Indonesia', '081329833211'),
(188291, 'PT Setya Wijaya', 'Kudus', 'Indonesia', '081325468832'),
(189272, 'PT Adi Toys', 'Semarang', 'Indonesia', '082746172461'),
(193810, 'PT Fauke Oke', 'Bandung', 'Indonesia', '081932882917');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indeks untuk tabel `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indeks untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  ADD CONSTRAINT `tbl_orderitem_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orderitem_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
