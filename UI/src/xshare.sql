CREATE DATABASE `xshare`;
USE `xshare`;
CREATE TABLE `users` (
   `id` int UNIQUE NOT NULL,
   `username` varchar(40),
   `apiKey` varchar(32),
   PRIMARY KEY(id)
);
/*! User1 - pass: 123 */
INSERT INTO users VALUES(1,'user1','202cb962ac59075b964b07152d234b70');
/*! User2 - pass: 234 */
INSERT INTO users VALUES(2,'user2','289dff07669d7a23de0ef88d2f7129e7');
/*! User3 - pass: 345 */
INSERT INTO users VALUES(3,'user3','d81f9c1be2e08964bf9f24b15f0e4900');