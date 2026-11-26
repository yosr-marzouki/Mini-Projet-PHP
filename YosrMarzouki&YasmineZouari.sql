-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 nov. 2026 à 15:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pâtisserie`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `nom_article` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `nom_article`, `description`, `prix`, `image`, `id_categories`) VALUES
(1, 'Gâteau au chocolat', 'Délicieux gâteau au chocolat avec une ganache fondante et une génoise moelleuse. Idéal pour les anniversaires et les occasions spéciales.', 35.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHJ99rDriLEf7Xk3lA4y02Oq1whjVki_Xx-1lVj19lrnXgR26oHMD2HHo&s=10', 1),
(2, 'Gâteau Red Velvet', 'Gâteau moelleux avec crème', 45.00, 'https://images.unsplash.com/photo-1586788680434-30d324b2d46f', 1),
(3, 'Tarte aux fraises', 'Tarte garnie de fraises fraîches', 25.07, 'https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81', 2),
(4, 'Tarte au citron', 'Tarte au citron avec crème', 22.00, 'https://images.unsplash.com/photo-1519915028121-7d3463d20b13', 0),
(5, 'Croissant au beurre', 'Croissant frais et croustillant', 3.00, 'https://images.unsplash.com/photo-1555507036-ab1f4038808a', 3),
(6, 'Cupcake chocolat', 'Cupcake au chocolat et crème', 7.00, 'https://images.unsplash.com/photo-1486427944299-d1955d23e34d', 4),
(7, 'Cookies au chocolat', 'Cookies croustillants aux pépites', 4.00, 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e', 5),
(8, 'Tiramisu', 'Dessert italien au café et mascarpone', 10.00, 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9', 6),
(10, 'Entremets pistache et framboise', 'Délicieux entremets composé d\'une mousse légère à la pistache, d\'un cœur fondant à la framboise et d\'un biscuit moelleux', 50.00, 'https://images.openai.com/static-rsc-4/A8x2TNTRlD_f9kk3kWuqB0fwLXCJD43wd0AIqx6hny6Er3l_rkvcFWKfnnGhaB9O-JCgvxLhLc2vdB_5sbxVpRr-HpA685uA-QsoKB_5tsid-qjOgfivTQRIbtlX4JL-9UBnyz4yPGE0Yc6BoVuHrIIGxkzNlpRRdL9fOHLxOD9u_iwhrxIphfDxmnLSnLL2?purpose=fullsize', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `nom_categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `nom_categories`) VALUES
(1, 'Gâteaux'),
(2, 'Tartes'),
(3, 'Viennoiseries'),
(4, 'Cupcakes'),
(5, 'Desserts froids'),
(6, 'Biscuits');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favori` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `role`) VALUES
(1, 'Yasmine', '$2y$10$tMBEGD01Hov6z9L14acmmOueBlFicXOVpJwsgcK6ymhmcjTmz7s8S', ''),
(2, 'AdminYasmine', '1234', 'admin'),
(3, 'yasmina', '$2y$10$Utn5KyWv66tS3bhtoNXFEOEXx/7JS0zHSgbk.B08SldGp9iu0nmYO', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categorie` (`id_categories`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favori`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
