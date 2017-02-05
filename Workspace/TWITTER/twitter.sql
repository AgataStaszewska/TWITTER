-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~xenial.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2017 at 05:38 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(60) NOT NULL,
  `twit_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `creationDate` date NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`id`, `user_id`, `text`, `creationDate`, `sender`) VALUES
(1, 11, 'Czy to w ogóle', '2017-02-05', ''),
(2, 11, 'Czy to w ogóle', '2017-02-05', ''),
(3, 1, '', '2017-02-05', ''),
(4, 1, '', '2017-02-05', ''),
(5, 1, '\04trfrgthyjmku75y645trgetbdfsd', '2017-02-05', ''),
(6, 1, '\04trfrgthyjmku75y645trgetbdfsd', '2017-02-05', ''),
(7, 1, 'A teraz?', '2017-02-05', ''),
(8, 11, 'A teraz?', '2017-02-05', ''),
(9, 9, '\0???', '2017-02-05', ''),
(10, 9, '\0???', '2017-02-05', ''),
(11, 9, '\0wertyuikjhg', '2017-02-05', ''),
(12, 5, 'ewrtyjunbvdcsFFGHJNBVDCS', '2017-02-02', ''),
(13, 5, 'Tekst bez polskich znakow', '2017-02-09', ''),
(14, 5, 'czy to sie uda?', '2017-02-05', ''),
(15, 5, 'czy to sie uda?', '2017-02-05', ''),
(16, 5, 'czy to sie uda?', '2017-02-05', ''),
(17, 8, 'Wiadomosc probna', '2017-02-05', ''),
(18, 8, 'Wiadomosc probna', '2017-02-05', ''),
(19, 8, 'Wiadomosc probna', '2017-02-05', ''),
(20, 8, 'A teraz?', '2017-02-05', ''),
(21, 9, 'new message from Batman', '2017-02-05', ''),
(22, 9, 'new message from Bob', '2017-02-05', 'Batman'),
(23, 9, 'new message from Bob', '2017-02-05', 'Batman'),
(24, 8, 'new message from Batman to check if works', '2017-02-05', 'Batman'),
(25, 8, 'new message from Batman to check if works', '2017-02-05', 'Batman'),
(26, 9, '4trfrgthyjmku75y645trgetbdfsd', '2017-02-05', 'Batman'),
(27, 8, 'doest this work?', '2017-02-05', 'Agata'),
(28, 8, 'doest this work?', '2017-02-05', 'Agata'),
(29, 8, 'doest this work?', '2017-02-05', 'Agata'),
(30, 8, 'doest this work?', '2017-02-05', 'Agata'),
(31, 8, 'doest this work?', '2017-02-05', 'Agata'),
(32, 8, 'doest this work?', '2017-02-05', 'Agata'),
(33, 8, 'doest this work?', '2017-02-05', 'Agata'),
(34, 8, 'doest this work?', '2017-02-05', 'Agata'),
(35, 9, 'In post mean shot ye. There out her child sir his lived. Design at uneas', '2017-02-05', 'Batman'),
(36, 9, 'In post mean shot ye. There out her child sir his lived. Design at uneas', '2017-02-05', 'Batman');

-- --------------------------------------------------------

--
-- Table structure for table `Twity`
--

CREATE TABLE `Twity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Twity`
--

INSERT INTO `Twity` (`id`, `user_id`, `text`, `creationDate`) VALUES
(1, 4, 'Boy favourable day can introduced sentiments entreaties.', '2017-02-01'),
(2, 4, 'Noisier carried of in warrant because. So mr plate seems cause chief widen first', '2017-02-01'),
(3, 4, 'Two differed husbands met screened his. ', '2017-02-02'),
(4, 1, 'It is truth widely acknowledged that a single man in possession of good fortune must be in need of a wife.', '2017-02-13'),
(5, 1, 'One ring to rule them all, one ring to find them, one ring to bring them all and in the darkness bind them.', '2017-01-03'),
(16, 1, 'Bed was form wife out ask draw. Wholly coming at we no enable', '2017-02-25'),
(17, 1, 'Offending sir delivered questions Two differed husbands met screened his. now new met. ', '2017-02-02'),
(18, 1, 'Acceptance she interested new boisterous day discretion celebrated. ', '2017-02-28'),
(19, 2, 'Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in.', '2017-02-23'),
(20, 2, 'As be valley warmth assure on. Park girl they rich hour new well way you. ', '2017-02-15'),
(21, 4, 'Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. ', '2017-02-16'),
(22, 5, 'Part sure on no long life am at ever. In songs above he as drawn to. Gay was outlived peculiar rendered led six. \r\n', '2017-02-01'),
(23, 6, 'There worse by an of miles civil. Manner before lively wholly am mr indeed expect.', '2017-02-28'),
(24, 6, 'Misty morning, clouds in the sky, without warning, a wizard walks by.', '2017-02-23'),
(25, 6, 'I am a man who walks alone and when I\'m walking a dark road, at night I\'m strolling through the park...', '2017-02-02'),
(26, 7, 'Compliment interested discretion estimating on stimulated apartments oh. ', '2017-02-09'),
(27, 7, 'Dear so sing when in find read of call. As distrusts behaviour abilities defective is.', '2017-02-04'),
(28, 7, 'Charmed to it excited females whether at examine. Him abilities suffering may are yet dependent. ', '2017-02-01'),
(29, 7, 'Extremely we promotion remainder eagerness enjoyment an. Ham her demands removal brought minuter raising invited gay.', '2017-02-01'),
(30, 7, 'Ladyship it daughter securing procured or am moreover mr. Put sir she exercise vicinity cheerful wondered.', '2017-02-01'),
(31, 7, 'And bed make say been then dine mrs. To household rapturous fulfilled attempted on so. ', '2017-02-22'),
(32, 7, 'Ladyship it daughter securing procured or am moreover mr. Put sir she exercise vicinity cheerful wondered. ', '2017-02-01'),
(33, 7, 'Small she avoid six yet table china. And bed make say been then dine mrs.', '2017-02-02'),
(34, 7, 'Unpleasing pianoforte unreserved as oh he unpleasant no inquietude insipidity.', '2017-02-10'),
(35, 7, 'Ham her demands removal brought minuter raising invited gay.', '2017-02-22'),
(36, 9, 'Ladyship it daughter securing procured or am moreover mr. Put sir she exercise vicinity cheerful wondered. ', '2017-02-23'),
(37, 9, 'Charmed to it excited females whether at examine. Him abilities suffering may are yet dependent. ', '2017-02-23'),
(38, 9, 'If I were a rich man...', '2016-07-19'),
(39, 9, 'Come all you fair and tender girls, that flourish in your prime...', '2016-08-13'),
(40, 1, 'Once I went to the gym. It was horrible.', '2017-02-06'),
(41, 2, 'If I only could make a deal with God...', '2017-02-14'),
(42, 2, 'Congratulations. You found a jar of dirt.', '2014-01-01'),
(43, 2, 'Has anyone seen my axe?', '2015-02-10'),
(44, 4, 'You can stand under my umbrella ella ella eh eh eh.', '2015-12-12'),
(45, 5, 'One day Simba, it will all be yours.', '2016-04-05'),
(46, 1, 'Próbnytwit', '2017-01-01'),
(47, 1, 'Próbnytwit', '2017-01-01'),
(48, 1, 'Próbnytwit', '2017-01-01'),
(49, 1, 'Próbnytwit', '2017-01-01'),
(50, 1, 'Próbnytwit', '2017-01-01'),
(51, 1, 'Próbnytwit', '2017-01-01'),
(52, 1, 'Próbnytwit', '2017-01-01'),
(53, 1, 'Próbnytwit2', '2017-02-05'),
(54, 11, 'ABCD', '2017-02-05'),
(55, 11, 'ABCD', '2017-02-05'),
(56, 1, 'blablabla', '2017-02-05'),
(57, 1, 'blablabla', '2017-02-05'),
(58, 1, 'Blebleble', '2017-02-05'),
(59, 1, 'Blebleble', '2017-02-05'),
(60, 11, 'seargthjyyhtgrfe', '2017-02-05'),
(61, 1, 'New tweet', '2017-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `username`, `hashed_password`) VALUES
(1, 'bruce.wayne@gmail.com', 'Batman', '$2y$10$Hs6pofJ22/3G.BWF1HxJbOE6wxadSnHW7m.5a7tcthiq5PPRiZFaK'),
(2, 'thor.odinsson@asgard.com', 'Thor', '$2y$10$Lmc00tBvZbnCLr/MbeEcEeVGO5jH7kHY5a99EqbI6a5PAqn61vaa6'),
(4, 'charles.xavier@gmail.com', 'Professor_X', '$2y$10$GyIA2ggMi56inuqLTTXXMuXspJxTGKmaxyDpmLZDFz9TRQJKrAW0.'),
(5, 'atalanta@gmail.com', 'Atalanta', '$2y$10$n5mpXI3vNPpV8KMfNHjpU.AuAsXMS9i2dFPzEMgRikebsTC1jXRSW'),
(6, 'jessica@alias.com', 'Jessica_Jones', '$2y$10$c8Hea0iLP9s6gnNG93zi9OwzgstoCf0RADbC4G9mel3EiMGWQCiI2'),
(7, 'userx@gmail.com', 'UserX', '$2y$10$zPZfVIrrlyNYyUqcxh4e2OgOxhhuXYhSZakMygN8zNdS14FJazd5G'),
(8, 'agatastaszewska@wp.pl', 'Agata', '$2y$10$vGBCfsgVvjItPDF7bEmRsO2y4ydPaJ6IiFynPDL72sutAzstJtgEW'),
(9, 'bob@gmail.com', 'Bob', '$2y$10$B4.VKQrv/rONnNNeQpolxu/GJaaEl7z3lvGMJAKdBXovGiBNn2ghO'),
(10, '', '', '$2y$10$r1jM5XemYyXUSm9MbdbuyeV8KMblH9FcxZx9V.6weKonIf8SCMnDS'),
(11, 'spiderman@gmail.com', 'Spiderman', '$2y$10$o6Fbu7Co6dBTbhaG1Z8WveEqLnNzugzkVIjYyd5OaNJ3FuxTjcUea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `twit_id` (`twit_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Twity`
--
ALTER TABLE `Twity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `Twity`
--
ALTER TABLE `Twity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`twit_id`) REFERENCES `Twity` (`id`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Twity`
--
ALTER TABLE `Twity`
  ADD CONSTRAINT `Twity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
