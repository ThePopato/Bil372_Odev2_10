-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Kas 2020, 00:03:25
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odev2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `conference`
--

CREATE TABLE `conference` (
  `ConfID` varchar(20) NOT NULL,
  `CreationDateTime` date NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ShortName` varchar(19) NOT NULL,
  `Year` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `SubmissionDeadline` date NOT NULL,
  `CreatorUser` bigint(20) UNSIGNED NOT NULL,
  `WebSite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `conferenceroles`
--

CREATE TABLE `conferenceroles` (
  `ConfIDRole` int(11) NOT NULL,
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL
) ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `conference_tags`
--

CREATE TABLE `conference_tags` (
  `ConfID` varchar(20) NOT NULL,
  `Tag` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `submissions`
--

CREATE TABLE `submissions` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `ConfID` varchar(20) NOT NULL,
  `SubmissionID` int(11) NOT NULL,
  `prevSubmissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `tag` int(11) NOT NULL,
  `tag1` varchar(20) NOT NULL,
  `tag2` varchar(20) NOT NULL,
  `tag3` varchar(20) NOT NULL,
  `tag4` varchar(20) NOT NULL,
  `tag5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userlog`
--

CREATE TABLE `userlog` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Affiliation primary_email` varchar(50) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `URL` varchar(120) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Record` varchar(50) NOT NULL,
  `Creation` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersinfo`
--

CREATE TABLE `usersinfo` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Affiliation primary_email` varchar(50) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `URL` varchar(120) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Record` varchar(50) NOT NULL,
  `Creation` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`ConfID`),
  ADD UNIQUE KEY `CreatorUser` (`CreatorUser`);

--
-- Tablo için indeksler `conferenceroles`
--
ALTER TABLE `conferenceroles`
  ADD PRIMARY KEY (`ConfIDRole`,`AuthenticationID`),
  ADD KEY `AuthenticationID` (`AuthenticationID`);

--
-- Tablo için indeksler `conference_tags`
--
ALTER TABLE `conference_tags`
  ADD PRIMARY KEY (`ConfID`,`Tag`),
  ADD UNIQUE KEY `Tag` (`Tag`);

--
-- Tablo için indeksler `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`AuthenticationID`,`ConfID`,`SubmissionID`,`prevSubmissionID`),
  ADD KEY `ConfID` (`ConfID`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag`);

--
-- Tablo için indeksler `userlog`
--
ALTER TABLE `userlog`
  ADD KEY `AuthenticationID` (`AuthenticationID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`AuthenticationID`);

--
-- Tablo için indeksler `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`AuthenticationID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `conference`
--
ALTER TABLE `conference`
  MODIFY `CreatorUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `conference_tags`
--
ALTER TABLE `conference_tags`
  MODIFY `Tag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`CreatorUser`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `conferenceroles`
--
ALTER TABLE `conferenceroles`
  ADD CONSTRAINT `conferenceroles_ibfk_1` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `conference_tags`
--
ALTER TABLE `conference_tags`
  ADD CONSTRAINT `conference_tags_ibfk_1` FOREIGN KEY (`ConfID`) REFERENCES `conference` (`ConfID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`ConfID`) REFERENCES `conference` (`ConfID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_3` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD CONSTRAINT `usersinfo_ibfk_4` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
