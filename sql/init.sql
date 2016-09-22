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
  `image_url` varchar(255)
) ENGINE=InnoDB;
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD UNIQUE (`email`);
ALTER TABLE `users` ADD UNIQUE (`reset_password_token`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- postsテーブル作成
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;
ALTER TABLE `posts` ADD PRIMARY KEY (`id`);
ALTER TABLE `posts` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- テストレコード挿入 // posts
INSERT INTO `posts` (`position_name`) VALUES ("社長");
INSERT INTO `posts` (`position_name`) VALUES ("課長");
INSERT INTO `posts` (`position_name`) VALUES ("部長");
INSERT INTO `posts` (`position_name`) VALUES ("平社員");
INSERT INTO `posts` (`position_name`) VALUES ("専務");
INSERT INTO `posts` (`position_name`) VALUES ("副社長");


-- companiesテーブル作成
CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255),
  `address` varchar(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;
ALTER TABLE `companies` ADD PRIMARY KEY (`id`);
ALTER TABLE `companies` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- テストレコード挿入 // companies
INSERT INTO `companies` (`name`, `url`, `address`) VALUES ("株式会社NOWALL",   "https://nowall.co.jp/",    "西新宿");
INSERT INTO `companies` (`name`, `url`, `address`) VALUES ("株式会社クイック", "https://919.jp/",          "赤坂");
INSERT INTO `companies` (`name`, `url`, `address`) VALUES ("高須クリニック",   "http://www.takasu.co.jp/", "横浜");
INSERT INTO `companies` (`name`, `url`, `address`) VALUES ("DDD銀行",         "https://example.co.jp/",   "新橋");
INSERT INTO `companies` (`name`, `url`, `address`) VALUES ("KKK銀行",         "https://example2.co.jp/",  "品川");




-- customersテーブル作成
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `given_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `company_id` int(11),
  `post_id` int(11)
) ENGINE=InnoDB;
ALTER TABLE `customers` ADD PRIMARY KEY (`id`);
ALTER TABLE `customers` ADD UNIQUE (`email`);
ALTER TABLE `customers` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- "index_customers_on_company_id"
-- "index_customers_on_post_id"

-- テストレコード挿入 // customers
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字1", "名前1", "aa@mail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字2", "名前2", "bb@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字3", "名前3", "cc@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字4", "名前4", "dd@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字5", "名前5", "ee@mail.com", "4", "4", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字6", "名前1", "ff@mail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字7", "名前2", "gg@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字8", "名前3", "hh@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字9", "名前4", "ii@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字10", "名前5", "jj@mail.com", "4", "4", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字11", "名前1", "kk@mail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字12", "名前2", "ll@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字13", "名前3", "mm@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字14", "名前4", "nn@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("苗字15", "名前5", "oo@mail.com", "4", "4", now());


-- commentsテーブル作成
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body` text(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `customer_id` int(11),
  `user_id` int(11)
) ENGINE=InnoDB;
ALTER TABLE `comments` ADD PRIMARY KEY (`id`);
ALTER TABLE `comments` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- "index_comments_on_customer_id"
-- "index_comments_on_user_id"


-- テストレコード挿入 // companies
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考の結果待ち", "1", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考の結果待ち", "1", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考の結果待ち", "2", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考の結果待ち", "2", "2", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考の結果待ち", "3", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考辞退", "2", "1", now());



-- 外部キー設定
ALTER TABLE `customers` ADD KEY `company_id` (`company_id`), ADD KEY `post_id` (`post_id`);
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

ALTER TABLE `comments` ADD KEY `customer_id` (`customer_id`), ADD KEY `user_id` (`user_id`);
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
