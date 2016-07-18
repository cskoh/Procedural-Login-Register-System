CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `hash` varchar(300) NOT NULL,
  `user_mail` varchar(150) NOT NULL,
  `user_avatar` varchar(255) NOT NULL DEFAULT 'profiles/avatars/noava.png',
  `user_active` int(1) NOT NULL DEFAULT '0',
  `registered` varchar(25) NOT NULL
  PRIMARY KEY (`user_id`);
) ENGINE=MyISAM DEFAULT CHARSET=utf8;