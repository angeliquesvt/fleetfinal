-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 mars 2018 à 12:20
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basefleet`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_projet` int(11) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `ref` varchar(60) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comments_projets` (`id_projet`),
  KEY `FK_comments_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_projet`, `content`, `created_at`, `ref`, `parent_id`, `firstname`, `lastname`) VALUES
(1, 1, 74, 'LOREMLOREMLOREM', '2018-03-22 15:20:15', 'projets', 0, NULL, NULL),
(2, 1, 74, 'salut', '2018-03-22 17:31:06', 'projets', 0, NULL, NULL),
(10, 1, 74, 'zezeze', '2018-03-22 23:29:36', 'projets', 2, 'angelique', 'souvant'),
(12, 1, 74, 'zezeze', '2018-03-22 23:31:19', 'projets', 2, 'angelique', 'souvant');

-- --------------------------------------------------------

--
-- Structure de la table `contributors`
--

DROP TABLE IF EXISTS `contributors`;
CREATE TABLE IF NOT EXISTS `contributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_need` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_contributors_users` (`id_user`),
  KEY `FK_contributors_needs` (`id_need`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `libelle` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_hobbies_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hobbies`
--

INSERT INTO `hobbies` (`id`, `id_user`, `libelle`) VALUES
(7, 1, 'danse'),
(8, 1, 'developpement web');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_projet` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_likes_users` (`id_user`),
  KEY `FK_likes_projets` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `needs`
--

DROP TABLE IF EXISTS `needs`;
CREATE TABLE IF NOT EXISTS `needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL DEFAULT '0',
  `libelle` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_needs_projets` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `needs`
--

INSERT INTO `needs` (`id`, `id_projet`, `libelle`) VALUES
(112, 69, 'Lorem ipsum dolor '),
(113, 69, 'Lorem ipsum dolor '),
(114, 70, 'Lorem ipsum dolor '),
(115, 71, 'Lorem ipsum dolor');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `content` text,
  `background` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `title`, `description`, `content`, `background`, `created_at`) VALUES
(1, 'Elon Musk', 'Le parcours d\'Elon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a arcu quis dui vulputate sodales eget eu turpis. Vivamus feugiat hendrerit lectus, et tempus quam ornare quis. Aenean sed lectus quis odio commodo congue vel ut diam. Nunc ac venenatis lorem, a semper ligula. Ut sit amet erat ante. Maecenas vehicula, mi eget lobortis pellentesque, quam nisi pellentesque neque, nec posuere dolor quam non ligula. Nam imperdiet, ligula vel rutrum convallis, arcu augue rhoncus ante, volutpat mollis tortor ligula at ante.\r\n\r\nDuis interdum dignissim maximus. Praesent fermentum sapien laoreet ex vehicula, at congue diam dictum. Vivamus condimentum sapien in diam bibendum, non lacinia sem iaculis. Proin lobortis pretium risus. In sit amet pharetra erat. Aenean ornare libero eu magna pellentesque porta. Etiam semper porttitor purus et faucibus.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Praesent sit amet nisl nec enim congue finibus. Etiam sagittis quam id mauris porttitor dignissim. Aenean a metus quam. Vestibulum imperdiet, lacus a feugiat blandit, diam felis posuere mauris, sed fermentum sapien magna eget magna. Etiam pretium libero vel nulla sagittis pretium. Curabitur diam ex, condimentum hendrerit dapibus vel, pharetra porta dolor. Suspendisse potenti.\r\n\r\nVestibulum maximus turpis eu sem maximus, nec ultricies urna rhoncus. Pellentesque mattis molestie malesuada. Donec mattis lectus et rhoncus vulputate. Etiam pulvinar suscipit aliquet. Vestibulum ultrices dictum ex, eget tempus lorem gravida sit amet. Suspendisse efficitur elit non sem viverra aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac lacinia arcu. Aenean est ligula, euismod quis augue quis, finibus pellentesque nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\n', 'PMjKbX1R5Uelon.jpg', '2018-03-25 12:51:27'),
(2, 'Elon Musk', 'Le parcours d\'Elon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a arcu quis dui vulputate sodales eget eu turpis. Vivamus feugiat hendrerit lectus, et tempus quam ornare quis. Aenean sed lectus quis odio commodo congue vel ut diam. Nunc ac venenatis lorem, a semper ligula. Ut sit amet erat ante. Maecenas vehicula, mi eget lobortis pellentesque, quam nisi pellentesque neque, nec posuere dolor quam non ligula. Nam imperdiet, ligula vel rutrum convallis, arcu augue rhoncus ante, volutpat mollis tortor ligula at ante.\r\n\r\nDuis interdum dignissim maximus. Praesent fermentum sapien laoreet ex vehicula, at congue diam dictum. Vivamus condimentum sapien in diam bibendum, non lacinia sem iaculis. Proin lobortis pretium risus. In sit amet pharetra erat. Aenean ornare libero eu magna pellentesque porta. Etiam semper porttitor purus et faucibus.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Praesent sit amet nisl nec enim congue finibus. Etiam sagittis quam id mauris porttitor dignissim. Aenean a metus quam. Vestibulum imperdiet, lacus a feugiat blandit, diam felis posuere mauris, sed fermentum sapien magna eget magna. Etiam pretium libero vel nulla sagittis pretium. Curabitur diam ex, condimentum hendrerit dapibus vel, pharetra porta dolor. Suspendisse potenti.\r\n\r\nVestibulum maximus turpis eu sem maximus, nec ultricies urna rhoncus. Pellentesque mattis molestie malesuada. Donec mattis lectus et rhoncus vulputate. Etiam pulvinar suscipit aliquet. Vestibulum ultrices dictum ex, eget tempus lorem gravida sit amet. Suspendisse efficitur elit non sem viverra aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac lacinia arcu. Aenean est ligula, euismod quis augue quis, finibus pellentesque nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\n', '7CDLGAbbgBelon.jpg', '2018-03-25 12:53:03');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `like_count` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `background` varchar(255) DEFAULT NULL,
  `baseline` varchar(255) DEFAULT NULL,
  `support` text,
  `objectif` text,
  `cibles` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `title`, `like_count`, `description`, `background`, `baseline`, `support`, `objectif`, `cibles`, `created_at`, `id_user`) VALUES
(69, '7art', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis ac molestie dui. Nam felis tortor, euismod vulputate semper at, commodo ut lorem. Vivamus ac blandit ligula. Vestibulum in odio in ex pretium interdum vel ut enim. Donec eget lobortis tortor. Fusce a vehicula nisl, et congue nisl. Sed at tempus lacus, nec eleifend justo. Nullam ipsum libero, fermentum et hendrerit vel, ultricies non justo. Phasellus nec mauris ut justo sollicitudin feugiat sed in orci. Phasellus ut cursus eros. Etiam tincidunt ac mauris sit amet tristique.', '7art.jpg', 'Les secrets du cinÃ©ma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis ac molestie dui. Nam felis tortor, euismod vulputate semper at, commodo ut lorem. Vivamus ac blandit ligula. Vestibulum in odio in ex pretium interdum vel ut enim. Donec eget lobortis tortor. Fusce a vehicula nisl, et congue nisl. Sed at tempus lacus, nec eleifend justo. Nullam ipsum libero, fermentum et hendrerit vel, ultricies non justo. Phasellus nec mauris ut justo sollicitudin feugiat sed in orci. Phasellus ut cursus eros. Etiam tincidunt ac mauris sit amet tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Dui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis a', '2018-03-16 13:01:07', 1),
(70, 'Investigames', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis ac molestie dui. Nam felis tortor, euismod vulputate semper at, commodo ut lorem. Vivamus ac blandit ligula. Vestibulum in odio in ex pretium interdum vel ut enim. Donec eget lobortis tortor. Fusce a vehicula nisl, et congue nisl. Sed at tempus lacus, nec eleifend justo. Nullam ipsum libero, fermentum et hendrerit vel, ultricies non justo. Phasellus nec mauris ut justo sollicitudin feugiat sed in orci. Phasellus ut cursus eros. Etiam tincidunt ac mauris sit amet tristique.', 'investigames.jpg', 'Jeu d\'enquÃªte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis ac molestie dui. Nam felis tortor, euismod vulputate semper at, commodo ut lorem. Vivamus ac blandit ligula. Vestibulum in odio in ex pretium interdum vel ut enim. Donec eget lobortis tortor. Fusce a vehicula nisl, et congue nisl. Sed at tempus lacus, nec eleifend justo. Nullam ipsum libero, fermentum et hendrerit vel, ultricies non justo. Phasellus nec mauris ut justo sollicitudin feugiat sed in orci. Phasellus ut cursus eros. Etiam tincidunt ac mauris sit amet tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. Duis ac molestie dui. Nam felis tortor, euismod vulputate semper at, commodo ut lorem. Vivamus ac blandit ligula. Vestibulum in odio in ex pretium interdum vel ut enim. Donec eget lobortis tortor. Fusce a vehicula nisl, et congue nisl. Sed at tempus lacus, nec eleifend justo. Nullam ipsum libero, fermentum et hendrerit vel, ultricies non justo. Phasellus nec mauris ut justo sollicitudin feugiat sed in orci. Phasellus ut cursus eros. Etiam tincidunt ac mauris sit amet tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus neque nec augue cursus, et elementum turpis imperdiet. Maecenas nec mauris dui. D', '2018-03-16 13:04:09', 1),
(71, 'Bhind', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'bhind.jpg', 'Site pour visiter les banlieues', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', '2018-03-16 13:09:34', 1),
(72, 'Fictio', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'fictio.jpg', 'Application mobile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', '2018-03-16 13:11:15', 1),
(73, 'Fleet', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'fleet.jpg', 'Site d\'entraide et de dÃ©veloppement de projet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.', '2018-03-16 13:15:21', 1),
(74, 'Wylido', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.\r\n\r\n', 'wylido.jpg', 'Site de rencontre pour chiens', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis urna tellus. Curabitur et massa ac odio vehicula auctor sed et nisi. Sed feugiat sed odio id cursus. Vestibulum tortor magna, mollis vitae sem ut, commodo cursus mauris. Fusce fringilla, quam a volutpat convallis, turpis neque gravida dui, at posuere nisl ex non nisi. Vivamus nec laoreet mauris. Fusce blandit, dui at sollicitudin rhoncus, lectus tellus fringilla lectus, ut ultrices arcu diam efficitur nisl. Aliquam elementum sapien augue, posuere accumsan neque iaculis vel. Vestibulum semper pretium ligula, non scelerisque orci dignissim a. Nullam faucibus neque ac erat finibus, eget ullamcorper turpis aliquet. Phasellus in lectus id diam eleifend sagittis in sollicitudin massa.\r\n\r\n', '2018-03-16 13:20:59', 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL DEFAULT '0',
  `libelle` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__projets` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `id_projet`, `libelle`) VALUES
