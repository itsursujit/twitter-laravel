SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS recommended_friends;
CREATE TABLE IF NOT EXISTS recommended_friends (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id bigint(20) NOT NULL,
  screen_name varchar(150) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO recommended_friends (id, user_id, screen_name) VALUES
(1, 0, 'jack'),
(2, 0, 'yukihiro_matz'),
(3, 0, 'JeffBezos');

DROP TABLE IF EXISTS twitter_friends;
CREATE TABLE IF NOT EXISTS twitter_friends (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id bigint(20) NOT NULL,
  screen_name varchar(300) NOT NULL,
  follow_him tinyint(1) NOT NULL DEFAULT '0',
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  current_user_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

INSERT INTO twitter_friends (id, user_id, screen_name, follow_him, created_at, updated_at, current_user_id) VALUES
(10, 0, 'jack', 1, '2016-09-15 04:35:02', '2016-09-15 04:39:07', 11),
(11, 0, 'yukihiro_matz', 1, '2016-09-15 04:35:02', '2016-09-15 04:46:45', 11),
(12, 0, 'JeffBezos', 1, '2016-09-15 04:35:02', '2016-09-15 04:38:25', 11);

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  email varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  username varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  twitter_id varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

INSERT INTO users (id, name, email, username, password, remember_token, created_at, updated_at, twitter_id) VALUES
(11, 'Sujit Baniya', NULL, '', '', NULL, '2016-09-15 04:35:02', '2016-09-15 04:35:02', '371078881');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
