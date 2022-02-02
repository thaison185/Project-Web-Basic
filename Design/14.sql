-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2022 at 07:36 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `14`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `hashed_password` varchar(100) NOT NULL DEFAULT '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `name`, `email`, `phone`, `DOB`, `address`, `hashed_password`, `gender`, `avatar`) VALUES
(0, 'none', 'None Account Customer', 'none@none', '00', '2011-12-08', '', '$2y$10$XsahU21WJc3qwOrtbiUAneDSUQM6iySiEQqjD/R3tYadyTDzehVRG', 0, NULL),
(1, 'customer1', 'Customer One', 'cus1@example.com', '+84123456789', '1987-12-01', '144/2500/50Test street, Example city', '750cca026a238a93007f65ad97b70f9a', 0, NULL),
(2, 'customer2', 'Customer Two', 'cus2@example.com', '+84123456788', '1988-12-02', '145/14000/80Test street, Example city', '393b598879aa996c58e45abfca625048', 0, NULL),
(3, 'chanvuuu', 'Chan Vu', 'chanvu@gg.oo', '099999999999', '2011-12-07', '146/13500/80Test street, Example city', '6f8da60e35d7077999f2dbd4c26ec203', 0, NULL),
(4, 'chanvuuudeptrai', 'Chan Vu Dep Trai', 'chanvudt@gg.oo', '0999999999999', '2011-12-06', '147/12000/80Test street, Example city', '6f8da60e35d7077999f2dbd4c26ec203', 0, NULL),
(5, 'customerTest', 'Just Test', 'test@example.com', '090909909', '1980-01-02', '148/11000/80Test street, Example city', '$2y$10$sMpzFfie1nV5D5L82NMsB.F.APp4aIyQ/Ga0ss3wdVqppaNL84FKG', 0, NULL),
(6, 'King_Steven', 'King Steven', 'King@example.com', '1002400090', '1993-06-17', '149/10500/80Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(7, 'Kochhar_Neena', 'Kochhar Neena', 'Kochhar@example.com', '1011700090', '1995-09-21', '150/10000/80Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(8, 'Hunold_Alexander', 'Hunold Alexander', 'Hunold@example.com', '103900060', '1991-01-13', '102/17000/90 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(9, 'Ernst_Bruce', 'Ernst Bruce', 'Ernst@example.com', '104600060', '1996-01-03', '103/9000/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(10, 'Austin_David', 'Austin David', 'Austin@example.com', '105480060', '1997-05-21', '104/6000/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(11, 'Pataballa_Valli', 'Pataballa Valli', 'Pataballa@example.com', '106480060', '1995-06-25', '105/4800/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(12, 'Lorentz_Diana', 'Lorentz Diana', 'Lorentz@example.com', '107420060', '1996-02-05', '106/4800/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(13, 'Greenberg_Nancy', 'Greenberg Nancy', 'Greenberg@example.com', '10812008100', '1997-02-07', '107/4200/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(14, 'Faviet_Daniel', 'Faviet Daniel', 'Faviet@example.com', '1099000100', '1992-08-17', '108/12008/100 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(15, 'Chen_John', 'Chen John', 'Chen@example.com', '1108200100', '1992-08-16', '109/9000/100 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(16, 'Sciarra_Ismael', 'Sciarra Ismael', 'Sciarra@example.com', '1117700100', '1995-09-28', '110/8200/100 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(17, 'Urman_Jose_Manuel', 'Urman Jose Manuel', 'Urman@example.com', '1127800100', '1995-09-30', '111/7700/100 Test street, Example city', '$2y$10$MUmw8d26aWR/WnUuVRm4SuCkf7gT3y7zWl8dgdG/GLaXvy62gAcbK', 0, '../../data/img/avatar/16412297594435.'),
(18, 'Popp_Luis', 'Popp Luis', 'Popp@example.com', '1136900100', '1996-03-07', '112/7800/100 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(19, 'Raphaely_Den', 'Raphaely Den', 'Raphaely@example.com', '1141100030', '1997-12-07', '113/6900/100 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(20, 'Khoo_Alexander', 'Khoo Alexander', 'Khoo@example.com', '115310030', '1992-12-07', '114/11000/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(21, 'Baida_Shelli', 'Baida Shelli', 'Baida@example.com', '116290030', '1993-05-18', '115/3100/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(22, 'Tobias_Sigal', 'Tobias Sigal', 'Tobias@example.com', '117280030', '1995-12-24', '116/2900/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(23, 'Himuro_Guy', 'Himuro Guy', 'Himuro@example.com', '118260030', '1995-07-24', '117/2800/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(24, 'Colmenares_Karen', 'Colmenares Karen', 'Colmenares@example.com', '119250030', '1996-11-15', '118/2600/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(25, 'Weiss_Matthew', 'Weiss Matthew', 'Weiss@example.com', '120800050', '1997-08-10', '119/2500/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(26, 'Fripp_Adam', 'Fripp Adam', 'Fripp@example.com', '121820050', '1994-07-18', '120/8000/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(27, 'Kaufling_Payam', 'Kaufling Payam', 'Kaufling@example.com', '122790050', '1995-04-10', '121/8200/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(28, 'Vollman_Shanta', 'Vollman Shanta', 'Vollman@example.com', '123650050', '1993-05-01', '122/7900/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(29, 'Mourgos_Kevin', 'Mourgos Kevin', 'Mourgos@example.com', '124580050', '1995-10-10', '123/6500/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(30, 'Nayer_Julia', 'Nayer Julia', 'Nayer@example.com', '125320050', '1997-11-16', '124/5800/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(31, 'Mikkilineni_Irene', 'Mikkilineni Irene', 'Mikkilineni@example.com', '126270050', '1995-07-16', '125/3200/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(32, 'Landry_James', 'Landry James', 'Landry@example.com', '127240050', '1996-09-28', '126/2700/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(33, 'Markle_Steven', 'Markle Steven', 'Markle@example.com', '128220050', '1997-01-14', '127/2400/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(34, 'Bissot_Laura', 'Bissot Laura', 'Bissot@example.com', '129330050', '1998-03-08', '128/2200/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(35, 'Atkinson_Mozhe', 'Atkinson Mozhe', 'Atkinson@example.com', '130280050', '1995-08-20', '129/3300/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(36, 'Marlow_James', 'Marlow James', 'Marlow@example.com', '131250050', '1995-10-30', '130/2800/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(37, 'Olson_TJ', 'Olson TJ', 'Olson@example.com', '132210050', '1995-02-16', '131/2500/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(38, 'Mallin_Jason', 'Mallin Jason', 'Mallin@example.com', '133330050', '1997-04-10', '132/2100/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(39, 'Rogers_Michael', 'Rogers Michael', 'Rogers@example.com', '134290050', '1994-06-14', '133/3300/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(40, 'Gee_Ki', 'Gee Ki', 'Gee@example.com', '135240050', '1996-08-26', '134/2900/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(41, 'Philtanker_Hazel', 'Philtanker Hazel', 'Philtanker@example.com', '136220050', '1997-12-12', '135/2400/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(42, 'Ladwig_Renske', 'Ladwig Renske', 'Ladwig@example.com', '137360050', '1998-02-06', '136/2200/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(43, 'Stiles_Stephen', 'Stiles Stephen', 'Stiles@example.com', '138320050', '1993-07-14', '137/3600/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(44, 'Seo_John', 'Seo John', 'Seo@example.com', '139270050', '1995-10-26', '138/3200/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(45, 'Patel_Joshua', 'Patel Joshua', 'Patel@example.com', '140250050', '1996-02-12', '139/2700/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(46, 'Rajs_Trenna', 'Rajs Trenna', 'Rajs@example.com', '141350050', '1996-04-06', '140/2500/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(47, 'Davies_Curtis', 'Davies Curtis', 'Davies@example.com', '142310050', '1993-10-17', '141/3500/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(48, 'Matos_Randall', 'Matos Randall', 'Matos@example.com', '143260050', '1995-01-29', '142/3100/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(49, 'Vargas_Peter', 'Vargas Peter', 'Vargas@example.com', '144250050', '1996-03-15', '143/2600/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(50, 'Russell_John', 'Russell John', 'Russell@example.com', '1451400080', '1996-07-09', '144/2500/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(51, 'Partners_Karen', 'Partners Karen', 'Partners@example.com', '1461350080', '1994-10-01', '145/14000/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(52, 'Errazuriz_Alberto', 'Errazuriz Alberto', 'Errazuriz@example.com', '1471200080', '1995-01-05', '146/13500/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(53, 'Cambrault_Gerald', 'Cambrault Gerald', 'Cambrault@example.com', '1481100080', '1995-03-10', '147/12000/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(54, 'Zlotkey_Eleni', 'Zlotkey Eleni', 'Zlotkey@example.com', '1491050080', '1997-10-15', '148/11000/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(55, 'Tucker_Peter', 'Tucker Peter', 'Tucker@example.com', '1501000080', '1998-01-29', '149/10500/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(56, 'Bernstein_David', 'Bernstein David', 'Bernstein@example.com', '151950080', '1995-01-30', '150/10000/80 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(57, 'Hall_Peter', 'Hall Peter', 'Hall@example.com', '152900080', '1995-03-24', '100/24000/90Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(58, 'Olsen_Christopher', 'Olsen Christopher', 'Olsen@example.com', '153800080', '1995-08-20', '101/17000/90Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(59, 'Cambrault_Nanette', 'Cambrault Nanette', 'CambraultN@example.com', '154750080', '1996-03-30', '102/17000/90Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(60, 'Tuvault_Oliver', 'Tuvault Oliver', 'Tuvault@example.com', '155700080', '1996-12-09', '103/9000/60Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(61, 'King_Janette', 'King Janette', 'KingJ@example.com', '1561000080', '1997-11-23', '104/6000/60Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(62, 'Sully_Patrick', 'Sully Patrick', 'Sully@example.com', '157950080', '1994-01-30', '105/4800/60Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(63, 'McEwen_Allan', 'McEwen Allan', 'McEwen@example.com', '158900080', '1994-03-04', '106/4800/60Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(64, 'Smith_Lindsey', 'Smith Lindsey', 'Smith@example.com', '159800080', '1994-08-01', '107/4200/60Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(65, 'Doran_Louise', 'Doran Louise', 'Doran@example.com', '160750080', '1995-03-10', '108/12008/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(66, 'Sewall_Sarath', 'Sewall Sarath', 'Sewall@example.com', '161700080', '1995-12-15', '109/9000/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(67, 'Vishney_Clara', 'Vishney Clara', 'Vishney@example.com', '1621050080', '1996-11-03', '110/8200/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(68, 'Greene_Danielle', 'Greene Danielle', 'Greene@example.com', '163950080', '1995-11-11', '111/7700/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(69, 'Marvins_Mattea', 'Marvins Mattea', 'Marvins@example.com', '164720080', '1997-03-19', '112/7800/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(70, 'Lee_David', 'Lee David', 'Lee@example.com', '165680080', '1998-01-24', '113/6900/100Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(71, 'Ande_Sundar', 'Ande Sundar', 'Ande@example.com', '166640080', '1998-02-23', '114/11000/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(72, 'Banda_Amit', 'Banda Amit', 'Banda@example.com', '167620080', '1998-03-24', '115/3100/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(73, 'Ozer_Lisa', 'Ozer Lisa', 'Ozer@example.com', '1681150080', '1998-04-21', '116/2900/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(74, 'Bloom_Harrison', 'Bloom Harrison', 'Bloom@example.com', '1691000080', '1995-03-11', '117/2800/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(75, 'Fox_Tayler', 'Fox Tayler', 'Fox@example.com', '170960080', '1996-03-23', '118/2600/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(76, 'Smith_William', 'Smith William', 'SmithW@example.com', '171740080', '1996-01-24', '119/2500/30Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(77, 'Bates_Elizabeth', 'Bates Elizabeth', 'Bates@example.com', '172730080', '1997-02-23', '120/8000/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(78, 'Kumar_Sundita', 'Kumar Sundita', 'Kumar@example.com', '173610080', '1997-03-24', '121/8200/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(79, 'Abel_Ellen', 'Abel Ellen', 'Abel@example.com', '1741100080', '1998-04-21', '122/7900/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(80, 'Hutton_Alyssa', 'Hutton Alyssa', 'Hutton@example.com', '175880080', '1994-05-11', '123/6500/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(81, 'Taylor_Jonathon', 'Taylor Jonathon', 'Taylor@example.com', '176860080', '1995-03-19', '124/5800/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(82, 'Livingston_Jack', 'Livingston Jack', 'Livingston@example.com', '177840080', '1996-03-24', '125/3200/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(83, 'Grant_Kimberely', 'Grant Kimberely', 'Grant@example.com', '1787000', '1996-04-23', '126/2700/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(84, 'Johnson_Charles', 'Johnson Charles', 'Johnson@example.com', '179620080', '1997-05-24', '127/2400/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(85, 'Taylor_Winston', 'Taylor Winston', 'TaylorW@example.com', '180320050', '1998-01-04', '128/2200/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(86, 'Fleaur_Jean', 'Fleaur Jean', 'Fleaur@example.com', '181310050', '1996-01-24', '129/3300/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(87, 'Sullivan_Martha', 'Sullivan Martha', 'Sullivan@example.com', '182250050', '1996-02-23', '130/2800/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(88, 'Geoni_Girard', 'Geoni Girard', 'Geoni@example.com', '183280050', '1997-06-21', '131/2500/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(89, 'Sarchand_Nandita', 'Sarchand Nandita', 'Sarchand@example.com', '184420050', '1998-02-03', '132/2100/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(90, 'Bull_Alexis', 'Bull Alexis', 'Bull@example.com', '185410050', '1994-01-27', '133/3300/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(91, 'Dellinger_Julia', 'Dellinger Julia', 'Dellinger@example.com', '186340050', '1995-02-20', '134/2900/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(92, 'Cabrio_Anthony', 'Cabrio Anthony', 'Cabrio@example.com', '187300050', '1996-06-24', '135/2400/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(93, 'Chung_Kelly', 'Chung Kelly', 'Chung@example.com', '188380050', '1997-02-07', '136/2200/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(94, 'Dilly_Jennifer', 'Dilly Jennifer', 'Dilly@example.com', '189360050', '1995-06-14', '137/3600/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(95, 'Gates_Timothy', 'Gates Timothy', 'Gates@example.com', '190290050', '1995-08-13', '138/3200/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(96, 'Perkins_Randall', 'Perkins Randall', 'Perkins@example.com', '191250050', '1996-07-11', '139/2700/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(97, 'Bell_Sarah', 'Bell Sarah', 'Bell@example.com', '192400050', '1997-12-19', '140/2500/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(98, 'Everett_Britney', 'Everett Britney', 'Everett@example.com', '193390050', '1994-02-04', '141/3500/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(99, 'McCain_Samuel', 'McCain Samuel', 'McCain@example.com', '194320050', '1995-03-03', '142/3100/50Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(100, 'Jones_Vance', 'Jones Vance', 'Jones@example.com', '195280050', '1996-07-01', '147/3190/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(101, 'Walsh_Alana', 'Walsh Alana', 'Walsh@example.com', '196310050', '1997-03-17', '149/13170/90 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(102, 'Feeney_Kevin', 'Feeney Kevin', 'Feeney@example.com', '197300050', '1996-04-24', '152/11240/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(103, 'OConnell_Donald', 'OConnell Donald', 'OConnell@example.com', '198260050', '1996-05-23', '194/31100/30 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(104, 'Grant_Douglas', 'Grant Douglas', 'GrantD@example.com', '199260050', '1997-06-21', '182/11100/60 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(105, 'Whalen_Jennifer', 'Whalen Jennifer', 'Whalen@example.com', '200440010', '1998-01-13', '152/3140/10 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(106, 'Hartstein_Michael', 'Hartstein Michael', 'Hartstein@example.com', '2011300020', '1993-09-17', '141/3111/50 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL),
(107, 'Fay_Pat', 'Fay Pat', 'Fay@example.com', '202600020', '1994-02-17', '142/3100/77 Test street, Example city', '$2y$10$.UTq353gU/9.XB8ySXS75.ANbVquqEkZW9mRCg1om5ZS2FW5G2qe2', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `s_price` float DEFAULT NULL,
  `m_price` float DEFAULT NULL,
  `l_price` float DEFAULT NULL,
  `description` text,
  `category` varchar(20) NOT NULL,
  `ice` tinyint(1) NOT NULL,
  `sugar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `s_price`, `m_price`, `l_price`, `description`, `category`, `ice`, `sugar`) VALUES
(1, 'Americano', './data/img/items/1641144170.png', 2, 3, 4, NULL, 'Coffee', 1, 0),
(2, 'Cappuccino', './data/img/items/1641142475.png', 3, 5, 7, NULL, 'Coffee', 1, 0),
(3, 'Espresso', './data/img/items/1641144576.jpg', 2, 5, 6, NULL, 'Coffee', 1, 0),
(4, 'Latte', './data/img/items/1641144841.jpg', 0, 5, 8, NULL, 'Coffee', 1, 0),
(5, 'Cinnamon Dolce Latte', './data/img/items/1641144933.webp', 0, 6, 9, NULL, 'Coffee', 1, 0),
(6, 'Caramel Macchiato', './data/img/items/1641145024.webp', 0, 6, 9, NULL, 'Coffee', 1, 0),
(7, 'Mocha', './data/img/items/1641145094.jpg', 3, 6, 8, NULL, 'Coffee', 1, 0),
(8, 'White Chocolate Mocha', './data/img/items/1641145155.jpg', 0, 7, 9, NULL, 'Coffee', 1, 0),
(9, 'Bac Xiu', './data/img/items/1641145305.jpg', 2, 3, 5, NULL, 'Coffee', 1, 0),
(10, 'Cold Brew', './data/img/items/1641145350.png', 3, 5, 7, NULL, 'Coffee', 1, 0),
(11, 'Chai Tea Latte', './data/img/items/1641145393.webp', 2, 3, 4, NULL, 'Tea', 1, 0),
(12, 'Earl Grey', './data/img/items/1641145434.jpg', 0, 2, 3, NULL, 'Tea', 1, 0),
(13, 'Matcha Latte', './data/img/items/1641145477.jpg', 3, 5, 6, NULL, 'Tea', 1, 0),
(14, 'Lipton', './data/img/items/1641145562.jpg', 0, 1, 2, NULL, 'Tea', 1, 0),
(15, 'Tra Dao Cam Sa', './data/img/items/1641145606.jpg', 1, 2, 3, NULL, 'Tea', 1, 0),
(16, 'Oolong Tea', './data/img/items/1641145697.jpg', 1, 0, 3, NULL, 'Tea', 1, 0),
(17, 'Hot Chocolate', './data/img/items/1641145761.jpg', 0, 3, 5, NULL, 'Other Drink', 0, 1),
(18, 'White Chocolate', './data/img/items/1641145827.webp', 0, 3, 5, NULL, 'Other Drink', 1, 1),
(19, 'Lemonade', './data/img/items/1641145871.jpg', 1, 2, 0, NULL, 'Other Drink', 1, 1),
(20, 'Apple Juice', './data/img/items/1641145928.jpg', 1, 2, 3, NULL, 'Other Drink', 1, 1),
(21, 'Milkshake', './data/img/items/1641145960.png', 2, 3, 0, NULL, 'Other Drink', 1, 1),
(22, 'Milkshake Chocolate', './data/img/items/1641146010.jpg', 3, 4, 0, NULL, 'Other Drink', 1, 1),
(23, 'Milkshake Strawberry', './data/img/items/1641146092.jpg', 3, 4, 0, NULL, 'Other Drink', 1, 1),
(24, 'Bubble Milk Tea', './data/img/items/1641146140.jpg', 0, 2, 3, NULL, 'Other Drink', 1, 1),
(25, 'Milk Tea Oolong', './data/img/items/1641146167.jpg', 0, 2, 3, NULL, 'Other Drink', 1, 1),
(26, 'Milk Tea Latte Macchiato', './data/img/items/1641146240.jpg', 0, 3, 4, NULL, 'Other Drink', 1, 1),
(27, 'Frappuccino ', './data/img/items/1641146300.jpg', 2, 4, 0, NULL, 'Coffee', 0, 0),
(28, 'Frappuccino Chocolate', './data/img/items/1641146324.jpg', 3, 5, 0, NULL, 'Coffee', 0, 0),
(29, 'Frappuccino Cookie', './data/img/items/1641146351.webp', 3, 5, 0, NULL, 'Coffee', 0, 0),
(30, 'Frappuccino Matcha', './data/img/items/1641146377.jpg', 3, 5, 0, NULL, 'Coffee', 0, 0),
(31, 'Frappuccino Caramel', './data/img/items/1641146401.jpg', 3, 5, 0, NULL, 'Coffee', 0, 0),
(32, 'Tiramisu', './data/img/items/1641146427.png', 3, 5, 6, NULL, 'Food', 0, 0),
(33, 'Red Velvet', './data/img/items/1641146471.jpg', 0, 5, 7, NULL, 'Food', 0, 0),
(34, 'Cheesecake', './data/img/items/1641146509.jpg', 0, 4, 5, NULL, 'Food', 0, 0),
(35, 'Mousse Chocolate', './data/img/items/1641146553.jpg', 0, 0, 7, NULL, 'Food', 0, 0),
(36, 'Butter&Garlic bagel', './data/img/items/1641146603.jpg', 0, 3, 0, NULL, 'Food', 0, 0),
(37, 'Chocolate Fondant', './data/img/items/1641146714.jpg', 0, 0, 6, NULL, 'Food', 0, 0),
(38, 'Chocolate Brownie', './data/img/items/1641146759.jpg', 0, 4, 0, NULL, 'Food', 0, 0),
(39, 'Chocolate Chip Cookie', './data/img/items/1641146784.jpg', 1, 0, 0, NULL, 'Food', 0, 0),
(40, 'Croissant', './data/img/items/1641146834.png', 2, 3, 0, NULL, 'Food', 0, 0),
(41, 'Chocolate Croissant', './data/img/items/1641146899.jpg', 0, 4, 5, NULL, 'Food', 0, 0),
(42, 'Blue Berry Muffin', './data/img/items/1641146953.jpg', 0, 3, 0, NULL, 'Food', 0, 0),
(43, 'Bong Lan Trung Muoi Cha Bong', './data/img/items/1641147020.jpg', 0, 3, 0, NULL, 'Food', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `price` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `description`, `price`, `status`) VALUES
(1, 6, '2022-01-03 14:32:42', 'Name: King Steven\nPhone: 1002400090\nAddress: 149/10500/80Test street, Example city', 58, 'Pending'),
(2, 6, '2022-01-03 14:37:15', 'Name: King Steven\nPhone: 1002400090\nAddress: 149/10500/80Test street, Example city', 0, 'Pending'),
(3, 6, '2022-01-03 14:40:22', 'Name: King Steven\nPhone: 1002400090\nAddress: 149/10500/80Test street, Example city', 54, 'Pending'),
(4, 6, '2022-01-03 14:41:43', 'Name: King Steven\nPhone: 1002400090\nAddress: 149/10500/80Test street, Example city', 44, 'Pending'),
(5, 6, '2022-01-03 14:42:42', 'Name: King Steven\nPhone: 1002400090\nAddress: 149/10500/80Test street, Example city', 16, 'Pending'),
(6, 7, '2022-01-03 16:57:19', 'Name: Kochhar Neena\nPhone: 1011700090\nAddress: 150/10000/80Test street, Example city', 38, 'Pending'),
(7, 8, '2022-01-03 16:58:20', 'Name: Hunold Alexander\nPhone: 103900060\nAddress: 102/17000/90 Test street, Example city', 20, 'Pending'),
(8, 9, '2022-01-03 16:59:19', 'Name: Ernst Bruce\nPhone: 104600060\nAddress: 103/9000/60 Test street, Example city', 17, 'Pending'),
(9, 10, '2022-01-03 17:00:39', 'Name: Austin David\nPhone: 105480060\nAddress: 104/6000/60 Test street, Example city', 19, 'Pending'),
(10, 11, '2022-01-03 17:01:23', 'Name: Pataballa Valli\nPhone: 106480060\nAddress: 105/4800/60 Test street, Example city', 10, 'Pending'),
(11, 12, '2022-01-03 17:02:17', 'Name: Lorentz Diana\nPhone: 107420060\nAddress: 106/4800/60 Test street, Example city', 36, 'Pending'),
(12, 13, '2022-01-03 17:03:10', 'Name: Greenberg Nancy\nPhone: 10812008100\nAddress: 107/4200/60 Test street, Example city', 5, 'Pending'),
(13, 14, '2022-01-03 17:03:47', 'Name: Faviet Daniel\nPhone: 1099000100\nAddress: 108/12008/100 Test street, Example city', 18, 'Pending'),
(14, 15, '2022-01-03 17:05:07', 'Name: Chen John\nPhone: 1108200100\nAddress: 109/9000/100 Test street, Example city', 5, 'Pending'),
(15, 16, '2022-01-03 17:05:48', 'Name: Sciarra Ismael\nPhone: 1117700100\nAddress: 110/8200/100 Test street, Example city', 10, 'Pending'),
(16, 17, '2022-01-03 17:10:01', 'Name: Urman Jose Manuel\nPhone: 1127800100\nAddress: 111/7700/100 Test street, Example city', 17, 'Pending'),
(17, 18, '2022-01-03 17:11:45', 'Name: Popp Luis\nPhone: 1136900100\nAddress: 112/7800/100 Test street, Example city', 6, 'Pending'),
(18, 19, '2022-01-03 17:21:55', 'Name: Raphaely Den\nPhone: 1141100030\nAddress: 113/6900/100 Test street, Example city', 5, 'Pending'),
(19, 20, '2022-01-03 17:25:33', 'Name: Khoo Alexander\nPhone: 115310030\nAddress: 114/11000/30 Test street, Example city', 11, 'Pending'),
(20, 21, '2022-01-03 17:28:26', 'Name: Baida Shelli\nPhone: 116290030\nAddress: 115/3100/30 Test street, Example city', 6, 'Pending'),
(21, 22, '2022-01-03 17:34:47', 'Name: Tobias Sigal\nPhone: 117280030\nAddress: 116/2900/30 Test street, Example city', 21, 'Pending'),
(22, 23, '2022-01-03 17:35:12', 'Name: Himuro Guy\nPhone: 118260030\nAddress: 117/2800/30 Test street, Example city', 7, 'Pending'),
(23, 24, '2022-01-03 18:03:06', 'Name: Colmenares Karen\nPhone: 119250030\nAddress: 118/2600/30 Test street, Example city', 6, 'Pending'),
(24, 25, '2022-01-03 18:03:57', 'Name: Weiss Matthew\nPhone: 120800050\nAddress: 119/2500/30 Test street, Example city', 61, 'Pending'),
(25, 26, '2022-01-03 18:04:32', 'Name: Fripp Adam\nPhone: 121820050\nAddress: 120/8000/50 Test street, Example city', 21, 'Pending'),
(26, 27, '2022-01-03 18:05:45', 'Name: Kaufling Payam\nPhone: 122790050\nAddress: 121/8200/50 Test street, Example city', 43, 'Pending'),
(27, 28, '2022-01-03 18:06:22', 'Name: Vollman Shanta\nPhone: 123650050\nAddress: 122/7900/50 Test street, Example city', 32, 'Pending'),
(28, 29, '2022-01-03 18:06:47', 'Name: Mourgos Kevin\nPhone: 124580050\nAddress: 123/6500/50 Test street, Example city', 9, 'Pending'),
(29, 30, '2022-01-03 18:07:27', 'Name: Nayer Julia\nPhone: 125320050\nAddress: 124/5800/50 Test street, Example city', 7, 'Pending'),
(30, 31, '2022-01-03 18:08:04', 'Name: Mikkilineni Irene\nPhone: 126270050\nAddress: 125/3200/50 Test street, Example city', 27, 'Pending'),
(31, 32, '2022-01-03 18:08:50', 'Name: Landry James\nPhone: 127240050\nAddress: 126/2700/50 Test street, Example city', 42, 'Pending'),
(32, 33, '2022-01-03 18:09:13', 'Name: Markle Steven\nPhone: 128220050\nAddress: 127/2400/50 Test street, Example city', 19, 'Pending'),
(33, 33, '2022-01-03 18:12:09', 'Name: Markle Steven\nPhone: 128220050\nAddress: 127/2400/50 Test street, Example city', 6, 'Pending'),
(34, 0, '2022-01-03 18:14:46', 'Name: \nPhone : \nAddress: ', 10, 'Pending'),
(35, 34, '2022-01-03 18:15:26', 'Name: Bissot Laura\nPhone: 129330050\nAddress: 128/2200/50 Test street, Example city', 11, 'Pending'),
(36, 35, '2022-01-03 18:16:47', 'Name: Atkinson Mozhe\nPhone: 130280050\nAddress: 129/3300/50 Test street, Example city', 9, 'Pending'),
(37, 36, '2022-01-03 18:17:33', 'Name: Marlow James\nPhone: 131250050\nAddress: 130/2800/50 Test street, Example city', 5, 'Pending'),
(38, 37, '2022-01-03 18:17:55', 'Name: Olson TJ\nPhone: 132210050\nAddress: 131/2500/50 Test street, Example city', 6, 'Pending'),
(39, 38, '2022-01-03 18:18:22', 'Name: Mallin Jason\nPhone: 133330050\nAddress: 132/2100/50 Test street, Example city', 2, 'Pending'),
(40, 39, '2022-01-03 18:18:51', 'Name: Rogers Michael\nPhone: 134290050\nAddress: 133/3300/50 Test street, Example city', 13, 'Pending'),
(41, 40, '2022-01-03 18:19:12', 'Name: Gee Ki\nPhone: 135240050\nAddress: 134/2900/50 Test street, Example city', 12, 'Pending'),
(42, 41, '2022-01-03 18:19:37', 'Name: Philtanker Hazel\nPhone: 136220050\nAddress: 135/2400/50 Test street, Example city', 9, 'Pending'),
(43, 42, '2022-01-03 18:20:14', 'Name: Ladwig Renske\nPhone: 137360050\nAddress: 136/2200/50 Test street, Example city', 13, 'Pending'),
(44, 43, '2022-01-03 18:20:40', 'Name: Stiles Stephen\nPhone: 138320050\nAddress: 137/3600/50 Test street, Example city', 4, 'Pending'),
(45, 44, '2022-01-03 18:21:38', 'Name: Seo John\nPhone: 139270050\nAddress: 138/3200/50 Test street, Example city', 33, 'Pending'),
(46, 45, '2022-01-03 18:22:30', 'Name: Patel Joshua\nPhone: 140250050\nAddress: 139/2700/50 Test street, Example city', 49, 'Pending'),
(47, 46, '2022-01-03 18:23:20', 'Name: Rajs Trenna\nPhone: 141350050\nAddress: 140/2500/50 Test street, Example city', 29, 'Pending'),
(48, 47, '2022-01-03 18:24:00', 'Name: Davies Curtis\nPhone: 142310050\nAddress: 141/3500/50 Test street, Example city', 24, 'Pending'),
(49, 48, '2022-01-03 18:24:51', 'Name: Matos Randall\nPhone: 143260050\nAddress: 142/3100/50 Test street, Example city', 45, 'Pending'),
(50, 49, '2022-01-03 18:26:32', 'Name: Vargas Peter\nPhone: 144250050\nAddress: 143/2600/50 Test street, Example city', 56, 'Pending'),
(51, 50, '2022-01-03 18:27:43', 'Name: Russell John\nPhone: 1451400080\nAddress: 144/2500/50 Test street, Example city', 64, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `options` varchar(20) NOT NULL,
  `size` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `quantity`, `price`, `options`, `size`) VALUES
(1, 1, 1, 3, '50% ice', 'm'),
(1, 2, 4, 12, '50% ice', 'm'),
(1, 21, 1, 24, '50% ice, 50% sugar', 'M'),
(1, 23, 1, 24, '50% ice, 50% sugar', 'M'),
(1, 38, 1, 12, '', 'M'),
(1, 39, 2, 24, '', ''),
(1, 39, 1, 24, '', 'S'),
(1, 40, 1, 12, '', 'M'),
(2, 5, 1, 0, '50% ice', 'M'),
(2, 16, 2, 0, '50% ice', 'L'),
(2, 17, 1, 0, '50% sugar', 'M'),
(2, 22, 3, 0, '50% ice, 50% sugar', 'M'),
(2, 26, 1, 0, '50% ice, 50% sugar', 'M'),
(2, 35, 1, 0, '', 'L'),
(3, 5, 2, 6, '50% ice', 'M'),
(3, 16, 1, 0, '100% ice', 'S'),
(3, 17, 1, 0, '100% sugar', 'L'),
(3, 22, 1, 3, '100% ice, 50% sugar', 'M'),
(3, 22, 1, 3, '50% ice, 50% sugar', 'M'),
(3, 25, 3, 9, '50% ice, 50% sugar', 'M'),
(3, 32, 2, 6, '', 'M'),
(3, 43, 4, 12, '', 'M'),
(4, 1, 1, 4, 'hot', 'L'),
(4, 4, 1, 4, 'hot', 'L'),
(4, 6, 1, 4, 'hot', 'L'),
(4, 6, 1, 3, 'hot', 'M'),
(4, 7, 1, 0, 'hot', 'S'),
(4, 9, 1, 4, '50% ice', 'L'),
(4, 20, 1, 4, '50% ice, 0% sugar', 'L'),
(4, 21, 1, 0, '50% ice, 50% sugar', 'S'),
(4, 26, 1, 4, '50% ice, 0% sugar', 'L'),
(5, 11, 1, 6, '0% ice', 'L'),
(5, 12, 1, 6, 'hot', 'L'),
(5, 26, 1, 0, 'hot, 50% sugar', 'M'),
(5, 37, 1, 6, '', 'L'),
(6, 3, 1, 2, '50% ice', 'M'),
(6, 8, 1, 2, '50% ice', 'M'),
(6, 19, 1, 2, '50% ice, 50% sugar', 'M'),
(6, 20, 3, 6, '50% ice, 50% sugar', 'M'),
(6, 26, 2, 4, '50% ice, 50% sugar', 'M'),
(6, 27, 1, 2, '', 'M'),
(6, 34, 2, 4, '', 'M'),
(7, 3, 1, 3, '50% ice', 'M'),
(7, 6, 1, 3, '50% ice', 'M'),
(7, 7, 1, 3, '50% ice', 'M'),
(7, 43, 1, 3, '', 'M'),
(8, 9, 1, 0, '50% ice', 'M'),
(8, 32, 1, 0, '', 'M'),
(8, 37, 1, 6, '', 'L'),
(8, 43, 1, 0, '', 'M'),
(9, 4, 1, 2, '50% ice', 'M'),
(9, 7, 1, 2, '50% ice', 'M'),
(9, 22, 1, 2, '50% ice, 50% sugar', 'M'),
(9, 24, 1, 2, '50% ice, 50% sugar', 'M'),
(9, 25, 1, 2, '50% ice, 50% sugar', 'M'),
(10, 9, 1, 3, '50% ice', 'M'),
(10, 15, 1, 3, '50% ice', 'M'),
(10, 24, 1, 3, '50% ice, 50% sugar', 'M'),
(10, 43, 1, 3, '', 'M'),
(11, 4, 1, 3, '50% ice', 'M'),
(11, 5, 1, 3, '50% ice', 'M'),
(11, 7, 1, 3, '50% ice', 'M'),
(11, 16, 1, 3, '50% ice', ''),
(11, 17, 1, 3, '50% sugar', 'M'),
(11, 40, 1, 3, '', 'M'),
(11, 41, 1, 3, '', 'M'),
(11, 42, 1, 3, '', 'M'),
(12, 19, 1, 2, '50% ice, 50% sugar', 'M'),
(12, 21, 1, 2, '50% ice, 50% sugar', 'M'),
(13, 8, 1, 5, '50% ice', 'M'),
(13, 19, 1, 5, '50% ice, 50% sugar', 'M'),
(13, 22, 1, 5, '50% ice, 50% sugar', 'M'),
(13, 33, 1, 5, '', 'M'),
(14, 30, 1, 5, '', 'M'),
(15, 3, 1, 0, '50% ice', 'M'),
(15, 38, 1, 0, '', 'M'),
(15, 39, 1, 1, '', 'S'),
(16, 4, 1, 6, '50% ice', 'M'),
(16, 5, 1, 6, '50% ice', 'M'),
(16, 6, 1, 6, '50% ice', 'M'),
(17, 20, 1, 4, '50% ice, 50% sugar', 'M'),
(17, 27, 1, 4, '', 'M'),
(18, 10, 1, 5, '50% ice', 'M'),
(19, 26, 1, 3, '50% ice, 50% sugar', 'M'),
(19, 28, 1, 3, '', 'M'),
(19, 42, 1, 3, '', 'M'),
(20, 7, 1, 6, '50% ice', 'M'),
(21, 31, 1, 5, '', 'M'),
(21, 35, 1, 0, '', 'L'),
(21, 36, 1, 5, '', 'M'),
(21, 40, 1, 5, '', 'M'),
(21, 43, 1, 5, '', 'M'),
(22, 8, 1, 7, '50% ice', 'M'),
(23, 23, 1, 2, '50% ice, 50% sugar', 'M'),
(23, 24, 1, 2, '50% ice, 50% sugar', 'M'),
(24, 2, 9, 54, '50% ice', 'M'),
(24, 3, 2, 12, '50% ice', 'M'),
(24, 6, 1, 6, '50% ice', 'M'),
(25, 4, 1, 5, '50% ice', 'M'),
(25, 7, 1, 5, '50% ice', 'M'),
(25, 8, 1, 5, '50% ice', 'M'),
(25, 9, 1, 5, '50% ice', 'M'),
(26, 22, 1, 4, '50% ice, 50% sugar', 'M'),
(26, 37, 5, 0, '', 'L'),
(26, 43, 3, 12, '', 'M'),
(27, 8, 2, 0, '50% ice', 'M'),
(27, 11, 2, 0, '50% ice', 'M'),
(27, 12, 1, 0, '50% ice', 'M'),
(27, 13, 1, 0, '50% ice', 'M'),
(27, 16, 1, 0, '50% ice', ''),
(28, 9, 1, 3, '50% ice', 'M'),
(28, 40, 2, 6, '', 'M'),
(29, 16, 1, 3, '50% ice', ''),
(29, 16, 1, 0, '50% ice', 'S'),
(29, 17, 1, 3, '50% sugar', 'M'),
(29, 18, 1, 3, '50% ice, 50% sugar', 'M'),
(30, 1, 1, 3, '50% ice', 'M'),
(30, 4, 1, 3, '50% ice', 'M'),
(30, 7, 2, 6, '50% ice', 'M'),
(30, 22, 1, 3, '50% ice, 50% sugar', 'M'),
(30, 26, 1, 3, '50% ice, 50% sugar', 'M'),
(31, 31, 2, 0, '', 'M'),
(31, 33, 3, 21, '', 'L'),
(31, 33, 1, 0, '', 'M'),
(31, 35, 1, 0, '', ''),
(31, 36, 1, 0, '', 'M'),
(32, 5, 1, 7, '50% ice', 'M'),
(32, 6, 1, 7, '50% ice', 'M'),
(32, 8, 1, 7, '50% ice', 'M'),
(33, 11, 1, 3, '50% ice', 'M'),
(33, 17, 1, 3, '50% sugar', 'M'),
(34, 8, 1, 3, '50% ice', 'M'),
(34, 9, 1, 3, '50% ice', 'M'),
(35, 4, 1, 5, '50% ice', 'M'),
(35, 7, 1, 5, '50% ice', 'M'),
(36, 28, 1, 4, '', 'M'),
(36, 34, 1, 4, '', 'M'),
(37, 20, 1, 3, '50% ice, 50% sugar', 'M'),
(37, 43, 1, 3, '', 'M'),
(38, 6, 1, 6, '50% ice', 'M'),
(39, 15, 1, 2, '50% ice', 'M'),
(40, 1, 1, 3, '50% ice', 'M'),
(40, 2, 1, 3, '50% ice', 'M'),
(40, 3, 1, 3, '50% ice', 'M'),
(41, 5, 1, 6, '50% ice', 'M'),
(41, 6, 1, 6, '50% ice', 'M'),
(42, 7, 1, 6, '50% ice', 'M'),
(42, 9, 1, 6, '50% ice', 'M'),
(43, 10, 1, 0, '50% ice', 'M'),
(43, 13, 1, 0, '50% ice', 'M'),
(43, 16, 1, 3, '50% ice', 'L'),
(44, 11, 1, 1, '50% ice', 'M'),
(44, 14, 1, 1, '50% ice', 'M'),
(45, 15, 3, 18, '50% ice', 'L'),
(45, 15, 1, 0, '50% ice', 'M'),
(45, 17, 1, 0, '50% sugar', 'M'),
(45, 18, 1, 0, 'hot, 50% sugar', 'M'),
(45, 37, 1, 0, '', ''),
(45, 40, 1, 0, '', 'M'),
(45, 41, 1, 0, '', 'M'),
(45, 42, 1, 0, '', 'M'),
(45, 43, 1, 0, '', 'M'),
(46, 4, 1, 5, '50% ice', 'M'),
(46, 6, 1, 5, '50% ice', 'M'),
(46, 7, 1, 5, '50% ice', 'M'),
(46, 19, 1, 5, '50% ice, 50% sugar', 'M'),
(46, 20, 1, 5, '50% ice, 50% sugar', 'M'),
(46, 32, 1, 6, '', 'L'),
(46, 33, 2, 12, '', 'L'),
(46, 33, 1, 5, '', 'M'),
(46, 36, 1, 5, '', 'M'),
(47, 4, 1, 3, '50% ice', 'M'),
(47, 12, 1, 3, '50% ice', 'M'),
(47, 17, 1, 3, '50% sugar', 'M'),
(47, 23, 1, 3, '50% ice, 50% sugar', 'M'),
(47, 27, 1, 3, '', 'M'),
(47, 31, 1, 3, '', 'M'),
(47, 36, 1, 3, '', 'M'),
(47, 40, 1, 3, '', 'M'),
(48, 22, 1, 4, '50% ice, 50% sugar', 'M'),
(48, 24, 2, 0, '50% ice, 0% sugar', 'L'),
(48, 24, 1, 4, '50% ice, 100% sugar', 'M'),
(48, 24, 2, 0, '50% ice, 50% sugar', 'L'),
(48, 24, 1, 4, '50% ice, 50% sugar', 'M'),
(48, 27, 1, 4, '', 'M'),
(49, 5, 1, 5, '50% ice', 'M'),
(49, 6, 1, 5, '50% ice', 'M'),
(49, 8, 2, 10, '50% ice', 'M'),
(49, 21, 1, 5, '50% ice, 50% sugar', 'M'),
(49, 26, 2, 10, '50% ice, 50% sugar', 'M'),
(49, 32, 1, 5, '', 'M'),
(49, 33, 1, 5, '', 'M'),
(50, 6, 1, 0, '50% ice', 'M'),
(50, 9, 1, 6, '50% ice', 'L'),
(50, 9, 1, 0, '50% ice', 'M'),
(50, 26, 1, 0, '50% ice, 50% sugar', 'M'),
(50, 27, 1, 0, '', 'M'),
(50, 33, 1, 0, '', 'M'),
(50, 37, 5, 30, '', 'L'),
(51, 2, 1, 3, '50% ice', 'M'),
(51, 5, 1, 3, '50% ice', 'M'),
(51, 6, 1, 3, '50% ice', 'M'),
(51, 13, 1, 3, '50% ice', 'M'),
(51, 17, 1, 3, '50% sugar', 'M'),
(51, 25, 1, 3, '50% ice, 50% sugar', 'M'),
(51, 31, 1, 3, '', 'M'),
(51, 32, 1, 3, '', 'M'),
(51, 35, 3, 0, '', 'L'),
(51, 43, 2, 6, '', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `name`, `email`, `hashed_password`, `phone`, `gender`, `role`, `avatar`) VALUES
(1, 'BigBoss', 'NguyenTS', 'assmin@qcoffee.com', '$2y$10$IRyk1M3Z2JtREnLbKCYRAu6wacWYjRlR3YIWoz0RKDcAAbosYXzEi', '+79627824127', 0, 1, './data/img/staff/1/avatar.jpg'),
(2, 'Slave1', 'Staff no.1', 'staff1@qcoffee.com', '$2y$10$guZwF2v8ALBAqJj3fnuJSutdPCEwyqBuXjBSTE3Gh/30XFaNL.CeG', '+84987654321', 0, 0, NULL),
(3, 'Slave 2', 'slave2', 'staff2@qcoffee.com', '$2y$10$MiiSGdpEG8g5uufqeKeJOObNTRwHwKdkq4lNnrcHzHEzwT5uyK7LC', '+84987654321', 0, 0, './data/img/staff/3/1640629705.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`item_id`,`options`,`size`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
