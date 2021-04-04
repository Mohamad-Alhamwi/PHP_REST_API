CREATE TABLE `students` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) NOT NULL,
  `birthDate` datetime NOT NULL,
  `birthplace` varchar(50) NOT NULL, 
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `students` (`id`, `fullName`, `birthDate`, `birthplace`) VALUES
(1, 'Hamzeh', '1996-02-25', 'Damascus'),
(2, 'Mohamad', '1996-02-25', 'Damascus'),
(3, 'Ahmed', '1996-02-25', 'Damascus'),
(4, 'Ali', '1996-02-25', 'Damascus'),
(5, 'Aoufa', '1996-02-25', 'Damascus');
