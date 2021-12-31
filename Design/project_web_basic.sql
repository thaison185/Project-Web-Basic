-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2021 at 12:08 AM
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
-- Database: `project_web_basic`
--

-- CREATE DATABASE project_web_basic;
-- use project_web_basic;

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
  `address` varchar(200) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `name`, `email`, `phone`, `DOB`, `address`, `hashed_password`, `gender`, `avatar`) VALUES
(0, 'noneaccountcustomer', 'None Account Customer', 'noneaccountcustomer@meaning.less', '000000000000', '2021-12-01', 'meaninglesssssss', '$2y$10$lnib2hcdyLxtRELTLksPsOO5GcooUZL3anmLJ.gV1YTAw6TM6QOJO', 0, NULL),
(105, 'customer1', 'Customer Customer', 'customer1@gm.cm', '090909091', '2000-12-12', '12345 hoa binh', '$2y$10$dJEg2vJ1..fCw.qV7JoJXObNUX2U/S2ajFRWE5EI.VIMYNaV9R03u', 0, './assests/img/avatar/16408522904663.tmp'),
(106, 'customer2', 'Customer Customer', 'customer2@gm.cm', '090909092', '2000-12-12', '12345 hoa binh', '$2y$10$.DZrtN7mD862GAsRvRsUhOaOMPXnKHJnBdJp8QUlnsAu/hyIBBESi', 0, ''),
(107, 'customer3', 'Customer Customer', 'customer3@gm.cm', '090909093', '2000-12-12', '12345 hoa binh', '$2y$10$snIGjc7nikzUv/lqX4Q1NOjwy9eGUYkfihqPVQwE88tvx3t35LBXO', 0, ''),
(108, 'customer4', 'Customer Customer', 'customer4@gm.cm', '090909094', '2000-12-12', '12345 hoa binh', '$2y$10$QA4EC6.0.Yh7igxlOKEqQewyyN4eFF.aNedTNzKsODfUNu01uFcym', 0, ''),
(109, 'customer5', 'Customer Customer', 'customer5@gm.cm', '090909095', '2000-12-12', '12345 hoa binh', '$2y$10$WVzgqQ8hAYUJgIDwMNLD4OYoEl9U8Uj7GCqXelFOZD4LAX7tWAp5e', 0, ''),
(110, 'customer6', 'Customer Customer', 'customer6@gm.cm', '090909096', '2000-12-12', '12345 hoa binh', '$2y$10$igtZNmlcvQ.bUiRPlLrbnOCIgSKgwNe2dQg2eX2iBKwCqwhHr38lW', 0, ''),
(111, 'customer7', 'Customer Customer', 'customer7@gm.cm', '090909097', '2000-12-12', '12345 hoa binh', '$2y$10$Yi6tWpDn/Xi4qbs/g8fEGe4UIVQqh7KL6CdYFFkpHISqA8ewQcA06', 0, ''),
(112, 'customer8', 'Customer Customer', 'customer8@gm.cm', '090909098', '2000-12-12', '12345 hoa binh', '$2y$10$METFSuz2.fJ9Rby0rK5URO9I12Uc1br5AvOuXHEuvSdV2vSVfFeY6', 0, ''),
(113, 'customer9', 'Customer Customer', 'customer9@gm.cm', '090909099', '2000-12-12', '12345 hoa binh', '$2y$10$U0nF4nLZtnPDp2ObKwQLIOvwOcdsCxl0A6us3jZY4.2ikFyMYBy8C', 0, ''),
(114, 'customer10', 'Customer Customer', 'customer10@gm.cm', '0909090910', '2000-12-12', '12345 hoa binh', '$2y$10$Vx3223ChUPti9GjWrnrbk.lNbYBeIP6iE9QyZq0JIf2FzfVJYBOAW', 0, ''),
(115, 'customer11', 'Customer Customer', 'customer11@gm.cm', '0909090911', '2000-12-12', '12345 hoa binh', '$2y$10$HilgA4XEkioMFt8mi8h/8uaCNS7k5j2IY.3ZM5Mwek5MB5uSQg1ha', 0, ''),
(116, 'customer12', 'Customer Customer', 'customer12@gm.cm', '0909090912', '2000-12-12', '12345 hoa binh', '$2y$10$jB3Nr4Y2KALG5C.SW/SQmeaxcccxrG57kYZNzTwgcEXzpUFGjH3Qq', 0, ''),
(117, 'customer13', 'Customer Customer', 'customer13@gm.cm', '0909090913', '2000-12-12', '12345 hoa binh', '$2y$10$fN9pH5z6fpb1Wox8.vN4ruimiIcV0u02wBg64P0xHegoUbQ6TNWnS', 0, ''),
(118, 'customer14', 'Customer Customer', 'customer14@gm.cm', '0909090914', '2000-12-12', '12345 hoa binh', '$2y$10$ymz80XEyW/gUtnkTWbN6wuNaRk7c8krdEwq7hbRfKj9vex7CKUeBq', 0, ''),
(119, 'customer15', 'Customer Customer', 'customer15@gm.cm', '0909090915', '2000-12-12', '12345 hoa binh', '$2y$10$KCcpfLiqbwxblZT9ORzXee.Dt/Vi.q4dKjIWQ0tsDSZWeKcnw4n7K', 0, ''),
(120, 'customer16', 'Customer Customer', 'customer16@gm.cm', '0909090916', '2000-12-12', '12345 hoa binh', '$2y$10$YFAqcsWagJd7cmzyqLsEu.FGDabxIWrHtCZXWSU3LMdN5uBVKiCRa', 0, ''),
(121, 'customer17', 'Customer Customer', 'customer17@gm.cm', '0909090917', '2000-12-12', '12345 hoa binh', '$2y$10$MOgUbCHCQHE3g7zCNjZtseCqY01rmIeMJ9Kmn5mRTm7VERsIdOIne', 0, ''),
(122, 'customer18', 'Customer Customer', 'customer18@gm.cm', '0909090918', '2000-12-12', '12345 hoa binh', '$2y$10$YpVOZV9fFz966mr3rn9F0uvWwXeoM.RtTRrsPOEG7ZUxt0Sp.cXum', 0, ''),
(123, 'customer19', 'Customer Customer', 'customer19@gm.cm', '0909090919', '2000-12-12', '12345 hoa binh', '$2y$10$7cpbb1Ih4CCzdJcDUfxYheTeHJ.kfkOWE6J10zoEwoOJkm9U8mGVu', 0, ''),
(124, 'customer20', 'Customer Customer', 'customer20@gm.cm', '0909090920', '2000-12-12', '12345 hoa binh', '$2y$10$NksRutrbH6d1N3FOogn7Oe65ODtrkf2xqcL9XqOyu45v/5Q0NGYj2', 0, ''),
(125, 'customer21', 'Customer Customer', 'customer21@gm.cm', '0909090921', '2000-12-12', '12345 hoa binh', '$2y$10$vQVCzPho5habxvK.M163/.V9q2Fy1r5cDhaaHYi6KRbAprAOgMRoK', 0, ''),
(126, 'customer22', 'Customer Customer', 'customer22@gm.cm', '0909090922', '2000-12-12', '12345 hoa binh', '$2y$10$EGMB1mS3gmB.aIWFmAjWKe3ONpqAzYoZTiY/IboI9WIHQSNNOwCD2', 0, ''),
(127, 'customer23', 'Customer Customer', 'customer23@gm.cm', '0909090923', '2000-12-12', '12345 hoa binh', '$2y$10$hYI0MBuNfuGoEpdwtZYHU.rDg2jggvyYZD3I4FDD0CF9efmggWfOW', 0, ''),
(128, 'customer24', 'Customer Customer', 'customer24@gm.cm', '0909090924', '2000-12-12', '12345 hoa binh', '$2y$10$73E9GOIdvkSx0Jj8ZJbCie3tQExhAtq6WJ4LEAJ8AKOtHUmmR/ywm', 0, ''),
(129, 'customer25', 'Customer Customer', 'customer25@gm.cm', '0909090925', '2000-12-12', '12345 hoa binh', '$2y$10$MGd6eFsgkjvWKnhJQ/oG8OfMne.drilrsgYZwCs4gkqnch3uVyYL6', 0, ''),
(130, 'customer26', 'Customer Customer', 'customer26@gm.cm', '0909090926', '2000-12-12', '12345 hoa binh', '$2y$10$anUBUyNuKh1zyhj4HU.GUuo3JaCpiMZsVarsS0MYg8f9Nwqg8Zw7.', 0, ''),
(131, 'customer27', 'Customer Customer', 'customer27@gm.cm', '0909090927', '2000-12-12', '12345 hoa binh', '$2y$10$K4eGsosJZ2tmDCEFgmTx8eUdo4MVEcomaRFXGdnEkGnifAuKC1V3m', 0, ''),
(132, 'customer28', 'Customer Customer', 'customer28@gm.cm', '0909090928', '2000-12-12', '12345 hoa binh', '$2y$10$En9ZeFkNs0rXQEJNcGceTuxGAKIPlqRkNZV217JSWQaX2aA7u9ke6', 0, ''),
(133, 'customer29', 'Customer Customer', 'customer29@gm.cm', '0909090929', '2000-12-12', '12345 hoa binh', '$2y$10$EVu/TRhAinlq1em7loRuweYE.Rsgrn4hsIYzOu/IlT5GIfc2dswwG', 0, ''),
(134, 'customer30', 'Customer Customer', 'customer30@gm.cm', '0909090930', '2000-12-12', '12345 hoa binh', '$2y$10$.Qtu/RDe9ffoqq5dzkSNx.PmSqVZl3nGs0e0xXHJRob5aX1JKFoaG', 0, ''),
(135, 'customer31', 'Customer Customer', 'customer31@gm.cm', '0909090931', '2000-12-12', '12345 hoa binh', '$2y$10$39eMhr.7KiYaRIzTnBRlvOFmNpRdZqmtkkgegrSIFAHHVHVm/wXjq', 0, ''),
(136, 'customer32', 'Customer Customer', 'customer32@gm.cm', '0909090932', '2000-12-12', '12345 hoa binh', '$2y$10$e57KHl5sukxQuBIlJWg98.drT8GigGOgApSK3FRw34UJ8ktTdZaGm', 0, ''),
(137, 'customer33', 'Customer Customer', 'customer33@gm.cm', '0909090933', '2000-12-12', '12345 hoa binh', '$2y$10$e84Ehz0BKdCD1Y6JUg/WwelYaht56tLUFoAo7aG7L0GL9zGoZzH3e', 0, ''),
(138, 'customer34', 'Customer Customer', 'customer34@gm.cm', '0909090934', '2000-12-12', '12345 hoa binh', '$2y$10$HPYRgBUBW4GF71Gn30WgS.1./GNuz3GJnqCVXKAQRSOfxGbvdyqpa', 0, ''),
(139, 'customer35', 'Customer Customer', 'customer35@gm.cm', '0909090935', '2000-12-12', '12345 hoa binh', '$2y$10$3DOnNp.p9knTXl0e9zzbQeNZtYd7l4LmMpDdnXvUdblZFy99lB.r6', 0, ''),
(140, 'customer36', 'Customer Customer', 'customer36@gm.cm', '0909090936', '2000-12-12', '12345 hoa binh', '$2y$10$ndU02Wy5vzqtCjFawGK2Iu3QKIvrQkmLlMRoBtvq4fEn6k96vwAKG', 0, ''),
(141, 'customer37', 'Customer Customer', 'customer37@gm.cm', '0909090937', '2000-12-12', '12345 hoa binh', '$2y$10$8QO6kSVmPvLZ3/ur2pIATOizuOB9gWcV4Yk1xj3D3R8fR3XoN9wzy', 0, ''),
(142, 'customer38', 'Customer Customer', 'customer38@gm.cm', '0909090938', '2000-12-12', '12345 hoa binh', '$2y$10$c421/EecVPbVm18zHDChhOqxeVbQB58t76JVKsYLtm8fFXKsUjsaK', 0, ''),
(143, 'customer39', 'Customer Customer', 'customer39@gm.cm', '0909090939', '2000-12-12', '12345 hoa binh', '$2y$10$B97bw2VZfMOBXpiwh13BL.PRnZxhZBsHvozy.Jld9583wuU4idr6e', 0, ''),
(144, 'customer40', 'Customer Customer', 'customer40@gm.cm', '0909090940', '2000-12-12', '12345 hoa binh', '$2y$10$Mv6A7yUP/DrivtNEr8wkKuCPQNpu/zQhyEiLHG7.ZzIbLXm14vy76', 0, ''),
(145, 'customer41', 'Customer Customer', 'customer41@gm.cm', '0909090941', '2000-12-12', '12345 hoa binh', '$2y$10$UeHaYpUAl1X4JFztmE0zie8qBWd4VndMq4V2ewH7W9pwkZ5Nq1RUG', 0, ''),
(146, 'customer42', 'Customer Customer', 'customer42@gm.cm', '0909090942', '2000-12-12', '12345 hoa binh', '$2y$10$82ZFmFw4DeyGMV7h8O5Kce95qDf/xLWNpBYnSN2a4kSm/4V8XD3bm', 0, ''),
(147, 'customer43', 'Customer Customer', 'customer43@gm.cm', '0909090943', '2000-12-12', '12345 hoa binh', '$2y$10$39746xorRlkq2UUSp3fOW.r4noKfbEpG0teL87Pc4hEm4GUUvafyS', 0, ''),
(148, 'customer44', 'Customer Customer', 'customer44@gm.cm', '0909090944', '2000-12-12', '12345 hoa binh', '$2y$10$TBYJN7F1wx6txw2q7YEqVe8H4hX/pqX58KjwaTgUvzaw0/C1oqmPe', 0, ''),
(149, 'customer45', 'Customer Customer', 'customer45@gm.cm', '0909090945', '2000-12-12', '12345 hoa binh', '$2y$10$DzjaeAs.93BMlxSel6BcneiPfr/P4DG2O.ZH0M0byEZB8cB0pYoVi', 0, ''),
(150, 'customer46', 'Customer Customer', 'customer46@gm.cm', '0909090946', '2000-12-12', '12345 hoa binh', '$2y$10$DX8SyUSwR/OIMDLLcXnqouERvXhiHLiSsAMT6suDn0j7DJSXS.uU2', 0, ''),
(151, 'customer47', 'Customer Customer', 'customer47@gm.cm', '0909090947', '2000-12-12', '12345 hoa binh', '$2y$10$Qs4/KqrmJcEVmttxapIpe.J8opPMB5uzNQ3/jRPkDG2Qi2PB/lKJC', 0, ''),
(152, 'customer48', 'Customer Customer', 'customer48@gm.cm', '0909090948', '2000-12-12', '12345 hoa binh', '$2y$10$pXvQ2LsKu/74xIiOd.dUsugLthPjVgVOIOl3h2nnJyCrMQGt5KqnG', 0, ''),
(153, 'customer49', 'Customer Customer', 'customer49@gm.cm', '0909090949', '2000-12-12', '12345 hoa binh', '$2y$10$71MUsarEUU8qzVBmhuLG3uAp9k654be/NZ042MBmfFEdXipwF/C2y', 0, '');

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
  `description` text NOT NULL,
  `ice` tinyint(1) NOT NULL,
  `sugar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `s_price`, `m_price`, `l_price`, `description`, `ice`, `sugar`) VALUES
(1, 'Capuchino', '	\r\n./assests/img/items/capuchino.png', 6, 8, 10, '', 0, 0),
(2, 'Cold brew', '	\n./assests/img/items/cold-brew.png', 0, 9, 0, '', 1, 0),
(3, 'Milk shake', './assests/img/items/milk-shake.png', 3, 5, 7, '', 0, 1),
(4, 'White chocolate mocha', './assests/img/items/white-chocolate-mocha.png', 7, 9, 10, '', 1, 1),
(12, 'temp1', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(13, 'temp2', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(14, 'temp3', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(15, 'temp4', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(16, 'temp5', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(17, 'temp6', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(18, 'temp7', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(19, 'temp8', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0),
(20, 'temp9', './assests/img/items/temp.png', 0, 0, 0, '', 0, 0);

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
  `reciever_info` text,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `description`, `price`, `reciever_info`, `status`) VALUES
(41, 105, '2021-12-30 08:18:53', '1 Milk shake size: l 100% sugar\n2 Cold brew size: m 100% ice\n3 Capuchino size: l\n ...', 95, NULL, 'pending'),
(42, 105, '2021-12-30 08:19:13', '1 Capuchino size: s\n', 6, NULL, 'pending'),
(43, 106, '2021-12-30 08:19:40', '8 White chocolate mocha size: l 100% ice 100% sugar\n', 80, NULL, 'pending'),
(44, 107, '2021-12-30 08:19:58', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(45, 107, '2021-12-30 08:20:22', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(46, 107, '2021-12-30 08:20:31', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(47, 107, '2021-12-30 08:20:35', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(48, 107, '2021-12-30 08:20:43', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(49, 107, '2021-12-30 08:20:47', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending'),
(65, 0, '2021-12-30 08:31:06', '1 Cold brew size: m 50% ice\n', 9, NULL, 'pending'),
(66, 0, '2021-12-30 08:31:11', '1 Cold brew size: m 50% ice\n', 9, NULL, 'pending'),
(67, 0, '2021-12-30 08:31:15', '1 Cold brew size: m 50% ice\n', 9, NULL, 'pending'),
(68, 0, '2021-12-30 08:31:38', '1 Cold brew size: m 100% ice\n1 Milk shake size: m 100% sugar\n1 White chocolate mocha size: m 100% ice 100% sugar\n ...', 33, NULL, 'pending'),
(69, 0, '2021-12-30 08:31:43', '1 Cold brew size: m 100% ice\n', 9, NULL, 'pending');

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
(41, 1, 3, 30, '', 'l'),
(41, 2, 2, 18, '100% ice', 'm'),
(41, 3, 1, 10, '100% sugar', 'l'),
(41, 4, 4, 40, '100% ice, 100% sugar', 'l'),
(42, 1, 1, 6, '', 's'),
(43, 4, 8, 80, '100% ice, 100% sugar', 'l'),
(44, 2, 1, 9, '100% ice', 'm'),
(45, 2, 1, 9, '100% ice', 'm'),
(46, 2, 1, 9, '100% ice', 'm'),
(47, 2, 1, 9, '100% ice', 'm'),
(48, 2, 1, 9, '100% ice', 'm'),
(49, 2, 1, 9, '100% ice', 'm'),
(65, 2, 1, 9, '50% ice', 'm'),
(66, 2, 1, 9, '50% ice', 'm'),
(67, 2, 1, 9, '50% ice', 'm'),
(68, 1, 1, 10, '', 'l'),
(68, 2, 1, 8, '100% ice', 'm'),
(68, 3, 1, 8, '100% sugar', 'm'),
(68, 4, 1, 8, '100% ice, 100% sugar', 'm'),
(69, 2, 1, 9, '100% ice', 'm');

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
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--


INSERT INTO `staff` (`id`, `username`, `name`, `email`, `hashed_password`, `phone`, `gender`, `role`, `avatar`) VALUES
(1, 'BigBoss', 'NguyenTS', 'assmin@qcoffee.com', '$2y$10$IRyk1M3Z2JtREnLbKCYRAu6wacWYjRlR3YIWoz0RKDcAAbosYXzEi', '+79627824127', 0, 1, './data/1/avatar.jpg'),
(2, 'Slave1', 'Staff no.1', 'staff1@qcoffee.com', '$2y$10$guZwF2v8ALBAqJj3fnuJSutdPCEwyqBuXjBSTE3Gh/30XFaNL.CeG', '+84987654321', 0, 0, ''),
(3, 'Slave 2', 'slave2', 'staff2@qcoffee.com', '$2y$10$MiiSGdpEG8g5uufqeKeJOObNTRwHwKdkq4lNnrcHzHEzwT5uyK7LC', '+84987654321', 0, 0, './data/3/1640629705.png'),
(5, 'julyyv', 'Vũ Vũ', 'vv@gm.cm', '$2y$10$8PIykhojlLpiGxTLObpUXuR/J44z4iX/8yjV1BsEwGi2ZJEqjBtce', '090909090909', 0, 1, ''),
(12, 'staff3', 'Staff no.3', 'staff3@qcoffee.com', '$2y$10$NrSwoJR0IXmn21RWuRbQSuJpZ0AKXeU2IIdxJaKT6Chp3eaUh5UFC', '0987654312', 1, 0, './data/12/1640629615.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
