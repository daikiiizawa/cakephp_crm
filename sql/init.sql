CREATE DATABASE `cakephp_crm`;

use cakephp_crm

-- usersテーブル作成
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT "" NOT NULL,
  `password` varchar(255) DEFAULT "" NOT NULL,
  `reset_password_token` varchar(20),
  `reset_password_sent_at` datetime,
  `remember_created_at` datetime,
  `sign_in_count` int(11) DEFAULT 0 NOT NULL,
  `current_sign_in_at` datetime,
  `last_sign_in_at` datetime,
  `current_sign_in_ip` varchar(20),
  `last_sign_in_ip` varchar(20),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `family_name` varchar(20),
  `given_name` varchar(20),
  `image_url` varchar(20)
) ENGINE=InnoDB;
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD UNIQUE (`email`);
ALTER TABLE `users` ADD UNIQUE (`reset_password_token`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;