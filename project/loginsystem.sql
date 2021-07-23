-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 07:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int(11) NOT NULL,
  `fname` tinytext NOT NULL,
  `lname` tinytext NOT NULL,
  `phone` char(11) NOT NULL,
  `addres` text NOT NULL,
  `city` tinytext NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`id`, `fname`, `lname`, `phone`, `addres`, `city`, `email`) VALUES
(2, 'Badea', 'Ioan', '0745237534', 'Mihai Eminescu, Bl.2, Ap.33', 'Arad', 'Badea.Ioan@yahoo.com'),
(3, 'Chiuta', 'Ioan', '0755436781', 'Avram Iancu,nr.23', 'Arad', 'Chiuta.Ioan21@yahoo.com'),
(4, 'Darie', 'Emanuel', '0744237645', 'Marasesti,nr.14', 'Timisoara', 'Darie.Emanuel@yahoo.com'),
(5, 'Cofaru', 'Corneliu', '0752775421', 'Aurel Vlaicu,nr.34', 'Timisoara', 'Cofaru.Corneliu331@yahoo.com'),
(6, 'Aciu', 'Elena', '0756743212', 'Nicolae Balcescu,nr.56', 'Arad', 'Elena.Aciu@yahoo.com'),
(7, 'Aciu', 'Mircea', '0743226891', 'Tudor Vladimirescu,nr.15', 'Brasov', 'Mirceaaciu@yahoo.com'),
(8, 'Ardeleanu', 'Mircea', '0765814355', 'Closca,nr.66', 'Timisoara', 'Ardeleanu.Mircea55@yahoo.com'),
(9, 'Argint', 'Cornel', '0722587431', 'Crisan,Bl.23,Ap.4', 'Craiova', 'Cornel_argint@yahoo.com'),
(10, 'Badea', 'Nicolae', '0721446599', 'Horea, Bl.4, Ap.20', 'Arad', 'Nicu.Badea@yahoo.com'),
(11, 'Badescu', 'Lavinia', '0764214478', 'Independentei, Bl.305, Ap.3', 'Bucuresti', 'Lavi_Badescu@yahoo.com'),
(12, 'Badic', 'Mihai', '0734765849', 'Trandafirilor, nr.58', 'Brasov', 'Badic.Mihai@yahoo.com'),
(13, 'Balta', 'Octavian', '0746714326', 'Garii, Bl.8, Ap.4', 'Brasov', 'Octavian_Baltag@yahoo.com'),
(14, 'Baraboi', 'Adrian', '0743689479', 'Primaverii, nr.91', 'Bucuresti', 'Baraboi.Adi@yahoo.com'),
(15, 'Baran', 'Maria', '0720853972', 'Florilor, Bl.67, Ap.2', 'Baia Mare', 'Maria.Baran@yahoo.com'),
(16, 'Bechet', 'Paul', '0749837429', 'Libertatii, nr.45', 'Satu Mare', 'Bechet.Paul4@yahoo.com'),
(17, 'Dan', 'Bidian', '0749386257', '1 mai, nr.76', 'Vaslui', 'Bidian.Dan@yahoo.com'),
(18, 'Ion', 'Voncila', '0755682972', 'Liliacului, Bl.492, Ap.75', 'Vaslui', 'Ion.Voncila@yahoo.com'),
(19, 'Tudorel', 'Bitoiu', '0768496328', 'Morii, nr.6', 'Brasov', 'Tudi.Bitoiu2@yahoo.com'),
(20, 'Alexandru', 'Bitoleanu', '0759223519', 'Gheorghe Doja, nr.13', 'Craiova', 'Alex.Bitoreanu@yahoo.com'),
(21, 'Dumitru', 'Cazacu', '0728943872', 'Ion Creanga, nr.68', 'Craiova', 'Cazacu.Dumitru@yahoo.com'),
(22, 'Violeta', 'Voicu', '0756839427', 'Mihai Viteazu, nr.8', 'Iasi', 'Voicu_Vio21@yahoo.com'),
(23, 'Laviniu', 'Blaj', '0257518638', 'Nr. 83', 'Sat Cladova', 'Blaj.Laviniu67@yahoo.com'),
(24, 'Angela', 'Voicila', '0725958347', 'Campului, nr.37', 'Iasi', 'Angela_Voicila8@yahoo.com'),
(25, 'Axinte', 'Laviniu', '0214566568', 'Calea Rahovei, Nr. 358, Loc. Bucuresti, Sector 5,', 'Bucuresti', 'Axinte_Laviniul@gmail.com'),
(26, 'Teodor', 'Vintila', '0735687148', 'Zorilor, Bl.4, Ap.6', 'Constanta', 'Teo.Vintila@gmail.com'),
(27, 'Dragulescu', 'Adelin', '0254227545', 'Strada Mihai Eminescu, jud. Hunedoara', 'Deva', 'Adelinu.number1@yahoo.co.uk'),
(28, 'Lucian', 'Ursea', '0766588444', 'Teilor, Bl.16, Ap.2', 'Satu Mare', 'Ursea.Luci@yahoo.com'),
(29, 'Patcau', 'Ioan', '0257388712', 'Strada Carbunarilor', 'Vaslui', 'Ionut_Fotbalistu@yahoo.ro'),
(30, 'Dimene', 'Cristian', '0756329100', 'Strada 1 Decembrie', 'Bucuresti', 'Cristi.business@gmail.com'),
(31, 'Cioba', 'Claudiu', '0744977638', 'Strada Misionarilor, Nr.87', 'Orsova', 'Cioba32C2@yahoo.ro'),
(32, 'Mangusta', 'Darius', '0741745366', 'Strada George Cosbuc, Nr.67', 'Sibiu', 'Mangusteledomina@yahoo.com'),
(33, 'Cornel', 'Ursache', '0754372851', 'Stefan cel Mare, nr.60', 'Alba Iulia', 'Ursache_Cornel@gmail.com'),
(34, 'Oreste', 'Samuel', '0257849322', 'Strada Varful cu Dor, Nr.89', 'Arad', 'Orestedinpoveste@yahoo.ro'),
(35, 'Vasile', 'Topa', '0742758619', 'Vasile Alecsandri, Bl.19, Ap.25', 'Constanta', 'Topa.Vasile12@gmail.com'),
(36, 'Oliviu', 'Carabas', '0257649110', 'Strada Ana Blandiana, Nr.89', 'Buzau', 'Oliviu.Smirglu@yahoo.ro'),
(37, 'Lacoste', 'Damian', '0754628994', 'Strada Ilarie Chendi', 'Timisoara', 'Damian_Lacostel@gmail.com'),
(38, 'Teodoro', 'Emil', '0257485643', 'Izvorului, Bl.41, Ap.8', 'Constanta', 'Emil.Teo@gmail.com'),
(39, 'Dan', 'Stoia', '0257443276', 'Plopilor, nr.87', 'Deva', 'Stoia_Dan@gmail.com'),
(40, 'Hodorache', 'Emil', '0744929873', 'Strada Simpla, Nr.1', 'Constanta', 'NumacheamaEmilut@yahoo.ro'),
(41, 'Santiu', 'Denis', '0766438221', 'Bulevardul Simion Balint, Nr.143', 'Cluj-Napoca', 'Santiu.de.la.sarpe@yahoo.ro'),
(42, 'Florian', 'Stefanescu', '0257605832', 'Viilor, Bl.76, Ap.43', 'Oradea', 'Florian23@gmail.com'),
(43, 'Postolache', 'Marian', '0771873010', 'Strada Lucian Blaga, nr.14', 'Arad', 'Postolache1991@yahoo.com'),
(44, 'Constantin', 'Stanescu', '0257324589', 'Unirii, nr.40', 'Cluj-Napoca', 'Costel_Stanescu@gmail.com'),
(45, 'Pirinel', 'Anca', '0754278199', 'Strada 13 Noiembrie, Nr.21, Sector 5', 'Bucuresti', 'AncadinBucuresti@yahoo.ro'),
(46, 'Gabriel', 'Snae', '0257453421', 'Aurel Vlaicu, nr.33', 'Deva', 'Gabi.Snae@gmail.com'),
(47, 'Nechifor', 'Armand', '0745821774', 'Strada Vasile Goldis, Nr. 57', 'Vaslui', 'Armandillo56@yahoo.co.uk'),
(48, 'Emil', 'Simion', '0257928436', 'Mihail Kogalniceanu, nr.3', 'Sibiu', 'Emil.Simi@gmail.com'),
(49, 'Marius', 'Silaghi', '0257413899', 'Crinului, Bl.5, Ap.21', 'Ploiesti', 'Marius.Silaghi@yahoo.com'),
(50, 'Gheorghe', 'Scutaru', '0765938761', 'Oituz, nr.4', 'Ploiesti', 'Scutaru.Gh2@yahoo.com'),
(51, 'Florin', 'Sandu', '0257284752', 'Pacii, Bl.7, Ap.2', 'Galati', 'Florin_Sandu@gmail.com'),
(52, 'Lipiu', 'Sebastian', '0755382498', 'Strada Sipos, Nr. 47', 'Miercurea-Ciuc', 'Lipiu.Basty@gmail.com'),
(53, 'Dumitru', 'Samoilescu', '0750329642', 'Victoriei, nr.39', 'Galati', 'Dumitru32@yahoo.com'),
(54, 'Tasca', 'Ralisa', '0774255381', 'Strada Campulung, Nr. 88', 'Prahova', 'Ralisa80@gmail.com'),
(55, 'Nilev', 'Adriana', '0257488318', 'Strada Carturarilor, Nr. 23', 'Oradea', 'Nilve.Adriana@gmail.com'),
(56, 'Vilofeu', 'Ramona', '0754266371', 'Strada Alexandru Cel Bun, Nr. 45', 'Constanta', 'Ramona.Vilofeu@yahoo.ro'),
(57, 'Sadan', 'Emilia', '0756421882', 'Strada Feleusilor, Nr. 4', 'Dambovita', 'Emilia.Ornamental@yahoo.com'),
(58, 'Vanda', 'Andrei', '0257428119', 'Strada Apostolilor, Nr. 15', 'Resita', 'andrei.vanda@yahoo.com'),
(59, 'Giancarlo', 'Cristian', '0742912287', 'Strada Romanilor, Nr. 81', 'Dambovita', 'Giancarlo.Magicianu@yahoo.ro'),
(60, 'Renate', 'Diana', '0722861221', 'Strada Mihai Viteazul, Nr. 54', 'Deva', 'Renate_Ro@yahoo.ro'),
(61, 'Patrascanu', 'Daniel', '0744658021', 'Strada Centenarilor, Nr. 12', 'Resita', 'Dany.bossu@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'admin', 'brezan_alex@yahoo.com', '$2y$10$hUTW74lsVMWCneV4hNelcON9hCIsafv4b.phQFMU/zWG4PfEZ6wMC'),
(2, 'alex', 'alexbrezan96@gmail.com', '$2y$10$41J48ykxzawSSthbABhyTeeVwmISZbI9pk9yTUgCCSHRYLShTl8Pq'),
(3, 'Catalinizatu', 'cata_adi2001@yahoo.com', '$2y$10$LVaWJZ3X7CXd49FS9uC87ehDnT.peNy/AGz0dUKHXFwT/hb639nja'),
(5, 'doarpentrudelete', 'saint@eu.haiduc', '$2y$10$AEXMjzEdWJSotKBajaoHTeapc4wLm./8SdVgwwPbukqyA/SmLjg1K'),
(7, 'sterge', 'saint@eu.haiduc', '$2y$10$gEpA7fEN61.aQbHqFR/C3u6rHySSHyt8C908/7TOHN3fYbIfHaUZW'),
(8, 'Cristi65', 'ccostea8998@yahoo.com', '$2y$10$.BR.L0oyqcTlLksPwICHsOtLamiSs0Vb73GekmcQJIrJXgPSETHuu'),
(9, 'Marian', 'marianpint@gmail.com', '$2y$10$a6A9KIPofy.wyTRZHAJiH.rf04AZA0WRul5obXMmkfs17KXLrKu3y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
