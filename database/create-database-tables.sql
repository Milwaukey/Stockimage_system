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
  totalMonetaryPaid decimal(5, 2) DEFAULT 0,
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
  totalAmountPaid decimal(7, 2) DEFAULT 0,
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
  price decimal(5, 2) DEFAULT 0,
  photoFile longblob NOT NULL,
  FOREIGN KEY (galleryID) REFERENCES tgalleries(galleryID)
);

CREATE TABLE tpayments (
  paymentID int AUTO_INCREMENT PRIMARY KEY,
  cardID int,
  photoID int,
  payDate date NOT NULL,
  payTime time NOT NULL,
  amountPaid decimal(5, 2) NOT NULL,
  FOREIGN KEY (cardID) REFERENCES tcards(cardID),
  FOREIGN KEY (photoID) REFERENCES tphotos(photoID)
);


