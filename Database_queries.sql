/* >>>>> CREATE USERS TABLE */
CREATE TABLE `users` (
  `id`           SERIAL PRIMARY KEY AUTO_INCREMENT,
  `display_name` VARCHAR(200),
  `username`     VARCHAR(100),
  `password`     VARCHAR(100),
  `role_id`      INT,
  `email`        VARCHAR(200),
  `mobile`       VARCHAR(20),
  `created_by`   INT,
  `created_at`   DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP,
  `updated_by`   INT,
  `updated_at`   DATETIME
);
ALTER TABLE users
  ADD status VARCHAR(20) DEFAULT 'active' NULL;
ALTER TABLE users
  MODIFY COLUMN status VARCHAR(20) DEFAULT 'active'
  AFTER mobile;


/* >>>>> CREATE ROLES TABLE */
CREATE TABLE roles
(
  id         SERIAL PRIMARY KEY AUTO_INCREMENT,
  role_name  VARCHAR(100),
  role_desc  TEXT,
  created_by INT,
  created_at DATETIME           DEFAULT CURRENT_TIMESTAMP,
  updated_by INT,
  updated_at DATETIME
);

ALTER TABLE roles
  ADD status VARCHAR(20) DEFAULT 'active' NULL;
ALTER TABLE roles
  MODIFY COLUMN status VARCHAR(20) DEFAULT 'active'
  AFTER role_desc;

/* >>>>> CREATE POSTS TABLE */
CREATE TABLE posts
(
  id               SERIAL PRIMARY KEY AUTO_INCREMENT,
  author_id        INT,
  post_category_id INT,
  post_title       VARCHAR(250),
  post_description TEXT,
  post_content     TEXT,
  post_image       VARCHAR(300),
  post_image_url   TEXT,
  status           VARCHAR(20)        DEFAULT 'active',
  created_by       INT,
  created_at       DATETIME           DEFAULT current_timestamp,
  updated_by       INT,
  updated_at       DATETIME
);

/* >>>>> CREATE COMMENTS TABLE */
CREATE TABLE comments
(
  id         SERIAL PRIMARY KEY AUTO_INCREMENT,
  post_id    INT,
  user_id    INT,
  comments   TEXT,
  status     VARCHAR(20)        DEFAULT 'active',
  created_by INT,
  created_at DATETIME           DEFAULT current_timestamp,
  updated_by INT,
  updated_at DATETIME
);

/* >>>>> CREATE COMMENTS TABLE */
CREATE TABLE likes
(
  id         SERIAL PRIMARY KEY AUTO_INCREMENT,
  post_id    INT,
  user_id    INT,
  status     VARCHAR(20)        DEFAULT 'active',
  created_by INT,
  created_at DATETIME           DEFAULT current_timestamp,
  updated_by INT,
  updated_at DATETIME
);

/* >>>>> CREATE POST CATEGORIES TABLE */
CREATE TABLE post_categories
(
  id          SERIAL PRIMARY KEY AUTO_INCREMENT,
  category    VARCHAR(100),
  description TEXT,
  status      VARCHAR(20)        DEFAULT 'active',
  created_by  INT,
  created_at  DATETIME           DEFAULT current_timestamp,
  updated_by  INT,
  updated_at  DATETIME
);

/* >>>>>>>>>>>>>>>>>>> RUN BELOW TO UPDATE DATABASE => 17 DEC, 2017 04:25 PM */ 
ALTER TABLE `post_categories` CHANGE `category` `category` VARCHAR(100) NULL DEFAULT NULL;
ALTER TABLE `post_categories` CHANGE `description` `description` TEXT NULL DEFAULT NULL;
ALTER TABLE `posts` ADD `post_image_url` TEXT NOT NULL AFTER `post_image`;
ALTER TABLE `posts` ADD `post_category_id` INT NOT NULL AFTER `author_id`;

/* >>> To add post category initially */
INSERT INTO `post_categories` (`id`, `category`, `description`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('1', 'Technical', 'Some technical stuff or Programming related info.', 'active', '1', CURRENT_TIMESTAMP, NULL, NULL), ('2', 'General', 'Your personal experience or not technical information/experience.', 'active', '1', CURRENT_TIMESTAMP, NULL, NULL)