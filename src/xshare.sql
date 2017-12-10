CREATE DATABASE `xshare`;
USE `xshare`;
CREATE TABLE `users` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `username` varchar(40),
   `apiKey` varchar(32),
   `firstname` varchar(60),
   `lastname` varchar(30),
   `email` varchar(100),
   PRIMARY KEY(id)
);

CREATE TABLE products (
	id int UNIQUE NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	description text NOT NULL,
	price number(10) NOT NULL,
   link text NOT NULL,
   PRIMARY KEY(id)
)

-- User1 - pass: 123
INSERT INTO users VALUES(0,'user1','202cb962ac59075b964b07152d234b70', 'Hai', 'Le', 'user1@gmail.com');
-- User2 - pass: 123
INSERT INTO users VALUES(1,'user2','202cb962ac59075b964b07152d234b70', 'Hien', 'Huynh', 'user2@gmail.com');
-- User3 - pass: 123
INSERT INTO users VALUES(2,'user3','202cb962ac59075b964b07152d234b70', 'Son', 'Ho', 'user3@gmail.com');
-- User4 - pass: 123
INSERT INTO users VALUES(3,'user4','202cb962ac59075b964b07152d234b70', 'Thanh', 'Ho', 'user4@gmail.com');
