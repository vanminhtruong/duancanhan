-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 07:05 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuchanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bienban`
--

CREATE TABLE `bienban` (
  `mabienban` varchar(255) NOT NULL,
  `masv` varchar(255) DEFAULT NULL,
  `masach` varchar(255) DEFAULT NULL,
  `loivipham` varchar(255) DEFAULT NULL,
  `bienphapxuly` varchar(255) DEFAULT NULL,
  `ngay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bienban`
--

INSERT INTO `bienban` (`mabienban`, `masv`, `masach`, `loivipham`, `bienphapxuly`, `ngay`) VALUES
('MB1', '234', '9', 'Lỗi làm hỏng sách', 'Phạt 200.000 đồng', '2024-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` varchar(255) NOT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sodt` varchar(255) DEFAULT NULL,
  `cmnd` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hoten`, `diachi`, `sodt`, `cmnd`, `gioitinh`) VALUES
('MNV1', 'Leon S Kenedy', 'New York', '070890098', '7798778978', 'Nam'),
('MNV2', 'Minh', 'Hà Nam', '34535355', '453455334', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `phieumuon`
--

CREATE TABLE `phieumuon` (
  `maphieumuon` varchar(255) NOT NULL,
  `ngaymuon` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `soluong` varchar(50) DEFAULT NULL,
  `tinhtrangsach` varchar(50) DEFAULT NULL,
  `masach` varchar(255) NOT NULL,
  `masv` varchar(255) DEFAULT NULL,
  `trangthai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieumuon`
--

INSERT INTO `phieumuon` (`maphieumuon`, `ngaymuon`, `ngaytra`, `soluong`, `tinhtrangsach`, `masach`, `masv`, `trangthai`) VALUES
('MP1', '2024-02-01', '2024-02-23', '55', 'Sách Nguyên Vẹn Không Hỏng', '9', '234', 'Chưa Mượn'),
('MP2', '2024-02-01', '2024-12-20', '50', 'Sách Nguyên Vẹn Không Hỏng', '9', 'MS1', 'Đang Mượn'),
('MP3', '2024-02-01', '2024-12-20', '50', 'Sách Nguyên Vẹn Không Hỏng', '9', 'MS2', 'Đang Mượn'),
('MP4', '2024-02-01', '2024-12-20', '50', 'Sách Nguyên Vẹn Không Hỏng', '9', 'MS3', 'Đang Mượn'),
('MP5', '2024-02-01', '2024-12-20', '50', 'Sách Nguyên Vẹn Không Hỏng', '9', '345', 'Đang Mượn');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `masach` varchar(255) NOT NULL,
  `tensach` varchar(255) DEFAULT NULL,
  `sotrang` varchar(255) DEFAULT NULL,
  `gia` varchar(255) DEFAULT NULL,
  `namxb` varchar(255) DEFAULT NULL,
  `tinhtrangsach` varchar(255) DEFAULT NULL,
  `tentg` varchar(255) DEFAULT NULL,
  `tennxb` varchar(255) DEFAULT NULL,
  `soluong` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `sotrang`, `gia`, `namxb`, `tinhtrangsach`, `tentg`, `tennxb`, `soluong`) VALUES
('9', 'Sách văn học viễn tưởng', '500', '499000', '2019', 'Sách còn nguyên không hỏng', 'Kim Phụng', 'Kim Đồng', '78');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` varchar(255) NOT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `lop` varchar(255) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `khoa` varchar(255) DEFAULT NULL,
  `manv` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `hoten`, `gioitinh`, `lop`, `ngaysinh`, `diachi`, `khoa`, `manv`, `image`) VALUES
('234', '234', 'Nam', '23423', '2024-02-09', '324', '23423', 'MNV1', 'uploads/1707891063_anh.jpg'),
('345', '345', 'Nữ', 'CCT21.4', '2024-02-01', '324', '234', 'MNV2', 'uploads/1706946372_Screenshot 2023-11-09 192241.png'),
('MS1', 'Leon S Kenedy', 'Nam', 'CCT21.5', '2024-02-09', 'New York', 'Công nghệ thông tin', 'MNV1', 'uploads/1707317968_cuatoi.png'),
('MS2', 'Luis Sera', 'Nam', 'CCT21.4', '2024-02-24', 'Tây Ban Nha', 'Công Nghệ Thông Tin', 'MNV1', 'uploads/1707318068_Screenshot 2023-11-09 192241.png'),
('MS3', 'Nguyễn Ngọc Cương', 'Nam', 'CCT21.3', '2003-02-15', 'Ngõ 5, Quận 5 Thành Phố HCM', 'Công Nghệ Phần Mềm', 'MNV1', 'uploads/1708426786_3x4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`user`, `password`, `email`) VALUES
('leon', '$2y$10$rMTzSeS1.kZNnmtkd2E57eXO0t5L2vKGab5205T6LxNnYtLtXi/9C', 'tichha95@gmail.com'),
('minh', '$2y$10$fBaMvDkSHx4YzCvMM7x9ve5IflxW4YTRZ088u2Rrx3wB2CNNMXYVu', 'hung45@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thethuvien`
--

CREATE TABLE `thethuvien` (
  `mathe` varchar(255) NOT NULL,
  `thoigiancap` date DEFAULT NULL,
  `hsd` date DEFAULT NULL,
  `masv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thethuvien`
--

INSERT INTO `thethuvien` (`mathe`, `thoigiancap`, `hsd`, `masv`) VALUES
('MT1', '2024-02-01', '2024-02-24', '345'),
('MT2', '2024-02-07', '2024-02-08', '345'),
('MT5', '2024-01-31', '2025-07-24', '345'),
('qweeqw', '2024-01-30', '2024-11-09', '234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bienban`
--
ALTER TABLE `bienban`
  ADD PRIMARY KEY (`mabienban`),
  ADD KEY `masv` (`masv`,`masach`),
  ADD KEY `masach` (`masach`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Indexes for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`maphieumuon`),
  ADD KEY `masach` (`masach`,`masv`),
  ADD KEY `masv` (`masv`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `manv` (`manv`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `thethuvien`
--
ALTER TABLE `thethuvien`
  ADD PRIMARY KEY (`mathe`),
  ADD KEY `masv` (`masv`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bienban`
--
ALTER TABLE `bienban`
  ADD CONSTRAINT `bienban_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `bienban_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);

--
-- Constraints for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `phieumuon_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `phieumuon_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);

--
-- Constraints for table `thethuvien`
--
ALTER TABLE `thethuvien`
  ADD CONSTRAINT `thethuvien_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
