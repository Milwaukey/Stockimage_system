INSERT INTO tphotographers (name, surname, email, password)
VALUE ('Sigmund', 'Freud', 'sf@gmail.com', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK'),
('Susan', 'Anthony', 'sa@gmail.com', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK'),
('Sune', 'Henriksen', 'sh@gmail.com', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK');


INSERT INTO tusers (name, surname, email, username, password, streetName, streetNumber, zipcode, cityID)
VALUE ('Charles', 'Darwin', 'cd@gmail.com', 'Evolution', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Næstildvej', '37B', '7860', 3),
('Anne', 'Frank', 'af@gmail.com', 'PowerWoman', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'H.C.Andersen Vej', '18', '6705', 5),
('Genkis', 'Kharen', 'gk@mail.com', 'Horseman', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Sorøvej', '200', '4180', 25),
('Mikala', 'Mikalsen', "mm@gmail.com", 'MikalaM', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Sorøvej', '210B', '4180', 25),
('Erik', 'Rød', 'er@gmail.com', 'Viking', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Grøndlandsvejs', '27', '9900', 11),
('Pernille', 'Nielsen', 'pn@gmail.com', 'WhySoSerious', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Nodre Fasanvej', '10A', '2000', 1),
('Joan', 'Ark', 'ja@gmail.com', 'FrenchFire', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Strandvejen', '2', '2900', 1),
('Deedee', 'Lab', 'dl@gmail.com', 'DextersLab', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Sildevej', '33', '6100', 19),
('Hans-Christian', 'Andersen', 'hca@gmail.com', 'Ælling', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'H.C. Andersens Boulevard', '1', '7620', 22),
('Sokrates', 'Athen', 'sa@gmail.com', 'Athen', '$2y$10$B2RySJ2G2MEOHvFGb5wQi.GAAXGDiDGKAyp1976VxCFFwdn9G2rrK', 'Grækersens Allé', '5', '5700', 9);


INSERT INTO tcards (userID, ibanCode, expirationDate, ccv)
VALUE (1, 'DK9284710274923838', '0123', '032'),
(1, 'DK9284710274923839', '1234', '033'),
(2, 'DK9284710274923848', '1234', '044'),
(2, 'DK9284710274923849', '1234', '045'),
(3, 'DK9284710274923858', '1234', '055'),
(3, 'DK9284710274923859', '1234', '056'),
(4, 'DK9284710274923868', '1234', '066'),
(4, 'DK9284710274923869', '1234', '067'),
(5, 'DK9284710274923878', '1234', '077'),
(5, 'DK9284710274923879', '1234', '078'),
(6, 'DK9284710274923888', '1234', '088'),
(6, 'DK9284710274923889', '1234', '089'),
(7, 'DK9284710274923898', '1234', '099'),
(8, 'DK9284710274923899', '1234', '100'),
(9, 'DK9284710274923100', '1234', '101'),
(9, 'DK9284710274923110', '1234', '110'),
(10, 'DK9284710274923220', '1234', '200'),
(10, 'DK9284710274923222', '1234', '202');

