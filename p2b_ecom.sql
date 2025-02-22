-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Feb 22, 2025 at 04:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p2b_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(13, 'Ladies Clothes', 'ladies banner.jpg'),
(14, 'Watches', 'watches banner.jpg'),
(15, 'Mens clothes', 'mens banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipping_country` varchar(200) DEFAULT NULL,
  `shipping_state` varchar(200) DEFAULT NULL,
  `shipping_postcode` varchar(50) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `u_id`, `u_name`, `u_email`, `total_amount`, `total_quantity`, `status`, `date_time`, `shipping_country`, `shipping_state`, `shipping_postcode`, `payment_method`) VALUES
(10, 11, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 730, 8, 'pending', '2025-02-22 15:17:08', 'UK', 'BA', '4667', 'PayPal'),
(11, 11, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 340, 5, 'pending', '2025-02-22 15:32:56', 'USA', 'LA', '5688', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_name`, `u_email`, `p_id`, `p_name`, `p_price`, `p_qty`, `date_time`, `status`, `u_id`) VALUES
(27, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 13, 'Aurum Time', 100, 3, '2025-02-22 15:17:08', 'pending', 11),
(28, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 18, 'Men 3 piece Suit', 110, 3, '2025-02-22 15:17:08', 'pending', 11),
(29, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 17, 'Men Casual Shirt', 50, 2, '2025-02-22 15:17:08', 'pending', 11),
(30, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', 16, 'Mens Dress Pant', 68, 5, '2025-02-22 15:32:56', 'pending', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `produt_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `produt_name`, `product_price`, `product_quantity`, `product_image`, `product_description`, `product_cat_id`) VALUES
(9, 'Ladies Shirt', 50, 1, 'ladies1.jpg', 'Elevate your style with this elegant ladies\' shirt, designed for both comfort and sophistication. Crafted from premium-quality fabric, it offers a soft and breathable feel, making it perfect for all-day wear. The tailored fit enhances your silhouette, while the classic button-down front adds a touch', 13),
(10, 'Ladies Sweater', 70, 1, 'ladies2.jpg', 'Stay cozy and stylish with this elegant ladies\' sweater, designed to keep you warm without compromising on fashion. Made from high-quality, soft-knit fabric, it provides ultimate comfort and breathability for all-day wear. The relaxed yet flattering fit drapes beautifully, making it perfect for laye', 13),
(11, 'Ladies T-shirt', 30, 2, 'ladies3.jpg', 'Upgrade your everyday wardrobe with this classic ladies\' t-shirt, made from ultra-soft, breathable cotton for unmatched comfort. The relaxed fit and lightweight fabric make it perfect for casual wear, while the stylish round neckline and short sleeves add a touch of simplicity and elegance. Whether ', 13),
(12, 'Rollex', 150, 1, 'watch1.jpg', 'Discover timeless elegance and precision with the Rolex Watch, a symbol of luxury, craftsmanship, and innovation. Renowned for its exquisite design and exceptional performance, each Rolex is meticulously crafted with high-quality materials, ensuring both durability and a refined aesthetic. Whether y', 14),
(13, 'Aurum Time', 100, 1, 'watch2.jpg', 'Step into a world of luxury and precision with Aurum Time, where craftsmanship meets innovation. Each watch is a masterful blend of timeless design and modern technology, offering unparalleled elegance and reliability. With meticulously selected materials and attention to every detail, Aurum Time gu', 14),
(14, 'Opus Time', 90, 1, 'warch3.jpg', 'Experience the art of horology with Opus Time, where innovation and sophistication converge. Crafted with precision and passion, each timepiece from Opus Time represents the pinnacle of design, offering a perfect fusion of elegance and modern functionality. From the meticulously chosen materials to ', 14),
(16, 'Mens Dress Pant', 68, 1, 'men1.jpg', 'Elevate your wardrobe with these Dress Pants, designed to offer both style and comfort. Crafted from high-quality, breathable fabric, these pants provide a polished look that’s perfect for both professional settings and formal events. The tailored fit enhances your silhouette, while the sleek waistb', 15),
(17, 'Men Casual Shirt', 50, 1, 'men2.jpg', 'Upgrade your casual wardrobe with this versatile Men’s Casual Shirt, designed for both comfort and style. Made from soft, breathable fabric, it ensures all-day comfort, whether you’re out running errands or enjoying a relaxed weekend. The classic button-down design, combined with a relaxed fit, crea', 15),
(18, 'Men 3 piece Suit', 110, 1, 'men3.jpg', 'Upgrade your casual wardrobe with this versatile Men’s Casual Shirt, designed for both comfort and style. Made from soft, breathable fabric, it ensures all-day comfort, whether you’re out running errands or enjoying a relaxed weekend. The classic button-down design, combined with a relaxed fit, crea', 15);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(6, 'Admin', 'admin@example.com', 'admin123', 1),
(11, 'Muhammad Ahmed', 'm.ahmed.uh72@gmail.com', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_cat_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
