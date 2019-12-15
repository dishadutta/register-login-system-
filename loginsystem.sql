

CREATE TABLE users (
  fname varchar(255) NOT NULL,
  lname varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  contactno varchar(11) DEFAULT NULL
) ENGINE=InnoDB;
