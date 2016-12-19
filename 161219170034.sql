/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: jam_olshop
Date: 12/19/2016 17:00:35
*/


-- ----------------------------
--  Table structure for `tabel_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `tabel_kategori`;
CREATE TABLE `tabel_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tabel_merek`
-- ----------------------------
DROP TABLE IF EXISTS `tabel_merek`;
CREATE TABLE `tabel_merek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tabel_produk`
-- ----------------------------
DROP TABLE IF EXISTS `tabel_produk`;
CREATE TABLE `tabel_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(20) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar1` longblob,
  `gambar2` longblob,
  `gambar3` longblob,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produk_merek` (`id_merek`),
  CONSTRAINT `fk_produk_merek` FOREIGN KEY (`id_merek`) REFERENCES `tabel_merek` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tabel_spesifikasi`
-- ----------------------------
DROP TABLE IF EXISTS `tabel_spesifikasi`;
CREATE TABLE `tabel_spesifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `series` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `garansi_produk` varchar(30) NOT NULL,
  `case_diameter` int(20) NOT NULL,
  `case_thickness` int(20) NOT NULL,
  `water_resistant` int(50) DEFAULT NULL,
  `case_material` varchar(30) DEFAULT NULL,
  `case_back` varchar(30) DEFAULT NULL,
  `glass_material` varchar(30) NOT NULL,
  `strap_material` varchar(30) NOT NULL,
  `clasp` varchar(50) DEFAULT NULL,
  `calendar` varchar(50) DEFAULT NULL,
  `driving_system` varchar(50) DEFAULT NULL,
  `caliber_number` varchar(30) NOT NULL,
  `case` varchar(30) DEFAULT NULL,
  `case_coating` varchar(30) DEFAULT NULL,
  `lumibright` varchar(30) DEFAULT NULL,
  `accuracy` varchar(30) DEFAULT NULL,
  `magnetic_reluctance` varchar(30) DEFAULT NULL,
  `luminious_lumibrite` varchar(10) DEFAULT NULL,
  `movement` varchar(50) NOT NULL,
  `dial_color` varchar(30) DEFAULT NULL,
  `bracelet` varchar(30) DEFAULT NULL,
  `features` varchar(100) DEFAULT NULL,
  `weight_after_packing` varchar(20) NOT NULL,
  `inside_box` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `tabel_merek` VALUES ('1','Seiko'),  ('3','Casio');
INSERT INTO `tabel_produk` VALUES ('2','SRP557K1','1','Seiko 5 Sports SRP557K1 Divers 100M','2000000',NULL,NULL,NULL,'seiko cocok untuk berenang di laut');
INSERT INTO `tabel_spesifikasi` VALUES ('1','2','Seiko 5','1','1','47','13','100','stainless steel','see case back','hardlex crystal','stainless steel','Deployment','Day and Date','no','211','stainless steel','yes','yes','30-35','yes','yes','Automatic 24 jewels cal 436r.','black','yes','Day and date calendar','1 kg','yes');
