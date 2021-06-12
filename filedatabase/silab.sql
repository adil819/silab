-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 08:47 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user_id`, `kode_prodi`) VALUES
(1, 'Ari Rahmansyah Putra', 1, '1402');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `tanggal`, `kode_prodi`) VALUES
(2, 'Pengumuman Seleksi Aslab', '<p>alhamdulillah ditunda</p>\r\n', '1511258700182.jpg', '2018-12-26', '031'),
(4, 'Galang Dana Gabungan USU dan UINSU', '<p>Penggalangan dana ini untuk membantu Korban Tsunami Selat Sunda yang terjadi beberapa waktu lalu. dan dilakukanya galang dana gabungan ini untuk mempererat ikatan mahasiswa yang ada di Sumatera utara</p>\r\n', 'IMG-20181228-WA0089.jpg', '2019-01-03', '1402'),
(5, 'Ayo gabung ke Event jalan jalannya TI USU', '<p>Event ini sangat asik karena akan mempererat ikatan antara Mahasiswa TI USU. disini banyak sekali kegiatan kegiatan yang ada. ayo gabung daftar.</p>\r\n\r\n<p>Syarat</p>\r\n\r\n<ol>\r\n	<li>Mahasiswa Aktif TI USU</li>\r\n	<li>Izin dari orang tua</li>\r\n	<li>Sehat Jasmani dan Rohani</li>\r\n	<li>Tidak membawa barang barang yang haram</li>\r\n</ol>\r\n', 'COVER.jpg', '2019-01-03', '1402'),
(6, 'TalkShow Anti Hack', '<p>Dengan diadakanya talkshow ini diharapkan agar dapat menambah wawasan terhadap mahasiswa yang ingin mempertahankan dan mengembangkan kemampuan dalam menjaga informasi agar tidak disalah gunakan oleh pihak yang tidak bertanggung jawab.</p>\r\n\r\n<p>Acara</p>\r\n\r\n<ol>\r\n	<li>Dimulai pukul : 08.00 - Selesai</li>\r\n	<li>drescode : Rapi dan sopan</li>\r\n	<li>membawa KTM</li>\r\n</ol>\r\n', '78ce3c978583120254d6fa67db7b4a63.jpg', '2019-01-03', '1402'),
(7, 'Aksi Bela Islam', '<p>Aksi ini sungguh menggemparkan Dunia, bagaimana tidak? jutaan masyarakat di seluruh Indonesia beramai ramai berkumpul di beberapa titik untuk membela Islam yang ada di seluruh Dunia</p>\r\n', 'IMG_20161202_122839.jpg', '2019-01-03', '1402'),
(8, 'Warcraft Mobile Tournament', '<p>Ayo kepada seluruh mahasiswa yang da di Universitas Sumatera Utara untuk dapat bergabung di tournament ini karena ada haidah dengan total 2 Miliyar. tunggu apa lagi ayo gabung!</p>\r\n', '092e463eceac69430ab98502812666c8.jpg', '2019-01-03', '1402'),
(9, 'Hasil Mobile Legend Cup TI USU', '<p>Ini adalah hasil semifinal yang telah dimenangkan oleh KOM C 2017 dengan angka telak 41-21. Semoga team yang kalah tidak berkecil hati dan tetap semangat. sampai ketemu di tournament tahun depan. Salam Hangat HIMATIF</p>\r\n', 'BlueStacks_ScreenShot.jpg', '2019-01-03', '1402'),
(10, 'Bumi Bulat adat Datar ya?', '<p>Saat nini banyak terjadi berdebatan antara bumi datar atau bulat. Menurut NASA itu adalah hal yang ceroboh ketika mengatakan bumi itu datar, mengapa demikian? jika saja bumi itu datar simpelnya tidak akan ada Gerhana bulan maupun matahari. Dan tentu saja yang lebih logikanya dan lucunya kalau bumi itu datar siapa yang tinggal diujung bumi? hmm mungkin dia orang yang terasingkan</p>\r\n', 'header.jpg', '2019-01-03', '1402'),
(11, 'open Recruitment Jaringan Komputer CUP member', '<p>Open Recruitment untuk anggota baru dalam Jaringan komputer CUP 2019. Apa itu Jaringan Komputer CUP?&nbsp; ialah suatu ajang perlombaan dimana suatu team beranggotakan 4 orang dan membuat jaringan komputer yang baik dan berguna.</p>\r\n\r\n<p>Persyaratan:</p>\r\n\r\n<ol>\r\n	<li>Mempunyai niat</li>\r\n	<li>IP minimal 3.5</li>\r\n	<li>Siap Menghadapi tekanan Batin</li>\r\n	<li>harus Jomblo biar KONSEN</li>\r\n</ol>\r\n', 'pictureHD-FORCE.jpg', '2019-01-03', '1402'),
(12, 'ROBOTICS CLUB', '<p>Sebentar lagi akan ada event robotics club ni gengss!! pantau terus ya pengumumanya sebenar lagi.</p>\r\n\r\n<p>harus kepo loh iya sahabat IT! dan Join dung ke robotics club biar jadi anak Hits IT</p>\r\n', 'robot_android_digital_art_cgi_104320_1366x768.jpg', '2019-01-03', '1402');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_barang`, `nama_barang`) VALUES
(1, 'Kursi'),
(2, 'meja'),
(3, 'komputer'),
(4, 'Server'),
(5, 'Gelas'),
(6, 'Laptop Hewlett Packart i7'),
(7, 'Kabel UTF 10 Meter'),
(9, 'Drone'),
(10, 'Kabel'),
(12, 'Virtual Reality'),
(13, 'Proyektor'),
(14, 'Cok Sambung'),
(15, 'AC'),
(16, 'Ac');

-- --------------------------------------------------------

--
-- Table structure for table `aslab`
--

