CREATE DATABASE `xshare`;
USE `xshare`;
CREATE TABLE `users` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `username` varchar(40) UNIQUE,
   `apiKey` varchar(32),
   `firstname` varchar(60),
   `lastname` varchar(30),
   `email` varchar(100) UNIQUE,
   `admin` varchar(1),
   PRIMARY KEY(id)
);

CREATE TABLE `upload` (
    `uploadid` int UNIQUE NOT NULL AUTO_INCREMENT,
    `filepath` VARCHAR(300),
    `userid` int,
    PRIMARY KEY (uploadid),
    FOREIGN KEY (userid) REFERENCES users(id)
);

CREATE TABLE `products` (
	`id` int UNIQUE NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`price` int NOT NULL,
   `link` text NOT NULL,
   PRIMARY KEY(id)
);


-- User1 - pass: 123456789 - normal
INSERT INTO users VALUES(0,'user1','25f9e794323b453885f5181f1b624d0b', 'Hai', 'Le', 'user1@gmail.com', ' ');
-- User2 - pass: 123456789 - normal
INSERT INTO users VALUES(1,'user2','25f9e794323b453885f5181f1b624d0b', 'Hien', 'Huynh', 'user2@gmail.com', ' ');
-- User3 - pass: 123456789 - admin
INSERT INTO users VALUES(2,'user3','25f9e794323b453885f5181f1b624d0b', 'Son', 'Ho', 'user3@gmail.com', '*');
-- User4 - pass: 123456789 - normal
INSERT INTO users VALUES(3,'user4','25f9e794323b453885f5181f1b624d0b', 'Thanh', 'Ho', 'user4@gmail.com', ' ');

