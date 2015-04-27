
CREATE TABLE IF NOT EXISTS `animateurs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(5) NOT NULL,
  `intitule` varchar(120) NOT NULL,
  `duree_jours` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `inscriptions_session_eleves` (
  `ie_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `eleve_id` int(5) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sessions_formations` (
  `sf_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `formation` int(11) NOT NULL,
  `date_debut` text NOT NULL,
  `date_fin` text NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
