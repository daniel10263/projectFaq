-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 10:31 PM
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
-- Database: `faqitalianrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `tag`, `keywords`) VALUES
(1, 'What are your opening hours?', 'We are open Monday to Sunday from 12:00 PM to 11:00 PM.', 'general', 'hours, open, closing, schedule, time'),
(2, 'Do you offer delivery?', 'Yes! We deliver through our website, Uber Eats, and local delivery services.', 'delivery', 'delivery, home delivery, order online, shipping, takeout'),
(3, 'Where are you located?', 'We are located at Via Roma 25, Guatemala City.', 'general', 'address, location, map, directions'),
(4, 'Do you have vegan or vegetarian options?', 'Yes, we offer a variety of vegan and vegetarian dishes. Just ask our staff for options.', 'dietary', 'vegan, vegetarian, plant-based, meat-free'),
(5, 'Do you have gluten-free pasta?', 'Yes, we offer gluten-free pasta options for most of our dishes.', 'dietary', 'gluten-free, celiac, pasta, special diet'),
(6, 'Can I make a reservation?', 'Absolutely! You can reserve a table by calling us or booking through our website.', 'reservation', 'reservation, book, table, booking, appointment'),
(7, 'Do you have parking available?', 'Yes, we have a private parking lot for customers.', 'general', 'parking, lot, car, vehicles'),
(8, 'Do you have options for kids?', 'Yes, we have a special kids menu with smaller portions and favorite dishes.', 'kids', 'kids, children, menu, child-friendly, family'),
(9, 'Do you accept credit cards?', 'Yes, we accept all major credit cards including Visa, Mastercard, and American Express.', 'payment', 'credit card, card, payment, visa, mastercard, amex'),
(10, 'Is your food halal or kosher?', 'We do not have official halal or kosher certification, but we try to accommodate dietary restrictions if possible.', 'dietary', 'halal, kosher, religious, dietary restriction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
