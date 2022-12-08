-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `girzqhip_estudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_schedule`
--

CREATE TABLE `booked_schedule` (
  `id` int(11) NOT NULL,
  `date_filed` varchar(20) NOT NULL,
  `studNum` varchar(15) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `studCourse` varchar(50) NOT NULL,
  `studEmail` varchar(50) NOT NULL,
  `studContact` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `studSched` varchar(50) NOT NULL,
  `studTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_schedule`
--

INSERT INTO `booked_schedule` (`id`, `date_filed`, `studNum`, `fName`, `lName`, `studCourse`, `studEmail`, `studContact`, `location`, `studSched`, `studTime`) VALUES
(1, '2022-11-26', '2019-101312', 'Juan', 'Dela Cruz', 'BSIT', 'delacruz@gmail.com', '09231231231', 'CAS Library - MAB Building / Second (2nd) Floor', '11/30/2022', '10:00 AM'),
(2, '2022-11-27', '2019-123123', 'Jester', 'Sadasds', 'BSIT', 'JEsdas@gmail.cpm', '09231232131', 'CAS Library - MAB Building / Second (2nd) Floor', '11/29/2022', '1:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `messages` varchar(250) NOT NULL,
  `response` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `messages`, `response`) VALUES
(0, 'Hi', 'Hello, how can I help you'),
(1, 'Hello', 'Hello, how can I help you'),
(2, 'How to Book an Appointment', 'View any thesis document by either searching for it or clicking \"explore\" for any department. After clicking the \"View\" button, at the bottom right of the viewed document, a button that says \"Book Visit\" should appear.'),
(3, 'Where is the CEAT library located?', 'Multi-purpose Building / Third(3) floor'),
(4, 'Where is the CBET library located?', 'SNAGAH Building / Second(2) floor'),
(5, 'Where is the CAS library located?', 'MAB Building / Second(2) floor'),
(6, 'Where is the CED library located?', 'SNAGAH Building / Second(2) floor'),
(7, 'Where is the IPE library located?', 'MAB Building / Fifth(5) floor'),
(8, 'Where is the GS library located?', 'RND Building / Third(3) floor ');

-- --------------------------------------------------------

--
-- Table structure for table `masterkey`
--

CREATE TABLE `masterkey` (
  `id` int(11) NOT NULL,
  `masterkeys` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masterkey`
--

INSERT INTO `masterkey` (`id`, `masterkeys`) VALUES
(0, 'MPJRL79388');

-- --------------------------------------------------------

--
-- Table structure for table `rtu_admin`
--

CREATE TABLE `rtu_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rtu_admin`
--

INSERT INTO `rtu_admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'rtu_admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thesis_code` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_publish` int(4) NOT NULL,
  `researchers` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `res_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `title`, `thesis_code`, `department`, `date_publish`, `researchers`, `location`, `res_file`) VALUES
(96, 'Anarrative Study On The Attributions Of Covid-19 Patients Towards Recovery ', 'TestCode', 'CAS', 2021, 'Bacsafra, Joeylyn D.\r\ncostombrado, Nicole C.\r\ndoletanora, Andrea G.\r\nfresnido, Sophia T.\r\nmiguel, Michaella Joy V.\r\n', 'CAS Library - MAB Building / Second (2nd) Floor', '(2021)A Narrative Study on the Attributions of COVID-19.pdf'),
(97, 'Academic Procrastination And Its Relation To Flexible Learning Academic Performance Of Rizal Technological University Laboratory High School Students', 'TestCode1', 'CAS', 2021, 'Cacdag, Jan Clet A.\r\nfeliminiano, Bernadette G.\r\nmarino, Dominic N.\r\nsamiado, Caryl Joy L\r\n‘venzon, Rexel L.', 'CAS Library - MAB Building / Second (2nd) Floor', '(2021)Academic Procrastination and Its Relation to Flexible Lea.pdf'),
(98, 'Add-to Cart: Materialism And Compulsive Buying Behavior ‘among Shopee Loyalty Cardholder ', 'TestCode2', 'CAS', 2021, 'Bermudez, Cherryllene\r\ndela Cruz, James\r\nlecias, Mary Joy\r\nrubillos, Lance\r\n\r\nsuyom, Shella Mae 8.\r\n', 'CAS Library - MAB Building / Second (2nd) Floor', '(2021)Add-to-cart Materialism and Compulsive Buying Behavior.pdf'),
(99, 'Analysis And Prediction Of Vegetation, Croplands, And Urbanization Change In The Philippines, Using Data Satellite Images ', 'TestCode3', 'CAS', 2021, 'Cabasal, Earon Dave M.\r\npucio, Jayvee Miguel G.\r\n', 'CAS Library - MAB Building / Second (2nd) Floor', '(2021)Analysis and Prediction of Vegetation, Croplands, and Urb.pdf'),
(100, 'Big Five Personality Traits And Online Shopping Behavior Of The Millennial And Gen Z Filipinos ', 'TestCode4', 'CAS', 2021, 'Borromeo, Joome Kervin\r\nccimanes, Redet P\r\nflores, Alexandra Grace P\r\npanalngin, Dhysrey Enid Dl\r\nsacle, Vanessa 8\r\n', 'CAS Library - MAB Building / Second (2nd) Floor', '(2021)Big Five Personality Traits and Online Personality Behavi.pdf'),
(101, 'Assessment Of Training And Development Miplenentation Of Kfc Mega Mall! [basis For Mproved Customer Service ', 'TestCode6', 'CEAT', 2017, '‘abogallp. Gutirrez\r\n‘angelo P. Onquit\r\ncamille W. Ordonez\r\nellysa Marie V. Rotarla\r\nchristine Agatha L. Tarroja,\r\n', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2018)ASSESSMENT OF TRAINING AND DEVELOPMENT IMPLEMENTATION OF.pdf'),
(102, 'Effective Implementation Of The Different Human Resource \"program Policies At Toyota Otis Inc. ', 'TestCode6', 'CEAT', 2017, 'Noelyn P. Gonzales\r\nrovie Rose C. Gulingan\r\nprincess Marielle R. Noga\r\nmica I. Ormillada\r\nracella Andrea G. Reyes', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2018)EFFECTIVE IMPLEMENTATION OF THE DIFFERENT HUMAN RESOURCE PROGRAM POLICIES AT TOYOTA OTIS INC..pdf'),
(103, 'Employability Of Bachelor Of Science In Office Administration Graduates Of 2015-2016 Of Rizal Technological University', 'TestCode7', 'CEAT', 2018, 'Madel Apple Caitum\r\nchrizalyn D. Macatalad\r\njhon Kevin M. Marick\r\ndaisy Lyn C. Roxas\r\njoana Marie E. Sampang ', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2018)Employability of Bachelor of Science in Office Administration Graduates of 2015-2016 Of Rizal Technological University.pdf'),
(104, 'Human Resource Planning As Basis For Effective Recruithent And Selection In Accordance To Demographic Profile ', 'TestCode9', 'CBET', 2017, '‘car Angeles\r\njojety A Bagang\r\n‘aig A Bag\r\n\r\nmary Rose E Batons\r\n', 'CBET Library - SNAGAH Building / Second (2nd) Floor', '(2018)HUMAN RESOURCE PLANNING AS BASIS FOR EFFECTIVE RECRUITMENT AND SELECTION IN ACCORDANCE TO DEMOGRAPHIC PROFILE.pdf'),
(105, 'Impact Of Facility Design And Layout To Customer Satisfaction In Trevs Grill And Bar', 'TestCode10', 'CBET', 2017, 'Jamin B. Bernal\r\nmariel Lyne Desuyo\r\njohnpaul V. Gonzalez\r\njose Mariano P. Marbella\r\nian Dustin Tolentino\r\nflorence T. Vargas', 'CBET Library - SNAGAH Building / Second (2nd) Floor', '(2018)IMPACT OF FACILITY DESIGN AND LAYOUT TO CUSTOMER.pdf'),
(106, 'Energy And Water Savings By Meansof Green Roof System', 'TestCode11', 'CEAT', 2017, 'Aguilar, Norlie Z.\r\ncastillo, Sugar J.\r\ncastro, Bernalyn C.\r\npadilla, Paul Anthony N.\r\nraza, King Philip O.\r\nengr. Sherwin Dominguez (collaborator)', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2017) ENERGY-AND-WATER-SAVINGS-BY-MEANS-OF-GREEN-ROOF-SYSTEM.pdf'),
(107, 'Improvised Indoor Air Purifier', 'TestCode11', 'CEAT', 2017, 'Babaran, Jhon Andry M.\r\nde Sagun, Ven Andrei D.\r\nfabella, Grant F.\r\nisidoro, Lawrence Rae M.\r\nsantiago, Jerome P.\r\nengr. NiÑo Augusto Curpos (collaborator)', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2017) Improvised Indoor Air Purifier.pdf'),
(108, 'Microcontrolled Printed Circuit Board (pcb) Drilling Machine', 'TestCode', 'CEAT', 2017, 'Engr. Emelita C.presbitero\r\nmichael Kelvin M. Alday\r\njolina Danica J. Arcalas\r\nleah S. Cabillos\r\nestefany A. Dinglasan\r\nlito L. Iglesia\r\nbrayen H. Jalandoni\r\njaime P. Logronio\r\nkristine Mae Malinao\r\nlouise Clyve Anderson F. Rodis\r\neliza Mae C. Sanclaria\r\n', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2017) Microcontrolled Circuit Board.pdf'),
(109, 'Portable Microcontroller-based Turbidity Measuring Kit', 'TestCode', 'CEAT', 2017, 'Dulay, Rico James D.\r\ndumaya, Julie Anne C.\r\nechaluse, Ivan Orley E.\r\ngonzales, Marc Renzo B.\r\nguiyab, Jodee B.\r\nkasilag, Laurenz Carlo R.\r\nlacadin, Reynaldo P.\r\nluchavez, Jino B.\r\nmanuel, Patricia M.', 'CEAT Library - Multi-purpose Building / Third (3rd) Floor', '(2017) Portable Microcontroller-based Turbidity Measuring Kit.pdf'),
(110, 'Online Entrance Examinationsmart.scheduler. And Analytics System ', 'TestCode', 'CED', 2018, 'Hestaaova Morado\r\nmichelle Caroune 8. Rodriguez\r\n', 'CED Library - SNAGAH Building / Second (2nd) Floor', '(2018) Online Entrance Examination Smart-Scheduler And Analytic.pdf'),
(111, 'A Yracer Study Among The Graduates Of Bachelor Of ‘secondary Education Major In Social Studies Of Rizal Technological University Pasig Campus.  ‘batches 2010 And 201%    ', 'TestCode3', 'CED', 2018, 'Chie, Coleen F.\r\ngaiver, Mark Ditherson T.\r\n', 'CED Library - SNAGAH Building / Second (2nd) Floor', '(2018)A Tracer Study Among the Graduates of Bachelor of Seconda.pdf'),
(112, 'Analyzing Socio-politis Of Millennials ', 'TestCode6', 'CED', 2018, 'Caria Mae ¢. Bemilo\r\n‘hanna. Dumiso\r\nemmartyn Ann B. Gonzaga\r\nkaye Micaela C. Guingeangeo\r\n‘sia Mari L Mercurio\r\n', 'CED Library - SNAGAH Building / Second (2nd) Floor', '(2018)Analyzing Socio-Politics of Millennials.pdf'),
(113, 'Attitudes Of Senior Citizens Towards The Use Of Facebook ', 'TestCode2', 'CED', 2018, '‘raha 0. Orla\r\nleanne Jocater. Puazo\r\nfa M.ferorae\r\n‘shier. Pabao\r\n\r\ngiza J Rut\r\n', 'CED Library - SNAGAH Building / Second (2nd) Floor', '(2018)Attitude of Senior Citizens Towards the Use of Facebook.pdf'),
(114, 'On  ‘computer Literacy And Technology Adopted In Teaching Of High School Teachers In Selected Integrated Schools Of ‘mandaluyong City ', 'TestCode2', 'CED', 2018, 'May Ann 8.\r\n(cruz, Marielle T.\r\n[escopel, Kristine Joy D.\r\npatalanoo, Alberto V.\r\nramos, Camelle N', 'CED Library - SNAGAH Building / Second (2nd) Floor', '(2018)Computer Literacy and TEchnology Adopted in Teaching of H.pdf'),
(115, 'Booking Modes Among Travelers During The Covid-19 Pandemic: Implications For The Tourism Industry ', 'TestCode', 'GS', 2021, 'Dexter Ocampo', 'GS Library - RND Building / Third (3rd) Floor', '20221019_212514.pdf'),
(116, '   ‘booking Modes Among Travelers During The Covid-19 Pandemic: Implications For The Tourism Industry ', 'TestCode', 'GS', 2021, 'Dexter Ocampo', 'GS Library - RND Building / Third (3rd) Floor', '20221019_213135.pdf'),
(117, '‘correlates Of Leadership Skills For Head Teachership: Inputs For Policy Formulation In “succession Planning. ', 'TestCode', 'GS', 2015, '‘annabelle 8. Pomar\r\n', 'GS Library - RND Building / Third (3rd) Floor', '20221019_213559.pdf'),
(118, '‘competencies Of Instructional Supervisors Of |alma\'arifa International School As.  Predictor Of Teacher Commitment ', 'TestCode1', 'GS', 2015, 'Over Lemuel F. Chua\r\n', 'GS Library - RND Building / Third (3rd) Floor', '20221019_213801.pdf'),
(119, '[experiences And Activities In Practice Teaching Of The Institute Of Physical Education Student Teachers In Rizal Technologigal University. ', 'TestCode6', 'IPE', 2013, 'Dena € Apag\r\nreynante Brogada\r\ngerald Camo\r\narturo Tura\r\n', 'IPE Library - MAB Building / Fifth (5th) Floor', 'Ipe(1).pdf'),
(120, '[ffectweness Of Alternative Wornout Used Meme Ng ', 'TestCode2', 'IPE', 2018, '‘regine . Batoy\r\nsn Otson\r\n', 'IPE Library - MAB Building / Fifth (5th) Floor', 'Ipe(2).pdf'),
(121, 'Hindrance In The Academic Performance Of The Selected Ipe Student Atheltes Of Rizal Technological University', 'TestCode4', 'IPE', 2011, 'At Gn Rares\r\ndime A Gar\r\nta Ace Aes\r\narmel Snoa\r\n', 'IPE Library - MAB Building / Fifth (5th) Floor', 'Ipe(4).pdf'),
(122, 'Level Of Awareness On The Different Cultural Dances Of Selected Institute Of Physical Education Students', 'TestCode4', 'IPE', 2017, 'Valentino V Principe\r\nnorman June G. Paina\r\nmichael John O. Sula\r\n‘jaypee M. Viltoz\r\n‘danie L.toling\r\n', 'IPE Library - MAB Building / Fifth (5th) Floor', 'Ipe(5).pdf'),
(123, 'Hindrances In The Academic Performance Of The Selected Ipe Student Athletes ', 'TestCode2', 'IPE', 2011, 'Israel Dave G. Delos Reyes\r\n\r\ndimsy Jay A. Gar\r\n\r\n \r\n\r\nhystal Grace P. Ibanez\r\nangola S.nunag\r\n\r\njoomel A. Ramos\r\n', 'IPE Library - MAB Building / Fifth (5th) Floor', 'Ipe(6).pdf'),
(124, 'The Adaptation To College Life Of Freshman Students', 'TestCode', 'CBET', 2018, 'Arcabal, Christine Joy S.\r\ncabauatan Kate V.\r\nmabini Jizelle May A.\r\nnuevo Ginalyn L.\r\npablo Geraldine P', 'CBET Library - SNAGAH Building / Second (2nd) Floor', '(2018)THE ADAPTATION TO COLLEGE LIFE OF FRESHMAN STUDENTS.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_schedule`
--
ALTER TABLE `booked_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterkey`
--
ALTER TABLE `masterkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtu_admin`
--
ALTER TABLE `rtu_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_schedule`
--
ALTER TABLE `booked_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rtu_admin`
--
ALTER TABLE `rtu_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
