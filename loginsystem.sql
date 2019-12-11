SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE 'users' (
  'fname' varchar(255) NOT NULL,
  'lname' varchar(255) DEFAULT NULL,
  'email' varchar(255) NOT NULL,
  'password' varchar(300) NOT NULL,
  'contactno' varchar(11) DEFAULT NULL,
);
