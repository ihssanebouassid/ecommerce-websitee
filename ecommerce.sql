-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 juin 2026 à 14:33
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
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp(),
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `stock_dispo` int(11) DEFAULT NULL,
  `genre` enum('Femme','Homme','Enfant') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `image`, `prix`, `stock_dispo`, `genre`) VALUES
(2, 'T-shirt blanc', 'Ce t-shirt graphique pour femme est conçu en polyester avec un tissu légèrement extensible, doux et confortable à porter. Il présente différents styles d’imprimés, comme des motifs vintage, des lettres ou des designs graphiques, dont un imprimé voiture, ce qui lui donne un look moderne et tendance. Idéal pour l’été, il convient parfaitement à diverses occasions telles que le shopping, les sorties, le travail, les rendez-vous ou la vie quotidienne. Facile à assortir, il se porte très bien avec un jean taille haute, un short ou un pantalon large pour un style décontracté et élégant. Avant de commander, il est recommandé de vérifier attentivement le guide des tailles indiqué dans la description du produit.', 'T-shirtt1.png', 228, 2, 'Femme'),
(3, 'T-shirt garçon', 'Ce t-shirt pour garçon à col rond et manches courtes est conçu pour offrir confort et liberté de mouvement au quotidien. Son tissu doux et léger le rend agréable à porter tout au long de la journée. Avec son imprimé à rayures, il apporte une touche moderne et dynamique, idéale pour un style décontracté. Facile à assortir avec un jean, un short ou un jogging, c’est un basique pratique et tendance pour toutes les occasions.', 'x.png', 500, 3, 'Enfant'),
(4, 'Robe en Jean Élégante', 'Découvrez cette magnifique robe en jean, un incontournable de votre garde-robe. Confectionnée dans un denim de qualité, elle offre un équilibre parfait entre confort et style. Sa coupe moderne met en valeur la silhouette tout en garantissant une grande liberté de mouvement. Polyvalente et tendance, elle peut être portée aussi bien au quotidien qu\'à l\'occasion d\'une sortie entre amis. Associez-la à des baskets pour un look décontracté ou à des sandales pour une allure plus féminine. Une pièce intemporelle qui ne se démode jamais.Prix : Selon le modèle et la collection.Matière : Denim doux et résistant.Style : Casual, chic et moderne.Couleur : Bleu jean classique.', 'robee.png', 400, 5, 'Femme'),
(5, 'T-shirt', 'T-shirt blanc homme\r\n', 'T-shirtt.png', 300, 9, 'Homme'),
(6, 'Mocassins en daim ', 'Ces mocassins en daim pour homme sont conçus pour allier élégance et confort au quotidien. Leur dessus en daim avec finition soignée apporte une touche raffinée et moderne, tandis que leur semelle légère et flexible assure un excellent confort tout au long de la journée. Faciles à enfiler grâce à leur design minimaliste sans lacets, ils sont parfaits pour un style à la fois chic et décontracté. Polyvalents, ils s’adaptent aussi bien aux tenues business casual qu’aux looks plus relax pour les sorties ou les soirées.', 'e.png', 480, 9, 'Homme'),
(7, 'Jeans homme', 'Ce jean pour homme est une pièce essentielle du dressing masculin, alliant confort et style. Conçu dans une matière résistante et agréable à porter, il offre une coupe moderne qui s’adapte facilement à toutes les silhouettes. Polyvalent, il peut être porté au quotidien avec un t-shirt pour un look décontracté ou avec une chemise pour un style plus soigné. Idéal pour toutes les occasions, ce jean assure une allure tendance et intemporelle.', 'r.png', 210, 9, 'Homme'),
(8, 'Polo casual homme', 'Ce polo à manches longues pour homme est un vêtement à la fois simple, élégant et confortable. Doté d’un col à revers et d’un design uni, il offre un style décontracté facile à porter au quotidien. Sa coupe soignée assure un bon confort tout en mettant en valeur une allure moderne et masculine. Idéal pour les sorties casual, le travail ou les moments de détente, il se marie facilement avec un jean ou un pantalon chino pour un look élégant sans effort.', 't.png', 340, 9, 'Homme'),
(9, 'T-shirt casual', 'Cette camisette casual pour femme à manches courtes est idéale pour l’été. Elle est conçue dans un tissu tricoté extensible offrant un grand confort et une bonne liberté de mouvement. Son design avec demi-ouverture apporte une touche moderne et élégante, tandis que sa couleur marron café et ses motifs combinés (animal et couleurs variées) lui donnent un style original et tendance. Parfaite pour un look décontracté au quotidien, elle peut être portée lors des sorties estivales ou des moments de détente, tout en restant stylée et confortable.', 'a.png', 160, 9, 'Femme'),
(10, 'Sandaletanlon', 'Ces sandales style tongs à bout carré offrent un design moderne et élégant, parfait pour la saison estivale. Avec un talon de 5 cm, elles apportent une légère hauteur qui affine la silhouette tout en restant confortables pour un usage quotidien. Confectionnées en similicuir (PU), elles allient style et praticité, tout en étant faciles à entretenir. Il suffit de les essuyer pour les garder propres et en bon état. Idéales pour compléter une tenue décontractée ou chic, elles s’adaptent facilement à différents looks.', 'sandaletalonn.png', 900, 9, 'Femme'),
(11, 'Jupe drapée ', 'Cette jupe longue marron pour femme se distingue par sa coupe fluide et élégante qui apporte une allure raffinée et moderne. Son détail drapé et froncé à la taille crée un effet sophistiqué tout en mettant délicatement la silhouette en valeur. Confectionnée dans une matière douce et agréable à porter, elle offre un tombé fluide et un confort optimal au quotidien. Polyvalente, elle se porte aussi bien avec un top ajusté pour un look chic qu’avec un pull léger pour un style plus décontracté.', 'Jupe.png', 255, 9, 'Femme'),
(12, 'Robe à petits pois', 'Cette robe à petits pois pour femme allie charme classique et élégance intemporelle. Avec son imprimé délicat à pois, elle apporte une touche féminine et raffinée à votre garde-robe. Sa coupe fluide et confortable met la silhouette en valeur tout en assurant une grande liberté de mouvement. Idéale pour les sorties, les occasions spéciales ou le quotidien, elle se porte facilement avec des sandales, des escarpins ou des baskets pour un look chic et tendance en toute simplicité.', 'Robe.png', 480, 9, 'Femme'),
(15, 'SandaleTalon ', 'Cette sandale à talon marron de style Zara allie élégance moderne et confort. Son design épuré et raffiné en fait un choix idéal pour les occasions spéciales comme pour les sorties quotidiennes. Dotée d’un talon élégant qui élance la silhouette, elle apporte une touche sophistiquée à toutes vos tenues. Sa couleur marron intemporelle s’associe facilement avec des robes, des jupes ou des pantalons pour un look chic et tendance. Confortable et féminine, cette sandale est un indispensable de la garde-robe moderne.', 'sandaletalone.png', 1000, 4, 'Femme'),
(17, 'Ballerines chanel', 'Les ballerines Chanel incarnent l’élégance intemporelle et le raffinement à la française. Confectionnées avec des matériaux de haute qualité, elles offrent un confort exceptionnel tout en restant très chic. Leur design épuré, souvent orné du célèbre logo ', 'm.png', 480, 6, 'Femme'),
(22, 'Chemise rayée', 'Cette chemise à rayures bleues pour femme est un vêtement élégant et moderne, idéal pour un style professionnel ou casual chic. Avec sa coupe ajustée et sa fermeture boutonnée, elle apporte une allure soignée et raffinée parfaite pour le bureau, les réunions ou les sorties habillées. Facile à assortir avec un pantalon, une jupe ou un jean, elle s’adapte à différentes tenues du quotidien tout en restant tendance. Son design classique à rayures en fait une pièce essentielle pour une garde-robe féminine moderne et élégante.', 'l.png', 230, 11, 'Femme'),
(23, 'Pantalon large en lin', 'Ce pantalon large pour femme en lin est une pièce légère et confortable, idéale pour un style décontracté et élégant. Doté d’une taille élastique avec cordon de serrage, il s’adapte facilement à la silhouette tout en offrant un excellent confort au quotidien. Sa coupe wide leg apporte une touche moderne et fluide, parfaite pour les journées chaudes. Facile à assortir avec un t-shirt, un top ou une chemise, il convient aussi bien pour les sorties, les vacances ou un look casual chic au quotidien.', 'o.png', 250, 5, 'Femme'),
(24, 'Jupe longue trapèze', 'Cette jupe longue trapèze est confectionnée dans un tissu texturé délicat, orné de pois floqués et subtilement scintillant. Sa coupe évasée avec une taille haute structurée et une construction à panneaux offre une silhouette fluide, élégante et flatteuse. À la fois moderne et raffinée, elle constitue une pièce forte idéale pour un look sophistiqué et tendance, parfaite pour les occasions spéciales ou une tenue habillée au quotidien.', 'j.png', 300, 9, 'Femme'),
(25, 'Jean baggy', 'Ce jean baggy taille haute pour femme offre une coupe ample et moderne qui allie confort et style. Sa taille haute met en valeur la silhouette tout en assurant un bon maintien. Conçu dans une matière résistante et agréable à porter, il est idéal pour un look décontracté et tendance au quotidien. Facile à assortir avec un crop top, un t-shirt ou une chemise, il s’adapte parfaitement aux tenues streetwear comme aux styles casual chic.', 'h.png', 200, 24, 'Femme'),
(26, 'Poncho élégant ', 'Ce poncho châle taille unique s’adapte à la plupart des morphologies et est confectionné dans un tissu double tricot épais, doux et extensible. Résistant aux plis, il offre un confort optimal tout au long de la journée. Polyvalent, il convient aussi bien pour un usage quotidien que pour le bureau, les voyages, les mariages ou les soirées fraîches. Facile à associer, il complète parfaitement des tenues décontractées comme des looks plus habillés avec élégance.', 'u.png', 270, 15, 'Femme'),
(27, 'Chemise homme bordeaux', 'Cette chemise à manches longues pour homme grande taille est conçue pour offrir un style casual moderne et confortable, idéal pour les saisons printemps et automne. Fabriquée dans un tissu uni légèrement extensible, elle garantit une bonne liberté de mouvement tout en restant agréable à porter au quotidien. Sa coupe classique boutonnée et sa couleur bordeaux apportent une touche élégante et tendance, facile à intégrer dans différents looks. Parfaite pour un usage quotidien ou des sorties décontractées, elle convient particulièrement aux hommes recherchant confort et style en grande taille.', 'y.png', 350, 20, 'Homme'),
(28, 'Pantalon blanc ', 'Ce pantalon blanc pour homme à coupe relaxed offre un style minimaliste et moderne, idéal pour un look propre et élégant. Confortable et facile à porter, il s’adapte parfaitement aux sorties décontractées comme aux occasions plus habillées. Sa coupe ample assure une grande liberté de mouvement tout en gardant une allure soignée. Polyvalent, il se combine facilement avec des t-shirts, chemises ou sneakers pour un style simple et tendance au quotidien.', 'w.png', 300, 10, 'Homme'),
(29, 'Casquette  ', 'Cette casquette pour homme inspirée du style Ralph Lauren est un accessoire intemporel qui allie élégance et décontraction. Conçue dans une matière de qualité, elle offre confort, légèreté et une bonne protection contre le soleil. Son design classique avec une finition soignée apporte une touche sportive et chic à toutes les tenues. Facile à assortir, elle se porte aussi bien avec un look casual qu’avec une tenue plus habillée pour un style moderne et raffiné au quotidien.', 'q.png', 250, 30, 'Homme'),
(30, 'Sneakers Nike', 'Ces sneakers Nike pour homme allient confort, performance et style moderne. Conçues avec des matériaux de qualité, elles offrent un excellent amorti et un bon maintien du pied pour un usage quotidien. Leur design sportif et tendance s’adapte facilement à différents looks, que ce soit pour le sport, les sorties ou un style casual au quotidien. Légères et confortables, elles assurent une démarche agréable tout en apportant une touche dynamique et urbaine à votre tenue', 's.png', 1200, 19, 'Homme'),
(31, 'Graphic T-shirt ', 'Ce t-shirt graphique est une pièce tendance et moderne, idéale pour un look décontracté au quotidien. Confectionné dans un tissu doux et confortable, il offre une agréable sensation de légèreté tout au long de la journée. Son imprimé graphique apporte une touche originale et stylée, parfaite pour exprimer sa personnalité. Facile à assortir avec un jean, un short ou un pantalon casual, il convient à différentes occasions comme les sorties, les loisirs ou la vie de tous les jours.', 'd.png', 320, 17, 'Homme'),
(32, 'Sweat à capuche', 'Ce sweat à capuche pour homme en coupe loose fit est parfait pour un style décontracté et moderne au printemps et en automne. Confectionné dans un tissu à élasticité moyenne, il offre confort et liberté de mouvement tout au long de la journée. Son design avec imprimés gestuels, animaux et lettres apporte une touche originale et tendance. Doté d’un cordon de serrage et de manches longues, il s’adapte facilement aux looks casual du quotidien. Idéal pour les sorties, les loisirs ou un style streetwear confortable et stylé.', 'f.png', 290, 8, 'Homme'),
(33, 'Hoodie casual', 'Ce sweat à capuche bleu pour homme combine confort et style décontracté. Conçu dans un tissu doux et agréable à porter, il offre une bonne liberté de mouvement et convient parfaitement aux saisons fraîches. Sa coupe moderne et son design simple en font une pièce facile à assortir avec un jean ou un pantalon casual. Idéal pour un look quotidien, les sorties ou les moments de détente, il apporte une touche sportive et tendance à votre tenue.', 'g.png', 300, 11, 'Homme'),
(38, 'T-shirt fille', 'Ce t-shirt à col rond et manches courtes est un basique confortable et facile à porter au quotidien. Son imprimé à rayures lui apporte une touche moderne et intemporelle, idéale pour un look décontracté et tendance. Léger et agréable sur la peau, il se combine facilement avec un jean, un short ou une jupe pour créer des tenues simples et stylées en toute saison.', 'v.png', 180, 4, 'Enfant'),
(39, 'Blouse bleu marine', 'Cette blouse bleu marine pour jeune fille est conçue avec un col rond simple et des manches à capuchon, offrant un style à la fois léger et confortable pour un usage quotidien. Fabriquée en viscose douce, elle est agréable à porter et idéale pour les journées chaudes d’été. Son design uni avec effet peplum et smock apporte une touche élégante et mignonne, parfaite aussi bien pour un look casual que pour des occasions un peu plus habillées. Sans manches et fluide, elle garantit une bonne liberté de mouvement et une excellente respirabilité.', 'cv.png', 170, 34, 'Enfant'),
(40, 'Chemise fille', 'Cette chemise pour fille est à la fois élégante et confortable, idéale pour un usage quotidien ou des occasions spéciales. Confectionnée dans un tissu doux et agréable à porter, elle assure une bonne liberté de mouvement tout au long de la journée. Sa coupe soignée et ses finitions délicates lui donnent un style chic et moderne. Facile à associer avec une jupe, un pantalon ou un jean, c’est une pièce essentielle dans la garde-robe des petites filles.', 'kl.png', 200, 24, 'Enfant'),
(41, 'Short', 'Ce short en denim avec nœuds décoratifs est une pièce tendance et adorable, parfaite pour un look estival. Confectionné dans un jean confortable et résistant, il assure une bonne liberté de mouvement au quotidien. Les petits nœuds ajoutent une touche féminine et stylée qui rend le modèle unique et charmant. Facile à assortir avec un t-shirt, un débardeur ou une blouse légère, ce short est idéal pour un style casual et moderne.', 'hj.png', 130, 10, 'Enfant'),
(42, 'Short garçon', 'Ce short en denim pour garçon est à la fois confortable et pratique, idéal pour les journées chaudes. Conçu dans un jean résistant, il offre une bonne liberté de mouvement et convient parfaitement aux activités quotidiennes. Sa coupe simple et moderne en fait un basique facile à porter. Il s’associe facilement avec un t-shirt, un polo ou une chemise pour un look décontracté et tendance.', 'as.png', 150, 12, 'Enfant'),
(43, 'Polo classique', 'Ce polo Iconic Mesh de Ralph Lauren pour enfants est un classique intemporel qui allie élégance et confort. Confectionné en maille respirante de haute qualité, il assure une sensation agréable tout au long de la journée. Son col polo avec patte de boutonnage et son logo emblématique brodé apportent une touche chic et reconnaissable. Idéal pour un style à la fois décontracté et soigné, il se porte facilement avec un jean, un short ou un pantalon pour toutes les occasions.', 'pp.png', 200, 19, 'Enfant'),
(44, 'Chemise rayée ', 'Cette chemise classique à manches longues pour enfant est un indispensable du dressing, alliant élégance et confort. Confectionnée en coton oxford facile d’entretien, elle est douce, résistante et agréable à porter au quotidien. Son motif à rayures polyvalent apporte une touche intemporelle et chic, tandis que le poney brodé multicolore emblématique ajoute une signature raffinée. Grâce à son empiècement dos à plis creux, elle offre une coupe confortable et une belle liberté de mouvement, idéale pour toutes les occasions.', 'cc.png', 220, 31, 'Enfant'),
(45, 'Baskets Vans', 'Les baskets Vans Kids Old Skool V en coloris navy et true white sont un modèle emblématique revisité pour les enfants. Conçues avec une tige résistante et confortable, elles offrent un bon maintien du pied au quotidien. Leur fermeture à scratch facilite l’enfilage et l’ajustement, idéale pour les plus jeunes. Avec leur design classique à bandes latérales et leur semelle en caoutchouc durable, elles apportent un style à la fois sportif et tendance, parfait pour l’école ou les sorties.', 'gg.png', 300, 21, 'Enfant'),
(46, 'Ballerines', 'Ces chaussures pour fille à motifs imprimés sont à la fois confortables et stylées, parfaites pour un usage quotidien. Leur design coloré et amusant apporte une touche joyeuse à toutes les tenues. Conçues avec des matériaux légers et agréables à porter, elles assurent un bon confort tout au long de la journée. Faciles à enfiler et pratiques, elles conviennent aussi bien pour l’école que pour les sorties, en offrant un style mignon et tendance.', 'ee.png', 320, 11, 'Enfant');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','client') DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
