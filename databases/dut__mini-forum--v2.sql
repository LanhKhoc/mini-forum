-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 01:29 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dut__mini-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'PHẦN MỀM', NULL),
(2, 'VIDEO GAMES', NULL),
(13, 'GIẢI TRÍ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'Administrator', NULL),
(2, 'Moderator', NULL),
(3, 'User', NULL),
(4, 'Guest', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_details`
--

CREATE TABLE `permission_details` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `name_action` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `code_action` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `topic_id`, `user_id`, `title`, `content`, `date_created`) VALUES
(1, 12, 1, 'Thao thức', '<p><img alt="" src="/assets/libs/kcfinder/upload/images/hanoi002.JPG" style="height:439px; width:660px" /></p>\r\n\r\n<p><strong><span style="color:#006400">THAO THỨC<br />\r\n<br />\r\nL&acirc;u rồi ta sống cảnh &acirc;m thầm<br />\r\nThu b&oacute;ng t&acirc;m hồn dưới &aacute;nh trăng<br />\r\nĐ&ecirc;m tối suy tư, ri&ecirc;ng thổn thức<br />\r\nNấu nung lửa sống tự bao lần<br />\r\n<br />\r\nT&igrave;nh đời tơi tả phủ quanh ta<br />\r\nMột chuỗi sống d&agrave;i lắm x&oacute;t xa<br />\r\nGi&oacute; th&eacute;t, mưa g&agrave;o, rơi nặng hạt<br />\r\nĐầm đ&igrave;a, nước cuốn, c&aacute;t tr&ocirc;i xa<br />\r\n<br />\r\nGi&oacute; h&uacute;, rừng khuya, đ&ecirc;m nặng trĩu<br />\r\nChim đời mỏi c&aacute;nh biết bao nhi&ecirc;u<br />\r\nL&agrave;m sao ai thấu niềm t&acirc;m sự<br />\r\nChỉ c&oacute; canh khuya, gi&oacute; hắt hiu!<br />\r\n<br />\r\nTa đ&atilde; dặn l&ograve;ng kh&ocirc;ng nhục ch&iacute;<br />\r\nDẫu cho cuộc sống bị suy vi<br />\r\nĐ&ocirc;i ch&acirc;n mạnh bước trong sương lạnh<br />\r\nNhựa sống, th&acirc;n c&acirc;y c&oacute; x&aacute; g&igrave;!<br />\r\n<br />\r\nChim trời vỗ c&aacute;nh để tung bay<br />\r\nTận v&uacute;t trời xanh với gi&oacute; m&acirc;y<br />\r\nChẳng gục đường bay c&ugrave;ng b&atilde;o tố<br />\r\nChỉ sầu, bức rức cảnh kh&ocirc;ng may<br />\r\n<br />\r\nHồn ma! Mấy b&oacute;ng ở gần ta<br />\r\nĐ&atilde; thật bao lần phải tr&aacute;nh xa<br />\r\nPhiền lụy c&aacute;nh canh, l&ograve;ng ng&aacute;n ngẩm<br />\r\nTh&uacute;c th&ocirc;i &yacute; sống, cuộc rời xa!<br />\r\n<br />\r\nGi&oacute; ch&aacute;n m&acirc;y trời bao hắc &aacute;m<br />\r\nĐ&ecirc;m về rờn rợn nỗi cưu mang<br />\r\nC&oacute; g&igrave; b&oacute; buộc, sao lưu luyến?<br />\r\nĐể ch&iacute; ung dung phải v&otilde; v&agrave;ng!<br />\r\n<br />\r\nGi&oacute; thổi lắt lay, nỗi trập tr&ugrave;ng<br />\r\nChơi vơi cảnh sống chẳng niềm rung<br />\r\nĐể tim chan chứa t&igrave;nh nh&acirc;n thế<br />\r\nH&eacute;o &uacute;a, quặn đau với lạnh l&ugrave;ng!<br />\r\n<br />\r\nNăm th&aacute;ng &acirc;m thầm trong vắng lạnh<br />\r\nGi&oacute; hồn ẩn ngọn dưới trăng thanh<br />\r\nĐ&ecirc;m đ&ecirc;m thao thức theo m&acirc;y lững<br />\r\nChia sẻ niềm ri&ecirc;ng với trở trăn<br />\r\n<br />\r\nC&oacute; lẽ kh&ocirc;ng l&acirc;u, gi&oacute; cuốn đi<br />\r\nNơi đ&acirc;y người, cảnh chẳng l&agrave; chi<br />\r\nBởi l&ograve;ng ta chết từ l&acirc;u lắm<br />\r\nM&acirc;y trắng ng&agrave;n khơi, ta phải đi!<br />\r\n<br />\r\nMong mỏi khung trời chim trụ c&aacute;nh<br />\r\nT&igrave;nh người, cuộc sống được trong xanh<br />\r\nHo&agrave;ng h&ocirc;n b&oacute;ng phủ, đ&ecirc;m c&ograve;n lại<br />\r\nĐược trải hồn ra với cảnh l&agrave;nh<br />\r\nChim trời xoải c&aacute;nh giữa khung xanh!<br />\r\n<br />\r\nNguyễn Th&agrave;nh S&aacute;ng</span></strong></p>\r\n', '2018-02-07 07:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `name`, `description`) VALUES
(4, 1, 'Đánh giá phần mềm', 'Tổng hợp các bài viết đánh giá và phân tích phần mềm.'),
(5, 1, 'Phần mềm Tiếng Việt', 'Phần mềm Việt Nam và phần mềm Việt hóa.'),
(6, 1, 'Phần mềm Hệ thống & Bảo mật', 'Các Phần mềm tối ưu, sửa chữa, tăng tốc, sao lưu, bảo mật... hệ thống.'),
(7, 2, 'Thông tin - Thảo luận Games', 'Cập nhật các thông tin, tin tức mới nhất & thảo luận về Games.'),
(8, 2, 'Games Online', 'Thế giới game trưc tuyến trên mạng.'),
(9, 2, 'E-sport', NULL),
(10, 13, 'Thể Thao', 'Tin tức - Bình luận'),
(11, 13, 'Giao lưu, kết bạn, tự giới thiệu', 'Làm quen, tìm những người bạn mới để cùng chia sẻ sở thích, niềm đam mê.'),
(12, 13, 'Văn học', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `permission_id` int(11) NOT NULL,
  `avatar` char(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `gender`, `email`, `permission_id`, `avatar`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Lanh Khoc', 'Nam', 'admin@gmail.com', 1, 'user_avatar.png'),
(2, 'mod', '202cb962ac59075b964b07152d234b70', 'Mod Mod', 'Nữ', 'mod@gmail.com', 2, 'user_avatar.png'),
(3, 'user01', '202cb962ac59075b964b07152d234b70', 'User 01', 'Nam', 'user01@gmail.com', 3, 'user_avatar.png'),
(4, 'user02', '202cb962ac59075b964b07152d234b70', 'Iron Man', 'Nam', 'user02@gmail.com', 3, 'user_avatar.png'),
(6, 'user03', 'e10adc3949ba59abbe56e057f20f883e', 'Thor', 'Nam', 'user03@gmail.com', 3, 'user_avatar.png'),
(7, 'user04', 'e10adc3949ba59abbe56e057f20f883e', 'User', 'Nam', 'user04@gmail.com', 3, 'user_avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_details`
--
ALTER TABLE `permission_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permission_details`
--
ALTER TABLE `permission_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_details`
--
ALTER TABLE `permission_details`
  ADD CONSTRAINT `permission_details_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
