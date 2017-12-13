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
  post_title       VARCHAR(250),
  post_description TEXT,
  post_content     TEXT,
  post_image       VARCHAR(300),
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
  category    INT,
  description INT,
  status      VARCHAR(20)        DEFAULT 'active',
  created_by  INT,
  created_at  DATETIME           DEFAULT current_timestamp,
  updated_by  INT,
  updated_at  DATETIME
);

/*
url flag in post table
category id in post
 */