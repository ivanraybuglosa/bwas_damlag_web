-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 06:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `android_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `basketball`
--

CREATE TABLE `basketball` (
  `basketball_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `basketball_position` text NOT NULL,
  `basketball_rebounds` int(3) NOT NULL,
  `basketball_steals` int(3) NOT NULL,
  `basketball_assists` int(3) NOT NULL,
  `basketball_blocks` int(3) NOT NULL,
  `basketball_minutes_played` int(3) NOT NULL,
  `basketball_fouls` int(2) NOT NULL,
  `basketball_turnovers` int(3) NOT NULL,
  `basketball_points` int(3) NOT NULL,
  `basketball_missedFG` int(3) NOT NULL,
  `basketball_average` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basketball`
--

INSERT INTO `basketball` (`basketball_id`, `user_id`, `basketball_position`, `basketball_rebounds`, `basketball_steals`, `basketball_assists`, `basketball_blocks`, `basketball_minutes_played`, `basketball_fouls`, `basketball_turnovers`, `basketball_points`, `basketball_missedFG`, `basketball_average`) VALUES
(1, 39, 'Point Guard', 5, 5, 5, 5, 20, 5, 8, 5, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `football`
--

CREATE TABLE `football` (
  `football_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `football_position` text NOT NULL,
  `football_goals` int(2) NOT NULL,
  `football_minutes_played` int(3) NOT NULL,
  `football_yellow_cards` int(2) NOT NULL,
  `football_red_cards` int(2) NOT NULL,
  `football_assists` int(3) NOT NULL,
  `football_penalty_kicks` int(2) NOT NULL,
  `football_penalty_kick_goals` int(2) NOT NULL,
  `football_goal_attempts` int(3) NOT NULL,
  `football_passes` int(3) NOT NULL,
  `football_steals` int(3) NOT NULL,
  `football_offsides` int(3) NOT NULL,
  `football_game_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `invite_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`invite_id`, `coach_id`, `athlete_id`, `message`, `created_at`) VALUES
(1, 25, 0, 'Jerome Aledron invited you for a tryout', '2018-08-14 15:33:00'),
(2, 25, 0, 'Jerome Aledron invited you for a tryout', '2018-08-14 15:35:00'),
(3, 25, 40, 'Jerome Aledron invited you for a tryout', '2018-08-14 15:36:00'),
(4, 25, 31, 'Jerome Aledron invited you for a tryout', '2018-08-14 15:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `school` varchar(100) DEFAULT NULL,
  `previous_school` text,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `gender` text NOT NULL,
  `sport` text,
  `position` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `school`, `previous_school`, `contact`, `address`, `birthdate`, `gender`, `sport`, `position`, `created_at`, `updated_at`, `type`, `status`, `image`) VALUES
