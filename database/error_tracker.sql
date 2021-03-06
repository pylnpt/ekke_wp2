-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2022. Máj 22. 14:44
-- Kiszolgáló verziója: 5.7.36
-- PHP verzió: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `error_tracker`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `errors`
--

DROP TABLE IF EXISTS `errors`;
CREATE TABLE IF NOT EXISTS `errors` (
  `error_id` int(11) NOT NULL AUTO_INCREMENT,
  `error_name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `error_level` int(10) NOT NULL,
  `error_type` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `has_solution` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`error_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `errors`
--

INSERT INTO `errors` (`error_id`, `error_name`, `error_level`, `error_type`, `has_solution`) VALUES
(27, 'asdasdasfsdg', 10, 'Logistical', 'No'),
(26, 'ewqrqfvasc', 2, 'Logistical', 'No'),
(24, 'sads', 2, 'Logistical', 'No'),
(25, 'asdasgad', 2, 'Logistical', 'No'),
(15, 'camogration of ionized flexibility', 2, 'Logistical', 'No');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `planned_personel`
--

DROP TABLE IF EXISTS `planned_personel`;
CREATE TABLE IF NOT EXISTS `planned_personel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodline_id` int(10) NOT NULL,
  `planned_personnel_num` int(11) NOT NULL,
  `actual_personnel_num` int(11) DEFAULT NULL,
  `comment` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prodlines`
--

DROP TABLE IF EXISTS `prodlines`;
CREATE TABLE IF NOT EXISTS `prodlines` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `prodline_name` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `area_id` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `min_personnel` int(100) NOT NULL,
  `max_personnel` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `solutions`
--

DROP TABLE IF EXISTS `solutions`;
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solution_name` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `solution_type` int(10) NOT NULL,
  `solution_author` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `solution_description` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `role` varchar(45) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `img_path` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `token`, `first_name`, `last_name`, `role`, `email`, `img_path`) VALUES
(1, 'Pylnpt', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', 'Molnár', 'Péter', 'shift_leader', 'molnar.peter9819@gmail.com', 'images/main_plan.png'),
(2, 'alfi', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', 'Kiss', 'Alfonz', 'mechanic', 'kiss@gmail.com', 'images/myprofile.jpg'),
(3, 'Dani', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', 'Kiss', 'Dániel', 'mechanic', 'asd@gmail.com', 'images/myprofile.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