(52, 69, 'Lorem ipsum dolor '),
(53, 69, 'Lorem ipsum dolor '),
(54, 70, 'Lorem ipsum dolor '),
(55, 70, 'Lorem ipsum dolor '),
(56, 73, 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Structure de la table `revu`
--

DROP TABLE IF EXISTS `revu`;
CREATE TABLE IF NOT EXISTS `revu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `content` text,
  `background` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `revu`
--

INSERT INTO `revu` (`id`, `title`, `description`, `content`, `background`, `created_at`) VALUES
(1, 'La revu de presse', 'Revue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a arcu quis dui vulputate sodales eget eu turpis. Vivamus feugiat hendrerit lectus, et tempus quam ornare quis. Aenean sed lectus quis odio commodo congue vel ut diam. Nunc ac venenatis lorem, a semper ligula. Ut sit amet erat ante. Maecenas vehicula, mi eget lobortis pellentesque, quam nisi pellentesque neque, nec posuere dolor quam non ligula. Nam imperdiet, ligula vel rutrum convallis, arcu augue rhoncus ante, volutpat mollis tortor ligula at ante.\r\n\r\nDuis interdum dignissim maximus. Praesent fermentum sapien laoreet ex vehicula, at congue diam dictum. Vivamus condimentum sapien in diam bibendum, non lacinia sem iaculis. Proin lobortis pretium risus. In sit amet pharetra erat. Aenean ornare libero eu magna pellentesque porta. Etiam semper porttitor purus et faucibus.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Praesent sit amet nisl nec enim congue finibus. Etiam sagittis quam id mauris porttitor dignissim. Aenean a metus quam. Vestibulum imperdiet, lacus a feugiat blandit, diam felis posuere mauris, sed fermentum sapien magna eget magna. Etiam pretium libero vel nulla sagittis pretium. Curabitur diam ex, condimentum hendrerit dapibus vel, pharetra porta dolor. Suspendisse potenti.\r\n\r\nVestibulum maximus turpis eu sem maximus, nec ultricies urna rhoncus. Pellentesque mattis molestie malesuada. Donec mattis lectus et rhoncus vulputate. Etiam pulvinar suscipit aliquet. Vestibulum ultrices dictum ex, eget tempus lorem gravida sit amet. Suspendisse efficitur elit non sem viverra aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac lacinia arcu. Aenean est ligula, euismod quis augue quis, finibus pellentesque nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\n', 'elon.jpg', '2018-03-25 12:54:48');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'utilisateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `sexe` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `entreprise` varchar(50) DEFAULT NULL,
  `id_role` int(11) DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `background`, `birthdate`, `sexe`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `avatar`, `poste`, `entreprise`, `id_role`, `description`) VALUES
(1, 'angelique', 'souvant', NULL, '1994-06-11', 'F', 'angelique.souvant@gmail.com', '$2y$10$F2U/ZwpI4u3dnB2PJLjPGu7oDb0Rbf12CwFEC4BrWyHjulBLOS0c6', NULL, '2018-02-17 12:11:10', NULL, NULL, 'rYV6YcXH9IgeI1OOO4l4pnVdGOyhponyguHebV7e3mT0cOHpJLcx4sXPA6nKG1TqckdLk2C5CJHZGbiorLRPjFO5tz1MMi40uq3ZfybLcClL8uyPyq1UVWkacUXYFrwynTfcsOdw4qvu20BmMxS32E9eRLZIorh5l2sbFaXWIlbZRS9saCRvunv5wpRkyVyD6miDhC5H6SOXcjvQ5EhdRI0fdA9CvfQGKlslXTz0rXDxaJViQOt9ZQYSKG', NULL, '1qsd', NULL, 2, 'salut ptp'),
(2, 'PEEROO', 'Nitish', NULL, '1993-08-28', 'H', 'nitish.peeroo@gmail.com', '$2y$10$InIDQFmDRmm64OqgEMz36uIKyRXbjISHoT7z6etzk6uw7oxHS/An.', NULL, '2018-03-11 23:44:18', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'salut c moi'),
(3, 'San', 'Rav', NULL, '1998-11-01', 'H', 'san@san.com', '$2y$10$l3zgJjKLnix0fwW.eUWkFuGIzCfKjI3afT/SzCyHlBsUA1inDuQlC', NULL, '2018-03-25 00:53:46', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_id` (`ref_id`),
  KEY `ref` (`ref`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contributors`
--
ALTER TABLE `contributors`
  ADD CONSTRAINT `FK_contributors_needs` FOREIGN KEY (`id_need`) REFERENCES `needs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contributors_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `FK_hobbies_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_likes_projets` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_likes_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `needs`
--
ALTER TABLE `needs`
  ADD CONSTRAINT `FK_needs_projets` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK__projets` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