(24, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', NULL, NULL, NULL, NULL, '1978-12-06', 'Male', NULL, NULL, '2018-07-31 23:07:32', '2018-07-31 23:07:32', 'Admin', 'Activated', ''),
(25, 'Jerome Aledron', '39ea2bf6a4d98585851d2bd07f0d13d1', 'jerome@gmail.com', 'UNOR', NULL, '09123131321', 'AddressAddressAddressAddress', '1978-12-06', 'Male', 'Basketball', NULL, '2018-07-31 23:12:23', '2018-08-05 23:42:50', 'Coach', 'Activated', ''),
(26, 'Ivan Ray Buglosa', '39ea2bf6a4d98585851d2bd07f0d13d1', 'ivan@gmail.com', 'USLS', NULL, '231313131', 'asdadadsa', '1978-12-06', 'Male', 'Volleyball', NULL, '2018-08-01 00:24:46', '2018-08-01 00:24:46', 'Coach', 'Activated', ''),
(29, 'john wick', '39ea2bf6a4d98585851d2bd07f0d13d1', 'wick@gmail.com', NULL, 'sumag ', '092412421421', 'afdasfsafasfdasfda', '1978-12-06', 'Male', 'Football', 'Striker', '2018-08-02 00:23:54', '2018-08-02 00:23:54', 'Athlete', 'Activated', ''),
(31, 'Roger Jaime', 'b911af807c2df88d671bd7004c54c1c2', 'Roger@yahoo.com', NULL, 'usls', '4461039', 'Bacolod City ', '1996-10-23', 'Male', 'Basketball', 'Point Guard', '2018-08-03 00:57:30', '2018-08-03 00:57:30', 'Athlete', 'Activated', 'E.jpg'),
(32, 'Xenon Debulgado', '43c1cb1c1cf84a689b551d8dd1b13190', 'Xenonsky@gmail.com', NULL, 'usls', '1234567890', 'Bacolod City', '1978-12-06', 'Male', 'Football', 'Goal Keeper', '2018-08-03 01:01:35', '2018-08-03 01:01:35', 'Athlete', 'Activated', ''),
(33, 'coach', '39ea2bf6a4d98585851d2bd07f0d13d1', 'dsadada@gmail.com', 'LCC', NULL, '0912313', 'coach', '1978-12-06', 'Male', 'Volleyball', NULL, '2018-08-05 14:26:41', '2018-08-05 14:26:41', 'Coach', 'Activated', ''),
(34, 'vicmar yanson', '39ea2bf6a4d98585851d2bd07f0d13d1', 'vicmar@gmail.com', 'USLS', NULL, '09312313132131', 'address', '1978-12-06', 'Male', 'Basketball', NULL, '2018-08-07 22:42:50', '2018-08-07 22:42:50', 'Coach', 'Deactivated', ''),
(35, 'vicmar yanson', '1990-08-07', 'yanson@gmail.com', 'USLS', NULL, '09321313132', 'dadasdsa', '1978-12-06', 'Male', 'Football', 'Center Defender', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Athlete', 'Activated', ''),
(36, 'asdasdasd', '39ea2bf6a4d98585851d2bd07f0d13d1', 'asdasd@gmail.com', 'LCC', NULL, '2313131321', 'address', '1978-12-06', 'Male', 'Football', NULL, '2018-08-07 22:48:26', '2018-08-07 22:48:26', 'Coach', 'Activated', ''),
(37, 'dasdad', '00924930273acce5928b1f11e4986604', 'dasdad@gmail.com', 'LCC', NULL, '12313131', 'Addresssss', '1978-12-06', 'Male', 'Basketball', NULL, '2018-08-07 22:50:32', '2018-08-07 22:50:32', 'Coach', 'Deactivated', ''),
(39, 'Vicmar Joseph Yanson1', '827ccb0eea8a706c4c34a16891f84e7b', 'vicmar.yanson@gmail.com', NULL, 'Bata National High School', '0915733940111', 'Bacolod City', '1996-03-06', 'Male', 'Basketball', 'Point Guard', '2018-08-12 10:08:19', '2018-08-12 18:14:37', 'Athlete', 'Activated', ''),
(40, 'V', '39ea2bf6a4d98585851d2bd07f0d13d1', 'E@d.com', 'UNOR', 'Abkasa National High School', '1', 'W', '2018-08-14', 'Male', 'Basketball', 'Shooting Guard', '2018-08-12 10:55:02', '2018-08-16 00:17:52', 'Athlete', 'Activated', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `volleyball`
--

CREATE TABLE `volleyball` (
  `volleyball_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `volleyball_position` text NOT NULL,
  `volleyball_games_played` int(11) NOT NULL,
  `volleyball_points` int(11) NOT NULL,
  `volleyball_error` int(11) NOT NULL,
  `volleyball_total_attempts` int(11) NOT NULL,
  `volleyball_hitting_percentage` int(11) NOT NULL,
  `volleyball_assist` int(11) NOT NULL,
  `volleyball_service_ace` int(11) NOT NULL,
  `volleyball_service_error` int(11) NOT NULL,
  `volleyball_reception_error` int(11) NOT NULL,
  `volleyball_dig` int(11) NOT NULL,
  `volleyball_block_solo` int(11) NOT NULL,
  `volleyball_block_assist` int(11) NOT NULL,
  `volleyball_blocking_error` int(11) NOT NULL,
  `volleyball_ball_handling_error` int(11) NOT NULL,
  `volleyball_total_team_blocks` int(11) NOT NULL,
  `volleyball_game_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basketball`
--
ALTER TABLE `basketball`
  ADD PRIMARY KEY (`basketball_id`);

--
-- Indexes for table `football`
--
ALTER TABLE `football`
  ADD PRIMARY KEY (`football_id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`invite_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volleyball`
--
ALTER TABLE `volleyball`
  ADD PRIMARY KEY (`volleyball_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basketball`
--
ALTER TABLE `basketball`
  MODIFY `basketball_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `football`
--
ALTER TABLE `football`
  MODIFY `football_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `volleyball`
--
ALTER TABLE `volleyball`
  MODIFY `volleyball_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
