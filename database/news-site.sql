-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 03:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Sports', 1),
(2, 'Entertainment', 2),
(3, 'Politics', 3),
(4, 'Health', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_pid` int(11) NOT NULL,
  `commentBy_vid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_pid`, `commentBy_vid`, `date`) VALUES
(1, 'Is it True?', 9, 9, '2021-07-16 17:56:42'),
(2, 'Yes', 9, 9, '2021-07-16 17:56:53'),
(3, 'How is This Possible?', 9, 1, '2021-07-16 17:57:21'),
(4, 'Wow!!\r\n', 11, 1, '2021-07-16 17:58:09'),
(5, 'Awesome!!', 11, 1, '2021-07-16 17:58:18'),
(6, 'Yeah!! Lets go.', 11, 9, '2021-07-16 17:58:55'),
(7, 'Mars', 10, 1, '2021-07-16 18:13:26'),
(8, 'Nice Car', 6, 1, '2021-07-16 18:14:46'),
(9, '11', 11, 9, '2021-07-16 18:21:48'),
(10, 'Yoo\r\n', 10, 1, '2021-07-16 18:33:46'),
(11, 'Hiiiii', 10, 9, '2021-07-16 18:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(4, 'EntertaintMent', '                                                                The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi.\r\n\r\nAkhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).                                                                ', '2', '28 Jun, 21', 1, 'politics.jpg'),
(5, 'EntertaintMent For Fun', '                                                The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi.\r\n\r\nAkhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).                                                ', '2', '28 Jun, 21', 1, 'entertaintment.jpg'),
(6, 'Sports', 'The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi.\r\n\r\nAkhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).', '1', '28 Jun, 21', 1, 'citroen_gt_super_sport-wallpaper-3840x2160.jpg'),
(7, 'Politics', 'The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi.\r\n\r\nAkhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).', '3', '28 Jun, 21', 1, 'dc_heroes-wallpaper-1920x1080.jpg'),
(8, 'Health', 'The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi.\r\n\r\nAkhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).', '4', '28 Jun, 21', 1, 'need_for_speed_heat_lamborghini-wallpaper-2560x1440.jpg'),
(9, 'Hello', ' The film starts with Akhil Lokhande (Akshay Kumar) getting paid for doing an ad, where he gets into a fight, as he wasn\'t paid the full amount of money that they had promised. This continues with a few other assignments, where Akhil constantly gets underpaid, resulting in a fight, ends the fight when he gets a phone call, and says he has to go somewhere. He then arrives on a shoot where Sakshi (Tamannaah) is shooting for her television series. After her shoot lets out, they go for a walk around the park, observing other couples. At the end of their walk, Akhil proposes Saakshi. Akhil and Saakshi go to her father\'s (Mithun Chakraborty) house, where they are told that until Akhil becomes rich, he can\'t marry Saakshi. Akhil goes to his film-obsessed friend, Jugnu\'s (Krushna Abhishek) shop. He tells him that he is going to visit his father at the hospital because he has chest pain. However, his father Mr. Lokhande (Darshan Jariwala), is actually acting and is dancing around with the nurse, only staying in the hospital because it has service like a 5-star hotel. Akhil arrives just in time to hear and see this, and goes to beat up Mr. Lokhande when he reveals that Akhil is adopted and his real father wasn\'t ready for a child so his mother left, but was killed in a train crash. Luckily Akhil survived, and when the railway officers were giving one lakh rupees for the families who are even one member dies, he adopted Akhil to claim the compensation. Akhil, in a fit of rage, beats him up. He goes back to his house, and opens the chest that he never had before, which contains love letters from his real father, to his mother, and a locket with his father and mother\'s pictures. He discovers that his father is Pannalal Johri (Dalip Tahil) who is a billionaire in Bangkok. Right as he finds this, on the television comes news that Pannalal Johri is dead and his 30 billion\'s($480,000,000 in 2014) will go to anyone who can prove that they are related to Pannalal Johri. He then meets Johri\'s lawyer Habibullah (Johnny Lever).    ', '4', '28 Jun, 21', 1, 'tomb_raider_lara_croft-wallpaper-1920x1080.jpg'),
(10, 'Lorem ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '4', '29 Jun, 21', 2, 'mass_effect-wallpaper-1920x1080.jpg'),
(11, 'Lorem RSKJH', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '3', '29 Jun, 21', 2, 'batman_arkham_knight_9-wallpaper-2560x1440.jpg'),
(12, 'Rajneeti', '                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,                ', '3', '04 Jul, 21', 1, 'far_cry_3_2012_video_game-wallpaper-2560x1440.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`websitename`, `logo`, `footerdesc`) VALUES
('Bullet News', 'news.jpg', '© Copyright 2019 News | Powered by Debojit Mitra');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Debojit', 'Mitra', 'Debojit', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'John', 'Smith', 'John', 'fea087517c26fadd409bd4b9dc642555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vid`, `username`, `password`, `date`) VALUES
(1, 'Debojit Mitra', '$2y$10$vzNXF1eeZwRgKluWfdIVjOFL/SfAGdO2r8Tnyem5sVhCD7QtnalgO', '2021-07-14 12:56:04'),
(2, 'Zeldris', '$2y$10$xE.Olrj2m1Tya.apZG6HH.0GttSwFHYKXOGKrnbpowLMEl1x3qz0K', '2021-07-14 12:57:16'),
(3, 'Rajesh ', '$2y$10$0IC6sSGXWizkuHGbd8SGuugOGK2bN4iWvmkc/qNcR24lJnKLrkMRi', '2021-07-14 16:44:42'),
(4, 'Debojit33', '$2y$10$TTpZh1cXdIoapSSBEBLBBeGnEo4PPKXf2al0nqSjKBiSFHH4g5sJm', '2021-07-14 16:56:01'),
(5, 'si', '$2y$10$j0zhkqW.MoDZLrSE0npsTOclvUmPOs1dufABc/.wTBB74nF448rOS', '2021-07-14 16:56:42'),
(6, 'y', '$2y$10$LZCLn8SFgS4xmExEcEsqreWfWgYlne51La0FbP9pNBKbx7zYj6eBK', '2021-07-14 16:57:31'),
(7, 'Debojit', '$2y$10$zXblCCDm04sNhZgTWwncUukTfVWOM6a/wofrLE7I/.SPY78O5WAay', '2021-07-14 17:00:31'),
(8, 'Debojit Mitra333', '$2y$10$u9o58f/dcldYr2.rWDwnaOyuQpE0kDQTW588HMY6BbDk1RqyweyNq', '2021-07-14 17:07:00'),
(9, 'Zeldris123', '$2y$10$0xXM2aJREBEmDglbSQ./N.TDI/pIMHL4ehXngJr1/VEpgSHuLOeKy', '2021-07-14 20:10:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
