-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 07:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bantrangsuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(2, 'Admin', 'admin', '123', 'customer_default.png'),
(4, 'Danie', 'danie@JS', '123', 'OIP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_desc`) VALUES
(2, 'Nữ', ''),
(3, 'Nam', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(9, 36, 'Mã giảm giá', '900000', 'abcdea', 4, 0),
(11, 42, 'Mã giảm giá 2', '800000', 'abcdefg', 4, 4),
(12, 41, 'Quà tặng Giáng Sinh', '500000', 'giangsinhngotngao', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_password`, `customer_image`, `customer_ip`) VALUES
(24, 'Ngô Tâm', 'tamnnt.cnthongtin@gmail.com', '0974948710', 'ấp 4, Tân Hiệp, Thạnh Hóa, Long An', '$2y$10$.d/Uq0EVpUkTN0kHdgPFG.24EHpgyr7GKUCVGZos/SNyoxF61g/wW', 'profile.jpg', '::1'),
(28, 'Nguyễn Thị Khánh An', 'customer1@gmail.com', '0123456789', 'Châu Thành, Bến tre', '$2y$10$9va41YWnXx2Qfz45fQvHhuxx3tOvSFFDB5SClTyIlkKS.L8M5Uj5a', 'nv.anh.jpg', '::1'),
(30, 'Lê Thị B', 'customer3@gmail.com', '0988912311', 'Quận 5, TPHCM', '$2y$10$FsNsJloxLgoReftu1GH4Pel3mpwxz0ILX5zEYGSpVt892r2B51q0K', 'OIP.jpg', '::1'),
(33, 'Nguyễn Văn A', 'nva@gmail.com', '0123465687', 'TPHCM', '$2y$10$2uW7qkHRx8EcE3k8A1Uv3eat1zkRZcdz1jMxn1yALYYA677UT4nza', 'customer_default.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `product_id`, `product_size`, `product_quantity`, `order_date`, `order_status`) VALUES
(166, 28, 850000, 699862388, 36, 'Nhỏ', 1, '2023-12-28', 'Complete'),
(167, 28, 3277000, 1959365880, 45, 'Nhỏ', 1, '2023-12-28', 'Complete'),
(168, 28, 850000, 1959365880, 37, 'Nhỏ', 1, '2023-12-28', 'Complete'),
(172, 30, 10338000, 311900532, 44, 'Nhỏ', 1, '2023-12-28', 'Pending'),
(175, 33, 1600000, 688714794, 42, 'Nhỏ', 2, '2023-12-31', 'Complete'),
(176, 33, 3277000, 948923364, 45, 'Nhỏ', 1, '2023-12-31', 'Complete'),
(177, 33, 2880000, 1609829332, 39, 'Nhỏ', 3, '2023-12-31', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_category_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image_1` text NOT NULL,
  `product_image_2` text NOT NULL,
  `product_image_3` text NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` text NOT NULL,
  `product_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `category_id`, `date`, `product_title`, `product_price`, `product_image_1`, `product_image_2`, `product_image_3`, `product_keywords`, `product_description`, `product_label`, `product_sale`, `product_total`) VALUES
(34, 11, 2, '2023-06-05 08:39:14', 'Nhẫn đính hôn NDINO 253MO', '1950000', 'product_images/ndino253mo_7_a59cddd4b27c483fa3be7a07bc6ac829_master.webp', 'product_images/ndino253mo_2_8bf7256fcc804d8eb5af83479f9bf2d0_master.webp', 'product_images/ndino253mo_3_57e213e1bd444b59b7a33e6d550e680f_master.webp', 'Nhẫn đính hôn', '<p>M&atilde; sản phẩm: NDINO 253MO - 14K - Moissanite</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>\r\n<p>(Gi&aacute; đ&atilde; bao gồm đ&aacute; chủ Moissanite)</p>', 'new', '0', 20),
(35, 10, 2, '2023-12-28 16:50:37', 'Dây chuyền DCPTB 344', '1100000', 'product_images/dcptb344_1_b3b2d7f8c3b64191aa4cc85720c523dc_master.webp', 'product_images/dcptb344_1_dcbe6e828bdc4cfcbe69bdaac0c36795_master.webp', 'product_images/dcptb344_3_9f872dc57bbe41b092fdc5e4f1fefee5_master.webp', 'Dây chuyền', '<p>M&atilde; sản phẩm: DCPTB 344 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '890000', 21),
(36, 10, 2, '2023-12-28 16:50:37', 'Dây chuyền DCBTCC 83', '850000', 'product_images/dcbtcc83_6_2125e4d386b546b19998fa52374fe4cf_master.webp', 'product_images/dcbtcc83_7_7d4ec02cbd5c4c63830609dccdf8850c_master.webp', 'product_images/dcbtcc83_1_bf4be6d640d244b0893ece8093da460e_master.webp', 'Dây chuyền', '<p>M&atilde; sản phẩm: DCBTCC 83 - 14K - Ngọc Trai</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', 34),
(37, 1, 2, '2023-12-28 16:28:38', 'Lắc tay LLF 182', '850000', 'product_images/llf240_6_0f73a7323f6f4a7aa1e5f0cc2481050c_master.webp', 'product_images/llf240_1_ff50e8c0b0a3418481cddded414d05d7_master.webp', 'product_images/llf240_2_e34fa4b74e9c4b2fbd426d4e0f5cde16_master.webp', 'Lắc tay', '<p>M&atilde; sản phẩm: LLF 182 - 14K - Đ&aacute; CZ trắng</p>\r\n<p>T&ecirc;n sản phẩm: Les Fleurs</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', '', '0', 54),
(38, 1, 2, '2023-12-07 12:04:32', 'Lắc Tay LLF 240', '200000', 'product_images/llf240_6_0f73a7323f6f4a7aa1e5f0cc2481050c_master.webp', 'product_images/llf240_1_ff50e8c0b0a3418481cddded414d05d7_master.webp', 'product_images/llf240_2_e34fa4b74e9c4b2fbd426d4e0f5cde16_master.webp', 'Lắc Tay', '<p>M&atilde; sản phẩm: LLF 240 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', -97),
(39, 9, 2, '2023-12-31 13:15:59', 'Bông tai BTPTB 344', '960000', 'product_images/btptb344_1_38558b4843e94e5d8671ce16d62879f8_master.webp', 'product_images/btptb344_1_1bb63d3f08d64aa5b4196e543eadbf1e_master.webp', 'product_images/btptb344_3_cfdebaba1be445ca8c16135c22ab543e_master.webp', 'Bông tai', '<p class=\"product-more-info\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Quicksand, sans-serif;\"><span class=\"product-sku\" style=\"box-sizing: border-box;\">M&atilde; sản phẩm:&nbsp;<span id=\"ProductSku\" class=\"ProductSku\" style=\"box-s', 'new', '0', 76),
(40, 9, 2, '2023-08-31 03:29:42', 'Bông tai BTPTB 351', '1200000', 'product_images/btptb351_5_808fe66fd37c46e6853a920f394229b9_master.webp', 'product_images/btptb351_1_43cd012f9b314b188531bde38ab302a5_master.webp', 'product_images/btptb351_2_0dbf305ecc6b453094ca716be3cc183f_master.webp', 'Nước Hoa', '<p>M&atilde; sản phẩm: BTPTB 351 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '950000', 98),
(41, 9, 2, '2023-12-18 15:15:17', 'Bông tai BT 434', '900000', 'product_images/bt434_6_78c2c57f9e9c46348c292d6e7af1ecf8_master.webp', 'product_images/bt434_1_03c3e50d80c9475c9f1bc8feccbd71fa_master.webp', 'product_images/bt434_2_979e6ca98f8440faa9f018d293824012_master.webp', 'Bông tai', '<p>M&atilde; sản phẩm: BT 434 - 14K - Đ&aacute; Cubic Zirconia</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', 37),
(42, 9, 2, '2023-12-31 13:10:32', 'Bông tai BTPTB 353', '1200000', 'product_images/btptb353_6_b99ca0cdd87a468ab397457455b11c57_master.webp', 'product_images/btptb353_3_08ee92217c5c4ddb9abcaba12c6a8498_master.webp', 'product_images/btptb353_1_203bf45cb853498aa5cef19d11bf8be1_master.webp', 'Bông tai', '<p>M&atilde; sản phẩm: BTPTB 353 - 14K - Đ&aacute; Cubic Zirconia</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '950000', 12),
(44, 13, 2, '2023-12-31 12:25:32', 'Nhẫn NDINO 170KC', '10338000', 'product_images/Nhan_NDINO_170KC_4.jpg', 'product_images/Nhan_NDINO_170KC_2.jpg', 'product_images/Nhan_NDINO_170KC_3.jpg', 'Nhẫn cưới', '<p><span style=\"color: #333333; font-family: Quicksand, sans-serif; background-color: #fefefe;\">M&atilde; sản phẩm:&nbsp;<strong>NDINO 170KC</strong></span></p>\r\n<p>Nhẫn cưới sang trọng, chất lượng đến từ H&agrave;n Quốc</p>', 'new', '300000', 93),
(45, 9, 2, '2023-12-31 13:12:22', 'Bông tai BT 448', '3277000', 'product_images/bt448_f3d8cd3079d34f38bf2c1c4dc58b4635_master.webp', 'product_images/bt448_3_a124134502a04e3fb204dd5e8cf6ad09_master.webp', 'product_images/bt448_3_a124134502a04e3fb204dd5e8cf6ad09_master.webp', 'bông tai', '<p>B&ocirc;ng tai BT 448</p>\r\n<p>B&ocirc;ng tai ngọc trai H&agrave;n Quốc</p>', 'new', '0', 90);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(10) NOT NULL,
  `product_category_title` varchar(255) NOT NULL,
  `product_category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_title`, `product_category_desc`) VALUES
(1, 'Lắc Tay', 'Lắc Tay đẹp dành cho nữ'),
(9, 'Bông tai', 'Bông tai đẹp'),
(10, 'Dây Chuyền', 'Dây Chuyền Đẹp'),
(11, 'Nhẫn Nữ', 'Nhẫn Nữ'),
(12, 'Quà tặng', 'Quà tặng Sinh nhật'),
(13, 'Nhẫn cưới', 'Nhẫn cưới cặp đôi'),
(14, 'Đồng hồ', 'Đồng hồ đính kim cương');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `page_id`, `name`, `content`, `rating`, `submit_date`) VALUES
(15, 42, 'Bao', 'Sản phẩm tốt !!!', 5, '2023-10-12 23:12:26'),
(16, 42, 'User Test', 'Sản phẩm quá ok!!', 4, '2023-10-12 23:13:12'),
(17, 37, 'User Test', 'Sản phẩm tốt', 5, '2023-10-13 16:54:25'),
(18, 42, 'test 2', 'sp tốt', 5, '2023-10-31 10:33:34'),
(19, 42, 'Nguyên Nguyên', 'Sp trên cả tuyệt vời!!!', 5, '2023-12-25 22:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(10) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_description` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_description`, `slide_image`, `slide_url`) VALUES
(23, '', '', 'slides_images/slideshow_1 (1).png', ''),
(24, '', '', 'slides_images/slideshow_3.png', ''),
(25, '', '', 'slides_images/slideshow_4.png', ''),
(26, '', '', 'slides_images/slideshow_2.png', ''),
(27, '', '', 'slides_images/home_banner_2.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
