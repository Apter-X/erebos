CREATE DATABASE erebos;
USE erebos;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(30) NOT NULL,
  `ip` char(15) NOT NULL,
  `storage` text NOT NULL
);

INSERT INTO `users` (`user_id`, `username`, `ip`) VALUES
  (1, 'Iliass', 1023810),
  (2, 'Hakim', 1023999);
COMMIT;