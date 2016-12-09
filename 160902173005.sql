/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: siakad_sekolah
Date: 9/21/2016 16:29:38
*/


-- ----------------------------
--  Table structure for `jurusan`
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `mastersiswa`
-- ----------------------------
DROP TABLE IF EXISTS `mastersiswa`;
CREATE TABLE `mastersiswa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `register_online`
-- ----------------------------
DROP TABLE IF EXISTS `register_online`;
CREATE TABLE `register_online` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `jurusan_sekolah` varchar(50) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `jurusan_diminati` int(11) NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL,
  `alamat_orang_tua` text NOT NULL,
  `kota_orang_tua` varchar(50) NOT NULL,
  `no_telepon_orang_tua` varchar(14) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kode_pendaftaran` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `kode_pendaftaran` (`kode_pendaftaran`),
  CONSTRAINT `fk_registeronline_registerpayment` FOREIGN KEY (`kode_pendaftaran`) REFERENCES `register_payment` (`kode_pendaftaran`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `register_payment`
-- ----------------------------
DROP TABLE IF EXISTS `register_payment`;
CREATE TABLE `register_payment` (
  `nik` int(16) NOT NULL,
  `kode_pendaftaran` int(10) NOT NULL,
  PRIMARY KEY (`kode_pendaftaran`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `kode_pendaftaran` (`kode_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