CREATE TABLE `aslab` (
  `nim` varchar(10) NOT NULL,
  `id_aslab` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `id_dosen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aslab`
--

INSERT INTO `aslab` (`nim`, `id_aslab`, `kode_prodi`, `user_id`, `kontak`, `id_dosen`) VALUES
('171402036', 1, '1402', 0, 'AriRahmansyahPutra', '0031087905'),
('171402087', 2, '1402', 2, '0823 8622 5xxx', '0031087905'),
('171402135', 3, '1402', 5, 'hariihzaherlambang', '0031087905'),
('171402081', 4, '1402', 6, 'ahmadadil', '0031087905'),
('1711402009', 5, '1402', 7, '08788596332', '0031087905'),
('171402009', 6, '1402', 9, '08788596332', '0031087905');

-- --------------------------------------------------------

--
-- Table structure for table `detail_aset`
--

CREATE TABLE `detail_aset` (
  `id_barang` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_aset`
--

INSERT INTO `detail_aset` (`id_barang`, `id_ruang`, `kondisi`, `jumlah`) VALUES
(1, 1, 'Bagus', 2),
(2, 1, 'Kurang Bagus', 3),
(3, 1, 'Baru', 70),
(4, 1, 'Cukup bagus', 2),
(6, 1, 'Masih bagus', 2),
(7, 1, 'Baru', 10),
(9, 1, 'Mulus', 1),
(12, 1, 'Bagus', 2),
(13, 1, 'Jernih', 2),
(14, 1, 'Bagus', 7),
(3, 0, 'Bagus', 13),
(4, 0, '122', 122),
(3, 1, '31', 31),
(5, 1, '13', 13),
(6, 2, '14', 14),
(1, 2, 'bagus', 16),
(3, 2, 'bagus', 10),
(12, 2, 'kurang bagus', 3),
(9, 2, 'bagusnya kurang', 2),
(7, 2, 'sangat bagus', 13),
(13, 2, 'kurang bagus', 1),
(4, 2, 'sangat bagus', 2),
(5, 2, 'sangat buruk', 2),
(14, 2, 'sangat bagus', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(25) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `foto` mediumblob NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `user_id`, `kode_prodi`, `foto`, `kontak`) VALUES
('0031087905', 'Dedy Arisandi', 3, '1402', '', 'rahasia'),
('0031423567', 'Ivan Jaya', 8, '1402', '', '08138497221'),
('0115098203', 'Dani Gunawan', 10, '1402', '', 'adil819'),
('0982928173', 'Marischa', 0, '1402', '', 'marischa');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` varchar(10) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
('1', 'Fakultas Kedokteran'),
('10', 'Fakultas Psikologi'),
('11', 'Fakultas Ekonomi Dan Bisnis'),
('12', 'Fakultas Kedokteran Gigi'),
('13', 'Fakultas Keperawatan'),
('14', 'Fakultas Ilmu Komputer Dan Teknologi Informasi'),
('15', 'Fakultas Kehutanan'),
('2', 'Fakultas Matematika Dan Ilmu Pengetahuan Alam'),
('3', 'Fakultas Ilmu Budaya'),
('4', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
('5', 'Fakultas Pertanian'),
('6', 'Fakultas Kesehatan Masyarakat'),
('7', 'Fakultas Hukum'),
('8', 'Fakultas Farmasi'),
('9', 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jam_masuk` varchar(6) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id_kelas`, `jam_masuk`, `hari`, `id_lab`) VALUES
(1, '16.20', 'senin', 1),
(2, '08.00', 'senin', 1),
(3, '08.00', 'selasa', 1),
(4, '14.40', 'rabu', 1),
(5, '14.40', 'rabu', 1),
(6, '09.20', 'senin', 2),
(7, '08.00', 'rabu', 1),
(8, '13.00', 'selasa', 1),
(9, '14.40', 'rabu', 1),
(10, '13.00', 'selasa', 1),
(11, '14.40', 'jumat', 1),
(12, '14.40', 'rabu', 1),
(13, '09.20', 'selasa', 1),
(14, '13.00', 'kamis', 1),
(15, '08.00', 'rabu', 2),
(16, '11.20', 'rabu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kom` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `id_aslab` int(11) NOT NULL,
  `nidn` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kom`, `kode_prodi`, `kode_matkul`, `id_aslab`, `nidn`) VALUES
(1, 'A22017', '1402', 'EX02345', 2, '0031087905'),
(2, 'A12017', '1402', 'EX02345', 2, '0031087905'),
(3, 'C22017', '1402', 'TIF2305', 2, '0031087905'),
(4, 'C12017', '1402', 'TIF2305', 2, '0031087905'),
(5, 'A22018', '1402', 'TIF0921', 2, '0115098203'),
(6, 'C12017', '1402', 'TIF9012', 3, '0115098203'),
(8, 'C22017', '1402', 'TIF2019', 3, '0115098203'),
(9, 'A12017', '1402', 'TIF1182', 3, '0031087905'),
(10, 'C22017', '1402', 'TIF0921', 2, '0115098203'),
(12, 'A22018', '1402', 'TIF2305', 4, '0115098203'),
(13, 'A12018', '1402', 'TIF1202P', 6, '0115098203'),
(14, 'B12017', '1402', 'TIF2305', 6, '0115098203'),
(15, 'C12017', '1402', 'TIF2019', 6, '0031087905'),
(16, 'C22017', '1402', 'TIF2019', 6, '0031087905');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_kom`
--

CREATE TABLE `kelas_kom` (
  `kom` char(3) NOT NULL,
  `kelas_kom` char(3) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `angkatan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_kom`
--

INSERT INTO `kelas_kom` (`kom`, `kelas_kom`, `kode_prodi`, `angkatan`) VALUES
('A', 'A1', '1402', '2018'),
('A', 'A2', '1402', '2018'),
('C', 'C1', '1402', '2019'),
('C', 'C2', '1402', '2017'),
('C', 'C1', '1402', '2017'),
('B', 'B1', '1402', '2017'),
('B', 'B2', '1402', '2017'),
('A', 'A1', '1402', '2019'),
('A', 'A2', '1402', '2019'),
('A', 'A1', '1402', '2017'),
('A', 'A2', '1402', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mahasiswa`
--

CREATE TABLE `kelas_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `kom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`nim`, `kom`) VALUES
('181402001', 'A12018'),
('181402002', 'B12018'),
('181402003', 'C12018'),
('181402004', 'A12018'),
('181402005', 'B12018'),
('181402006', 'C12018'),
('181402007', 'A12018'),
('181402008', 'B12018'),
('181402009', 'C12018'),
('181402010', 'A12018'),
('181402011', 'B12018'),
('181402012', 'C12018'),
('181402013', 'A12018'),
('181402014', 'B12018'),
('181402015', 'C12018'),
('181402016', 'A12018'),
('181402017', 'B12018'),
('181402018', 'C12018'),
('181402019', 'A12018'),
('181402020', 'B12018'),
('181402021', 'C12018'),
('181402022', 'A12018'),
('181402023', 'B12018'),
('181402024', 'C12018'),
('181402025', 'A12018'),
('181402026', 'B12018'),
('181402027', 'C12018'),
('181402028', 'A12018'),
('181402029', 'B12018'),
('181402030', 'C12018'),
('181402031', 'A12018'),
('181402032', 'B12018'),
('181402033', 'C12018'),
('181402034', 'A12018'),
('181402035', 'B12018'),
('181402036', 'C12018'),
('181402037', 'A12018'),
('181402038', 'B12018'),
('181402039', 'C12018'),
('181402040', 'A12018'),
('181402041', 'B12018'),
('181402042', 'C12018'),
('181402043', 'A12018'),
('181402044', 'B12018'),
('181402045', 'C12018'),
('181402046', 'A12018'),
('181402047', 'B12018'),
('181402048', 'C12018'),
('181402049', 'A12018'),
('181402050', 'B12018'),
('181402051', 'C12018'),
('181402052', 'A12018'),
('181402053', 'B12018'),
('181402054', 'C12018'),
('181402055', 'A12018'),
('181402056', 'B12018'),
('181402057', 'C12018'),
('181402058', 'A12018'),
('181402059', 'B12018'),
('181402060', 'C12018'),
('181402061', 'A12018'),
('181402062', 'B12018'),
('181402063', 'C12018'),
('181402064', 'A12018'),
('181402065', 'B12018'),
('181402066', 'C12018'),
('181402067', 'A12018'),
('181402068', 'B12018'),
('181402069', 'C12018'),
('181402070', 'A12018'),
('181402071', 'B12018'),
('181402072', 'C12018'),
('181402073', 'A22018'),
('181402074', 'B22018'),
('181402075', 'C22018'),
('181402076', 'A22018'),
('181402077', 'B22018'),
('181402078', 'C22018'),
('181402079', 'A22018'),
('181402080', 'B22018'),
('181402081', 'C22018'),
('181402082', 'A22018'),
('181402083', 'B22018'),
('181402084', 'C22018'),
('181402085', 'A22018'),
('181402086', 'B22018'),
('181402087', 'C22018'),
('181402088', 'A22018'),
('181402089', 'B22018'),
('181402090', 'C22018'),
('181402091', 'A22018'),
('181402092', 'B22018'),
('181402093', 'C22018'),
('181402094', 'A22018'),
('181402095', 'B22018'),
('181402096', 'C22018'),
('181402097', 'A22018'),
('181402098', 'B22018'),
('181402099', 'C22018'),
('181402100', 'A22018'),
('181402101', 'B22018'),
('181402102', 'C22018'),
('181402103', 'A22018'),
('181402104', 'B22018'),
('181402105', 'C22018'),
('181402106', 'A22018'),
('181402107', 'B22018'),
('181402108', 'C22018'),
('181402109', 'A22018'),
('181402110', 'B22018'),
('181402111', 'C22018'),
('181402112', 'A22018'),
('181402113', 'B22018'),
('181402114', 'C22018'),
('181402115', 'A22018'),
('181402116', 'B22018'),
('181402117', 'C22018'),
('181402118', 'A22018'),
('181402119', 'B22018'),
('181402120', 'C22018'),
('181402121', 'A22018'),
('181402122', 'B22018'),
('181402123', 'C22018'),
('181402124', 'A22018'),
('181402125', 'B22018'),
('181402126', 'C22018'),
('181402127', 'A22018'),
('181402128', 'B22018'),
('181402129', 'C22018'),
('181402130', 'A22018'),
('181402131', 'B22018'),
('181402132', 'C22018'),
('181402133', 'A22018'),
('181402134', 'B22018'),
('181402135', 'C22018'),
('181402136', 'A22018'),
('181402137', 'B22018'),
('181402138', 'C22018'),
('181402139', 'A22018'),
('181402140', 'B22018'),
('181402141', 'C22018'),
('181402142', 'A22018'),
('181402143', 'B22018'),
('181402144', 'C22018'),
('181402145', 'A22018'),
('171402001', 'A12017'),
('171402002', 'B12017'),
('171402003', 'C12017'),
('171402004', 'A12017'),
('171402005', 'B12017'),
('171402006', 'C12017'),
('171402007', 'A12017'),
('171402008', 'B12017'),
('171402009', 'C12017'),
('171402010', 'A12017'),
('171402011', 'B12017'),
('171402012', 'C12017'),
('171402013', 'A12017'),
('171402014', 'B12017'),
('171402015', 'C12017'),
('171402016', 'A12017'),
('171402017', 'B12017'),
('171402018', 'C12017'),
('171402019', 'A12017'),
('171402020', 'B12017'),
('171402021', 'C12017'),
('171402022', 'A12017'),
('171402023', 'B12017'),
('171402025', 'A12017'),
('171402026', 'B12017'),
('171402029', 'B12017'),
('171402030', 'C12017'),
('171402031', 'A12017'),
('171402032', 'B12017'),
('171402033', 'C12017'),
('171402034', 'A12017'),
('171402035', 'B12017'),
('171402036', 'C12017'),
('171402037', 'A12017'),
('171402038', 'B12017'),
('171402039', 'C12017'),
('171402041', 'B12017'),
('171402042', 'C12017'),
('171402043', 'A12017'),
('171402045', 'C12017'),
('171402046', 'A12017'),
('171402047', 'B12017'),
('171402048', 'C12017'),
('171402049', 'A12017'),
('171402050', 'B12017'),
('171402051', 'C12017'),
('171402052', 'A12017'),
('171402053', 'B12017'),
('171402054', 'C12017'),
('171402055', 'A12017'),
('171402056', 'B12017'),
('171402057', 'C12017'),
('171402058', 'A12017'),
('171402059', 'B12017'),
('171402061', 'A12017'),
('171402062', 'B12017'),
('171402064', 'A12017'),
('171402065', 'B12017'),
('171402066', 'C12017'),
('171402067', 'A12017'),
('171402068', 'B12017'),
('171402069', 'C12017'),
('171402071', 'B12017'),
('171402072', 'C12017'),
('171402073', 'A12017'),
('171402074', 'B12017'),
('171402075', 'C12017'),
('171402076', 'A12017'),
('171402077', 'B22017'),
('171402079', 'A12017'),
('171402080', 'B22017'),
('171402081', 'C12017'),
('171402082', 'A22017'),
('171402083', 'B22017'),
('171402084', 'C12017'),
('171402085', 'A22017'),
('171402086', 'B22017'),
('171402087', 'C12017'),
('171402088', 'A22017'),
('171402089', 'B22017'),
('171402090', 'C22017'),
('171402092', 'B22017'),
('171402094', 'A22017'),
('171402095', 'B22017'),
('171402096', 'C22017'),
('171402097', 'A22017'),
('171402099', 'C22017'),
('171402100', 'A22017'),
('171402101', 'B22017'),
('171402102', 'C22017'),
('171402103', 'A22017'),
('171402104', 'B22017'),
('171402105', 'C22017'),
('171402106', 'A22017'),
('171402107', 'B22017'),
('171402108', 'C22017'),
('171402109', 'A22017'),
('171402110', 'B22017'),
('171402111', 'C22017'),
('171402112', 'A22017'),
('171402113', 'B22017'),
('171402114', 'C22017'),
('171402115', 'A22017'),
('171402116', 'B22017'),
('171402117', 'C22017'),
('171402118', 'A22017'),
('171402119', 'B22017'),
('171402120', 'C22017'),
('171402121', 'A22017'),
('171402122', 'B22017'),
('171402123', 'C22017'),
('171402125', 'B22017'),
('171402126', 'C22017'),
('171402127', 'A22017'),
('171402128', 'B22017'),
('171402129', 'C22017'),
('171402130', 'A22017'),
('171402131', 'B22017'),
('171402132', 'C22017'),
('171402133', 'A22017'),
('171402134', 'B22017'),
('171402135', 'C22017'),
('171402136', 'A22017'),
('171402137', 'B22017'),
('171402138', 'C22017'),
('171402139', 'A22017'),
('171402140', 'B22017'),
('171402141', 'C22017'),
('171402142', 'A22017'),
('171402143', 'B22017'),
('171402144', 'C22017'),
('171402145', 'A22017'),
('171402146', 'B22017'),
('171402147', 'C22017'),
('171402148', 'A22017'),
('171402149', 'B22017'),
('171402150', 'C22017'),
('171402151', 'A22017'),
('161402001', 'A12016'),
('161402002', 'B12016'),
('161402003', 'C12016'),
('161402004', 'A12016'),
('161402005', 'B12016'),
('161402006', 'C12016'),
('161402007', 'A12016'),
('161402008', 'B12016'),
('161402009', 'C12016'),
('161402010', 'A12016'),
('161402011', 'B12016'),
('161402012', 'C12016'),
('161402013', 'A12016'),
('161402014', 'B12016'),
('161402015', 'C12016'),
('161402016', 'A12016'),
('161402017', 'B12016'),
('161402018', 'C12016'),
('161402019', 'A12016'),
('161402020', 'B12016'),
('161402022', 'A12016'),
('161402023', 'B12016'),
('161402024', 'C12016'),
('161402025', 'A12016'),
('161402026', 'B12016'),
('161402027', 'C12016'),
('161402028', 'A12016'),
('161402029', 'B12016'),
('161402030', 'C12016'),
('161402031', 'A12016'),
('161402032', 'B12016'),
('161402033', 'C12016'),
('161402034', 'A12016'),
('161402035', 'B12016'),
('161402036', 'C12016'),
('161402037', 'A12016'),
('161402038', 'B12016'),
('161402039', 'C12016'),
('161402040', 'A12016'),
('161402041', 'B12016'),
('161402042', 'C12016'),
('161402043', 'A12016'),
('161402045', 'C12016'),
('161402046', 'A12016'),
('161402047', 'B12016'),
('161402048', 'C12016'),
('161402049', 'A12016'),
('161402050', 'B12016'),
('161402051', 'C12016'),
('161402053', 'B12016'),
('161402054', 'C12016'),
('161402055', 'A12016'),
('161402056', 'B12016'),
('161402057', 'C12016'),
('161402058', 'A12016'),
('161402059', 'B12016'),
('161402060', 'C12016'),
('161402061', 'A12016'),
('161402062', 'B12016'),
('161402063', 'C12016'),
('161402064', 'A12016'),
('161402065', 'B12016'),
('161402066', 'C12016'),
('161402067', 'A12016'),
('161402068', 'B12016'),
('161402069', 'C12016'),
('161402070', 'A12016'),
('161402071', 'B12016'),
('161402072', 'C12016'),
('161402073', 'A12016'),
('161402075', 'C12016'),
('161402076', 'A22016'),
('161402077', 'B12016'),
('161402078', 'C22016'),
('161402079', 'A22016'),
('161402080', 'B22016'),
('161402081', 'C22016'),
('161402082', 'A22016'),
('161402083', 'B22016'),
('161402084', 'C22016'),
('161402085', 'A22016'),
('161402086', 'B22016'),
('161402087', 'C22016'),
('161402088', 'A22016'),
('161402089', 'B22016'),
('161402090', 'C22016'),
('161402091', 'A22016'),
('161402093', 'C22016'),
('161402094', 'A22016'),
('161402095', 'B22016'),
('161402096', 'C22016'),
('161402097', 'A22016'),
('161402098', 'B22016'),
('161402099', 'C22016'),
('161402100', 'A22016'),
('161402101', 'B22016'),
('161402103', 'A22016'),
('161402104', 'B22016'),
('161402105', 'C22016'),
('161402106', 'A22016'),
('161402107', 'B22016'),
('161402108', 'C22016'),
('161402109', 'A22016'),
('161402110', 'B22016'),
('161402111', 'C22016'),
('161402112', 'A22016'),
('161402114', 'C22016'),
('161402115', 'A22016'),
('161402116', 'B22016'),
('161402117', 'C22016'),
('161402118', 'A22016'),
('161402119', 'B22016'),
('161402120', 'C22016'),
('161402121', 'A22016'),
('161402122', 'B22016'),
('161402124', 'A22016'),
('161402125', 'B22016'),
('161402126', 'C22016'),
('161402127', 'A22016'),
('161402128', 'B22016'),
('161402129', 'C22016'),
('161402130', 'A22016'),
('161402131', 'B22016'),
('161402133', 'A22016'),
('161402134', 'B22016'),
('161402135', 'C22016'),
('161402137', 'B22016'),
('161402138', 'C22016'),
('161402139', 'A22016'),
('161402140', 'B22016'),
('161402141', 'C22016'),
('161402142', 'A22016'),
('161402143', 'B22016'),
('161402144', 'C22016'),
('161402145', 'A22016'),
('161402146', 'B22016'),
('151402001', 'A12015'),
('151402002', 'B12015'),
('151402003', 'C12015'),
('151402004', 'A12015'),
('151402005', 'B12015'),
('151402006', 'C12015'),
('151402007', 'A12015'),
('151402008', 'B12015'),
('151402009', 'C12015'),
('151402010', 'A12015'),
('151402011', 'B12015'),
('151402012', 'C12015'),
('151402013', 'A12015'),
('151402014', 'B12015'),
('151402015', 'C12015'),
('151402016', 'A12015'),
('151402017', 'B12015'),
('151402018', 'C12015'),
('151402019', 'A12015'),
('151402020', 'B12015'),
('151402021', 'C12015'),
('151402022', 'A12015'),
('151402023', 'B12015'),
('151402024', 'C12015'),
('151402025', 'A12015'),
('151402026', 'B12015'),
('151402027', 'C12015'),
('151402028', 'A12015'),
('151402029', 'B12015'),
('151402030', 'C12015'),
('151402031', 'A12015'),
('151402032', 'B12015'),
('151402033', 'C12015'),
('151402034', 'A12015'),
('151402035', 'B12015'),
('151402036', 'C12015'),
('151402037', 'A12015'),
('151402038', 'B12015'),
('151402039', 'C12015'),
('151402040', 'A12015'),
('151402041', 'B12015'),
('151402042', 'C12015'),
('151402043', 'A12015'),
('151402044', 'B12015'),
('151402045', 'C12015'),
('151402046', 'A12015'),
('151402047', 'B12015'),
('151402048', 'C12015'),
('151402049', 'A12015'),
('151402050', 'B12015'),
('151402051', 'C12015'),
('151402052', 'A12015'),
('151402053', 'B12015'),
('151402054', 'C12015'),
('151402055', 'A12015'),
('151402056', 'B12015'),
('151402057', 'C12015'),
('151402058', 'A12015'),
('151402059', 'B12015'),
('151402061', 'A12015'),
('151402062', 'B12015'),
('151402063', 'C12015'),
('151402064', 'A12015'),
('151402065', 'B12015'),
('151402066', 'C12015'),
('151402067', 'A12015'),
('151402068', 'B12015'),
('151402069', 'C12015'),
('151402070', 'A12015'),
('151402071', 'B12015'),
('151402074', 'B22015'),
('151402075', 'C12015'),
('151402076', 'A22015'),
('151402077', 'B22015'),
('151402078', 'C12015'),
('151402079', 'A22015'),
('151402080', 'B22015'),
('151402081', 'C22015'),
('151402082', 'A22015'),
('151402083', 'B22015'),
('151402084', 'C22015'),
('151402087', 'C22015'),
('151402088', 'A22015'),
('151402089', 'B22015'),
('151402090', 'C22015'),
('151402091', 'A22015'),
('151402092', 'B22015'),
('151402093', 'C22015'),
('151402095', 'B22015'),
('151402096', 'C22015'),
('151402097', 'A22015'),
('151402098', 'B22015'),
('151402099', 'C22015'),
('151402101', 'B22015'),
('151402103', 'A22015'),
('151402104', 'B22015'),
('151402105', 'C22015'),
('151402106', 'A22015'),
('151402108', 'C22015'),
('151402109', 'A22015'),
('151402110', 'B22015'),
('151402111', 'C22015'),
('151402115', 'A22015'),
('151402116', 'B22015'),
('151402117', 'C22015'),
('151402118', 'A22015'),
('151402119', 'B22015'),
('151402120', 'C22015'),
('151402122', 'B22015'),
('151402123', 'C22015'),
('151402124', 'A22015'),
('151402125', 'B22015'),
('151402126', 'C22015'),
('151402127', 'A22015'),
('151402128', 'B22015'),
('151402129', 'C22015'),
('151402130', 'A22015'),
('151402131', 'B22015'),
('151402132', 'C22015'),
('151402134', 'B22015'),
('151402136', 'A22015'),
('151402137', 'B22015'),
('151402138', 'C22015');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_lab`
--

CREATE TABLE `kepala_lab` (
  `user_id` int(11) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_lab`
--

INSERT INTO `kepala_lab` (`user_id`, `nidn`, `id_ruang`) VALUES
(4, '0031087905', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `id_superlab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_lab`, `nama_lab`, `id_superlab`) VALUES
(1, 'Lab SDA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_prodi`
--

CREATE TABLE `lab_prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_aset`
--

CREATE TABLE `lokasi_aset` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_aset`
--

INSERT INTO `lokasi_aset` (`id_ruang`, `nama_ruang`, `kode_prodi`) VALUES
(1, 'Database', '1402'),
(2, 'Multimedia', '1402');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `kode_prodi`) VALUES
('151402001', 'Surya Permana Putra', 2015, '1402'),
('151402002', 'Shifani Adriani Ch.', 2015, '1402'),
('151402003', 'Sandy Pradana', 2015, '1402'),
('151402004', 'Sarifah Farrah Fadillah', 2015, '1402'),
('151402005', 'Muhammad Rizki Syahputra Nst', 2015, '1402'),
('151402006', 'Ayu Dwi Rizky', 2015, '1402'),
('151402007', 'Muhammad Ravie', 2015, '1402'),
('151402008', 'Septian Dwicahya Saragih', 2015, '1402'),
('151402009', 'Grace Lusiana Siregar', 2015, '1402'),
('151402010', 'Riska Amaliyah', 2015, '1402'),
('151402011', 'Mia Rahma Ditha Nasution', 2015, '1402'),
('151402012', 'Adinda Gita Mehuli Br Ginting', 2015, '1402'),
('151402013', 'Zuhroh Nilakandi Maulida Adind', 2015, '1402'),
('151402014', 'Muhammad Ilham Rizky', 2015, '1402'),
('151402015', 'Hizkia Tarigan', 2015, '1402'),
('151402016', 'Rhama Permadi Ahmad', 2015, '1402'),
('151402017', 'Tata Feraro Mukarram', 2015, '1402'),
('151402018', 'Riyandi Syahputra', 2015, '1402'),
('151402019', 'Firza Rinandha Nst', 2015, '1402'),
('151402020', 'Muhammad Ari Winata', 2015, '1402'),
('151402021', 'Putri Ramadannia', 2015, '1402'),
('151402022', 'Rizki Sari Dewi', 2015, '1402'),
('151402023', 'Winda Indriani Tanjung', 2015, '1402'),
('151402024', 'M.Taufik Kamil', 2015, '1402'),
('151402025', 'Yuri Savira Ramadhani', 2015, '1402'),
('151402026', 'Retno Maulina', 2015, '1402'),
('151402027', 'Fitri Khairani', 2015, '1402'),
('151402028', 'Ari Dandi Utama Siregar', 2015, '1402'),
('151402029', 'Muhammad Fahmi', 2015, '1402'),
('151402030', 'Desi Fiolita', 2015, '1402'),
('151402031', 'Ayu Zahara Sumantri', 2015, '1402'),
('151402032', 'Rany Ervina Gultom', 2015, '1402'),
('151402033', 'Dizka Ramadani', 2015, '1402'),
('151402034', 'Afdhalul Ihsan Nasution', 2015, '1402'),
('151402035', 'Nurdiana Rizka', 2015, '1402'),
('151402036', 'Sahila Amrina', 2015, '1402'),
('151402037', 'Yolanda Maulina Sari', 2015, '1402'),
('151402038', 'Thomy Fauzy Rayendra Nst', 2015, '1402'),
('151402039', 'Kiki Nuraini Ginting', 2015, '1402'),
('151402040', 'Diana Wulandari', 2015, '1402'),
('151402041', 'Intan Octavia Ginting', 2015, '1402'),
('151402042', 'Luhur Budi Prayogo', 2015, '1402'),
('151402043', 'Anjas Subhanuari', 2015, '1402'),
('151402044', 'Ryan Fachrozy', 2015, '1402'),
('151402045', 'Trisna Ira Novasari', 2015, '1402'),
('151402046', 'Muhammad Aulia Ramadhan Nasuti', 2015, '1402'),
('151402047', 'Silvia Clara Dewi Meliala', 2015, '1402'),
('151402048', 'Muhammad Fadhil Lubis', 2015, '1402'),
('151402049', 'Nisfa Fitri Pratiwi', 2015, '1402'),
('151402050', 'Fairuz Raniah Elfaz', 2015, '1402'),
('151402051', 'Najihah Silmi Lubis', 2015, '1402'),
('151402052', 'Rahayu Pradaning', 2015, '1402'),
('151402053', 'Bayu Prabowo', 2015, '1402'),
('151402054', 'Rizki Indah Pratiwi Siagian', 2015, '1402'),
('151402055', 'Nurmala Sari Ruslan', 2015, '1402'),
('151402056', 'Ferdinan Mulyanto', 2015, '1402'),
('151402057', 'Agus Satrio', 2015, '1402'),
('151402058', 'Rusnai Rahayu', 2015, '1402'),
('151402059', 'Noudika Aura Lubis', 2015, '1402'),
('151402061', 'Ray Leonardo Ginting', 2015, '1402'),
('151402062', 'Amherstia Fazira Kanza', 2015, '1402'),
('151402063', 'Lisa Arraufah', 2015, '1402'),
('151402064', 'Sindi Lioni Aritonang', 2015, '1402'),
('151402065', 'Luqmanul Hakim', 2015, '1402'),
('151402066', 'Marissa Dinda Audia Abdul Mukt', 2015, '1402'),
('151402067', 'Mita Tri Mulyani', 2015, '1402'),
('151402068', 'Rezkinah Rambe', 2015, '1402'),
('151402069', 'M. Hanafi Azra Arif', 2015, '1402'),
('151402070', 'Tika Anjulina Manik', 2015, '1402'),
('151402071', 'Aufa Munzir', 2015, '1402'),
('151402074', 'TAMA GUNA NAINGGOLAN', 2015, '1402'),
('151402075', 'FARIS ZHARFAN ALIF', 2015, '1402'),
('151402076', 'VIRLIANSI ADRISA UTAMI', 2015, '1402'),
('151402077', 'KELVIN PACHIRA TANDI', 2015, '1402'),
('151402078', 'WILLY MARDIANTO', 2015, '1402'),
('151402079', 'FENTA GRATA', 2015, '1402'),
('151402080', 'FRANSISKA KIRANA', 2015, '1402'),
('151402081', 'MUHAMMAD ARKA KHARISMA', 2015, '1402'),
('151402082', 'RESI MUHAMMAD Z.P', 2015, '1402'),
('151402083', 'ZEHESKIEL SEMBIRING', 2015, '1402'),
('151402084', 'NICOLAS LOJIE', 2015, '1402'),
('151402087', 'DENNY KURNIAWAN', 2015, '1402'),
('151402088', 'HANAFI', 2015, '1402'),
('151402089', 'YUSUF RAJA TAMBA', 2015, '1402'),
('151402090', 'HADI ADRIANSYAH', 2015, '1402'),
('151402091', 'FARHAN SINDY', 2015, '1402'),
('151402092', 'REZA DHIA ULHAQ', 2015, '1402'),
('151402093', 'ADIPUTRA SINAGA', 2015, '1402'),
('151402095', 'ANGGA SUBARU HUTAGAOL', 2015, '1402'),
('151402096', 'SELVINA RETLY YUANDA', 2015, '1402'),
('151402097', 'SILVIA MAWARNI', 2015, '1402'),
('151402098', 'RASKA ALMASHURA', 2015, '1402'),
('151402099', 'DODY PRASKA JAYA', 2015, '1402'),
('151402101', 'ALYAD ULYA IMAN', 2015, '1402'),
('151402103', 'PUTRI FILDZAH SAFIRAH', 2015, '1402'),
('151402104', 'JEREMY DOSDO PURBA', 2015, '1402'),
('151402105', 'ARIF RAHMAN HAKIM', 2015, '1402'),
('151402106', 'KEVIN NATANAEL PURBA', 2015, '1402'),
('151402108', 'AAN CHRISTIAN PRANATA', 2015, '1402'),
('151402109', 'MARIA MAGDALENA SIMAMORA', 2015, '1402'),
('151402110', 'LASTRI DEBORA SITORUS', 2015, '1402'),
('151402111', 'MUHAMMAD IQBAL FAJAR', 2015, '1402'),
('151402115', 'MUHAMMAD ANDI YUSRAN', 2015, '1402'),
('151402116', 'ANNADYA RIFANI SINAGA', 2015, '1402'),
('151402117', 'MUHAMMAD RIZWAN ANFA', 2015, '1402'),
('151402118', 'MUHAMMAD FARIS', 2015, '1402'),
('151402119', 'FADHLI MUHAMMAD', 2015, '1402'),
('151402120', 'DIANA SYAFIRA', 2015, '1402'),
('151402122', 'DHANY DWI S M', 2015, '1402'),
('151402123', 'M DHEAN FAUZAN', 2015, '1402'),
('151402124', 'INDIRWAN IHSAN HSB', 2015, '1402'),
('151402125', 'PUTRI ADINA', 2015, '1402'),
('151402126', 'KEVIN CHRISTOPER A', 2015, '1402'),
('151402127', 'HOTNIDA MEGAWATY M', 2015, '1402'),
('151402128', 'M HADYURRAHMAN', 2015, '1402'),
('151402129', 'YESI ANGRAINY', 2015, '1402'),
('151402130', 'MELISSA TRIXIE HUTAPEA', 2015, '1402'),
('151402131', 'NICO H SILALAHI', 2015, '1402'),
('151402132', 'HABIBI ALKHAIRI DLY', 2015, '1402'),
('151402134', 'EMIR AHMAD MUSTAFA', 2015, '1402'),
('151402136', 'SEKAR PUTRI ANYELIR', 2015, '1402'),
('151402137', 'KARINA BR TANGGANG', 2015, '1402'),
('151402138', 'MUHAMMAD SATTAR', 2015, '1402'),
('161402001', 'Leli Herma Yanti', 2016, '1402'),
('161402002', 'Hanna Rabitha Hasni', 2016, '1402'),
('161402003', 'Khairunnisa Husin Nasution', 2016, '1402'),
('161402004', 'Muhibuddin', 2016, '1402'),
('161402005', 'Desi B. Tambunan', 2016, '1402'),
('161402006', 'Reyhan Hafizt Harahap', 2016, '1402'),
('161402007', 'Ilham Kurnia Wahyudi Rusli', 2016, '1402'),
('161402008', 'Dewi Safrida Telambanua', 2016, '1402'),
('161402009', 'Dwi Arief Adityah', 2016, '1402'),
('161402010', 'Deddy F. Sihombing', 2016, '1402'),
('161402011', 'Elwin Duha', 2016, '1402'),
('161402012', 'Ikhwanul Khoir Pulungan', 2016, '1402'),
('161402013', 'Rizal Firdaus', 2016, '1402'),
('161402014', 'Khairunnisa Sitanggang', 2016, '1402'),
('161402015', 'Sri Kurnia Nurhikmah', 2016, '1402'),
('161402016', 'Hamzali', 2016, '1402'),
('161402017', 'Jhon Rendy Sortono', 2016, '1402'),
('161402018', 'Mujahid Akbar', 2016, '1402'),
('161402019', 'Muhammad Yuda Pratama', 2016, '1402'),
('161402020', 'Bora Sejati Siboro', 2016, '1402'),
('161402022', 'Feisal Fahmi', 2016, '1402'),
('161402023', 'Handita Mutia', 2016, '1402'),
('161402024', 'Widang Muttaqin', 2016, '1402'),
('161402025', 'Teguh Kirana Berutu', 2016, '1402'),
('161402026', 'Enike Dewinta Sembiring', 2016, '1402'),
('161402027', 'Fitri Nanda Yani', 2016, '1402'),
('161402028', 'Febria Sahrina', 2016, '1402'),
('161402029', 'Ilham Syahputra', 2016, '1402'),
('161402030', 'Ruth Irene Pasaribu', 2016, '1402'),
('161402031', 'Cici Paramita', 2016, '1402'),
('161402032', 'M. Ramzi Khauri', 2016, '1402'),
('161402033', 'Fachry Muhamad Anantama Tariga', 2016, '1402'),
('161402034', 'Harry Islami Habibi Silalahi', 2016, '1402'),
('161402035', 'Bayu Aji Nurmansah', 2016, '1402'),
('161402036', 'Hanisa Fauziani', 2016, '1402'),
('161402037', 'Syawaldi Ilham', 2016, '1402'),
('161402038', 'Bayu Prasetyo', 2016, '1402'),
('161402039', 'Annisa Ardina', 2016, '1402'),
('161402040', 'Maryani', 2016, '1402'),
('161402041', 'Gabriela Dwi Lady Br. Sembirin', 2016, '1402'),
('161402042', 'Sutan Mahalalel Ritonga', 2016, '1402'),
('161402043', 'Pentari Trimita Pakpahan', 2016, '1402'),
('161402045', 'Sonia Elisa Telaumbanua', 2016, '1402'),
('161402046', 'Evanson Sihotang', 2016, '1402'),
('161402047', 'Haryati', 2016, '1402'),
('161402048', 'Boby Kurniawan', 2016, '1402'),
('161402049', 'Ramadhan Pratama Putra', 2016, '1402'),
('161402050', 'Mayang Dyah Azurah', 2016, '1402'),
('161402051', 'Nofri Lasmarito Sianturi', 2016, '1402'),
('161402053', 'Rizki Wallige Purba', 2016, '1402'),
('161402054', 'Mauriza Hidayatush Shaliha Sel', 2016, '1402'),
('161402055', 'Renata Padang', 2016, '1402'),
('161402056', 'MUHAMMAD FAUZI MASAHIRO MUNTHE', 2016, '1402'),
('161402057', 'MUHAMMAD ARIF AZIZI', 2016, '1402'),
('161402058', 'TIMOTHY CHRISTIAN PUTRA', 2016, '1402'),
('161402059', 'SAHAT GEBIMA SIHOTANG', 2016, '1402'),
('161402060', 'DESSY ATIKA', 2016, '1402'),
('161402061', 'RAFIKA LUMONGGA PURBA', 2016, '1402'),
('161402062', 'MUHAMMAD ALISIRAJ FACHREZA SIR', 2016, '1402'),
('161402063', 'HARI PURNOMO AJI', 2016, '1402'),
('161402064', 'DIDI SEPTIAWAN LUBIS', 2016, '1402'),
('161402065', 'ALDO STEPANUS SIMARMATA', 2016, '1402'),
('161402066', 'MUHAMMAD RAIHAN', 2016, '1402'),
('161402067', 'RAY SYADERA LINGGA', 2016, '1402'),
('161402068', 'AUDRY WELVIRA', 2016, '1402'),
('161402069', 'RUNGGU CARI SIANTURI', 2016, '1402'),
('161402070', 'DIRAWATI SIANTURI', 2016, '1402'),
('161402071', 'YOSEPIN KAWALTA GINTING', 2016, '1402'),
('161402072', 'NOVIA MARITO', 2016, '1402'),
('161402073', 'STEVEN LEONARDY', 2016, '1402'),
('161402075', 'JOSEPRI PADANG', 2016, '1402'),
('161402076', 'CREDICHIO REDEMTUS TUA SIHOMBI', 2016, '1402'),
('161402077', 'NOVALINA SIMBOLON', 2016, '1402'),
('161402078', 'YASMIN NABILAH DETA', 2016, '1402'),
('161402079', 'T.AHSANI TAQWIM WIRAZAMAN  A.', 2016, '1402'),
('161402080', 'MARISA RAUDIAH', 2016, '1402'),
('161402081', 'RAHMAD AULIA P.B.P NASUTION', 2016, '1402'),
('161402082', 'INDANA FARIZA HIDAYAT', 2016, '1402'),
('161402083', 'ANWAR IRAWAN MENDROFA', 2016, '1402'),
('161402084', 'RIKI RAMADHAN SYAHPUTRA', 2016, '1402'),
('161402085', 'M.ROMZI HUMAM', 2016, '1402'),
('161402086', 'M. YUDHA KURNIAWAN', 2016, '1402'),
('161402087', 'TALITHA AZURA PUTRI AULIA', 2016, '1402'),
('161402088', 'ANDINI PRATIWI', 2016, '1402'),
('161402089', 'MUHAMMAD FADLI', 2016, '1402'),
('161402090', 'MIKHAEL ELIFELE NAPITUPULU', 2016, '1402'),
('161402091', 'SAMUEL TARIO SITEPU', 2016, '1402'),
('161402093', 'HAGEL BAGUSTIAWAN S', 2016, '1402'),
('161402094', 'GISTYA FAKHRANI', 2016, '1402'),
('161402095', 'RAY HANDRI KESUMA SINAGA', 2016, '1402'),
('161402096', 'MELATI ANASTASYA', 2016, '1402'),
('161402097', 'RINA AYU WULAN SARI', 2016, '1402'),
('161402098', 'YOSEPH HENDRIKS SIRINGORINGO', 2016, '1402'),
('161402099', 'JESSICA', 2016, '1402'),
('161402100', 'SINTA ANJELINA', 2016, '1402'),
('161402101', 'CHYNTIA CLAUDIA', 2016, '1402'),
('161402103', 'MICHAEL YAFDA MARBUN', 2016, '1402'),
('161402104', 'MUHAMMAD IMAM AL-AMIN', 2016, '1402'),
('161402105', 'DEDY SAPUTRA SIREGAR', 2016, '1402'),
('161402106', 'EMMANUELLA ANGGI SIALLAGAN', 2016, '1402'),
('161402107', 'SYARIFAH ATIKA', 2016, '1402'),
('161402108', 'RANDI EKKLESIA GINTING', 2016, '1402'),
('161402109', 'YUDHA PANDU PERKASA', 2016, '1402'),
('161402110', 'TIRZA PRISKILA KINANTI SIBUEA', 2016, '1402'),
('161402111', 'AMANDA NOVIADHINI', 2016, '1402'),
('161402112', 'DINA TYA ERAWATI SITUMORANG', 2016, '1402'),
('161402114', 'FAHDI SAIDI LUBIS', 2016, '1402'),
('161402115', 'PHILIP HALOMOAN SIMAMORA', 2016, '1402'),
('161402116', 'MUHAMMAD REZA IRSYAD HARAHAP', 2016, '1402'),
('161402117', 'AMALIA KHAIRINA', 2016, '1402'),
('161402118', 'DEA AMANDA', 2016, '1402'),
('161402119', 'HADHE PANJI KASTOWO', 2016, '1402'),
('161402120', 'FITRIA ADINE YASMINE BELINDA', 2016, '1402'),
('161402121', 'BARNABAS JIAN VENTUS SITUMORAN', 2016, '1402'),
('161402122', 'SARAH CHARISA YOSEPHIN PASARIB', 2016, '1402'),
('161402124', 'RAHMADHITA TRI MU ARIFAH', 2016, '1402'),
('161402125', 'MUHAMMAD TEGUH SYAHVIRA NASUTI', 2016, '1402'),
('161402126', 'JISRON MALIK', 2016, '1402'),
('161402127', 'PRATIWI ROHNOLA RESTU SINAMO', 2016, '1402'),
('161402128', 'LESTI REIHAN SIREGAR', 2016, '1402'),
('161402129', 'NADYA SARI DAMANIK', 2016, '1402'),
('161402130', 'YUNITA S MARITO PANE', 2016, '1402'),
('161402131', 'AGNES MANURUNG', 2016, '1402'),
('161402133', 'SONDANG TESALONIKA SIMANJUNTAK', 2016, '1402'),
('161402134', 'GRACE FLORENCE', 2016, '1402'),
('161402135', 'RAFLI AKBAR ARSYAD', 2016, '1402'),
('161402137', 'RICARDO RANDAL PANDIA', 2016, '1402'),
('161402138', 'LIANA PARAS MITA', 2016, '1402'),
('161402139', 'KORNELIUS ARDIANTA PURBA', 2016, '1402'),
('161402140', 'RIZKA YULIA RAHMI', 2016, '1402'),
('161402141', 'CHRISTINE PRISCILIA SIGALINGGI', 2016, '1402'),
('161402142', 'MUHAMMAD RAJAUL GHUFRAN', 2016, '1402'),
('161402143', 'GEBRIEL JULIENDI SITORUS', 2016, '1402'),
('161402144', 'JOHANNA AULIA', 2016, '1402'),
('161402145', 'SORAYA HUMAIRA', 2016, '1402'),
('161402146', 'ZICO ENRIQUE BUKIT', 2016, '1402'),
('171402001', 'Nadia Nasywa Lubis', 2017, '1402'),
('171402002', 'Grace Sella Br. Ginting', 2017, '1402'),
('171402003', 'FIFI ANGRENI BR.GTG', 2017, '1402'),
('171402004', 'Jackie Chandra', 2017, '1402'),
('171402005', 'Nabila Sagita', 2017, '1402'),
('171402006', 'Teddy Ferdinand Lubis', 2017, '1402'),
('171402007', 'Melati Yulvira Salsabila', 2017, '1402'),
('171402008', 'Lisa Ayuning Tias', 2017, '1402'),
('171402009', 'Miftah Aulia', 2017, '1402'),
('171402010', 'Adelia Salmah Siregar', 2017, '1402'),
('171402011', 'Nabila Azzahra', 2017, '1402'),
('171402012', 'Aflah Mutsanni Pulungan', 2017, '1402'),
('171402013', 'Rezky Febry Dawanti', 2017, '1402'),
('171402014', 'Muhammad Farras Siraj Polem', 2017, '1402'),
('171402015', 'M. Rizky Imanta Sitepu', 2017, '1402'),
('171402016', 'Tria Riskiani', 2017, '1402'),
('171402017', 'Muhammad Reza', 2017, '1402'),
('171402018', 'Farhan Abdillah', 2017, '1402'),
('171402019', 'Ali Hidayat', 2017, '1402'),
('171402020', 'Riyo Santo Yosep', 2017, '1402'),
('171402021', 'Rizki Noprianita', 2017, '1402'),
('171402022', 'Miranda Damayanti Rambe', 2017, '1402'),
('171402023', 'Muhammad Rizki Fatihah', 2017, '1402'),
('171402025', 'Ibnu Maulana', 2017, '1402'),
('171402026', 'Karmila Sinaga', 2017, '1402'),
('171402029', 'Indah Ramadani', 2017, '1402'),
('171402030', 'Taufiq Rourkyendo', 2017, '1402'),
('171402031', 'Imam Penggowo Darojatun Sufa', 2017, '1402'),
('171402032', 'Muhammad Wahyu Pratama', 2017, '1402'),
('171402033', 'DAISY SERE DAMARA SIMANGUNSONG', 2017, '1402'),
('171402034', 'Fadhilah Annisa', 2017, '1402'),
('171402035', 'Yusman Tri Klavier Banjarnahor', 2017, '1402'),
('171402036', 'Ari Rahmansyah Putra', 2017, '1402'),
('171402037', 'M. Rafif Rasyidi', 2017, '1402'),
('171402038', 'Winari Anggani', 2017, '1402'),
('171402039', 'Okky Nadiya', 2017, '1402'),
('171402041', 'Mhd. Amin', 2017, '1402'),
('171402042', 'Zakkarias Siringoringo', 2017, '1402'),
('171402043', 'Fakhri Rizha Ananda', 2017, '1402'),
('171402045', 'NIA ULAN SARI', 2017, '1402'),
('171402046', 'NURUL ANDINI', 2017, '1402'),
('171402047', 'BELLA OLIVIA PUTRISANNI', 2017, '1402'),
('171402048', 'ANNISA', 2017, '1402'),
('171402049', 'MIFTAH RAFID SYAHRIAL', 2017, '1402'),
('171402050', 'SYARFAN HASRIANSYAH M', 2017, '1402'),
('171402051', 'PRATTY JESICA PUTRI PARHUSIP', 2017, '1402'),
('171402052', 'ANANDA MUHARRIZ SINAGA', 2017, '1402'),
('171402053', 'MHD IRFAN FAJAR NST', 2017, '1402'),
('171402054', 'ARYA PRATAMA TARIGAN', 2017, '1402'),
('171402055', 'SULTAN ALAMSYAH PULUNGAN', 2017, '1402'),
('171402056', 'VARREL PRESTON HERMAN JR', 2017, '1402'),
('171402057', 'EKA KHAIRANI HUTAURUK', 2017, '1402'),
('171402058', 'MORIS MARTUA SORMIN', 2017, '1402'),
('171402059', 'FRANS RICKY RINALDY SAMOSIR', 2017, '1402'),
('171402061', 'FANI THERESA HUTABARAT', 2017, '1402'),
('171402062', 'FREDERIKO HUTAHAEAN', 2017, '1402'),
('171402064', 'ARLYN PAULUS TELAUMBANUA', 2017, '1402'),
('171402065', 'DEO PRANATA SILITONGA', 2017, '1402'),
('171402066', 'CHATARINA S FRANSISKA SAMOSIR', 2017, '1402'),
('171402067', 'MUHAMMAD BAYHAQI DAULAY', 2017, '1402'),
('171402068', 'MHD. SYAFRIANSYAH', 2017, '1402'),
('171402069', 'RIO PRATAMA KARO-KARO', 2017, '1402'),
('171402071', 'GILBERT SORAI ARO SIHURA', 2017, '1402'),
('171402072', 'ELTON EDROBELLO PAKPAHAN', 2017, '1402'),
('171402073', 'FAKHIRAH MENTAYA', 2017, '1402'),
('171402074', 'ARINDA BELLA PUTRI MANIK', 2017, '1402'),
('171402075', 'JAVIC ROTANSON', 2017, '1402'),
('171402076', 'JUWITA SARI', 2017, '1402'),
('171402077', 'MAULANA PRAMISYA RAMADHAN', 2017, '1402'),
('171402079', 'AYU LAILA BR. HUTAGALUNG', 2017, '1402'),
('171402080', 'VANIA PUTRI SARYANDRA', 2017, '1402'),
('171402081', 'AHMAD ADIL', 2017, '1402'),
('171402082', 'FAHMI RIZAL', 2017, '1402'),
('171402083', 'TALITHA ASHVI RAYHAN', 2017, '1402'),
('171402084', 'EKA WULANDARI', 2017, '1402'),
('171402085', 'NADIA SITI NAMIRA', 2017, '1402'),
('171402086', 'M. TAUFIK BASKORO', 2017, '1402'),
('171402087', 'ARSIL NUGRAHA', 2017, '1402'),
('171402088', 'ARVALINNO', 2017, '1402'),
('171402089', 'ALVIN FEBRIANDO', 2017, '1402'),
('171402090', 'MUHAMMAD BAGUS SYAHPUTRA TAMBU', 2017, '1402'),
('171402092', 'MUHAMMAD ULWAN AZMI', 2017, '1402'),
('171402094', 'MHD EGGIA SEBAYANG', 2017, '1402'),
('171402095', 'RIZKI AMANDA PUTRI', 2017, '1402'),
('171402096', 'AGUS FERNANDO NAINGGOLAN', 2017, '1402'),
('171402097', 'DINUL IMAN', 2017, '1402'),
('171402099', 'RIO ADITYA', 2017, '1402'),
('171402100', 'JESSIE GABRIELLA SILALAHI', 2017, '1402'),
('171402101', 'ALWI ARFIZEIN LUBIS', 2017, '1402'),
('171402102', 'MERRY VIERCE PURBA', 2017, '1402'),
('171402103', 'VINCENSIUS SIMANJUNTAK', 2017, '1402'),
('171402104', 'AZMITHA AZNI', 2017, '1402'),
('171402105', 'SOPHIA NOLA AMANDA OTTASIO BIN', 2017, '1402'),
('171402106', 'JONATHAN SIMANJUNTAK', 2017, '1402'),
('171402107', 'ALFI RAYHANANDA', 2017, '1402'),
('171402108', 'GEUBRIE ROSANNA', 2017, '1402'),
('171402109', 'NAUFAL AZMI', 2017, '1402'),
('171402110', 'JOSHUA ANDREW IMMANUEL', 2017, '1402'),
('171402111', 'DHAFFA SAFIRA AYURA', 2017, '1402'),
('171402112', 'M IHSAN MAULANA', 2017, '1402'),
('171402113', 'FIRDA MEGA TASYA SIREGAR', 2017, '1402'),
('171402114', 'YUNI SONIA SILALAHI', 2017, '1402'),
('171402115', 'MUHAMMAD REZKY LUBIS', 2017, '1402'),
('171402116', 'DINDA CARLISA SURBAKTI', 2017, '1402'),
('171402117', 'ANNISA ASSYA MAWADDAH', 2017, '1402'),
('171402118', 'NUR ATIKAH KARIM LUBIS', 2017, '1402'),
('171402119', 'LENNY BR LUMBAN TOBING', 2017, '1402'),
('171402120', 'MAJIDAH ATMAYANA PURBA', 2017, '1402'),
('171402121', 'DESTRI CELCYLIA SILITONGA', 2017, '1402'),
('171402122', 'MUHAMMAD BAIHAQI', 2017, '1402'),
('171402123', 'YUAN SENARI JP SITEPU', 2017, '1402'),
('171402125', 'ARNESA JULIA DAMANIK', 2017, '1402'),
('171402126', 'WID YA ANGGI PRATIWI', 2017, '1402'),
('171402127', 'LEONARDO HALOMOAN SIADARI', 2017, '1402'),
('171402128', 'MELLY MANURUNG', 2017, '1402'),
('171402129', 'AIDA SURYANA RITONGA', 2017, '1402'),
('171402130', 'TARUNA PRAYANTA ABADI TARIGAN', 2017, '1402'),
('171402131', 'DICKY ARWANDA PUTRA MELIALA', 2017, '1402'),
('171402132', 'MURNI ANGGELINA DEBATARAJA', 2017, '1402'),
('171402133', 'MILINDA KIRANA BR SEMBIRING', 2017, '1402'),
('171402134', 'ADE RIZKY', 2017, '1402'),
('171402135', 'HARI IHZA HERLAMBANG', 2017, '1402'),
('171402136', 'ALLEN DAVIS JHONATHAN TAMPUBOL', 2017, '1402'),
('171402137', 'TAMA TAMPUBOLON', 2017, '1402'),
('171402138', 'ROGATE SOLA FIDE', 2017, '1402'),
('171402139', 'INDI TRI UTAMI BATUBARA', 2017, '1402'),
('171402140', 'PRIMA JULAWAL HARTANTA SURBAKT', 2017, '1402'),
('171402141', 'FEBRY FERNANDO LUBIS', 2017, '1402'),
('171402142', 'RAMHEVELIO ADVENDEZ TARIGAN', 2017, '1402'),
('171402143', 'THEODORA RINI KETAREN', 2017, '1402'),
('171402144', 'BELLA SAVIRA', 2017, '1402'),
('171402145', 'YUSRIANTONI', 2017, '1402'),
('171402146', 'YONADHAB PRANATA COKROAMINOTO ', 2017, '1402'),
('171402147', 'MUHAMMAD FAJAR HARAHAP', 2017, '1402'),
('171402148', 'Nuraini', 2017, '1402'),
('171402149', 'Aldo Yermisanto Ndun', 2017, '1402'),
('171402150', 'Ariel Febrian', 2017, '1402'),
('171402151', 'ALLIA RANIA', 2017, '1402'),
('181402001', 'Zhafar Salim', 2018, '1402'),
('181402002', 'Muhammad Ridho', 2018, '1402'),
('181402003', 'Ammar Rafi Afandi Hasibuan', 2018, '1402'),
('181402004', 'Muhammad Arib Naufal Marpaung', 2018, '1402'),
('181402005', 'Farhan Al Zuhri Nasution', 2018, '1402'),
('181402006', 'Nurhaliza Syahfitri', 2018, '1402'),
('181402007', 'LIZA SILVANI SUHERI', 2018, '1402'),
('181402008', 'ALYA FEBRIANI LUBIS', 2018, '1402'),
('181402009', 'Amira Nurul Amanda', 2018, '1402'),
('181402010', 'M HAIKAL ALFANSYAH', 2018, '1402'),
('181402011', 'MHD. ALIF FAHMI', 2018, '1402'),
('181402012', 'Muhammad Irsan Maulana', 2018, '1402'),
('181402013', 'Putri Permata Sari', 2018, '1402'),
('181402014', 'PUTRI HANDAYANI MALIK PARINDUR', 2018, '1402'),
('181402015', 'NADIA FARHANI', 2018, '1402'),
('181402016', 'Alya Ananda', 2018, '1402'),
('181402017', 'YEYEN KRISNIANTA TARIGAN', 2018, '1402'),
('181402018', 'LOLYVIA KHOIRIA DLY', 2018, '1402'),
('181402019', 'Claudia Demita Pasaribu', 2018, '1402'),
('181402020', 'Yesika Reni Siregar', 2018, '1402'),
('181402021', 'RIRIS G.S. GULTOM', 2018, '1402'),
('181402022', 'Astrid Melani Nainggolan', 2018, '1402'),
('181402023', 'PUTRI NATASYA', 2018, '1402'),
('181402024', 'SHELLI ATHAYA', 2018, '1402'),
('181402025', 'Alvisyahrin', 2018, '1402'),
('181402026', 'MHD ARIF PATI PERDANA LUBIS', 2018, '1402'),
('181402027', 'Dimas Ridian Supardi', 2018, '1402'),
('181402028', 'ZUHRI ALIM', 2018, '1402'),
('181402029', 'FIRDHA ISLY RAMADHANI', 2018, '1402'),
('181402030', 'FADEL MAJID MUHAMMAD', 2018, '1402'),
('181402031', 'GARY ALVARO', 2018, '1402'),
('181402032', 'muhammad daifullah', 2018, '1402'),
('181402033', 'Indah Syahputri', 2018, '1402'),
('181402034', 'Muhammad Ridwan Syahputra', 2018, '1402'),
('181402035', 'MITA AMELIA', 2018, '1402'),
('181402036', 'SITI RAHMA YANI', 2018, '1402'),
('181402037', 'KHAIRUNNISA', 2018, '1402'),
('181402038', 'Risqina Rahayu Ramadhani', 2018, '1402'),
('181402039', 'Nabilah Luthfiyah Nasution', 2018, '1402'),
('181402040', 'RAMADHANI', 2018, '1402'),
('181402041', 'FUJI ALITA', 2018, '1402'),
('181402042', 'MUHAMMAD TAUFIQ HIDAYAT', 2018, '1402'),
('181402043', 'MUKHSALMINA', 2018, '1402'),
('181402044', 'Hafiza Azhar', 2018, '1402'),
('181402045', 'ARYA AHMAD DIANSYAH', 2018, '1402'),
('181402046', 'PUTRA MULIA RIZKY SELIAN', 2018, '1402'),
('181402047', 'MICHELLE CHRISTINE NATALIA PAR', 2018, '1402'),
('181402048', 'M BAGOES PRASTYA', 2018, '1402'),
('181402049', 'ANGELI RINAWATI SILABAN', 2018, '1402'),
('181402050', 'NALDO YOHARDI', 2018, '1402'),
('181402051', 'ALBERT', 2018, '1402'),
('181402052', 'LUIS', 2018, '1402'),
('181402053', 'SORAYA FARIHA', 2018, '1402'),
('181402054', 'ALVIN DAELI', 2018, '1402'),
('181402055', 'LEONARDO WIJAYA', 2018, '1402'),
('181402056', 'HELMUT SHARON PAKPAHAN', 2018, '1402'),
('181402057', 'ULI VALEN HASIANI SINAGA', 2018, '1402'),
('181402058', 'INDRIYANI BR SEMBIRING', 2018, '1402'),
('181402059', 'JEBRI WALYA DEFIT', 2018, '1402'),
('181402060', 'TIMOTHY SEBASTIAN MARBUN', 2018, '1402'),
('181402061', 'ENDITY WASITA ANGKASA', 2018, '1402'),
('181402062', 'YULIA CITRA WARDANI', 2018, '1402'),
('181402063', 'DARIUS JASPER MANGARAJAI SIMAM', 2018, '1402'),
('181402064', 'XIXILLIA SUNARYO', 2018, '1402'),
('181402065', 'WILLIAM YUHANDINATA', 2018, '1402'),
('181402066', 'JIMMY WIDIANTO', 2018, '1402'),
('181402067', 'INRY CHELSEA ANIL S', 2018, '1402'),
('181402068', 'MHD. LUTHFI YANDIRSYA', 2018, '1402'),
('181402069', 'HAFIZH RAFI MUHAMMAD', 2018, '1402'),
('181402070', 'TRI PUTRA', 2018, '1402'),
('181402071', 'YOLENTA PANGGABEAN', 2018, '1402'),
('181402072', 'JANRIAN N SIMBOLON', 2018, '1402'),
('181402073', 'RAHMA RAHMAH', 2018, '1402'),
('181402074', 'ALDRICH WILLIAM CHOALES', 2018, '1402'),
('181402075', 'RUTH CALISTA PAULINA SIANIPAR', 2018, '1402'),
('181402076', 'INDAH', 2018, '1402'),
('181402077', 'ABHI RYAN P', 2018, '1402'),
('181402078', 'M ALI AKBAR SINAGA', 2018, '1402'),
('181402079', 'YOEL HEZRON PAULITUA SIMARMATA', 2018, '1402'),
('181402080', 'CUT NASYWA YUMNA', 2018, '1402'),
('181402081', 'JOYFULL MARTUPA BANJARNAHOR', 2018, '1402'),
('181402082', 'SUCI KHAIRIAH', 2018, '1402'),
('181402083', 'ERIC SAMUEL SIMBOLON', 2018, '1402'),
('181402084', 'ANDRIAN SEBAYANG', 2018, '1402'),
('181402085', 'MOHAMAD NIZAM', 2018, '1402'),
('181402086', 'MUHAMMAD ELDWIN PASARIBU', 2018, '1402'),
('181402087', 'TIARA AMALIA', 2018, '1402'),
('181402088', 'RINI HARYATI', 2018, '1402'),
('181402089', 'MONIKA LAURENSIA PASARIBU', 2018, '1402'),
('181402090', 'KARINA PUTRI KABAN', 2018, '1402'),
('181402091', 'DAVID BACHTIAR SIMBOLON', 2018, '1402'),
('181402092', 'ZAKI AFIFI', 2018, '1402'),
('181402093', 'IAN ARIESSA SITORUS', 2018, '1402'),
('181402094', 'FIQRI M ZUHAIR POHAN', 2018, '1402'),
('181402095', 'ALASKA NAPITUPULU', 2018, '1402'),
('181402096', 'DANIEL BAGINDA HASOLOAN MARPAU', 2018, '1402'),
('181402097', 'LELY ANJALI SIMARMATA', 2018, '1402'),
('181402098', 'MUHAMMAD ANGGORO KERIS BIMANTO', 2018, '1402'),
('181402099', 'RASYID HAFIZ', 2018, '1402'),
('181402100', 'HARI DARMAWAN', 2018, '1402'),
('181402101', 'KEVIN PATRICK LEE', 2018, '1402'),
('181402102', 'MUHAMMAD KHAFFI IRWAN', 2018, '1402'),
('181402103', 'ARI PRIMA PANDIANGAN', 2018, '1402'),
('181402104', 'SINTYA VERONICA ROTUA MUNTHE', 2018, '1402'),
('181402105', 'DIMAS NUGRAHA', 2018, '1402'),
('181402106', 'HANDIKA RIYANDAR', 2018, '1402'),
('181402107', 'HABIB GHAZALI SIBARANI', 2018, '1402'),
('181402108', 'SASDINDAH MANURUNG', 2018, '1402'),
('181402109', 'JESSICA DORINDA SIMANJUNTAK', 2018, '1402'),
('181402110', 'MUHAMMAD ZAID MUKSHIT', 2018, '1402'),
('181402111', 'REGINA THEONI BR PAKPAHAN', 2018, '1402'),
('181402112', 'YOHANDRIE FELIX PURBA', 2018, '1402'),
('181402113', 'YEDIJA PRATAMA SIPAYUNG', 2018, '1402'),
('181402114', 'JESSICA RAMEYLIN GULTOM', 2018, '1402'),
('181402115', 'FELIX GLENALDI HUTAHAEAN', 2018, '1402'),
('181402116', 'MUHAMMAD RAIHANSYAH LUBIS', 2018, '1402'),
('181402117', 'FIKRI FADHLILLAH', 2018, '1402'),
('181402118', 'YEHEZKIEL EDININTA SIMANJUNTAK', 2018, '1402'),
('181402119', 'BOY CHARTO PARLINDUNGAN SIHOMB', 2018, '1402'),
('181402120', 'VANIA CHASIMIRA SIHOTANG', 2018, '1402'),
('181402121', 'ALVINO VIANDO PUTRA', 2018, '1402'),
('181402122', 'SONIA RAI', 2018, '1402'),
('181402123', 'VANYA WIDYA MEIFARIZKA S', 2018, '1402'),
('181402124', 'RINI ROYANTI MARBUN', 2018, '1402'),
('181402125', 'NAOMI HUTAURUK', 2018, '1402'),
('181402126', 'WILLI NARDO', 2018, '1402'),
('181402127', 'WIKEL BIMA LEONARDO', 2018, '1402'),
('181402128', 'ANGGITRI SIHOMBING', 2018, '1402'),
('181402129', 'THEO IFANKA SEBAYANG', 2018, '1402'),
('181402130', 'LUKAS ARMANDO SIANTURI', 2018, '1402'),
('181402131', 'JESSICA WONG', 2018, '1402'),
('181402132', 'ALFARO BINOTOTAMA TAMBUNAN', 2018, '1402'),
('181402133', 'JESSICA ELIZABETH REKSORAHARJO', 2018, '1402'),
('181402134', 'MUHAMMAD ALIEF RIZKI AKBAR NUA', 2018, '1402'),
('181402135', 'KRISTINA RONALITA NAINGGOLAN', 2018, '1402'),
('181402136', 'RAYMOND SARAGIH', 2018, '1402'),
('181402137', 'EKA PRIMA GINTING', 2018, '1402'),
('181402138', 'TENGKU ZALFA QADRIYYA MUNADHIL', 2018, '1402'),
('181402139', 'AGNES TIURMA MANURUNG', 2018, '1402'),
('181402140', 'PATRISIA TAMBUNAN', 2018, '1402'),
('181402141', 'RIZKI AKBAR GULO', 2018, '1402'),
('181402142', 'NABILA RIZKA', 2018, '1402'),
('181402143', 'AMELYA BATUBARA', 2018, '1402'),
('181402144', 'ARJUNAN IMMANUEL SINAMO', 2018, '1402'),
('181402145', 'CHRISTANTA ARDANA GINTING', 2018, '1402');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`) VALUES
('EX02345', 'Dasar-Dasar Parkour'),
('TIF0192', 'Partikel Komputer'),
('TIF0921', 'Dasar Pemerograman'),
('TIF1182', 'Jaringan Komputer'),
('TIF1202P', 'Praktikum Dasar Pemrograman'),
('TIF1203P', 'Praktikum Pemrograman Web'),
('TIF2019', 'AI'),
('TIF2020', 'project database'),
('TIF2091', 'Jaminan Keamanan Informasi'),
('TIF2305', 'Web Semantik'),
('TIF9012', 'Ilmu Alamiah Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `jenis_penilaian` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`jenis_penilaian`, `id_kelas`, `nim`, `nilai`) VALUES
('asd', 3, '171402084', 32),
('asd', 3, '171402087', 22),
('asd', 3, '171402090', 80),
('asd', 3, '171402096', 90),
('asd', 3, '171402099', 90),
('asd', 3, '171402102', 90),
('asd', 3, '171402105', 88),
('asd', 3, '171402108', 90),
('asd', 3, '171402111', 90),
('asd', 3, '171402114', 90),
('asd', 3, '171402117', 90),
('asd', 3, '171402120', 90),
('asd', 3, '171402123', 90),
('asd', 3, '171402126', 88),
('asd', 3, '171402129', 90),
('asd', 3, '171402132', 90),
('asd', 3, '171402135', 85),
('asd', 3, '171402138', 90),
('asd', 3, '171402141', 80),
('asd', 3, '171402144', 90),
('asd', 3, '171402147', 88),
('asd', 3, '171402150', 88),
('klm', 3, '171402084', 13),
('klm', 3, '171402087', 33),
('klm', 3, '171402090', 80),
('klm', 3, '171402096', 88),
('klm', 3, '171402099', 90),
('klm', 3, '171402102', 90),
('klm', 3, '171402105', 80),
('klm', 3, '171402108', 95),
('klm', 3, '171402111', 90),
('klm', 3, '171402114', 90),
('klm', 3, '171402117', 90),
('klm', 3, '171402120', 98),
('klm', 3, '171402123', 90),
('klm', 3, '171402126', 90),
('klm', 3, '171402129', 90),
('klm', 3, '171402132', 90),
('klm', 3, '171402135', 80),
('klm', 3, '171402138', 97),
('klm', 3, '171402141', 85),
('klm', 3, '171402144', 88),
('klm', 3, '171402147', 80),
('klm', 3, '171402150', 88),
('nilai', 1, '171402076', 90),
('nilai', 1, '171402079', 95),
('nilai', 1, '171402082', 90),
('nilai', 1, '171402085', 94),
('nilai', 1, '171402088', 90),
('nilai', 1, '171402094', 93),
('nilai', 1, '171402097', 88),
('nilai', 1, '171402100', 90),
('nilai', 1, '171402103', 90),
('nilai', 1, '171402106', 90),
('nilai', 1, '171402109', 98),
('nilai', 1, '171402112', 90),
('nilai', 1, '171402115', 90),
('nilai', 1, '171402118', 90),
('nilai', 1, '171402121', 90),
('nilai', 1, '171402127', 90),
('nilai', 1, '171402130', 90),
('nilai', 1, '171402133', 90),
('nilai', 1, '171402136', 90),
('nilai', 1, '171402139', 90),
('nilai', 1, '171402142', 88),
('nilai', 1, '171402145', 88),
('nilai', 1, '171402148', 98),
('nilai', 1, '171402151', 90),
('kuis', 2, '171402001', 90),
('kuis', 2, '171402004', 90),
('kuis', 2, '171402007', 90),
('kuis', 2, '171402010', 90),
('kuis', 2, '171402013', 90),
('kuis', 2, '171402016', 90),
('kuis', 2, '171402019', 90),
('kuis', 2, '171402022', 90),
('kuis', 2, '171402025', 80),
('kuis', 2, '171402031', 80),
('kuis', 2, '171402034', 98),
('kuis', 2, '171402037', 90),
('kuis', 2, '171402043', 90),
('kuis', 2, '171402046', 98),
('kuis', 2, '171402049', 90),
('kuis', 2, '171402052', 90),
('kuis', 2, '171402055', 90),
('kuis', 2, '171402058', 90),
('kuis', 2, '171402061', 88),
('kuis', 2, '171402064', 80),
('kuis', 2, '171402067', 80),
('kuis', 2, '171402073', 97),
('tugas', 2, '171402001', 90),
('tugas', 2, '171402004', 95),
('tugas', 2, '171402007', 90),
('tugas', 2, '171402010', 90),
('tugas', 2, '171402013', 88),
('tugas', 2, '171402016', 88),
('tugas', 2, '171402019', 88),
('tugas', 2, '171402022', 80),
('tugas', 2, '171402025', 85),
('tugas', 2, '171402031', 80),
('tugas', 2, '171402034', 90),
('tugas', 2, '171402037', 95),
('tugas', 2, '171402043', 90),
('tugas', 2, '171402046', 90),
('tugas', 2, '171402049', 90),
('tugas', 2, '171402052', 90),
('tugas', 2, '171402055', 90),
('tugas', 2, '171402058', 90),
('tugas', 2, '171402061', 88),
('tugas', 2, '171402064', 90),
('tugas', 2, '171402067', 88),
('tugas', 2, '171402073', 90),
('kehadiran', 2, '171402001', 100),
('kehadiran', 2, '171402004', 100),
('kehadiran', 2, '171402007', 100),
('kehadiran', 2, '171402010', 100),
('kehadiran', 2, '171402013', 100),
('kehadiran', 2, '171402016', 100),
('kehadiran', 2, '171402019', 100),
('kehadiran', 2, '171402022', 80),
('kehadiran', 2, '171402025', 85),
('kehadiran', 2, '171402031', 78),
('kehadiran', 2, '171402034', 100),
('kehadiran', 2, '171402037', 90),
('kehadiran', 2, '171402043', 100),
('kehadiran', 2, '171402046', 100),
('kehadiran', 2, '171402049', 100),
('kehadiran', 2, '171402052', 100),
('kehadiran', 2, '171402055', 100),
('kehadiran', 2, '171402058', 90),
('kehadiran', 2, '171402061', 90),
('kehadiran', 2, '171402064', 100),
('kehadiran', 2, '171402067', 100),
('kehadiran', 2, '171402073', 100),
('kuis', 4, '171402003', 100),
('kuis', 4, '171402006', 100),
('kuis', 4, '171402009', 100),
('kuis', 4, '171402012', 100),
('kuis', 4, '171402015', 88),
('kuis', 4, '171402018', 80),
('kuis', 4, '171402021', 90),
('kuis', 4, '171402030', 100),
('kuis', 4, '171402033', 100),
('kuis', 4, '171402036', 100),
('kuis', 4, '171402039', 88),
('kuis', 4, '171402042', 100),
('kuis', 4, '171402045', 100),
('kuis', 4, '171402048', 100),
('kuis', 4, '171402051', 90),
('kuis', 4, '171402054', 80),
('kuis', 4, '171402057', 100),
('kuis', 4, '171402066', 100),
('kuis', 4, '171402069', 90),
('kuis', 4, '171402072', 70),
('kuis', 4, '171402075', 100),
('kuis', 4, '171402081', 100),
('tugas', 4, '171402003', 100),
('tugas', 4, '171402006', 100),
('tugas', 4, '171402009', 100),
('tugas', 4, '171402012', 100),
('tugas', 4, '171402015', 80),
('tugas', 4, '171402018', 80),
('tugas', 4, '171402021', 88),
('tugas', 4, '171402030', 100),
('tugas', 4, '171402033', 100),
('tugas', 4, '171402036', 100),
('tugas', 4, '171402039', 90),
('tugas', 4, '171402042', 80),
('tugas', 4, '171402045', 90),
('tugas', 4, '171402048', 100),
('tugas', 4, '171402051', 98),
('tugas', 4, '171402054', 88),
('tugas', 4, '171402057', 100),
('tugas', 4, '171402066', 100),
('tugas', 4, '171402069', 89),
('tugas', 4, '171402072', 80),
('tugas', 4, '171402075', 100),
('tugas', 4, '171402081', 100),
('kehadiran', 1, '171402076', 88),
('kehadiran', 1, '171402079', 88),
('kehadiran', 1, '171402082', 88),
('kehadiran', 1, '171402085', 88),
('kehadiran', 1, '171402088', 90),
('kehadiran', 1, '171402094', 90),
('kehadiran', 1, '171402097', 100),
('kehadiran', 1, '171402100', 100),
('kehadiran', 1, '171402103', 100),
('kehadiran', 1, '171402106', 100),
('kehadiran', 1, '171402109', 100),
('kehadiran', 1, '171402112', 100),
('kehadiran', 1, '171402115', 100),
('kehadiran', 1, '171402118', 100),
('kehadiran', 1, '171402121', 100),
('kehadiran', 1, '171402127', 100),
('kehadiran', 1, '171402130', 90),
('kehadiran', 1, '171402133', 100),
('kehadiran', 1, '171402136', 100),
('kehadiran', 1, '171402139', 88),
('kehadiran', 1, '171402142', 96),
('kehadiran', 1, '171402145', 95),
('kehadiran', 1, '171402148', 100),
('kehadiran', 1, '171402151', 100);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nim`, `id_ruang`, `id_barang`, `tanggal`, `jumlah`) VALUES
(1, '171402081', 0, 1, '2018-12-21', '8'),
(2, '171402123', 0, 1, '2018-12-24', '123'),
(3, '171402081', 0, 3, '2018-12-25', '5'),
(4, '171402036', 0, 2, '2018-12-25', '5'),
(5, '171402002', 0, 2, '2018-12-25', '21'),
(10, '171402087', 0, 7, '2018-12-25', '10'),
(11, '171401031', 0, 1, '2018-12-03', '31'),
(12, '171402081', 0, 3, '2018-12-26', '55'),
(13, '171402018', 0, 1, '2018-12-26', '7'),
(14, '171402015', 0, 9, '2018-12-26', '1'),
(16, '171402081', 0, 9, '2018-12-27', '2'),
(17, '171402018', 0, 7, '2019-01-03', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_aslab`
--

CREATE TABLE `pendaftar_aslab` (
  `id_pendaftar` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_plg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_peminjaman`, `tanggal_plg`) VALUES
(2, '2018-12-27'),
(3, '2018-12-27'),
(4, '2018-12-26'),
(5, '2018-12-26'),
(10, '2018-12-26'),
(12, '2018-12-27'),
(14, '2018-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `persentase_penilaian`
--

CREATE TABLE `persentase_penilaian` (
  `id_kelas` int(11) NOT NULL,
  `jenis_penilaian` varchar(10) NOT NULL,
  `persentase` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persentase_penilaian`
--

INSERT INTO `persentase_penilaian` (`id_kelas`, `jenis_penilaian`, `persentase`) VALUES
(3, 'asd', 1),
(3, 'klm', 5),
(1, 'nilai', 80),
(2, 'kuis', 50),
(2, 'tugas', 30),
(2, 'kehadiran', 20),
(4, 'kuis', 50),
(4, 'tugas', 50),
(1, 'kehadiran', 20),
(5, 'kuis', 50),
(5, 'kehadiran', 30),
(5, 'tugas', 20);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_mahasiswa`
--

CREATE TABLE `presensi_mahasiswa` (
  `id_kelas` int(11) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `status` enum('sakit','izin','alpa','hadir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi_mahasiswa`
--

INSERT INTO `presensi_mahasiswa` (`id_kelas`, `pertemuan_ke`, `nim`, `status`) VALUES
(1, 1, '0', 'hadir'),
(1, 1, '171402076', 'sakit'),
(2, 1, '0', 'hadir'),
(2, 1, '171402001', 'alpa'),
(2, 1, '171402004', 'alpa'),
(2, 1, '171402007', 'alpa'),
(1, 2, '0', 'hadir'),
(1, 2, '171402076', 'sakit'),
(1, 2, '171402079', 'sakit'),
(4, 1, '0', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_silabus`
--

CREATE TABLE `presensi_silabus` (
  `id_kelas` int(11) NOT NULL,
  `pertemuan_ke` int(3) NOT NULL,
  `materi` int(11) NOT NULL,
  `status` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL,
  `kode_fakultas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekrutmen`
--

INSERT INTO `rekrutmen` (`id`, `id_fakultas`, `file`, `isi`) VALUES
(1, 14, 'RULEBOOK--COMPETITION-ON-THE-7TH-DIES-NATALIS-FASILKOM-TI.pdf', 'persyaratan rekrutmen:<br/> - CV<br/> - Surat Pernyataan<br/> - Jadwal Kuliah<br/> - KHS Semester yang diambil dan Semester terakhir<br/> - Minimal nilai mata praktikum yang dipilih : B+ .<br/> - Minimal IPK : 3.00<br/> - Essay<br/> - Pas Photo ( 3x4 ) pakai Almamater 1 buah<br/> - Warna MAP Merah ( Nama, NIM, Mata Praktikum )<br/>'),
(3, 1, 'Tugas1_SDA_B1_1714020231.pdf', '<p>persyaratan rekrutmen:<br/>\r\n- CV<br/>\r\n- Surat Pernyataan<br/>\r\n- Jadwal Kuliah<br/>\r\n- KHS Semester yang diambil dan Semester terakhir<br/>\r\n- Minimal nilai mata praktikum yang dipilih : B+ .<br/>\r\n- Minimal IPK : 3.00<br/>\r\n- Essay<br/>\r\n- Pas Photo ( 3x4 ) pakai Almamater 1 buah<br/>\r\n- Warna MAP Merah ( Nama, NIM, Mata Praktikum )<br/></p>\r\n'),
(4, 10, 'Yudha.pdf', '<p>persyaratan rekrutmen:<br/>\r\n- CV<br/>\r\n- Surat Pernyataan<br/>\r\n- Jadwal Kuliah<br/>\r\n- KHS Semester yang diambil dan Semester terakhir<br/>\r\n- Minimal nilai mata praktikum yang dipilih : B+ .<br/>\r\n- Minimal IPK : 3.00<br/>\r\n- Essay<br/>\r\n- Pas Photo ( 3x4 ) pakai Almamater 1 buah<br/>\r\n- Warna MAP Merah ( Nama, NIM, Mata Praktikum )<br/></p>\r\n'),
(5, 11, 'APA_ITU_Tugas3_B1.pdf', '<p>persyaratan rekrutmen:<br/>\r\n- CV<br/>\r\n- Surat Pernyataan<br/>\r\n- Jadwal Kuliah<br/>\r\n- KHS Semester yang diambil dan Semester terakhir<br/>\r\n- Minimal nilai mata praktikum yang dipilih : B+ .<br/>\r\n- Minimal IPK : 3.00<br/>\r\n- Essay<br/>\r\n- Pas Photo ( 3x4 ) pakai Almamater 1 buah<br/>\r\n- Warna MAP Merah ( Nama, NIM, Mata Praktikum )<br/></p>\r\n'),
(6, 12, 'ITFEST_Competitive_Programming.pdf', '<p>Dibuka mulai Januari</p>\r\n\r\n<p>...</p>\r\n'),
(7, 5, '4_-_OVERLOADING_FUNCTION.pdf', '<p>persyaratan rekrutmen:<br />\r\n- CV<br />\r\n- Surat Pernyataan<br />\r\n- Jadwal Kuliah<br />\r\n- KHS Semester yang diambil dan Semester terakhir<br />\r\n- Minimal nilai mata praktikum yang dipilih : B+ .<br />\r\n- Minimal IPK : 3.00<br />\r\n- Essay<br />\r\n- Pas Photo ( 3x4 ) pakai Almamater 1 buah<br />\r\n- Warna MAP Hijau&nbsp;( Nama, NIM, Mata Praktikum )</p>\r\n'),
(8, 9, '3177-ID-tinjauan-hak-asasi-manusia-terhadap-penerapan-hukuman-mati-di-indonesia.pdf', '<p>persyaratan rekrutmen:<br />\r\n- CV<br />\r\n- Surat Pernyataan<br />\r\n- Jadwal Kuliah<br />\r\n- KHS Semester yang diambil dan Semester terakhir<br />\r\n- Minimal nilai mata praktikum yang dipilih : B+ .<br />\r\n- Minimal IPK : 3.00<br />\r\n- Essay<br />\r\n- Pas Photo ( 3x4 ) pakai Almamater 1 buah<br />\r\n- Warna MAP Merah ( Nama, NIM, Mata Praktikum )</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `silabus`
--

CREATE TABLE `silabus` (
  `id_silabus` int(11) NOT NULL,
  `minggu_ke` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silabus`
--

INSERT INTO `silabus` (`id_silabus`, `minggu_ke`, `status`, `nama_materi`, `id_kelas`) VALUES
(1, '1', 1, 'Pengantar Teknologi Informasi', 2),
(2, '2', 1, 'Dasar-dasar penasaran', 2),
(3, '1', 0, 'Prototype', 1),
(4, '1', 0, 'Prototype', 1),
(5, '1', 1, 'Dasar-dasar penasarann', 1),
(6, '1', 0, 'Definisi Web Semantik', 1),
(7, '1', 0, 'Semantic Web Definition', 4),
(8, '1', 1, 'xml dan rdf', 3),
(9, '2', 0, 'Triples', 3),
(10, '2', 1, 'xml dan rdf', 4),
(11, '1', 1, 'funsi rekursif', 5),
(12, '2', 0, 'inheritance', 5),
(13, '1', 0, 'Perkenalan dunks', 12),
(14, '1', 0, 'Introduction', 10);

-- --------------------------------------------------------

--
-- Table structure for table `superlab`
--

CREATE TABLE `superlab` (
  `id_superlab` int(11) NOT NULL,
  `nama_superlab` varchar(50) NOT NULL,
  `kode_fakultas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superlab`
--

INSERT INTO `superlab` (`id_superlab`, `nama_superlab`, `kode_fakultas`) VALUES
(1, 'Ari', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_level` enum('admin','aslab','dosen','kepala lab') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(2, 'aslab', 'aslab@gmail.com', 'aslab123', 'aslab'),
(3, 'dosen', 'dosen@gmail.com', 'dosen123', 'dosen'),
(4, 'coba', 'coba@gmail.com', 'coba123', 'kepala lab'),
(5, '171402135', 'hariihza23@gmail.com', 'testimoni', 'aslab'),
(6, '171402081', 'ahmad adil', '171402081', 'aslab'),
(7, '1711402009', 'miftahaulia77@gmail.com', '1711402009', 'aslab'),
(8, '0031423567', 'ivanjaya@gmail.com', '0031423567', 'dosen'),
(9, '171402009', 'miftahaulia77@gmail.com', '171402009', 'aslab'),
(10, '0115098203', 'dani.gunawan@usu.ac.id', '0115098203', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `aslab`
--
ALTER TABLE `aslab`
  ADD PRIMARY KEY (`id_aslab`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kepala_lab`
--
ALTER TABLE `kepala_lab`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pendaftar_aslab`
--
ALTER TABLE `pendaftar_aslab`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `silabus`
--
ALTER TABLE `silabus`
  ADD PRIMARY KEY (`id_silabus`);

--
-- Indexes for table `superlab`
--
ALTER TABLE `superlab`
  ADD PRIMARY KEY (`id_superlab`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `aslab`
--
ALTER TABLE `aslab`
  MODIFY `id_aslab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kepala_lab`
--
ALTER TABLE `kepala_lab`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `silabus`
--
ALTER TABLE `silabus`
  MODIFY `id_silabus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
