-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: olympicgames_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `short_name` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medals`
--

DROP TABLE IF EXISTS `medals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medals`
--

LOCK TABLES `medals` WRITE;
/*!40000 ALTER TABLE `medals` DISABLE KEYS */;
/*!40000 ALTER TABLE `medals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medals_has_countries`
--

DROP TABLE IF EXISTS `medals_has_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medals_has_countries` (
  `medals_id` int(11) NOT NULL,
  `countries_id` int(11) NOT NULL,
  PRIMARY KEY (`medals_id`,`countries_id`),
  KEY `fk_medals_has_countries_countries1_idx` (`countries_id`),
  KEY `fk_medals_has_countries_medals1_idx` (`medals_id`),
  CONSTRAINT `fk_medals_has_countries_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medals_has_countries_medals1` FOREIGN KEY (`medals_id`) REFERENCES `medals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medals_has_countries`
--

LOCK TABLES `medals_has_countries` WRITE;
/*!40000 ALTER TABLE `medals_has_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `medals_has_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medals_has_players`
--

DROP TABLE IF EXISTS `medals_has_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medals_has_players` (
  `medals_id` int(11) NOT NULL,
  `players_id` int(11) NOT NULL,
  PRIMARY KEY (`medals_id`,`players_id`),
  KEY `fk_medals_has_Players_Players1_idx` (`players_id`),
  KEY `fk_medals_has_Players_medals1_idx` (`medals_id`),
  CONSTRAINT `fk_medals_has_Players_Players1` FOREIGN KEY (`players_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medals_has_Players_medals1` FOREIGN KEY (`medals_id`) REFERENCES `medals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medals_has_players`
--

LOCK TABLES `medals_has_players` WRITE;
/*!40000 ALTER TABLE `medals_has_players` DISABLE KEYS */;
/*!40000 ALTER TABLE `medals_has_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `body` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_news_users1_idx` (`users_id`),
  CONSTRAINT `fk_news_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'SHARP SHOOTING KORAKAKI ADDS GOLD TO HER RIO MEDAL TALLY','<section class=\"post-box\" itemscope=\"\" itemtype=\"http://schema.org/NewsArticle\">',1,'2016-08-10 01:23:24'),(2,'FRENCHMAN DENIS GARGAUD CHANUT INHERITS ESTANGUET’S CANOE SLALOM CROWN','Gargaud Chanut smoothly negotiated the 24 gates along the churning 242m whitewater course to finish 0.85 seconds ahead of Slovakia\'s Matej Benus. Meanwhile, Japan\'s Takuya Haneda became the first Asian athlete to win an Olympic medal in canoe slalom as he finished third, a full 3.27 seconds slower than the flying Frenchman.',1,'2016-08-10 01:24:25'),(3,'WOMEN MAKE HISTORY AND INSPIRE THE WORLD ON THE OLYMPIC STAGE','WHETHER IT IS WINNING BRAZIL’S FIRST OLYMPIC GOLD OF THE GAMES, COMPETING IN THEIR SEVENTH OLYMPICS OR BECOMING OLYMPIC CHAMPIONS IN RUGBY SEVENS, WOMEN AT RIO 2016 ARE ALREADY SETTING THE OLYMPIC STAGE ALIGHT WITH PASSION, INSPIRATION AND HISTORY-MAKING PERFORMANCES.',1,'2016-08-10 01:25:13'),(4,'JUNG RETAINS INDIVIDUAL EVENTING TITLE, BUT FRENCH END GERMAN GOLDEN STREAK IN THE TEAM EVENT','FRANCE AND GERMANY SHARED THE EVENTING SPOILS ON 9 AUGUST TO DELIVER THEIR NATIONS’ FIRST GOLD MEDALS OF RIO 2016. REIGNING CHAMPION MICHAEL JUNG PRODUCED A SUCCESSFUL DEFENCE OF HIS INDIVIDUAL CROWN, BUT HE AND HIS GERMAN TEAM-MATES WERE NUDGED INTO SILVER PLACE BY A FORMIDABLE FRENCH COLLECTIVE IN THE TEAM EVENT.',1,'2016-08-10 01:26:02'),(7,'Rio 2016 crowds rise to celebrate Syrian refugee Rami Anis on debut in pool','<div class=\"event__main-right cp-institutional-post\"> <p>In a day dominated by medal ceremonies and national anthems, a swimmer who has no country to call his own reminded the world that Rio 2016 is about much more than individual sporting achievement.</p> <p>Rami Anis, a 25-year-old refugee from Aleppo in Syria, finished in sixth place in his heat of the 100m freestyle, in a time of 54s25, falling a long way short of qualifying for the semi-final.</p> <p>That didn\'t stop the crowd at the Olympic Aquatics Stadium from giving Anis the sort of applause that is normally only meted out to record-breakers and gold medallists.</p> <p><img style=\"heigth:auto; width:auto\" src=\"https://smsprio2016-a.akamaihd.net/_news/Y/P/YPif5vrf.jpg\"><em>Rami Anis (in green): focused on Tokyo 2020 (Photo: Getty Images/Al Bello)</em></p> <p>\"I was a little scared and tense before the race, but at the same time I always knew that this event was the preparation for my specialty, which is the 100m butterfly,\" Anis said when he left the pool.</p> <p>While he may have finished well offf the pace in Rio, Anis was the undisputed centre of attention for the world\'s media on the afternoon of Tuesday (9 August).</p> <p>\"It\'s wonderful to be the star of an event like this, at which refugees have drawn so much attention,\" Anis said.</p> <p>“<img style=\"heigth:auto; width:auto\" src=\"https://smsprio2016-a.akamaihd.net/_news/b/7/b7W5OqNg.jpg\"><em>Anis will also compete in Rio in the 100m butterfly, his specialty (Photo: Getty Images/Clive Rose)</em></p> <p>The real focus for Anis is Tokyo 2020. He is using Rio 2016 to gain experience and as a platform to share his message about today\'s global refugee crisis.</p> <p>\"I want to send the best possible image of refugees, of Syrians, of everyone who suffers injustic in the world. I want to tell them not to give up, to keep going.\"</p> <p><a href=\"https://www.rio2016.com/en/news/olympic-refugee-team-rami-anis-s-journey-from-aleppo-to-the-rio-2016-games\" target=\"_blank\" tabindex=\"1\">Olympic refugee team: Rami Anis’s journey from Aleppo to the Rio 2016 Games</a></p> <p>Anis will be back in the pool at the Olympic Aquatics Centre on Thursday to compete in the 100m butterfly.</p> <p>He still hopes to meet the swimmer he calls \'a real idol\': Michael Phelps of the USA, who now has 19 Olympic gold medals to his name.</p> <p>\"This is a dream and I don\'t want to wake up too soon,\" Anis said, before heading back to the athletes\' village in Rio to join thousands of other Olympians who have <a href=\"https://www.rio2016.com/en/news/olympic-refugee-team-arrives-in-athletes-village-to-rapturous-welcome\" target=\"_blank\" tabindex=\"1\">welcomed the refugee as one of their own</a>.</p> <p> </p><blockquote class=\"twitter-embed-holder\" data-src=\"<blockquote class=&quot;twitter-tweet&quot; data-lang=&quot;en&quot;><a href=&quot;https://twitter.com/RefugeesOlympic/status/763069400513732608&quot;></a></blockquote>\"></blockquote><twitterwidget class=\"twitter-tweet twitter-tweet-rendered\" id=\"twitter-widget-0\" data-tweet-id=\"763069400513732608\" style=\"position: static; visibility: visible; display: block; transform: rotate(0deg); max-width: 100%; width: 500px; min-width: 220px; margin-top: 10px; margin-bottom: 10px;\"></twitterwidget> <p></p> </div>',1,'2016-08-10 02:07:00');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_comments`
--

DROP TABLE IF EXISTS `news_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `news_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`news_id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_news_comments_news1_idx` (`news_id`),
  KEY `fk_news_comments_users1_idx` (`users_id`),
  CONSTRAINT `fk_news_comments_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_comments`
--

LOCK TABLES `news_comments` WRITE;
/*!40000 ALTER TABLE `news_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sports_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`sports_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Players_sports1_idx` (`sports_id`),
  CONSTRAINT `fk_Players_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players_has_countries`
--

DROP TABLE IF EXISTS `players_has_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players_has_countries` (
  `players_id` int(11) NOT NULL,
  `countries_id` int(11) NOT NULL,
  PRIMARY KEY (`players_id`,`countries_id`),
  KEY `fk_players_has_countries_countries1_idx` (`countries_id`),
  KEY `fk_players_has_countries_players1_idx` (`players_id`),
  CONSTRAINT `fk_players_has_countries_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_players_has_countries_players1` FOREIGN KEY (`players_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players_has_countries`
--

LOCK TABLES `players_has_countries` WRITE;
/*!40000 ALTER TABLE `players_has_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `players_has_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `posts_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`posts_id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_post_comments_posts_idx` (`posts_id`),
  KEY `fk_post_comments_users1_idx` (`users_id`),
  CONSTRAINT `fk_post_comments_posts` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_comments`
--

LOCK TABLES `post_comments` WRITE;
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number_players` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sports`
--

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;
/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sports_has_countries`
--

DROP TABLE IF EXISTS `sports_has_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sports_has_countries` (
  `sports_id` int(10) unsigned NOT NULL,
  `countries_id` int(11) NOT NULL,
  PRIMARY KEY (`sports_id`,`countries_id`),
  KEY `fk_sports_has_countries_countries1_idx` (`countries_id`),
  KEY `fk_sports_has_countries_sports1_idx` (`sports_id`),
  CONSTRAINT `fk_sports_has_countries_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sports_has_countries_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sports_has_countries`
--

LOCK TABLES `sports_has_countries` WRITE;
/*!40000 ALTER TABLE `sports_has_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `sports_has_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Football'),(2,'Basketball'),(3,'Atletic'),(4,'Olympic Games');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_has_news`
--

DROP TABLE IF EXISTS `tags_has_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_has_news` (
  `tags_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  PRIMARY KEY (`tags_id`,`news_id`),
  KEY `fk_tags_has_news_news1_idx` (`news_id`),
  KEY `fk_tags_has_news_tags1_idx` (`tags_id`),
  CONSTRAINT `fk_tags_has_news_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tags_has_news_tags1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_has_news`
--

LOCK TABLES `tags_has_news` WRITE;
/*!40000 ALTER TABLE `tags_has_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_has_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_has_posts`
--

DROP TABLE IF EXISTS `tags_has_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_has_posts` (
  `tags_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  PRIMARY KEY (`tags_id`,`posts_id`),
  KEY `fk_tags_has_posts_posts1_idx` (`posts_id`),
  KEY `fk_tags_has_posts_tags1_idx` (`tags_id`),
  CONSTRAINT `fk_tags_has_posts_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tags_has_posts_tags1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_has_posts`
--

LOCK TABLES `tags_has_posts` WRITE;
/*!40000 ALTER TABLE `tags_has_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_has_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'niksan','niksan9411@gmail.com','Nikolay Nikolov','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-10  2:14:44
