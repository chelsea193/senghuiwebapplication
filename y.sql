-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 03:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `y`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_notes`
--

CREATE TABLE `additional_notes` (
  `note_id` int(11) NOT NULL,
  `invoice_number` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_content` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `additional_notes`
--

INSERT INTO `additional_notes` (`note_id`, `invoice_number`, `user_id`, `note_content`, `type`, `payment_type`) VALUES
(16, '1989063418', 16, '', 'offline', 'Offline Payment'),
(43, '', 0, '', 'offline', 'Offline Payment'),
(67, '1600442036', 28, '', 'offline', 'Offline Payment');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Yamaha'),
(3, 'Honda'),
(11, 'Modenas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `invoice_number` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `buyer_id`, `invoice_number`, `product_id`, `product_price`, `product_title`, `ip_address`, `quantity`) VALUES
(73, 28, '1600442036', 34, '11990', 'Vario 150', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerclass`
--

CREATE TABLE `customerclass` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerclass`
--

INSERT INTO `customerclass` (`cid`, `cname`) VALUES
(1, 'Registration'),
(2, 'Insurance'),
(3, 'PendingApproval'),
(4, 'ReadyPickup');

-- --------------------------------------------------------

--
-- Table structure for table `offline_payment`
--

CREATE TABLE `offline_payment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offline_payment`
--

INSERT INTO `offline_payment` (`id`, `title`, `value`, `content`, `status`) VALUES
(1, 'Bank Transfer', 'bank_transfer', '<p>Account Name: Seng Hui</p>\r\n<p>Account No: 12345678901</p>\r\n<p>Bank: MBB</p>', ''),
(2, 'Cash on Delivery', 'cash_on_delivery', 'Cash on delivery.', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `tx_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `currency_code` varchar(10) NOT NULL DEFAULT 'RM',
  `payment_status` varchar(50) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `additional_notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `tx_id`, `product_id`, `product_price`, `buyer_id`, `invoice_id`, `currency_code`, `payment_status`, `payer_email`, `quantity`, `amount`, `date`, `type`, `payment_type`, `additional_notes`) VALUES
(249, '63c829b93f7df', 36, '7798', 1, '1804409521', 'RM', '', 'admin@gmail.com', 1, '7798', '2023-01-18', 'cash_on_delivery', 'Offline Payment', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `date` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `date`) VALUES
(33, 0, 3, 'Honda Wave Alpha', 3790, '', 'wavealpha.png', '', ''),
(34, 0, 3, 'Vario 150', 11990, '<p>The Vario is powered by a 149.3 cc engine, and has a Variable Speed gearbox. The Honda Vario has a seating height of 769 mm and kerb weight of 112 kg. The Vario comes with Disc front brakes and Drum rear brakes. Over 34 users have reviewed Vario on basis of Features, Mileage, seating comfort, and engine performance. Vario top competitors are XDV 250i, ADV 150, Ego Avantiz and NVX.</p>', 'vario.png', '', ''),
(35, 0, 11, 'Karisma 125s', 5397, '<p>The Karisma 125S Standard is powered by a 124.8 cc engine, and has a Variable Speed gearbox. The Modenas Karisma 125S Standard has a seating height of 770 mm and kerb weight of 108 kg. The Karisma 125S Standard comes with Disc front brakes and Drum rear brakes. Over 4 users have reviewed Karisma 125S Standard on basis of Features, Mileage, seating comfort, and engine performance. Karisma 125S Standard top competitors are XDV 250i Standard, Ego Avantiz Standard, VZ 125i Standard and Mio 110 Standard.</p>', 'Modenas-Karisma-125s_Mystic-Red-7-e1645705517930.jpg', '', ''),
(36, 0, 2, '135LC', 7798, '<p>The 135LC Fi is&nbsp;powered by a single-cylinder engine displacing 135 cc, making 12.4 PS at 8,000 pm and 12.2 Nm of torque at 6,000 rpm. Power goes through the rear wheel through a four-speed rotary gearbox (with a centrifugal clutch and chain final drive), staying true to its kapchai roots.</p>', '135LCFI.png', '', 'January 07, 2023'),
(37, 0, 11, 'Kriss MR2', 4090, '<p>This 110 CC underbone bike also offers an attractive black color sports rim and a brake disc for the front wheel while the rear wheel uses a drum-type brake.</p>', 'krissmr2.png', '', 'January 07, 2023'),
(38, 0, 11, 'Kriss 110', 3377, '<p>This 110 CC underbone bike also offers an attractive black color sports rim and a brake disc for the front wheel while the rear wheel uses a drum-type brake.</p>', 'Kriss110.png', '', 'January 08, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `tcustomer`
--

CREATE TABLE `tcustomer` (
  `id` int(11) NOT NULL,
  `sIC` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `ostatus` int(11) NOT NULL,
  `tdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tcustomer`
--

INSERT INTO `tcustomer` (`id`, `sIC`, `pname`, `ostatus`, `tdate`) VALUES
(3, 'Jennie', 'Modenas Kriss 110', 4, '19/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `IC` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `user_address` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `IC`, `contact`, `user_address`, `role`) VALUES
(1, '::1', 'admin', 'admin@gmail.com', 'admin', '2', '1', '1', 'admin'),
(28, '::1', 'John', 'John@gmail.com', '1', '010101136671', '0123445789', 'Lot 123,Jalan Song,Kuching', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_notes`
--
ALTER TABLE `additional_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customerclass`
--
ALTER TABLE `customerclass`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `offline_payment`
--
ALTER TABLE `offline_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tcustomer`
--
ALTER TABLE `tcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_notes`
--
ALTER TABLE `additional_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `customerclass`
--
ALTER TABLE `customerclass`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offline_payment`
--
ALTER TABLE `offline_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tcustomer`
--
ALTER TABLE `tcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
