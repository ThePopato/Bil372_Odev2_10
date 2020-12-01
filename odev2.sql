-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Ara 2020, 22:21:17
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
  `WebSite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `conference`
--

INSERT INTO `conference` (`ConfID`, `CreationDateTime`, `Name`, `ShortName`, `Year`, `StartDate`, `EndDate`, `SubmissionDeadline`, `CreatorUser`, `WebSite`) VALUES
('id1234', '2020-12-01', 'ogrenci stresi', 'ogrstres', 2020, '2020-12-05', '2020-12-07', '2020-12-04', 1234, 'https://www.conferences.org'),
('id124', '2020-12-02', 'uzaktan egitim', 'stresi', 2020, '2020-12-12', '2020-12-14', '2020-12-10', 1234, 'https://www.conferences.org');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `conferenceroles`
--

CREATE TABLE `conferenceroles` (
  `ConfID` varchar(20) NOT NULL,
  `Role` int(11) NOT NULL,
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `conferenceroles`
--

INSERT INTO `conferenceroles` (`ConfID`, `Role`, `AuthenticationID`) VALUES
('id124', 1, 1234);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `conferencetags`
--

CREATE TABLE `conferencetags` (
  `ConfID` varchar(20) NOT NULL,
  `Tag` varchar(100) NOT NULL,
  `tag1` varchar(20) NOT NULL,
  `tag2` varchar(20) NOT NULL,
  `tag3` varchar(20) NOT NULL,
  `tag4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `conferencetags`
--

INSERT INTO `conferencetags` (`ConfID`, `Tag`, `tag1`, `tag2`, `tag3`, `tag4`) VALUES
('id124', 'tobb etu', 'tobb etu', 'final', 'vize', 'cokproje');

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
-- Tablo için tablo yapısı `userlog`
--

CREATE TABLE `userlog` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Affiliation` varchar(20) NOT NULL,
  `primary_email` varchar(50) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Record` varchar(20) NOT NULL,
  `Creation` varchar(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`AuthenticationID`, `Username`, `Password`) VALUES
(1234, 'elif', 'elif1234'),
(11111, 'Beyzanur', '13yz4nu12'),
(11112, 'Kerem', 'kerem34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersinfo`
--

CREATE TABLE `usersinfo` (
  `AuthenticationID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Affiliation` varchar(20) NOT NULL,
  `primary_email` varchar(50) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Record` varchar(20) NOT NULL,
  `Creation` varchar(20) NOT NULL,
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
  ADD KEY `CreatorUser` (`CreatorUser`);

--
-- Tablo için indeksler `conferenceroles`
--
ALTER TABLE `conferenceroles`
  ADD PRIMARY KEY (`ConfID`,`AuthenticationID`),
  ADD KEY `AuthenticationID` (`AuthenticationID`);

--
-- Tablo için indeksler `conferencetags`
--
ALTER TABLE `conferencetags`
  ADD PRIMARY KEY (`ConfID`,`Tag`),
  ADD KEY `Tag` (`Tag`);

--
-- Tablo için indeksler `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`AuthenticationID`,`SubmissionID`,`ConfID`,`prevSubmissionID`),
  ADD KEY `ConfID` (`ConfID`);

--
-- Tablo için indeksler `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`AuthenticationID`,`Title`,`Name`,`LastName`,`Affiliation`,`primary_email`,`secondary_email`,`password`,`phone`,`fax`,`URL`,`Address`,`City`,`Country`,`Record`,`Creation`,`Date`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`AuthenticationID`,`Password`),
  ADD UNIQUE KEY `AuthenticationID` (`AuthenticationID`);

--
-- Tablo için indeksler `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`AuthenticationID`),
  ADD UNIQUE KEY `Title` (`Title`,`Name`,`LastName`,`Affiliation`,`primary_email`,`secondary_email`,`password`,`phone`,`fax`,`URL`,`Address`,`City`,`Country`,`Record`,`Creation`,`Date`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `AuthenticationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22223;

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
  ADD CONSTRAINT `conferenceroles_ibfk_1` FOREIGN KEY (`ConfID`) REFERENCES `conference` (`ConfID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conferenceroles_ibfk_2` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `conferencetags`
--
ALTER TABLE `conferencetags`
  ADD CONSTRAINT `conferencetags_ibfk_1` FOREIGN KEY (`ConfID`) REFERENCES `conference` (`ConfID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`ConfID`) REFERENCES `conference` (`ConfID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD CONSTRAINT `usersinfo_ibfk_1` FOREIGN KEY (`AuthenticationID`) REFERENCES `users` (`AuthenticationID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
