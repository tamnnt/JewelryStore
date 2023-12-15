-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 08, 2023 lúc 05:44 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bantrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(2, 'Admin', 'admin@gmail.com', '123', '304767701_1766632290350992_4637248068076988908_n.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_desc`) VALUES
(2, 'Nữ', ''),
(3, 'Nam', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(9, 36, 'Mã giảm giá', '900000', 'abcdea', 4, 0),
(11, 42, 'Mã giảm giá 2', '800000', 'abcdefg', 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_password`, `customer_image`, `customer_ip`) VALUES
(23, 'User Test', 'user@gmail.com', '0825231263', 'Hưng Yên', '$2y$10$BNIzC0Q5DmQfc.a6uGqUouzrxAGB9pgAUqeFyEMp/kSP9Rm8cx01C', '345045193_614188890384937_8985004256917172535_n.jpg', '::1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_orders`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `product_id`, `product_size`, `product_quantity`, `order_date`, `order_status`) VALUES
(151, 23, 1900000, 1582714490, 42, 'Nhỏ', 2, '2023-06-13', 'Delivered'),
(152, 23, 900000, 1582714490, 41, 'Nhỏ', 1, '2023-06-13', 'Delivering'),
(153, 23, 850000, 871447826, 37, 'Nhỏ', 1, '2023-06-13', 'Complete'),
(154, 23, 950000, 1345919785, 40, 'Nhỏ', 1, '2023-08-31', 'Complete'),
(155, 23, 800000, 1345919785, 38, 'Nhỏ', 4, '2023-08-31', 'Complete'),
(156, 23, 800000, 537413776, 42, 'Nhỏ', 1, '2023-08-31', 'Delivering');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `category_id`, `date`, `product_title`, `product_price`, `product_image_1`, `product_image_2`, `product_image_3`, `product_keywords`, `product_description`, `product_label`, `product_sale`, `product_total`) VALUES
(34, 11, 2, '2023-06-05 08:39:14', 'Nhẫn đính hôn NDINO 253MO', '1950000', 'product_images/ndino253mo_7_a59cddd4b27c483fa3be7a07bc6ac829_master.webp', 'product_images/ndino253mo_2_8bf7256fcc804d8eb5af83479f9bf2d0_master.webp', 'product_images/ndino253mo_3_57e213e1bd444b59b7a33e6d550e680f_master.webp', 'Nhẫn đính hôn', '<p>M&atilde; sản phẩm: NDINO 253MO - 14K - Moissanite</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>\r\n<p>(Gi&aacute; đ&atilde; bao gồm đ&aacute; chủ Moissanite)</p>', 'new', '0', 20),
(35, 10, 2, '2023-06-05 08:37:24', 'Dây chuyền DCPTB 344', '1100000', 'product_images/dcptb344_1_b3b2d7f8c3b64191aa4cc85720c523dc_master.webp', 'product_images/dcptb344_1_dcbe6e828bdc4cfcbe69bdaac0c36795_master.webp', 'product_images/dcptb344_3_9f872dc57bbe41b092fdc5e4f1fefee5_master.webp', 'Dây chuyền', '<p>M&atilde; sản phẩm: DCPTB 344 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '890000', 22),
(36, 10, 2, '2023-06-13 11:02:23', 'Dây chuyền DCBTCC 83', '850000', 'product_images/dcbtcc83_6_2125e4d386b546b19998fa52374fe4cf_master.webp', 'product_images/dcbtcc83_7_7d4ec02cbd5c4c63830609dccdf8850c_master.webp', 'product_images/dcbtcc83_1_bf4be6d640d244b0893ece8093da460e_master.webp', 'Dây chuyền', '<p>M&atilde; sản phẩm: DCBTCC 83 - 14K - Ngọc Trai</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', 36),
(37, 1, 2, '2023-06-13 11:13:20', 'Lắc tay LLF 182', '850000', 'product_images/llf240_6_0f73a7323f6f4a7aa1e5f0cc2481050c_master.webp', 'product_images/llf240_1_ff50e8c0b0a3418481cddded414d05d7_master.webp', 'product_images/llf240_2_e34fa4b74e9c4b2fbd426d4e0f5cde16_master.webp', 'Lắc tay', '<p>M&atilde; sản phẩm: LLF 182 - 14K - Đ&aacute; CZ trắng</p>\r\n<p>T&ecirc;n sản phẩm: Les Fleurs</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', '', '0', 58),
(38, 1, 2, '2023-08-31 03:29:42', 'Lắc Tay LLF 240', '200000', 'product_images/llf240_6_0f73a7323f6f4a7aa1e5f0cc2481050c_master.webp', 'product_images/llf240_1_ff50e8c0b0a3418481cddded414d05d7_master.webp', 'product_images/llf240_2_e34fa4b74e9c4b2fbd426d4e0f5cde16_master.webp', 'Lắc Tay', '<p>M&atilde; sản phẩm: LLF 240 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', 13),
(39, 9, 2, '2023-06-13 07:22:13', 'Bông tai BTPTB 344', '960000', 'product_images/btptb344_1_38558b4843e94e5d8671ce16d62879f8_master.webp', 'product_images/btptb344_1_1bb63d3f08d64aa5b4196e543eadbf1e_master.webp', 'product_images/btptb344_3_cfdebaba1be445ca8c16135c22ab543e_master.webp', 'Bông tai', '<p class=\"product-more-info\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Quicksand, sans-serif;\"><span class=\"product-sku\" style=\"box-sizing: border-box;\">M&atilde; sản phẩm:&nbsp;<span id=\"ProductSku\" class=\"ProductSku\" style=\"box-s', 'new', '0', 79),
(40, 9, 2, '2023-08-31 03:29:42', 'Bông tai BTPTB 351', '1200000', 'product_images/btptb351_5_808fe66fd37c46e6853a920f394229b9_master.webp', 'product_images/btptb351_1_43cd012f9b314b188531bde38ab302a5_master.webp', 'product_images/btptb351_2_0dbf305ecc6b453094ca716be3cc183f_master.webp', 'Nước Hoa', '<p>M&atilde; sản phẩm: BTPTB 351 - 14K</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '950000', 98),
(41, 9, 2, '2023-06-13 11:12:31', 'Bông tai BT 434', '900000', 'product_images/bt434_6_78c2c57f9e9c46348c292d6e7af1ecf8_master.webp', 'product_images/bt434_1_03c3e50d80c9475c9f1bc8feccbd71fa_master.webp', 'product_images/bt434_2_979e6ca98f8440faa9f018d293824012_master.webp', 'Bông tai', '<p>M&atilde; sản phẩm: BT 434 - 14K - Đ&aacute; Cubic Zirconia</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'new', '0', 39),
(42, 9, 2, '2023-08-31 03:38:10', 'Bông tai BTPTB 353', '1200000', 'product_images/btptb353_6_b99ca0cdd87a468ab397457455b11c57_master.webp', 'product_images/btptb353_3_08ee92217c5c4ddb9abcaba12c6a8498_master.webp', 'product_images/btptb353_1_203bf45cb853498aa5cef19d11bf8be1_master.webp', 'Bông tai', '<p>M&atilde; sản phẩm: BTPTB 353 - 14K - Đ&aacute; Cubic Zirconia</p>\r\n<p>Thiết kế độc quyền từ H&agrave;n Quốc</p>', 'sale', '950000', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(10) NOT NULL,
  `product_category_title` varchar(255) NOT NULL,
  `product_category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_title`, `product_category_desc`) VALUES
(1, 'Lắc Tay', 'Lắc Tay đẹp dành cho nữ'),
(9, 'Bông tai', 'Bông tai đẹp'),
(10, 'Dây Chuyền', 'Dây Chuyền Đẹp'),
(11, 'Nhẫn Nữ', 'Nhẫn Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `page_id`, `name`, `content`, `rating`, `submit_date`) VALUES
(15, 42, 'Bao', 'Sản phẩm tốt !!!', 5, '2023-05-12 23:12:26'),
(16, 42, 'User Test', 'Sản phẩm quá ok!!', 4, '2023-05-12 23:13:12'),
(17, 37, 'User Test', 'Sản phẩm tốt', 5, '2023-06-13 16:54:25'),
(18, 42, 'test 2', 'sp tốt', 5, '2023-08-31 10:33:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(10) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_description` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_description`, `slide_image`, `slide_url`) VALUES
(2, '', '', 'slides_images/slideshow_3.jpg', ''),
(14, '', '', 'slides_images/slideshow_2.png', ''),
(15, '', '', 'slides_images/slideshow_1.png', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
