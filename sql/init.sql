CREATE DATABASE `cakephp_crm` DEFAULT CHARACTER SET utf8;
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

-- ほげのパスワードは"hogehoge"
INSERT INTO `users` (`email`, `password`, `family_name`, `given_name`, `image_url`) VALUES ("hoge@hoge.jp", "$2a$10$z7PFcAt7x6scCml/FRwrO.TsSjb6ezeJaO/w.6fqklPYEVaININVG", "ほげ", "ホゲ", "http://dora-world.com/twitter/vote/img/dora.png");
INSERT INTO `users` (`email`, `password`, `family_name`, `given_name`, `image_url`) VALUES ("huga@huga.jp", "", "ふが", "フガ", "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQAdQWUqk1H6VgTz9CazhUgrJLEF_oFHNZUhWXMwgwTOz2gGK-EDA");
INSERT INTO `users` (`email`, `password`, `family_name`, `given_name`, `image_url`) VALUES ("iiza@iiza.jp", "", "飯沢", "大樹", "http://b2.img.mobypicture.com/bea7c3f5b15bb85b5ec88ae362881476_view.jpg");


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
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("田中", "太郎", "tanaka@gmail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("高橋", "次郎", "taka@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("鈴木", "一郎", "suzu@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("高田", "大輔", "takada@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("上野", "絵里", "ueno@mail.com", "4", "4", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("渡辺", "牧子", "wata@mail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("斎藤", "和也", "sai@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("野口", "秀雄", "ngu@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("佐藤", "一真", "sato@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("中田", "隆弘", "nakata@mail.com", "4", "4", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("坂本", "健太", "saka@mail.com", "1", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("横田", "健介", "yokot@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("前田", "譲二", "mae@mail.com", "2", "1", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("中村", "香織", "nakam@mail.com", "3", "2", now());
INSERT INTO `customers` (`family_name`, `given_name`, `email`, `company_id`, `post_id`, `created`) VALUES ("本田", "圭佑", "hon@mail.com", "4", "4", now());


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
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("11月に再度連絡予定", "1", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考中", "2", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("選考辞退", "2", "1", now());
INSERT INTO `comments` (`body`, `user_id`, `customer_id`, `created`) VALUES ("取引停止中", "3", "2", now());
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
