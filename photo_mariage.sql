-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 juin 2024 à 21:13
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photo_mariage`
--
CREATE DATABASE IF NOT EXISTS `photo_mariage` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin;
USE `photo_mariage`;

-- --------------------------------------------------------

--
-- Structure de la table `art_galerie`
--

CREATE TABLE `art_galerie` (
  `id_art_galerie` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `numero` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `art_galerie`
--

INSERT INTO `art_galerie` (`id_art_galerie`, `photo`, `numero`) VALUES
(1, './assets/img/background-2353004_1280.jpg', '1'),
(2, './assets/img/graffiti-1132204_1280.jpg', '2'),
(3, './assets/img/graffiti-623714_1280.jpg', '3'),
(4, './assets/img/architecture.jpg', '4'),
(5, './assets/img/street-4205751_1280.jpg', '5'),
(6, './assets/img/pexels-aa-dil-2884867.jpg', '6'),
(7, './assets/img/graphiti-2102686_1280.jpg', '7'),
(8, './assets/img/graffiti-623003_1280.jpg', '8'),
(9, './assets/img/background-2353004_1280.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'photo-mariage'),
(2, 'photo-occassion'),
(3, 'art-photo');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `civilite` enum('femme','homme') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `telephone` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `code_postal` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `role` enum('Role_User','Role_Admin') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT 'Role_User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `prenom`, `nom`, `civilite`, `email`, `password`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`, `role`) VALUES
(1, 'Eyerusalem', 'Me', 'femme', 'eyerus@gmail.com', '$2y$10$FFKvH8W371jXnyojKwWqIuUpKVNa/jgSYweJEuzPaV4NV2QaERzpS', '0606060606', '10, rue Terrage', '75010', 'Paris', 'France', 'Role_Admin'),
(2, 'Pascal', 'Diderot', 'homme', 'pascal@gmail.com', '$2y$10$vJNHM35VoC/0E303dw/CCeAl95CnMXUGvPfD06Mm8yjIbkf2ZIbqS', '0623230623', '22, rue Diderot', '75005', 'Paris', 'France', 'Role_User'),
(4, 'Rosa', 'Julien', 'femme', 'rosa@gmail.com', '$2y$10$93noZ/nOKg1SarGb6ngH7eafNf7jERvg4SDoSNqBaN4qUH1TmkKki', '0906121212', '34 Rue Rosaline', '75013', 'Paris', 'France', 'Role_Admin'),
(5, 'Marie', 'Julien', 'femme', 'marie@gmail.com', '$2y$10$4rxeMWoiaSbP0VH.IgtH6eVuwzr1.LoL05/MfMcEtqMBdaWpN2QMi', '0655443322', '21, Av Walwien', '93100', 'Montreuil', 'France', 'Role_User'),
(6, 'Robin', 'Simon', 'homme', 'robin@gmail.com', '$2y$10$QnbjeJjSoEXhX7.wc6uqquyJrZgVD13B5LbOlblkYnfizctL9hBWm', '0667548723', '3 pl, Charost', '78000', 'Versailles', 'France', 'Role_User'),
(8, 'Eyerus', 'Abera', 'femme', 'abera@gmail.com', '$2y$10$cUEfnNYYIxzAWkwHAtZtIOSsHRbFf3h9Ar32EYpOmLpqcf1uV1og6', '706080402', '33, rue de Pére', '94300', 'Vincennes', 'France', 'Role_Admin');

-- --------------------------------------------------------

--
-- Structure de la table `client_images`
--

