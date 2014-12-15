-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Décembre 2014 à 17:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `seminaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `seminaire`
--

CREATE TABLE IF NOT EXISTS `seminaire` (
  `titre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `orateur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `labo` varchar(30) NOT NULL DEFAULT 'none',
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lien` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=337 ;

--
-- Contenu de la table `seminaire`
--

INSERT INTO `seminaire` (`titre`, `date`, `orateur`, `lieu`, `labo`, `id`, `lien`) VALUES
('Particle migration in pressure-driven flows', '2014-01-30', 'Micheline Abbas', 'LOF, Pessac', 'lof', 269, ''),
('Investigating neuronal guidance in engineered microenvironments', '2015-01-16', 'Vincent Studer', 'LOF, Pessac', 'lof', 270, 'http://www.lof.cnrs.fr/spip.php?article619'),
('Polymersomes biomimétiques&nbsp;:  conception et application en nanomédecine', '2014-01-09', 'Sébastien Lecommandoux', 'LOF, Pessac', 'lof', 271, 'http://www.lof.cnrs.fr/spip.php?article617'),
('Tailoring concentration gradients in microfluidic network', '2014-12-15', 'Cyprien Guermonprez', 'LOF, Pessac', 'lof', 272, 'http://www.lof.cnrs.fr/spip.php?article622'),
('An experimental approach to blood flows&nbsp;: lift, diffusion and clustering', '2014-12-05', 'Gwennou Coupier', 'LOF, Pessac', 'lof', 273, 'http://www.lof.cnrs.fr/spip.php?article613'),
('Crystal Chemistry at the Molecule-Substrate and Molecule-Molecule  Interface in Organic Electronic Systems', '2014-11-25', 'Alex Briseno', 'LOF, Pessac', 'lof', 274, 'http://www.lof.cnrs.fr/spip.php?article621'),
('Coins mouillés (ou pas)', '2014-11-24', 'Etienne Reyssat', 'LOF, Pessac', 'lof', 275, 'http://www.lof.cnrs.fr/spip.php?article609'),
('Déformation d&#8217;interfaces complexes&nbsp;: des architectures savonneuses aux mousses de particules', '2014-10-29', 'Pauline PETIT', 'LOF, Pessac', 'lof', 276, 'http://www.lof.cnrs.fr/spip.php?article616'),
('DNS of Electrokinetic Flows in Near Ion –Selective Surfaces. Instabilities, bifurcations and transition to chaos.', '2014-10-24', 'Evgeny A. Demekhin (Kuban State University', 'LOF, Pessac', 'lof', 277, 'http://www.lof.cnrs.fr/spip.php?article620'),
('Colloid Aggregation under Confined Flow', '2014-10-10', 'Matthieu Robert de Saint Vincent', 'LOF, Pessac', 'lof', 278, 'http://www.lof.cnrs.fr/spip.php?article610'),
('Osmotic equilibrium of colloids', '2014-10-01', 'Daniel Ou Yang', 'LOF, Pessac', 'lof', 279, 'http://www.lof.cnrs.fr/spip.php?article612'),
('Creep and fracture of a protein gel', '2014-09-29', 'Sébastien Manneville', 'LOF, Pessac', 'lof', 280, 'http://www.lof.cnrs.fr/spip.php?article611'),
('La spectrométrie Raman&nbsp;: une technique en pleine évolution au service du suivi in-situ de propriétés physico-chimiques de matériaux', '2014-09-22', 'Patrice Bourson', 'LOF, Pessac', 'lof', 281, ''),
('Des avancées récentes dans la monitorisation des reactions macromoléculaires ', '2014-06-10', 'Wayne Reed', 'LOF, Pessac', 'lof', 282, ''),
('Expérience d&#8217;écho microfluidique&nbsp;: une transition dynamique et structurale', '2014-04-25', 'Raphaël Jeanneret', 'LOF, Pessac', 'lof', 283, 'http://www.lof.cnrs.fr/spip.php?article602'),
('Generation of all-aqueous emulsions and clogging in microchannels', '2014-04-28', 'Emilie Dressaire et Alban Sauret', 'LOF, Pessac', 'lof', 284, 'http://www.lof.cnrs.fr/spip.php?article601'),
('Transport of DNA and particles in confined channels&nbsp;: evidence of lift forces and application to high-performance DNA separation', '2014-02-21', 'Aurélien Bancaud', 'LOF, Pessac', 'lof', 285, 'http://www.lof.cnrs.fr/spip.php?article594'),
('Levitation&nbsp;: from drops to plastic cards', '2014-02-06', 'D. Soto', 'LOF, Pessac', 'lof', 286, 'http://www.lof.cnrs.fr/spip.php?article593'),
('Couplage chimie douce- séchage aérosol&nbsp;: Un vent de changement souffle sur la production de poudres mésostructurées fonctionnelles', '2014-02-14', 'Cédric BOISSIERE', 'LOF, Pessac', 'lof', 287, ''),
('Structuration and rheological properties of gels made from gluten proteins', '2014-02-17', 'Amélie Banc', 'LOF, Pessac', 'lof', 288, 'http://www.lof.cnrs.fr/spip.php?article591'),
('Mesures de masses de haute précision des noyaux super-lourds avec des pièges à ions', '2014-01-17', 'Enrique MINAYA RAMIREZ', 'Salle des Séminaires, CENBG ', 'cenbg', 289, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireEnriqueMinaya_2014.pdf'),
('Isospin mixing in the beta delayed proton nuclei A around 50, first results', '2014-01-28', 'Nadia BENOUARET', 'Salle des Séminaires, CENBG ', 'cenbg', 290, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireNadiaBenouaret_2014.pdf'),
('New puzzles in the nuclear fission emerging from the SOFIA experiment at GSI', '2014-01-31', 'Guillaume BOUTOUX', 'Salle des Séminaires, CENBG ', 'cenbg', 291, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireGuillaumeBoutoux_2014.pdf'),
('Recherche de la double désintégration bêta sans émission de neutrino', '2014-02-07', 'Carla MACOLINO', 'Salle des Séminaires, CENBG  ', 'cenbg', 292, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireCarlaMacolino_2014.pdf'),
('Champ moyen illustré', '2014-02-11', 'Ludovic BONNEAU', 'Salle des Séminaires, CENBG   ', 'cenbg', 293, ''),
('Méthode de mesure de probabilités de désexcitation pour des noyaux très radioactifs', '2014-02-18', 'Quentin DUCASSE', 'Salle des Séminaires, CENBG   ', 'cenbg', 294, ''),
('Développement d&#8217;un code de scénario électronucléaire', '2014-02-21', 'Baptiste MOUGINOT', 'Salle des Séminaires, CENBG  ', 'cenbg', 295, ''),
('Transfer reactions in inverse kinematics&nbsp;: An experimental approach for fission investigations', '2014-02-28', 'Carme RODRIGUEZ', 'Salle des Séminaires, CENBG ', 'cenbg', 296, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireCarmeRodriguesTajes_2014.pdf'),
('La physique au service de la radiothérapie&nbsp;: nanoparticules et détecteurs', '2014-03-05', 'Rachel DELORME', 'Salle des Séminaires, CENBG ', 'cenbg', 297, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireRachelDelorme_2014.pdf'),
('Observer l&#8217;univers 1700 m sous terre au Laboratoire Souterrain de Modane', '2014-03-07', 'Fabrice PIQUEMAL', 'Salle des Séminaires, CENBG   ', 'cenbg', 298, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireFabricePiquemal_2014.pdf'),
('Distances des pulsars gamma et le milieu interstellaire', '2014-03-11', 'David A. SMITH', 'Salle des Séminaires, CENBG   ', 'cenbg', 299, ''),
('Blazars fractals et cosmologie gamma à l&#8217;aube de CTA', '2014-03-13', 'Jonathan BITEAU', 'Salle des Séminaires, CENBG ', 'cenbg', 300, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireJonathanBiteau_2014.pdf'),
('Pourquoi F. Englert et P. Higgs ont-ils reçu le Prix Nobel de Physique 2013&nbsp;?', '2014-03-14', 'J. T. DONOHUE', 'Salle des Séminaires, CENBG  ', 'cenbg', 301, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireJTDonohue_2014.pdf'),
('Les vases acoustiques dans les églises médiévales', '2014-03-18', 'Romain REBEIX', 'Salle des Séminaires, CENBG   ', 'cenbg', 302, ''),
('La toxicologie des actinides utilisés dans l&#8217;industrie nucléaire française, estimation des doses et projets en modélisation au Laboratoire de Ra', '2014-03-19', 'Stéphanie LAMART', 'Salle des Séminaires, CENBG ', 'cenbg', 303, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireStephanieLamart_2014.pdf'),
('The evolution of signatures of quasifission in reactions forming Curium', '2014-03-24', 'Elizabeth WILLIAMS', 'Salle des Séminaires, CENBG ', 'cenbg', 304, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireElizabethWilliams_2014.pdf'),
('L&#8217;installation AMANDE de l&#8217;IRSN&nbsp;: de la métrologie des neutrons à la radiobiologie', '2014-03-25', 'Vincent GRESSIER', 'Salle des Séminaires, CENBG  ', 'cenbg', 305, ''),
('La mécanique au CENBG&nbsp;: présentation de son organisation, activités, outils et domaines d&#8217;activités.', '2014-04-01', 'Franck DELALEE', 'Salle des Séminaires, CENBG   ', 'cenbg', 306, ''),
('Au coeur du HRS.', '2014-04-15', 'Thierry CHIRON', 'Salle des Séminaires, CENBG   ', 'cenbg', 307, ''),
('Galilée et la naissance de la science moderne', '2014-04-18', 'Philippe QUENTIN', 'Salle des Séminaires, CENBG  ', 'cenbg', 308, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminairePhilippeQuentin_2014.pdf'),
('10 ans avec H.E.S.S.&nbsp;: morceaux choisis et perspectives', '2014-05-16', 'François BRUN', 'Salle des Séminaires, CENBG  ', 'cenbg', 309, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireFrancoisBrun_2014.pdf'),
('"SPRITE" et "POPRA"', '2014-06-10', 'Hervé SEZNEC', 'Salle des Séminaires, CENBG ', 'cenbg', 310, ''),
('Short-Duration, Low-Bandwidth Neutron Production via Focused Protons using High-Intensity Lasers', '2014-06-12', 'Drew P. HIGGINSON', 'Salle des Séminaires, CENBG  ', 'cenbg', 311, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireDrewHigginson_2014.pdf'),
('Nuclear structure studies applied to astrophysical calculations', '2014-06-27', 'Werner RICHTER', 'Salle des Séminaires, CENBG  ', 'cenbg', 312, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireWernerRichter_2014.pdf'),
('Réflexion sur 50 ohms autour d&#8217;un Té (ou café)', '2014-07-01', 'Medhi TARISIEN', 'Salle des Séminaires, CENBG   ', 'cenbg', 313, ''),
('Mort programmée de Windows XP ', '2014-07-08', 'Isabelle MOREAU', 'Salle des Séminaires, CENBG   ', 'cenbg', 314, ''),
('The role of phosphorous biochemistry in actinide human contamination', '2014-09-05', 'Christophe DEN AUWER', 'Salle des Séminaires, CENBG  ', 'cenbg', 315, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireChristopheDenAuwer_2014.pdf'),
('Isoscalar giant resonances in exotic nuclei', '2014-09-12', 'Marine VANDEBROUCK', 'Salle des Séminaires, CENBG  ', 'cenbg', 316, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireMarineVandebrouck_2014.pdf'),
('Le risque incendie et les extincteurs (Le triangle de feu, les classes de feu, les différents types d&#8217;extincteurs)', '2014-09-16', 'Sébastien LEBLANC', 'Salle des Séminaires, CENBG   ', 'cenbg', 317, ''),
('Portes Ouvertes du CENBG', '2014-09-23', 'Philippe MORETTO', 'Salle des Séminaires, CENBG   ', 'cenbg', 318, ''),
('New Calculations of Fission Barriers and Fission Yields in the Macroscopic-Microscopic Approach', '2014-10-13', 'Peter MÖLLER', 'Salle des Séminaires, CENBG  ', 'cenbg', 319, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminairePeterMoller_2014.pdf'),
('L&#8217;impression 3D', '2014-10-14', 'Patrick HELLMUTH', 'Salle des Séminaires, CENBG   ', 'cenbg', 320, ''),
('Shape coexistence in gold, thallium and astatine isotopes studied by in-source laser spectroscopy at ISOLDE', '2014-10-16', 'Andrei ANDREYEV', 'Salle des Séminaires, CENBG ', 'cenbg', 321, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireAndreiAndreyev_2014_matin.pdf'),
('Beta-delayed fission&nbsp;: from neutron-deficient to neutron-rich nuclei', '2014-10-16', 'Andrei ANDREYEV', 'Salle des Séminaires, CENBG ', 'cenbg', 322, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireAndreiAndreyev_2014_apresmidi.pdf'),
('Compound-nucleus cross sections from surrogate measurements&nbsp;: progress &amp; prospects', '2014-10-20', 'Jutta ESCHER', 'Salle des Séminaires, CENBG  ', 'cenbg', 323, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireJuttaEscher_2014.pdf'),
('Bilan sur les Portes Ouvertes du CENBG', '2014-10-21', 'Philippe MORETTO', 'Salle des Séminaires, CENBG   ', 'cenbg', 324, ''),
('Particle-core couplings close to neutron-rich doubly-magic nuclei&nbsp;: recent results from the EXILL campaign', '2014-10-24', 'Silvia LEONI', 'Salle des Séminaires, CENBG  ', 'cenbg', 325, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireSilviaLeoni_2014.pdf'),
('cafe labo', '2014-10-28', 'Jérôme GIOVINAZZO', 'Salle des Séminaires, CENBG   ', 'cenbg', 326, ''),
('Sécurité et accueil de visiteurs/stagiaires/CDD', '2014-11-04', 'Stéphane BERNIER', 'Salle des Séminaires, CENBG   ', 'cenbg', 327, ''),
('Exploring nuclear systems with particle-particle correlations', '2014-11-20', 'Guiseppe VERDE', 'Salle des Séminaires, CENBG  ', 'cenbg', 328, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireGuiseppeVerde_2014.pdf'),
('Oxydation microbienne de l&#8217;hydrogène&nbsp;: expérimentation in situ au Mont Terri, laboratoire suisse de recherches pour le stockage profond des', '2014-11-21', 'Alexandre BAGNOUD', 'Salle des Séminaires, CENBG  ', 'cenbg', 329, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireAlexandreBagnoud_2014.pdf'),
('Résultats et futures mesures de l&#8217;expérience T2K et de son détecteur proche ND280', '2014-12-05', 'Anthony HILLAIRET', 'Salle des Séminaires, CENBG ', 'cenbg', 330, 'https://www.cenbg.in2p3.fr/IMG/pdf/seminaireanthonyhillairet_2014.pdf'),
('La toxicologie des actinides utilisés dans l&#8217;industrie nucléaire française, estimation des doses et projets en modélisation au Laboratoire de Ra', '2014-03-19', 'Stéphanie LAMART', 'Salle des Séminaires, CENBG ', 'cenbg', 331, 'http://www.cenbg.in2p3.fr/IMG/pdf/SeminaireStephanieLamart_2014.pdf'),
('Oxydation microbienne de l&#8217;hydrogène&nbsp;: expérimentation in situ au Mont Terri, laboratoire suisse de recherches pour le stockage profond des', '2014-11-21', 'Alexandre BAGNOUD', 'Salle des Séminaires, CENBG  ', 'cenbg', 332, 'https://www.cenbg.in2p3.fr/IMG/pdf/SeminaireAlexandreBagnoud_2014.pdf'),
(' PropriÃ©tÃ©s statiques et dynamiques des chaÃ®nes aimants ', '2014-12-02', ' Vivien PIANET CRPP', ' Amphith&eacute;&acirc;tre', 'CRPP', 333, 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite'),
(' ColloÃ¯des anisotropes: capillaritÃ© Ã©lasticitÃ© et pression de radiation   Mots cl&eacute;s : SystÃ¨mes colloÃ¯daux interfaces fluides cristaux liq', '2014-12-05', ' Jean-Christophe LOUDET CRPP', ' Amphith&eacute;&acirc;tre', 'CRPP', 334, 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite'),
(' Evaporation microfluidique et matÃ©riaux Mots cl&eacute;s : Microfluidique matiÃ¨re molle hors Ã©quilibre phÃ©nomÃ¨nes de transport mÃ©tamatÃ©riaux o', '2014-12-12', ' Jacques LENG LOF, Bordeaux', ' Amphith&eacute;&acirc;tre', 'CRPP', 335, 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite'),
(' Mesures modÃ©lisations et simulations numÃ©riques des propriÃ©tÃ©s optiques effectives de mÃ©tamatÃ©riaux auto-assemblÃ©s ', '2014-12-15', ' Kevin EHRHARDT CRPP', ' Amphith&eacute;&acirc;tre', 'CRPP', 336, 'http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
