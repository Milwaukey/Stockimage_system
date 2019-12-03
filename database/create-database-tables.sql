CREATE DATABASE proofing_system_db; 

USE proofing_system_db;

CREATE TABLE tphotographers (
  photographerID int AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  surname varchar(60) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(100) NOT NULL
  );

CREATE TABLE tcities (
  cityID int AUTO_INCREMENT PRIMARY KEY,
  cityName varchar(50) NOT NULL
);

CREATE TABLE tusers (
  userID int AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  surname varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(100) NOT NULL,
  signupDate date,
  deleteDate date DEFAULT NULL,
  active boolean DEFAULT true,
  totalMonetaryPaid decimal(10, 2) DEFAULT 0,
  streetName varchar(50) NOT NULL,
  streetNumber varchar(5) NOT NULL,
  zipcode char(4) NOT NULL,
  cityID int,
  FOREIGN KEY (cityID) REFERENCES tcities(cityID)
);


CREATE TABLE tgalleries (
  galleryID int AUTO_INCREMENT PRIMARY KEY,
  photographerID int NOT NULL,
  name varchar(50) NOT NULL,
  numberOfPhotos smallint NOT NULL DEFAULT 0,
  FOREIGN KEY (photographerID) REFERENCES tphotographers(photographerID)
);

CREATE TABLE tcards (
  cardID int AUTO_INCREMENT PRIMARY KEY,
  userID int,
  ibanCode char(18) NOT NULL,
  expirationDate char(4) NOT NULL,
  ccv char(3) NOT NULL,
  totalAmountPaid decimal(10, 2) DEFAULT 0,
  FOREIGN KEY (userID) REFERENCES tusers(userID)
);

CREATE TABLE tphotos (
  photoID int AUTO_INCREMENT PRIMARY KEY,
  galleryID int,
  format varchar(5) NOT NULL,
  hDimension MEDIUMINT NOT NULL,
  vDimension MEDIUMINT NOT NULL,
  resolution int NOT NULL,
  filesize MEDIUMINT NOT NULL,
  price decimal(10, 2) DEFAULT 0,
  photoFile longblob NOT NULL,
  FOREIGN KEY (galleryID) REFERENCES tgalleries(galleryID)
);

CREATE TABLE tpayments (
  paymentID int AUTO_INCREMENT PRIMARY KEY,
  cardID int,
  photoID int,
  payDate date NOT NULL,
  payTime time NOT NULL,
  amountPaid decimal(10, 2) NOT NULL,
  FOREIGN KEY (cardID) REFERENCES tcards(cardID),
  FOREIGN KEY (photoID) REFERENCES tphotos(photoID)
);


CREATE TABLE taudit (
  auditID int AUTO_INCREMENT PRIMARY KEY,
  photoAuditID int,
  dateOfDeletePhoto date NOT NULL,
  photographerID int,
  userID int,
  paymentID int,
  FOREIGN KEY (photographerID) REFERENCES tphotographers(photographerID),
  FOREIGN KEY (userID) REFERENCES tusers(userID),
  FOREIGN KEY (paymentID) REFERENCES tpayments(paymentID)
);



CREATE TABLE tauditusers (
  userID int NOT NULL,
  name varchar(50) DEFAULT NULL,
  surname varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  username varchar(50) DEFAULT NULL,
  password varchar(100) DEFAULT NULL,
  signupDate date DEFAULT NULL,
  deleteDate date DEFAULT NULL,
  active boolean DEFAULT NULL,
  totalMonetaryPaid decimal(10, 2) DEFAULT NULL,
  streetName varchar(50) DEFAULT NULL,
  streetNumber varchar(5) DEFAULT NULL,
  zipcode char(4) DEFAULT NULL,
  cityID int DEFAULT NULL,
  statementType varchar(6),
  statementExecution datetime,
  dbmsUser varchar(12)
);

CREATE TABLE tauditcards (
  cardID int NOT NULL,
  userID int NOT NULL,
  ibanCode char(18) DEFAULT NULL,
  expirationDate char(4) DEFAULT NULL,
  ccv char(3) DEFAULT NULL,
  totalAmountPaid decimal(10, 2) DEFAULT NULL,
  statementType varchar(6),
  statementExecution datetime,
  dbmsUser varchar(12)
  );

CREATE TABLE tauditpayments (
  paymentID int NOT NULL,
  cardID int NOT NULL,
  photoID int,
  payDate date,
  payTime time,
  amountPaid decimal(10, 2) DEFAULT NULL,
  statementType varchar(6),
  statementExecution datetime,
  dbmsUser varchar(12)
)