CREATE TABLE `client_images` (
  `id_client_image` int NOT NULL,
  `client_id` int NOT NULL,
  `photo_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `client_images`
--

INSERT INTO `client_images` (`id_client_image`, `client_id`, `photo_id`) VALUES
(1, 5, 5),
(2, 5, 4),
(3, 5, 5),
(4, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id_galerie` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titre1` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `titre2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id_galerie`, `photo`, `titre1`, `titre2`) VALUES
(1, './assets/img/wedding-5.jpg', '________________', 'Mme & M George'),
(2, './assets/img/wedding-20.jpg', '________________', 'Mme & M George'),
(3, './assets/img/wedding-11.jpg', '________________', 'Mme & M George'),
(4, './assets/img/wedding-21.jpg', '________________', 'Mme & M George'),
(5, './assets/img/wedding-8.jpg', '________________', 'Mme & M George'),
(6, './assets/img/wedding-18.jpg', '________________', 'Mme & M George'),
(7, './assets/img/wedding-2.jpg', '________________', 'Mme & M George'),
(8, './assets/img/wedding-3.jpg', '________________', 'Mme & M George'),
(9, './assets/img/beach-wedding.jpg', '________________', 'Mme & M George'),
(10, './assets/img/wedding-7.jpg', '________________', 'Mme & M George'),
(11, './assets/img/wedding-17.jpg', '________________', 'Mme & M George'),
(12, './assets/img/wedding-16.jpg', '________________', 'Mme & M George'),
(13, './assets/img/wedding-13.jpg', '________________', 'Mme & M George'),
(14, './assets/img/wedding-15.jpg', '________________', 'Mme & M George');

-- --------------------------------------------------------

--
-- Structure de la table `occasions`
--

CREATE TABLE `occasions` (
  `id_occasions` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `occasions`
--

INSERT INTO `occasions` (`id_occasions`, `photo`, `titre`) VALUES
(1, './assets/img/occ-4.jpg', 'Lorem'),
(2, './assets/img/occ-5.jpg', 'Lorem'),
(3, './assets/img/occ-2.jpg', 'Lorem'),
(4, './assets/img/occ-11.jpg', 'Lorem'),
(5, './assets/img/occ-10.jpg', 'Lorem'),
(6, './assets/img/occ-14.jpg', 'Lorem'),
(7, './assets/img/occ-15.jpg', 'Lorem'),
(8, './assets/img/occ-12.jpg', 'Lorem'),
(9, './assets/img/occ-7.jpg', 'Lorem'),
(10, './assets/img/occ-3.jpg', 'Lorem'),
(11, './assets/img/occ-6.jpg', 'Lorem'),
(12, './assets/img/occ-1.jpg', 'Lorem'),
(13, './assets/img/occ-13.jpg', 'Lorem'),
(14, './assets/img/occ-16.jpg', 'Lorem');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int NOT NULL,
  `galerie_id` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `photo_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `galerie_id`, `photo`, `photo_name`, `upload_date`) VALUES
(1, 1, './Bureau/E-commerce-photos-1/bride-1874655_1280.jpg', 'Mme M Pascal, album-4', '2023-05-24'),
(2, 1, 'couple-8019370_1280.jpg', 'Mme M Pascal, album-4', '2023-05-24'),
(3, 1, 'pexels-irina-iriser-871854.jpg', 'Mme M Pascal, album-4', '2024-05-24'),
(4, 1, './assets/img/ai-generated-8158896_1280.jpg', 'Mme M Pascal, album-4', '2024-05-24'),
(5, 1, './assets/img/couple-4615557_1280.jpg', 'Mme M Pascal, album-4', '2023-05-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `art_galerie`
--
ALTER TABLE `art_galerie`
  ADD PRIMARY KEY (`id_art_galerie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `client_images`
--
ALTER TABLE `client_images`
  ADD PRIMARY KEY (`id_client_image`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `client_images_ibfk_2` (`photo_id`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id_galerie`);

--
-- Index pour la table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id_occasions`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `art_galerie`
--
ALTER TABLE `art_galerie`
  MODIFY `id_art_galerie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `client_images`
--
ALTER TABLE `client_images`
  MODIFY `id_client_image` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id_galerie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id_occasions` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client_images`
--
ALTER TABLE `client_images`
  ADD CONSTRAINT `client_images_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id_client`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `client_images_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id_photo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
